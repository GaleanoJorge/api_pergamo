<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAssignSurvey;
use App\Models\SurveySection;
use Illuminate\Support\Facades\Auth;
use Iluminate\Http\JsonResponse;
use Validator;

class UserAssignSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalSections = SurveySection::select('survey_sections.survey_id', 
                    \DB::raw('COUNT(survey_sections.section_id) AS tot_sections'))
                    ->groupBy('survey_sections.survey_id');

        $surveyInstance = UserAssignSurvey::select('user_assign_survey.id', 'user_assign_survey.survey_instance_id',
        'survey_type.name AS tipo',
        \DB::raw('CONCAT_WS(" / ", COUNT(DISTINCT survey_detail.survey_section_id),gt_sections.tot_sections) AS secciones'),
        \DB::raw('COUNT(DISTINCT survey_detail.survey_section_id) AS resolve_sections'),
        \DB::raw('(CURDATE() BETWEEN survey_instance.dt_init AND survey_instance.dt_finish) AS survey_valid'),
        'gt_sections.tot_sections')
        ->with('survey_instance')
        ->join('survey_instance','user_assign_survey.survey_instance_id','survey_instance.id')
        ->join('survey','survey_instance.survey_id','survey.id')
        ->join('survey_type','survey.survey_type_id','survey_type.id')
        ->joinSub($totalSections,'gt_sections',function($join){
            $join->on('survey_instance.survey_id','=', 'gt_sections.survey_id');
        })
        ->leftJoin('survey_detail','user_assign_survey.id','survey_detail.user_assign_survey_id')
        ->where('user_assign_survey.user_id', Auth::user()->id)
        ->groupBy('user_assign_survey.id');
        
        if($request->_sort){
            $surveyInstance->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $surveyInstance->where('survey_instance.description','like','%' . $request->search. '%')
                    ->orWhere('survey_type.name', 'like', '%' . $request->search . '%');
                    /*->orWhere('category.name', 'like', '%' . $request->search . '%')
                    ->orWhere('origin.name', 'like', '%' . $request->search . '%')
                    ->orWhere('validity.name', 'like', '%' . $request->search . '%');*/            
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
            'message' => 'Listado obtenido exitosamente',
            'data' => [
                'surveys' => $surveyInstance
            ]
        ], 200);
    }

    /**
     * Display the surveys list by id user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_user_surveys($id)
    {
        $user_assign_surveys = UserAssignSurvey::with(
            'survey_instance.survey.sections.answer_type.answers',
            'survey_instance.survey.sections.questions.answers',
            'survey_instance.survey.sections.user_role.user',
            'survey_instance.validity',
            'survey_instance.origin',
            'survey_instance.category',
            'survey_instance.course.coursebase',
            'survey_details'
        )->where('user_id', $id)->get();
        if (!$user_assign_surveys) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontraron datos para este id'
            ], 200);
        }
        return response()->json([
            'status' => true,
            'message' => 'Registro obtenido exitosamente',
            'data' => $user_assign_surveys
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'survey_instance_id' => 'required',
            'assigned_status_id' => 'required',
            'user_id' => 'required',
            'duration' => 'numeric',
            'dt_init' => 'date',
            'dt_finish' => 'date',
            'qualification' => 'numeric',
            'qualification_claim' => 'required',
            'comments' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 200);
        }
        $arr = $request->all();
        $user_assign_surveys = UserAssignSurvey::create($arr);
        return response()->json([
            'status' => true,
            'message' => 'Registro almacenado exitosamente',
            'data' => $user_assign_surveys
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $user_assign_surveys = UserAssignSurvey::with(
            'survey_instance.survey.sections.answer_type.answers',
            'survey_instance.survey.sections.questions.answers',
            'survey_instance.survey.sections.user_role.user',
            'survey_instance.validity',
            'survey_instance.origin',
            'survey_instance.category',
            'survey_instance.course.coursebase',
            'survey_details'
        )->find($id);
        if (!$user_assign_surveys) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontro el elemento'
            ], 200);
        }
        return response()->json([
            'status' => true,
            'message' => 'Registro obtenido exitosamente',
            'data' => $user_assign_surveys
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_assign_surveys = UserAssignSurvey::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'survey_instance_id' => 'required',
            'assigned_status_id' => 'required',
            'user_id' => 'required',
            'duration' => 'numeric',
            'dt_init' => 'date',
            'dt_finish' => 'date',
            'qualification' => 'numeric',
            'qualification_claim' => 'required',
            'comments' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 200);
        }
        $user_assign_surveys->fill($request->all());
        $user_assign_surveys->update();
        return response()->json([
            'status' => true,
            'message' => 'Registro actualizado exitosamente',
            'data' => $user_assign_surveys
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_assign_surveys = UserAssignSurvey::findOrFail($id);
        $user_assign_surveys->delete();
        return response()->json([
            'status' => true,
            'message' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
