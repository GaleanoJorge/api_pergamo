<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\ChTypeRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LanguageTl
 * 
 * @property int $id
 * @property string $phonetic_phonological
 * @property string $syntactic
 * @property string $morphosyntactic
 * @property string $semantic
 * @property string $pragmatic
 * @property string $reception
 * @property string $coding
 * @property string $decoding
 * @property string $production
 * @property string $observations
 * 
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class LanguageTl extends Model
{
	protected $table = 'language_tl';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
