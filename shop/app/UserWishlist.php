<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model {
	protected $table = 'wishlist';
	//protected $primaryKey = 'id';
	public $timestamps = false;
}
