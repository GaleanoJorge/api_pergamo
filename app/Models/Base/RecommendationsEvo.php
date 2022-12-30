<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecommendationsEvo
 * 
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $description

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class RecommendationsEvo extends Model
{
	protected $table = 'recommendations_evo';
}
