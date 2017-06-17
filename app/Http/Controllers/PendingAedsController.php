<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Aed;
use App\PendingAed;
use Image;
use Illuminate\Support\Facades\Input;
use Session;

class PendingAedsController extends Controller
{
    public function store(Request $request)
    {
            $pendingAed = new PendingAed();
            $pendingAed->aedname = strip_tags($request->input('aedname'));
            $pendingAed->model = strip_tags($request->input('model'));
            $pendingAed->street_fr = strip_tags($request->input('street'));
            $pendingAed->num = strip_tags($request->input('num'));
            $pendingAed->postcode = strip_tags($request->input('postcode'));
            $pendingAed->municipality_fr = strip_tags($request->input('municipality'));
            $pendingAed->lat = strip_tags($request->input('pos_lat'));
            $pendingAed->lon = strip_tags($request->input('pos_long'));
            $pendingAed->infplace_fr = strip_tags($request->input('infplace'));
            $pendingAed->user_id = Auth::user()->id;
            $pendingAed->save();

            //picture 1
            if ($request->file('img_a')) {
                // Upload new groups logo
                $destination = public_path() . '/uploads/aeds/'. $pendingAed->id . '/';
                if (!file_exists($destination)) mkdir($destination, 0777, true);
                $extension = $request->file('img_a')->getClientOriginalExtension();
                $pendingAed->img_a = 'img_a';
                $name = $pendingAed->img_a . '.' .$extension;
                $pendingAed->img_a = $name;
                Image::make($request->file('img_a'))->save($destination.$name);
            }

            //picture 2
            if ($request->file('img_b')) {
                // Upload new groups logo
                $destination = public_path() . '/uploads/aeds/'. $pendingAed->id . '/';
                if (!file_exists($destination)) mkdir($destination, 0777, true);
                $extension = $request->file('img_b')->getClientOriginalExtension();
                $pendingAed->img_b = 'img_b';
                $name = $pendingAed->img_b . '.' .$extension;
                $pendingAed->img_b = $name;
                Image::make($request->file('img_b'))->save($destination.$name);
            }

            //picture 3
            if ($request->file('img_c')) {
                // Upload new groups logo
                $destination = public_path() . '/uploads/aeds/'. $pendingAed->id . '/';
                if (!file_exists($destination)) mkdir($destination, 0777, true);
                $extension = $request->file('img_c')->getClientOriginalExtension();
                $pendingAed->img_c = 'img_c';
                $name = $pendingAed->img_c . '.' .$extension;
                $pendingAed->img_c = $name;
                Image::make($request->file('img_c'))->save($destination.$name);
            }

            //picture 4
            if ($request->file('img_d')) {
                // Upload new groups logo
                $destination = public_path() . '/uploads/aeds/'. $pendingAed->id . '/';
                if (!file_exists($destination)) mkdir($destination, 0777, true);
                $extension = $request->file('img_d')->getClientOriginalExtension();
                $pendingAed->img_d = 'img_d';
                $name = $pendingAed->img_d . '.' .$extension;
                $pendingAed->img_d = $name;
                Image::make($request->file('img_d'))->save($destination.$name);
            }

            
            $pendingAed->save();

        if(Auth::user()->hasPermissionAED()){
            //set to true all
            $pendingAed->status_v = 1;
            $pendingAed->idcitygis_v = 1;
            $pendingAed->aedname_v = 1;
            $pendingAed->street_fr_v = 1;
            $pendingAed->street_nl_v = 1;
            $pendingAed->num_v = 1;
            $pendingAed->postcode_v = 1;
            $pendingAed->municipality_fr_v = 1;
            $pendingAed->municipality_nl_v = 1;
            $pendingAed->lat_v = 1;
            $pendingAed->lon_v = 1;
            $pendingAed->model_v = 1;
            $pendingAed->aedexpiration_v = 1;
            $pendingAed->infplace_fr_v = 1;
            $pendingAed->infplace_nl_v = 1;
            $pendingAed->infaccess_fr_v = 1;
            $pendingAed->infaccess_nl_v = 1;
            $pendingAed->point_v = 1;
            $pendingAed->img_a_v = 1;
            $pendingAed->img_b_v = 1;
            $pendingAed->img_c_v = 1;
            $pendingAed->img_d_v = 1;

            //check if existe
            $found = Aed::where('lat', $pendingAed->lat)->where('lon', $pendingAed->lon)->firs();
            $aed = $found;
            if($found == null){
                $aed = new Aed();
            }
            
            //update aed
            $aed->aedname = strip_tags($request->input('aedname'));
            $aed->model = strip_tags($request->input('model'));
            $aed->street_fr = strip_tags($request->input('street'));
            $aed->num = strip_tags($request->input('num'));
            $aed->postcode = strip_tags($request->input('postcode'));
            $aed->municipality_fr = strip_tags($request->input('municipality'));
            $aed->lat = strip_tags($request->input('pos_lat'));
            $aed->lon = strip_tags($request->input('pos_long'));
            $aed->infplace_fr = strip_tags($request->input('infplace'));
            $aed->user_id = Auth::user()->id;
            $aed->save();
        }

        return redirect('/');
    }

    public function getList(){
        $pendings = PendingAed::where('user_id', Auth::user()->id)->where('validate', 0)->get();
        return view('design.home.pending', compact('pendings'));
    }    

    public function getValidate(){
        $validates = PendingAed::where('user_id', Auth::user()->id)->where('validate',1)->get();
        return view('design.home.validate', compact('validates'));
    }
    
    public function showValidate(PendingAed $pending){
        return view('design.home.show-validate', compact('pending'));
    }

    public function show(PendingAed $pending){
        return view('design.home.show', compact('pending'));
    }

}
