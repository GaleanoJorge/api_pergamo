<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyDocument;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyDocumentRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CompanyDocumentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CompanyDocument = CompanyDocument::select();

        if($request->_sort){
            $CompanyDocument->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CompanyDocument->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CompanyDocument=$CompanyDocument->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CompanyDocument=$CompanyDocument->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la compañías asociados exitosamente',
            'data' => ['company_document' => $CompanyDocument]
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
        $CompanyDocument = CompanyDocument::where('company_id', $companyId);
        if ($request->search) {
            $CompanyDocument->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyDocument = $CompanyDocument->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CompanyDocument = $CompanyDocument->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Documentos por empresa obtenidos exitosamente',
            'data' => ['company_document' => $CompanyDocument]
        ]);
    }
    
    public function store(CompanyDocumentRequest $request): JsonResponse
    {
        $CompanyDocument = new CompanyDocument;
        $CompanyDocument->company_id = $request->company_id;
        $CompanyDocument->document_id = $request->document_id;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $CompanyDocument->file = $path;
        }    
        $CompanyDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la compañías creada exitosamente',
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
            'message' => 'Documentos de la compañías obtenido exitosamente',
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
        $CompanyDocument->company_id = $request->company_id;
        $CompanyDocument->document_id = $request->document_id;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $CompanyDocument->file = $path;
        }    
        $CompanyDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos de la compañías actualizado exitosamente',
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
                'message' => 'Documentos de la compañías eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Documentos de la compañías esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
