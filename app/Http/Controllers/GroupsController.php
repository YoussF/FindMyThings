<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Groups;
use App\GroupRelation;
use App\Invitation;

class GroupsController extends Controller
{

    public function getInvitation(){
        
        return view('front.account.invitation', compact('varname'));
    }

    public function addTokenMembers($token){
        $user = Auth::user();
        $group = Groups::where('token', $token)->first();

        $invitation = Invitation::where('email', $user->email)->first();
            $invitation->validate = 1;
            $invitation->save();

        $groupRelation = GroupRelation::where('user_id', $user->id)->first();
            $groupRelation->group_id = $group->id;
            $groupRelation->save();
            
        return redirect('/');
    }
}
