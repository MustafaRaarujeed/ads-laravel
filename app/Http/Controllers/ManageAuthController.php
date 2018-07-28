<?php

namespace App\Http\Controllers;

use App\User;
use App\Manager;
use App\Events\LoginEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageAuthController extends Controller
{
	/**
	 * [login description]
	 * @return [type] [description]
	 */
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('ads.index');
        }
    	return view('manage.auth.login');
    }

    /**
     * [postLogin description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postLogin(Request $request)
    {
        // Define Form Rules
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        // Validate request
        $this->validate($request, $rules);

        // Define Auth Rules
        $authRules = [
            'email' => $request['email'],
            'password' => $request['password'],
            'userable_type' => Manager::class,
        ];

        if(Auth::attempt($authRules)) {
            // Fire Event to log success
            event(new LoginEvent($request, "success"));
            return redirect()->route('ads.index');
        }

        // Fire Event to log failed
        event(new LoginEvent($request, "fail"));
        return redirect()->back()->withErrors('The Email and Password Combination are Invalid');
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout()
    {
        Auth::logout();
        \Session::flush();
        return redirect()->route('login.get');
    }

}
