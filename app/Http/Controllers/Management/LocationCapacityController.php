<?php

namespace App\Http\Controllers\Management;

use App\Models\LocationCapacity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocationCapacityRequest;
use App\Models\BaseLocationCapacity;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class LocationCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LocationCapacity = LocationCapacity::with('locality');

        if ($request->_sort) {
            $LocationCapacity->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LocationCapacity->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->assistance_id) {
            $LocationCapacity->where('assistance_id', $request->assistance_id);
        }

        if ($request->query("pagination", true) == "false") {
            $LocationCapacity = $LocationCapacity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LocationCapacity = $LocationCapacity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Localidades obtenidas exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
        ]);
    }

    /* Get campus by portafolio.
    *
    * @param  int  $briefcaseId
    * @return JsonResponse
    */
    public function getByLocality(Request $request, int $assistnceId): JsonResponse
    {
        $LocationCapacity = LocationCapacity::with('locality', 'assistance');
        $LocationCapacity->select('location_capacity.*')
            ->Join('locality', 'locality_id', '=', 'locality.id');
        $LocationCapacity->where('assistance_id', $assistnceId)->orderBy('created_at', 'desc');

        if ($request->search) {
            $LocationCapacity->where('locality.name', 'like', '%' . $request->search . '%');
        }

        if ($request->search) {
            $LocationCapacity->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $LocationCapacity = $LocationCapacity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LocationCapacity = $LocationCapacity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Localidades obtenidas exitosamente',
            'data' => ['location_capacity' => $LocationCapacity],
        ]);
    }


    public function store(LocationCapacityRequest $request): JsonResponse
    {
        $BaseDelete = BaseLocationCapacity::where('assistance_id', $request->assistance_id);
        $BaseDelete->delete();
        $lastDayNextMonth = Carbon::now()->addMonth()->endOfMonth();
        $firstDayMonth = Carbon::now()->startOfMonth();

        $array = json_decode($request->localities_id);
        foreach ($array as $item) {
            $BaseLocationCapacity = new BaseLocationCapacity();
            $BaseLocationCapacity->assistance_id = $request->assistance_id;
            $BaseLocationCapacity->PAD_base_patient_quantity = $item->PAD_base_patient_quantity;
            $BaseLocationCapacity->locality_id = $item->locality_id;
            $BaseLocationCapacity->save();

            $CurrentMonthLocationCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                ->where('locality_id', $item->locality_id)
                ->where('validation_date', '>=', $firstDayMonth)
                ->where('validation_date', '<=', $lastDayNextMonth)
                ->get()->toArray();

            if (count($CurrentMonthLocationCapacity) == 0) {
                $LocationCapacity = new LocationCapacity;
                $LocationCapacity->assistance_id = $request->assistance_id;
                $LocationCapacity->locality_id = $item->locality_id;
                $LocationCapacity->PAD_patient_quantity = $item->PAD_base_patient_quantity;
                $LocationCapacity->PAD_patient_attended = 0;
                $LocationCapacity->validation_date = Carbon::now();
                $LocationCapacity->PAD_patient_actual_capacity = $item->PAD_base_patient_quantity;
                $LocationCapacity->save();
            }

        }

        return response()->json([
            'status' => true,
            'message' => 'Base de localidades creada exitosamente',
            'data' => ['location_capacity' => $BaseLocationCapacity->toArray()]
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
        $LocationCapacity = LocationCapacity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Localidades obtenido exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LocationCapacityRequest $request, int $id): JsonResponse
    {
        $LocationCapacity = LocationCapacity::find($id);
        $LocationCapacity->assistance_id = $request->assistance_id;
        $LocationCapacity->location_id = $request->location_id;
        $LocationCapacity->validation_date = Carbon::now();
        $LocationCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;
        $LocationCapacity->PAD_patient_attended = $request->PAD_patient_attended;
        $LocationCapacity->PAD_patient_actual_capacity = $request->PAD_patient_actual_capacity;
        $LocationCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Localidades actualizado exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
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
            $LocationCapacity = LocationCapacity::find($id);
            $LocationCapacity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Localidades eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Localidades esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
