<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $goals = Goal::orderBy('name', 'asc')->with('unit')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Metas obtenidas exitosamente',
            'data' => ['goals' => $goals]
        ]);
    }
}
