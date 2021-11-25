<?php

namespace App\Http\Controllers\Management;

use App\Models\Flat;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FlatRequest;
use Illuminate\Database\QueryException;

class FlatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Flat = Flat::select();

        if($request->_sort){
            $Flat->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Flat->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Flat=$Flat->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Flat=$Flat->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Piso asociados exitosamente',
            'data' => ['flat' => $Flat]
        ]);
    }


                 /**
     * Display a listing of the resource
     *
     * @param integer $campus_id
     * @return JsonResponse
     */
    public function getFlatByCampus(int $campus_id): JsonResponse
    {
        $Flat = Flat::where('campus_id', $campus_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Programas obtenidos exitosamente',
            'data' => ['flat' => $Flat]
        ]);
    }
    

    public function store(FlatRequest $request): JsonResponse
    {
        $Flat = new Flat;
        $Flat->code = $request->code; 
        $Flat->name = $request->name; 
        $Flat->campus_id = $request->campus_id; 
        
        $Flat->save();

        return response()->json([
            'status' => true,
            'message' => 'Piso creada exitosamente',
            'data' => ['flat' => $Flat->toArray()]
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
        $Flat = Flat::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Piso obtenido exitosamente',
            'data' => ['flat' => $Flat]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FlatRequest $request, int $id): JsonResponse
    {
        $Flat = Flat::find($id); 
        $Flat->code = $request->code; 
        $Flat->name = $request->name; 
        $Flat->campus_id = $request->campus_id; 
        
        $Flat->save();

        return response()->json([
            'status' => true,
            'message' => 'Piso actualizado exitosamente',
            'data' => ['flat' => $Flat]
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
            $Flat = Flat::find($id);
            $Flat->delete();

            return response()->json([
                'status' => true,
                'message' => 'Piso eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Piso esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
