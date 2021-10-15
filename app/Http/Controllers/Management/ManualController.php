<?php

namespace App\Http\Controllers\Management;

use App\Models\Manual;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ManualRequest;
use Illuminate\Database\QueryException;

class ManualController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Manual = Manual::select();

        if($request->_sort){
            $Manual->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Manual->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Manual=$Manual->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Manual=$Manual->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Manuales tarifarios obtenidas exitosamente',
            'data' => ['manual' => $Manual]
        ]);
    }
    

    public function store(ManualRequest $request): JsonResponse
    {
        $Manual = new Manual;
        $Manual->name = $request->name;
        $Manual->year = $request->year;
        $Manual->type_manual = $request->type_manual;
        $Manual->status_id = $request->status_id;
        $Manual->save();

        return response()->json([
            'status' => true,
            'message' => 'Manual tarifario creada exitosamente',
            'data' => ['manual' => $Manual->toArray()]
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
        $Manual = Manual::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Manuales tarifarios obtenidos exitosamente',
            'data' => ['manual' => $Manual]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ManualRequest $request, int $id): JsonResponse
    {
        $Manual = Manual::find($id);
        $Manual->name = $request->name;
        $Manual->year = $request->year;
        $Manual->type_manual = $request->type_manual;
        $Manual->status_id = $request->status_id;
        $Manual->save();

        return response()->json([
            'status' => true,
            'message' => 'Manual tarifario actualizado exitosamente',
            'data' => ['manual' => $Manual]
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
            $Manual = Manual::find($id);
            $Manual->delete();

            return response()->json([
                'status' => true,
                'message' => 'Manual tarifario eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Manual tarifario esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
