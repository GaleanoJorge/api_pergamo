<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChEMarchFT
 * 
 * @property int $id
 * @property string $independent
 * @property string $help
 * @property string $spastic
 * @property string $ataxic
 * @property string $contact
 * @property string $response
 * @property string $support_init
 * @property string $support_finish
 * @property string $prebalance
 * @property string $medium_balance
 * @property string $finish_balance
 * @property string $observation
 * 
 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMarchFT extends Model
{
	protected $table = 'ch_e_march_f_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}






