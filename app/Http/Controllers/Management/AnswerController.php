<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AnswerRequest;
use Illuminate\Database\QueryException;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $answer = Answer::with('answer_type')->orderBy('order');

        if($request->_sort){
            $answer->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $answer->where('name','like','%' . $request->search. '%');
        }
        if ($request->answer_type_id) {
            $answer->where('answer_type_id', $request->answer_type_id);
        }
        if($request->query("pagination", true)=="false"){
            $answer=$answer->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $answer=$answer->paginate($per_page,'*','page',$page);
        }
        $number = count($answer);
        for($i = 0; $i<$number; $i++)
        {
            $answer[$i]['n_answers'] = $number;
        }
        return response()->json([
            'status' => true,
            'message' => 'Respuestas obtenidas exitosamente',
            'data' => ['answers' => $answer]
        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnswerRequest $request
     * @return JsonResponse
     */
    public function store(AnswerRequest $request): JsonResponse
    {
        $preventAnswer = Answer::select('id')
        ->where('answer_type_id',$request->answer_type_id)->get();

        $count = $preventAnswer->count();

        $answer = new Answer;
        $answer->answer_type_id = $request->answer_type_id;
        $answer->name = $request->name;
        $answer->value = $request->value;
        $answer->order = ($count+1);
        $answer->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta creada exitosamente',
            'data' => ['answer' => $answer->toArray()]
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
        $answer = Answer::where('id', $id)->with('answer_type')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta obtenida exitosamente',
            'data' => ['answer' => $answer]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnswerRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(AnswerRequest $request, int $id): JsonResponse
    {
        $answer = Answer::find($id);
        $answer->answer_type_id = $request->answer_type_id;
        $answer->name = $request->name;
        $answer->value = $request->value;
        $answer->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta actualizada exitosamente',
            'data' => ['answer' => $answer]
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
            $answer = Answer::find($id);
            $answer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta eliminada exitosamente',
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
        $moveAnswer = Answer::find($id);
        if($direction=="up"){
            $changeOrder=($moveAnswer->order*1)-1;
        }else{
            $changeOrder=($moveAnswer->order*1)+1;
        }

        $aux=Answer::select('id')->where('order', $changeOrder)->where('answer_type_id', $moveAnswer->answer_type_id)->first();

        if($aux){
            $changeAnswer = Answer::find($aux->id);
            $moveOrder=$moveAnswer->order;
            $moveAnswer->order = $changeAnswer->order;
            $changeAnswer->order=$moveOrder;

            $moveAnswer->save();
            $changeAnswer->save();

            return response()->json([
                'message' => 'Sección actualizada exitosamente'
            ]);
        }else{
            return response()->json([
                'message' => 'No puedes mover la seccion en esa dirección.'
            ], 400);
        }
    }
}
