<?php

namespace App\Http\Controllers;

use App\Aed;
use Illuminate\Http\Request;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\MapTypeId;
use Ivory\GoogleMap\Helper\Builder\MapHelperBuilder;
use Ivory\GoogleMap\Helper\Builder\ApiHelperBuilder;
use Ivory\GoogleMap\Control\FullscreenControl;
use Ivory\GoogleMap\Overlay\Marker;
use Ivory\GoogleMap\Overlay\Animation;
use Ivory\GoogleMap\Overlay\Icon;
use Ivory\GoogleMap\Overlay\Symbol;
use Ivory\GoogleMap\Overlay\SymbolPath;
use Ivory\GoogleMap\Overlay\MarkerShape;
use Ivory\GoogleMap\Overlay\MarkerShapeType;
use Ivory\GoogleMap\Overlay\InfoWindow;
use Ivory\GoogleMap\Overlay\InfoWindowType;
use Ivory\GoogleMap\Overlay\MarkerClusterType;
use Ivory\GoogleMap\Event\MouseEvent;

use App\PendingAed;
use App\Thing;

class AedController extends Controller
{
    public function getThingInfo(Thing $thing){
        return [
            'thingname' => $thing->name,
            'type' => $thing->type
        ];
    }

    public function getAedInfo(Aed $aed){
        return ['aedname' => $aed->aedname, 
            'street_fr' => $aed->street_fr,
            'municipality_fr' => $aed->municipality_fr,
            'num' => $aed->num,
            'postcode' => $aed->postcode,
            'lat' => $aed->lat,
            'lon' => $aed->lon,
            'model' => $aed->model,
            'aedexpiration' => $aed->aedexpiration,
            'infplace_fr' => $aed->infplace_fr,
        ];
    }

    public function index()
    {
    	$fullscreenControl = new FullscreenControl();
    	$coordBxl = "50.853, 4.272";
        $map = new Map();
        $map->setVariable('map');
        $map->setCenter(new Coordinate($coordBxl));
        $mapOptions = [
        				'mapTypeId'=> MapTypeId::ROADMAP,
        				'zoom'     => 10
        			  ];
       	
        $map->setMapOptions($mapOptions);
        $map->setStylesheetOptions(array(
        		'width'  => '100%',
        		'height' => '100%',
        ));
        
        //add markers
        $collection = Thing::all();
        foreach ($collection as $thing){
        	$marker = new Marker(
        			new Coordinate($thing->lat,$thing->lon),
        			Animation::DROP,
        			new Icon(asset('/img/picto_heart.png')),
        			new Symbol(SymbolPath::CIRCLE),
        			new MarkerShape(MarkerShapeType::CIRCLE, [1.1,2.1,1.4]),
        			['clickable' => true]
        			);
        	$infoWindow = new InfoWindow($thing->name);
        	$infoWindow->setType(InfoWindowType::INFO_BOX);
        	$infoWindow->setOpenEvent(MouseEvent::CLICK);
        	$marker->setInfoWindow($infoWindow);
        	$map->getOverlayManager()->addMarker($marker);
        }
         
        $map->getOverlayManager()->getMarkerCluster()->setType(MarkerClusterType::MARKER_CLUSTERER);
        $map->getControlManager()->setFullscreenControl($fullscreenControl);
        $mapHelper = MapHelperBuilder::create()->build();
        $apiHelper = ApiHelperBuilder::create()->setKey(config('services.google.api_key'))->build();
        return view('front.home',compact('map','mapHelper','apiHelper'));
    }

    public function 

}
