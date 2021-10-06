<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeAssets
 
 * 
 * @property int $id
 * @property string $name
 * @property int $fixed_assets_id
 * @property string $plate_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class TypeAssets extends Model
{
	protected $table = 'type_assets';

	
}
