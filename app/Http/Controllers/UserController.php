<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Member;
use App\Models\GymBarcode;
use App\Models\RequestBarcode;


class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function newCustomer() {
        return view('admin.newCustomer');
    }
    public function saveGym(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'contact' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'gymImg' => 'required|file|mimes:jpeg,png,jpg,jfif'
        ]);

        $photo = $req->file('gymImg');
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $destinationpath = public_path('myimgs');
        $photo->move($destinationpath, $photo_name);

        $password = $req->password;
        $hashedPassword = bcrypt($password);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'contact' => $req->contact,
            'address1' => $req->address1,
            'address2' => $req->address2,
            'city' => $req->city,
            'state' => $req->state,
            'zip' => $req->zip,
            'role' => $req->role,
            'password' => $hashedPassword,
            'photo' => $photo_name,
        ]);
        session()->put('mid', $user->id);
        return redirect('/customersList')->with('success', "Gym added successfully");
    }
    public function saveGymBarcode(Request $req)
    {
        GymBarcode::create([
            'gym_id' => $req->gym_id,
            'branches' => $req->branches,
            'from' => $req->from,
            'to' => $req->to
        ]);
        return redirect('/customerDetails/' . $req->gym_id)->with('success', "Barcode added successfully");
    }
    public function dashboard()
    {
        $data['totalBarcode'] = User::leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->sum('branches');

        $data['totalCustomers'] = User::where('role', '!=', 0)
            ->distinct()
            ->count('users.id');
        // ---------total barcode used-----
        $data['totalMembers'] = Member::distinct()
            ->count('id');

        return view('admin.dashboard', $data);
    }
    public function customersList()
    {
        $data['gyms'] = User::where('role', '!=', 0)->orderBy('id', 'desc')->get();
        // -------if no gym found----
        if ($data['gyms']->isEmpty()) {
            $data['error_message'] = "No records found.";
        }

        return view('admin.customersList',$data);

    }
    public function customerDetails($id)
    {
        $data['gym_id'] = $id;

        $data['lists'] = User::where('users.id', $id)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('gym_barcodes.*', 'users.id as user_id')->get();
        $data['maxs'] = GymBarcode::max('to');

        $data['totalBarcode'] = User::where('users.id', $id)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->sum('branches');

        $data['lastPurchased'] = User::where('users.id', $id)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('gym_barcodes.branches')->orderBy('gym_barcodes.id', 'desc')->limit(1)
            ->pluck('gym_barcodes.branches')
            ->first();

        $data['usedBarcodes'] = Member::where('members.gym_id', $id)
            ->distinct()->count('id');
        // --------request barcodes------
        // $data['orderBarcodes'] = RequestBarcode::where('gym_id', $id)
        // ->orderBy('request_barcodes.id', 'desc')
        // ->select('barcodes')
        // ->value('barcodes');

        // $data['GymBarcodeLast'] = GymBarcode::where('gym_id', $id)
        // ->select('branches')
        // ->orderBy('gym_barcodes.id', 'desc')
        // ->value('branches');
        $data['orderBarcodes'] = RequestBarcode::where('gym_id', $id)
        ->sum('barcodes');
        $data['GymBarcodeLast'] = GymBarcode::where('gym_id', $id)
            ->sum('branches');
        $data['orderBarcodesTot'] =  $data['orderBarcodes'] - $data['GymBarcodeLast'];
        
        return view('admin.customerDetails', $data);
    }
    // -----------total barcodes assigned to customer------
    public function barcodesOfGym($id)
    {
        $data['gym_id'] = $id;

        $rows = User::where('users.id', $id)
        ->leftJoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('from', 'to')->get();

        $result = [];
        foreach ($rows as $row) {
            for ($i = $row->from; $i <= $row->to; $i++) {
                $result[] = $i;
            }
        }
        $data['results'] = $result;
        return view('admin.barcodesOfGym', $data);
    }
    // -----------new barcodes added by admin------
    public function addedByAdmin($id)
    {
        $data['gym_id'] = $id;

        $row = User::where('users.id', $id)
            ->leftJoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('gym_barcodes.from', 'gym_barcodes.to')
            ->orderBy('gym_barcodes.id', 'desc')
            ->limit(1)
            ->first();

        $result = [];
        for ($i = $row->from; $i <= $row->to; $i++) {
            $result[] = str_pad($i, 10, '0', STR_PAD_LEFT);
        }

        $data['results'] = $result;
        return view('admin.addedByAdmin', $data);
    }
    // ---------used-barcodes-----
    public function usedBarcodes($id)
    {
        $data['gym_id'] = $id;
        $data['mUsedBarcodes'] = Member::where('members.gym_id', $id)
        ->select('members.barcode')
        ->pluck('members.barcode');

        return view('admin.usedBarcodes', $data);
    }
    // --------------remaining barcodes-------
    public function remBarcodes($id)
    {
        $data['gym_id'] = $id;
        $rows = GymBarcode::where('gym_barcodes.gym_id', $id)
        ->select('from', 'to')->get();
        $result = [];
        foreach ($rows as $row) {
            for ($i = $row->from; $i <= $row->to; $i++) {
                $result[] = str_pad($i, 10, "0", STR_PAD_LEFT);
            }
        }
    // ----------select barcode column from member and then use array differ to check that member barcode value should not be in $result
        $members = Member::pluck('barcode')->all();
        $resultnew = array_diff($result, $members);
        // print_r($resultnew);die();
        $data['results'] = $resultnew;
        return view('admin.remBarcodes', $data);
    }

   
    public function resetPassword()
    {
        return view('resetPassword');
    }
    public function newPassword()
    {
        return view('newPassword');
    }



}