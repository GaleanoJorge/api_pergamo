<?php

namespace App\Http\Controllers\Management;

use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionsRequest;
use App\Models\Authorization;
use App\Models\BillingPad;
use App\Models\ChInterconsultation;
use App\Models\TypeContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $Location = Location::orderBy('created_at', 'desc');

        if ($request->_sort) {
            $Location->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Location->where('Location.code', 'like', '%' . $request->search . '%')
                ->orWhere('Location.code_technical_concept', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $Location = $Location->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Location = $Location->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Admisión obtenidos exitosamente',
            'data' => ['location' => $Location]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AdmissionsRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $Location = new Location;
        $Location->admission_id = $request->admission_id;
        $Location->admission_route_id = $request->admission_route_id;
        $Location->scope_of_attention_id = $request->scope_of_attention_id;
        $Location->program_id = $request->program_id;
        $Location->authorization_id = $request->authorization_id;
        $Location->pavilion_id = $request->pavilion_id;
        $Location->flat_id = $request->flat_id;
        $Location->bed_id = $request->bed_id;
        $Location->user_id = Auth::user()->id;
        $Location->entry_date = Carbon::now();


        $Location->save();


        return response()->json([
            'status' => true,
            'message' => 'Ubicación creado exitosamente',
            'data' => ['location' => $Location->toArray()]
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
        $Location = Location::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ubicación obtenido exitosamente',
            'data' => ['location' => $Location]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function changeService(Request $request, int $id): JsonResponse
    {
        $Location = Location::where('admissions_id', $id)->orderBy('created_at', 'desc')->first();
        $Location->discharge_date = Carbon::now()->format('Y-m-d H:i:s');
        $Location->save();

        $startAuth = Authorization::where('location_id',  $Location->id)->orderBy('created_at', 'desc')->first();

        $start_date = Carbon::parse($Location->entry_date)->setTimezone('America/Bogota')->startOfDay();
        $finish_date = Carbon::parse($Location->discharge_date)->setTimezone('America/Bogota')->startOfDay();
        $diff_days = $start_date->diffInDays($finish_date) + 1;

        $Authorization_end = Authorization::where('location_id', $Location->id)->first();
        $Authorization_end->quantity = $diff_days;
        $Authorization_end->save();

        if ($Location->bed_id) {
            $Bed = Bed::find($Location->bed_id);
            $Bed->status_bed_id = 1;
            $Bed->identification = null;
            $Bed->reservation_date = null;
            $Bed->save();
        }

        $Location2 = new Location;
        $Location2->admissions_id = $request->admissions_id;
        $Location2->procedure_id = $request->procedure_id;
        $Location2->admission_route_id = $request->admission_route_id;
        $Location2->scope_of_attention_id = $request->scope_of_attention_id;
        $Location2->program_id = $request->program_id;
        $Location2->pavilion_id = $request->pavilion_id;
        $Location2->flat_id = $request->flat_id;
        $Location2->bed_id = $request->bed_id;
        $Location2->user_id = Auth::user()->id;
        $Location2->entry_date = Carbon::now();
        $Location2->save();

        if ($request->bed_id) {

            $Bed = Bed::find($request->bed_id);
            $Bed->status_bed_id = 2;
            $Bed->identification = null;
            $Bed->reservation_date = null;
            $Bed->save();
        }

        if ($request->admission_route_id == 1) {
            $ChInterconsultation = new ChInterconsultation();
            $ChInterconsultation->services_briefcase_id = $request->procedure_id;
            $ChInterconsultation->admissions_id = $request->admissions_id;
            $ChInterconsultation->save();

            $Authorization = new Authorization;
            $Authorization->services_briefcase_id = $request->procedure_id;
            $Authorization->admissions_id = $request->admissions_id;
            $Authorization->auth_number = $Authorization_end->auth_number;
            $Authorization->file_auth = $request->file_auth;
            $Authorization->location_id = $Location2->id;
            $Authorization->ch_interconsultation_id = $startAuth->ch_interconsultation_id;
            $Authorization->auth_status_id = 3;
            $Authorization->save();

            $BillingPad = BillingPad::where('admissions_id', $request->admissions_id)
                ->whereBetween('validation_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                ->first();
            $TypeContract = TypeContract::select('type_contract.*')
                ->leftJoin('contract', 'contract.type_contract_id', 'type_contract.id')
                ->leftJoin('admissions', 'admissions.contract_id', 'contract.id')
                ->where('admissions.id', $request->admissions_id)
                ->first();
            if (!$BillingPad) {
                $BillingPad = new BillingPad;
                $BillingPad->admissions_id = $request->admissions_id;
                $BillingPad->validation_date = Carbon::now();
                if ($TypeContract->id == 5) {
                    $BillingPad->billing_pad_status_id = 2;
                } else {
                    $BillingPad->billing_pad_status_id = 1;
                }
                $BillingPad->total_value = 0;
                $BillingPad->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Ubicación actualizado exitosamente',
            'data' => ['location' => $Location2]
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
        $Location = Location::find($id);
        $Location->admission_id = $request->admission_id;
        $Location->admission_route_id = $request->admission_route_id;
        $Location->scope_of_attention_id = $request->scope_of_attention_id;
        $Location->program_id = $request->program_id;
        $Location->pavilion_id = $request->pavilion_id;
        $Location->flat_id = $request->flat_id;
        $Location->bed_id = $request->bed_id;
        $Location->user_id = $request->user_id;
        $Location->entry_date = Carbon::now();
        $Location->save();

        return response()->json([
            'status' => true,
            'message' => 'Ubicación actualizado exitosamente',
            'data' => ['location' => $Location]
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
            $Location = Location::find($id);
            $Location->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ubicación eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ubicación está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
