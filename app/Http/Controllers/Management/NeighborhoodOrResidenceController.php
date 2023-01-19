<?php

namespace App\Http\Controllers\Management;

use App\Models\NeighborhoodOrResidence;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NeighborhoodOrResidenceRequest;
use Illuminate\Database\QueryException;

class NeighborhoodOrResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $NeighborhoodOrResidence = NeighborhoodOrResidence::with('pad_risk', 'locality', 'locality.municipality', 'locality.municipality.region', 'locality.municipality.region.country')
            ->select('neighborhood_or_residence.*')
            ->leftJoin('locality', 'neighborhood_or_residence.locality_id', 'locality.id');

        if ($request->_sort) {
            $NeighborhoodOrResidence->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $NeighborhoodOrResidence->where('neighborhood_or_residence.name', 'like', '%' . $request->search . '%')
                ->orWhere('locality.name', 'like', '%' . $request->search . '%');
        }
        if ($request->pad_risk_id) {
            $NeighborhoodOrResidence->where('pad_risk_id', $request->pad_risk_id);
        }
        if ($request->locality_id) {
            $NeighborhoodOrResidence->where('locality_id', $request->locality_id);
        }

        if ($request->query("pagination", true) == "false") {
            $NeighborhoodOrResidence = $NeighborhoodOrResidence->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $NeighborhoodOrResidence = $NeighborhoodOrResidence->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Barrio/Vereda de residencia asociados exitosamente',
            'data' => ['neighborhood_or_residence' => $NeighborhoodOrResidence]
        ]);
    }


    public function store(NeighborhoodOrResidenceRequest $request): JsonResponse
    {
        $NeighborhoodOrResidence = new NeighborhoodOrResidence;
        $NeighborhoodOrResidence->name = $request->name;
        $NeighborhoodOrResidence->pad_risk_id = $request->pad_risk_id;
        $NeighborhoodOrResidence->locality_id = $request->locality_id;
        $NeighborhoodOrResidence->save();

        return response()->json([
            'status' => true,
            'message' => 'Barrio/Vereda de residencia creada exitosamente',
            'data' => ['neighborhood_or_residence' => $NeighborhoodOrResidence->toArray()]
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
        $NeighborhoodOrResidence = NeighborhoodOrResidence::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Barrio/Vereda de residencia obtenido exitosamente',
            'data' => ['neighborhood_or_residence' => $NeighborhoodOrResidence]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NeighborhoodOrResidenceRequest $request, int $id): JsonResponse
    {
        $NeighborhoodOrResidence = NeighborhoodOrResidence::find($id);
        $NeighborhoodOrResidence->name = $request->name;
        $NeighborhoodOrResidence->pad_risk_id = $request->pad_risk_id;
        $NeighborhoodOrResidence->locality_id = $request->locality_id;
        $NeighborhoodOrResidence->save();

        return response()->json([
            'status' => true,
            'message' => 'Barrio/Vereda de residencia actualizado exitosamente',
            'data' => ['neighborhood_or_residence' => $NeighborhoodOrResidence]
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
            $NeighborhoodOrResidence = NeighborhoodOrResidence::find($id);
            $NeighborhoodOrResidence->delete();

            return response()->json([
                'status' => true,
                'message' => 'Barrio/Vereda de residencia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Barrio/Vereda de residencia esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
