<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ChRecord;
use App\Models\OxigenAdministrationWay;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OxigenControl
 * 
 * @property int $id
 * @property string $oxigen_flow
 * @property string $duration_minutes
 * @property int $oxigen_administration_way_id
 * @property int $type_record_id
 * @property int $ch_record_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class OxigenControl extends Model
{
	protected $table = 'oxigen_control';

	public function oxigen_administration_way()
	{
		return $this->belongsTo(OxigenAdministrationWay::class);
	}

	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}
}
