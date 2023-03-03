<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Mockery\Undefined;

class BillingTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingTc = BillingTc::select();

        if ($request->_sort) {
            $BillingTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $BillingTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingTc = $BillingTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $BillingTc = $BillingTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Faturacion general obtenidos exitosamente',
            'data' => ['billing_tc' => $BillingTc]
        ]);
    }

    public function store(BillingTcRequest $request): JsonResponse
    {
        $BillingTc = new BillingTc;
        $BillingTc->consecutive = $request->consecutive;
        $BillingTc->date = $request->date;
        $BillingTc->made_by = $request->made_by;
        $BillingTc->value = $request->value;
        $BillingTc->entity = $request->entity;
        $BillingTc->branch_office = $request->branch_office;
        $BillingTc->procedures = $request->procedures;
        $BillingTc->doctor = $request->doctor;
        $BillingTc->details = $request->details;
        $BillingTc->period = $request->period;
        $BillingTc->consecutive2 = $request->consecutive2;
        $BillingTc->ambit = $request->ambit;
        $BillingTc->campus = $request->campus;
        $BillingTc->year = $request->year;

        $BillingTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Faturacion general creados exitosamente',
            'data' => ['billing_tc' => $BillingTc->toArray()]
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
        $BillingTc = BillingTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Faturacion general obtenidos exitosamente',
            'data' => ['billing_tc' => $BillingTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingTcRequest $request, int $id): JsonResponse
    {
        $BillingTc = BillingTc::find($id);
        $BillingTc->consecutive = $request->consecutive;
        $BillingTc->date = $request->date;
        $BillingTc->made_by = $request->made_by;
        $BillingTc->value = $request->value;
        $BillingTc->entity = $request->entity;
        $BillingTc->branch_office = $request->branch_office;
        $BillingTc->procedures = $request->procedures;
        $BillingTc->doctor = $request->doctor;
        $BillingTc->details = $request->details;
        $BillingTc->period = $request->period;
        $BillingTc->consecutive2 = $request->consecutive2;
        $BillingTc->ambit = $request->ambit;
        $BillingTc->campus = $request->campus;
        $BillingTc->year = $request->year;

        $BillingTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Faturacion general actualizados exitosamente',
            'data' => ['billing_tc' => $BillingTc]
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

            $BillingTc = new BillingTc;
            if(isset($item['CONSECUTIVO'])){
                $BillingTc->consecutive = $item['CONSECUTIVO'];
            } 
            if(isset($item['FECHA'])){
                $BillingTc->date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['FECHA']));
            } 
             if(isset($item['REALIZADA POR'])){
                $BillingTc->made_by = $item['REALIZADA POR'];
            } 
            if(isset($item['VALOR'])){
                $BillingTc->value = $item['VALOR'];
            } 
            if(isset($item['ENTIDAD'])){
                $BillingTc->entity = $item['ENTIDAD'];
            } 
            if(isset($item['SUCURSAL'])){
                $BillingTc->branch_office = $item['SUCURSAL'];
            } 
            if(isset($item['PROCEDIMIENTOS'])){
                $BillingTc->procedures = $item['PROCEDIMIENTOS'];
            } 
            if(isset($item['DOCTOR'])){
                $BillingTc->doctor = $item['DOCTOR'];
            } 
            if(isset($item['DETALLES'])){
                $BillingTc->details = $item['DETALLES'];
            }                   
            if(isset($item['PERIODO'])){
                $BillingTc->period = $item['PERIODO'];
            }  
            if(isset($item['CONSECUTIVO2'])){
                $BillingTc->consecutive2 = $item['CONSECUTIVO2'];
            }  
            if(isset($item['AMBITO'])){
                $BillingTc->ambit = $item['AMBITO'];
            }  
            if(isset($item['SEDE'])){
                $BillingTc->campus = $item['SEDE'];
            }
            if(isset($item['AÑO'])){
                $BillingTc->year = $item['AÑO'];
            }  
            $BillingTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Faturacion general actualizados exitosamente',
            'data' => ['billing_tc' => $BillingTc]
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
            $BillingTc = BillingTc::find($id);
            $BillingTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Faturacion general eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Faturacion general estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
