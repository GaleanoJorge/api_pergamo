<?php

namespace App\Http\Controllers\Management;

use App\Models\Reference;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Reference = Reference::select('reference.*')
            ->with(
                'patient',
                'patient.identification_type',
                'patient.gender',
                'gender',
                'identification_type',
                'procedure',
                'company',
                'diagnosis',
                'providers_of_health_services',
                'stay_type',
                'reference_status',
                'request_campus',
                'request_regime',
                'request_user',
                'request_technological_medium',
                'request_admission_route',
                'request_specialty',
                'request_program',
                'acceptance_campus',
                'acceptance_regime',
                'acceptance_user',
                'acceptance_technological_medium',
                'acceptance_admission_route',
                'acceptance_specialty',
                'acceptance_program',
                'tutor',
                'denied_user',
                'denied_technological_medium',
                'denied_admission_route',
                'denied_specialty',
                'denied_type',
                'denied_program',
                'admissions',
            )->orderBy('reference.id', 'DESC');

        if ($request->_sort) {
            $Reference->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $Reference->where(function ($query) use ($request) {
                $query->where('reference.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('reference.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('reference.identification', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->identification) {
            $Reference->where('reference.identification', $request->identification);
        }

        if ($request->re_input) {
            $Reference->where('reference.reference_status_id', 3);
        }

        if ($request->patient_id) {
            $Reference->where('reference.patient_id', $request->patient_id);
        }

        if ($request->gender_id) {
            $Reference->where('reference.gender_id', $request->gender_id);
        }

        if ($request->identification_type_id) {
            $Reference->where('reference.identification_type_id', $request->identification_type_id);
        }

        if ($request->procedure_id) {
            $Reference->where('reference.procedure_id', $request->procedure_id);
        }

        if ($request->company_id) {
            $Reference->where('reference.company_id', $request->company_id);
        }

        if ($request->diagnosis_id) {
            $Reference->where('reference.diagnosis_id', $request->diagnosis_id);
        }

        if ($request->providers_of_health_services_id) {
            $Reference->where('reference.providers_of_health_services_id', $request->providers_of_health_services_id);
        }

        if ($request->stay_type_id) {
            $Reference->where('reference.stay_type_id', $request->stay_type_id);
        }

        if ($request->reference_status_id) {
            $Reference->where('reference.reference_status_id', $request->reference_status_id);
        }

        if ($request->request_campus_id) {
            $Reference->where('reference.request_campus_id', $request->request_campus_id);
        }

        if ($request->request_regime_id) {
            $Reference->where('reference.request_regime_id', $request->request_regime_id);
        }

        if ($request->request_user_id) {
            $Reference->where('reference.request_user_id', $request->request_user_id);
        }

        if ($request->request_technological_medium_id) {
            $Reference->where('reference.request_technological_medium_id', $request->request_technological_medium_id);
        }

        if ($request->request_admission_route_id) {
            $Reference->where('reference.request_admission_route_id', $request->request_admission_route_id);
        }

        if ($request->request_specialty_id) {
            $Reference->where('reference.request_specialty_id', $request->request_specialty_id);
        }

        if ($request->request_program_id) {
            $Reference->where('reference.request_program_id', $request->request_program_id);
        }

        if ($request->acceptance_campus_id) {
            $Reference->where('reference.acceptance_campus_id', $request->acceptance_campus_id);
        }

        if ($request->acceptance_regime_id) {
            $Reference->where('reference.acceptance_regime_id', $request->acceptance_regime_id);
        }

        if ($request->acceptance_user_id) {
            $Reference->where('reference.acceptance_user_id', $request->acceptance_user_id);
        }

        if ($request->acceptance_technological_medium_id) {
            $Reference->where('reference.acceptance_technological_medium_id', $request->acceptance_technological_medium_id);
        }

        if ($request->acceptance_admission_route_id) {
            $Reference->where('reference.acceptance_admission_route_id', $request->acceptance_admission_route_id);
        }

        if ($request->acceptance_specialty_id) {
            $Reference->where('reference.acceptance_specialty_id', $request->acceptance_specialty_id);
        }

        if ($request->acceptance_program_id) {
            $Reference->where('reference.acceptance_program_id', $request->acceptance_program_id);
        }

        if ($request->tutor_id) {
            $Reference->where('reference.tutor_id', $request->tutor_id);
        }

        if ($request->denied_user_id) {
            $Reference->where('reference.denied_user_id', $request->denied_user_id);
        }

        if ($request->denied_technological_medium_id) {
            $Reference->where('reference.denied_technological_medium_id', $request->denied_technological_medium_id);
        }

        if ($request->denied_admission_route_id) {
            $Reference->where('reference.denied_admission_route_id', $request->denied_admission_route_id);
        }

        if ($request->denied_specialty_id) {
            $Reference->where('reference.denied_specialty_id', $request->denied_specialty_id);
        }

        if ($request->denied_type_id) {
            $Reference->where('reference.denied_type_id', $request->denied_type_id);
        }

        if ($request->denied_program_id) {
            $Reference->where('reference.denied_program_id', $request->denied_program_id);
        }

        if ($request->admissions_id) {
            $Reference->where('reference.admissions_id', $request->admissions_id);
        }

        if ($request->query("pagination", true) == "false") {
            $Reference = $Reference->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Reference = $Reference->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['reference' => $Reference]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if ($request->route == 1) {

            $Reference = new Reference;
            $Reference->patient_id = $request->patient_id;
            $Reference->firstname = $request->firstname;
            $Reference->lastname = $request->lastname;
            $Reference->identification = $request->identification;
            $Reference->re_input = $request->re_input;
            $Reference->age = $request->age;
            $Reference->intention = $request->intention;
            $Reference->presentation_date = Carbon::parse($request->presentation_date . ' ' .  $request->presentation_hour);
            $Reference->gender_id = $request->gender_id;
            $Reference->identification_type_id = $request->identification_type_id;
            $Reference->procedure_id = $request->procedure_id;
            $Reference->company_id = $request->company_id;
            $Reference->diagnosis_id = $request->diagnosis_id;
            $Reference->providers_of_health_services_id = $request->providers_of_health_services_id;
            $Reference->stay_type_id = $request->stay_type_id;
            $Reference->request_campus_id = $request->request_campus_id;
            $Reference->request_regime_id = $request->request_regime_id;
            $Reference->request_technological_medium_id = $request->request_technological_medium_id;
            $Reference->request_admission_route_id = $request->request_admission_route_id;
            $Reference->request_specialty_id = $request->request_specialty_id;
            $Reference->request_program_id = $request->request_program_id;
            $Reference->request_observation = $request->request_observation;
            $Reference->request_user_id = $request->user_id;

            $Reference->reference_status_id = 1;

            $Reference->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['reference' => $Reference]
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
        $Reference = Reference::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['reference' => $Reference]
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

        if ($request->route == 1) {
            $Reference = Reference::find($id);
            $Reference->patient_id = $request->patient_id;
            $Reference->firstname = $request->firstname;
            $Reference->lastname = $request->lastname;
            $Reference->identification = $request->identification;
            $Reference->re_input = $request->re_input;
            $Reference->age = $request->age;
            $Reference->intention = $request->intention;
            $Reference->presentation_date = Carbon::parse($request->presentation_date . ' ' .  $request->presentation_hour);
            $Reference->gender_id = $request->gender_id;
            $Reference->identification_type_id = $request->identification_type_id;
            $Reference->procedure_id = $request->procedure_id;
            $Reference->company_id = $request->company_id;
            $Reference->diagnosis_id = $request->diagnosis_id;
            $Reference->providers_of_health_services_id = $request->providers_of_health_services_id;
            $Reference->stay_type_id = $request->stay_type_id;
            $Reference->request_campus_id = $request->request_campus_id;
            $Reference->request_regime_id = $request->request_regime_id;
            $Reference->request_technological_medium_id = $request->request_technological_medium_id;
            $Reference->request_admission_route_id = $request->request_admission_route_id;
            $Reference->request_specialty_id = $request->request_specialty_id;
            $Reference->request_program_id = $request->request_program_id;
            $Reference->request_observation = $request->request_observation;

            $Reference->reference_status_id = 1;
            $Reference->save();
            
        } else if ($request->route == 2) {
            
            $Reference = Reference::find($id);
            
            $Reference->acceptance_date = Carbon::parse($request->acceptance_date . ' ' .  $request->acceptance_hour);
            $Reference->acceptance_campus_id = $request->acceptance_campus_id;
            $Reference->acceptance_regime_id = $request->acceptance_regime_id;
            $Reference->acceptance_user_id = $request->acceptance_user_id;
            $Reference->acceptance_technological_medium_id = $request->acceptance_technological_medium_id;
            $Reference->acceptance_admission_route_id = $request->acceptance_admission_route_id;
            $Reference->acceptance_specialty_id = $request->acceptance_specialty_id;
            $Reference->acceptance_program_id = $request->acceptance_program_id;
            $Reference->acceptance_observation = $request->acceptance_observation;
            $Reference->reference_status_id = 3;
            
            $Reference->tutor_id = $request->tutor_id;
            
            $Reference->save();
            
        } else if ($request->route == 3) {

            $Reference = Reference::find($id);
            
            $Reference->denied_date = Carbon::parse($request->denied_date . ' ' .  $request->denied_hour);
            $Reference->denied_user_id = $request->denied_user_id;
            $Reference->denied_technological_medium_id = $request->denied_technological_medium_id;
            $Reference->denied_admission_route_id = $request->denied_admission_route_id;
            $Reference->denied_specialty_id = $request->denied_specialty_id;
            $Reference->denied_type_id = $request->denied_type_id;
            $Reference->denied_program_id = $request->denied_program_id;
            $Reference->denied_observation = $request->denied_observation;
            $Reference->reference_status_id = 2;

            $Reference->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'factura actualizada exitosamente',
            'data' => ['reference' => $Reference]
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
            $ReferenceDelete = Reference::where('procedure_id', $id);
            $ReferenceDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'facturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'facturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
