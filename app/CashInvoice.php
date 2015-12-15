<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashInvoice extends Model
{
    //
    protected $table = 'cash_invoice';
    public $timestamps = false;
    const STATUS_ACTIVE = 1 ;

    public function employee()
    {
    	return $this->belongsTo('App\User');
    }
   
    public function details()
    {
        return $this->hasMany('App\CashInvoiceDetail' , 'ci_no');
    }
}
