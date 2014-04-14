<?php 

class Advertiser extends Eloquent {
	
	protected $table = 'advertisers';
	protected $guarded = ['id'];
	
	public function invoices() {
		return $this->hasMany('Invoice');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}

?>