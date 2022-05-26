<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReasonExit
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ReasonExit extends Model
{
    protected $table = 'reason_exit';
}
