<?php

namespace App\Http\Controllers\Management;

use App\Models\MunicipalityIca;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MunicipalityIcaRequest;
use App\Models\AccountReceivable;
use App\Models\TaxValueUnit;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MunicipalityIcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $MunicipalityIca = MunicipalityIca::select()
            ->with('municipality')
            ->leftJoin('municipality', 'municipality.id', 'municipality_ica.municipality_id');

        if ($request->_sort) {
            $MunicipalityIca->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $MunicipalityIca->where('municipality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->municipality_id) {
            $MunicipalityIca->where('municipality_id', $request->municipality_id);
        }

        if ($request->query("pagination", true) == "false") {
            $MunicipalityIca = $MunicipalityIca->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $MunicipalityIca = $MunicipalityIca->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenidos exitosamente',
            'data' => ['municipality_ica' => $MunicipalityIca]
        ]);
    }

    public function store(MunicipalityIcaRequest $request): JsonResponse
    {

        $CheckMunicipalityIca = MunicipalityIca::where('municipality_id', $request->municipality_id)->first();
        if ($CheckMunicipalityIca) {
            return response()->json([
                'status' => false,
                'message' => 'Ya existe una retención en la fuente para este municipio',
                'data' => []
            ]);
        }

        $MunicipalityIca = new MunicipalityIca;
        $MunicipalityIca->value = $request->value;
        $MunicipalityIca->municipality_id = $request->municipality_id;

        $MunicipalityIca->save();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente creado exitosamente',
            'data' => ['municipality_ica' => $MunicipalityIca->toArray()]
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
        $MunicipalityIca = MunicipalityIca::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenido exitosamente',
            'data' => ['municipality_ica' => $MunicipalityIca]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MunicipalityIcaRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MunicipalityIcaRequest $request, int $id): JsonResponse
    {
        $MunicipalityIca = MunicipalityIca::find($id);
        $MunicipalityIca->value = $request->value;
        $MunicipalityIca->municipality_id = $request->municipality_id;

        $MunicipalityIca->save();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente actualizado exitosamente',
            'data' => ['municipality_ica' => $MunicipalityIca]
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
            $MunicipalityIca = MunicipalityIca::find($id);
            $MunicipalityIca->delete();

            return response()->json([
                'status' => true,
                'message' => 'Retención en la fuente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Retención en la fuente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
