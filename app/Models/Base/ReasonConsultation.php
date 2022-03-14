<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id
 * @property BigInteger $admissions_id
 * @property string $symptoms
 * @property boolean $respiratory_issues
 * @property boolean $covid_contact
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Category[] $categories
 *
 * @package App\Models\Base
 */
class ReasonConsultation extends Model
{
	protected $table = 'reason_consultation';

}
