<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use App\Models\Ostomy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChOstomies
 * 
 * @property int $id
 * @property unsignedBigInteger $ostomy_id
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChOstomies extends Model
{

	protected $table = 'ch_ostomies';
	public function ostomy()
	{
		return $this->belongsTo(Ostomy::class);
	}

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

	

}

