<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\QuestionRequest;
use Illuminate\Database\QueryException;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::with('section', 'question_type', 'status', 'answers')->orderBy('order');

        if($request->_sort){
            $questions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $questions->where('name','like','%' . $request->search. '%');
            $questions->orWhere('description','like','%' . $request->search. '%');
            $questions->orWhere('order','like','%' . $request->search. '%');
        }

        if ($request->section_id) {
            $questions->where('section_id', $request->section_id);
        }
        if ($request->question_type_id) {
            $questions->where('question_type_id', $request->question_type_id);
        }
        if ($request->status_id) {
            $questions->where('status_id', $request->status_id);
        }
        if($request->query("pagination", true)=="false"){
            $questions=$questions->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $questions=$questions->paginate($per_page,'*','page',$page);
        }

        $number = count($questions);
        for($i = 0; $i<$number; $i++)
        {
            $questions[$i]['n_question'] = $number;
        }


        return response()->json([
            'status' => true,
            'message' => 'Preguntas obtenidas exitosamente',
            'data' => ['questions' => $questions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return JsonResponse
     */
    public function store(QuestionRequest $request): JsonResponse
    {
        $preventQuestion = Question::select('id')->where('section_id',$request->section_id)->get();
        $count = $preventQuestion->count();

        $question = new Question;
        $question->question_type_id = $request->question_type_id;
        $question->section_id = $request->section_id;
        $question->name = $request->name;
        $question->description = $request->description;
        $question->order = ($count+1);
        $question->attribute = $request->attribute;
        $question->status_id = 1;
        $question->aling = $request->aling;
        $question->save();

        return response()->json([
            'status' => true,
            'message' => 'Pregunta creada exitosamente',
            'data' => ['question' => $question->toArray()]
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
        $question = Question::where('id',$id)->with('section', 'question_type', 'status', 'answers')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Pregunta obtenida exitosamente',
            'data' => ['question' => $question]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(QuestionRequest $request, int $id): JsonResponse
    {
        $question = Question::find($id);
        $question->question_type_id = $request->question_type_id;
        $question->section_id = $request->section_id;
        $question->name = $request->name;
        $question->description = $request->description;
        $question->attribute = $request->attribute;
        $question->status_id = $request->status_id;
        $question->aling = $request->aling;
        $question->save();


        return response()->json([
            'status' => true,
            'message' => 'Pregunta actualizada exitosamente',
            'data' => ['question' => $question]
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
            $question = Question::find($id);
            $question->delete();

            return response()->json([
                'status' => true,
                'message' => 'Pregunta eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La pregunta está en uso, no es posible eliminarla.',
            ], 423);
        }
    }

    public function justAnswers(int $id)
    {
        $question = Question::where('id',$id)->with('section', 'question_type', 'status', 'answers')
        ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Pregunta obtenida exitosamente',
            'data' => ['question_answers' => $question[0]['answers']]
        ]);
    }

    public function move(int $id, String $direction): JsonResponse
    {
        $moveQuestion = Question::find($id);
        if($direction=="up"){
            $changeOrder=($moveQuestion->order*1)-1;
        }else{
            $changeOrder=($moveQuestion->order*1)+1;
        }

        $aux=Question::select('id')->where('order', $changeOrder)->where('section_id', $moveQuestion->section_id)->first();

        if($aux){
            $changeQuestion = Question::find($aux->id);
            $moveOrder=$moveQuestion->order;
            $moveQuestion->order = $changeQuestion->order;
            $changeQuestion->order=$moveOrder;

            $moveQuestion->save();
            $changeQuestion->save();

            return response()->json([
                'status' => true,
                'message' => 'Pregunta actualizada exitosamente'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No puedes mover la pregunta en esa dirección.'
            ]);
        }
    }
}
