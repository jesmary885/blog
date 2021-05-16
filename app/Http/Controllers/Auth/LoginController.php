<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
     
    public function redirectToProvider($driver)
    {
        
        return Socialite::driver($driver)->redirect();
    }

  
    public function handleProviderCallback($driver)
    {
       
       $userSocialite = Socialite::driver($driver)->stateless()->user(); //obtenemos los datos del usuario
      
     $user = User::where('email', $userSocialite->getEmail())->first(); //comprobamos si el email existe 
       if(!$user){ //si el usuario no existe
            $user = User::create([
                'name' => $userSocialite->getName(),
                'email' => $userSocialite->getEmail(),
                'profile_photo_path' => $userSocialite->getAvatar(),
            ]);
        }
        $social_profile = SocialProfile::where('social_id', $userSocialite->getId())
                                       ->where('social_name', $driver)->first();
        if(!$social_profile){
            SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar' => $userSocialite->getAvatar(),

            ]);
        }
        Auth::login($user);
        return redirect()->route('posts.index');
     
    }
}
