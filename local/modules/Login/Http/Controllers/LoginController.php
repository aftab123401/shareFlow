<?php namespace Modules\Login\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Input;
use Auth;
use Session;

class LoginController extends Controller {
	
	public function index()
	{
		return view('login::index');
	}
        public function login() {

        $email = Input::get('email');
        $password = Input::get('password');
       
        //for multi auth
        if (Auth::guard('users')->attempt(['email' => $email, 'password' => $password])) {
           
            Session::put('email', $email);
            return redirect('purchase');
        } else {
           
            Session::flash('error_message', 'Invalid username or password.');
            return redirect('login')->withInput();
        }
    }
	
}