<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveyInstance;
use App\Models\User;
use App\Models\UserAssignSurvey;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SurveyInstanceRequest;
use Illuminate\Database\QueryException;
use Notifications;

class SurveyInstanceController extends Controller
{
    public function index(Request $request)
    {
        $statsParticipant = UserAssignSurvey::select('survey_instance_id',
                    \DB::raw('SUM(IF(user_assign_survey.assigned_status_id>1,1,0)) AS n_init'),
                    \DB::raw('COUNT(user_assign_survey.id) AS n_part'))
                    ->groupBy('survey_instance_id');

        $surveyInstance = SurveyInstance::select('survey_instance.*',
        \DB::raw('COALESCE(coursebase.name,category.name,origin.name,validity.name) AS objetivo'),
        \DB::raw('CONCAT_WS(" / ",stats.n_init,stats.n_part) AS participantes'),
        'survey.name AS survey_name')
        ->Join('survey', 'survey.id', 'survey_instance.survey_id')
        ->Join('validity', 'validity.id', 'survey_instance.validity_id')
        ->leftJoin('origin', 'origin.id', 'survey_instance.origin_id')
        ->leftJoin('category', 'category.id', 'survey_instance.category_id')
        ->leftJoin('course', 'course.id', 'survey_instance.course_id')
        ->leftJoin('coursebase', 'coursebase.id', 'course.coursebase_id')
        ->leftJoinSub($statsParticipant,'stats',function($join){
            $join->on('survey_instance.id','=', 'stats.survey_instance_id');
        });


        if ($request->survey_id) {
            $surveyInstance->where('survey_instance.survey_id', $request->survey_id);
        }

        if($request->_sort){
            $surveyInstance->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $surveyInstance->where('survey.name','like','%' . $request->search. '%')
                    ->orWhere('coursebase.name', 'like', '%' . $request->search . '%')
                    ->orWhere('category.name', 'like', '%' . $request->search . '%')
                    ->orWhere('origin.name', 'like', '%' . $request->search . '%')
                    ->orWhere('validity.name', 'like', '%' . $request->search . '%');
        }

        if($request->query("pagination", true)=="false"){
            $surveyInstance=$surveyInstance->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $surveyInstance=$surveyInstance->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Encuestas obtenidas exitosamente',
            'data' => ['surveyInstance' => $surveyInstance]
        ]);
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param SurveyInstanceRequest $request
     * @return JsonResponse
     */
    public function store(SurveyInstanceRequest $request): JsonResponse
    {
        $surveyInstance = new SurveyInstance;
        $surveyInstance->survey_id = $request->survey_id;
        $surveyInstance->description = $request->description;
        $surveyInstance->dt_init = $request->dt_init;
        $surveyInstance->dt_finish = $request->dt_finish;
        $surveyInstance->status_id = $request->status_id;
        $surveyInstance->points_eval = $request->points_eval;
        $surveyInstance->objetive = $request->objetive;
        $surveyInstance->validity_id = $request->validity_id;
        $surveyInstance->origin_id = $request->origin_id;
        $surveyInstance->category_id = $request->category_id;
        $surveyInstance->course_id = $request->course_id;
        $surveyInstance->save();

        SurveyInstance::setUsersAssignSurvey($request->validity_id, $request->origin_id, $request->category_id, $request->course_id, $surveyInstance->id, $request->url);

        $id = SurveyInstance::select('id')->get()->last();
        $user = UserAssignSurvey::select('user_assign_survey.id','users.email','users.firstname','users.middlefirstname','users.lastname','users.middlelastname')
        ->Join('users', 'users.id', 'user_assign_survey.user_id')
        ->where('user_assign_survey.survey_instance_id', $id->id)->get();
        $users=json_decode($user);
        foreach($users as $item){
            $encript_url=env('FRONT_URL') . "/pages/survey/surveys/" . base64_encode($item->id);
            $shippingConfirmation = Notifications::sendNotification(
                $item->email,
                'mails.survey',
                'Encuesta Escuela Judicial Rodrigo Lara Bonilla',
                [
                    'nombre'=>$item->lastname.' '.$item->middlelastname.' '.$item->middlefirstname.' '.$item->firstname,
                    'fecha'=> $request->dt_init,
                    'url'=>$encript_url

                ]
            );
        }


        return response()->json([
            'status' => true,
            'message' => 'Encuesta agregada exitosamente',
            'data' => ['surveyInstance' => $surveyInstance->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $surveyInstance = SurveyInstance::where('id', $id)->with('survey.sections.answer_type', 'survey.sections.questions.answers', 'validity', 'origin', 'category', 'course.coursebase')
        ->get()->toArray();
        $initSurveys = SurveyInstance::getInitSurveys($id);

        return response()->json([
            'status' => true,
            'message' => 'Encuesta obtenida exitosamente',
            'data' => [
                'surveyInstance' => $surveyInstance,
                'initSurveys' => $initSurveys
                ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SurveyInstanceRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SurveyInstanceRequest $request, int $id): JsonResponse
    {
        $initSurveys = SurveyInstance::getInitSurveys($id);

        $surveyInstance = SurveyInstance::find($id);
        $surveyInstance->survey_id = $request->survey_id;
        $surveyInstance->description = $request->description;
        $surveyInstance->dt_init = $request->dt_init;
        $surveyInstance->dt_finish = $request->dt_finish;
        $surveyInstance->status_id = $request->status_id;
        $surveyInstance->points_eval = $request->points_eval;
        $surveyInstance->objetive = $request->objetive;
        if($initSurveys==0){
            if($surveyInstance->validity_id != $request->validity_id || $surveyInstance->origin_id != $request->origin_id || $surveyInstance->category_id != $request->category_id || $surveyInstance->course_id != $request->course_id){
                $assigns = UserAssignSurvey::where('survey_instance_id',$id);
                $assigns->delete();
                SurveyInstance::setUsersAssignSurvey($request->validity_id, $request->origin_id, $request->category_id, $request->course_id, $surveyInstance->id, $request->url);
            }
            $surveyInstance->validity_id = $request->validity_id;
            $surveyInstance->origin_id = $request->origin_id;
            $surveyInstance->category_id = $request->category_id;
            $surveyInstance->course_id = $request->course_id;
        }
        $surveyInstance->save();

        return response()->json([
            'status' => true,
            'message' => 'Encuesta actualizada exitosamente',
            'data' => ['surveyInstance' => $surveyInstance->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $surveyInstance = SurveyInstance::find($id);
            $surveyInstance->delete();

            return response()->json([
                'status' => true,
                'message' => 'Encuesta eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La sección de la encuesta está en uso, no es posible eliminarla.',
            ], 423);
        }
    }
}
