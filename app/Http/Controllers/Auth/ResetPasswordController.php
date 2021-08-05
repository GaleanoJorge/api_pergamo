<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Auth\CustomResetsPasswords;

class ResetPasswordController extends Controller
{
    
    use CustomResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function home()
    {
        if (Auth::check()) {
            return view('auth.passwords.home');
        }

        return redirect('/');
    }
}
