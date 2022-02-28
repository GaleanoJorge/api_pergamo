<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietConsistency;
use App\Models\DietMenuType;
use App\Models\DietWeek;
use App\Models\DietDay;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietMenu
 * 
 * @property int $id
 * @property double $name
 * @property BigInteger $diet_consistency_id
 * @property BigInteger $diet_menu_type_id
 * @property BigInteger $diet_week_id
 * @property BigInteger $diet_day_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietMenu extends Model
{
	protected $table = 'diet_menu';


	public function diet_consistency()
	{
		return $this->belongsTo(DietConsistency::class);
	}
	public function diet_menu_type()
	{
		return $this->belongsTo(DietMenuType::class);
	}
	public function diet_week()
	{
		return $this->belongsTo(DietWeek::class);
	}
	public function diet_day()
	{
		return $this->belongsTo(DietDay::class);
	}
}
