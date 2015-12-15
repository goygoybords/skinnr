<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    public $timestamps = false;
    const STATUS_ACTIVE = 1 ;

    public function details()
    {
    	return $this->hasMany('App\CashInvoiceDetail' , 'product_id');
    }
}
