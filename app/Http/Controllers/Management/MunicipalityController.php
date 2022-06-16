<?php

namespace App\Http\Controllers\Management;

use App\Models\Municipality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipalityRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $municipalitys = Municipality::select('municipality.*')
        ->with('region', 'circuit')
        ->leftJoin('region', 'municipality.region_id', '=', 'region.id');
        if ($request->_sort) {
            $municipalitys->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $municipalitys->where('municipality.name', 'like', '%' . $request->search . '%')
                ->orWhere('region.name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $municipalitys->where('municipality.status_id', $request->status_id);
        }

        if ($request->circuit_id) {
            $municipalitys->where('municipality.circuit_id', $request->circuit_id);
        }

        if ($request->region_id) {
            $municipalitys->where('municipality.region_id', $request->region_id);
        }

        if ($request->query("pagination", true) == "false") {
            $municipalitys = $municipalitys->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $municipalitys = $municipalitys->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Ciudades obtenidas exitosamente',
            'data' => ['municipalitys' => $municipalitys]
        ]);
    }

    public function autocomplete(Request $request): JsonResponse
    {
        $municipalitys = Municipality::select('municipality.id AS value', 'municipality.name AS label')
            ->with('region', 'circuit');

        if ($request->_sort) {
            $municipalitys->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $municipalitys->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $municipalitys->where('status_id', $request->status_id);
        }

        if ($request->circuit_id) {
            $municipalitys->where('circuit_id', $request->circuit_id);
        }

        if ($request->region_id) {
            $municipalitys->where('region_id', $request->region_id);
        }

        if ($request->query("pagination", true) == "false") {
            $municipalitys = $municipalitys->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $municipalitys = $municipalitys->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Ciudades obtenidas exitosamente',
            'data' => ['municipalitys' => $municipalitys]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MunicipalityRequest $request
     * @return JsonResponse
     */
    public function store(MunicipalityRequest $request): JsonResponse
    {
        $Municipality = new Municipality;
        $Municipality->region_id = $request->region_id;
        $Municipality->circuit_id = $request->circuit_id;
        $Municipality->name = $request->name;
        $Municipality->save();

        return response()->json([
            'status' => true,
            'message' => 'Ciudad creada exitosamente',
            'data' => ['municipality' => $Municipality->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $Municipality = Municipality::where('id', $id)->with('region', 'circuit')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ciudad obtenida exitosamente',
            'data' => ['municipality' => $Municipality]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MunicipalityRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(MunicipalityRequest $request, int $id): JsonResponse
    {
        $Municipality = Municipality::find($id);
        $Municipality->region_id = $request->region_id;
        $Municipality->circuit_id = $request->circuit_id;
        $Municipality->name = $request->name;
        $Municipality->save();

        return response()->json([
            'status' => true,
            'message' => 'Ciudad actualizada exitosamente',
            'data' => ['municipality' => $Municipality]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $Municipality = Municipality::find($id);
            $Municipality->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ciudad eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La Ciudad está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
