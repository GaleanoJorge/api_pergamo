<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NeighborhoodOrResidence
 * 
 * @property int $id
 * @property string $name
 * @property BigInteger $municipality_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class NeighborhoodOrResidence extends Model
{
	protected $table = 'neighborhood_or_residence';

	
}
