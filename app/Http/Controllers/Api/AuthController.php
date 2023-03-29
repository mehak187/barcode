<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Validator;
use Modules\Settings\Entities\VerifyDocument;
use App\Http\Traits\ApiResponseTrait;
use App\Mail\PasswordResetMail;
use Mail;
use Illuminate\Support\Facades\Hash;

use App\Models\PasswordReset;
class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(Request $request)
    {
        try{
     
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);   

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        } 

        if(Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $data['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $data['id'] =  $user->id;
            $data['name'] =  $user->name;
            $data['photo'] =  $user->photo;
            $data['barcode'] =  $user->barcode;
            $data['address1'] =  $user->address1;
            $data['address2'] =  $user->address2;
          
            return $this->sendJsonResponse('Member login successfully.',$data);
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 

        } catch (\Exception $e) {
          
            return $this->sendError('Error.', $e->getMessage());    
        }


    }
}
