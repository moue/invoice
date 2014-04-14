<?php

use helpers\services\AdvertiserManagerService;

class AdvertisersController extends \BaseController {

	protected $layout = 'layouts.dashboard';
	protected $advertiserManager;

	public function __construct(AdvertiserManagerService $advertiserManager) 
	{
		$this->advertiserManager = $advertiserManager;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$username = $user->first_name . " " . $user->last_name;
		$all_advertisers = Advertiser::all();
		$my_advertisers = $user->advertisers;

		$this->layout->content = View::make('advertisers.index')
			->with('all_advertisers', $all_advertisers)
			->with('my_advertisers', $my_advertisers)
			->with('username', $username);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$user = Auth::user();
		$user_options = User::select(DB::raw('concat (first_name," ",last_name) as full_name,id'))->lists('full_name', 'id');
		$this->layout->content = View::make('advertisers.create')->with('user_options', $user_options);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input['telephone'] = preg_replace('/\D+/', '', $input['telephone']);

		try 
		{
			$this->advertiserManager->make($input);	
		} 
		catch(helpers\validators\ValidationException $e) 
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		return Redirect::to('advertiser');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$advertiser = Advertiser::findOrFail($id); // Find advertiser
		$invoices = $advertiser->invoices; // Find all invoices associated with advertiser
		$this->layout->content = View::make('advertisers.show')->with('advertiser', $advertiser)->with('invoices', $invoices);
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$advertiser = Advertiser::findOrFail($id); // Find advertiser
		$sales_contact = $advertiser->user; // Find all users associated with advertiser
		$invoices = $advertiser->invoices; // Find all invoices associated with advertiser
		
		$user = Auth::user();
		$user_options = User::select(DB::raw('concat (first_name," ",last_name) as full_name,id'))->lists('full_name', 'id');
		
		$this->layout->content = View::make('advertisers.edit')->with('advertiser', $advertiser)->with('user_options', $user_options);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$input['telephone'] = preg_replace('/\D+/', '', $input['telephone']);

		try 
		{
			$this->advertiserManager->update($input, $id);	
		} 
		catch(helpers\validators\ValidationException $e) 
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		return Redirect::to('advertiser');
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