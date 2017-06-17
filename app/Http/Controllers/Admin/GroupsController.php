<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Groups;
use App\GroupRelation;
use App\User;
use App\Invitation;
use App\Mail\RegisterGroupToken;
use Auth;
use Image;

class GroupsController extends Controller
{

    public function getList()
    {
        $groups = Groups::paginate(15);
        return view('admin.groups.list', compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function show(Groups $group)
    {
        $members = $group->getMembers();
        $count_members = $members->count();

        $pendings = $group->getPendings();
        $count_pendings = $pendings->count();

        return view('admin.groups.show', compact('group','members', 'count_members','pendings', 'count_pendings'));
    }

    public function store(Request $request)
    {
        $group = new Groups;
            $group->name = strip_tags($request->input('name'));
            $group->status = strip_tags($request->input('status'));
            $group->description = strip_tags($request->input('description'));
            $group->token = str_random(30);
            $group->save();

        if ($request->file('logo')) {
            $this->uploadLogo($request, $group);
        }   

        return redirect('/admin/groups');
    }

    public function inviteMember(Request $request, Groups $group){

        $email = $request->input('email');
        
        $invitation = new Invitation();
            $invitation->email = $email;
            $invitation->group_id = $group->id;
            $invitation->save();

        \Mail::to($email)->send(new RegisterGroupToken($group->token));

        return redirect('admin/group/' . $group->id);
    }

    private function uploadLogo(Request $request, $group)
    {
        $destination = public_path() . '/uploads/group/' . $group->id .'/';
        if (!file_exists($destination)) mkdir($destination, 0777, true);
        $extension = $request->file('logo')->getClientOriginalExtension();
        $group->logo = 'logo.' .$extension;
        $group->save();
        Image::make($request->file('logo'))->save($destination.$group->logo);
    }

    public function edit(Groups $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function update(Request $request, Groups $group)
    {
        $group->name = strip_tags($request->input('name'));
        $group->status = strip_tags($request->input('status'));
        $group->description = strip_tags($request->input('description'));

        if ($request->file('logo')) {
            $this->uploadLogo($request, $group);
        }   

        $group->save();
        return redirect('/admin/groups');
    }

    public function destroy(Groups $group)
    {
        $group->delete();
        return "success";
    }    

    public function removeMember(GroupRelation $groupRelation)
    {
        $path = '/admin/members/' . $groupRelation->group_id;

        $groupRelation->group_id = 1;
        $groupRelation->save();
        return $path;
    }

    public function getMembers(Groups $group)
    {
        $members = $group->allMembers()->paginate(15);
        return view('admin.groups.members', compact('members'));
    }

    public function addMembers(Groups $group){
        $users = GroupRelation::with('users')->where('group_id', 1)->get();
        $current_group = $group->id;
        return view('admin.members.add', compact('users', 'current_group'));
    }    

    public function searchGroup(Request $request){
        $groups = Groups::where('name', 'LIKE', '%'. strip_tags($request->input('name')). '%')->get();
        return view('admin.groups.search', compact('groups'));
    }
}
