<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $status = Status::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estados obtenidos exitosamente',
            'data' => ['status' => $status]
        ]);
    }
}
