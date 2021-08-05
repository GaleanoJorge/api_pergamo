<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCompetitionRequest;
use Illuminate\Http\Request;
use App\Models\CompetitionCourse;

class CourseCompetitionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $coursecompetition = CompetitionCourse::orderBy('id');

        if ($request->_sort) {
            $coursecompetition->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $coursecompetition->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) === "false") {
            $coursecompetition = $coursecompetition->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $coursecompetition = $coursecompetition->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Competencias obtenidas exitosamente',
            'data' => ['competition' => $coursecompetition]
        ]);
    }

    /**
     * Display a lista de modulos por curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCompetitionByCourse(Request $request): JsonResponse
    {

        $coursecompetition = CompetitionCourse::with('competition');

        if ($request->_sort) {
            $coursecompetition->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $coursecompetition->where('course_id', $request->course_id);
        }

        if ($request->query("pagination", true) == "false") {
            $coursecompetition = $coursecompetition->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $coursecompetition = $coursecompetition->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Competencias por curso obtenidos exitosamente',
            'data' => ['competition' => $coursecompetition]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseCompetitionRequest $request
     * @return JsonResponse
     */
    public function store(CourseCompetitionRequest $request): JsonResponse
    {
        $coursecompetition = CompetitionCourse::where([
            ['course_id', $request->course_id],
            ['competition_id', $request->competition_id]
        ])->get();
        if (!$coursecompetition->count()) {
            $coursecompetition = new CompetitionCourse;
            $coursecompetition->course_id = $request->course_id;
            $coursecompetition->competition_id = $request->competition_id;
            $coursecompetition->save();

            return response()->json([
                'status' => true,
                'message' => 'Competencia asociada al curso exitosamente',
                'data' => ['courseCompetition' => $coursecompetition->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'La competencia ya estaba asociado al curso',
                'data' => ['courseCompetition' => $coursecompetition->toArray()]
            ]);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $coursecompetition = CompetitionCourse::find($id);
            $coursecompetition->delete();

            return response()->json([
                'status' => true,
                'message' => 'Competencia eliminada del curso exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La competencia está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
