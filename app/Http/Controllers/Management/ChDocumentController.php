<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDocument;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChDocumentRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ChDocumentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDocument = ChDocument::select();

        if($request->_sort){
            $ChDocument->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChDocument->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChDocument=$ChDocument->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChDocument=$ChDocument->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Consentimiento informado obtenidos exitosamente',
            'data' => ['informed_consents' => $ChDocument]
        ]);
    }

            /**
     * Get procedure by manual.
     *
     * @param  int  $chRecordId
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $chRecordId): JsonResponse
    {
        $ChDocument = ChDocument::where('ch_record_id', $chRecordId);
        if ($request->search) {
            $ChDocument->where('name', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ChDocument = $ChDocument->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChDocument = $ChDocument->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Archivos por contrato obtenido exitosamente',
            'data' => ['informed_consents' => $ChDocument]
        ]);
    }

    public function store(ChDocumentRequest $request): JsonResponse
    {
        $ChDocument = new ChDocument;
        $ChDocument->name = $request->name;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $ChDocument->file = $path;
        }    
        $ChDocument->ch_record_id = $request->ch_record_id;
        
        $ChDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Consentimiento informado  creada exitosamente',
            'data' => ['informed_consents' => $ChDocument->toArray()]
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
        $ChDocument = ChDocument::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Consentimiento informado obtenido exitosamente',
            'data' => ['informed_consents' => $ChDocument]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChDocumentRequest $request, int $id): JsonResponse
    {
        $ChDocument = ChDocument::find($id);
        $ChDocument->name = $request->name;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $ChDocument->file = $path;
        }   
        $ChDocument->ch_record_id = $request->ch_record_id;
        $ChDocument->save();

        return response()->json([
            'status' => true,
            'message' => 'Consentimiento informado  actualizado exitosamente',
            'data' => ['informed_consents' => $ChDocument]
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
            $ChDocument = ChDocument::find($id);
            $ChDocument->delete();

            return response()->json([
                'status' => true,
                'message' => 'Consentimiento informado  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Consentimiento informado  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
