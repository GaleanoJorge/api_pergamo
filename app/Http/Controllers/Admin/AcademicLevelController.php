<?php

namespace App\Http\Controllers\Admin;


use App\Models\AcademicLevel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $academicLevel = AcademicLevel::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nivel académico obtenidos exitosamente',
            'data' => ['academicLevel' => $academicLevel]
        ]);
    }
}
