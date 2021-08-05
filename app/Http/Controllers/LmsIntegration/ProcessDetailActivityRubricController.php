<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ProcessDetailActivityRubric;

class ProcessDetailActivityRubricController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $response = ProcessDetailActivityRubric::with('process_detail_activity.process_detail.user',
            'process_detail_activity.process_detail.process_detail_state',
            'rubric.activity_lms',
            'rubric');

        if ($request->process_d_a_id) {
            $response->where('process_d_a_id', $request->process_d_a_id);
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
            'message' => 'process_detail_activity_rubric obtenidos exitosamente',
            'data' => ['process_detail_activity_rubric' => $response]
        ]);
    }

    public function show($id)
    {
        $response = ProcessDetailActivityRubric::with('process_detail_activity.process_detail.user',
            'process_detail_activity.process_detail.process_detail_state',
            'rubric.activity_lms',
            'process_detail_activity.process_detail.process.process_type',
            'process_detail_activity.process_detail.process.process_details',
            'process_detail_activity.process_detail.process.user',
            'rubric')->where('id', $id)->first();

        return response()->json([
            'status' => true,
            'message' => 'process_detail_activity_rubric obtenidos exitosamente',
            'data' => ['process_detail_activity_rubric' => $response]
        ]);
    }
}
