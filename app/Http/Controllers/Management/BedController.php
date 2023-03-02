<?php

namespace App\Http\Controllers\Management;

use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Bed = Bed::select('bed.*')
            ->with(
                'pavilion',
                'pavilion.flat',
                'pavilion.flat.campus',
                'status_bed',
                'procedure'
            )
            ->leftJoin('status_bed', 'status_bed.id', 'bed.status_bed_id')
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->groupBy('bed.id');

        if ($request->_sort) {
            $Bed->orderBy($request->_sort, $request->_order);
        }

        if ($request->campus_id) {
            $Bed->where('campus.id', $request->campus_id);
        }

        if ($request->bed_or_office) {
            $Bed->where('bed.bed_or_office', $request->bed_or_office);
        }

        if ($request->pavilion_id) {
            $Bed->where('pavilion.id', $request->pavilion_id);
        }

        if ($request->search) {
            if (Str::contains('libre', strtolower($request->search))) {
                $Bed->where(function ($query) use ($request) {
                    $query->where(function ($q) use ($request) {
                        $q->where('status_bed.name', 'like', '%Reservada%')
                            ->where('bed.reservation_date', '<', Carbon::now()->subHours(6));
                    })
                        ->orWhere('status_bed.name', 'like', '%' . $request->search . '%');
                });
            } else if (Str::contains('reservada', strtolower($request->search))) {
                $Bed->where(function ($query) use ($request) {
                    $query->where(function ($q) use ($request) {
                        $q->where('status_bed.name', 'like', '%Reservada%')
                            ->where('bed.reservation_date', '>=', Carbon::now()->subHours(6));
                    });
                });
            } else {
                $Bed->where(function ($query) use ($request) {
                    $query->where('bed.name', 'like', '%' . $request->search . '%')
                        ->orWhere('bed.code', 'like', '%' . $request->search . '%')
                        ->orWhere('campus.name', 'like', '%' . $request->search . '%')
                        ->orWhere('flat.name', 'like', '%' . $request->search . '%')
                        ->orWhere('pavilion.name', 'like', '%' . $request->search . '%')
                        ->orWhere('status_bed.name', 'like', '%' . $request->search . '%');
                });
            }
        }

        if ($request->query("pagination", true) == "false") {
            $Bed = $Bed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Bed = $Bed->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cama asociados al paciente exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedByPavilion(Request $request, int $pavilion_id, int $ambit, int $procedure): JsonResponse
    {
        $identification = '';
        if ($request->patient_id) {
            $pat = Patient::find($request->patient_id);
            $identification = $pat->identification;
        } else if ($request->identification) {
            $identification = $request->identification;
        }

        $date = Carbon::now()->setTimezone('America/Bogota')->subHours(6)->format('Y-m-d h:i:s');

        $Bed = Bed::select('bed.*')
            ->where('bed.pavilion_id', $pavilion_id)
            ->where(function ($query) use ($identification, $date) {
                $query->where('bed.status_bed_id', '=', '1')
                    ->orWhere(function ($q) use ($identification, $date) {
                        $q->where('bed.identification', $identification)
                            ->where('bed.status_bed_id', '=', '6')
                            // ->where('bed.reservation_date', '<=', $date)
                        ;
                    })
                    ->orWhere(function ($q) use ($date) {
                        $q->where('bed.status_bed_id', '=', '6')
                            ->where('bed.reservation_date', '<=', $date);
                    });
            })
            ->where('bed_or_office', '=', $ambit);


        if ($procedure != 0) {
            $Bed->where('procedure_id', '=', $procedure);
        }

        if ($request->office) {
            $Bed = Bed::select('bed.*')
                ->where('id', $request->office);
        }

        $Bed->orderBy('name', 'asc');
        $Bed = $Bed->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedsByCampus(Request $request, int $campus_id): JsonResponse
    {
        $date = Carbon::now()->setTimezone('America/Bogota')->subHours(6)->format('Y-m-d h:i:s');
        $AvailableBeds = Bed::select('bed.*')
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where(function ($query) use ($date) {
                $query->where('bed.status_bed_id', '=', '1')
                    ->orWhere(function ($q) use ($date) {
                        $q
                            ->where('bed.status_bed_id', '=', '6')
                            ->where('bed.reservation_date', '<=', $date);
                    });
            })
            ->where('bed.bed_or_office', '=', 1)
            ->groupBy('bed.id');
        $AvailableBeds->orderBy('bed.name', 'asc');
        $AvailableBeds = $AvailableBeds->get()->toArray();

        $BusyBeds = Bed::select('bed.*')
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 2)
            ->where('bed.bed_or_office', '=', 1)
            ->groupBy('bed.id');
        $BusyBeds->orderBy('bed.name', 'asc');
        $BusyBeds = $BusyBeds->get()->toArray();

        $FixBeds = Bed::select('bed.*')
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 3)
            ->where('bed.bed_or_office', '=', 1)
            ->groupBy('bed.id');
        $FixBeds->orderBy('bed.name', 'asc');
        $FixBeds = $FixBeds->get()->toArray();

        $CleanBeds = Bed::select('bed.*')
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->where('campus.id', $campus_id)
            ->where('bed.status_bed_id', '=', 4)
            ->where('bed.bed_or_office', '=', 1)
            ->groupBy('bed.id');
        $CleanBeds->orderBy('bed.name', 'asc');
        $CleanBeds = $CleanBeds->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => [
                'available_bed' => $AvailableBeds,
                'busy_bed' => $BusyBeds,
                'fix_bed' => $FixBeds,
                'clean_bed' => $CleanBeds,
                'date' => $date,
            ]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getBedByPacient(Request $request): JsonResponse
    {
        $Bed = Bed::select('bed.*')
            ->with(
                'status_bed',
                'location',
                'location.procedure',
                'location.procedure.manual_price',
                'location.admissions',
                'location.admissions.patients',
                'reference'
            )
            ->leftJoin('pavilion', 'pavilion.id', 'bed.pavilion_id')
            ->leftJoin('flat', 'flat.id', 'pavilion.flat_id')
            ->leftJoin('campus', 'campus.id', 'flat.campus_id')
            ->where('bed_or_office', 1)
            ->groupBy('bed.id');

        if ($request->_sort) {
            $Bed->orderBy($request->_sort, $request->_order);
        }

        if ($request->campus_id) {
            $Bed->where('campus.id', $request->campus_id);
        }

        if ($request->search) {
            $Bed->where('bed.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Bed = $Bed->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Bed = $Bed->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param integer $pavilion_id
     * @return JsonResponse
     */
    public function getOfficeByCampus(Request $request): JsonResponse
    {
        $Bed = Bed::select('bed.*')
            ->leftJoin('pavilion', 'bed.pavilion_id', 'pavilion.id')
            ->leftjoin('flat', 'pavilion.flat_id', 'flat.id')
            ->with(
                'status_bed',
                'pavilion',
                'pavilion.flat',
                'pavilion.flat.campus',
            )
            ->where([
                'bed.status_bed_id' => $request->status_bed_id,
                'bed.bed_or_office' => '2',
                'bed.pavilion_id' => $request->pavilion_id
                // 'flat.campus_id' => $request->campus_id,
            ]);

        if ($request->assistance_id) {
            $Bed->leftjoin('medical_diary', 'bed.id', 'medical_diary.office_id')
                ->orwhere(function ($query) use ($request) {
                    $query->orwhere('bed.bed_or_office', '2')
                        ->WhereNotNull('medical_diary.office_id');
                });
        }

        if ($request->_sort) {
            $Bed->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Bed->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Bed = $Bed->groupBy('bed.id')
                ->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Bed = $Bed->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Camas obtenidos exitosamente',
            'data' => ['bed' => $Bed]
        ]);
    }





    public function store(BedRequest $request): JsonResponse
    {
        $validate = Bed::select()
            ->where('code', $request->code)
            ->where('name', $request->name)
            ->where('bed_or_office', $request->bed_or_office)
            ->where('pavilion_id', $request->pavilion_id)
            ->get()->toArray();
        if (count($validate) > 0) {
            return response()->json([
                'status' => false,
                'message' => 'Ya se encuentra creada una cama o consultorio con los mismos parámetros',
                'data' => ['bed' => $validate]
            ]);
        }

        $Bed = new Bed;
        $Bed->code = $request->code;
        $Bed->name = $request->name;
        $Bed->status_bed_id = $request->status_bed_id;
        $Bed->bed_or_office = $request->bed_or_office;
        $Bed->pavilion_id = $request->pavilion_id;
        $Bed->procedure_id = $request->procedure_id;


        $Bed->save();

        return response()->json([
            'status' => true,
            'message' => 'Cama creada exitosamente',
            'data' => ['bed' => $Bed->toArray()]
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
        $Bed = Bed::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cama obtenido exitosamente',
            'data' => ['bed' => $Bed]
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
        if ($request->update == true) {
            $Bed = Bed::find($id);
            $Bed->status_bed_id = $request->status_bed_id;
            $Bed->save();
        } else {
            $Bed = Bed::find($id);
            $Bed->code = $request->code;
            $Bed->name = $request->name;
            $Bed->status_bed_id = $request->status_bed_id;
            $Bed->pavilion_id = $request->pavilion_id;
            $Bed->bed_or_office = $request->bed_or_office;
            $Bed->procedure_id = $request->procedure_id;



            $Bed->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Cama actualizado exitosamente',
            'data' => ['bed' => $Bed]
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
            $Bed = Bed::find($id);
            $Bed->delete();

            return response()->json([
                'status' => true,
                'message' => 'Camae eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cama esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }

    public function getAvailableConsultories(Request $request)
    {
        $dateRanges = json_decode($request->dateRanges, true);
        $flatId = $request->flatId;
        $pavilionId = $request->pavilionId;
        $availableBeds = DB::table('bed AS b1');
        if(count($dateRanges) == 0){
            return response()->json([
                'status' => false,
                'message' => 'No hay agendas por transferir en el plazo de tiempo seleccionado',
            ]);
        }

        if ($flatId != null) {
            $availableBeds->join('pavilion', 'b1.pavilion_id', '=', 'pavilion.id')
                ->where('pavilion.flat_id', '=', $flatId);
        }
        if ($pavilionId != null) {
            $availableBeds->where('b1.pavilion_id', '=', $pavilionId);
        }
        $availableBeds = $availableBeds->where('b1.bed_or_office', '=', 2)->whereNotExists(function ($query) use ($dateRanges) {
                $query->from('bed AS b2')
                    ->join('medical_diary', 'medical_diary.office_id', '=', 'b2.id')
                    ->join('medical_diary_days', 'medical_diary_days.medical_diary_id', '=', 'medical_diary.id')
                    ->whereRaw('b2.id = b1.id')
                    ->where(function ($query2) use ($dateRanges) {
                        $query2->where(function ($query3) use ($dateRanges) {
                            $query3->where('medical_diary_days.start_hour', '>=', $dateRanges[0]["startDate"])
                                ->where('medical_diary_days.start_hour', '<', $dateRanges[0]["finishDate"]);
                        });
                        foreach (array_slice($dateRanges, 1) as $dateRange) {
                            $query2->orWhere(function ($query4) use ($dateRange) {
                                $query4->where('medical_diary_days.start_hour', '>=', $dateRange["startDate"])
                                    ->where('medical_diary_days.start_hour', '<', $dateRange["finishDate"]);
                            });
                        }
                    });
            })->select("b1.*")->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Camas disponibles obtenidas correctamente',
            'data' => ['beds' => $availableBeds]
        ]);
    }
}
