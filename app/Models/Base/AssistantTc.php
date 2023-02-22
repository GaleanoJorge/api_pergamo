<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssistantTc
 * 

 * @property string $agent_number
 * @property string $agent_name
 * @property string $hold
 * @property string $lunch
 * @property string $break_am
 * @property string $break_pm
 * @property string $outgoing_call
 * @property string $bathroom
 * @property string $whatsapp
 * @property string $user_attention
 * @property string $meeting
 * @property string $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class AssistantTc extends Model
{
	protected $table = 'assistant_tc';
}
