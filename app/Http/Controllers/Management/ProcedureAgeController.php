<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedureAge;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureAgeRequest;
use Illuminate\Database\QueryException;

class ProcedureAgeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $ProcedureAge = ProcedureAge::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $ProcedureAge = ProcedureAge::where('pra_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ProcedureAge = ProcedureAge::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedureAge = ProcedureAge::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Edad del procedimiento obtenidas exitosamente',
            'data' => ['procedure_age' => $ProcedureAge]
        ]);
    }
    

    public function store(ProcedureAgeRequest $request): JsonResponse
    {
        $ProcedureAge = new ProcedureAge;
        $ProcedureAge->pra_name = $request->pra_name;
        $ProcedureAge->pra_begin = $request->pra_begin;
        $ProcedureAge->pra_end = $request->pra_end;
        $ProcedureAge->save();

        return response()->json([
            'status' => true,
            'message' => 'Edad del procedimiento creado exitosamente',
            'data' => ['procedure_age' => $ProcedureAge->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $pra_id): JsonResponse
    {
        $ProcedureAge = ProcedureAge::where('pra_id', $pra_id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Edad del procedimiento obtenido exitosamente',
            'data' => ['procedure_age' => $ProcedureAge]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureAgeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedureAgeRequest $request, int $id): JsonResponse
    {
        $ProcedureAge = ProcedureAge::find($id);
        $ProcedureAge->pra_name = $request->pra_name;
        $ProcedureAge->pra_begin = $request->pra_begin;
        $ProcedureAge->pra_end = $request->pra_end;
        $ProcedureAge->save();

        return response()->json([
            'status' => true,
            'message' => 'Edad de procedimiento actualizado exitosamente',
            'data' => ['procedureage' => $ProcedureAge]
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
            $ProcedureAge = ProcedureAge::find($id);
            $ProcedureAge->delete();

            return response()->json([
                'status' => true,
                'message' => 'Edad del procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Edad del procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
