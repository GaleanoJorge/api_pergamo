<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use App\Models\CompetitionActivity;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompetitionActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $response = CompetitionActivity::with('activity',
            'competition',
            'process_detail_activity_competence.process_activity.process_detail.process_detail_state',
            'process_detail_activity_competence.process_activity.process_detail.user',
            'activity.rubrics.activity');

        if ($request->process_d_a_c_id) {
            $response->where('process_d_a_c_id', $request->process_d_a_c_id);
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
            'message' => 'competition_activity obtenidos exitosamente',
            'data' => ['competition_activity' => $response]
        ]);
    }

    public function byCourse($id)
    {
        $competition_activity = CompetitionActivity::with(['activity' => function ($q) use ($id) {
            $q->where('course_id', $id);
        },
            'competition',
            'process_detail_activity_competence.process_activity.process_detail.process_detail_state',
            'process_detail_activity_competence.process_activity.process_detail.process',
            'process_detail_activity_competence.process_activity.process_detail.process.user',
            'process_detail_activity_competence.process_activity.process_detail.user',
            'activity.rubrics.activity'])
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registros obtenidos exitosamente',
            'data' => $competition_activity
        ]);
    }

    public function show($id)
    {
        $response = CompetitionActivity::with('activity',
            'competition',
            'process_detail_activity_competence.process_activity.process_detail.process_detail_state',
            'process_detail_activity_competence.process_activity.process_detail.user',
            'process_detail_activity_competence.process_activity.process_detail.process.process_type',
            'process_detail_activity_competence.process_activity.process_detail.process.process_details',
            'process_detail_activity_competence.process_activity.process_detail.process.user',
            'activity.rubrics.activity')->where('id', $id)->first();

        return response()->json([
            'status' => true,
            'message' => 'competition_activity obtenidos exitosamente',
            'data' => ['competition_activity' => $response]
        ]);
    }
}
