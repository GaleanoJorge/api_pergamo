<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedurePurpose;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedurePurposeRequest;
use Illuminate\Database\QueryException;

class ProcedurePurposeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $ProcedurePurpose = ProcedurePurpose::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $ProcedurePurpose = ProcedurePurpose::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ProcedurePurpose = ProcedurePurpose::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedurePurpose = ProcedurePurpose::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Objeto del procedimiento obtenidas exitosamente',
            'data' => ['procedure_purpose' => $ProcedurePurpose]
        ]);
    }
    

    public function store(ProcedurePurposeRequest $request): JsonResponse
    {
        $ProcedurePurpose = new ProcedurePurpose;
        $ProcedurePurpose->name = $request->name;
        $ProcedurePurpose->code = $request->code;
      
        $ProcedurePurpose->save();

        return response()->json([
            'status' => true,
            'message' => 'Objeto del procedimiento creado exitosamente',
            'data' => ['procedure_purpose' => $ProcedurePurpose->toArray()]
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
        $ProcedurePurpose = ProcedurePurpose::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objetivo del procedimiento obtenido exitosamente',
            'data' => ['procedure_purpose' => $ProcedurePurpose]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedurePurposeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedurePurposeRequest $request, int $id): JsonResponse
    {
        $ProcedurePurpose = ProcedurePurpose::find($id);
        $ProcedurePurpose->name = $request->name;
        $ProcedurePurpose->code = $request->code;
    
        $ProcedurePurpose->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivo de procedimiento actualizado exitosamente',
            'data' => ['procedure_purpose' => $ProcedurePurpose]
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
            $ProcedurePurpose = ProcedurePurpose::find($id);
            $ProcedurePurpose->delete();

            return response()->json([
                'status' => true,
                'message' => 'Objetivo del procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Objetivo del procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
