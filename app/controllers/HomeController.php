<?php
use Helpers\Helper;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('Home.home');
	}

    public function getLogin(){
        return View::make('Home.login');
    }

    public function  postLogin(){
        $input = Input::all();

        $rules =array(
            'email' => 'required',
            'password' => 'required'
        );

        $valid = Validator::make($input,$rules);

        if($valid->fails()){
            return Redirect::to('login')->withErrors($valid);
        }else{
            $credentials = array('email' => $input['email'], 'password' => $input['password']);

            if(Auth::attempt($credentials)){
                if(Auth::user()->role == "admin"){
                    return Redirect::to('/admin')->with('message', 'Successfully logged into
                     your Admin account');;
                }
            }else{
                return Redirect::to('login');
            }
        }
    }

    public function getRegister(){
        $roles = array(
            'admin' => 'admin',
            'pharmacy1' => 'Manager(Pharmacy_1)',
            'pharmacy2' => 'Manager(Pharmacy_2)',
            'pharmacy3' => 'Manager(Pharmacy_3)',
            'pharmacy4' => 'Manager(Pharmacy_4)',
            'pharmacy5' => 'Manager(Pharmacy_5)',
            'pharmacy6' => 'Manager(Pharmacy_6)',
            'pharmacy7' => 'Manager(Pharmacy_7)',
            'pharmacy8' => 'Manager(Pharmacy_8)',
        );
        return View::make('Home.register')
                    ->with('roles',$roles);
    }

    public function postUser(){
        $input = Input::all();

        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'confirm' => 'required|same:password',
            'role' => 'required'
        );

        $valid = Validator::make($input, $rules);

        if($valid->passes()){
            $password = $input['password'];
            $password = Hash::make($password);

            $user = new User();
            $user->firstname = $input['firstname'];
            $user->lastname = $input['lastname'];
            $user->email = $input['email'];
            $user->role = $input['role'];
            $user->password = $password;
            $user->save();

            return Redirect::to('/admin')->with('message', 'User Created');
        }else{
            return Redirect::to('register')->withInput()->withErrors($valid);
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/')->with('message', 'User logged out');;
    }
}
