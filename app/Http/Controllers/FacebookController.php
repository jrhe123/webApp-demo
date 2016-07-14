<?php

namespace App\Http\Controllers;

use App\Http\Model\Patient;
use Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
//        $userPic = $user->getAvatar();
//        $userName = $user->getName();
//        $userEmail =  $user->getEmail();

        /*unset the previous session*/
        if(session('user')){
            session(['user'=>null]);
        }elseif(session('fb_user')){
            session(['fb_user'=>null]);
        }
        /*set session*/
        session(['fb_user'=>$user]);

        return redirect('admin');
    }
}