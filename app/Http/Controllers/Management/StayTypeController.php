<?php

namespace App\Http\Controllers\Management;

use App\Models\StayType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StayTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $StayType = StayType::select();

        if($request->_sort){
            $StayType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $StayType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $StayType=$StayType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $StayType=$StayType->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['stay_type' => $StayType]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $StayType = new StayType;
        $StayType->name = $request->name;
        
        $StayType->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta creados exitosamente',
            'data' => ['stay_type' => $StayType->toArray()]
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
        $StayType = StayType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['stay_type' => $StayType]
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
        $StayType = StayType::find($id);
        $StayType->name = $request->name;
        
        $StayType->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta actualizados exitosamente',
            'data' => ['stay_type' => $StayType]
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
            $StayType = StayType::find($id);
            $StayType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Días de dieta eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Días de dieta estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
