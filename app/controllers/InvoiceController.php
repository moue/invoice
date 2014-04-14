<?php 

class InvoicesController extends BaseController {
	public function getIndex() {
		$id = Input::get('id');
		return Invoice::find($id)->invoices;
	}


	public function getAll() {
		return Invoice::all();
	}

	public function postIndex() {
		if(Input::has('advertiser', 'cost')){
			$input = Input::all();
		}

		if ($input['advertiser'] == '' || $input['cost'] == '') {
 		   return Response::make('You need to fill all of the input fields', 400);
		}
		else {
			$invoice = new Invoice;
			$invoice->advertiser = $input['advertiser'];
			$invoice->cost = $input['cost'];

			$advertiser = $input['advertiser'];
			Advertiser::find($advertiser)->invoices()->save($invoice);

			return $invoice;
		}
	}

	public function deleteIndex() {
        $advertiser = Input::get('advertiser');
        $invoice = Advertiser::find($advertiser);
        $Invoice->delete();
         
        return $advertiser;
    }
}

?>
