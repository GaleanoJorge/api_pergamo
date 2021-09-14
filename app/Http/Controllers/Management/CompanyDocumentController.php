<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyDocument;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyDocumentRequest;
use Illuminate\Database\QueryException;

class CompanyDocumentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $CompanyDocument = CompanyDocument::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $CompanyDocument  = CompanyDocument::where('cdc_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyDocument = CompanyDocument::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $CompanyDocument = CompanyDocument::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Documentos de la empresas asociados exitosamente',
            'data' => ['company_document' => $CompanyDocument]
        ]);
    }
    

    public function store(CompanyDocumentRequest $request): JsonResponse
    {
        $CompanyDocument = new CompanyDocument;
        $CompanyDocument->cdc_company = $request->cdc_company;
        $CompanyDocument->cdc_document = $request->cdc_document;
        $CompanyDocument->cdc_file = $request->cdc_file;
        
        $CompanyDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la empresas creada exitosamente',
            'data' => ['company_docuemnt' => $CompanyDocument->toArray()]
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
        $CompanyDocument = CompanyDocument::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la empresas obtenido exitosamente',
            'data' => ['company_document' => $CompanyDocument]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyDocumentRequest $request, int $id): JsonResponse
    {
        $CompanyDocument = CompanyDocument::find($id);
        $CompanyDocument->cdc_company = $request->cdc_company;
        $CompanyDocument->cdc_document = $request->cdc_document;
        $CompanyDocument->cdc_file = $request->cdc_file;
        $CompanyDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la empresas actualizado exitosamente',
            'data' => ['company_document' => $CompanyDocument]
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
            $CompanyDocument = CompanyDocument::find($id);
            $CompanyDocument->delete();

            return response()->json([
                'status' => true,
                'message' => 'Documentos de la empresas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Documentos de la empresas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
