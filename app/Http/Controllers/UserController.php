<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Member;
use App\Models\GymBarcode;
use App\Models\Ad;
use App\Models\RequestBarcode;
use File;


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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'contact' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'gymImg' => 'file|mimes:jpeg,png,jpg,jfif'
        ]);
    
        $photo = $req->file('gymImg');
        if ($photo) {
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $destinationpath = public_path('myimgs');
            $photo->move($destinationpath, $photo_name);
        } else {
            $photo_name = 'member.png';
        }
    
        $password = $req->password;
        $hashedPassword = bcrypt($password);
    
        $user = User::create([
            'name' => $req->name,
            'fname' => $req->fname,
            'lname' => $req->lname,
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
    public function updateGym($id)
    {
        // ---start of photo of login user---------
        // $mphoto = auth()->user()->photo;
        // $data['photo'] = $mphoto;
        // $data['name'] = auth()->user()->name;
        // ---end of photo of login user---------
        $mid = auth()->user()->id;
        $data['upGym'] = User::where('id', $id)->first();
        return view('admin.updateGym', $data);
    }
    public function editGym(Request $req)
    {
        $photo = $req->file('gymImg');
        $password = $req->password;
        $hashedPassword = bcrypt($password);
    
        if ($photo !== null) {
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $destinationpath = public_path('myimgs');
            $photo->move($destinationpath, $photo_name);
    
            User::find($req->id)->update([
                'name' => $req->name,
                'fname' => $req->fname,
                'lname' => $req->lname,
                'email' => $req->email,
                'contact' => $req->contact,
                'address1' => $req->address1,
                'address2' => $req->address2,
                'city' => $req->city,
                'state' => $req->state,
                'zip' => $req->zip,
                'password' => $hashedPassword,
                'photo' => $photo_name
            ]);
        } else {
            User::find($req->id)->update([
                'name' => $req->name,
                'fname' => $req->fname,
                'lname' => $req->lname,
                'email' => $req->email,
                'contact' => $req->contact,
                'address1' => $req->address1,
                'address2' => $req->address2,
                'city' => $req->city,
                'state' => $req->state,
                'zip' => $req->zip,
                'password' => $hashedPassword
            ]);
        }
    
        return redirect('/customersList')->with('updateSuccess', "Member updated successfully");
    }
    
    public function saveRequestBarcode(Request $req)
    {
        $mid = auth()->user()->id;

        $Gymtotaltwo = GymBarcode::where('gym_barcodes.gym_id', $mid) 
        ->orderBy('from','asc')->get();
        $numbers='';
        $results='';
        foreach($Gymtotaltwo as $available)
        {
            $numbers='';
            $range = range(intval($available->from), intval($available->to));
            $numbers = implode(",", $range);
            $results=$results.$numbers.',';
        }
        $results=explode(",", $results);

        if ((in_array($req->from, $results)) || (in_array($req->to, $results))){
            return redirect('/member')->with([
                'requestError' => 'You already have these barcodes. Choose any other barcode.',
            ]);
        }  
        // else if (in_array($req->from, $resultstwo)) {
        //     return redirect('/member')->with([
        //         'alreadyrequestError' => 'Aleady requested barcodes',
        //     ]);
        // }
        else{
            $requestBarcode = RequestBarcode::where('gym_id', $mid)->exists();
            if ($requestBarcode) {
                return redirect('/member')->with([
                    'alreadysendrequest' => 'You have already sent barcode request.',
                ]);
            } 
            // -----------if request already exist-----------
            else {
                RequestBarcode::create([
                    'barcodes' => $req->barcodes,
                    'gym_id' => $req->gym_id,
                    'date' => $req->date,
                    'from' => $req->from,
                    'to' => $req->to,
                ]);
    
                $mname = auth()->user()->name;

                $requestBarcode = [
                    'barcodes' => $req->barcodes,
                    'gym_id' => $req->gym_id,
                    'date' => $req->date,
                    'mname' => $mname,
                    'from' => $req->from,
                    'to' => $req->to,
                ];
                $to_email = 'sales@apptagsonline.com';
                Mail::to($to_email)->send(new RequestBarcodeMail($requestBarcode));
    
                return redirect('/member')->with([
                    'requestSuccess' => 'Request sent successfully',
                    'requestBarcode' => $requestBarcode,
                ]);
            }
        }
    }
    public function saveGymBarcode(Request $req)
    {
        $check=GymBarcode::where('gym_id',$req->gym_id)->where(function ($query) use ($req) {
            $query->whereBetween('from', [$req->from, $req->to])
                  ->orWhereBetween('to', [$req->from, $req->to]);
        })->get()->toArray();
        if(count($check)>0){
            return redirect('/customerDetails/' . $req->gym_id)->with('error', "Barcode already assigned");    
        }
        else{
            RequestBarcode::where('gym_id', $req->gym_id)->delete();
            GymBarcode::create([
                'gym_id' => $req->gym_id,
                'branches' => $req->branches,
                'from' => $req->from,
                'to' => $req->to
            ]);
            return redirect('/customerDetails/' . $req->gym_id)->with('success', "Barcode added successfully");    
        }
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
        $data['maxs'] = GymBarcode::where('gym_id',$id)->max('to');
// ----------total barcodes-------
        $data['totalBarcode'] = User::where('users.id', $id)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->sum('branches');
// -------------used-barcodes------
        $data['usedBarcodes'] = Member::where('members.gym_id', $id)
        ->distinct()->count('id');
// --------------last purchased---------
        $data['lastPurchased'] = User::where('users.id', $id)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('gym_barcodes.branches')->orderBy('gym_barcodes.from', 'desc')->limit(1)
            ->pluck('gym_barcodes.branches')
            ->first();
// -------------requested barcode-----------
        // $data['orderBarcodes'] = RequestBarcode::where('gym_id', $id)
        // ->sum('barcodes');
        $data['orderBarcodes']=[];
        $orderBarcodes = RequestBarcode::where('gym_id', $id)
        ->first();
        if($orderBarcodes){
            $data['orderBarcodes']=$orderBarcodes->toArray();
        }
        // $data['orderBarcodes'] = RequestBarcode::where('gym_id', $id)
        // ->orderBy('id', 'desc')
        // ->select('barcodes')
        // ->first();

        // $data['GymBarcodeLast'] = GymBarcode::where('gym_id', $id)
        //     ->sum('branches');
        // $data['orderBarcodesTot'] =  $data['orderBarcodes'] - $data['GymBarcodeLast'];
        
        return view('admin.customerDetails', $data);
    }
    // -----------total barcodes assigned to customer------
    public function barcodesOfGym($id)
    {
        $data['gym_id'] = $id;

        $rows = User::where('users.id', $id)
        ->leftJoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->select('from', 'to')->orderBy('gym_barcodes.from','asc')->get();

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
            ->orderBy('gym_barcodes.from', 'asc')
            ->limit(1)
            ->first();

        $result = [];
        for ($i = $row->from; $i <= $row->to; $i++) {
            $result[] = $i;
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
        ->select('from', 'to')->orderBy('from','asc')->get();
        $result = [];
        foreach ($rows as $row) {
            for ($i = $row->from; $i <= $row->to; $i++) {
                $result[] = $i;
            }
        }
    // ----------select barcode column from member and then use array differ to check that member barcode value should not be in $result
        $members = Member::pluck('barcode')->all();
        foreach ($members as &$barcode) {
            // $barcode = str_pad($barcode, 10, '0', STR_PAD_LEFT);
            $barcode = $barcode;
        }
        
        $resultnew = array_diff($result, $members);
        // print_r($resultnew);die();
        $data['results'] = $resultnew;
        // print_r($result);
        // print_r($members);
        // print_r($data['results']);
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

    public function advertisement()
    {
        $data['ads']=Ad::get()->toArray();
        return view('admin.advertisement',$data);
    }
    public function saveAd(Request $request){
        
        $photo = $request->file('image');
        if ($photo) {
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $destinationpath = public_path('myimgs');
            $photo->move($destinationpath, $photo_name);
        } else {
            $photo_name = 'member.png';
        }
        Ad::create([
            'title'=>$request->get('title'),
            'image'=>$photo_name,
        ]);

        return redirect()->back()->with('success',' Ad Published');
    }

    public function deleteAds($id){
        $ad=Ad::find($id);
        if(file_exists(public_path('/myimgs/'.$ad->img))){
            File::delete(public_path('/myimgs/'.$ad->img));
        }
        Ad::where('id', $id)->delete();
        return redirect()->back()->with('success',' Ad Deleted');
    }

   
        
}