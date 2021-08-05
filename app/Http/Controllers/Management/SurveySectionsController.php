<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SurveySection;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SurveySectionsRequest;
use Illuminate\Database\QueryException;

class SurveySectionsController extends Controller
{
    public function index(Request $request)
    {
        $surveySections = SurveySection::select('survey_sections.*',
        \DB::raw('COALESCE(CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname), coursebase.name ) AS curso_formador'))
        ->with('survey', 'section')
        ->leftJoin('user_role', 'user_role.id', 'survey_sections.user_role_id')
        ->leftJoin('users', 'users.id', 'user_role.user_id')
        ->leftJoin('course', 'course.id', 'survey_sections.course_id')
        ->leftJoin('coursebase', 'coursebase.id', 'course.coursebase_id');

        if ($request->survey_id) {
            $surveySections->where('survey_id', $request->survey_id);
        }

        if($request->_sort){
            $surveySections->orderBy($request->_sort, $request->_order);
        }else{
            $surveySections->orderBy('survey_sections.order', 'ASC');
        }

        if ($request->search) {
            $surveySections->where('name','like','%' . $request->search. '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('coursebase.name', 'like', '%' . $request->search . '%');

        }

        if($request->query("pagination", true)=="false"){
            $surveySections=$surveySections->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $surveySections=$surveySections->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Secciones de la encuesta obtenidas exitosamente',
            'data' => ['surveySections' => $surveySections]
        ]);
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param SurveySectionsRequest $request
     * @return JsonResponse
     */
    public function store(SurveySectionsRequest $request): JsonResponse
    {
        $validSections = SurveySection::select('is_percent',
        \DB::raw('SUM(weight) AS peso')
        )->where('survey_id',$request->survey_id)
        ->groupBy('is_percent')->get();

        $errors_percent=[];
        $errors_weigth=[];

        if($validSections->count()>1){
            array_push($errors_percent,'No puedes configurar unas secciones como porcentaje y otras no.');
        }

        if($validSections->count()==1){
            $validSections=$validSections->toArray();
            if($validSections[0]["is_percent"]!=$request->is_percent){
                $aux_percent=($validSections[0]["is_percent"]==0)?"No":"Si";
                array_push($errors_percent,'Todas las secciones de esta encuenta deben configurarse como "Es porcentaje: '.$aux_percent.'".');
            }

            $tot_peso=($validSections[0]["peso"]*1)+($request->weight*1);
            if($validSections[0]["is_percent"]==1 && $tot_peso>100){
                array_push($errors_weigth,'La suma de los porcentajes de las secciones es de '.$tot_peso.'%.');
            }
        }

        if(count($errors_percent)>0 || count($errors_weigth)>0){
            $errores=array('weigth'=>$errors_weigth, 'is_percent'=>$errors_percent);

            return response()->json([
                'status' => true,
                'message' => 'Se generaron errores de validación',
                'data' => ['errors' => $errores]
            ],422);
        }else{
            $prevSections = SurveySection::select('id')->where('survey_id',$request->survey_id)->get();
            $SectionsCount = $prevSections->count();

            $surveySection = new SurveySection;
            $surveySection->survey_id = $request->survey_id;
            $surveySection->section_id = $request->section_id;
            $surveySection->name = $request->name;
            $surveySection->order = ($SectionsCount+1);
            $surveySection->weight = $request->weight;
            $surveySection->is_percent = $request->is_percent;
            $surveySection->user_role_id = $request->user_role_id;
            $surveySection->course_id = $request->course_id;
            $surveySection->save();

            return response()->json([
                'status' => true,
                'message' => 'Sección agregada a la encuesta exitosamente',
                'data' => ['surveySection' => $surveySection->toArray()]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $surveySection = SurveySection::where('id', $id)->with('survey', 'section', 'user_role', 'course')
        ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sección de la encuesta obtenida exitosamente',
            'data' => ['surveySection' => $surveySection]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SurveySectionsRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SurveySectionsRequest $request, int $id): JsonResponse
    {
        $validSections = SurveySection::select('is_percent',
        \DB::raw('SUM(weight) AS peso')
        )->where('survey_id',$request->survey_id)
        ->where('id','<>',$id)
        ->groupBy('is_percent')->get();

        $errors_percent=[];
        $errors_weigth=[];

        if($validSections->count()>1){
            array_push($errors_percent,'No puedes configurar unas secciones como porcentaje y otras no.');
        }

        if($validSections->count()==1){
            $validSections=$validSections->toArray();
            if($validSections[0]["is_percent"]!=$request->is_percent){
                $aux_percent=($validSections[0]["is_percent"]==0)?"No":"Si";
                array_push($errors_percent,'Todas las secciones de esta encuenta deben configurarse como "Es porcentaje: '.$aux_percent.'".');
            }

            $tot_peso=($validSections[0]["peso"]*1)+($request->weight*1);
            if($validSections[0]["is_percent"]==1 && $tot_peso>100){
                array_push($errors_weigth,'La suma de los porcentajes de las secciones es de '.$tot_peso.'%.');
            }
        }

        if(count($errors_percent)>0 || count($errors_weigth)>0){
            $errores=array('weigth'=>$errors_weigth, 'is_percent'=>$errors_percent);

            return response()->json([
                'status' => true,
                'message' => 'Se generaron errores de validación',
                'data' => ['errors' => $errores]
            ],422);
        }else{
            $surveySection = SurveySection::find($id);
            $surveySection->survey_id = $request->survey_id;
            $surveySection->section_id = $request->section_id;
            $surveySection->name = $request->name;
            /* $surveySection->order = $request->order; */
            $surveySection->weight = $request->weight;
            $surveySection->is_percent = $request->is_percent;
            $surveySection->user_role_id = $request->user_role_id;
            $surveySection->course_id = $request->course_id;
            $surveySection->save();

            return response()->json([
                'status' => true,
                'message' => 'Sección de la encuesta actualizada exitosamente',
                'data' => ['surveySection' => $surveySection->toArray()]
            ]);
        }
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
            $surveySection = SurveySection::find($id);
            $surveySection->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sección de la encuesta eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La sección de la encuesta está en uso, no es posible eliminarla.',
            ], 423);
        }
    }

    public function move(int $id, String $direction): JsonResponse
    {
        $moveSection = SurveySection::find($id);
        if($direction=="up"){
            $changeOrder=($moveSection->order*1)+1;
        }else{
            $changeOrder=($moveSection->order*1)-1;
        }

        $aux=SurveySection::select('id')->where('order', $changeOrder)->first();

        if($aux){
            $changeSection = SurveySection::find($aux->id);
            $moveOrder=$moveSection->order;
            $moveSection->order = $changeSection->order;
            $changeSection->order=$moveOrder;

            $moveSection->save();
            $changeSection->save();

            return response()->json([
                'status' => true,
                'message' => 'Sección actualizada exitosamente'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No puedes mover la seccion en esa dirección.'
            ], 423);
        }
    }
}
