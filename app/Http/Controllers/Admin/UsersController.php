<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function getList()
    {
        $users = User::paginate(15);
        return view('admin.users.list', compact('users'));
    }
    
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function searchUser(Request $request){
        $users = User::where('name', 'LIKE', '%'. strip_tags($request->input('name')). '%')->get();
        return view('admin.users.search', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return "success";
    }
}
