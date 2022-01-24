<?php

namespace App\Http\Controllers\Management;

use App\Models\Gloss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossRequest;
use Illuminate\Database\QueryException;

class GlossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Gloss = Gloss::select('gloss.*','gloss_response.id AS response_id')->with('company', 'campus', 'objetion_type', 'repeated_initial', 'gloss_modality', 'gloss_ambit', 'gloss_service', 'objetion_code', 'user', 'received_by', 'gloss_status','assing_user','regimen')
        ->Join('company', 'gloss.company_id', 'company.id')
        ->leftjoin('gloss_response', 'gloss.id', '=', 'gloss_response.gloss_id')->orderBy('received_date', 'ASC');

        if ($request->_sort) {
            $Gloss->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Gloss->where('invoice_prefix', 'like', '%' . $request->search . '%')
            ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
            ->orWhere('received_date', 'like', '%' . $request->search . '%')
            ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Gloss = $Gloss->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $Gloss = $Gloss->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Glosas obtenidas exitosamente',
            'data' => ['gloss' => $Gloss]
        ]);
    }


    public function getByStatus(Request $request,int $status,int $user_id): JsonResponse
    {
        if($status==0 && $user_id==0){
            $Gloss = Gloss::select('gloss.*')->with('company', 'campus', 'objetion_type', 'repeated_initial', 'gloss_modality', 'gloss_ambit', 'gloss_service', 'objetion_code', 'user', 'received_by', 'gloss_status','assing_user')
            ->Join('company', 'gloss.company_id', 'company.id');
        }
        else if($status==0){
            $Gloss = Gloss::select('gloss.*')->where('assing_user_id',$user_id)->with('company', 'campus', 'objetion_type', 'repeated_initial', 'gloss_modality', 'gloss_ambit', 'gloss_service', 'objetion_code', 'user', 'received_by', 'gloss_status','assing_user')
            ->Join('company', 'gloss.company_id', 'company.id');
        }else if($user_id==0){
        $Gloss = Gloss::select('gloss.*')->where('gloss_status_id',$status)->with('company', 'campus', 'objetion_type', 'repeated_initial', 'gloss_modality', 'gloss_ambit', 'gloss_service', 'objetion_code', 'user', 'received_by', 'gloss_status','assing_user')
        ->Join('company', 'gloss.company_id', 'company.id');
        }else{
            $Gloss = Gloss::select('gloss.*')->where('gloss_status_id',$status)->where('assing_user_id',$user_id)->with('company', 'campus', 'objetion_type', 'repeated_initial', 'gloss_modality', 'gloss_ambit', 'gloss_service', 'objetion_code', 'user', 'received_by', 'gloss_status','assing_user')
            ->Join('company', 'gloss.company_id', 'company.id');
        }
        if($request->_sort){
            $Gloss->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Gloss->where('invoice_prefix', 'like', '%' . $request->search . '%')
            ->orWhere('invoice_consecutive', 'like', '%' . $request->search . '%')
            ->orWhere('received_date', 'like', '%' . $request->search . '%')
            ->orWhere('company.name', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Gloss=$Gloss->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 30);
            
            $Gloss=$Gloss->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Glosas obtenidos exitosamente',
            'data' => ['gloss' => $Gloss]
        ]);
    }

    public function import(Request $request)
    {
        foreach ($request->toArray() as $key => $item) {
            
                $Gloss = new Gloss;
                $Gloss->objetion_type_id = $item['Tipo_Objecion'];
                $GlossCon = Gloss::where('invoice_prefix', '=', $item["Prefijo_Factura"])->where('invoice_consecutive', '=', $item['Consecutivo_Factura'])->where('objetion_code_id','=',$item['Cod_Objeción'])->first();
                if (!$GlossCon) {
                    $Gloss->repeated_initial_id = 1;
                }else{
                    $Gloss->repeated_initial_id = 2;
                }
                $Gloss->company_id = $item['EAPB'];
                $Gloss->campus_id = $item['Sede'];
                $Gloss->gloss_ambit_id = $item['Ambito'];
                $Gloss->gloss_modality_id = $item['Modalidad'];
                $Gloss->gloss_service_id = $item['Servicio'];
                $Gloss->objetion_code_id = $item['Cod_Objeción'];
                $Gloss->regimen_id = $item['Regimen'];
                $Gloss->gloss_status_id = 1;
                $Gloss->user_id = Auth::user()->id;
                $Gloss->received_by_id = $item['Medio_Recibido'];
                $Gloss->invoice_prefix = $item['Prefijo_Factura'];
                $Gloss->objetion_detail = $item['Detalle_de_Objeción'];
                $Gloss->invoice_consecutive = $item['Consecutivo_Factura'];
                $Gloss->objeted_value = $item['Vr_Objetado'];
                $Gloss->invoice_value = $item['Cantidad'];
                $Gloss->emission_date = $item['F_Emision'];
                $Gloss->radication_date = $item['F_Radicacion'];
                $Gloss->received_date = $item['F_Recibido'];
                $Gloss->assing_user_id = $item['Analista_Asig'];
                $Gloss->save();
            
            }
        return response()->json([
            'status' => true,
            'message' => 'Glosas creadas exitosamente',
            'data' => ['gloss' => $request->toArray()]
        ]);
    }


    public function store(GlossRequest $request): JsonResponse
    {
        $Gloss = new Gloss;
        $Gloss->objetion_type_id = $request->objetion_type_id;
        $GlossCon = Gloss::where('invoice_prefix', '=', $request->invoice_prefix)->where('invoice_consecutive', '=',$request->invoice_consecutive)->where('objetion_code_id','=',$request->objetion_code_id)->first();
        if (!$GlossCon) {
            $Gloss->repeated_initial_id = 1;
        }else{
            $Gloss->repeated_initial_id = 2;
        }
        $Gloss->company_id = $request->company_id;
        $Gloss->campus_id = $request->campus_id;
        $Gloss->gloss_ambit_id = $request->gloss_ambit_id;
        $Gloss->gloss_modality_id = $request->gloss_modality_id;
        $Gloss->gloss_service_id = $request->gloss_service_id;
        $Gloss->objetion_code_id = $request->objetion_code_id;
        $Gloss->regimen_id = $request->regime_id;
        $Gloss->gloss_status_id = 1;
        $Gloss->user_id = Auth::user()->id;
        $Gloss->received_by_id = $request->received_by_id;
        $Gloss->invoice_prefix = $request->invoice_prefix;
        $Gloss->objetion_detail = $request->objetion_detail;
        $Gloss->invoice_consecutive = $request->invoice_consecutive;
        $Gloss->objeted_value = $request->objeted_value;
        $Gloss->invoice_value = $request->invoice_value;
        $Gloss->emission_date = $request->emission_date;
        $Gloss->radication_date = $request->radication_date;
        $Gloss->received_date = $request->received_date;
        $Gloss->assing_user_id = $request->assing_user_id;
        $Gloss->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Glosas creadas exitosamente',
            'data' => ['gloss' => $Gloss->toArray()]
        ]);
    }



    public function ChangeStatusBriefcase(Request $request): JsonResponse
    {  

        $Gloss = Gloss::find($request->gloss_id);
        $Gloss->gloss_status_id = $request->state_gloss;
        $Gloss->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Estado cambiado correctamente',
            'data' => ['gloss' => $Gloss->toArray()]
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
        $Gloss = Gloss::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Glosas obtenidas exitosamente',
            'data' => ['gloss' => $Gloss]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossRequest $request, int $id): JsonResponse
    {
        $Gloss = Gloss::find($id);
        $Gloss->objetion_type_id = $request->objetion_type_id;
        $Gloss->company_id = $request->company_id;
        $Gloss->campus_id = $request->campus_id;
        $Gloss->gloss_ambit_id = $request->gloss_ambit_id;
        $Gloss->gloss_modality_id = $request->gloss_modality_id;
        $Gloss->gloss_service_id = $request->gloss_service_id;
        if($request->objetion_code_id){
            $Gloss->objetion_code_id = $request->objetion_code_id;
        }
        $Gloss->gloss_status_id = 1;
        $Gloss->user_id = Auth::user()->id;
        $Gloss->regimen_id = $request->regime_id;
        $Gloss->received_by_id = $request->received_by_id;
        $Gloss->invoice_prefix = $request->invoice_prefix;
        $Gloss->objetion_detail = $request->objetion_detail;
        $Gloss->invoice_consecutive = $request->invoice_consecutive;
        $Gloss->objeted_value = $request->objeted_value;
        $Gloss->invoice_value = $request->invoice_value;
        $Gloss->emission_date = $request->emission_date;
        $Gloss->radication_date = $request->radication_date;
        $Gloss->received_date = $request->received_date;
        $Gloss->assing_user_id = $request->assing_user_id;

        $Gloss->save();


        return response()->json([
            'status' => true,
            'message' => 'Glosas actualizadas exitosamente',
            'data' => ['gloss' => $Gloss]
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
            $Gloss = Gloss::find($id);
            $Gloss->delete();

            return response()->json([
                'status' => true,
                'message' => 'Glosas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Glosas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
