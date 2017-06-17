<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Logger;
use App\GroupRelation;
use Auth;

class GoogleConnexionController extends Controller
{
   
    public function googleLogin(Request $request)  {
        $google_redirect_url = route('glogin');
        $gClient = new \Google_Client();
        $gClient->setApplicationName("citizen-map");
        $gClient->setClientId("1085761354907-1vj4d29l73svq1qhj7288g4mnkcnci8h.apps.googleusercontent.com");
        $gClient->setClientSecret("PD-dMaCd2qiII82nohqea4UO");
        $gClient->setRedirectUri($google_redirect_url);
        $gClient->setDeveloperKey(config('services.google.api_key'));
        $gClient->setScopes(array(
            'https://www.googleapis.com/auth/plus.me',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
        ));
        $google_oauthV2 = new \Google_Service_Oauth2($gClient);
        if ($request->get('code')){
            $gClient->authenticate($request->get('code'));
            $request->session()->put('token', $gClient->getAccessToken());
        }
        if ($request->session()->get('token'))
        {
            $gClient->setAccessToken($request->session()->get('token'));
        }

        if ($gClient->getAccessToken())
        {
            //For logged in user, get details from google using access token
            $guser = $google_oauthV2->userinfo->get();  

            $exist = User::where('google_id', $guser['id'])->first();
            $email = $guser['email'];
			if(!$exist){
				if((isset($email))&&(!empty($email))) {
					$user_by_email = User::where('email', $email)->first();

					if ($user_by_email) {
                        $user_by_email->google_id = $guser['id'];
						$user_by_email->avatar = $guser['picture'];
						$user_by_email->save();
						$user = $user_by_email;
					} else {
						$user = new User();
						if(isset($guser['name'])) $user->name = $guser['name'];
						if(isset($guser['givenName'])) $user->firstname = $guser['givenName'];
						if(isset($guser['familyName'])) $user->lastname = $guser['familyName'];
						if(isset($guser['picture'])) $user->avatar = $guser['picture'];
						if(isset($email)) $user->email = $email;
                        $user->google_id = $guser['id'];
						$user->validated = 1;
						$user->save();
                        $groupRelation = new GroupRelation();
                            $groupRelation->user_id = $user->id;
                            $groupRelation->group_id = 1;
                            $groupRelation->save();
					}

					Auth::login($user);
				}
			} else {
				Auth::login($exist);
				$user = $exist;
			}

            $logger = new Logger();
                $logger->user_id =  Auth::user()->id;
                $logger->action =  'Log in';
                $logger->save();

         	return redirect('/');          
        } else
        {
            //For Guest user, get google login url
            $authUrl = $gClient->createAuthUrl();
            return redirect()->to($authUrl);
        }
    }
}