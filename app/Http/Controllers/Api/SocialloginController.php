<?php

namespace App\Http\Controllers\Api;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialloginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallBack()
    {
        $gUser = Socialite::driver('google')->user();
        return $gUser->id;
        /**
         * Try catch to handle data coming from google
         */
        // try {
        //     $gUser = Socialite::driver('google')->user();
        // } catch (\Exception $e) {
        //     return redirect('/login');
        // }

        // /**
        //  * If data is recieved check if user already exists in database using google_token
        //  */

        // $userExists = User::where('google_id', $gUser->token)->first();

        // if ($userExists) {
        //     // Login using google id
        //     Auth::login($userExists, true);
        // } else {
        //     // Create new user and login

        //     $newUser = User::create([
        //         'name' => $gUser->name,
        //         'email' => $gUser->email,
        //         'google_id' => $gUser->token,
        //     ]);

        //     Auth::login($newUser, true);
        // }

        // return redirect()->to('/home');
    }
}
