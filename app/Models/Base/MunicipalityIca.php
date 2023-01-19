<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Municipality;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class MunicipalityIca
 
 * 
 * @property int $id
 * @property string $file
 * @property double $value
 * @property unsignedBigInteger $municipality_id
 * @property int $year
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class MunicipalityIca extends Model
{
	protected $table = 'municipality_ica';

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}
	
}
