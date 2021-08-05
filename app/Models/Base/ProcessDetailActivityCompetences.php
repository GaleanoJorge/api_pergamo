<?php

namespace App\Models\Base;

use App\Models\CompetitionActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ProcessDetailActivity;
use App\Models\Base\Rubric;

/**
 * Class ProcessDetailActivityCompetences
 *
 * @package App\Models\Base
 */
class ProcessDetailActivityCompetences extends Model
{
	protected $table = 'process_detail_activity_competence';

    protected $casts = [
        'process_d_a_id' => 'int',
        'rate' => 'float'
    ];


    public function process_activity()
	{
		return $this->belongsTo(ProcessDetailActivity::class, 'process_d_a_id');
	}

    public function competition_activities()
    {
        return $this->hasMany(CompetitionActivity::class, 'process_d_a_c_id');
    }
}
