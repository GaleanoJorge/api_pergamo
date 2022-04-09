<?php

namespace App\Http\Controllers\Management;

use App\Models\BaseLocationCapacity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BaseLocationCapacityRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class BaseLocationCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BaseLocationCapacity = BaseLocationCapacity::with('locality', 'locality.municipality', 'locality.municipality.region', 'locality.municipality.region.country');

        if ($request->_sort) {
            $BaseLocationCapacity->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BaseLocationCapacity->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $BaseLocationCapacity->where('id', $request->id);
        }

        if ($request->assistance_id) {
            $BaseLocationCapacity->where('assistance_id', $request->assistance_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BaseLocationCapacity = $BaseLocationCapacity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BaseLocationCapacity = $BaseLocationCapacity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades obtenidas exitosamente',
            'data' => ['base_location_capacity' => $BaseLocationCapacity]
        ]);
    }

    /* Get campus by portafolio.
    *
    * @param  int  $briefcaseId
    * @return JsonResponse
    */
    public function getByLocality(Request $request, int $assistnceId): JsonResponse
    {
        $BaseLocationCapacity = BaseLocationCapacity::with('locality', 'assistance');
        $BaseLocationCapacity->select('base_location_capacity.*')
            ->Join('locality', 'locality_id', '=', 'locality.id');
        $BaseLocationCapacity->where('assistance_id', $assistnceId)->orderBy('created_at', 'desc');

        if ($request->search) {
            $BaseLocationCapacity->where('locality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->search) {
            $BaseLocationCapacity->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $BaseLocationCapacity = $BaseLocationCapacity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BaseLocationCapacity = $BaseLocationCapacity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades obtenidas exitosamente',
            'data' => ['base_location_capacity' => $BaseLocationCapacity],
        ]);
    }


    public function store(BaseLocationCapacityRequest $request): JsonResponse
    {
        $array = json_decode($request->localities_id);
        foreach ($array as $item) {
            $BaseLocationCapacity = new BaseLocationCapacity;
            $BaseLocationCapacity->assistance_id = $request->assistance_id;
            $BaseLocationCapacity->locality_id = $item->locality_id;
            $BaseLocationCapacity->PAD_base_patient_quantity = $item->amount;
            $BaseLocationCapacity->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades creada exitosamente',
            'data' => ['base_location_capacity' => $BaseLocationCapacity->toArray()]
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
        $BaseLocationCapacity = BaseLocationCapacity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades obtenido exitosamente',
            'data' => ['base_location_capacity' => $BaseLocationCapacity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BaseLocationCapacityRequest $request, int $id): JsonResponse
    {
        $BaseLocationCapacity = BaseLocationCapacity::find($id);
        $BaseLocationCapacity->assistance_id = $request->assistance_id;
        $BaseLocationCapacity->location_id = $request->location_id;
        $BaseLocationCapacity->PAD_base_patient_quantity = $request->PAD_base_patient_quantity;
        $BaseLocationCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades actualizado exitosamente',
            'data' => ['base_location_capacity' => $BaseLocationCapacity]
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
            $BaseLocationCapacity = BaseLocationCapacity::find($id);
            $BaseLocationCapacity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Base de localidades eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Base de localidades esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
