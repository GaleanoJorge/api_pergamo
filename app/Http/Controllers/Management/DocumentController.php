<?php

namespace App\Http\Controllers\Management;

use App\Models\Document;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use Illuminate\Database\QueryException;

class DocumentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $documents = Document::with('status');

        if($request->_sort){
            $documents->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $documents->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $documents->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $documents=$documents->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $documents=$documents->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Cargos obtenidos exitosamente',
            'data' => ['document' => $documents]
        ]);
    }
    

    public function store(DocumentRequest $request): JsonResponse
    {
        $Document = new Document;
        $Document->name = $request->name;
        $Document->status_id = $request->status_id;  
        $Document->save();

        return response()->json([
            'status' => true,
            'message' => 'Lista de documentos de la empresas creada exitosamente',
            'data' => ['docuemnt' => $Document->toArray()]
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
        $Document = Document::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Lista de documentos de la empresas obtenido exitosamente',
            'data' => ['document' => $Document]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DocumentRequest $request, int $id): JsonResponse
    {
        $Document = Document::find($id);
        $Document->name = $request->name;
        $Document->status_id = $request->status_id;
        $Document->save();

        return response()->json([
            'status' => true,
            'message' => 'Lista de documentos de la empresas actualizado exitosamente',
            'data' => ['document' => $Document]
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
            $Document = Document::find($id);
            $Document->delete();

            return response()->json([
                'status' => true,
                'message' => 'Lista de documentos de la empresas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lista de documentos de la empresas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
