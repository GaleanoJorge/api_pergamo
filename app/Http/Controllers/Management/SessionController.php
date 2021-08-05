<?php

namespace App\Http\Controllers\Management;

use Notifications;
use Exception;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the sessions
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $sessions = Session::select('*','start_time as start','closing_time as closing')->with('module', 'group', 'user_role_category_inscription');
        // ->select('session.*',
        //     \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        // )
        // ->Join('user_role_category_inscription', 'user_role_category_inscription.id', 'session.user_role_category_inscription_id')
        // ->Join('user_role', 'user_role.id', 'user_role_category_inscription.user_role_id')
        // ->Join('users', 'users.id', 'user_role.user_id');

        if ($request->_sort) {
            $sessions->orderBy($request->_sort, $request->_order);
        }

        // if ($request->search) {
        //     $sessions->where(function ($query) use ($request) {
        //         $query->where('name', 'like', '%' . $request->search . '%')
        //             ->orWhere('firstname', 'like', '%' . $request->search . '%')
        //             ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
        //             ->orWhere('lastname', 'like', '%' . $request->search . '%')
        //             ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
        //     });
        // }

        if ($request->module_id) {
            $sessions->where('module_id', $request->module_id);
        }
        if ($request->group_id) {
            $sessions->where('group_id', $request->group_id);
        }


        if ($request->query("pagination", true) == "false") {
            $sessions = $sessions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $sessions = $sessions->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Sesiones obtenidas exitosamente',
            'data' => ['sessions' => $sessions]
        ]);
    }

    public function getByTeacher(Request $request): JsonResponse
    {

        $sessions = Session::with('module', 'group')
            ->select(
                'session.*',
                \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
            )
            ->Join('session_inscriptions', 'session_inscriptions.session_id', 'session.id')
            ->Join('user_role_category_inscription', 'user_role_category_inscription.id', 'session_inscriptions.user_role_category_inscription_id')
            ->Join('user_role', 'user_role.id', 'user_role_category_inscription.user_role_id')
            ->Join('users', 'users.id', 'user_role.user_id')
            ->Join('module', 'module.id', 'session.module_id')
            ->where('users.id', Auth::user()->id);

        if ($request->search) {
            $sessions->where('session_date', 'like', '%' . $request->search . '%')
                ->orWhere('start_time', 'like', '%' . $request->search . '%')
                ->orWhere('closing_time', 'like', '%' . $request->search . '%')
                ->orWhere('module.name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $sessions = $sessions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $sessions = $sessions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Sesiones obtenidas exitosamente',
            'data' => ['sessions' => $sessions]
        ]);
    }

    public function getByGroup(Request $request, int $groupId): JsonResponse
    {

        $sessions = Session::with('module', 'group')
            // ->select('session.*',
            //     \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
            // )->Join('user_role_category_inscription', 'user_role_category_inscription.id', 'session.user_role_category_inscription_id')
            // ->Join('user_role', 'user_role.id', 'user_role_category_inscription.user_role_id')
            // ->Join('users', 'users.id', 'user_role.user_id')
            ->where('group_id', $groupId);
        if ($request->search) {
            $sessions->where(function ($query) use ($request) {
                $query->Where('session.start_time', 'like', '%' . $request->search . '%')
                    ->orWhere('session.closing_time', 'like', '%' . $request->search . '%')
                    ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('session.session_date', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->query("pagination", true) === "false") {
            $sessions = $sessions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $sessions = $sessions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Sesiones obtenidas exitosamente',
            'data' => ['sessions' => $sessions]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  SessionRequest $request
     * @return JsonResponse
     */

    public function store(SessionRequest $request): JsonResponse
    {
        $session = new Session;
        $session->name = $request->name;
        $session->module_id = $request->module_id;
        $session->group_id = $request->group_id;
        $session->session_date = $request->session_date;
        $session->start_time = $request->start_time;
        $session->closing_time = $request->closing_time;
        $session->teams_url = $request->teams_url;
        $session->description = $request->description;
        $session->save();

        $newTeachers = [];
        if (count($request->user_role_category_inscription) > 0) {
            $session->user_role_category()->sync($request->user_role_category_inscription);
            $session->refresh();
            $newTeachers = $session->user_role_category()->pluck('user_role_category_inscription_id')->toArray();
        }

        if (count($newTeachers) > 0) {
            foreach ($session->user_role_category as $item) {
                if (in_array($item->id, $newTeachers)) {
                    Notifications::sendNotification(
                        $item->user_role->user->email,
                        'mails.admittedTrainer',
                        'Se ha admitido como formador a la EJRLB',
                        [
                            'name' => $item->user_role->user->firstname . ' ' . $item->user_role->user->lastname,
                        ]
                    );
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Sesión creada exitosamente',
            'data' => ['session' => $session->toArray()]
        ]);
    }

    /**
     * Display the specified session.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $session = Session::with('module', 'group', 'group.course', 'user_role_category_inscription')
            ->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sesión obtenida exitosamente',
            'data' => ['session' => $session]
        ]);
    }


    /**
     * Get the session by module id
     *
     * @param integer $moduleId
     * @return JsonResponse
     */
    public function getByModule(int $moduleId): JsonResponse
    {
        $sessions = Session::where('module_id', $moduleId)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sesiones por modulo obtenidos exitosamente.',
            'data' => ['sessions' => $sessions]
        ]);
    }

    /**
     * Update the specified session in storage.
     *
     * @param  SessionRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SessionRequest $request, int $id): JsonResponse
    {
        $session = Session::find($id);
        $session->name = $request->name;
        $session->module_id = $request->module_id;
        $session->group_id = $request->group_id;
        $session->session_date = $request->session_date;
        $session->start_time = $request->start_time;
        $session->closing_time = $request->closing_time;
        $session->teams_url = $request->teams_url;
        $session->description = $request->description;
        $session->save();

        $validate = [];
        if (count($request->user_role_category_inscription) > 0) {
            $validate = $session->user_role_category()->pluck('user_role_category_inscription_id')->toArray();
            $session->user_role_category()->sync($request->user_role_category_inscription);
            $session->refresh();
            $newTeachers = $session->user_role_category()->pluck('user_role_category_inscription_id')->toArray();
            $validate = array_diff($newTeachers, $validate);
        }

        if (count($validate) > 0) {
            foreach ($session->user_role_category as $item) {
                if (in_array($item->id, $validate)) {
                    Notifications::sendNotification(
                        $item->user_role->user->email,
                        'mails.admittedTrainer',
                        'Se ha admitido como formador a la EJRLB',
                        [
                            'name' => $item->user_role->user->firstname . ' ' . $item->user_role->user->lastname,
                        ]
                    );
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Session actualizada exitosamente',
            'data' => ['session' => $session]
        ]);
    }

    /**
     * Remove the specified session from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $session = Session::find($id);
            $session->delete();

            return response()->json([
                'status' => true,
                'message' => 'Sesión eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La sesion esta en uso, no es posible eliminar'
            ], 423);
        }
    }

    public function assistanceDiaryCheck()
    {
        /* usuarios a los que se les envia el correo */
        $correos = User::select(
            \DB::raw('GROUP_CONCAT(users.email) AS mail_admins')
        )->join('user_role', 'user_role.user_id', 'users.id')
            ->where('user_role.role_id', 1)->first()->mail_admins;

        $sessions = Session::select(
            \DB::raw('COUNT(assistance_session.id) AS n_discentes_asistio'),
            'group.name AS grupo',
            'coursebase.name AS curso, course.id'
        )->join('group', 'group.id', 'session.group_id')
            ->join('course', 'course.id', 'group.course_id')
            ->join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->leftJoin('assistance_session', 'session.id', 'assistance_session.session_id')
            ->whereRaw('session.session_date = CURDATE()')
            ->groupBy('session.id')
            ->having('n_discentes_asistio', 0)->get()->toArray();

        foreach ($sessions as $curso) {
            // Notificación:
            try {
                Notifications::sendNotification(
                    $correos,
                    'mails.dailyClose',
                    'Cierre diario: campos de asistencia pendientes por diligenciar',
                    [
                        'name' => 'nombre del curso',
                        'group' => 'nombre del grupo',
                        'date' => 'fecha del evento'
                    ]
                );
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function assistanceCloseCheck()
    {
        /* usuarios a los que se les envia el correo */
        $correos = User::select(
            \DB::raw('GROUP_CONCAT(users.email) AS mail_admins')
        )->join('user_role', 'user_role.user_id', 'users.id')
            ->where('user_role.role_id', 1)->first()->mail_admins;

        $coursesClose = Session::select(
            'group.id AS group_id',
            'group.name AS grupo',
            \DB::raw('MAX(session.session_date) AS fecha_cierre'),
            \DB::raw('CONCAT_WS(" - ",course.id,coursebase.name) AS curso')
        )
            ->join('group', 'group.id', 'session.group_id')
            ->join('course', 'course.id', 'group.course_id')
            ->join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->groupBy('group.id')
            ->havingRaw('MAX(session.session_date) = CURDATE()')->get()->toArray();

        foreach ($coursesClose as $curso) {
            $sessions = Session::select(
                \DB::raw('COUNT(assistance_session.id) AS n_discentes_asistio')
            )
                ->leftJoin('assistance_session', 'session.id', 'assistance_session.session_id')
                ->where('session.group_id', $curso["group_id"])
                ->groupBy('session.id')
                ->having('n_discentes_asistio', 0)->get();

            if ($sessions->count() > 0) {
                // Notificación:
                try {
                    Notifications::sendNotification(
                        $correos,
                        'mails.closingEvent',
                        'Cierre evento: campos de asistencia pendientes por diligenciar',
                        [
                            'name' => 'nombre del curso',
                        ]
                    );
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        }
    }

    /**
     * Create QR Code.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function CreateQRCode(int $idSession, int $idURG): JsonResponse
    {
        $session = Session::select(
            'session.name as session_name',
            'users.email as users_email',
            'users.firstname as users_firstname',
            'users.middlefirstname as users_middlefirstname',
            'users.lastname as users_lastname',
            'users.middlelastname as users_middlelastname',
            'position.name as position',
            'session.session_date as date',
            'session.start_time as start',
            'session.closing_time as closing',
            'campus.name as campus'
        )->join('group', 'group.id', 'session.group_id')
            ->join('user_role_group', 'user_role_group.group_id', 'group.id')
            ->join('user_role', 'user_role.id', 'user_role_group.user_role_id')
            ->join('users', 'users.id', 'user_role.user_id')
            ->join('curriculum', 'curriculum.user_id', 'users.id')
            ->join('position', 'position.id', 'curriculum.position_id')
            ->join('course', 'course.id', 'group.course_id')
            ->join('campus', 'campus.id', 'course.campus_id')
            ->where([
                ['session.id', $idSession],
                ['user_role_group.id', $idURG]
            ])
            ->get()->toArray();

        if (count($session) == 0) {
            throw new Exception("El usuario o la sesión no existen", 423);
        }

        $urlQR = env('FRONT_URL') . "/public/register-assistance/" . $idSession . "/" . $idURG;
        $qr = \QrCode::format('png')->size(200)->generate($urlQR);
        $qrB64 = base64_encode($qr);

        try {
            Notifications::sendNotification(
                $session[0]["users_email"],
                'mails.qrCode',
                $session[0]["session_name"],
                [
                    'qr' => $qr,
                    'urlQR' => $urlQR,
                    'user_firstname' => $session[0]["users_firstname"] . ' ' . $session[0]["users_middlefirstname"],
                    'user_lastname' => $session[0]["users_lastname"] . ' ' . $session[0]["users_middlelastname"],
                    'session_name' => $session[0]["session_name"],
                    'position' => $session[0]["position"],
                    'campus' => $session[0]["campus"],
                    'date' => $session[0]["date"],
                    'start' => $session[0]["start"],
                    'closing' => $session[0]["closing"],
                ]
            );
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            'status' => true,
            'message' => 'QR generados y enviados exitosamente',
            'data' => ['session' => [
                'qr' => $qrB64,
                'urlQR' => $urlQR,
                'session_id' => $idSession,
                'urg_id' => $idURG
            ]]
        ]);
    }


    /**
     * Create QR Code.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function ShowSessionQRCode(int $idSession, int $idURG): JsonResponse
    {
        $session = Session::select(
            'session_date',
            'start_time',
            'closing_time',
            'session.name as session_name',
            'users.email as users_email',
            'users.firstname as users_firstname',
            'users.lastname as users_lastname',
            'group.name as group_name',
            'coursebase.name as course_name',
            'module.name as module_name'
        )->join('group', 'group.id', 'session.group_id')
            ->join('module', 'module.id', 'session.module_id')
            ->join('course', 'course.id', 'group.course_id')
            ->join('coursebase', 'coursebase.id', 'course.coursebase_id')
            ->join('user_role_group', 'user_role_group.group_id', 'group.id')
            ->join('user_role', 'user_role.id', 'user_role_group.user_role_id')
            ->join('users', 'users.id', 'user_role.user_id')
            ->where([
                ['session.id', $idSession],
                ['user_role_group.id', $idURG]
            ])
            ->get()->toArray();

        if (count($session) == 0) {
            throw new Exception("El usuario o la sesión no existen", 423);
        }

        $urlQR = env('FRONT_URL') . "/public/register-assistance/" . $idSession . "/" . $idURG;
        $qr = \QrCode::format('png')->size(200)->generate($urlQR);
        $qrB64 = base64_encode($qr);

        return response()->json([
            'status' => true,
            'message' => 'Sesión obtenida exitosamente',
            'data' => ['session' => [
                'urlQR' => $urlQR,
                'session' => $session[0],
                'qr' => $qrB64,
            ]]
        ]);
    }
}
