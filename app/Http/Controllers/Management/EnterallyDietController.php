<?php

namespace App\Http\Controllers\Management;

use App\Models\EnterallyDiet;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EnterallyDietRequest;
use Illuminate\Database\QueryException;

class EnterallyDietController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $EnterallyDiet = EnterallyDiet::select();

        if($request->_sort){
            $EnterallyDiet->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $EnterallyDiet->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $EnterallyDiet=$EnterallyDiet->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $EnterallyDiet=$EnterallyDiet->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Enteral de dietas obtenidos exitosamente',
            'data' => ['enterally_diet' => $EnterallyDiet]
        ]);
    }

    public function store(EnterallyDietRequest $request): JsonResponse
    {
        $EnterallyDiet = new EnterallyDiet;
        $EnterallyDiet->name = $request->name;
        
        $EnterallyDiet->save();

        return response()->json([
            'status' => true,
            'message' => 'Enteral de dietas creados exitosamente',
            'data' => ['enterally_diet' => $EnterallyDiet->toArray()]
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
        $EnterallyDiet = EnterallyDiet::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Enteral de dietas obtenidos exitosamente',
            'data' => ['enterally_diet' => $EnterallyDiet]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(EnterallyDietRequest $request, int $id): JsonResponse
    {
        $EnterallyDiet = EnterallyDiet::find($id);
        $EnterallyDiet->name = $request->name;
        
        $EnterallyDiet->save();

        return response()->json([
            'status' => true,
            'message' => 'Enteral de dietas actualizados exitosamente',
            'data' => ['enterally_diet' => $EnterallyDiet]
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
            $EnterallyDiet = EnterallyDiet::find($id);
            $EnterallyDiet->delete();

            return response()->json([
                'status' => true,
                'message' => 'Enteral de dietas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Enteral de dietas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
