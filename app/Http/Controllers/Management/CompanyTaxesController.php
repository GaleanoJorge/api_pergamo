<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyTaxes;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyTaxesRequest;
use Illuminate\Database\QueryException;

class CompanyTaxesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CompanyTaxes = CompanyTaxes::select();

        if($request->_sort){
            $CompanyTaxes->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CompanyTaxes->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CompanyTaxes=$CompanyTaxes->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CompanyTaxes=$CompanyTaxes->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la compañía obtenidas exitosamente',
            'data' => ['company_taxes' => $CompanyTaxes]
        ]);
    }
    
/**
     * Get documents by company.
     *
     * @param  int  $companyId
     * @return JsonResponse
     */
    public function getByCompany(Request $request, int $companyId): JsonResponse
    {
        $CompanyTaxes = CompanyTaxes::where('company_id', $companyId);
        if ($request->search) {
            $CompanyTaxes->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyTaxes = $CompanyTaxes->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CompanyTaxes = $CompanyTaxes->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Documentos por empresa obtenidos exitosamente',
            'data' => ['company_taxes' => $CompanyTaxes]
        ]);
    }
    public function store(CompanyTaxesRequest $request): JsonResponse
    {
        $CompanyTaxes = new CompanyTaxes;
        $CompanyTaxes->company_id = $request->company_id;
        $CompanyTaxes->taxes_id = $request->taxes_id;
        $CompanyTaxes->fiscal_clasification_id = $request->fiscal_clasification_id;
        $CompanyTaxes->save();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la compañía creada exitosamente',
            'data' => ['company_taxes' => $CompanyTaxes->toArray()]
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
        $CompanyTaxes = CompanyTaxes::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la compañía obtenido exitosamente',
            'data' => ['company_taxes' => $CompanyTaxes]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyTaxesRequest $request, int $id): JsonResponse
    {
        $CompanyTaxes = CompanyTaxes::find($id);
        $CompanyTaxes->company_id = $request->company_id;
        $CompanyTaxes->taxes_id = $request->taxes_id;
        $CompanyTaxes->fiscal_clasification_id = $request->fiscal_clasification_id;
        $CompanyTaxes->save();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la compañía actualizado exitosamente',
            'data' => ['company_taxes' => $CompanyTaxes]
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
            $CompanyTaxes = CompanyTaxes::find($id);
            $CompanyTaxes->delete();

            return response()->json([
                'status' => true,
                'message' => 'Impuestos de la compañía eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Impuestos de la compañía esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
