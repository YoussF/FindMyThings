<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Groups;
use App\Aed;
use App\Logger;
use App\PendingAed;

class AdminController extends Controller
{

    public function dashboard()
    {
        $logs = Logger::with('user')->orderBy('created_at', 'DESC')->take(20)->get();
        $users_count = User::count();
        $groups_count = Groups::count();
        $aeds_count = Aed::count();
        $pendings_aeds = PendingAed::where('validate',0)->orderBy('created_at', 'DESC')->take(20)->get();

        return view('admin.dashboard', compact('logs', 'users_count', 'groups_count', 'aeds_count', 'pendings_aeds'));
    }

}
