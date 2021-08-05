<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRoleCourse;
use App\Models\UserRoleGroup;
use App\Models\Course;
use App\Models\UserRole;
use Notifications;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRoleCourseRequest;
use FontLib\Table\Type\name;

class UserRoleCourseController extends Controller
{
    /**
     * Lista de inscripciones por curso y/o por su estado
     * @return JsonResponse
     */
    public function indexInscriptions(Request $request): JsonResponse
    {
        $assignments = UserRoleGroup::select(
            'user_role_group.user_role_id',
            'group.course_id',
            'user_role_group.id AS user_role_group_id',
            'group.name AS group',
            'group.id AS group_id'
        )
            ->Join('group', 'group.id', 'user_role_group.group_id');

        $users = UserRole::with('courses')
            ->select(
                'users.email',
                'user_role.id',
                'users.identification',
                \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
                'specialty.name AS specialty',
                'municipality.name AS municipality',
                'entity.name AS entity',
                'position.name AS position',
                'assignments.user_role_group_id',
                'assignments.group',
                'assignments.group_id'
            )->Join('users', 'users.id', 'user_role.user_id')
            ->Join('user_role_course', 'user_role.id', 'user_role_course.user_role_id')
            ->leftJoin('curriculum', 'users.id', 'curriculum.user_id')
            ->leftJoin('specialty', 'specialty.id', 'curriculum.specialty_id')
            ->leftJoin('municipality', 'municipality.id', 'curriculum.municipality_id')
            ->leftJoin('entity', 'entity.id', 'curriculum.entity_id')
            ->leftJoin('position', 'position.id', 'curriculum.position_id')
            //->leftJoin('group', 'user_role_course.course_id', 'group.course_id')
            ->leftJoinSub($assignments, 'assignments', function ($join) {
                $join->on('user_role.id', '=', 'assignments.user_role_id')
                    ->on('user_role_course.course_id', '=', 'assignments.course_id');
            })->where([
                ['user_role.role_id', 5],
                ['curriculum.inactive', 0],
            ]);

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $users->where('user_role_course.course_id', $request->course_id);
        }

        if ($request->inscription_status_id) {
            if ($request->inscription_status_id == "pendientes") {
                $users->whereNull('user_role_course.inscription_status_id');
            } else {
                $users->where('user_role_course.inscription_status_id', $request->inscription_status_id);
            }
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('specialty.name', 'like', '%' . $request->search . '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%')
                    ->orWhere('entity.name', 'like', '%' . $request->search . '%')
                    ->orWhere('position.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $users = $users->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $users = $users->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['users' => $users]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index2(Request $request, int $inscriptionstatusId = null): JsonResponse
    {
        $assignments = UserRoleGroup::select(
            'user_role_group.user_role_id',
            'group.course_id',
            'user_role_group.id AS user_role_group_id',
            'group.name AS group',
            'group.id AS group_id'
        )
            ->Join('group', 'group.id', 'user_role_group.group_id');

        $users = UserRole::with('courses')
            ->select(
                'users.email',
                'user_role.id',
                'users.identification',
                \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
                'specialty.name AS specialty',
                'municipality.name AS municipality',
                'entity.name AS entity',
                'position.name AS position',
                'assignments.user_role_group_id',
                'assignments.group',
                'assignments.group_id'
            )->Join('users', 'users.id', 'user_role.user_id')
            ->Join('user_role_course', 'user_role.id', 'user_role_course.user_role_id')
            ->leftJoin('curriculum', 'users.id', 'curriculum.user_id')
            ->leftJoin('specialty', 'specialty.id', 'curriculum.specialty_id')
            ->leftJoin('municipality', 'municipality.id', 'curriculum.municipality_id')
            ->leftJoin('entity', 'entity.id', 'curriculum.entity_id')
            ->leftJoin('position', 'position.id', 'curriculum.position_id')
            //->leftJoin('group', 'user_role_course.course_id', 'group.course_id')
            ->leftJoinSub($assignments, 'assignments', function ($join) {
                $join->on('user_role.id', '=', 'assignments.user_role_id')
                    ->on('user_role_course.course_id', '=', 'assignments.course_id');
            })->where('user_role.role_id', 5);

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($inscriptionstatusId > 0) {
            $users = $users->where('user_role_course.inscription_status_id', $inscriptionstatusId);
        }

        if ($request->course_id) {
            $users->where('user_role_course.course_id', $request->course_id);
        }

        if ($request->inscription_status_id) {
            if ($request->inscription_status_id == "pendientes") {
                $users->whereNull('user_role_course.inscription_status_id');
            } else {
                $users->where('user_role_course.inscription_status_id', $request->inscription_status_id);
            }
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('specialty.name', 'like', '%' . $request->search . '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%')
                    ->orWhere('entity.name', 'like', '%' . $request->search . '%')
                    ->orWhere('position.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $users = $users->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $users = $users->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['users' => $users]
        ]);
    }

    /* Actualizar estado de la inscripcion de un discente y asignacion del grupo */
    public function update(UserRoleCourseRequest $request, int $id): JsonResponse
    {
        $inscription = UserRoleCourse::find($id);
        $inscription->user_role_id = $request->user_role_id;
        $inscription->course_id = $request->course_id;
        $inscription->inscription_status_id = (@$request->inscription_status_id) ? @$request->inscription_status_id : NULL;
        $inscription->observation = (@$request->observation) ? @$request->observation : NULL;
        $inscription->save();
        if ($request->inscription_status_id == 1) {
            $course = Course::select('coursebase.name')
                ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
                ->where('course.id', $request->course_id)->get();
           $user = UserRoleCourse::select('users.firstname','users.middlefirstname','users.lastname','users.middlelastname')
                ->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
                ->Join('users', 'users.id', 'user_role.user_id')
                ->where('user_role.id', $request->user_role_id)->get()->first();
            $curso = json_decode($course);
            $user = json_decode($user);
            // Notificación:
            $shippingConfirmation = Notifications::sendNotification(
                $request->email,
                'mails.studentAdmission',
                'Proceso de Admisión Escuela Judicial Rodrigo Lara Bonilla',
                [
                    'name' => $user->firstname.' '.$user->middlefirstname.' '.$user->lastname.' '.$user->middlelastname,
                    'curso' => $curso[0]->name,
                    'host' => env('FRONT_URL')

                ]
            );
        } else if ($request->inscription_status_id == 2) {
            $shippingConfirmation = Notifications::sendNotification(
                $request->email,
                'mails.studentNotAdmitted',
                'Proceso de Admisión Escuela Judicial Rodrigo Lara Bonilla',
                [

                    'name' => $request->name

                ]
            );
        }

        if ($request->group_id) {
            if ($request->user_role_group_id) {
                $urg = UserRoleGroup::find($request->user_role_group_id);
            } else {
                $urg = new UserRoleGroup;
            }
            $urg->user_role_id = $request->user_role_id;
            $urg->group_id = $request->group_id;
            $urg->status_id = 1;
            $urg->save();
            $inscription->user_role_group_id = $urg->id;
        }


        return response()->json([
            'status' => true,
            'message' => 'Inscripción actualizada exitosamente',
            'data' => ['inscription' => $inscription]
        ]);
    }

    /**
     * Lista de cursos a los que se ha registrado un usuario
     *
     * @return JsonResponse
     */
    public function indexByUser(Request $request): JsonResponse
    {
        $assignments = UserRoleGroup::select(
            'user_role_group.user_role_id',
            'group.course_id',
            'user_role_group.id AS user_role_group_id',
            'group.name AS group',
            'group.id AS group_id'
        )
            ->Join('group', 'group.id', 'user_role_group.group_id')
            ->Join('user_role', 'user_role.id', 'user_role_group.user_role_id')
            ->where('user_role.user_id', Auth::user()->id);

        $courses = Course::select(
            'course.id',
            'course.entity_type_id',
            'entity_type.name AS entity_type_name',
            'coursebase.name AS course',
            'user_role_course.user_role_id',
            'user_role_course.id',
            'user_role_course.course_id as course_id',
            'inscription_status.name AS status',
            'inscription_status.created_at',
            'assignments.group',
            'assignments.group_id',
            'campus.name AS campus'
        )
            ->Join('user_role_course', 'course.id', 'user_role_course.course_id')
            ->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
            ->Join('campus', 'campus.id', 'course.campus_id')
            ->Join('entity_type', 'entity_type.id', 'course.entity_type_id')
            ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->leftJoin('inscription_status', 'inscription_status.id', 'user_role_course.inscription_status_id')
            //->leftJoin('group', 'course.id', 'group.course_id')
            ->leftJoinSub($assignments, 'assignments', function ($join) {
                $join->on('user_role.id', '=', 'assignments.user_role_id')
                    ->on('user_role_course.course_id', '=', 'assignments.course_id');
            })->where('user_role.user_id', Auth::user()->id);

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses->where(function ($query) use ($request) {
                $query->Where('inscription_status.name', 'like', '%' . $request->search . '%')
                    ->orWhere('campus.name', 'like', '%' . $request->search . '%')
                    ->orWhere('coursebase.name', 'like', '%' . $request->search . '%');
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
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }

    public function statsInscriptionsByStatus(Request $request): JsonResponse
    {
        $courses = Course::select(
            'course.id',
            'course.finish_date',
            'campus.name AS campus',
            \DB::raw('CONCAT_WS(": ",entity_type.name,coursebase.name) AS course'),
            'category.name AS program'
        )
            ->Join('campus', 'campus.id', 'course.campus_id')
            ->Join('category', 'category.id', 'course.category_id')
            ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->leftJoin('entity_type', 'entity_type.id', 'course.entity_type_id')
            ->with(['stats' => function ($query) {
                $query->select(
                    'user_role_course.course_id',
                    'user_role_course.inscription_status_id',
                    \DB::raw('COALESCE(inscription_status.name,"Pendiente") AS status'),
                    \DB::raw('COUNT(user_role_course.id) AS cant')
                )
                    ->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
                    ->leftJoin('inscription_status', 'inscription_status.id', 'user_role_course.inscription_status_id')
                    ->where('user_role.role_id', 5)
                    ->groupBy('user_role_course.course_id', 'status');
            }]);

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses->where(function ($query) use ($request) {
                $query->Where('campus.name', 'like', '%' . $request->search . '%')
                    ->orWhere('coursebase.name', 'like', '%' . $request->search . '%')
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
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }

    public function statsInscriptionsByFilter(Request $request, int $validityId = null,int $originId = null,int $categoryId = null): JsonResponse
    {
        $courses = Course::select(
            'course.id',
            'course.finish_date',
            'campus.name AS campus',
            \DB::raw('CONCAT_WS(": ",entity_type.name,coursebase.name) AS course'),
            'category.name AS program'
        )
            ->Join('campus', 'campus.id', 'course.campus_id')
            ->Join('category', 'category.id', 'course.category_id')
            ->Join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->leftJoin('entity_type', 'entity_type.id', 'course.entity_type_id')
            ->with(['stats' => function ($query) {
                $query->select(
                    'user_role_course.course_id',
                    'user_role_course.inscription_status_id',
                    \DB::raw('COALESCE(inscription_status.name,"Pendiente") AS status'),
                    \DB::raw('COUNT(user_role_course.id) AS cant')
                )
                    ->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
                    ->leftJoin('inscription_status', 'inscription_status.id', 'user_role_course.inscription_status_id')
                    ->where('user_role.role_id', 5)
                    ->groupBy('user_role_course.course_id', 'status');
            }]);

            if ($validityId > 0 && $validityId!=null) {
                $courses->Join('origin', 'origin.id', 'origin_id');
                $courses = $courses->where('origin.validity_id', $validityId);    
            }
            if ($originId > 0 && $originId!=null) {
                $courses = $courses->where('origin_id', $originId);
            }
            if ($categoryId > 0 && $categoryId!=null) {
                $courses = $courses->where('course.category_id', $categoryId);
            }

        if ($request->_sort) {
            $courses->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $courses->where(function ($query) use ($request) {
                $query->Where('campus.name', 'like', '%' . $request->search . '%')
                    ->orWhere('coursebase.name', 'like', '%' . $request->search . '%')
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
            'message' => 'Cursos obtenidos exitosamente',
            'data' => ['courses' => $courses]
        ]);
    }
    /**
     * numero de usuarios por vigencia, plan, programa o curso
     * @return JsonResponse
     */
    public function countPoblationAcademic(Request $request): JsonResponse
    {
        $users = UserRoleCourse::select(
            \DB::raw('COUNT(DISTINCT user_role_course.id) AS n_users')
        )
            ->Join('user_role', 'user_role.id', 'user_role_course.user_role_id')
            ->Join('course', 'course.id', 'user_role_course.course_id')
            ->Join('category', 'category.id', 'course.category_id')
            ->Join('categories_origin', 'category.id', 'categories_origin.category_id')
            ->Join('origin', 'origin.id', 'categories_origin.origin_id')
            ->Join('validity', 'validity.id', 'origin.validity_id')
            ->where('user_role_course.inscription_status_id', '<>', 2);

        if ($request->validity_id) {
            $users->where('origin.validity_id', $request->validity_id);
        }

        if ($request->origin_id) {
            $users->where('categories_origin.origin_id', $request->origin_id);
        }

        if ($request->category_id) {
            $users->where('course.category_id', $request->category_id);
        }

        if ($request->course_id) {
            /*$users->Join('group', 'course.id', 'group.course_id');
            $users->Join('user_role_group', function ($join) {
                $join->on('user_role.id', '=', 'user_role_group.user_role_id');
                $join->on('user_role_group.group_id', '=', 'group.id');
            });
            $users->Join('assistance_session', 'assistance_session.user_role_group_id', 'user_role_group.id');
            $users->whereNotNull('start_time');*/
            /* SOLO ASISTENTES hyoG quite esta parte de arriba si desea contar todos los del curso */
            $users->where('user_role_course.course_id', $request->course_id);
        }

        $n_users = $users->first()->n_users;

        return response()->json([
            'status' => true,
            'message' => $n_users . ' usuarios encontrados',
            'data' => ['users' => $n_users]
        ]);
    }
}
