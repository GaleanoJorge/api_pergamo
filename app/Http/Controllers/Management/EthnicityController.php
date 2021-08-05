<?php

namespace App\Http\Controllers\Management;

use App\Models\Ethnicity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class EthnicityController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $ethnicity = Ethnicity::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Etnias obtenidas exitosamente',
            'data' => ['ethnicity' => $ethnicity]
        ]);
    }
}
