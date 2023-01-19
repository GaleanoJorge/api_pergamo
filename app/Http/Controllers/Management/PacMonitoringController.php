<?php

namespace App\Http\Controllers\Management;

use App\Models\PacMonitoring;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PacMonitoringRequest;
use App\Models\Admissions;
use App\Models\ReasonConsultation;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class PacMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PacMonitoring = PacMonitoring::select();

        if($request->_sort){
            $PacMonitoring->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PacMonitoring->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $PacMonitoring = $PacMonitoring->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PacMonitoring=$PacMonitoring->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Gestión y deguimiento del servicio asociado exitosamente',
            'data' => ['pac_monitoring' => $PacMonitoring]
        ]);
    }

 
    public function store(Request $request): JsonResponse
    {
        $PacMonitoring = new PacMonitoring;
        
        $PacMonitoring->admissions_id = $request->admissions_id;
        $PacMonitoring->type_plan = $request->type_plan;
        $PacMonitoring->application_date = $request->application_date;
        $PacMonitoring->authorization_pin = $request->authorization_pin;
        $PacMonitoring->profesional_user_id = $request->profesional_user_id;
        $PacMonitoring->diagnosis_id = $request->diagnosis_id;
        $PacMonitoring->reception_hour = $request->reception_hour;
        $PacMonitoring->presentation_hour = $request->presentation_hour;
        $PacMonitoring->acceptance_hour = $request->acceptance_hour;
        $PacMonitoring->offer_hour = $request->offer_hour;
        $PacMonitoring->start_consult_hour = $request->start_consult_hour;
        $PacMonitoring->finish_consult_hour = $request->finish_consult_hour;
        $PacMonitoring->close_date = $request->close_date;
        $PacMonitoring->close_crm_hour = $request->close_crm_hour;
        $PacMonitoring->copay_value = $request->copay_value;

        $PacMonitoring->save();


        $ReasonConsultation = new ReasonConsultation;

        $ReasonConsultation->admissions_id = $request->admissions_id;
        $ReasonConsultation->symptoms = $request->symptoms;
        $ReasonConsultation->respiratory_issues = $request->respiratory_issues;
        $ReasonConsultation->covid_contact = $request->covid_contact;

        $ReasonConsultation->save();

        $admissions = Admissions::find($request->admissions_id);
        $admissions->discharge_date= Carbon::now();

        $admissions->save();

        return response()->json([
            'status' => true,
            'message' => 'Gestión y deguimiento del servicio creado exitosamente',
            'data' => ['pac_monitoring' => $PacMonitoring->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id):  JsonResponse
    {
        $PacMonitoring = PacMonitoring::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Gestión y deguimiento del servicio obtenido exitosamente',
            'data' => ['pac_monitoring' => $PacMonitoring]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function update(PacMonitoringRequest $request, int $id): JsonResponse
    {
        $PacMonitoring = PacMonitoring::find($id);
        
        $PacMonitoring->application_date = $request->application_date;
        $PacMonitoring->authorization_pin = $request->admissions_id;
        $PacMonitoring->profesional_user_id = $request->profesional_user_id;
        $PacMonitoring->reception_hour = $request->reception_hour;
        $PacMonitoring->presentation_hour = $request->presentation_hour;
        $PacMonitoring->acceptance_hour = $request->acceptance_hour;
        $PacMonitoring->offer_hour = $request->offer_hour;
        $PacMonitoring->start_consult_hour = $request->start_consult_hour;
        $PacMonitoring->finish_consult_hour = $request->finish_consult_hour;
        $PacMonitoring->close_date = $request->close_date;
        $PacMonitoring->close_crm_hour = $request->close_crm_hour;
        $PacMonitoring->copay_value = $request->copay_value;

        $PacMonitoring->save();


        $ReasonConsultation = ReasonConsultation::find($request->id_reason);

        $ReasonConsultation->symptoms = $request->symptoms;
        $ReasonConsultation->respiratory_issues = $request->respiratory_issues;
        $ReasonConsultation->covid_contact = $request->covid_contact;

        $ReasonConsultation->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Gestión y deguimiento del servicio actualizado exitosamente',
            'data' => ['pac_monitoring' => $PacMonitoring->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $PacMonitoring = PacMonitoring::find($id);
            $PacMonitoring->delete();

            return response()->json([
                'status' => true,
                'message' => 'Gestión y deguimiento del servicio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gestión y deguimiento del servicio esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
