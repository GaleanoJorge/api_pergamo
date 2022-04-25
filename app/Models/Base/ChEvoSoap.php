<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChEvoSoap
 * 
 * @property int $id
 * @property string $subjective
 * @property string $objective
 * @property string $analisys
 * @property string $plan
 * @property BigInteger $type_record_id
 * @property BigInteger $ch_record_id

 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChEvoSoap extends Model
{
	protected $table = 'ch_evo_soap';
}
