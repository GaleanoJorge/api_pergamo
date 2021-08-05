<?php

namespace App\Models;

use App\Models\Base\CompetitionActivity as BaseCompetitionActivity;

class CompetitionActivity extends BaseCompetitionActivity
{
	protected $fillable = [
		'activity_id',
		'competition_id',
		'process_d_a_c_id'
	];

    public function process_detail_activity_competence()
    {
        return $this->belongsTo(ProcessDetailActivityCompetences::class, 'process_d_a_c_id');
    }
}
