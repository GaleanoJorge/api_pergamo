<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProcessDetailActivity;
use App\Models\Rubric;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessDetailActivityRubric
 * 
 * @property int $id
 * @property int $process_d_a_id
 * @property int $rubric_id
 * @property float $grade
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ProcessDetailActivity $process_detail_activity
 * @property Rubric $rubric
 *
 * @package App\Models\Base
 */
class ProcessDetailActivityRubric extends Model
{
	protected $table = 'process_detail_activity_rubric';

	protected $casts = [
		'process_d_a_id' => 'int',
		'rubric_id' => 'int',
		'grade' => 'float'
	];

	public function process_detail_activity()
	{
		return $this->belongsTo(ProcessDetailActivity::class, 'process_d_a_id');
	}

	public function rubric()
	{
		return $this->belongsTo(Rubric::class);
	}
}
