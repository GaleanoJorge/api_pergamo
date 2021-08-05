<?php

namespace App\Models;

use App\Models\Base\HistoryEventApproved as BaseHistoryEventApproved;

class HistoryEventApproved extends BaseHistoryEventApproved
{
	protected $fillable = [
		'event_id',
		'approved_status_id',
		'user_id',
		'observations'
	];

    public static function updatePlannedBudget(int $event_id){
        $event = Event::select('categories_origin_id')->where('id',$event_id)->first();

        $planned_budget = Event::select('event.categories_origin_id',
            \DB::raw('SUM(event_concept.planned_quantity * event_concept.planned_unit_value) AS planned_budget'),
            )->Join('event_concept','event.id','event_concept.event_id')
            ->where('event.categories_origin_id',$event->categories_origin_id)
            ->where('event.approved_status_id',4)
            ->first()->planned_budget;

        $data=['planned_budget'=>$planned_budget];
        CategoriesOrigin::where('id', $event->categories_origin_id)->update($data);
    }
}
