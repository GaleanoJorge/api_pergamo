<?php

namespace App\Http\Controllers\Management;

use App\Models\DietMenuType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietMenuTypeRequest;
use Illuminate\Database\QueryException;

class DietMenuTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietMenuType = DietMenuType::select();

        if($request->_sort){
            $DietMenuType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $DietMenuType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $DietMenuType=$DietMenuType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $DietMenuType=$DietMenuType->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de menú de dieta obtenidos exitosamente',
            'data' => ['diet_menu_type' => $DietMenuType]
        ]);
    }

    public function store(DietMenuTypeRequest $request): JsonResponse
    {
        $DietMenuType = new DietMenuType;
        $DietMenuType->name = $request->name;
        
        $DietMenuType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de menú de dieta creados exitosamente',
            'data' => ['diet_menu_type' => $DietMenuType->toArray()]
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
        $DietMenuType = DietMenuType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de menú de dieta obtenidos exitosamente',
            'data' => ['diet_menu_type' => $DietMenuType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietMenuTypeRequest $request, int $id): JsonResponse
    {
        $DietMenuType = DietMenuType::find($id);
        $DietMenuType->name = $request->name;
        
        $DietMenuType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de menú de dieta actualizados exitosamente',
            'data' => ['diet_menu_type' => $DietMenuType]
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
            $DietMenuType = DietMenuType::find($id);
            $DietMenuType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de menú de dieta eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de menú de dieta estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
