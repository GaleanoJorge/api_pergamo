<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SectionRequest;
use Illuminate\Database\QueryException;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::with('coursebase', 'answer_type', 'questions');

        if($request->_sort){
            $sections->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $sections->where('name','like','%' . $request->search. '%');
            $sections->orWhere('description','like','%' . $request->search. '%');

        }

        if ($request->coursebase_id) {
            $sections->where('coursebase_id', $request->coursebase_id);
        }
        if ($request->answer_type_id) {
            $sections->where('answer_type_id', $request->answer_type_id);
        }
        if($request->query("pagination", true)=="false"){
            $sections=$sections->get()->toArray();
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);

            $sections=$sections->paginate($per_page,'*','page',$page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Secciones obtenidas exitosamente',
            'data' => ['sections' => $sections]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionRequest $request
     * @return JsonResponse
     */
    public function store(SectionRequest $request): JsonResponse
    {
        $section = new Section;
        $section->coursebase_id = $request->coursebase_id;
        $section->answer_type_id = $request->answer_type_id;
        $section->name = $request->name;
        $section->is_matriz = $request->is_matriz;
        $section->description = $request->description;
        $section->save();

        return response()->json([
            'status' => true,
            'message' => 'Sección creada exitosamente',
            'data' => ['section' => $section->toArray()]
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
        $section = Section::where('id', $id)->with('coursebase', 'answer_type', 'questions')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sección obtenida exitosamente',
            'data' => ['section' => $section]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(SectionRequest $request, int $id): JsonResponse
    {
        $section = Section::find($id);
        $section->coursebase_id = $request->coursebase_id;
        $section->answer_type_id = $request->answer_type_id;
        $section->name = $request->name;
        $section->description = $request->description;
        $section->is_matriz = $request->is_matriz;
        $section->save();

        return response()->json([
            'status' => true,
            'message' => 'Sección actualizada exitosamente',
            'data' => ['section' => $section]
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
            $section = Section::find($id);
            $section->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sección eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La sección está en uso, no es posible eliminarla.',
            ], 423);
        }
    }
}
