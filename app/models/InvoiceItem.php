<?php

class InvoiceItem extends Eloquent {
	
	protected $table = 'invoice_items';
	
	public function invoice() {
		return $this->belongsTo('Invoice');
	}
}

?>