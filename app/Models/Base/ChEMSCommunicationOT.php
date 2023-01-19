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
 * Class ChEMSCommunicationOT
 * 
 * @property int $id
 * @property string $community
 * @property string $relatives
 * @property string $friends
 * @property string $health
 * @property string $shopping
 * @property string $foods
 * @property string $bathe
 * @property string $dress
 * @property string $animals

 * @property unsignedBigInteger type_record_id 
 * @property unsignedBigInteger ch_record_id 
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * 
 *
 * @package App\Models\Base
 */
class ChEMSCommunicationOT extends Model
{
	protected $table = 'ch_e_m_s_communication_o_t';

	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
