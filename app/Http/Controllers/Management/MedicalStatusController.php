<?php

namespace App\Http\Controllers\Management;

use App\Models\MedicalStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalStatusRequest;
use App\Models\Bed;
use App\Models\MedicalStatusDays;
use App\Models\NonWorkingDays;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $medical_diary = MedicalStatus::select('medical_status.*');



        if ($request->_sort) {
            $medical_diary->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $medical_diary->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $medical_diary = $medical_diary->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $medical_diary = $medical_diary->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estados de citas medicas obtenidas exitosamente',
            'data' => ['medical_status' => $medical_diary]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(MedicalStatusRequest $request): JsonResponse
    {
        $MedicalStatus = new MedicalStatus;

        $MedicalStatus->name = $request->name;
        $MedicalStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de citas medicas creado exitosamente',
            'data' => ['medical_status' => $MedicalStatus->toArray()]
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
        $MedicalStatus = MedicalStatus::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado de citas medicas obtenida exitosamente',
            'data' => ['medical_status' => $MedicalStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(MedicalStatusRequest $request, int $id)
    {
        $MedicalStatus = MedicalStatus::find($id);
        $MedicalStatus->name = $request->name;

        $MedicalStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado de citas medicas exitosamente',
            'data' => ['medical_status' => $MedicalStatus]
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
            $MedicalStatus = MedicalStatus::find($id);
            $MedicalStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado de cita eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado de cita en uso, no es posible eliminar'
            ], 423);
        }
    }
}
