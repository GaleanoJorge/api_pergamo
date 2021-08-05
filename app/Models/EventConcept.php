<?php

namespace App\Models;

use App\Models\Base\EventConcept as BaseEventConcept;
use App\Models\EventTicket;

class EventConcept extends BaseEventConcept
{
	protected $fillable = [
		'concept_id',
		'event_id',
		'event_day_id',
		'planned_quantity',
		'planned_unit_value',
		'real_date',
		'real_quantity',
		'real_unit_value',
		'ticket_code',
		'evidence_path'
	];

	protected $casts = [
		'real_date' => 'date:Y-m-d'
	];

    public function getEvidencePathAttribute($value) {
        if($value){
            return asset('storage/'.$value);
        }else{
            return null;
        }
    }

	public static function standarStore(array $data): self
    {
        return self::create($data);
    }

	public static function standarUpdate(array $data, int $id): self
    {
		self::where('id', $id)->update($data);
        return self::find($id);
    }

    public static function updateRealTickets(int $id){
	    $realValue=EventTicket::where('event_concept_id',$id)->sum('total_value');
	    $data=['real_quantity'=>1 , 'real_unit_value'=>$realValue];
        self::where('id', $id)->update($data);
    }
}
