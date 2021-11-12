<?php

namespace App\Http\Controllers\Management;

use App\Models\PopulationGroup;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PopulationGroupRequest;
use Illuminate\Database\QueryException;

class PopulationGroupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PopulationGroup = PopulationGroup::select();

        if($request->_sort){
            $PopulationGroup->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PopulationGroup->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $PopulationGroup=$PopulationGroup->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PopulationGroup=$PopulationGroup->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Grupo poblacional asociados exitosamente',
            'data' => ['population_group' => $PopulationGroup]
        ]);
    }
    

    public function store(PopulationGroupRequest $request): JsonResponse
    {
        $PopulationGroup = new PopulationGroup;
         
        $PopulationGroup->name = $request->name; 
       
        $PopulationGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo poblacional creada exitosamente',
            'data' => ['population_group' => $PopulationGroup->toArray()]
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
        $PopulationGroup = PopulationGroup::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo poblacional obtenido exitosamente',
            'data' => ['population_group' => $PopulationGroup]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PopulationGroupRequest $request, int $id): JsonResponse
    {
        $PopulationGroup = PopulationGroup::find($id);
        
        $PopulationGroup->name = $request->name; 
        
        $PopulationGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo poblacional actualizado exitosamente',
            'data' => ['population_group' => $PopulationGroup]
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
            $PopulationGroup = PopulationGroup::find($id);
            $PopulationGroup->delete();

            return response()->json([
                'status' => true,
                'message' => 'Grupo poblacional eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Grupo poblacional esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
