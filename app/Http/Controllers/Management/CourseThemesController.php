<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseThemesRequest;
use Illuminate\Http\Request;
use App\Models\CourseThemes;

class CourseThemesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $courseThemes = CourseThemes::orderBy('id');

        if ($request->_sort) {
            $courseThemes->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $courseThemes->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) === "false") {
            $courseThemes = $courseThemes->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseThemes = $courseThemes->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Temas por curso obtenidos exitosamente',
            'data' => ['themes' => $courseThemes]
        ]);
    }

    /**
     * Display a lista de modulos por curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexThemesByCourse(Request $request): JsonResponse
    {

        $courseThemes = CourseThemes::with('themes');

        if ($request->_sort) {
            $courseThemes->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $courseThemes->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) == "false") {
            $courseThemes = $courseThemes->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseThemes = $courseThemes->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Temas por curso obtenidos exitosamente',
            'data' => ['themes' => $courseThemes]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseThemesRequest $request
     * @return JsonResponse
     */
    public function store(CourseThemesRequest $request): JsonResponse
    {
        $courseThemes = CourseThemes::where([
            ['course_id', $request->course_id],
            ['themes_id', $request->themes_id]
        ])->get();
        if (!$courseThemes->count()) {
            $courseThemes = new CourseThemes;
            $courseThemes->course_id = $request->course_id;
            $courseThemes->themes_id = $request->themes_id;
            $courseThemes->save();

            return response()->json([
                'status' => true,
                'message' => 'Tema asociado al curso exitosamente',
                'data' => ['courseThemes' => $courseThemes->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'El Tema ya estaba asociado al curso',
                'data' => ['courseThemes' => $courseThemes->toArray()]
            ]);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $courseThemes = CourseThemes::find($id);
            $courseThemes->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tema eliminado del curso exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Tema está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
