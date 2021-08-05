<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionType;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\QuestionTypeRequest;
use Illuminate\Database\QueryException;

class QuestionTypeController extends Controller
{
    public function index(Request $request)
    {
        $questionTypes = QuestionType::with('questions');

        if($request->_sort){
            $questionTypes->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $questionTypes->where('name','like','%' . $request->search. '%');
        }
        if($request->query("pagination", true)=="false"){
            $questionTypes=$questionTypes->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $questionTypes=$questionTypes->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tipos de pregunta obtenidos exitosamente',
            'data' => ['questionTypes' => $questionTypes]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionTypeRequest $request
     * @return JsonResponse
     */
    public function store(QuestionTypeRequest $request): JsonResponse
    {
        $QuestionType = new QuestionType;
        $QuestionType->name = $request->name;
        $QuestionType->image_question_type = $request->image_question_type;
        $QuestionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de pregunta creado exitosamente',
            'data' => ['questionType' => $QuestionType->toArray()]
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
        $QuestionType = QuestionType::with('questions')->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de pregunta obtenido exitosamente',
            'data' => ['questionType' => $QuestionType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionTypeRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(QuestionTypeRequest $request, int $id): JsonResponse
    {
        $QuestionType = QuestionType::find($id);
        $QuestionType->name = $request->name;
        $QuestionType->image_question_type = $request->image_question_type;
        $QuestionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de pregunta actualizado exitosamente',
            'data' => ['questionType' => $QuestionType]
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
            $QuestionType = QuestionType::find($id);
            $QuestionType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de pregunta eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El tipo de pregunta está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
