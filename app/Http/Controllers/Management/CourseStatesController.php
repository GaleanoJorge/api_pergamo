<?php

namespace App\Http\Controllers\Management;

use App\Models\CourseStates;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CourseTypeRequest;
use Illuminate\Database\QueryException;

class CourseStatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $types = CourseStates::orderBy('name');

        if ($request->search) {
            $types->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $types = $types->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $types = $types->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estado del curso obtenidos exitosamente',
            'data' => ['course_states' => $types]
        ]);
    }
}
