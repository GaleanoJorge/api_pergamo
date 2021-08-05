<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SurveyDetail;
use Iluminate\Http\JsonResponse;
use Validator;

class SurveyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $survey_detail = SurveyDetail::with('question', 'answer', 'survey_section.survey')->get();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);        
            $survey_detail= SurveyDetail::paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Listado obtenido exitosamente',
            'data' => $survey_detail
        ], 200);
    }

    /**
     * Display a listing of the questions and answer of a survey.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_questions_answer(Request $request)
    {
        $user_assign_survey_id = $request->get('user_assign_survey_id');
        if ($user_assign_survey_id != null) {
            $survey_detail = SurveyDetail::with('question', 'answer', 'survey_section')->where('user_assign_survey_id', $user_assign_survey_id)->get();
        } else {
            return response()->json([
            'status' => false,
            'message' => 'Se necesita el user_assign_survey_id'
        ], 400);
        }
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);        
            $survey_detail= SurveyDetail::paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Listado obtenido exitosamente',
            'data' => $survey_detail
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
            'user_assign_survey_id' => 'required',
            'survey_section_id' => 'required',
            'section_id' => 'required',
            'question_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 400);
        }
        $arr = $request->all();
        $survey_detail = SurveyDetail::create($arr);
        SurveyDetail::checkAssignedStatus(($arr['user_assign_survey_id']*1));
        return response()->json([
            'status' => true,
            'message' => 'Registro almacenado exitosamente',
            'data' => $survey_detail
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
        $survey_detail = SurveyDetail::find($id);
        if (!$survey_detail) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontro el elemento'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Registro encontrado exitosamente',
            'data' => $survey_detail
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
        $survey_detail = SurveyDetail::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'user_assign_survey_id' => 'required',
            'survey_section_id' => 'required',
            'section_id' => 'required',
            'question_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al validar los datos',
                'error' => $validator->errors()
            ], 200);
        }
        $survey_detail->fill($request->all());
        $survey_detail->update();
        return response()->json([
            'status' => true,
            'message' => 'Registro actualizado exitosamente',
            'data' => $survey_detail
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
        $survey_detail = SurveyDetail::findOrFail($id);
        $survey_detail->delete();
        return response()->json([
            'status' => true,
            'message' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
