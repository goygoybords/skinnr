<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer';
    public $timestamps = false;
    const STATUS_ACTIVE = 1 ;

    public function invoice()
    {
    	return $this->hasMany('App\CashInvoice' , 'customer_id');
    }
}
