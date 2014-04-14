<?php

class PasswordsController extends \BaseController {

	protected $layout = "layouts.main";
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('emails.request');


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Check for correct input format
		$validator = Validator::make(Input::all(), User::$resetrules);

		if($validator->passes()) {
			Password::remind(['email'=>Input::get('email')], function($message){
				$message->subject('Reset Your Password');
			});
			return Redirect::route('forgot.create')->with('message', 'Check your email!');
		}
		else {
			// display error messages
			return Redirect::to('forgot/create')->with('message', 'Email not found')->withErrors($validator)->withInput();
		}

		
	}

	public function reset($token)
	{	
		$this->layout->content= View::make('emails/reset')->withToken($token);
	}

	public function postReset()
	{
		$creds = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		);

		return Password::reset($creds, function($user, $password){
			$user->password = Hash::make($password);
			$user->save();

			return Redirect::route('users/login');
		});
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}