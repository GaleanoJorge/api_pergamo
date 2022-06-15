<?php

namespace App\Http\Controllers\Management;

use App\Models\SkinStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SkinStatusRequest;
use Illuminate\Database\QueryException;

class SkinStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $SkinStatus = SkinStatus::select('skin_status.*');

        if($request->_sort){
            $SkinStatus->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SkinStatus->where('name','like','%' . $request->search. '%');
        }
   
        if($request->query("pagination", true)=="false"){
            $SkinStatus=$SkinStatus->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SkinStatus=$SkinStatus->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estado de la piel asociadas exitosamente',
            'data' => ['skin_status' => $SkinStatus]
        ]);
    }

    
    public function store(SkinStatusRequest $request)
    {
        $SkinStatus = new SkinStatus;
        $SkinStatus->name = $request->name; 
        $SkinStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de la piel creadas exitosamente',
            'data' => ['skin_status' => $SkinStatus->toArray()]
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
        $SkinStatus = SkinStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de la piel obtenidas exitosamente',
            'data' => ['skin_status' => $SkinStatus]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SkinStatusRequest $request, int $id): JsonResponse
    {
        $SkinStatus = SkinStatus::find($id);
        $SkinStatus->name = $request->name; 
        $SkinStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de la piel actualizadas exitosamente',
            'data' => ['skin_status' => $SkinStatus]
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
            $SkinStatus = SkinStatus::find($id);
            $SkinStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de la piel eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de la piel estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
