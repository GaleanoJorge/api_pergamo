<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;
use App\Models\ChTypeGynecologists;
use App\Models\ChPlanningGynecologists;
use App\Models\ChExamGynecologists;
use App\Models\ChFlowGynecologists;
use App\Models\ChRstCytologyGyneco;
use App\Models\ChRstBipsyGyneco;
use App\Models\ChRstMammographyGyneco;
use App\Models\ChRstColopsciaGyneco;
use App\Models\ChFailureMethodGyneco;
use App\Models\ChMethodPlanningGyneco;
use App\Models\ChTypeRecord;
use App\Models\ChRecord;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bed
 * 
*@property int $id 
*@property string  $pregnancy_status
*@property int  $gestational_age
*@property date  $date_childbirth
*@property number  $menarche_years
*@property date  $last_menstruation
*@property number  $time_menstruation
*@property number  $duration_menstruation
*@property date  $date_last_cytology
*@property date  $date_biopsy
*@property date  $date_mammography
*@property date  $date_colposcipia
*@property number  $childbirth_number
*@property number  $caesarean_operation
*@property number  $misbirth
*@property number  $molar_pregnancy
*@property number  $ectopic
*@property number  $dead_sons
*@property number  $living_sons
*@property number  $sons_dead_first_week
*@property number  $children_died_after_the_first_week
*@property number  $total_feats
*@property string  $misbirth_unstudied
*@property string  $background_twins
*@property string  $last_planned_pregnancy
*@property date  $date_of_last_childbirth
*@property number  $last_weight
*@property date  $since_planning
*@property number  $sexual_ partners
*@property number  $time_exam_breast_self
*@property string  $observation_breast_self_exam
*@property string  $observation_flow
*@property unsignedBigInteger  $ch_type_gynecologists
*@property unsignedBigInteger  $ch_planning_gynecologists
*@property unsignedBigInteger  $ch_flow_gynecologists
*@property unsignedBigInteger  $ch_exam_gynecologists
*@property unsignedBigInteger  $ch_rst_cytology_gyneco
*@property unsignedBigInteger  $ch_rst_biopsy_gyneco
*@property unsignedBigInteger  $ch_rst_mammography_gyneco
*@property unsignedBigInteger  $ch_rst_colposcipia_gyneco
*@property unsignedBigInteger  $ch_failure_method_gyneco
*@property unsignedBigInteger  $ch_method_planning_gyneco 
*@property unsignedBigInteger type_record 
*@property unsignedBigInteger ch_record 
*@property Carbon $created_at
*@property Carbon $updated_at
 * 
 *
 * @package App\Models\Base
 */
class ChGynecologists extends Model
{
	protected $table = 'ch_gynecologists';

	public function ch_type_gynecologists()
	{
		return $this->belongsTo(ChTypeGynecologists::class);
	}
	public function ch_planning_gynecologists()
	{
		return $this->belongsTo(ChPlanningGynecologists::class);
	}
	public function ch_exam_gynecologists()
	{
		return $this->belongsTo(ChExamGynecologists::class);
	}
	public function ch_flow_gynecologists()
	{
		return $this->belongsTo(ChFlowGynecologists::class);
	}
	public function ch_rst_cytology_gyneco()
	{
		return $this->belongsTo(ChRstCytologyGyneco::class);
	}
	public function ch_rst_biopsy_gyneco()
	{
		return $this->belongsTo(ChRstBiopsyGyneco::class);
	}
	public function ch_rst_mammography_gyneco()
	{
		return $this->belongsTo(ChRstMammographyGyneco::class);
	}
	public function ch_rst_colposcipia_gyneco()
	{
		return $this->belongsTo(ChRstColposcipiaGyneco::class);
	}
	public function ch_failure_method_gyneco()
	{
		return $this->belongsTo(ChFailureMethodGyneco::class);
	}
	public function ch_method_planning_gyneco()
	{
		return $this->belongsTo(ChMethodPlanningGyneco::class);
	}
	public function type_record()
	{
		return $this->belongsTo(ChTypeRecord::class);
	}
	public function ch_record()
	{
		return $this->belongsTo(ChRecord::class);
	}

}
