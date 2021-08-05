<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\ProcessDetail;
use App\Models\ProcessDetailState;
use Illuminate\Http\Request;

class ProcessDetailEnrollController extends Controller
{
    public function show(Request $request)
    {
        $arr_ids = explode(",", $request->process_detail_ids);
        $response = ProcessDetail::with(
            'process_detail_type.process_details',
            'process_detail_state.process_details',
            'process.process_type',
            'process.user',
            'user',
            'group',
            'process.process_details');

        if ($request->process_detail_ids) {
            $response->whereIn('process_detail.id', $arr_ids);
        }

        if ($request->query("pagination", true) == "false") {
            $response = $response->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $response = $response->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'process_detail obtenidos exitosamente',
            'data' => ['process_detail' => $response]
        ]);
    }

    public function enroll(Request $request){
        $STATUS_CREATED = ProcessDetailState::STATUS_CREATED;
        $STATUS_UPDATED = ProcessDetailState::STATUS_UPDATED;
        $STATUS_ERROR = ProcessDetailState::STATUS_ERROR;

        $response = Process::query()->join(\DB::raw("(select process_detail.process_detail_type_id, process_id,
               group_concat(process_detail.id) as process_detail_ids,
                count(process_detail_type_id) as cantidad_tipos,
               sum(if(process_detail_state_id = {$STATUS_CREATED}, 1, 0)) as cantidad_creado,
               sum(if(process_detail_state_id = {$STATUS_UPDATED}, 1, 0)) as cantidad_actualizado,
               sum(if(process_detail_state_id = {$STATUS_ERROR}, 1, 0)) as cantidad_error
            from process_detail
            where process_detail_type_id between {$STATUS_CREATED} and {$STATUS_ERROR}
            group by process_detail_type_id, process_id) as enroll"), 'enroll.process_id', 'process.id')
        ->join('process_detail_type', 'process_detail_type.id', 'enroll.process_detail_type_id');

        if ($request->process_id) {
            $response->where('process.id', $request->process_id);
        }

        if ($request->query("pagination", true) == "false") {
            $response = $response->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $response = $response->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'process_detail_state obtenidos exitosamente',
            'data' => ['process_detail_state' => $response]
        ]);
    }

}
