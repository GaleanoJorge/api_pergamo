<?php

namespace App\Http\Controllers\Management;

use App\Models\ObjetionType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ObjetionTypeRequest;
use Illuminate\Database\QueryException;

class ObjetionTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ObjetionType = ObjetionType::select();

        if($request->_sort){
            $ObjetionType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ObjetionType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ObjetionType=$ObjetionType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ObjetionType=$ObjetionType->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de Objeción obtenidos exitosamente',
            'data' => ['objetion_type' => $ObjetionType]
        ]);
    }

    public function store(ObjetionTypeRequest $request): JsonResponse
    {
        $ObjetionType = new ObjetionType;
        $ObjetionType->name = $request->name;
        
        $ObjetionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de Objeción creados exitosamente',
            'data' => ['objetion_type' => $ObjetionType->toArray()]
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
        $ObjetionType = ObjetionType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de Objeción obtenidos exitosamente',
            'data' => ['objetion_type' => $ObjetionType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ObjetionTypeRequest $request, int $id): JsonResponse
    {
        $ObjetionType = ObjetionType::find($id);
        $ObjetionType->name = $request->name;
        
        $ObjetionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de Objeción actualizados exitosamente',
            'data' => ['objetion_type' => $ObjetionType]
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
            $ObjetionType = ObjetionType::find($id);
            $ObjetionType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de Objeción eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de Objeción estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
