<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Campus;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class UserAgreement extends Model
{
	protected $table = 'user_agreement';

	protected $casts = [
		'company_id' => 'int',
		'user_id' => 'int'
	];

	public function campus()
	{
		return $this->belongsTo(Campus::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	
}
