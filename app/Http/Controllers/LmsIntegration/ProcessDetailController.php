<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ProcessDetail;

class ProcessDetailController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $process_detail = ProcessDetail::with('process.process_type',
            'process_detail_state',
            'group',
            'user',
            'process_detail_activities',
            'process',
            'process.user'
        );

        if ($request->process_id) {
            $process_detail->where('process_id', $request->process_id);
        }

        if ($request->query("pagination", true) == "false") {
            $process_detail = $process_detail->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $process_detail = $process_detail->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'process_detail obtenidos exitosamente',
            'data' => ['process_detail' => $process_detail]
        ]);
    }

    public function show($id)
    {
        $process_detail = ProcessDetail::with('process.process_type',
            'process_detail_state',
            'group',
            'user',
            'process_detail_activities',
            'process',
            'process.user'
        )
            ->where('id', $id)->first();

        return response()->json([
            'status' => true,
            'message' => 'process_detail obtenidos exitosamente',
            'data' => ['process_detail' => $process_detail]
        ]);
    }
}
