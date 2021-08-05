<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyType;
use App\Models\SurveyDetail;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SurveyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

use App\Exports\SurveySummaryExport;
use Maatwebsite\Excel\Facades\Excel;

class SurveyController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $statsSurvey = Survey::select('survey.id', \DB::raw('COUNT(survey_sections.id) AS n_sections')
                    , \DB::raw('COUNT(survey_instance.id) AS n_assigs'))
                    ->leftJoin('survey_sections','survey_sections.survey_id', 'survey.id')
                    ->leftJoin('survey_instance','survey_instance.survey_id', 'survey.id')
                    ->groupBy('survey.id');

        $surveys = Survey::select('survey.*','stats.n_assigs','stats.n_sections'
        ,'survey_type.name AS type')
        ->with('status')
        ->Join('survey_type','survey_type.id', 'survey.survey_type_id')
        ->leftJoinSub($statsSurvey,'stats',function($join){
            $join->on('survey.id','=', 'stats.id');
        });

        if($request->_sort){
            $surveys->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $surveys->where('survey.name','like','%' . $request->search. '%');
            $surveys->orWhere('survey_type.name','like','%' . $request->search. '%');
            /*$surveys->orWhere('duration','like','%' . $request->search. '%');
            $surveys->orWhere('max_points','like','%' . $request->search. '%');
            $surveys->orWhere('objetives','like','%' . $request->search. '%');*/
        }

        if ($request->survey_type_id) {
            $surveys->where('survey_type_id', $request->survey_type_id);
        }
        if ($request->status_id) {
            $surveys->where('status_id', $request->status_id);
        }
        if($request->query("pagination", true)=="false"){
            $surveys=$surveys->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $surveys=$surveys->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Encuestas obtenidas exitosamente',
            'data' => ['surveys' => $surveys]
        ]);
    }

    public function types(): JsonResponse
    {
        $surveyTypes = SurveyType::get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de encuesta obtenidos exitosamente',
            'data' => ['surveyTypes' => $surveyTypes]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SurveyRequest $request
     * @return JsonResponse
     */

    public function store(SurveyRequest $request): JsonResponse
    {
        $survey = new Survey;
        $survey->status_id = 1;
        $survey->survey_type_id = $request->survey_type_id;
        $survey->name = $request->name;
        $survey->description = $request->description;
        $survey->duration = $request->duration;
        $survey->max_points = $request->max_points;
        $survey->objetives = $request->objetives;

        if($request->file('url_image')){
            $path = Storage::disk('img_surveys')->put('headers',$request->file('url_image'));
            $survey->url_image = $path;
        }

        $survey->save();

        return response()->json([
            'status' => true,
            'message' => 'Encuesta creada exitosamente',
            'data' => ['survey' => $survey->toArray()]
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
        $survey = Survey::where('id', $id)->with('status', 'survey_type')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Encuesta obtenida exitosamente',
            'data' => ['survey' => $survey]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SurveynRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SurveyRequest $request, int $id): JsonResponse
    {
        $survey = Survey::find($id);
        //$survey->status_id = $request->status_id;
        $survey->survey_type_id = $request->survey_type_id;
        $survey->name = $request->name;
        $survey->description = $request->description;
        $survey->duration = $request->duration;
        $survey->max_points = $request->max_points;
        $survey->objetives = $request->objetives;

        if($request->file('url_image')){
            $path = Storage::disk('img_surveys')->put('headers',$request->file('url_image'));
            $survey->url_image = $path;
        }

        $survey->save();

        return response()->json([
            'status' => true,
            'message' => 'Encuesta actualizada exitosamente',
            'data' => ['survey' => $survey]
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
            $survey = Survey::find($id);
            $survey->delete();
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La encuesta está en uso, no es posible eliminarla.',
            ], 423);
        }
        return response()->json([
            'status' => true,
            'message' => 'Encuesta eliminada exitosamente',
        ]);
    }

    /**
     * Exportar a excel las respuestas de una encuesta/plantilla o una instancia (escuesta programada).
     */
    public function exportSummary(Request $request): JsonResponse
    {
        $export = new SurveySummaryExport;
        if($request->survey_id){
            $export->forSurveyId($request->survey_id);
        }
        if($request->survey_instance_id){
            $export->forSurveyInstanceId($request->survey_instance_id);
        }

        if($export->store('SurveySummary.xlsx','temp_reports')){
            return response()->json([
                'status' => true,
                'message' => 'Reporte generado exitosamente',
                'url' => asset('/storage/temp_reports/SurveySummary.xlsx'),
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No fue posible grabar el reporte en el disco.',
            ], 423);
        }
    }

    public function pieSummary(Request $request): JsonResponse
    {
        $sections=Section::select('section.id','survey_sections.survey_id','section.name','section.description')
        ->with('questions')
        ->Join('survey_sections', 'survey_sections.section_id', 'section.id')
        ->Join('survey', 'survey.id', 'survey_sections.survey_id')
        ->groupBy('section.id');

        $stats=SurveyDetail::select('survey_detail.*'
        , \DB::raw('COUNT(survey_detail.answer_id) AS cant'))
        ->with('answer')
        ->join('user_assign_survey','survey_detail.user_assign_survey_id','user_assign_survey.id')
        ->Join('survey_instance', 'user_assign_survey.survey_instance_id', 'survey_instance.id')
        ->Join('survey', 'survey.id', 'survey_instance.survey_id')
        ->groupBy(['survey_detail.question_id','survey_detail.answer_id']);

        if($request->survey_id){
            $sections->where('survey.id', $request->survey_id);
            $stats->where('survey.id', $request->survey_id);
        }
        if($request->survey_instance_id){
            $stats->where('survey_instance.id', $request->survey_instance_id);
        }

        $cr_sections=[];
        foreach($sections->get()->toArray() as $section){
            $cr_preguntas=[];
            foreach($section['questions'] as $question){
                $respuestas=[];
                $labels=[];
                foreach($stats->get()->toArray() as $row){
                    if($question["id"]==$row["question_id"] && $section["id"]==$row["section_id"]){
                        array_push($labels, $row["cant"]." ".$row["answer"]["name"]);
                        array_push($respuestas, [
                            'name'=>$row["cant"]." ".$row["answer"]["name"],
                            "value"=>$row["cant"]
                            ]);
                    }
                }
                array_push($cr_preguntas, [
                "type"=>'pie',
                "title"=>$question["name"],
                "description"=>$section["name"].": ".$question["name"],
                "labels"=>$labels,
                "series"=>$respuestas
                ]);
            }
            array_push($cr_sections, [
            "id"=>$section["id"],
            "name"=>$section["name"],
            "description"=>$section["description"],
            "preguntas"=>$cr_preguntas
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'data' => ['pieSummary' => $cr_sections]
        ]);
    }
}
