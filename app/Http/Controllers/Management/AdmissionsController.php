<?php

namespace App\Http\Controllers\Management;

use App\Models\Admissions;
use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdmissionsController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $Admissions = Admissions::with('users')->orderBy('created_at', 'desc');

        if ($request->_sort) {
            $Admissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->contract_id) {
            $Admissions->where('Admissions.contract_id', $request->contract_id);
        }

        if ($request->search) {
            $Admissions->where('Admissions.code', 'like', '%' . $request->search . '%')
                ->orWhere('Admissions.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Admissions = $Admissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * @param  int  $pacientId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function getByPacient(Request $request, int $pacientId): JsonResponse
    {
        $Admissions = Admissions::where('user_id', $pacientId)->with('users', 'campus', 'contract', 'location', 'location.admission_route', 'location.scope_of_attention', 'location.program', 'location.flat', 'location.pavilion', 'location.bed',)->orderBy('created_at', 'desc');
        if ($request->search) {
            $Admissions->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Admissions = $Admissions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Admisiones por paciente obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdmissionsRequest $request
     * @return JsonResponse
     */
    public function store(AdmissionsRequest $request): JsonResponse
    {
        $count      = Admissions::where('user_id', $request->user_id)->count();
        $Admissions = new Admissions;
        $Admissions->consecutive = $count + 1;
        $Admissions->diagnosis_id = $request->diagnosis_id;;
        $Admissions->campus_id = $request->campus_id;
        $Admissions->contract_id = $request->contract_id;
        $Admissions->user_id = $request->user_id;
        $Admissions->entry_date = Carbon::now();
        $Admissions->save();

        $Location = new Location;
        $Location->admissions_id = $Admissions->id;
        $Location->admission_route_id = $request->admission_route_id;
        $Location->scope_of_attention_id = $request->scope_of_attention_id;
        $Location->program_id = $request->program_id;
        $Location->pavilion_id = $request->pavilion_id;
        $Location->flat_id = $request->flat_id;
        $Location->bed_id = $request->bed_id;
        $Location->user_id = $request->user_id;
        $Location->entry_date = Carbon::now();
        $Location->save();

        if ($request->bed_id) {
            $Bed = Bed::find($request->bed_id);
            $Bed->status_bed_id = 2;
            $Bed->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Admisión creado exitosamente',
            'data' => ['admissions' => $Admissions->toArray()]
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
        $Admissions = Admissions::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenido exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        if ($request->medical_date == true) {
            $Admissions = Admissions::find($id);
            $Admissions->discharge_date = Carbon::now();
            $Admissions->save();

            if($request->bed_id!=null){
            $Bed = Bed::find($request->bed_id);
            $Bed->status_bed_id = 1;
            $Bed->save();
            }
        } else if ($request->reversion == true) {
            $Admissions = Admissions::find($id);
            $Admissions->medical_date = '0000-00-00 00:00:00';
            $Admissions->save();
        } else {
            $Admissions = Admissions::find($id);
            $Admissions->campus_id = $request->campus_id;
            $Admissions->contract_id = $request->contract_id;
            $Admissions->user_id = $request->user_id;
            $Admissions->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisión actualizado exitosamente',
            'data' => ['admissions' => $Admissions]
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
            $Admissions = Admissions::find($id);
            $Admissions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Admisión eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Admisión está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
