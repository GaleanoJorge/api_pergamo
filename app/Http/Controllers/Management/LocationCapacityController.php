<?php

namespace App\Http\Controllers\Management;

use App\Models\LocationCapacity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocationCapacityRequest;
use App\Models\Assistance;
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
            'message' => 'Comunas, Localidades o Veredas obtenidas exitosamente',
            'data' => ['location_capacity' => $LocationCapacity]
        ]);
    }

    /**
     * Renovate locaion capacity
     * 
     */
    public function renovateLocationCapacity(Request $request, int $campus_id): JsonResponse
    {
        $assistances = Assistance::select('assistance.*')
            ->with(
                'user',
            )
            ->leftJoin('users', 'users.id', 'assistance.user_id')
            ->leftJoin('user_campus', 'users.id', 'user_campus.user_id')
            ->where('user_campus.campus_id', $campus_id)
            // ->whereIn('assistance.contract_type_id', [1, 2, 3])
            // ->whereIn('assistance.contract_type_id', [4, 5])
            ->groupBy('assistance.id')
            ->get()->toArray();

        $startDateOfMaonth = Carbon::now()->startOfMonth();
        $endDateOfMaonth = Carbon::now()->endOfMonth();

        foreach ($assistances as $element) {
            $BaseLocationCapacity = BaseLocationCapacity::select('base_location_capacity.*')
                ->where('assistance_id', $element['id'])
                ->get()->toArray();
            foreach ($BaseLocationCapacity as $localitiaes) {
                $LocationCapacity = LocationCapacity::select('location_capacity.*')
                    ->where('assistance_id', $localitiaes['assistance_id'])
                    ->where('phone_consult', $localitiaes['phone_consult'])
                    ->where('locality_id', $localitiaes['locality_id'])
                    ->where('PAD_patient_quantity', $localitiaes['PAD_base_patient_quantity'])
                    ->whereBetween('validation_date', [$startDateOfMaonth, $endDateOfMaonth])
                    ->get()->toArray();
                if (count($LocationCapacity) == 0) {
                    $newLocCap = new LocationCapacity;
                    $newLocCap->phone_consult = $localitiaes['phone_consult'];
                    $newLocCap->assistance_id = $localitiaes['assistance_id'];
                    $newLocCap->locality_id = $localitiaes['locality_id'];
                    $newLocCap->validation_date = Carbon::now();
                    $newLocCap->PAD_patient_quantity = $localitiaes['PAD_base_patient_quantity'];
                    $newLocCap->PAD_patient_actual_capacity = $localitiaes['PAD_base_patient_quantity'];
                    $newLocCap->PAD_patient_attended = 0;
                    $newLocCap->save();
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Capacidad instalada de asistenciales de planta acualizada exitosamente.',
            'data' => ['location_capacity' => $assistances],
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
            ->leftJoin('locality', 'locality_id', '=', 'locality.id');
        $LocationCapacity->where('assistance_id', $assistnceId)->orderBy('created_at', 'desc');

        if ($request->search) {
            $LocationCapacity->where('locality.name', 'like', '%' . $request->search . '%')
                ->orWhere('location_capacity.phone_consult', 'like', '%' . $request->search . '%');
        }

        if ($request->_sort) {
            $LocationCapacity->orderBy($request->_sort, $request->_order);
        } else {
            $LocationCapacity->orderBy('validation_date', 'desc');
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
            'message' => 'Comunas, Localidades o Veredas obtenidas exitosamente',
            'data' => ['location_capacity' => $LocationCapacity],
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $BaseDelete = BaseLocationCapacity::where('assistance_id', $request->assistance_id);
        $BaseDelete->delete();
        $lastDayNextMonth = Carbon::now()->addMonth()->endOfMonth();
        $firstDayNextMonth = Carbon::now()->addMonth()->startOfMonth();
        $actualMonth = Carbon::now()->month;
        $year = $actualMonth <= $request->month ?  Carbon::now()->year : Carbon::now()->addYear()->year;
        $lastDayMonth = Carbon::parse($year . '-' . $request->month . '-15')->endOfMonth();
        $firstDayMonth = Carbon::parse($year . '-' . ($request->procedence == 2 ? $request->month : $actualMonth) . '-15')->startOfMonth();

        $array = json_decode($request->localities_id);
        foreach ($array as $item) {
            if ($item->locality_id) {
                $BaseLocationCapacity = new BaseLocationCapacity();
                $BaseLocationCapacity->assistance_id = $request->assistance_id;
                $BaseLocationCapacity->PAD_base_patient_quantity = $item->PAD_base_patient_quantity;
                $BaseLocationCapacity->locality_id = $item->locality_id;
                $BaseLocationCapacity->save();

                $CurrentMonthLocationCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                    ->where('locality_id', $item->locality_id);

                    if ($request->procedence == 2) {
                    $validationDate = Carbon::now();
                    $CurrentMonthLocationCapacity->where('validation_date', '>=', $firstDayNextMonth)
                    ->where('validation_date', '<=', $lastDayNextMonth);
                    $validationDate->addMonth();
                } else if ($request->procedence == 1) {
                    $validationDate = Carbon::parse($year . '-' . $request->month . '-15');
                    $CurrentMonthLocationCapacity->where('validation_date', '>=', $firstDayMonth)
                        ->where('validation_date', '<=', $lastDayMonth);
                }
                $CurrentMonthLocationCapacity = $CurrentMonthLocationCapacity->get()->toArray();

                if (count($CurrentMonthLocationCapacity) == 0) {
                    $LocationCapacity = new LocationCapacity;
                    $LocationCapacity->assistance_id = $request->assistance_id;
                    $LocationCapacity->locality_id = $item->locality_id;
                    $LocationCapacity->PAD_patient_quantity = $item->PAD_base_patient_quantity;
                    $LocationCapacity->PAD_patient_attended = 0;
                    $LocationCapacity->validation_date = $validationDate;
                    $LocationCapacity->PAD_patient_actual_capacity = $item->PAD_base_patient_quantity;
                    $LocationCapacity->save();
                }
            }
        }

        if ($request->phone_consult) {
            $BaseLocationCapacity = new BaseLocationCapacity;
            $BaseLocationCapacity->assistance_id = $request->assistance_id;
            $BaseLocationCapacity->phone_consult = "TELECONSULTA";
            $BaseLocationCapacity->PAD_base_patient_quantity = intval($request->phone_consult);
            $BaseLocationCapacity->save();

            $CurrentMonthLocationCapacity = LocationCapacity::where('assistance_id', $request->assistance_id)
                ->whereNull('locality_id');

            $validationDate = Carbon::now();

            if ($request->procedence == 2) {
                $CurrentMonthLocationCapacity->where('validation_date', '>=', $firstDayNextMonth)
                    ->where('validation_date', '<=', $lastDayNextMonth);
                $validationDate->addMonth();
            } else if ($request->procedence == 1) {
                $CurrentMonthLocationCapacity->where('validation_date', '>=', $firstDayMonth)
                    ->where('validation_date', '<=', $lastDayMonth);
            }
            $CurrentMonthLocationCapacity->get()->toArray();

            if (count($CurrentMonthLocationCapacity) == 0) {
                $LocationCapacity = new LocationCapacity();
                $LocationCapacity->phone_consult = "TELECONSULTA";
                $LocationCapacity->PAD_patient_quantity = $request->phone_consult;
                $LocationCapacity->PAD_patient_attended = 0;
                $LocationCapacity->validation_date = $validationDate;
                $LocationCapacity->PAD_patient_actual_capacity = $request->phone_consult;
                $LocationCapacity->assistance_id = $request->assistance_id;
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
            'message' => 'Comunas, Localidades o Veredas obtenido exitosamente',
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
        $LocationCapacity->phone_consult = $request->phone_consult;
        $LocationCapacity->locality_id = $request->locality_id;
        $LocationCapacity->validation_date =  $request->validation_date;
        $LocationCapacity->PAD_patient_quantity = $request->PAD_patient_quantity;
        $LocationCapacity->PAD_patient_attended = $request->PAD_patient_attended;
        $LocationCapacity->PAD_patient_actual_capacity = $request->PAD_patient_actual_capacity;
        $LocationCapacity->save();

        return response()->json([
            'status' => true,
            'message' => 'Comunas, Localidades o Veredas actualizado exitosamente',
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
                'message' => 'Comunas, Localidades o Veredas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Comunas, Localidades o Veredas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
