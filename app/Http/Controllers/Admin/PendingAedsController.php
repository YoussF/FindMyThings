<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PendingAed;
use App\Aed;
use Auth;

class PendingAedsController extends Controller
{

    public function getList()
    {
        $pendingAeds = PendingAed::where('validate', 0)->paginate(15);
        return view('admin.pending-aeds.list', compact('pendingAeds'));
    }

    public function show(PendingAed $pendingAed){

        $found = Aed::where('lon', $pendingAed->lon)->where('lat', $pendingAed->lat)->first();

        $isNewAed = 0;
        
        $aedname = null;
        $street_fr = null;
        $num = null;
        $postcode = null;
        $municipality_fr = null;
        $model = null;
        $lat = null;
        $lon = null;
        $aedexpiration = null;
        $infplace_fr = null;

        if($found == null){
            //dd('is null');
            $isNewAed = 1;
        }else{
            $aedname = $found->aedname;
            $street_fr = $found->street_fr;
            $num = $found->num;
            $postcode = $found->postcode;
            $municipality_fr = $found->municipality_fr;
            $model = $found->model;
            $aedexpiration = $found->aedexpiration;
            $lat = $found->lat;
            $lon = $found->lon;
            $infplace_fr = $found->infplace_fr;
        }

        return view('admin.pending-aeds.show', compact('pendingAed', 'isNewAed','aedname',
                    'street_fr',
                    'num',
                    'model',
                    'postcode',
                    'municipality_fr',
                    'lat',
                    'lon',
                    'aedexpiration',
                    'infplace_fr'));
    }

    public function validateAED(PendingAed $pendingAed){


        $found = Aed::where('lon', $pendingAed->lon)->where('lat', $pendingAed->lat)->first();

        if($found == null){
            if($pendingAed->lat_v != 1 && $pendingAed->lon_v != 1) {
                return redirect('/admin/pending-aed/'.$pendingAed->id)->with('error', 'Profile updated!');    
            }
        }
        $pendingAed->validate = 1;
            $pendingAed->save();

        //todo une fois que c'est validé avec 5 faut validé tout les autres
        /*if($pendingAed->user->getPermission() == "activated"){
            $aed = new Aed();
                $aed->aedname = $pendingAed->aedname;
                $aed->street_fr = $pendingAed->street_fr;
                $aed->num = $pendingAed->num;
                $aed->postcode = $pendingAed->postcode;
                $aed->municipality_fr = $pendingAed->municipality_fr;
                $aed->lat = $pendingAed->lat;
                $aed->lon = $pendingAed->lon;
                $aed->infplace_fr = $pendingAed->infplace_fr;
                $aed->save();
        }else{
            if($pendingAed->isValid()){
                $aed = new Aed();
                $aed->aedname = $pendingAed->aedname;
                $aed->street_fr = $pendingAed->street_fr;
                $aed->num = $pendingAed->num;
                $aed->postcode = $pendingAed->postcode;
                $aed->municipality_fr = $pendingAed->municipality_fr;
                $aed->lat = $pendingAed->lat;
                $aed->lon = $pendingAed->lon;
                $aed->infplace_fr = $pendingAed->infplace_fr;
                $aed->save();
            }
        }*/

        //check que le gars a valider le LON ET LAT
        $aed = new Aed();

            if($pendingAed->aedname_v == 1) {
                $aed->aedname = $pendingAed->aedname;
            }            

            if($pendingAed->street_fr_v == 1) {
                $aed->street_fr = $pendingAed->street_fr;
            }            

            if($pendingAed->num_v == 1) {
                $aed->num = $pendingAed->num;
            }            

            if($pendingAed->model_v == 1) {
                $aed->model = $pendingAed->model;
            }

            if($pendingAed->postcode_v == 1) {
                $aed->postcode = $pendingAed->postcode;
            }

            if($pendingAed->municipality_fr_v == 1) {
                $aed->municipality_fr = $pendingAed->municipality_fr;
            }

            if($pendingAed->lat_v == 1) {
                $aed->lat = $pendingAed->lat;
            }

            if($pendingAed->lon_v == 1) {
                $aed->lon = $pendingAed->lon;
            }
            
            if($pendingAed->aedexpiration_v == 1) {
                $aed->aedexpiration = $pendingAed->aedexpiration;
            }

            if($pendingAed->infplace_fr_v == 1) {
                $aed->infplace_fr = $pendingAed->infplace_fr;
            }

            $aed->save();
        return redirect('/admin/pending-aeds');
    }

    public function completeAED(PendingAed $pendingAed){
        //dd('start validate');
        $pendingAed->validate = 1;
        	$pendingAed->save();


        //check que le gars a valider le LON ET LAT
        $aed = Aed::where('lon', $pendingAed->lon)->where('lat', $pendingAed->lat)->first();

            if($pendingAed->aedname_v == 1) {
                $aed->aedname = $pendingAed->aedname;
            }            

            if($pendingAed->street_fr_v == 1) {
                $aed->street_fr = $pendingAed->street_fr;
            }            

            if($pendingAed->num_v == 1) {
                $aed->num = $pendingAed->num;
            }

            if($pendingAed->postcode_v == 1) {
                $aed->postcode = $pendingAed->postcode;
            }

            if($pendingAed->model_v == 1) {
                $aed->model = $pendingAed->model;
            }
            
            if($pendingAed->municipality_fr_v == 1) {
                $aed->municipality_fr = $pendingAed->municipality_fr;
            }

            if($pendingAed->lat_v == 1) {
                $aed->lat = $pendingAed->lat;
            }

            if($pendingAed->lon_v == 1) {
                $aed->lon = $pendingAed->lon;
            }

            if($pendingAed->infplace_fr_v == 1) {
                $aed->infplace_fr = $pendingAed->infplace_fr;
            }

            $aed->save();
        return redirect('/admin/pending-aeds');
    }

}
