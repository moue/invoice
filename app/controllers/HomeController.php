<?php

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
	public function __construct() {
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	protected $layout = 'layouts.dashboard';

	public function getDashboard() {
		// Get user id
		$id = Auth::user()->id;

		// Get total amount of revenue user has brought in
		$revenue = DB::table('invoices')
			->where('invoices.user_id','=',$id)
			->sum('invoices.cost');

		// Get total amount of accounts that user manages
		$accounts_owned = Auth::User()->advertisers->count();

		// Get total amount of invoices that have been sent
		$sent = DB::table('invoices')
			->where('invoices.user_id','=',$id)
			->count();

		// Get total amount of invoices that are have been paid
		$paid = DB::table('invoices')
			->where('invoices.user_id','=',$id)
			->sum('invoices.paid');
		
		$unpaid = $sent-$paid;

		$this->layout->content = View::make('dashboard.index')
			->with('revenue', $revenue)
			->with('accounts_owned', $accounts_owned)
			->with('sent', $sent)
			->with('unpaid', $unpaid);
	}
}