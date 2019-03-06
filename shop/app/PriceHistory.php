<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{
    protected $table = 'buyingpricehistory';
	//protected $primaryKey = 'id';
	public $timestamps = false;
}
