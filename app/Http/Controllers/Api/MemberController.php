<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
   public function getMember($id){
     $data['member'] = Member::where('id', $id)->select('gym_id');
     
   }
}
