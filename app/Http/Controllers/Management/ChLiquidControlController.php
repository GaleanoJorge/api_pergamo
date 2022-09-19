<?php

namespace App\Http\Controllers\Management;

use App\Models\ChLiquidControl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChLiquidControlRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ChLiquidControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChLiquidControl = ChLiquidControl::select('ch_liquid_control.*');
        // ->with('nursing_care_plan');

        if ($request->_sort) {
            $ChLiquidControl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChLiquidControl->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChLiquidControl = $ChLiquidControl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChLiquidControl = $ChLiquidControl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Control de liquidos asociadas exitosamente',
            'data' => ['ch_liquid_control' => $ChLiquidControl]
        ]);
    }


    public function store(ChLiquidControlRequest $request)
    {

        $ChLiquidControl = new ChLiquidControl;
        $ChLiquidControl->clock = $request->clock;
        $ChLiquidControl->ch_route_fluid_id = $request->ch_route_fluid_id;
        $ChLiquidControl->ch_type_fluid_id = $request->ch_type_fluid_id;
        $ChLiquidControl->delivered_volume = $request->delivered_volume;
        $ChLiquidControl->specific_name = $request->specific_name;
        $ChLiquidControl->bag_number = $request->bag_number;
        $ChLiquidControl->type_record_id = $request->type_record_id;
        $ChLiquidControl->ch_record_id = $request->ch_record_id;
        $ChLiquidControl->save();


        return response()->json([
            'status' => true,
            'message' => 'Control de liquidos creados exitosamente',
            'data' => ['ch_liquid_control' => $ChLiquidControl->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id): JsonResponse
    {

        $ChLiquidControl = ChLiquidControl::select(
            // 'ch_liquid_control.id AS id_liquid',
            'ch_liquid_control.*',

            // 'ch_vital_signs.weight AS weight',
            DB::raw('CONCAT_WS(" ",ch_vital_signs.weight) AS weight'),
            )
            ->leftJoin('ch_vital_signs', 'ch_liquid_control.ch_record_id','=', 'ch_vital_signs.ch_record_id')
            ->where('ch_liquid_control.ch_record_id', $id)
            ->orderBy('clock', 'ASC')
            ->groupBy('ch_liquid_control.id')
            ->with(
                'ch_route_fluid',
                'ch_type_fluid',
                // 'signs'
            );


        if ($request->query("pagination", true) == "false") {
            $ChLiquidControl = $ChLiquidControl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChLiquidControl = $ChLiquidControl->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Control de liquidos obtenidos exitosamente',
            'data' => ['ch_liquid_control' => $ChLiquidControl]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChLiquidControl = ChLiquidControl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Controles de liquidos obtenidos exitosamente',
            'data' => ['ch_liquid_control' => $ChLiquidControl]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChLiquidControlRequest $request, int $id): JsonResponse
    {
        $LiquidControlArray = json_decode($request->care_plans);
        foreach ($LiquidControlArray as $item) {
            $ChLiquidControl = new ChLiquidControl;
            $ChLiquidControl->nursing_care_plan_id = $item;
            $ChLiquidControl->type_record_id = $request->type_record_id;
            $ChLiquidControl->ch_record_id = $request->ch_record_id;
            $ChLiquidControl->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Controles de liquidos actualizados exitosamente',
            'data' => ['ch_liquid_control' => $ChLiquidControl]
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
            $ChLiquidControl = ChLiquidControl::find($id);
            $ChLiquidControl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Control de liquidos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Control de liquidos no es posible eliminarlo'
            ], 423);
        }
    }
}
