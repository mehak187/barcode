<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\annoucement;
use App\Models\Schedule;
use App\Http\Traits\ApiResponseTrait;
use File;
use Validator;

class MemberController extends Controller
{
    use ApiResponseTrait;
    public function getMember($id)
    {
        try {
            //  -----get gym id who created the member--
            $member_gym = Member::where('id', $id)->select('gym_id')->first();

            $data['details'] = Member::where('members.id', $id)
            ->leftJoin('annoucements','members.gym_id','=','annoucements.gym_id')
            ->select('name','photo','address1','address2','barcode','annoucements.annoucement')->first();
            $data['schedule'] = Schedule::where('gym_id', $member_gym->gym_id)
                ->first();

            $success = "Member details";
            return $this->sendJsonResponse($data, $success);
        } catch (\Exception $e) {
            return $this->sendError('Error.', $e->getMessage());
        }
    }   
     public function changeProfile(Request $req)
    {
        try {   

            $validator = Validator::make($req->all(), [
                'profile' => 'required',
            ]);
       
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
                //store selected img in path
                $photo = $req->file('profile');
                $photo_name = time() . "_" .$photo->getClientOriginalName();
                $destinationpath = public_path('myimgs/member/');
                $photo->move($destinationpath,$photo_name);
                //delete old img
                $data=Member::find($req->id);
                $img_path = public_path("myimgs/member/" .$data->photo);
                if(File::exists($img_path)) {
                    File::delete($img_path);
                }
                //update
                member::find($req->id)->update([
                    'photo' => $photo_name
                ]);

            $success = "profile updated";
            return $this->sendResponse($success, 1);
        } catch (\Exception $e) {
            return $this->sendError('Error.', $e->getMessage());
        }
    } 
}