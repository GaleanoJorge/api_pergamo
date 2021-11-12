<?php

namespace App\Http\Controllers\Management;

use App\Models\Activities;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ActivitiesRequest;
use Illuminate\Database\QueryException;

class ActivitiesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Activities = Activities::select();

        if($request->_sort){
            $Activities->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Activities->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Activities=$Activities->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Activities=$Activities->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cargo del empleado asociados exitosamente',
            'data' => ['activities' => $Activities]
        ]);
    }
    

    public function store(ActivitiesRequest $request): JsonResponse
    {
        $Activities = new Activities;
        $Activities->code = $request->code; 
        $Activities->name = $request->name; 
       
        $Activities->save();

        return response()->json([
            'status' => true,
            'message' => 'Cargo del empleado creada exitosamente',
            'data' => ['activities' => $Activities->toArray()]
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
        $Activities = Activities::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cargo del empleado obtenido exitosamente',
            'data' => ['activities' => $Activities]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ActivitiesRequest $request, int $id): JsonResponse
    {
        $Activities = Activities::find($id);
        $Activities->code = $request->code; 
        $Activities->name = $request->name; 
        
        $Activities->save();

        return response()->json([
            'status' => true,
            'message' => 'Cargo del empleado actualizado exitosamente',
            'data' => ['activities' => $Activities]
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
            $Activities = Activities::find($id);
            $Activities->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cargo del empleado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cargo del empleado esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
