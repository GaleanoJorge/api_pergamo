<?php

namespace App\Http\Controllers\Management;

use App\Models\StatusBed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class StatusBedController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $StatusBed = StatusBed::select();

        if($request->_sort){
            $StatusBed->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $StatusBed->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $StatusBed=$StatusBed->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $StatusBed=$StatusBed->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Estados de cama obtenidos exitosamente',
            'data' => ['status_bed' => $StatusBed]
        ]);
    }
    

    public function store(BedRequest $request): JsonResponse
    {
        $StatusBed = new StatusBed;
        $StatusBed->name = $request->name; 
         
        
        $StatusBed->save();

        return response()->json([
            'status' => true,
            'message' => 'Estados de Cama creada exitosamente',
            'data' => ['status_bed' => $StatusBed->toArray()]
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
        $StatusBed = StatusBed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados de Cama obtenido exitosamente',
            'data' => ['status_bed' => $StatusBed]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BedRequest $request, int $id): JsonResponse
    {
        $StatusBed = StatusBed::find($id); 
        $StatusBed->name = $request->name; 
          
        
        
        $StatusBed->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de Cama actualizado exitosamente',
            'data' => ['status_bed' => $StatusBed]
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
            $StatusBed = StatusBed::find($id);
            $StatusBed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de cama eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de Cama esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
