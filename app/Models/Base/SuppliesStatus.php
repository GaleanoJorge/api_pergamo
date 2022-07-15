<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class SuppliesStatus extends Model
{
	protected $table = 'supplies_status';

}
