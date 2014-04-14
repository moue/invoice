<?php

class InvoicesController extends \BaseController {

	protected $layout = "layouts.dashboard";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoices = Auth::user()->invoice()->get();

		/* Get full invoice query
		$invoices = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->get();
		*/

		$this->layout->content = View::make('invoices.index')->with('invoices', $invoices);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$this->layout->content = View::make('invoices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		// Grab invoice input
		$input = Input::all();
		
		// Set default if checkbox is not checked
		$trade = (isset($input['trade']) ? (int) $input['trade'] : 0);
		$paid = (isset($input['paid']) ? (int) $input['paid'] : 0);
		
		// Create new invoice
		$invoice = new Invoice;
		$invoice->advertiser_id = $input['advertiser_options'];
		$invoice->user_id = $input['user_options'];
		$invoice->notes = $input['notes'];
		$invoice->trade = $trade;
		$invoice->paid = $paid;
		$invoice->save();

		$id = $invoice->id;

		// Determine if an image was uploaded and save the path name
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$name = time() . '-' . $file->getClientOriginalName();
			$path = $file->move(public_path() . '/img/', $name);
		}

		for ($i = 0; $i<2; $i++) {
			$item = new InvoiceItem;
			$item->description = $input['description'];
			$item->image = isset($path) ? $path : "";
			$item->issue_1 = (isset($input['issue_1'][$i]) ? (int) $input['issue_1'][$i] : 0);
			$item->issue_2 = (isset($input['issue_2'][$i]) ? (int) $input['issue_2'][$i] : 0);
			$item->issue_3 = (isset($input['issue_3'][$i]) ? (int) $input['issue_3'][$i] : 0);
			$item->issue_4 = (isset($input['issue_4'][$i]) ? (int) $input['issue_4'][$i] : 0);
			$item->issue_5 = (isset($input['issue_5'][$i]) ? (int) $input['issue_5'][$i] : 0);
			$item->year = $input['year'][$i];
			$item->size_id = $input['size_options'];
			$item->subcost = $input['subcost'];
			$item->discount = $input['discount'];
			$item->cost = $input['cost'];
			$item->invoice()->associate(Invoice::find($id));
			$item->save();
		}


			//$advertiser = $input['advertiser'];
			//Advertiser::find($advertiser)->invoices()->save($invoice);

		return Redirect::route('invoice.show', array($id));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Check that invoice exists
		$invoice = Invoice::findOrFail($id);

		/* Get full invoice query
		$fullinvoice = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->where('invoices.invoice_id','=',$id)
			->get();
		
		Get sales contact associated with invoice
		$sales_contact = Advertiser::find($id)->user;
		return $sales_contact;
		*/
		
		$advertiser = $invoice->advertiser()->first();
		$sales_contact = $advertiser->user()->first();
		$fullinvoice = $invoice->invoiceitem()->get();
		
		// Get total cost using addition
		$totalcost = DB::table('invoice_items')
			->where('invoice_items.invoice_id','=',$id)
			->sum('invoice_items.cost');
		
		$this->layout->content = View::make('invoices.show')
			->with('invoices', $fullinvoice)
			->with('total', $totalcost)
			->with('advertiser', $advertiser)
			->with('sales_contact');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Check that invoice exists
		$invoice = Invoice::findOrFail($id);

		/* Get full invoice query
		$fullinvoice = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->where('invoices.invoice_id','=',$id)
			->get();
		
		Get sales contact associated with invoice
		$sales_contact = Advertiser::find($id)->user;
		return $sales_contact;
		*/
		
		$advertiser = $invoice->advertiser()->first();
		$sales_contact = $advertiser->user()->first();
		$fullinvoice = $invoice->invoiceitem()->get();
		
		// Get total cost using addition
		$totalcost = DB::table('invoice_items')
			->where('invoice_items.invoice_id','=',$id)
			->sum('invoice_items.cost');
		
		$this->layout->content = View::make('invoices.edit')
			->with('invoices', $fullinvoice)
			->with('total', $totalcost)
			->with('advertiser', $advertiser)
			->with('sales_contact');
	

		//$invoice = Invoice::findOrFail($id);

		// Get full invoice query
		//$products= DB::table('invoices')
		//	->where('invoices.invoice_id','=',$id)
		//	->get();

		// Get total cost using addition
		//$totalcost = DB::table('invoices')
		//	->where('invoices.invoice_id','=',$id)
		//	->sum('invoices.cost');

		// Get advertiser information
		//$advertiser = DB::table('advertisers')
		//	->where('advertisers.id', '=', $invoice->advertiser_id)
		//	->first();

		/*$this->layout->content = View::make('invoices.edit')
			->with('advertiser', $advertiser)
			->with('invoice_id', $invoice->invoice_id)
			->with('products', $products)
			->with('total', $totalcost);*/

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