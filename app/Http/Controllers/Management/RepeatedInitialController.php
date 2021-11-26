<?php

namespace App\Http\Controllers\Management;

use App\Models\RepeatedInitial;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RepeatedInitialRequest;
use Illuminate\Database\QueryException;

class RepeatedInitialController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RepeatedInitial = RepeatedInitial::select();

        if($request->_sort){
            $RepeatedInitial->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $RepeatedInitial->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $RepeatedInitial=$RepeatedInitial->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $RepeatedInitial=$RepeatedInitial->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Reiterados o Iniciales obtenidos exitosamente',
            'data' => ['repeated_initial' => $RepeatedInitial]
        ]);
    }

    public function store(RepeatedInitialRequest $request): JsonResponse
    {
        $RepeatedInitial = new RepeatedInitial;
        $RepeatedInitial->name = $request->name;
        
        $RepeatedInitial->save();

        return response()->json([
            'status' => true,
            'message' => 'Reiterados o Iniciales creados exitosamente',
            'data' => ['repeated_initial' => $RepeatedInitial->toArray()]
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
        $RepeatedInitial = RepeatedInitial::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Reiterados o Iniciales obtenidos exitosamente',
            'data' => ['repeated_initial' => $RepeatedInitial]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RepeatedInitialRequest $request, int $id): JsonResponse
    {
        $RepeatedInitial = RepeatedInitial::find($id);
        $RepeatedInitial->name = $request->name;
        
        $RepeatedInitial->save();

        return response()->json([
            'status' => true,
            'message' => 'Reiterados o Iniciales actualizados exitosamente',
            'data' => ['repeated_initial' => $RepeatedInitial]
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
            $RepeatedInitial = RepeatedInitial::find($id);
            $RepeatedInitial->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reiterados o Iniciales eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reiterados o Iniciales estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
