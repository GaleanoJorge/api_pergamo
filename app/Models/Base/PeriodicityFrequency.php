<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriodicityFrequency
 * 
 * @property int $id
 * @property string $name
 * @property integer $days
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class PeriodicityFrequency extends Model
{
	protected $table = 'periodicity_frequency';

}
