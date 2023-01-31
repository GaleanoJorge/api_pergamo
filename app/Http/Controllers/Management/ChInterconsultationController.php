<?php

namespace App\Http\Controllers\Management;

use App\Models\ChInterconsultation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Assistance;
use App\Models\AssistanceSpecial;
use App\Models\Authorization;
use App\Models\ChRecord;
use App\Models\Role;
use App\Models\RoleAttention;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChInterconsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChInterconsultation = ChInterconsultation::select(
            'ch_interconsultation.*',
            DB::raw('
                    SUM(
                        IF( ch_record.id > 0,
                            1,0
                        )
                    ) AS evolutions'),
        )
            ->leftJoin('ch_record', 'ch_record.ch_interconsultation_id', 'ch_interconsultation.id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'ch_interconsultation.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('procedure', 'procedure.id', 'manual_price.procedure_id')
            ->leftjoin('role_attention', 'role_attention.type_of_attention_id', 'ch_interconsultation.type_of_attention_id')
            ->with(
                'type_of_attention',
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'specialty',
                'frequency',
                'type_record',
                'ch_record',
                'ch_record.user',
                'admissions',
                'many_ch_record',
                'roles',
                'procedure',
            )
            ->groupBy('ch_interconsultation.id');

        if ($request->_sort) {
            $ChInterconsultation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChInterconsultation->where('procedure.name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $ChInterconsultation->where('ch_interconsultation.id', $request->id);
        }

        if ($request->ambulatory_medical_order) {
            $ChInterconsultation->whereNull('ch_interconsultation.ambulatory_medical_order');
        }

        if ($request->role_id) {
            $rr = Role::find($request->role_id);
            $ChInterconsultation->whereNotNull('ch_interconsultation.ch_record_id');
            if ($rr->role_type_id != 1) {
                $ChInterconsultation->where('role_attention.role_id', $request->role_id);
                $assistance = AssistanceSpecial::select('assistance_special.*')
                ->leftJoin('assistance', 'assistance_special.assistance_id', 'assistance.id')
                ->where('assistance.user_id', Auth::user()->id)
                ->groupBy('assistance_special.id')
                ->get()->toArray();

            if (count($assistance) > 0) {
                $specielties = [];
                foreach ($assistance as $e) {
                    array_push($specielties, $e['specialty_id']);
                }
                $ChInterconsultation->whereIn('role_attention.specialty_id', $specielties);
            }
            }
        }

        if ($request->admissions_id) {
            $ChInterconsultation->where('ch_interconsultation.admissions_id', $request->admissions_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ChInterconsultation = $ChInterconsultation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChInterconsultation = $ChInterconsultation->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Interconsulta obtenidos exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {
        $chrecord = ChRecord::find($id);
        $ChInterconsultation = ChInterconsultation::select('ch_interconsultation.*')
        ->leftJoin('ch_record', 'ch_record.id', 'ch_interconsultation.ch_record_id')
            ->with(
                'services_briefcase',
                'services_briefcase.manual_price',
                'services_briefcase.manual_price.procedure',
                'specialty',
                'frequency',
                'type_record',
                'ch_record',
                'ch_record.user',
                'admissions',
                'many_ch_record',
                'procedure',
                'type_of_attention'
            )
            ->where('ch_record.admissions_id', $chrecord->admissions_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Interconsulta asociado al paciente exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChRecord = ChRecord::where('ch_record.id', $request->ch_record_id)
            ->select(
                'ch_record.*',
                'location.admission_route_id AS admission_route_id'
            )
            ->with('ch_interconsultation')
            ->leftJoin('admissions', 'admissions.id', 'ch_record.admissions_id')
            ->leftJoin('location', 'location.admissions_id', 'admissions.id')
            ->get()->toArray();

        $ChInterconsultationExist = ChInterconsultation::where('admissions_id', $ChRecord[0]['admissions_id']);
        if ($ChRecord[0]['ch_interconsultation_id']) {
            $ChInterconsultationExist->where('ch_interconsultation.services_briefcase_id', $request->services_briefcase_id);
        }
        $ChInterconsultationExist = $ChInterconsultationExist->get()->toArray();

        // if (count($ChInterconsultationExist) > 0) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya existe una interconsulta con este procedimiento',
        //         'data' => ['ch_interconsultation' => []]
        //     ]);
        // }

        $ChInterconsultation = new ChInterconsultation;
        $ChInterconsultation->specialty_id = $request->specialty_id;
        $ChInterconsultation->procedure_id = $request->procedure_id;
        $ChInterconsultation->amount = $request->amount;
        $ChInterconsultation->ambulatory_medical_order = $request->ambulatory_medical_order;
        $ChInterconsultation->type_of_attention_id = $request->type_of_attention_id;
        $ChInterconsultation->frequency_id = $request->frequency_id;
        $ChInterconsultation->observations = $request->observations;
        $ChInterconsultation->type_record_id = $request->type_record_id;
        $ChInterconsultation->ch_record_id = $request->ch_record_id;
        $ChInterconsultation->services_briefcase_id = $request->services_briefcase_id;
        if ($ChRecord[0]['admission_route_id'] == 1) {
            $ChInterconsultation->admissions_id = $ChRecord[0]['admissions_id'];
        } else {
            $ChInterconsultation->admissions_id = null;
        }
        $ChInterconsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta asociado al paciente exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation->toArray()]
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
        $ChInterconsultation = ChInterconsultation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta obtenido exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
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
        $ChInterconsultation = ChInterconsultation::find($id);
        $ChInterconsultation->specialty_id = $request->specialty_id;
        $ChInterconsultation->procedure_id = $request->procedure_id;
        $ChInterconsultation->amount = $request->amount;
        $ChInterconsultation->ambulatory_medical_order = $request->ambulatory_medical_order;
        $ChInterconsultation->type_of_attention_id = $request->type_of_attention_id;
        $ChInterconsultation->frequency_id = $request->frequency_id;
        $ChInterconsultation->observations = $request->observations;
        $ChInterconsultation->type_record_id = $request->type_record_id;
        $ChInterconsultation->ch_record_id = $request->ch_record_id;
        $ChInterconsultation->services_briefcase_id = $request->services_briefcase_id;
        $ChInterconsultation->admissions_id = $request->admissions_id;
        $ChInterconsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta actualizado exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
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
            $ChInterconsultation = ChInterconsultation::find($id);
            $ChInterconsultation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Interconsulta eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Interconsulta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
