<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Status;
use App\Models\ObjetionResponse;
use App\Models\ObjetionCodeResponse;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossResponse
 * 
 * @property int $id
 * @property int $status_id
 * @property int $gloss_ambit_id
 * @property string $name
 * @property string $file
 * @property int $justification_status
 * @property BigInteger $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *  
 * @property Collection|ObjetionResponse[] $ObjetionResponse
 * @property Collection|ObjetionCodeResponse[] $ObjetionCodeResponse
 *
 * @package App\Models\Base
 */
class ConciliationResponse extends Model
{
	protected $table = 'conciliation_response';

 
	public function objetion_response()
	{
		return $this->belongsTo(ObjetionResponse::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function objetion_code_response()
	{
		return $this->belongsTo(ObjetionCodeResponse::class);
	}
}
