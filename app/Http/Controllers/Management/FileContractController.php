<?php

namespace App\Http\Controllers\Management;

use App\Models\FileContract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FileContractRequest;
use Illuminate\Database\QueryException;

class FileContractController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FileContract = FileContract::select();

        if($request->_sort){
            $FileContract->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $FileContract->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $FileContract=$FileContract->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FileContract=$FileContract->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Archivo del contrato obtenidos exitosamente',
            'data' => ['file_contract' => $FileContract]
        ]);
    }

    public function store(FileContractRequest $request): JsonResponse
    {
        $FileContract = new FileContract;
        $FileContract->name = $request->name;
        $FileContract->file = $request->file;
        $FileContract->contract_id = $request->contract_id;
        
        $FileContract->save();

        return response()->json([
            'status' => true,
            'message' => 'Archivo del contrato  creada exitosamente',
            'data' => ['file_contract' => $FileContract->toArray()]
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
        $FileContract = FileContract::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Archivo del contrato obtenido exitosamente',
            'data' => ['file_contract' => $FileContract]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FileContractRequest $request, int $id): JsonResponse
    {
        $FileContract = FileContract::find($id);
        $FileContract->name = $request->name;
        $FileContract->file = $request->file;
        $FileContract->contract_id = $request->contract_id;
        $FileContract->save();

        return response()->json([
            'status' => true,
            'message' => 'Archivo del contrato  actualizado exitosamente',
            'data' => ['file_contract' => $FileContract]
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
            $FileContract = FileContract::find($id);
            $FileContract->delete();

            return response()->json([
                'status' => true,
                'message' => 'Archivo del contrato  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Archivo del contrato  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
