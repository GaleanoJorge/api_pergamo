<?php

namespace App\Http\Controllers\Management;

use App\Models\StudyLevelStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudyLevelStatusRequest;
use Illuminate\Database\QueryException;

class StudyLevelStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $StudyLevelStatus = StudyLevelStatus::select();

        if($request->_sort){
            $StudyLevelStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $StudyLevelStatus->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $StudyLevelStatus=$StudyLevelStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $StudyLevelStatus=$StudyLevelStatus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado de estudio asociados exitosamente',
            'data' => ['study_level_status' => $StudyLevelStatus]
        ]);
    }
    

    public function store(StudyLevelStatusRequest $request): JsonResponse
    {
        $StudyLevelStatus = new StudyLevelStatus;
        $StudyLevelStatus->name = $request->name; 
        $StudyLevelStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de estudio  creada exitosamente',
            'data' => ['study_level_status' => $StudyLevelStatus->toArray()]
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
        $StudyLevelStatus = StudyLevelStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de estudio  obtenido exitosamente',
            'data' => ['study_level_status' => $StudyLevelStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(StudyLevelStatusRequest $request, int $id): JsonResponse
    {
        $StudyLevelStatus = StudyLevelStatus::find($id);
        $StudyLevelStatus->name = $request->name; 
        $StudyLevelStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de estudio actualizado exitosamente',
            'data' => ['study_level_status' => $StudyLevelStatus]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $StudyLevelStatus = StudyLevelStatus::find($id);
            $StudyLevelStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de estudio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de estudio esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
