<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class ProviderLogInController extends Controller
{
    // login/{provider}
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    // login/{provider}/callback
    public function callback($provider) {
        $Suser = Socialite::driver($provider)->user();
        
        $user = User::updateOrCreate([
            'email' => $Suser->email,
        ], [
            'name' => $Suser->name,
            'email' => $Suser->email,
            'password' => Hash::make('password123456'),
        ]);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
