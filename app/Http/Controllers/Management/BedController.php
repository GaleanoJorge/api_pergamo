<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class BedController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Bed = Bed::select();

        if($request->_sort){
            $Bed->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Bed->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Bed=$Bed->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Bed=$Bed->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cama asociados al paciente exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }
    

    public function store(BedRequest $request): JsonResponse
    {
        $Bed = new Bed;
        $Bed->code = $request->code; 
        $Bed->name = $request->name; 
         
        
        $Bed->save();

        return response()->json([
            'status' => true,
            'message' => 'Cama creada exitosamente',
            'data' => ['bed' => $Bed->toArray()]
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
        $Bed = Bed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cama obtenido exitosamente',
            'data' => ['bed' => $Bed]
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
        $Bed = Bed::find($id); 
        $Bed->code = $request->code; 
        $Bed->name = $request->name; 
          
        
        
        $Bed->save();

        return response()->json([
            'status' => true,
            'message' => 'Cama actualizado exitosamente',
            'data' => ['bed' => $Bed]
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
            $Bed = Bed::find($id);
            $Bed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Camae eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cama esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
