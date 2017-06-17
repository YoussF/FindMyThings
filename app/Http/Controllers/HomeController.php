<?php

namespace App\Http\Controllers;

use App\Aed;
use App\Position;

include 'Googlemaps.php';
use Auth;

class HomeController extends Controller
{
    protected function createInfoWindow($array){
      $result="";
      if(is_array($array)){
        $result .="<h6>";
        $result .= $array["aedName"];
        $result .="</h6>";
        $result .="<h6>";
        $result .= $array["time"];
        $result .="</h6>";
        $id = $array["token"];
      }else{
        $result = FALSE;
      }
      return $result;
    }

    public function index()
    {


      if(Auth::guest()){
        return redirect('/login');
      }
      $config['zoom'] = 12;
      $config['center'] = "50.853, 4.272";
      $config["onload"]="locat();";
      $config['cluster'] = TRUE;
      $config['clusterIcon'] = asset('/assets/img/m');
      $config['clusterGridSize'] = 50;

      $map = new Googlemaps();
      if(!Auth::guest()){
        $collection = Position::all();
        foreach ($collection as $aed){
          $marker = array();
          $lat = $aed->lat;
          $lon = $aed->lon;
          $id = $aed->id;
          $aedname = $aed->getThingName();
          $time = $aed->created_at;

          $marker['position'] = "$lat, $lon";
            $infowindow = $this->createInfoWindow(array("lat" => $lat, "time" => $time, "long" => $lon,"aedName" => $aedname,"token" => $id));

          $marker['infowindow_content'] = $infowindow;    
          $marker["icon"] = asset('/img/picto_heart.png');
          $map->add_marker($marker);
        }
      }

      $map->initialize($config);
      $r = $map->create_map();
      return view('design.home.map',compact('r'));
    }

    public function msgValidateAccount(){
      return view('auth.validate');
    }
}
