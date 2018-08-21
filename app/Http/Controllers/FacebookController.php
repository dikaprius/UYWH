<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\FacebookAccountService;
use App\Services\LinkedinAccountService;
use Exception;
use App\User;
use Auth;

class FacebookController extends Controller
{
    public function redirect()
    {
      return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request, FacebookAccountService $service)
    {
        if ($request->has('error')){
        return redirect()->to('/register');
      }

        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }

    public function linkedinRedirect()
    {
      return Socialite::driver('linkedin')->redirect();
    }

    public function linkedinCallback(Request $request, LinkedinAccountService $linkservice)
    {
        if ($request->has('error')){
        return redirect()->to('/register');
      }

        $user = $linkservice->createOrGetUser(Socialite::driver('linkedin')->user());
        auth()->login($user);
        return redirect()->to('/home');

    }

}
