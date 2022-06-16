<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedLoan as BaseFixedLoan;

class FixedLoan extends BaseFixedLoan
{
	protected $fillable = [
		'amount',
		'amount_damaged',
		'amount_provition',
		'fixed_add_id',
		'responsible_user_id',
		'observation',
	];
}
