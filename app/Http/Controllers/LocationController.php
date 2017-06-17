<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocationController extends Controller {

    public function setLocation(Request $request) {
        Session::put('research',  [
            'location' => $request->input('location'),
            'speciality' => Session::has('research') ? Session::get('research')['speciality'] : 0,
            'name' => Session::has('research') ? Session::get('research')['name'] : ''
        ]);
        return 'success';
    }

    public function resetLocation() {
        Session::put('research',  [
            'location' => '',
            'speciality' => Session::get('research')['speciality'],
            'name' => Session::get('research')['name']
        ]);
        if(Session::get('research')['speciality'] == 0 && Session::get('research')['name'] == '') {
            Session::forget('research');
        }
        return 'success';
    }

    public function setDistance($value, $location = null) {
        Session::put('global_search_distance', intval($value));
        debug('change distance');
        debug($location);
        debug($value);
        debug(Session::get('global_search_distance'));
        return redirect()->to($location ? '/'.$location : '/doctors');
    }

}