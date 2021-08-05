<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseModuleRequest;
use Illuminate\Http\Request;
use App\Models\CourseModule;

class CourseModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $courseModules = CourseModule::orderBy('id');

        if ($request->_sort) {
            $courseModules->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $courseModules->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) === "false") {
            $courseModules = $courseModules->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseModules = $courseModules->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Modulos por curso obtenidos exitosamente',
            'data' => ['modules' => $courseModules]
        ]);
    }

    /**
     * Display a lista de modulos por curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexModulesByCourse(Request $request): JsonResponse
    {

        $courseModules = CourseModule::with('module');

        if ($request->_sort) {
            $courseModules->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $courseModules->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) == "false") {
            $courseModules = $courseModules->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseModules = $courseModules->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Modulos por curso obtenidos exitosamente',
            'data' => ['modules' => $courseModules]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseModuleRequest $request
     * @return JsonResponse
     */
    public function store(CourseModuleRequest $request): JsonResponse
    {
        $courseModule = CourseModule::where([
            ['course_id', $request->course_id],
            ['module_id', $request->module_id]
        ])->get();
        if (!$courseModule->count()) {
            $courseModule = new CourseModule;
            $courseModule->course_id = $request->course_id;
            $courseModule->module_id = $request->module_id;
            $courseModule->save();

            return response()->json([
                'status' => true,
                'message' => 'Módulo asociado al curso exitosamente',
                'data' => ['courseModule' => $courseModule->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'El Módulo ya estaba asociado al curso',
                'data' => ['courseModule' => $courseModule->toArray()]
            ]);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $courseModule = CourseModule::find($id);
            $courseModule->delete();

            return response()->json([
                'status' => true,
                'message' => 'Módulo eliminado del curso exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Módulo está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
