<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedureType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureTypeRequest;
use Illuminate\Database\QueryException;

class ProcedureTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $ProcedureType = ProcedureType::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $ProcedureType = ProcedureType::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ProcedureType = ProcedureType::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedureType = ProcedureType::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de procedimiento obtenidas exitosamente',
            'data' => ['procedure_type' => $ProcedureType]
        ]);
    }
    

    public function store(ProcedureTypeRequest $request): JsonResponse
    {
        $ProcedureType = new ProcedureType;
        $ProcedureType->name = $request->name;
      
      
        $ProcedureType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de procedimiento creado exitosamente',
            'data' => ['procedure_type' => $ProcedureType->toArray()]
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
        $ProcedureType = ProcedureType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de procedimiento obtenido exitosamente',
            'data' => ['procedure_type' => $ProcedureType ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedureTypeRequest $request, int $id): JsonResponse
    {
        $ProcedureType = ProcedureType::find($id);
        $ProcedureType->name = $request->name;
       
    
        $ProcedureType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de procedimiento actualizado exitosamente',
            'data' => ['procedure_type' => $ProcedureType]
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
            $ProcedureType = ProcedureType::find($id);
            $ProcedureType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
