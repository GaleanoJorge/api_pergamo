<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnswersQuestion;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AnswersQuestionRequest;
use Illuminate\Database\QueryException;

class AnswersQuestionController extends Controller
{
    public function index(Request $request)
    {
        $answerQuestion = AnswersQuestion::with('question','answer')->orderBy('order');

        if($request->_sort){
            $answerQuestion->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $answerQuestion->where('order','like','%' . $request->search. '%');
        }
        if ($request->question_id) {
            $answerQuestion->where('question_id', $request->question_id);
        }
        if ($request->answer_id) {
            $answerQuestion->where('answer_id', $request->answer_id);
        }
        if($request->query("pagination", true)=="false"){
            $answerQuestion=$answerQuestion->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $answerQuestion=$answerQuestion->paginate($per_page,'*','page',$page);
        }
        $number = count($answerQuestion);
        for($i = 0; $i<$number; $i++)
        {
            $answerQuestion[$i]['n_answers'] = $number;
        }
        return response()->json([
            'status' => true,
            'message' => 'Respuestas de la pregunta obtenidas exitosamente',
            'data' => ['answersQuestions' => $answerQuestion]
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param AnswersQuestionRequest $request
     * @return JsonResponse
     */
    public function store(AnswersQuestionRequest $request): JsonResponse
    {
        $preventAnswersQuestion = AnswersQuestion::select('id')->where('question_id', $request->question_id)->get();
        $count = $preventAnswersQuestion->count();

        $answersQuestion = new AnswersQuestion;
        $answersQuestion->answer_id = $request->answer_id;
        $answersQuestion->question_id = $request->question_id;
        $answersQuestion->order = ($count+1);
        $answersQuestion->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de la pregunta creada exitosamente',
            'data' => ['answer' => $answersQuestion->toArray()]
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
        $answersQuestion = AnswersQuestion::where('id', $id)->with('question','answer')->orderBy('order')
        ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de la pregunta obtenida exitosamente',
            'data' => ['answersQuestion' => $answersQuestion]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnswersQuestionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(AnswersQuestionRequest $request, int $id): JsonResponse
    {
        $answersQuestion = AnswersQuestion::find($id);
        $answersQuestion->answer_id = $request->answer_id;
        $answersQuestion->question_id = $request->question_id;
        $answersQuestion->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de la pregunta actualizada exitosamente',
            'data' => ['answersQuestion' => $answersQuestion]
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
            $answersQuestion = AnswersQuestion::find($id);
            $answersQuestion->delete();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de la pregunta eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La Respuesta está en uso, no es posible eliminarla.',
            ], 423);
        }
    }

    public function move(int $id, String $direction): JsonResponse
    {
        $moveAnswer = AnswersQuestion::find($id);
        if($direction=="up"){
            $changeOrder=($moveAnswer->order*1)-1;
        }else{
            $changeOrder=($moveAnswer->order*1)+1;
        }

        $aux=AnswersQuestion::select('id')->where('order', $changeOrder)->where('question_id', $moveAnswer->question_id)->first();

        if($aux){
            $changeAnswer = AnswersQuestion::find($aux->id);
            $moveOrder=$moveAnswer->order;
            $moveAnswer->order = $changeAnswer->order;
            $changeAnswer->order=$moveOrder;

            $moveAnswer->save();
            $changeAnswer->save();

            return response()->json([
                'message' => 'Respuesta a pregunta actualizada exitosamente'
            ]);
        }else{
            return response()->json([
                'message' => 'No puedes mover la respuesta en esa dirección.'
            ], 400);
        }
            //  return response()->json([
            //     'status' => true,
            //     'message' => 'Respuesta a pregunta actualizada exitosamente',
            //     'id' => $aux
            // ]);

    }

}
