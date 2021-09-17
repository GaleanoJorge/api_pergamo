<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedureCategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureCategoryRequest;
use Illuminate\Database\QueryException;

class ProcedureCategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProcedureCategories = ProcedureCategory::select();

        if($request->_sort){
            $ProcedureCategories->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProcedureCategories->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProcedureCategories=$ProcedureCategories->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProcedureCategories=$ProcedureCategories->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Cargos obtenidos exitosamente',
            'data' => ['procedure_category' => $ProcedureCategories]
        ]);
    }
    

    public function store(ProcedureCategoryRequest $request): JsonResponse
    {
        $ProcedureCategory = new ProcedureCategory;
        $ProcedureCategory->name = $request->name;
      
        $ProcedureCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Categoria del procedimiento creado exitosamente',
            'data' => ['procedure_category' => $ProcedureCategory->toArray()]
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
        $ProcedureCategory = ProcedureCategory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoria del procedimiento obtenido exitosamente',
            'data' => ['procedure_category' => $ProcedureCategory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureCategoryRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedureCategoryRequest $request, int $id): JsonResponse
    {
        $ProcedureCategory = ProcedureCategory::find($id);
        $ProcedureCategory->name = $request->name;
    
        $ProcedureCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Categoria de procedimiento actualizado exitosamente',
            'data' => ['procedurecategory' => $ProcedureCategory]
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
            $ProcedureCategory = ProcedureCategory::find($id);
            $ProcedureCategory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Categoria del procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Categoria del procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
