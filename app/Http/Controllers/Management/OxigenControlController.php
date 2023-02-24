<?php

namespace App\Http\Controllers\Management;

use App\Models\OxigenControl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\AssistanceSupplies;
use App\Models\Authorization;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class OxigenControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $OxigenControl = OxigenControl::select();

        if ($request->_sort) {
            $OxigenControl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $OxigenControl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->oxigen_administration_way_id) {
            $OxigenControl->where('oxigen_control.oxigen_administration_way_id', $request->oxigen_administration_way_id);
        }

        if ($request->type_record_id) {
            $OxigenControl->where('oxigen_control.type_record_id', $request->type_record_id);
        }

        if ($request->ch_record_id) {
            $OxigenControl->where('oxigen_control.ch_record_id', $request->ch_record_id);
        }

        if ($request->query("pagination", true) == "false") {
            $OxigenControl = $OxigenControl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $OxigenControl = $OxigenControl->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Controles de oxígeno obtenidos exitosamente',
            'data' => ['oxigen_control' => $OxigenControl]
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
        $OxigenControl = OxigenControl::select('oxigen_control.*')
            ->leftJoin('ch_record', 'ch_record.id', 'oxigen_control.ch_record_id')
            ->with(
                'oxigen_administration_way',
                'ch_record',
            )
            ->where('ch_record.admissions_id', $chrecord->admissions_id)
            // ->where('oxigen_control.created_at', '>=', Carbon::now()->subDay())
            ->orderBy('oxigen_control.id', 'DESC')
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Controles de oxígeno obtenidos exitosamente',
            'data' => ['oxigen_control' => $OxigenControl]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $AssistanceSupplies = AssistanceSupplies::select('*')
            ->where('pharmacy_product_request_id',  $request->pharmacy_product_request_id)
            ->get()->first();

        $user_incharge_id = $AssistanceSupplies->user_incharge_id;
        
        if (!$AssistanceSupplies->ch_record_id) {
            $AssistanceSupplies->ch_record_id = $request->ch_record_id;
            $AssistanceSupplies->application_hour = Carbon::now();
            $AssistanceSupplies->supplies_status_id = 2;
            $AssistanceSupplies->save();
        } else {
            $AssistanceSupplies = new AssistanceSupplies;
            $AssistanceSupplies->ch_record_id = $request->ch_record_id;
            $AssistanceSupplies->application_hour = Carbon::now();
            $AssistanceSupplies->supplies_status_id = 2;
            $AssistanceSupplies->pharmacy_product_request_id = $request->pharmacy_product_request_id;
            $AssistanceSupplies->user_incharge_id = $user_incharge_id;
            $AssistanceSupplies->save();
        }

        $Authorization = new Authorization;
        $Authorization->services_briefcase_id = $request->services_briefcase_id;
        $Authorization->admissions_id = $request->admissions_id;
        $Authorization->quantity = $request->duration_minutes * $request->oxigen_flow;
        $Authorization->auth_status_id = 1;
        $Authorization->ch_interconsultation_id = $request->ch_interconsultation_id;
        $Authorization->product_com_id = $request->product_com_id;
        $Authorization->application_id = $AssistanceSupplies->id;
        $Authorization->save();

        $AssistanceSupplies->authorization_id = $Authorization->id;
        $AssistanceSupplies->save();

        $OxigenControl = new OxigenControl;
        $OxigenControl->oxigen_flow = $request->oxigen_flow;
        $OxigenControl->duration_minutes = $request->duration_minutes;
        $OxigenControl->oxigen_administration_way_id = $request->oxigen_administration_way_id;
        $OxigenControl->type_record_id = $request->type_record_id;
        $OxigenControl->ch_record_id = $request->ch_record_id;

        $OxigenControl->save();

        return response()->json([
            'status' => true,
            'message' => 'Controles de oxígeno creados exitosamente',
            'data' => ['oxigen_control' => $OxigenControl->toArray()]
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
        $OxigenControl = OxigenControl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Controles de oxígeno obtenidos exitosamente',
            'data' => ['oxigen_control' => $OxigenControl]
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
        $OxigenControl = OxigenControl::find($id);
        $OxigenControl->oxigen_flow = $request->oxigen_flow;
        $OxigenControl->duration_minutes = $request->duration_minutes;
        $OxigenControl->oxigen_administration_way_id = $request->oxigen_administration_way_id;
        $OxigenControl->type_record_id = $request->type_record_id;
        $OxigenControl->ch_record_id = $request->ch_record_id;

        $OxigenControl->save();

        return response()->json([
            'status' => true,
            'message' => 'Controles de oxígeno actualizados exitosamente',
            'data' => ['oxigen_control' => $OxigenControl]
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
            $OxigenControl = OxigenControl::find($id);
            $OxigenControl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Controles de oxígeno eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Controles de oxígeno estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
