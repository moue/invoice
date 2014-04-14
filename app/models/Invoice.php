<?php

class Invoice extends Eloquent {
	
	public static $rules = array(
		'id'=>'exists:invoices,id'
	);

	public function advertiser() {
		return $this->belongsTo('Advertiser');
	}

	public function invoiceitem() {
		return $this->hasMany('InvoiceItem');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}

?>