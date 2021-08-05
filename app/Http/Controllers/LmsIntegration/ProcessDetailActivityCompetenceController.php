<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use App\Models\ProcessDetailActivityCompetences;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProcessDetailActivityCompetenceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $response = ProcessDetailActivityCompetences::with('process_activity',
            'competition_activities',
            'process_activity.process_detail.process_detail_state',
            'process_activity.process_detail.user',
            'process_activity.activity_lms');

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
            'message' => 'process-details-activity-competence obtenidos exitosamente',
            'data' => ['process_details_activity_competence' => $response]
        ]);
    }

    public function show($id)
    {
        $response = ProcessDetailActivityCompetences::with('process_activity',
            'competition_activities',
            'process_activity.process_detail.process_detail_state',
            'process_activity.process_detail.user',
            'process_activity.process_detail.process.process_type',
            'process_activity.process_detail.process.process_details',
            'process_activity.process_detail.process.user',
            'process_activity.activity_lms')->where('id', $id)->first();

        return response()->json([
            'status' => true,
            'message' => 'process-details-activity-competence obtenidos exitosamente',
            'data' => ['process_details_activity_competence' => $response]
        ]);
    }
}
