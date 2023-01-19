<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeRecord;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChTypeRecordController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeRecord = ChTypeRecord::select();

        if($request->_sort){
            $ChTypeRecord->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChTypeRecord->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChTypeRecord=$ChTypeRecord->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChTypeRecord=$ChTypeRecord->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenidos exitosamente',
            'data' => ['type_record' => $ChTypeRecord]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChTypeRecord = new ChTypeRecord; 
        $ChTypeRecord->name = $request->name; 
        $ChTypeRecord->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico asociado al paciente exitosamente',
            'data' => ['type_record' => $ChTypeRecord->toArray()]
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
        $ChTypeRecord = ChTypeRecord::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico obtenido exitosamente',
            'data' => ['type_record' => $ChTypeRecord]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChTypeRecord = ChTypeRecord::find($id);  
        $ChTypeRecord->name = $request->name; 
          
        
        
        $ChTypeRecord->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de diagnostico actualizado exitosamente',
            'data' => ['type_record' => $ChTypeRecord]
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
            $ChTypeRecord = ChTypeRecord::find($id);
            $ChTypeRecord->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clase de diagnostico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clase de diagnostico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
