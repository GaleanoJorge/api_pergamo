<?php

namespace App\Http\Controllers\Management;

use App\Models\MediumSignatureFile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MediumSignatureFileRequest;
use Illuminate\Database\QueryException;

class MediumSignatureFileController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $MediumSignatureFile = MediumSignatureFile::select();

        if($request->_sort){
            $MediumSignatureFile->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $MediumSignatureFile->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $MediumSignatureFile=$MediumSignatureFile->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $MediumSignatureFile=$MediumSignatureFile->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Profesional asociados exitosamente',
            'data' => ['medium_signature_file' => $MediumSignatureFile]
        ]);
    }
    

    public function store(MediumSignatureFileRequest $request): JsonResponse
    {
        $MediumSignatureFile = new MediumSignatureFile;
       
        $MediumSignatureFile->file = $request->file; 
     
        $MediumSignatureFile->save();

        return response()->json([
            'status' => true,
            'message' => 'Firma digital creada exitosamente',
            'data' => ['medium_signature_file' => $MediumSignatureFile->toArray()]
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
        $MediumSignatureFile = MediumSignatureFile::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Firma digital obtenido exitosamente',
            'data' => ['medium_signature_file' => $MediumSignatureFile]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MediumSignatureFileRequest $request, int $id): JsonResponse
    {
        $MediumSignatureFile = MediumSignatureFile::find($id);
    
        $MediumSignatureFile->file = $request->file; 

        $MediumSignatureFile->save();

        return response()->json([
            'status' => true,
            'message' => 'Firma digital actualizado exitosamente',
            'data' => ['medium_signature_file' => $MediumSignatureFile]
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
            $MediumSignatureFile = MediumSignatureFile::find($id);
            $MediumSignatureFile->delete();

            return response()->json([
                'status' => true,
                'message' => 'Firma digital eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Firma digital esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
