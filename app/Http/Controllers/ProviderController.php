<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;


class ProviderController extends Controller
{
    public function loginProvider(Request $request)
    {
        $provider = $request->provider;

        return Socialite::driver($provider)->redirect();
    }

    public function callbackProvider(Request $request)
    {

        $provider = $request->provider;

        $user = Socialite::driver($provider)->stateless()->user();

        $finduser = User::where('provider_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect('/home');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email ? $user->email : "{$user->id}@{$provider}.com",
                'password' => bcrypt('Raditya@123'),
                'isActive' => true,
                'oauth_type' => $provider,
                'provider_id' => $user->id
            ]);

            Auth::login($newUser);
            return redirect('/home');
        }
    }
}
