<?php

namespace App\Http\Controllers\Management;

use App\Models\DietDish;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietDishRequest;
use Illuminate\Database\QueryException;

class DietDishController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietDish = DietDish::select();

        if($request->_sort){
            $DietDish->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $DietDish->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $DietDish=$DietDish->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $DietDish=$DietDish->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Platos de dietas obtenidos exitosamente',
            'data' => ['diet_dish' => $DietDish]
        ]);
    }

    public function store(DietDishRequest $request): JsonResponse
    {
        $DietDish = new DietDish;
        $DietDish->name = $request->name;
        
        $DietDish->save();

        return response()->json([
            'status' => true,
            'message' => 'Platos de dietas creados exitosamente',
            'data' => ['diet_dish' => $DietDish->toArray()]
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
        $DietDish = DietDish::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Platos de dietas obtenidos exitosamente',
            'data' => ['diet_dish' => $DietDish]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietDishRequest $request, int $id): JsonResponse
    {
        $DietDish = DietDish::find($id);
        $DietDish->name = $request->name;
        
        $DietDish->save();

        return response()->json([
            'status' => true,
            'message' => 'Platos de dietas actualizados exitosamente',
            'data' => ['diet_dish' => $DietDish]
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
            $DietDish = DietDish::find($id);
            $DietDish->delete();

            return response()->json([
                'status' => true,
                'message' => 'Platos de dietas eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Platos de dietas estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
