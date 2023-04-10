<?php

namespace App\Http\Controllers;

use App\Mail\RequestBarcodeMail;

use App\Mail\RequestInstructionMail;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

use App\Models\annoucement;
use App\Models\Member;
use App\Models\GymBarcode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestBarcode;
use App\Models\Schedule;
use App\Models\mailInstruction;
use App\Models\phoneInstruction;
use Hash;


class GymController extends Controller
{
    public function newMember()
    {
        // ---start of photo of login user---------
        $mphoto = auth()->user()->photo;
        $data['photo'] = $mphoto;
        $data['name'] = auth()->user()->name;
        // ---end of photo of login user---------
        $mid = auth()->user()->id;
        $rows = GymBarcode::where('gym_barcodes.gym_id', $mid)
            ->select('from', 'to')->get();

        $result = [];
        foreach ($rows as $row) {
            for ($i = $row->from; $i <= $row->to; $i++) {
                $result[] = str_pad($i, 10, "0", STR_PAD_LEFT);
            }
        }
        // ----------select barcode column from member and then use array differ to check that member barcode value should not be in $result
        $members = Member::pluck('barcode')->all();
        // convert all values of member into 10 digit
        foreach ($members as $key => $barcode) {
            $members[$key] = str_pad($barcode, 10, '0', STR_PAD_LEFT); // convert to 10 digits
        }

        $resultnew = array_diff($result, $members);
        $data['results'] = $resultnew;

        $data['gym_id'] = $mid;
        $data['saveSendMail'] = mailInstruction::where('gym_id', auth()->user()->id)
        ->first();
        $data['saveSendPhone'] = phoneInstruction::where('gym_id', auth()->user()->id)
        ->first();

        $data['Gymtotal'] = GymBarcode::where('gym_barcodes.gym_id', $mid)
            ->get();
        if ($data['Gymtotal']->isEmpty()) {
            $data['Gymrecord'] = "No records found.";
        }
        $data['logid'] = auth()->user()->id;
        return view('gym.newMember', $data);
    }
    public function savemember(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'barcode' => 'required',
            'password' => 'required|min:6',
            // 'gymImg' => 'required|file|mimes:jpeg,png,jpg,jfif'
        ]);

        Member::create([
            'name' => $req->name,
            'email' => $req->email,
            'contact' => $req->contact,
            'address1' => $req->address1,
            'address2' => $req->address2,
            'city' => $req->city,
            'state' => $req->state,
            'zip' => $req->zip,
            'barcode' => $req->barcode,
            'photo' => $req->photo,
            'gym_id' => $req->gym_id,
            'password' => Hash::make($req->password),
            'show_password' => $req->password
        ]);
        // ----------------------
        //  save and send mail
        // -----------------------
        $logid = auth()->user()->id;
        $saveSendMail = mailInstruction::where('gym_id', $logid)->exists(); // Replace 'id' and '1' with the appropriate values
        if ($saveSendMail) {
            mailInstruction::where('gym_id', $logid)->update([
                'gym_id' => $req->gym_id,
                'mailid' => $req->mailid,
                'msg' => $req->msg,
            ]);
        } else {
            mailInstruction::create([
                'gym_id' => $req->gym_id,
                'mailid' => $req->mailid,
                'msg' => $req->msg,
            ]);
        }
        // --------------send-mail------
        $data['pass'] = Member::where('email', $req->mailid)->select('show_password')->get()->toarray();
        $requestMail = [
            'msg' => $req->msg,
            'mailid' => $req->mailid,
            'pass' => $data['pass'][0]['show_password']
        ];

        $to_email = 'abbasraj789@gmail.com';
        Mail::to($to_email)->send(new RequestInstructionMail($requestMail));
        // ----------------------
        //  save and send msg
        // -----------------------
        $saveSendPhone = phoneInstruction::where('gym_id', $logid)->exists(); // Replace 'id' and '1' with the appropriate values
        if ($saveSendPhone) {
            phoneInstruction::where('gym_id', $logid)->update([
                'gym_id' => $req->gym_id,
                'phoneid' => $req->phoneid,
                'msg' => $req->msg,
            ]);
        } else {
            phoneInstruction::create([
                'gym_id' => $req->gym_id,
                'phoneid' => $req->phoneid,
                'msg' => $req->msg,
            ]);
        }
        // --------send-msg----
        $accountSid = getenv("TWILIO_SID");
        $authToken = getenv("TWILIO_AUTH_TOKEN");
        $twilioNumber = getenv("TWILIO_NUMBER");
        $client = new Client($accountSid, $authToken);
        $client->messages->create("+923041461400", [
            'From' => $twilioNumber,
            'body' => $req->msg
        ]);
        // $client->messages->create("+92".$req->phoneid, [
//     'From' => $twilioNumber,
//     'body' => $req->msg
// ]);
        return redirect('/newMember')->with([
            'success' => 'Member added successfully',
            'requestBarcode' => $requestMail,
        ]);
    }
    public function member(){
        // ---start of photo of login user---------
        $mphoto = auth()->user()->photo;
        $data['photo'] = $mphoto;
        $data['name'] = auth()->user()->name;
        // ---end of photo of login user---------
        $mid = auth()->user()->id;
        $data['mid'] = $mid;

        $data['members'] = Member::where('members.gym_id', $mid)
            ->orderBy('id', 'desc')->get();
        if ($data['members']->isEmpty()) {
            $data['error_message'] = "No records found.";
        }

        $data['Gymtotal'] = GymBarcode::where('gym_barcodes.gym_id', $mid)
            ->get();
        if ($data['Gymtotal']->isEmpty()) {
            $data['Gymrecord'] = "No records found.";
        }

        $data['totalBarcode'] = User::where('users.id', $mid)
            ->leftjoin('gym_barcodes', 'users.id', '=', 'gym_barcodes.gym_id')
            ->sum('branches');

        $data['usedBarcodes'] = Member::where('members.gym_id', $mid)
            ->distinct()->count('id');

        $current_date = now()->setTimezone('Asia/Karachi')->format('m-d-Y');
        $data['orderBarcodes'] = RequestBarcode::where('gym_id', $mid)
            ->where('date', $current_date)
            ->sum('barcodes');
        // print_r($mid); die();
        // print_r($data['orderBarcodes']);die();
        return view('gym.member', $data);
    }
    public function updateMember($id)
    {
        // ---start of photo of login user---------
        $mphoto = auth()->user()->photo;
        $data['photo'] = $mphoto;
        $data['name'] = auth()->user()->name;
        // ---end of photo of login user---------
        $mid = auth()->user()->id;
        $rows = GymBarcode::where('gym_barcodes.gym_id', $mid)
            ->select('from', 'to')->get();
        $result = [];
        foreach ($rows as $row) {
            for ($i = $row->from; $i <= $row->to; $i++) {
                $result[] = str_pad($i, 10, "0", STR_PAD_LEFT);
            }
        }
        // ----------select barcode column from member and then use array differ to check that member barcode value should not be in $result
        $members = Member::pluck('barcode')->all();
        // convert all values of member into 10 digit
        foreach ($members as $key => $barcode) {
            $members[$key] = str_pad($barcode, 10, '0', STR_PAD_LEFT); // convert to 10 digits
        }
        $resultnew = array_diff($result, $members);
        // print_r($resultnew);die();
        $data['results'] = $resultnew;

        $data['upmembers'] = Member::where('id', $id)
            ->first();
        return view('gym.updateMember', $data);
    }
    public function editmember(Request $req)
    {
        Member::find($req->id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'contact' => $req->contact,
            'address1' => $req->address1,
            'address2' => $req->address2,
            'city' => $req->city,
            'state' => $req->state,
            'zip' => $req->zip,
            'barcode' => $req->barcode,
            'password' => Hash::make($req->password),
            'show_password' => $req->password
        ]);
        return redirect('/member')->with('updateSuccess', "Member updated successfully");
    }
    public function saveRequestBarcode(Request $req)
    {
        RequestBarcode::create([
            'barcodes' => $req->barcodes,
            'gym_id' => $req->gym_id,
            'date' => $req->date,
        ]);

        $mname = auth()->user()->name;

        $requestBarcode = [
            'barcodes' => $req->barcodes,
            'gym_id' => $req->gym_id,
            'date' => $req->date,
            'mname' => $mname
        ];
        $to_email = 'abbasraj789@gmail.com';
        Mail::to($to_email)->send(new RequestBarcodeMail($requestBarcode));

        return redirect('/member')->with([
            'requestSuccess' => 'Request sent successfully',
            'requestBarcode' => $requestBarcode,
        ]);
    }
    public function gymsTiming()
    {
        // ---start of photo of login user---------
        $mphoto = auth()->user()->photo;
        $data['photo'] = $mphoto;
        $data['name'] = auth()->user()->name;
        // ---end of photo of login user---------
        $data['ann'] = annoucement::where('gym_id', auth()->user()->id)->first();

        $data['loginid'] = auth()->user()->id;
        $data['schedule'] = Schedule::where('schedules.gym_id', auth()->user()->id)
            ->first();
        return view('gym.gymsTiming', $data);
    }
    public function ann(Request $req)
    {
        $logid = auth()->user()->id;
        $annoucement = annoucement::where('gym_id', $logid)->exists(); // Replace 'id' and '1' with the appropriate values
        if ($annoucement) {
            annoucement::where('gym_id', $logid)->update([
                'annoucement' => $req->annoucement,
                'gym_id' => $req->gym_id
            ]);
        } else {
            annoucement::create([
                'annoucement' => $req->annoucement,
                'gym_id' => $req->gym_id
            ]);
        }
        return redirect('/gymsTiming');
    }
    public function saveTiming(Request $req)
    {
        $Schedule = Schedule::where('id', 1)->first(); // Replace 'id' and '1' with the appropriate values
        if ($Schedule) {
            $Schedule->update([
                'gym_id' => $req->gym_id,
                'mon_st_time' => $req->mon_st_time,
                'mon_end_time' => $req->mon_end_time,
                'mon_status' => $req->mon_status,
                'tue_st_time' => $req->tue_st_time,
                'tue_end_time' => $req->tue_end_time,
                'tue_status' => $req->tue_status,
                'wed_st_time' => $req->wed_st_time,
                'wed_end_time' => $req->wed_end_time,
                'wed_status' => $req->wed_status,
                'thur_st_time' => $req->thur_st_time,
                'thur_end_time' => $req->thur_end_time,
                'thur_status' => $req->thur_status,
                'fri_st_time' => $req->fri_st_time,
                'fri_end_time' => $req->fri_end_time,
                'fri_status' => $req->fri_status,
                'sat_st_time' => $req->sat_st_time,
                'sat_end_time' => $req->sat_end_time,
                'sat_status' => $req->sat_status,
                'sun_st_time' => $req->sun_st_time,
                'sun_end_time' => $req->sun_end_time,
                'sun_status' => $req->sun_status,
            ]);
        } else {
            Schedule::create([
                'gym_id' => $req->gym_id,
                'mon_st_time' => $req->mon_st_time,
                'mon_end_time' => $req->mon_end_time,
                'mon_status' => $req->mon_status,
                'tue_st_time' => $req->tue_st_time,
                'tue_end_time' => $req->tue_end_time,
                'tue_status' => $req->tue_status,
                'wed_st_time' => $req->wed_st_time,
                'wed_end_time' => $req->wed_end_time,
                'wed_status' => $req->wed_status,
                'thur_st_time' => $req->thur_st_time,
                'thur_end_time' => $req->thur_end_time,
                'thur_status' => $req->thur_status,
                'fri_st_time' => $req->fri_st_time,
                'fri_end_time' => $req->fri_end_time,
                'fri_status' => $req->fri_status,
                'sat_st_time' => $req->sat_st_time,
                'sat_end_time' => $req->sat_end_time,
                'sat_status' => $req->sat_status,
                'sun_st_time' => $req->sun_st_time,
                'sun_end_time' => $req->sun_end_time,
                'sun_status' => $req->sun_status
            ]);
        }
        return redirect('/gymsTiming');
    }
}