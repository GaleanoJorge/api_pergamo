<?php

namespace App\Http\Controllers\Management;

use App\Models\CostCenter;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CostCenterRequest;
use Illuminate\Database\QueryException;

class CostCenterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $CostCenter = CostCenter::select();

        if($request->_sort){
            $CostCenter->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CostCenter->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CostCenter=$CostCenter->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CostCenter=$CostCenter->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Centro de costos del empleado asociados exitosamente',
            'data' => ['cost_center' => $CostCenter]
        ]);
    }
    

    public function store(CostCenterRequest $request): JsonResponse
    {
        $CostCenter = new CostCenter;
        $CostCenter->code = $request->code;
        $CostCenter->name = $request->name; 
     
        $CostCenter->save();

        return response()->json([
            'status' => true,
            'message' => 'Centro de costos del empleado creada exitosamente',
            'data' => ['cost_center' => $CostCenter->toArray()]
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
        $CostCenter = CostCenter::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'CCentro de costos del empleado obtenido exitosamente',
            'data' => ['cost_center' => $CostCenter]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CostCenterRequest $request, int $id): JsonResponse
    {
        $CostCenter = CostCenter::find($id);
        $CostCenter->code = $request->code;
        $CostCenter->name = $request->name; 

        $CostCenter->save();

        return response()->json([
            'status' => true,
            'message' => 'Centro de costos del empleado actualizado exitosamente',
            'data' => ['cost_center' => $CostCenter]
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
            $CostCenter = CostCenter::find($id);
            $CostCenter->delete();

            return response()->json([
                'status' => true,
                'message' => 'Centro de costos del empleado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Centro de costos del empleado esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
