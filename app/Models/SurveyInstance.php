<?php

namespace App\Models;

use App\Models\Base\SurveyInstance as BaseSurveyInstance;
use App\Models\UserAssignSurvey;
use App\Models\UserRoleCourse;
use App\Models\User;
use Carbon\Carbon;
use Notifications;
use Illuminate\Support\Facades\Crypt;

class SurveyInstance extends BaseSurveyInstance
{
	protected $fillable = [
		'survey_id',
		'description',
		'dt_init',
		'dt_finish',
		'status_id',
		'points_eval',
		'objetive',
		'dt_active',
		'course_id'
	];

	protected $casts = [
		'dt_init' => 'date:Y-m-d',
		'dt_finish' => 'date:Y-m-d'
	];
	
	protected $appends = ['disponibilidad'];

	public function getDisponibilidadAttribute()
	{
		$fi = Carbon::parse($this->dt_init);
		$ff = Carbon::parse($this->dt_finish);
		if($fi->year != $ff->year){
			return $fi->format('d/m/Y')." al ".$ff->format('d/m/Y');
		}elseif($fi->month != $ff->month){
			return $fi->format('d')." de ".$fi->locale('es')->shortMonthName." al ".$ff->format('d')." de ".$ff->locale('es')->shortMonthName;
		}elseif($fi->day != $ff->day){
			return $fi->format('d')." al ".$ff->format('d')." de ".$ff->locale('es')->shortMonthName;
		}else{
			return $fi->format('d')." de ".$fi->locale('es')->shortMonthName." de ".$ff->year;
		}
		
	}

	public static function getInitSurveys(int $id)
	{
		 return UserAssignSurvey::select(\DB::raw('COUNT(user_assign_survey.id) AS n_part'))
                    ->where('assigned_status_id','>',1)
                    ->where('survey_instance_id',$id)->first()->n_part;		
	}

	public static function setUsersAssignSurvey(int $validity, int $origin = null, int $category = null, int $course = null, int $id, $urlOrig)
	{
		$users = UserRoleCourse::select('user_role.user_id')
		->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
        ->Join('course', 'course.id', 'user_role_course.course_id')
        ->Join('category', 'category.id', 'course.category_id')
		->Join('categories_origin', 'category.id', 'categories_origin.category_id')
        ->Join('origin', 'origin.id', 'categories_origin.origin_id')
        ->Join('validity', 'validity.id', 'origin.validity_id')
		->where('user_role_course.inscription_status_id','<>',2)
		->groupBy('user_role.user_id');

        if ($validity) {
            $users->where('origin.validity_id', $validity);
        }

        if ($origin) {
            $users->where('categories_origin.origin_id', $origin);
        }

        if ($category) {
            $users->where('course.category_id', $category);
        }

        if ($course) {
			/*$users->Join('group', 'course.id', 'group.course_id');
			$users->Join('user_role_group', function ($join) {
				$join->on('user_role.id', '=', 'user_role_group.user_role_id');
				$join->on('user_role_group.group_id', '=', 'group.id');
			});
			$users->Join('assistance_session', 'assistance_session.user_role_group_id', 'user_role_group.id');
			$users->whereNotNull('start_time');
			 SOLO ASISTENTES hyoG quite esta parte de arriba si desea registrar todos los del curso */
            $users->where('user_role_course.course_id', $course);
        }

		// $cr_insert=[]; 
        foreach($users->get()->toArray() as $row){
			// array_push($cr_insert,['survey_instance_id'=>$id,'user_id'=>$row["user_id"],'assigned_status_id'=>1]);
			$user = UserAssignSurvey::create(['survey_instance_id'=>$id,'user_id'=>$row["user_id"],'assigned_status_id'=>1]);
			/*$user_data = User::find($row["user_id"]);
			//hyoG Ojo este $user->id es del userasssinsurvey o del usuario?
			//ademas el envio del email esta retrasando el grabado
			$url = $urlOrig.base64_encode($user->id); 
			$sent = Notifications::sendNotification(
                $user_data->email,
                'mails.survey', 
                'Nueva encuesta asignada.', 
                [
					"name" => $user_data->firstname.' '.$user_data->lastname,
					"url" => $url
				]
            );*/
		}
	}
}
