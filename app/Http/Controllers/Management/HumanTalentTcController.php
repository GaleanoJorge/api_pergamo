<?php

namespace App\Http\Controllers\Management;

use App\Models\HumanTalentTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HumanTalentTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Mockery\Undefined;

class HumanTalentTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HumanTalentTc = HumanTalentTc::select();

        if ($request->_sort) {
            $HumanTalentTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $HumanTalentTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $HumanTalentTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $HumanTalentTc = $HumanTalentTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $HumanTalentTc = $HumanTalentTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detallado de talento humano obtenido exitosamente',
            'data' => ['human_talent_tc' => $HumanTalentTc]
        ]);
    }

    public function store(HumanTalentTcRequest $request): JsonResponse
    {
        $HumanTalentTc = new HumanTalentTc;
        $HumanTalentTc->period = $request->period;
        $HumanTalentTc->status = $request->status;
        $HumanTalentTc->contract = $request->contract;
        $HumanTalentTc->nrodoc = $request->nrodoc;
        $HumanTalentTc->typedoc = $request->typedoc;
        $HumanTalentTc->name = $request->name;
        $HumanTalentTc->accrued_cost = $request->accrued_cost;
        $HumanTalentTc->employer_cost = $request->employer_cost;
        $HumanTalentTc->provision_cost = $request->provision_cost;
        $HumanTalentTc->total_cost = $request->total_cost;
        $HumanTalentTc->net = $request->net;
        $HumanTalentTc->percent = $request->percent;
        $HumanTalentTc->campus = $request->campus;
        $HumanTalentTc->ambit_gen = $request->ambit_gen;
        $HumanTalentTc->ambit_esp = $request->ambit_esp;
        $HumanTalentTc->ambit_esp2 = $request->ambit_esp2;
        $HumanTalentTc->specialty = $request->specialty;
        $HumanTalentTc->position = $request->position;
        $HumanTalentTc->agreement = $request->agreement;
        $HumanTalentTc->direction = $request->direction;
        $HumanTalentTc->account_type = $request->account_type;
        $HumanTalentTc->nroaccount = $request->nroaccount;
        $HumanTalentTc->bank = $request->bank;
        $HumanTalentTc->codbank = $request->codbank;

        $HumanTalentTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro Talento Humano creado exitosamente',
            'data' => ['human_talent_tc' => $HumanTalentTc->toArray()]
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
        $HumanTalentTc = HumanTalentTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro Talento Humano obtenido exitosamente',
            'data' => ['human_talent_tc' => $HumanTalentTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(HumanTalentTcRequest $request, int $id): JsonResponse
    {
        $HumanTalentTc = HumanTalentTc::find($id);
        $HumanTalentTc->period = $request->period;
        $HumanTalentTc->status = $request->status;
        $HumanTalentTc->contract = $request->contract;
        $HumanTalentTc->nrodoc = $request->nrodoc;
        $HumanTalentTc->typedoc = $request->typedoc;
        $HumanTalentTc->name = $request->name;
        $HumanTalentTc->accrued_cost = $request->accrued_cost;
        $HumanTalentTc->employer_cost = $request->employer_cost;
        $HumanTalentTc->provision_cost = $request->provision_cost;
        $HumanTalentTc->total_cost = $request->total_cost;
        $HumanTalentTc->net = $request->net;
        $HumanTalentTc->percent = $request->percent;
        $HumanTalentTc->campus = $request->campus;
        $HumanTalentTc->ambit_gen = $request->ambit_gen;
        $HumanTalentTc->ambit_esp = $request->ambit_esp;
        $HumanTalentTc->ambit_esp2 = $request->ambit_esp2;
        $HumanTalentTc->specialty = $request->specialty;
        $HumanTalentTc->position = $request->position;
        $HumanTalentTc->agreement = $request->agreement;
        $HumanTalentTc->direction = $request->direction;
        $HumanTalentTc->account_type = $request->account_type;
        $HumanTalentTc->nroaccount = $request->nroaccount;
        $HumanTalentTc->bank = $request->bank;
        $HumanTalentTc->codbank = $request->codbank;

        $HumanTalentTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Registros Talento Humano actualizados exitosamente',
            'data' => ['human_talent_tc' => $HumanTalentTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $HumanTalentTc = new HumanTalentTc;
            if(isset($item['MES'])){
                $HumanTalentTc->period = $item['MES'];
            } 
            if(isset($item['ESTADO'])){
                $HumanTalentTc->status = $item['ESTADO'];
            } 
            if(isset($item['TIPO DE CONTRATO'])){
                $HumanTalentTc->contract = $item['TIPO DE CONTRATO'];
            } 
            if(isset($item['NUMERO IDENTIFICACIÓN'])){
                $HumanTalentTc->nrodoc = $item['NUMERO IDENTIFICACIÓN'];
            } 
            if(isset($item['TIPO ID'])){
                $HumanTalentTc->typedoc = $item['TIPO ID'];
            } 
            if(isset($item['NOMBRES Y APELLIDOS'])){
                $HumanTalentTc->name = $item['NOMBRES Y APELLIDOS'];
            } 
            if(isset($item['COSTO DEVENGADO'])){
                $HumanTalentTc->accrued_cost = $item['COSTO DEVENGADO'];
            } 
            if(isset($item['COSTO EMPLEADOR'])){
                $HumanTalentTc->employer_cost = $item['COSTO EMPLEADOR'];
            }                   
            if(isset($item['COSTO PROVISIONES'])){
                $HumanTalentTc->provision_cost = $item['COSTO PROVISIONES'];
            }  
            if(isset($item['HONORARIOS'])){
                $HumanTalentTc->total_cost = $item['HONORARIOS'];
            }  
            if(isset($item['NETO A PAGAR'])){
                $HumanTalentTc->net = $item['NETO A PAGAR'];
            }  
            if(isset($item['P%'])){
                $HumanTalentTc->percent = $item['P%'];
            }  
            if(isset($item['SEDE'])){
                $HumanTalentTc->campus = $item['SEDE'];
            } 
            if(isset($item['AMBITO GENERAL'])){
                $HumanTalentTc->ambit_gen = $item['AMBITO GENERAL'];
            } 
             if(isset($item['AMBITO ESPECÍFICO'])){
                $HumanTalentTc->ambit_esp = $item['AMBITO ESPECÍFICO'];
            } 
            if(isset($item['AMBITO ESPECÍFICO 2'])){
                $HumanTalentTc->ambit_esp2 = $item['AMBITO ESPECÍFICO 2'];
            } 
            if(isset($item['ESPECIALIDAD'])){
                $HumanTalentTc->specialty = $item['ESPECIALIDAD'];
            } 
            if(isset($item['CARGO'])){
                $HumanTalentTc->position = $item['CARGO'];
            } 
            if(isset($item['CONVENIO'])){
                $HumanTalentTc->agreement = $item['CONVENIO'];
            } 
            if(isset($item['DIRECCION'])){
                $HumanTalentTc->direction = $item['DIRECCION'];
            } 
            if(isset($item['TIPO DE CUENTA'])){
                $HumanTalentTc->account_type = $item['TIPO DE CUENTA'];
            }                   
            if(isset($item['NUM CUENTA'])){
                $HumanTalentTc->nroaccount = $item['NUM CUENTA'];
            }  
            if(isset($item['BANCO'])){
                $HumanTalentTc->bank = $item['BANCO'];
            }  
            if(isset($item['CODIGOBANCO'])){
                $HumanTalentTc->codbank = $item['CODIGOBANCO'];
            } 
            $HumanTalentTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Registros Talento Humano actualizados exitosamente',
            'data' => ['human_talent_tc' => $HumanTalentTc]
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
            $HumanTalentTc = HumanTalentTc::find($id);
            $HumanTalentTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registros Talento Humano eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registros Talento Humano estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
