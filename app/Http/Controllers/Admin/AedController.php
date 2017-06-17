<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Aed;
use App\PendingAed;
use App\ScoreRelation;
use App\Score;

class AedController extends Controller
{
    public function getList()
    {
        $aeds = Aed::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.aeds.list', compact('aeds'));
    }

    public function control(PendingAed $pendingAed, $aedname){
    	//check if user has a point
    	$userScore = ScoreRelation::where('user_id', $pendingAed->user_id)->first();

    	if($userScore == null){
    		$userScore = new ScoreRelation();
    		$userScore->user_id = $pendingAed->user_id;
    	}

    	//check and edit pending_aed;
		switch ($aedname) {
		    case "aedname":
		    	$pendingAed->aedname_v = 1;
		    	$score = Score::where('identifier', 'aedname')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "model":
		        $pendingAed->model_v = 1;
		        $score = Score::where('identifier', 'model')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "street_fr":
		        $pendingAed->street_fr_v = 1;
		        $score = Score::where('identifier', 'street_fr')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "num":
		        $pendingAed->num_v = 1;
		        $score = Score::where('identifier', 'num')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "postcode":
		        $pendingAed->postcode_v = 1;
		        $score = Score::where('identifier', 'postcode')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "municipality_fr":
		        $pendingAed->municipality_fr_v = 1;
		        $score = Score::where('identifier', 'municipality_fr')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "lat":
		        $pendingAed->lat_v = 1;
		        $score = Score::where('identifier', 'lat')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "lon":
		        $pendingAed->lon_v = 1;
		        $score = Score::where('identifier', 'lon')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "aedexpiration":
		        $pendingAed->aedexpiration_v = 1;
		        $score = Score::where('identifier', 'aedexpiration')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;		    
		    case "infplace_fr":
		        $pendingAed->infplace_fr_v = 1;
		        $score = Score::where('identifier', 'infplace_fr')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "img_a":
		        $pendingAed->img_a_v = 1;
		        $score = Score::where('identifier', 'img_a')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "img_b":
		        $pendingAed->img_b_v = 1;
		        $score = Score::where('identifier', 'img_b')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "img_c":
		        $pendingAed->img_c_v = 1;
		        $score = Score::where('identifier', 'img_c')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		    case "img_d":
		        $pendingAed->img_d_v = 1;
		        $score = Score::where('identifier', 'img_d')->first();
		    	$userScore->score = $userScore->score + $score->score;
		        break;
		}

		$pendingAed->save();
		$userScore->save();

    	return back();
    }    


    public function refuseControl(PendingAed $pendingAed, $aedname){
    	//check and edit pending_aed;
		switch ($aedname) {
		    case "aedname":
		    	$pendingAed->aedname_v = 2;
		        break;
		    case "model":
		        $pendingAed->model_v = 2;
		        break;
		    case "street_fr":
		        $pendingAed->street_fr_v = 2;
		        break;
		    case "num":
		        $pendingAed->num_v = 2;
		        break;		    
		    case "postcode":
		        $pendingAed->postcode_v = 2;
		        break;		    
		    case "municipality_fr":
		        $pendingAed->municipality_fr_v = 2;
		        break;		    
		    case "lat":
		        $pendingAed->lat_v = 2;
		        break;		    
		    case "lon":
		        $pendingAed->lon_v = 2;
		        break;		    
		    case "aedexpiration":
		        $pendingAed->aedexpiration_v = 2;
		        break;		    
		    case "infplace_fr":
		        $pendingAed->infplace_fr_v = 2;
		        break;
	    	case "img_a":
		        $pendingAed->img_a_v = 1;
		        break;
		    case "img_b":
		        $pendingAed->img_b_v = 1;
		        break;
		    case "img_c":
		        $pendingAed->img_c_v = 1;
		        break;
		    case "img_d":
		        $pendingAed->img_d_v = 1;
		        break;
		}

		$pendingAed->save();

    	return back();
    }


    public function show(Aed $aed){
        return view('admin.aeds.show', compact('aed'));
    }

    public function destroy(Aed $aed)
    {
        $aed->delete();
        return "success";
    }   
}
