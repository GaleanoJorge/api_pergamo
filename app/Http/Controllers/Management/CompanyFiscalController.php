<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyFiscal;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyFiscalRequest;
use Illuminate\Database\QueryException;

class CompanyFiscalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $CompanyFiscal = CompanyFiscal::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $CompanyFiscal  = CompanyFiscal::where('cof_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyFiscal = CompanyFiscal::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $CompanyFiscal = CompanyFiscal::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Asociación de caracteristicas fiscales con compañia obtenidas exitosamente',
            'data' => ['company_fiscal' => $CompanyFiscal]
        ]);
    }
    

    public function store(CompanyFiscalRequest $request): JsonResponse
    {
        $CompanyFiscal = new CompanyFiscal;
        $CompanyFiscal->cof_company = $request->cof_company;
        $CompanyFiscal->cof_characteristic = $request->cof_characteristic;
        $CompanyFiscal->cof_clasification= $request->cof_clasification;
        $CompanyFiscal->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de caracteristicas fiscales con compañia creada exitosamente',
            'data' => ['company_fiscal' => $CompanyFiscal->toArray()]
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
        $CompanyFiscal = CompanyFiscal::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de caracteristicas fiscales con compañia obtenido exitosamente',
            'data' => ['company_fiscal' => $CompanyFiscal]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyFiscalRequest $request, int $id): JsonResponse
    {
        $CompanyFiscal = CompanyFiscal::find($id);
        $CompanyFiscal->cof_company = $request->cof_company;
        $CompanyFiscal->cof_characteristic = $request->cof_characteristic;
        $CompanyFiscal->cof_clasification= $request->cof_clasification;
        $CompanyFiscal->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de caracteristicas fiscales con compañia actualizado exitosamente',
            'data' => ['company_fiscal' => $CompanyFiscal]
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
            $CompanyFiscal = CompanyFiscal::find($id);
            $CompanyFiscal->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociación de caracteristicas fiscales con compañia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociación de caracteristicas fiscales con compañia esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
