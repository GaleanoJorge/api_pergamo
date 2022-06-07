<?php

namespace App\Http\Controllers\Management;

use App\Models\Admissions;
use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use App\Models\Authorization;
use App\Models\Briefcase;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdmissionsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if($request->admissions_id){
            $Admissions = Admissions::with('patients')->orderBy('created_at', 'desc')->where('id',$request->admissions_id);
        }else{
            $Admissions = Admissions::with('patients')->orderBy('created_at', 'desc');
        }
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
     * Get Active admission
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getActive(Request $request, int $id): JsonResponse
    {
        $EnabledAdmissions =  Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->with(
                'patients',
                'briefcase',
                'campus',
                'contract',
                'contract.company',
                'location',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
            )
            ->where('discharge_date', '0000-00-00 00:00:00')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray()
            ;

        return response()->json([
            'status' => true,
            'message' => 'Admisiones obtenidas exitosamente',
            'data' => ['admissions' => $EnabledAdmissions]
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
        $Admissions = Admissions::where('patient_id', $pacientId)
        ->with(
            'patients',
            'briefcase',
            'campus', 
            'contract', 
            'location', 
            'location.admission_route', 
            'location.scope_of_attention', 
            'location.program', 
            'location.flat', 
            'location.pavilion', 
            'location.bed',)->orderBy('created_at', 'desc');
            
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
     * @param  int  $briefcase
     * Get open admissions by briefcase.
     *
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcase_id): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
        ->select(
            'admissions.*',
            'patients.identification_type_id',
            'patients.identification',
            'patients.email',
            'patients.residence_address',
            'patients.residence_municipality_id',
            'patients.neighborhood_or_residence_id',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
        ->where('briefcase_id', $briefcase_id)
        ->where('discharge_date','0000-00-00 00:00:00')
        ->orderBy('created_at', 'desc')->get()->toArray();
            
        // if ($request->search) {
        //     $Admissions->where('name', 'like', '%' . $request->search . '%')
        //         ->Orwhere('id', 'like', '%' . $request->search . '%');
        // }
        // if ($request->query("pagination", true) === "false") {
        //     $Admissions = $Admissions->get()->toArray();
        // } else {
        //     $page = $request->query("current_page", 1);
        //     $per_page = $request->query("per_page", 10);

        //     $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        // }

        return response()->json([
            'status' => true,
            'message' => 'Admisiones por paciente obtenidos exitosamente',
            'data' => ['admissions' => $Admissions]
        ]);
    }

    /**
     * @param  int  $pacientId
     * Get procedure by briefcase.
     *
     * @return JsonResponse
     */
    public function ByPac(Request $request, int $roleId): JsonResponse
    {
        $Admissions = Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            ->select(
                'admissions.*',
                'patients.identification_type_id',
                'patients.identification',
                'patients.email',
                'patients.residence_address',
                'patients.residence_municipality_id',
                'patients.neighborhood_or_residence_id',
                DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            )
            ->LeftJoin('location', 'location.admissions_id', 'admissions.id')
            // ->Join('pac_monitoring', 'pac_monitoring.admissions_id', 'admissions.id')
            // ->Join('reason_consultation', 'reason_consultation.admissions_id', 'admissions.id')

            ->where('admissions.discharge_date', '!=', "0000-00-00 00:00:00")
            ->where('location.program_id', 22)
            ->with(
                'status',
                'gender',
                'identification_type',
                'residence_municipality',
                'residence',
                'campus',
                'contract',
                'pac_monitoring',
                'reason_consultation',
                'location',
                'location.admission_route',
                'location.scope_of_attention',
                'location.program',
                'location.flat',
                'location.pavilion',
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');


        // if ($request->search) {
        //     $Admissions->where('nombre_completo', 'like', '%' . $request->search . '%')
        //         ->Orwhere('id', 'like', '%' . $request->search . '%');
        // }
        // if ($request->query("pagination", true) === "false") {
        //     $Admissions = $Admissions->get()->toArray();
        // } else {
        //     $page = $request->query("current_page", 1);
        //     $per_page = $request->query("per_page", 10);

        //     $Admissions = $Admissions->paginate($per_page, '*', 'page', $page);
        // }

        if ($request->_sort) {
            $Admissions->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Admissions->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
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
        $count      = Admissions::where('patient_id', $request->patient_id)->count();
        $Admissions = new Admissions;
        $Admissions->consecutive = $count + 1;
        $Admissions->diagnosis_id = $request->diagnosis_id;;
        $Admissions->campus_id = $request->campus_id;
        $Admissions->contract_id = $request->contract_id;
        $Admissions->briefcase_id = $request->briefcase_id;
        $Admissions->procedure_id = $request->procedure_id;
        $Admissions->patient_id = $request->patient_id;
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
        $Location->user_id = Auth::user()->id;
        $Location->entry_date = Carbon::now();
        $Location->save();

        if ($Admissions->procedure_id) {
            $Authorization = new  Authorization;
            $Authorization->services_briefcase_id =  $Admissions->procedure_id;
            $Authorization->admissions_id =  $Admissions->id;
            $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
            if ($validate->type_auth == 1) {
                $Authorization->auth_status_id =  2;
            } else {
                $Authorization->auth_status_id =  1;
            }

            $Authorization->save();
        }


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

            if ($request->bed_id != null) {
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
            $Admissions->briefcase_id = $request->briefcase_id;
            $Admissions->procedure_id = $request->procedure_id;
            $Admissions->patient_id = $request->patient_id;
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
