<?php

namespace App\Http\Controllers\Management;

use App\Models\ChExternalCause;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChExternalCauseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChExternalCause = ChExternalCause::select();

        if ($request->_sort) {
            $ChExternalCause->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChExternalCause->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChExternalCause = $ChExternalCause->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChExternalCause = $ChExternalCause->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Causa externa obtenidos exitosamente',
            'data' => ['ch_external_cause' => $ChExternalCause]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChExternalCause = new ChExternalCause;
        $ChExternalCause->name = $request->name;
        $ChExternalCause->save();

        return response()->json([
            'status' => true,
            'message' => 'Causa externa asociado al paciente exitosamente',
            'data' => ['ch_external_cause' => $ChExternalCause->toArray()]
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
        $ChExternalCause = ChExternalCause::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Causa externa obtenido exitosamente',
            'data' => ['ch_external_cause' => $ChExternalCause]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChExternalCause = ChExternalCause::find($id);
        $ChExternalCause->name = $request->name;
        $ChExternalCause->save();

        return response()->json([
            'status' => true,
            'message' => 'Causa externa actualizado exitosamente',
            'data' => ['ch_external_cause' => $ChExternalCause]
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
            $ChExternalCause = ChExternalCause::find($id);
            $ChExternalCause->delete();

            return response()->json([
                'status' => true,
                'message' => 'Causa externa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Causa externa en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
