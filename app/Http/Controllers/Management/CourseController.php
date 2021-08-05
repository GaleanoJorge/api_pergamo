<?php

namespace App\Http\Controllers\Management;

use Exception;
use App\Models\Course;
use App\Models\Group;
use App\Models\UserRole;
use App\Models\UserRoleCourse;
use App\Actions\Sync\SyncCourse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CourseSyncRequest;
use App\Models\Base\CourseEducationalInstitution;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Get the course by category id
     *
     * @param integer $categoryId
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $courses = Course::with('coursebase', 'status', 'category', 'entity_type', 'user', 'campus')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cursos obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    public function autocomplete(Request $request): JsonResponse
    {

        $statsFormadores = Group::select('group.course_id', 
                    \DB::raw('COUNT(DISTINCT session_inscriptions.user_role_category_inscription_id) AS number_trainers'))
                    ->join('session','session.group_id', 'group.id')
                    ->join('session_inscriptions','session_inscriptions.session_id', 'session.id')
                    ->groupBy('group.course_id');

        $courses = Course::select( 
            'course.id AS value',
            \DB::raw('CONCAT_WS(" - ",course.id,coursebase.name) AS label'),
            'course.origin_id', 'course.entity_type_id',
            'category.category_parent_id AS category_id',
            'categories_origin.id AS categories_origin_id',
            'course.start_date AS initial_date', 'course.finish_date AS final_date',
            'course.quota AS summoned_participants',
            'trainersByCourse.number_trainers'
        )
        ->join('coursebase', 'coursebase.id', 'course.coursebase_id')
        ->leftJoin('categories_origin', function ($join) {
            $join->on('course.category_id', '=', 'categories_origin.category_id');
            $join->on('course.origin_id', '=', 'categories_origin.origin_id');
        })
        ->leftJoin('category', 'categories_origin.category_id', 'category.id')
        ->leftJoinSub($statsFormadores,'trainersByCourse',function($join){
            $join->on('course.id','=', 'trainersByCourse.course_id');
        });

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        /*if ($request->municipality_id) {
            $courses->where('concept.municipality_id', $request->municipality_id);
        }

        if ($request->validity_id) {
            $courses->where('concept.validity_id', $request->validity_id);
        }

        if ($request->concept_type_id) {
            $courses->where('concept_base.concept_type_id', $request->concept_type_id);
        }*/

        if ($request->search) {
            $courses->where('coursebase.name', 'like', '%' . $request->search . '%')
                    ->orWhere('course.id', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $courses = $courses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courses = $courses->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }

    public function forInscription(Request $request): JsonResponse
    {
        $today = Carbon::today();
        $courses = Course::select(
            'course.*',
            'coursebase.name as curso',
            \DB::raw('CONCAT("Programa: ",category.name) AS programa'),
            'campus.name AS sede',
            'entity_type.name AS tipo',
        )->with(
            'category',
            'category.category',
        )
            ->join('coursebase', 'course.coursebase_id', 'coursebase.id')
            ->join('category', 'course.category_id', 'category.id')
            ->join('campus', 'course.campus_id', 'campus.id')
            ->where([
                ['course.start_date', '<=', $today],
                ['course.finish_date', '>=', $today]
            ])
            ->leftJoin('entity_type', 'entity_type.id', 'course.entity_type_id');

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses->where(function ($query) use ($request) {
                $query->where('coursebase.name', 'like', '%' . $request->search . '%')
                    ->orWhere('category.name', 'like', '%' . $request->search . '%')
                    ->orWhere('campus.name', 'like', '%' . $request->search . '%')
                    ->orWhere('entity_type.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $courses = $courses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courses = $courses->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }


    public function getByCategory(int $categoryId): JsonResponse
    {
        $courses = Course::where('category_id', $categoryId)
            ->with('coursebase')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cursos por Categoría obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Get the course by category id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getUserRole(int $courseId): JsonResponse
    {
        $userRoleCourse = UserRoleCourse::where('course_institution_cohort_id', $courseId)
            ->with('user_role.user', 'user_role.role', 'status', 'course')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuario Rol por Curso obtenidos exitosamente.',
            'data' => ['userRoleCourse' => $userRoleCourse]
        ]);
    }

    /**
     * Get the course by category id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getAllByUserRole(int $roleId): JsonResponse
    {
        $userRole = UserRole::where([
            ['user_id', Auth::user()->id],
            ['role_id', $roleId]
        ])->get();

        if (!$userRole->count()) {
            throw new Exception('No existe ese rol para el usuario autenticado', 423);
        }

        $userRoleId = $userRole->first()->id;

        $courses = Course::whereHas('user_roles', function ($userRole)
        use ($userRoleId) {
            $userRole->where('user_role_id', $userRoleId);
        })->with('educational_institutions', 'status', 'category')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cursos por Usuario Rol obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Sync course of connect
     *
     * @param CourseSyncRequest $request
     * @param SyncCourse $sync
     * @return JsonResponse
     */
    public function syncOfConnect(
        CourseSyncRequest $request,
        SyncCourse $sync
    ): JsonResponse {
        $sync->handle($request->id, $request->mac);

        return response()->json([
            'status' => true,
            'message' => 'Curso sincronizado exitosamente.',
        ]);
    }

    /**
     * Get the courses by educationalInstitution id
     *
     * @param integer $categoryId
     * @return JsonResponse
     */
    public function getByInstitution(int $institutionId): JsonResponse
    {
        $courses = CourseEducationalInstitution::where('educational_institution_id', $institutionId)
            ->with('course', 'educational_institution')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cursos por institución obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Get the course with competitions by id
     *
     * @param integer $categoryId
     * @return JsonResponse
     */
    public function getByIdWithCompetitions(int $courseId): JsonResponse
    {
        $courses = Course::where('id', $courseId)
            ->with('modules', 'modules.sessions', 'modules.sessions.activities', 'modules.sessions.activities.criteria', 'modules.sessions.activities.criteria.competition')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Curso por id con competencias obtenido exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Get the educational institution by course id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getEducationalInstitutionByCourseId(int $courseId): JsonResponse
    {
        $institutions = CourseEducationalInstitution::where('course_id', $courseId)
            ->with('course', 'educational_institution', 'educational_institution.municipality', 'educational_institution.municipality.region')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Instituciones educativas por curso obtenidos exitosamente.',
            'data' => ['institutions' => $institutions]
        ]);
    }

    /**
     * Get the course structure
     *
     * @return JsonResponse
     */
    public function GetCourseStructure(int $courseId): JsonResponse
    {
        $course = Course::where('id', $courseId)
            ->with('modules', 'modules.sessions', 'modules.sessions.activities')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Curso con su estructura obtenido exitosamente',
            'data' => ['course' => $course]
        ]);
    }

    /**
     * Get the group delivery
     *
     * @return JsonResponse
     */
    public function GetGroupDelivery(int $group): JsonResponse
    {
        $group = UserRoleCourse::where([
            ['course_institution_cohort_id', $group]
        ])->with(
            'user_role',
            'user_role.user',
            'user_role.user.deliveries',
            'user_role.user.deliveries.activity',
            'user_role.user.deliveries.scores',
            'user_role.user.deliveries.scores.criterion_activity_goal',
            'user_role.user.deliveries.scores.criterion_activity_goal.criterion',
            'user_role.user.deliveries.scores.criterion_activity_goal.goal'
        )->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo con las entregas obtenidas exitosamente',
            'data' => ['group' => $group]
        ]);
    }
}
