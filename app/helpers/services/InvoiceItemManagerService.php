<?php namespace helpers\services;

use helpers\validators\InvoiceItemValidator;
use helpers\validators\ValidationException;
use InvoiceItem;

class AdvertiserManagerService {
	
	protected $validator;

	public function __construct(AdvertiserValidator $validator) {
		$this->validator = $validator;
	}

	public function make(array $attributes) {
		if($this->validator->isValid($attributes)) {
			$invoice_item = new InvoiceItem;	
			$invoice_item->description = $attributes['description'];
			$advertiser->save();
			return true;	
		}

		throw new ValidationException('Advertiser validation failed', $this->validator->getErrors());
	}

	public function update(array $attributes, $id) {
		if($this->validator->isValid($attributes)) {
			$advertiser = Advertiser::find($id);
			$advertiser->advertiser = $attributes['advertiser'];
			$advertiser->contact = $attributes['contact'];
			$advertiser->position = $attributes['position'];
			$advertiser->telephone = $attributes['telephone'];
			$advertiser->email = $attributes['email'];
			$advertiser->address = $attributes['address'];
			$advertiser->city = $attributes['city'];
			$advertiser->state = $attributes['state'];
			$advertiser->zipcode = $attributes['zipcode'];
			$advertiser->user_id = $attributes['user_options'];
			$advertiser->save();
			return true;	
		}

		throw new ValidationException('Advertiser validation failed', $this->validator->getErrors());
	}
}

?>