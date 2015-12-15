<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashInvoiceDetail extends Model
{
    //
    protected $table = 'cash_invoice_detail';
    public $timestamps = false;
    const STATUS_ACTIVE = 1 ;

    public function product()
    {
    	return $this->belongsTo('App\Product' , 'product_id');
    }
    public function invoice()
    {
    	return $this->belongsTo('App\CashInvoice', 'ci_no');
    }
}
