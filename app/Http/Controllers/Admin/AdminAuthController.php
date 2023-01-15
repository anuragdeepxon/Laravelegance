<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect($this->redirectTo);
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function showDashboard()
    {
        return view('admin.dashboard.index');
    }
}
