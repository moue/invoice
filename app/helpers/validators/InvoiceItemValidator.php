<?php namespace helpers\validators;

class InvoiceItemValidator extends Validator {
	
	protected static $rules = [
	    'description'=>'required',
	    'year'=>'required|numeric|min:4',
	    'subcost'=>'required|numeric',
	    'cost'=>'required|numeric'
	];
}

?>