<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ProcessDetailActivity;

class ProcessDetailActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $process_detail_activity = ProcessDetailActivity::with('process_detail.process_detail_type',
            'process_detail.process_detail_state',
            'process_detail.user',
            'activity_lms',
            'competences',
            'rubrics');

        if ($request->process_detail_id) {
            $process_detail_activity->where('process_detail_id', $request->process_detail_id);
        }

        if ($request->query("pagination", true) == "false") {
            $process_detail_activity = $process_detail_activity->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $process_detail_activity = $process_detail_activity->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'process_detail_activity obtenidos exitosamente',
            'data' => ['process_detail_activity' => $process_detail_activity]
        ]);
    }

    public function show($id)
    {
        $process_detail_activity = ProcessDetailActivity::with('process_detail.process_detail_type',
            'process_detail.process_detail_state',
            'process_detail.user',
            'activity_lms',
            'competences',
            'rubrics')
            ->where('id', $id)->first();


        return response()->json([
            'status' => true,
            'message' => 'process_detail_activity obtenidos exitosamente',
            'data' => ['process_detail_activity' => $process_detail_activity]
        ]);
    }
}
