<?php

namespace App\Http\Controllers\Management;

use App\Models\SuppliesStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SuppliesStatusRequest;
use Illuminate\Database\QueryException;

class SuppliesStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $SuppliesStatus = SuppliesStatus::select('supplies_status.*');

        if($request->_sort){
            $SuppliesStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SuppliesStatus->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $SuppliesStatus=$SuppliesStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SuppliesStatus=$SuppliesStatus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado suministros asociados exitosamente',
            'data' => ['supplies_status' => $SuppliesStatus]
        ]);
    }

    
    public function store(SuppliesStatusRequest $request)
    {
        $SuppliesStatus = new SuppliesStatus;
        $SuppliesStatus->name = $request->name; 
        $SuppliesStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado suministros creados exitosamente',
            'data' => ['supplies_status' => $SuppliesStatus->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $SuppliesStatus = SuppliesStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado suministros obtenidos exitosamente',
            'data' => ['supplies_status' => $SuppliesStatus]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SuppliesStatusRequest $request, int $id): JsonResponse
    {
        $SuppliesStatus = SuppliesStatus::find($id);
        $SuppliesStatus->name = $request->name; 
        $SuppliesStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado suministros actualizados exitosamente',
            'data' => ['supplies_status' => $SuppliesStatus]
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
            $SuppliesStatus = SuppliesStatus::find($id);
            $SuppliesStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado suministro eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado suministro en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
