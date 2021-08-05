<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnswerType;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AnswerTypeRequest;
use Illuminate\Database\QueryException;

class AnswerTypeController extends Controller
{
    public function index(Request $request)
    {
        $answerType = AnswerType::with('answers','sections');

        if($request->_sort){
            $answerType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $answerType->where('name','like','%' . $request->search. '%');
        }
        if($request->query("pagination", true)=="false"){
            $answerType=$answerType->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $answerType=$answerType->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tipos de respuesta obtenidos exitosamente',
            'data' => ['answerTypes' => $answerType]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnswerTypeRequest $request
     * @return JsonResponse
     */
    public function store(AnswerTypeRequest $request): JsonResponse
    {
        $answerType = new AnswerType;
        $answerType->name = $request->name;
        $answerType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de respuesta creado exitosamente',
            'data' => ['answerType' => $answerType->toArray()]
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
        $answerType = AnswerType::with('answers','sections')->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de respuesta obtenido exitosamente',
            'data' => ['answerType' => $answerType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnswerTypeRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(AnswerTypeRequest $request, int $id): JsonResponse
    {
        $answerType = AnswerType::find($id);
        $answerType->name = $request->name;
        $answerType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de respuesta actualizado exitosamente',
            'data' => ['answerType' => $answerType]
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
            $answerType = AnswerType::find($id);
            $answerType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de respuesta eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El tipo de respuesta está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

}
