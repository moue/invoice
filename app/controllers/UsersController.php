<?php 

Class UsersController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('guest', array('only'=>array('getLogin')));
		$this->beforeFilter('guest', array('only'=>array('getRegister')));
	}

	protected $layout = "layouts.main";

	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes()) {
			// save user in db
			$user = new User;
		    $user->first_name = Input::get('first_name');
		    $user->last_name = Input::get('last_name');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		}
		else {
			// display error messages
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		$this->layout->content = View::make('users.login');
	}

	public function postSignin() {
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($user)) {
    		return Redirect::to('/dashboard');
		} 
		else {
		    return Redirect::to('users/login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	public function getCheck() {
		if(Auth::check()) {
			$this->layout->content = 'Still logged in...';
		}
		else {
			$this->layout->content = 'Logged out...';
		}
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Goodbye!');
	}
}

?>
