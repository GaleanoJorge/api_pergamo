<?php

namespace App\Http\Controllers\Management;

use App\Models\CompetitionCourse;
use App\Models\Competition;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\CompetitionRequest;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $competition = Competition::select('*');

        if($request->_sort){
            $competition->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $competition->where('name','like','%' . $request->search. '%');
        }

        
        if($request->query("pagination", true)=="false"){
            $competition=$competition->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $competition = $competition->paginate($per_page,'*','page',$page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Temas obtenidos exitosamente',
            'data' => ['competition' => $competition]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ThemesRequest  $request
     * @return JsonResponse
     */
    public function store(CompetitionRequest $request): JsonResponse
    {
        $competition = new Competition;
        $competition->name = $request->name;
        $competition->description = $request->description;
        $competition->save();

        return response()->json([
            'status' => true,
            'message' => 'Competencia creada exitosamente',
            'data' => ['competition' => $competition->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $competition = Competition::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Competencia obtenida exitosamente',
            'data' => ['competition' => $competition]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ThemesRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompetitionRequest $request, $id): JsonResponse
    {
        $competition = Competition::find($id);
        $competition->name = $request->name;
        $competition->description = $request->description;
        $competition->save();

        return response()->json([
            'status' => true,
            'message' => 'Competencia actualizada exitosamente',
            'data' => ['competition' => $competition]
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $competition = Competition::find($id);
            $competition->delete();

            return response()->json([
                'status' => true,
                'message' => 'Competencia eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Competencia está en uso, no es posible eliminarla.',
            ], 423);
        }
    }
    /**
     * Get the Competition by course id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getByCourse(int $courseId): JsonResponse
    {
        $competition = CompetitionCourse::where('course_id', $courseId)
            ->with('competition.criteria', 'course')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Competencias y criterios por curso obtenidas exitosamente.',
            'data' => ['competition' => $competition]
        ]);
    }
}
