<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Document;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompanyMail
 * 
 * @property int $id
 * @property BigInteger $company_id
 * @property string $mail
 * @property SmallInteger $city_id
 * @property BigInteger $document_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class CompanyMail extends Model
{
	protected $table = 'company_mail';

	protected $casts = [
		'city_id' => 'int',
		'document_id' => 'int',
	];
	
	public function region()
	{
		return $this->belongsTo(Region::class, 'city_id');
	}

	public function document()
	{
		return $this->belongsTo(Document::class);
	}
}