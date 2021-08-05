<?php

namespace App\Http\Controllers\LmsIntegration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Process;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        //2->Enrolamiento
        //4->Calificaciones
        $process = Process::with('process_type', 'user')
        ->orderBy('id', 'desc');

        if ($request->process_type_id) {
            $process->where('process_type_id', $request->process_type_id);
        }

        if ($request->query("pagination", true) == "false") {
            $process = $process->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $process = $process->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'process obtenidos exitosamente',
            'data' => ['process' => $process]
        ]);
    }
    public function show ($id){
        $process = Process::with('process_type', 'user')
            ->where('id',$id)
            ->first();

        return response()->json([
            'status' => true,
            'message' => 'process obtenidos exitosamente',
            'data' => ['process' => $process]
        ]);
    }
}
