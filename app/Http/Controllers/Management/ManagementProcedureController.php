<?php

namespace App\Http\Controllers\Management;

use App\Models\ManagementProcedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementProcedureRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ManagementProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ManagementProcedure = ManagementProcedure::select('management_procedure.*');

        if ($request->_sort) {
            $ManagementProcedure->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ManagementProcedure->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ManagementProcedure = $ManagementProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ManagementProcedure = $ManagementProcedure->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos del laboratorio obtenidos exitosamente',
            'data' => ['management_procedure' => $ManagementProcedure]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ManagementProcedureRequest $request
     * @return JsonResponse
     */
    public function store(ManagementProcedureRequest $request): JsonResponse
    {
        $ManagementProcedure = new ManagementProcedure;
        $ManagementProcedure->management_plan_id = $request->management_plan_id;
        $ManagementProcedure->procedure_id = $request->procedure_id;
        $ManagementProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos del laboratorio creados exitosamente',
            'data' => ['management_procedure' => $ManagementProcedure->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $ManagementProcedure = ManagementProcedure::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos del laboratorio obtenidos exitosamente',
            'data' => ['management_procedure' => $ManagementProcedure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ManagementProcedureRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ManagementProcedureRequest $request, int $id)
    {
        $ManagementProcedure = ManagementProcedure::find($id);
        $ManagementProcedure->name = $request->name;
        $ManagementProcedure->description = $request->description;
        $ManagementProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos del laboratorio actualizados exitosamente',
            'data' => ['management_procedure' => $ManagementProcedure]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $ManagementProcedure = ManagementProcedure::find($id);
            $ManagementProcedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Procedimientos del laboratorio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Procedimientos del laboratorio en uso, no es posible eliminar'
            ], 423);
        }
    }
}
