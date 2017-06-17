<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\RegisterToken;
use App\GroupRelation;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'gender'    => 'required',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $validation_token = str_random(30);
        $user =  User::create([
            'name'      => $data['firstname'] . ' ' . $data['lastname'],
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'gender'    => $data['gender'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'validation_token' => $validation_token
        ]);

        $groupRelation = new GroupRelation();
            $groupRelation->user_id = $user->id;
            $groupRelation->group_id = 1;
            $groupRelation->save();
        
        \Mail::to($user->email)->send(new RegisterToken($user));
        return $user;
    }

    public function confirm($confirmationToken){
        $user = User::where('validation_token',$confirmationToken)->first();
            $user->validated = 1;
            $user->validation_token = null;
            $user->save();
        return redirect('/');      
    }
}
