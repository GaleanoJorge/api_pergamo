<?php

namespace App\Http\Controllers\Admin;

use App\Models\IdentificationType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class IdentificationTypeController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $identificationType = IdentificationType::orderBy('name', 'asc')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de identificación obtenidos exitosamente',
            'data' => ['identificationType' => $identificationType]
        ]);
    }
}
