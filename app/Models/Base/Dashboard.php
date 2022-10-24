<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dashboard
 * 
 * @property int $id
 * @property string $name
 * @property string $link
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class Dashboard extends Model
{
	protected $table = 'dashboard';
}
