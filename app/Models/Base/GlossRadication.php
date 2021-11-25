<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
 
use App\Models\GlossResponse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GlossRadication
 * 
 * @property int $id
 * @property int $status_id
 * @property int $gloss_ambit_id
 * @property BigInteger $user_id
 * @property string $name
 * @property string $file
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *  
 * @property Collection|GlossResponse[] $GlossResponse
 * @property Collection|ObjetionCodeResponse[] $ObjetionCodeResponse
 *
 * @package App\Models\Base
 */
class GlossRadication extends Model
{
	protected $table = 'gloss_radication';

 
	public function gloss_response()
	{
		return $this->belongsTo(GlossResponse::class);
	} 
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
