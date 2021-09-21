<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyTypeRequest;
use Illuminate\Database\QueryException;

class CompanyTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CompanyType = CompanyType::select();

        if($request->_sort){
            $CompanyType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CompanyType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CompanyType=$CompanyType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CompanyType=$CompanyType->paginate($per_page,'*','page',$page); 
        } 
    }

    public function store(CompanyTypeRequest $request): JsonResponse
    {
        $CompanyType = new CompanyType;
        $CompanyType->name = $request->name;
        
        $CompanyType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de compañias de entidades de salud creada exitosamente',
            'data' => ['company_type' => $CompanyType->toArray()]
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
        $CompanyType = CompanyType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de compañias de entidades de salud obtenido exitosamente',
            'data' => ['company_type' => $CompanyType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyTypeRequest $request, int $id): JsonResponse
    {
        $CompanyType = CompanyType::find($id);
        $CompanyType->name = $request->name;
        
        $CompanyType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de compañias de entidades de salud actualizado exitosamente',
            'data' => ['company_type' => $CompanyType]
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
            $CompanyType = CompanyType::find($id);
            $CompanyType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de compañia de entidad de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de compañia de entidad de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
