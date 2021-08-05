<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EventConcept;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventTicket
 * 
 * @property int $id
 * @property int $event_concept_id
 * @property int $passenger_user_id
 * @property string $origin
 * @property string $destination
 * @property string $back
 * @property Carbon $departure_date
 * @property Carbon $return_date
 * @property string $departure_observations
 * @property string $return_observations
 * @property string $change_observations
 * @property string $ticket_number
 * @property string $airline
 * @property float $total_value
 * @property string $grade
 * @property string $ticket_state
 * @property string $invoice_number
 * @property Carbon $invoice_date
 * @property float $administrative_fee
 * @property float $iva
 * @property float $ticket_value
 * @property float $discount
 * @property float $airport_fee
 * @property float $fuel
 * @property float $others_taxes
 * @property float $iva_administrative_fee
 * @property string $flight_review
 * @property string $observations
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EventConcept $event_concept
 * @property User $user
 *
 * @package App\Models\Base
 */
class EventTicket extends Model
{
	protected $table = 'event_tickets';

	protected $casts = [
		'event_concept_id' => 'int',
		'passenger_user_id' => 'int',
		'total_value' => 'float',
		'administrative_fee' => 'float',
		'iva' => 'float',
		'ticket_value' => 'float',
		'discount' => 'float',
		'airport_fee' => 'float',
		'fuel' => 'float',
		'others_taxes' => 'float',
		'iva_administrative_fee' => 'float'
	];

	protected $dates = [
		'departure_date',
		'return_date',
		'invoice_date'
	];

	public function event_concept()
	{
		return $this->belongsTo(EventConcept::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'passenger_user_id');
	}
}
