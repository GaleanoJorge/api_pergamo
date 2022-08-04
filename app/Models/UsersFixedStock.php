<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\UsersFixedStock as BaseUsersFixedStock;

class UsersFixedStock extends BaseUsersFixedStock
{
	protected $fillable = [
		'fixed_stock_id',
		'user_id',
	];
}
