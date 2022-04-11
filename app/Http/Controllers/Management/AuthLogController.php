<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthLog;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthLogRequest;
use Illuminate\Database\QueryException;

class AuthLogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AuthLog = AuthLog::select();

        if($request->_sort){
            $AuthLog->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AuthLog->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AuthLog=$AuthLog->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AuthLog=$AuthLog->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['auth_log' => $AuthLog]
        ]);
    }

    public function store(AuthLogRequest $request): JsonResponse
    {
        $AuthLog = new AuthLog;
        $AuthLog->user_id = $request->user_id;
        $AuthLog->authorization_id = $request->authorization_id;
        $AuthLog->current_status_id = $request->current_status_id;
        
        $AuthLog->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas creados exitosamente',
            'data' => ['auth_log' => $AuthLog->toArray()]
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
        $AuthLog = AuthLog::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas obtenidos exitosamente',
            'data' => ['auth_log' => $AuthLog]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthLogRequest $request, int $id): JsonResponse
    {
        $AuthLog = AuthLog::find($id);
        $AuthLog->user_id = $request->user_id;
        $AuthLog->authorization_id = $request->authorization_id;
        $AuthLog->current_status_id = $request->current_status_id;
        $AuthLog->save();
        
        $AuthLog->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de glosas actualizados exitosamente',
            'data' => ['auth_log' => $AuthLog]
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
            $AuthLog = AuthLog::find($id);
            $AuthLog->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estados de glosas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estados de glosas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
