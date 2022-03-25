<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietMenu;
use App\Models\Admissions;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietOrder
 * 
 * @property int $id
 * @property BigInteger $admissions_id
 * @property BigInteger $diet_menu_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietOrder extends Model
{
	protected $table = 'diet_order';

	
	public function admissions()
	{
		return $this->belongsTo(Admissions::class);
	}
	public function diet_menu()
	{
		return $this->belongsTo(DietMenu::class);
	}
}
