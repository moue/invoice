<?php namespace helpers\validators;

class AdvertiserValidator extends Validator {
	
	protected static $rules = [
		'advertiser'=>'required|min:2',
	    'contact'=>'required|min:2',
	    'position'=>'required|min:2',
	    'telephone'=>'required|integer|min:7',
	    'email'=>'required|email',
	    'address'=>'required|min:2',
	    'city'=>'required|alpha',
	    'state'=>'required|alpha',
	    'zipcode'=>'required|numeric|min:2',
	    'user_options'=>'required'
	];
}

?>