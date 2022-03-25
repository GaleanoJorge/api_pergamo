<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\DietSuppliesOutput;
use App\Models\DietMenu;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DietSuppliesOutputMenu
 * 
 * @property int $id
 * @property double $amount
 * @property BigInteger $diet_supplies_output_id
 * @property BigInteger $diet_menu_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class DietSuppliesOutputMenu extends Model
{
	protected $table = 'diet_supplies_output_menu';

	
	public function diet_supplies_output()
	{
		return $this->belongsTo(DietSuppliesOutput::class);
	}
	public function diet_menu()
	{
		return $this->belongsTo(DietMenu::class);
	}
}
