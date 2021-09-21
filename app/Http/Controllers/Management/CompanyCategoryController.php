<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyCategory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyCategoryRequest;
use Illuminate\Database\QueryException;

class CompanyCategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CompanyCategory = CompanyCategory::select();

        if($request->_sort){
            $CompanyCategory->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CompanyCategory->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CompanyCategory=$CompanyCategory->get()->toArray();    

        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CompanyCategory=$CompanyCategory->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Categoría de la empresa obtenidas exitosamente',
            'data' => ['company_category' => $CompanyCategory]
        ]);
    }
    

    public function store(CompanyCategoryRequest $request): JsonResponse
    {
        $CompanyCategory = new CompanyCategory;
        $CompanyCategory->name = $request->name;
        
        $CompanyCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Categoría de la empresa creada exitosamente',
            'data' => ['company_company' => $CompanyCategory->toArray()]
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
        $CompanyCategory = CompanyCategory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoría de la empresa obtenido exitosamente',
            'data' => ['company_category' => $CompanyCategory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyCategoryRequest $request, int $id): JsonResponse
    {
        $CompanyCategory = CompanyCategory::find($id);
        $CompanyCategory->name = $request->name;
        
        $CompanyCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Categoría de la empresa  actualizado exitosamente',
            'data' => ['company_category' => $CompanyCategory]
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
            $CompanyCategory = CompanyCategory::find($id);
            $CompanyCategory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Categoría de la empresa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Categoría de la empresa esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
