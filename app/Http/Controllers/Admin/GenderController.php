<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gender;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $gender = Gender::orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Generos obtenidos exitosamente',
            'data' => ['gender' => $gender]
        ]);
    }
}
