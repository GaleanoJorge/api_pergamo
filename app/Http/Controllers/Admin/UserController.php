<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Helpers\Notifications\Notifications;
use App\Models\User;
use App\Models\UserCampus;
use App\Models\Inability;
use App\Models\UserRole;
use App\Models\ContractType;
use App\Models\HumanTalentRequest;
use App\Models\Assistance;
use App\Models\Role;
use App\Models\UserUser;
use App\Models\Curriculum;
use App\Models\InstalledCapacity;
use App\Models\StudyLevelStatus;
use App\Models\Activities;
use App\Models\LocationCapacity;
use App\Models\SelectRh;
use App\Models\PopulationGroup;
use App\Models\MaritalStatus;

use App\Models\UserRoleGroup;
use App\Models\Group;
use App\Models\Entity;
use App\Models\AcademicLevel;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Ethnicity;
use App\Models\IdentificationType;
use App\Models\Position;
use App\Models\Status;
use App\Models\Office;
use App\Models\Dependence;
use App\Models\SectionalCouncil;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Actions\Sync\SyncStudent;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\UserParentRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\StudentSyncRequest;
use App\Http\Requests\ForceResetPasswordRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FindEmailRequest;
use App\Models\AssistanceSpecial;
use App\Models\Base\Campus;
use App\Models\BaseLocationCapacity;
use App\Models\CostCenter;
use App\Models\Specialty;
use App\Models\TypeProfessional;
use App\Models\Residence;
use App\Models\ObservationNovelty;
use App\Models\UserChange;
use Beta\Microsoft\Graph\Model\Currency;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\ManagementPlan;
use App\Models\RoleAttention;
use App\Models\TalentHumanLog;
use Mockery\Undefined;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexByRole(Request $request, int $roleId): JsonResponse
    {

        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            // ->leftjoin('admissions', 'users.id', 'admissions.user_id')

            ->where('user_role.role_id', $roleId)
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'user_role',
                'user_role.role',
                // 'admissions',
                // 'admissions.location',
                // 'admissions.contract',
                // 'admissions.campus',
                // 'admissions.location.admission_route',
                // 'admissions.location.scope_of_attention',
                // 'admissions.location.program',
                // 'admissions.location.flat',
                // 'admissions.location.pavilion',
                // 'admissions.location.bed'
            )->orderBy('nombre_completo', 'DESC')->groupBy('id');

        if ($request->locality_id) {
            $users->where('', $request->locality_id);
        }

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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
    public function ProfesionalsByCampus(Request $request): JsonResponse
    {

        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            // ->leftjoin('admissions', 'users.id', 'admissions.user_id')

            ->orwhere('user_role.role_id', 3)
            ->orwhere('user_role.role_id', 7)
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'user_role',
                'user_role.role',
                // 'admissions',
                // 'admissions.location',
                // 'admissions.contract',
                // 'admissions.campus',
                // 'admissions.location.admission_route',
                // 'admissions.location.scope_of_attention',
                // 'admissions.location.program',
                // 'admissions.location.flat',
                // 'admissions.location.pavilion',
                // 'admissions.location.bed'
            )
            // ->orderBy('admissions.entry_date', 'DESC')->groupBy('id')
        ;



        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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

    public function indexPacientByAdmission(Request $request, int $roleId): JsonResponse
    {

        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            ->leftjoin('admissions', 'users.id', 'admissions.user_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')

            ->where('user_role.role_id', $roleId)
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'user_role',
                'user_role.role',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');



        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->admission_route_id) {
            $users->where('location.admission_route_id', $request->admission_route_id);
        } else {
            $users->where('location.admission_route_id', 2);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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
    public function indexByRoleLocation(int $locality, int $phone_consult, Request $request): JsonResponse
    {
        $roles = json_decode($request->roles);

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $users = User::select(
            'assistance.id AS assistance_id',
            'users.id'
        )
            ->leftJoin('user_role', 'users.id', 'user_role.user_id')
            ->leftJoin('assistance', 'users.id', 'assistance.user_id')
            ->leftJoin('assistance_special', 'assistance_special.assistance_id', 'assistance.id')
            ->where('users.status_id', 1)
            ->groupBy('users.id');

        $users->where(function ($query) use ($request, $roles) {
            $first = true;
            foreach ($roles as $role) {
                if ($role->role_id == 14) {
                    $specialty = RoleAttention::select()->where('role_id', $role->role_id)->where('type_of_attention_id',  $request->type_of_attention)->get()->first();
                    $query->where('assistance_special.specialty_id', $specialty->specialty_id);
                } else {
                    if ($first) {
                        $query->where('user_role.role_id', $role->role_id);
                        $first = false;
                    } else {
                        $query->orWhere('user_role.role_id', $role->role_id);
                    }
                }
            }
        });

        $users = $users->get()->toArray();

        $validacion = $locality != null;
        $respose = array();
        if ($validacion) {
            if (count($users) > 0) {
                foreach ($users as $key => $row) {
                    if ($phone_consult == 1) {
                        $localityArr = LocationCapacity::select('locality_id')->where('assistance_id', $row['assistance_id'])->whereBetween('validation_date', [$startDate, $endDate])
                            ->where('locality_id', '!=', null)
                            ->where('PAD_patient_actual_capacity', '>', 0)->get()->toArray();
                        $pila = array();
                        foreach ($localityArr as $key => $row2) {
                            array_push($pila, $row2['locality_id']);
                        }
                        if (in_array($locality, $pila)) {
                            $usersfinal = User::select(
                                'users.*',
                                'assistance.id AS assistance_id',
                                DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
                            )->Join('user_role', 'users.id', 'user_role.user_id')
                                ->Join('assistance', 'users.id', 'assistance.user_id');
                            // ->leftjoin('admissions', 'users.id', 'admissions.user_id');
                            $first = true;
                            foreach ($roles as $role) {
                                if ($first) {
                                    $usersfinal->where('user_role.role_id', $role->role_id);
                                    $first = false;
                                } else {
                                    $usersfinal->orWhere('user_role.role_id', $role->role_id);
                                }
                            }
                            $usersfinal->where('users.id', $row['id'])
                                ->with(
                                    'status',
                                    'gender',
                                    'academic_level',
                                    'identification_type',
                                    'user_role',
                                    'user_role.role',
                                    'assistance'
                                )->orderBy('nombre_completo', 'DESC')->groupBy('id');

                            $usersfinal = $usersfinal->get()->toArray();
                        } else {
                            $usersfinal = array();
                        }
                    } else {
                        $localityArr = LocationCapacity::select('phone_consult')->where('assistance_id', $row['assistance_id'])->whereBetween('validation_date', [$startDate, $endDate])
                            ->whereNull('locality_id')
                            ->where('PAD_patient_actual_capacity', '>', 0)->get()->toArray();
                        if ($localityArr) {
                            $usersfinal = User::select(
                                'users.*',
                                'assistance.id AS assistance_id',
                                DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
                            )->Join('user_role', 'users.id', 'user_role.user_id')
                                ->Join('assistance', 'users.id', 'assistance.user_id');
                            // ->leftjoin('admissions', 'users.id', 'admissions.user_id');
                            $first = true;
                            foreach ($roles as $role) {
                                if ($first) {
                                    $usersfinal->where('user_role.role_id', $role->role_id);
                                    $first = false;
                                } else {
                                    $usersfinal->orWhere('user_role.role_id', $role->role_id);
                                }
                            }
                            $usersfinal->where('users.id', $row['id'])
                                ->with(
                                    'status',
                                    'gender',
                                    'academic_level',
                                    'identification_type',
                                    'user_role',
                                    'user_role.role',
                                    'assistance'
                                )->orderBy('nombre_completo', 'DESC')->groupBy('id');

                            $usersfinal = $usersfinal->get()->toArray();
                        } else {
                            $usersfinal = array();
                        }
                    }
                    if (count($usersfinal) > 0) {
                        array_push($respose, $usersfinal[0]);
                    }
                }
            } else {
                $usersfinal = array();
            }
        }


        if (count($respose) == 0) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontró personal asistencial',
                'data' => ['users' => $usersfinal]
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios por locación obtenidos exitosamente',
            'data' => ['users' => $respose]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexPacientByPAD(Request $request, int $roleId, int $userId): JsonResponse
    {

        $users = User::select(
            'users.*',
            'admissions.id AS admissions_id',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            ->leftjoin('admissions', 'users.id', 'admissions.user_id')
            ->leftjoin('management_plan', 'admissions.id', 'management_plan.admissions_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')

            ->where('user_role.role_id', $roleId)
            ->where('location.admission_route_id', 2)
            ->where('admissions.discharge_date', '=', '0000-00-00 00:00:00')
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'user_role',
                'user_role.role',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');

        if ($request->userId != 0) {
            $management = ManagementPlan::select('id AS management_id')->where('assigned_user_id', '=', $userId)->get();
            $users->where('management_plan.assigned_user_id', $userId);
        } else {
            $management = null;
        }

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->admission_route_id) {
            $users->where('location.admission_route_id', $request->admission_route_id);
        } else {
            $users->where('location.admission_route_id', 2);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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
            'data' => ['users' => $users, 'management' => $management],
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexPacientByPAC(Request $request, int $roleId): JsonResponse
    {

        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            ->leftjoin('admissions', 'users.id', 'admissions.user_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')
            ->leftjoin('pac_monitoring', 'pac_monitoring.admissions_id', 'admissions.id')
            ->leftjoin('reason_consultation', 'reason_consultation.admissions_id', 'admissions.id')

            ->where('location.program_id', 22)
            ->where('admissions.discharge_date', '=', "0000-00-00 00:00:00")
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'user_role',
                'user_role.role',
                'admissions',
                'admissions.pac_monitoring',
                'admissions.reason_consultation',
                'admissions.location',
                'admissions.contract',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');



        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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
            'message' => 'Pacientes de plan complementario obtenidos exitosamente',
            'data' => ['users' => $users]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexByPacient(Request $request): JsonResponse
    {

        $users = DB::select('SELECT users.*, b.fecha FROM users JOIN user_role ON users.id = user_role.user_id LEFT JOIN (SELECT admissions.discharge_date AS fecha, admissions.id AS id FROM admissions ORDER BY admissions.id) b ON users.id = b.id WHERE user_role.role_id =2');
        $users = collect($users);
        //$users = (object) $users;

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }



        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('status.name', 'like', '%' . $request->search . '%')
                    ->orWhere('identification_type.name', 'like', '%' . $request->search . '%');
            });
        }

        /* if ($request->query("pagination", true) == "false") {
            $users = $users;
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $users = $users->paginate($per_page, '*', 'page', $page);
        }*/

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
    public function index(Request $request, int $roleId = null): JsonResponse
    {
        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'users.id', 'user_role.user_id')
            ->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'user_role',
                'user_role.role'
            );

        if ($roleId > 0) {
            $users = $users->where('user_role.role_id', $roleId);
        }

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
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
    public function index2(Request $request, int $roleId = null): JsonResponse
    {
        $users = User::select(
            'users.*',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
            'financial_data.id AS financial_data_id',
            'financial_data.bank_id AS financial_data_bank_id',
            'financial_data.account_type_id AS financial_data_account_type_id',
            'financial_data.account_number AS financial_data_account_number',
            'financial_data.rut AS financial_data_rut',
        )->with(
            'status',
            'gender',
            'academic_level',
            'identification_type',
            'user_role',
            'user_role.role'
        )
            ->leftJoin('financial_data', 'financial_data.user_id', 'users.id')
            ->orderBy('users.id', 'asc');;

        if ($roleId > 0) {
            $users->Join('user_role', 'users.id', 'user_role.user_id');
            $users = $users->where('user_role.role_id', $roleId);
        }else if($roleId < 0){
            $users->select(
                'users.*','assistance.id as assistance_id',
                DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo'),
            )->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'user_role',
                'user_role.role'
            );
            $users->Join('assistance', 'users.id', 'assistance.user_id');
            $users = $users->where('assistance.attends_external_consultation', 1);
        }

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            if (str_contains($request->search, ' ')) {
                $spl = explode(' ', $request->search);
                foreach($spl as $element) {
                    $users->where('users.identification', 'like', '%' . $element . '%')
                        ->orWhere('users.email', 'like', '%' . $element . '%')
                        ->orWhere('users.firstname', 'like', '%' . $element . '%')
                        ->orWhere('users.middlefirstname', 'like', '%' . $element . '%')
                        ->orWhere('users.lastname', 'like', '%' . $element . '%')
                        ->orWhere('users.middlelastname', 'like', '%' . $element . '%');
                }
                // $users->where(function ($query) use ($request) {
                // });
            } else {
                $users->where(function ($query) use ($request) {
                    $query->where('users.identification', 'like', '%' . $request->search . '%')
                        ->orWhere('users.email', 'like', '%' . $request->search . '%')
                        ->orWhere('users.firstname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.middlefirstname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.middlelastname', 'like', '%' . $request->search . '%');
                });
            }
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
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {

        DB::beginTransaction();
        $validate = User::Where('identification', $request->identification)->first();
        $validate_wrong_user = UserChange::Join('users', 'users.id', 'user_change.wrong_user_id')->Where('users.identification', $request->identification);
        if ($validate) {
            if ($validate_wrong_user) {
                $user = new User;
                $user->status_id = $request->status_id;
                $user->gender_id = $request->gender_id;
                $user->academic_level_id = $request->academic_level_id;
                $user->identification_type_id = $request->identification_type_id;
                $user->birthplace_municipality_id = $request->birthplace_municipality_id;
                $user->birthplace_country_id = $request->birthplace_country_id;
                $user->birthplace_region_id = $request->birthplace_region_id;
                $user->locality_id = $request->locality_id;
                $user->residence_id = $request->residence_id;
                $user->residence_region_id = $request->residence_region_id;
                $user->residence_municipality_id = $request->residence_municipality_id;
                $user->residence_address = $request->residence_address;
                $user->residence_country_id = $request->residence_country_id;
                $user->study_level_status_id = $request->study_level_status_id;
                $user->activities_id = $request->activities_id;
                $user->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
                $user->select_rh_id = $request->select_RH_id;
                $user->marital_status_id = $request->marital_status_id;
                $user->population_group_id = $request->population_group_id;
                $user->username = $request->username;
                $user->is_disability = $request->is_disability;
                $user->disability = $request->disability;
                $user->gender_type = $request->gender_type;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->firstname = $request->firstname;
                $user->middlefirstname = $request->middlefirstname;
                $user->lastname = $request->lastname;
                $user->middlelastname = $request->middlelastname;
                $user->identification = $request->identification;
                $user->birthday = $request->birthday;
                $user->phone = $request->phone;
                $user->age = $request->age;
                $role = intval($request->role_id);

                if ($request->file('file')) {
                    $path = Storage::disk('public')->put('file', $request->file('file'));
                    $user->file = $path;
                }
                $user->landline = $request->landline;
                $user->ethnicity_id = $request->ethnicity_id;
                $user->force_reset_password = 1;
                $user->save();

                $THLog = new TalentHumanLog;
                $THLog->talent_human_user_id = $request->own_user;
                $THLog->user_id = $user->id;
                $THLog->talent_human_action_id = 1;
                $THLog->save();

                if ($request->campus_id) {
                    $arraycampus = json_decode($request->campus_id);

                    foreach ($arraycampus as $item) {
                        $userCampus = new UserCampus;
                        $userCampus->user_id = $user->id;
                        $userCampus->campus_id = $item->campus_id;
                        $userCampus->save();
                    }
                }


                if ($request->isTH) {
                    $HumanTalentRequest = HumanTalentRequest::find($request->isTH);
                    $HumanTalentRequest->status = 'Aprobada TH';
                    $HumanTalentRequest->save();
                }

                $RoleType = Role::where('id', $role)->get()->toArray();
                if ($RoleType && $RoleType[0]['role_type_id'] == 2) {
                    $assistance = new Assistance;
                    $assistance->user_id = $user->id;

                    $assistance->medical_record = $request->medical_record;
                    $assistance->contract_type_id = $request->contract_type_id;
                    $assistance->cost_center_id = $request->cost_center_id;
                    $assistance->PAD_service = $request->PAD_service;
                    $assistance->attends_external_consultation = $request->attends_external_consultation;
                    $assistance->serve_multiple_patients = $request->serve_multiple_patients;
                    // $assistance->specialty = $request->specialty;

                    if ($request->firm_file) {
                        $image = $request->get('firm');  // your base64 encoded
                        $image = str_replace('data:image/png;base64,', '', $image);
                        $image = str_replace(' ', '+', $image);
                        $random = Str::random(10);
                        $imagePath = 'firmas/' . $random . '.png';
                        Storage::disk('public')->put($imagePath, base64_decode($image));

                        $assistance->file_firm = $imagePath;
                    }
                    $assistance->save();

                    $id = Assistance::latest('id')->first();
                    $array = json_decode($request->localities_id);
                    foreach ($array as $item) {
                        $BaseLocationCapacity = new BaseLocationCapacity();
                        $BaseLocationCapacity->locality_id = $item->locality_id;
                        $BaseLocationCapacity->assistance_id = $id->id;
                        $BaseLocationCapacity->PAD_base_patient_quantity = $item->PAD_base_patient_quantity;
                        $BaseLocationCapacity->save();

                        $LocationCapacity = new LocationCapacity();
                        $LocationCapacity->locality_id = $item->locality_id;
                        $LocationCapacity->PAD_patient_quantity = $this->getLocationCapacitiByDate($item->PAD_base_patient_quantity);
                        $LocationCapacity->PAD_patient_attended = 0;
                        $LocationCapacity->validation_date = Carbon::now();
                        $LocationCapacity->PAD_patient_actual_capacity = $this->getLocationCapacitiByDate($item->PAD_base_patient_quantity);
                        $LocationCapacity->assistance_id = $id->id;
                        $LocationCapacity->save();
                    }

                    if ($request->phone_consult) {
                        $BaseLocationCapacity = new BaseLocationCapacity;
                        $BaseLocationCapacity->assistance_id = $id->id;
                        $BaseLocationCapacity->phone_consult = "TELECONSULTA";
                        $BaseLocationCapacity->PAD_base_patient_quantity = intval($request->phone_consult);
                        $BaseLocationCapacity->save();

                        $LocationCapacity = new LocationCapacity();
                        $LocationCapacity->phone_consult = "TELECONSULTA";
                        $LocationCapacity->PAD_patient_quantity = $this->getLocationCapacitiByDate(intval($request->phone_consult));
                        $LocationCapacity->PAD_patient_attended = 0;
                        $LocationCapacity->validation_date = Carbon::now();
                        $LocationCapacity->PAD_patient_actual_capacity = $this->getLocationCapacitiByDate(intval($request->phone_consult));
                        $LocationCapacity->assistance_id = $id->id;
                        $LocationCapacity->save();
                    }

                    if (is_array($request->specialty) == true) {
                        foreach ($request->specialty as $item) {
                            $assistanceSpecial = new AssistanceSpecial;
                            $assistanceSpecial->specialty_id = (int)$item;
                            $assistanceSpecial->assistance_id = $assistance->id;
                            $assistanceSpecial->save();
                        }
                    }
                }

                $userRole = new UserRole;
                $userRole->role_id = $request->role_id;
                $userRole->user_id = $user->id;
                $userRole->save();
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario exístente con este número de cedula',
                ]);
            }
        } else {
            $user = new User;
            $user->status_id = $request->status_id;
            $user->gender_id = $request->gender_id;
            $user->academic_level_id = $request->academic_level_id;
            $user->identification_type_id = $request->identification_type_id;
            $user->birthplace_municipality_id = $request->birthplace_municipality_id;
            $user->birthplace_country_id = $request->birthplace_country_id;
            $user->birthplace_region_id = $request->birthplace_region_id;
            $user->locality_id = $request->locality_id;
            $user->residence_id = $request->residence_id;
            $user->residence_region_id = $request->residence_region_id;
            $user->residence_municipality_id = $request->residence_municipality_id;
            $user->residence_address = $request->residence_address;
            $user->residence_country_id = $request->residence_country_id;
            $user->study_level_status_id = $request->study_level_status_id;
            $user->activities_id = $request->activities_id;
            $user->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
            $user->select_rh_id = $request->select_RH_id;
            $user->marital_status_id = $request->marital_status_id;
            $user->population_group_id = $request->population_group_id;
            $user->username = $request->username;
            $user->is_disability = $request->is_disability;
            $user->disability = $request->disability;
            $user->gender_type = $request->gender_type;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->firstname = $request->firstname;
            $user->middlefirstname = $request->middlefirstname;
            $user->lastname = $request->lastname;
            $user->middlelastname = $request->middlelastname;
            $user->identification = $request->identification;
            $user->birthday = $request->birthday;
            $user->age = $request->age;
            $user->phone = $request->phone;
            $user->landline = $request->landline;
            $user->ethnicity_id = $request->ethnicity_id;
            $role = intval($request->role_id);
            if ($request->file('file')) {
                $path = Storage::disk('public')->put('file', $request->file('file'));
                $user->file = $path;
            }
            $user->save();

            $THLog = new TalentHumanLog;
            $THLog->talent_human_user_id = $request->own_user;
            $THLog->user_id = $user->id;
            $THLog->talent_human_action_id = 1;
            $THLog->save();

            if ($request->campus_id) {
                $arraycampus = json_decode($request->campus_id);

                foreach ($arraycampus as $item) {
                    $userCampus = new UserCampus;
                    $userCampus->user_id = $user->id;
                    $userCampus->campus_id = $item->campus_id;
                    $userCampus->save();
                }
            }

            if ($request->isTH) {
                $HumanTalentRequest = HumanTalentRequest::find($request->isTH);
                $HumanTalentRequest->status = 'Aprobada TH';
                $HumanTalentRequest->save();
            }

            $RoleType = Role::where('id', $role)->get()->toArray();
            if ($RoleType && $RoleType[0]['role_type_id'] == 2) {
                $assistance = new Assistance;
                $assistance->user_id = $user->id;

                $assistance->medical_record = $request->medical_record;
                $assistance->contract_type_id = $request->contract_type_id;
                $assistance->cost_center_id = $request->cost_center_id;
                $assistance->PAD_service = $request->PAD_service;
                $assistance->attends_external_consultation = $request->attends_external_consultation;
                $assistance->serve_multiple_patients = $request->serve_multiple_patients;
                // $assistance->specialty = $request->specialty;    

                if ($request->firm_file) {
                    $image = $request->get('firm_file');  // your base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $random = Str::random(10);
                    $imagePath = 'firmas/' . $random . '.png';
                    Storage::disk('public')->put($imagePath, base64_decode($image));

                    $assistance->file_firm = $imagePath;
                }
                $assistance->save();

                $id = Assistance::latest('id')->first();


                foreach (json_decode($request->localities_id) as $item) {
                    $BaseLocationCapacity = new BaseLocationCapacity();
                    $BaseLocationCapacity->locality_id = $item->locality_id;
                    $BaseLocationCapacity->assistance_id = $id->id;
                    $BaseLocationCapacity->PAD_base_patient_quantity = $item->PAD_base_patient_quantity;
                    $BaseLocationCapacity->save();

                    $LocationCapacity = new LocationCapacity();
                    $LocationCapacity->locality_id = $item->locality_id;
                    $LocationCapacity->assistance_id = $id->id;
                    $LocationCapacity->PAD_patient_quantity = $this->getLocationCapacitiByDate($item->PAD_base_patient_quantity);
                    $LocationCapacity->PAD_patient_attended = 0;
                    $LocationCapacity->validation_date = Carbon::now();
                    $LocationCapacity->PAD_patient_actual_capacity = $this->getLocationCapacitiByDate($item->PAD_base_patient_quantity);
                    $LocationCapacity->save();
                }

                if ($request->phone_consult) {
                    $BaseLocationCapacity = new BaseLocationCapacity;
                    $BaseLocationCapacity->assistance_id = $id->id;
                    $BaseLocationCapacity->phone_consult = "TELECONSULTA";
                    $BaseLocationCapacity->PAD_base_patient_quantity = intval($request->phone_consult);
                    $BaseLocationCapacity->save();

                    $LocationCapacity = new LocationCapacity();
                    $LocationCapacity->phone_consult = "TELECONSULTA";
                    $LocationCapacity->PAD_patient_quantity = $this->getLocationCapacitiByDate(intval($request->phone_consult));
                    $LocationCapacity->PAD_patient_attended = 0;
                    $LocationCapacity->validation_date = Carbon::now();
                    $LocationCapacity->PAD_patient_actual_capacity = $this->getLocationCapacitiByDate(intval($request->phone_consult));
                    $LocationCapacity->assistance_id = $id->id;
                    $LocationCapacity->save();
                }

                if (is_array($request->specialty) == true) {
                    foreach ($request->specialty as $item) {
                        $assistanceSpecial = new AssistanceSpecial;
                        $assistanceSpecial->specialty_id = (int)$item;
                        $assistanceSpecial->assistance_id = $assistance->id;
                        $assistanceSpecial->save();
                    }
                }
            }


            $userRole = new UserRole;
            $userRole->role_id = $request->role_id;
            $userRole->user_id = $user->id;
            $userRole->save();
        }

        DB::commit();

        // Notificación:
        $shippingConfirmation = Notifications::sendNotification(
            $request->email,
            'mails.userRegistration',
            'Se ha realizado su registro en la Escuela Judicial Rodrigo Lara Bonilla',
            [
                'id' => Crypt::encrypt($user->id),
                'name' => $request->firstname . ' ' . $request->lastname,
                'user' => $request->username,
                'password' => $request->password,
                'host' => env('FRONT_URL')
            ]
        );
        return response()->json([
            'status' => true,
            'message' => 'Usuario creado exitosamente',
            'data' => ['user' => $user],
            // 'data2' => ['assitance' => $assistance]
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param integer $user_id
     * @return JsonResponse
     */
    public function getHistory(Request $request): JsonResponse
    {
        $aux_curriculum = Curriculum::select(
            'curriculum.*',
            'municipality.name as municipality_name',
            'region.name as region_name',
            'entity.name as entity_name',
            'position.name as position_name',
            'curriculum.created_at as date'
        )
            ->leftJoin('municipality', 'municipality.id', 'curriculum.municipality_id')
            ->leftJoin('region', 'region.id', 'municipality.region_id')
            ->leftJoin('entity', 'entity.id', 'curriculum.entity_id')
            ->leftJoin('position', 'position.id', 'curriculum.position_id')
            ->where('user_id', $request->user_id);

        if ($request->_sort) {
            $aux_curriculum->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $aux_curriculum->where(function ($query) use ($request) {
                $query->where('curriculum.id', 'like', '%' . $request->search . '%')
                    ->orWhere('municipality.name', 'like', '%' . $request->search . '%')
                    ->orWhere('region.name', 'like', '%' . $request->search . '%')
                    ->orWhere('entity.name', 'like', '%' . $request->search . '%')
                    ->orWhere('position.name', 'like', '%' . $request->search . '%')
                    ->orWhere('curriculum.created_at', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->query("pagination", true) == "false") {
            $aux_curriculum = $aux_curriculum->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $aux_curriculum = $aux_curriculum->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Usuario obtenido exitosamente',
            'data' => ['user' => $aux_curriculum]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {


        DB::beginTransaction();

        $user = User::find($id);
        $user->status_id = $request->status_id;
        $user->gender_id = $request->gender_id;
        $user->academic_level_id = $request->academic_level_id;
        $user->identification_type_id = $request->identification_type_id;
        $user->birthplace_municipality_id = $request->birthplace_municipality_id;
        $user->birthplace_country_id = $request->birthplace_country_id;
        $user->birthplace_region_id = $request->birthplace_region_id;
        $user->locality_id = $request->locality_id;
        $user->residence_id = $request->residence_id;
        $user->residence_region_id = $request->residence_region_id;
        $user->residence_municipality_id = $request->residence_municipality_id;
        $user->residence_address = $request->residence_address;
        $user->residence_country_id = $request->residence_country_id;
        $user->study_level_status_id = $request->study_level_status_id;
        $user->activities_id = $request->activities_id;
        $user->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
        $user->select_rh_id = $request->select_RH_id;
        $user->marital_status_id = $request->marital_status_id;
        $user->population_group_id = $request->population_group_id;
        $user->username = $request->username;
        $user->is_disability = $request->is_disability;
        $user->disability = $request->disability;
        $user->gender_type = $request->gender_type;
        $user->email = $request->email;
        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        $user->firstname = $request->firstname;
        $user->middlefirstname = $request->middlefirstname;
        $user->lastname = $request->lastname;
        $user->middlelastname = $request->middlelastname;
        $user->identification = $request->identification;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->landline = $request->landline;
        $user->ethnicity_id = $request->ethnicity_id;
        if ($request->campus_id) {
            $deleteusers = UserCampus::where('user_id', $id);
            $deleteusers->delete();
            $arraycampus = json_decode($request->campus_id);

            foreach ($arraycampus as $item) {

                $userCampus = new UserCampus;
                $userCampus->user_id = $id;
                $userCampus->campus_id = $item->campus_id;
                $userCampus->save();
            }
        }
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $user->file = $path;
        }
        $role = intval($request->role_id);
        if ($request->gender_id == 3) {
            $user->gender_type = $request->gender_type;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $THLog = new TalentHumanLog;
        $THLog->talent_human_user_id = $request->own_user;
        $THLog->user_id = $user->id;
        $THLog->talent_human_action_id = 2;
        $THLog->save();

        $RoleType = Role::where('id', $role)->get()->toArray();
        if ($RoleType && $RoleType[0]['role_type_id'] == 2) {
            $assistance_id = Assistance::select('id')->where('user_id', $id)->get()->toArray();
            if (count($assistance_id) > 0) {
                $assistance = Assistance::find($assistance_id[0]['id']);
                $assistance->medical_record = $request->medical_record;
                $assistance->contract_type_id = $request->contract_type_id;
                $assistance->cost_center_id = $request->cost_center_id;
                // $assistance->type_professional_id = $request->type_professional_id;
                $assistance->PAD_service = $request->PAD_service;
                $assistance->attends_external_consultation = $request->attends_external_consultation;
                $assistance->serve_multiple_patients = $request->serve_multiple_patients;

                if ($request->firm_file != "null") {
                    $image = $request->get('firm_file');  // your base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $random = Str::random(10);
                    $imagePath = 'firmas/' . $random . '.png';
                    Storage::disk('public')->put($imagePath, base64_decode($image));

                    $assistance->file_firm = $imagePath;
                }
                $assistance->save();
            } else {
                $assistance = new Assistance;
                $assistance->user_id = $user->id;

                $assistance->medical_record = $request->medical_record;
                $assistance->contract_type_id = $request->contract_type_id;
                $assistance->cost_center_id = $request->cost_center_id;
                $assistance->PAD_service = $request->PAD_service;
                $assistance->attends_external_consultation = $request->attends_external_consultation;
                $assistance->serve_multiple_patients = $request->serve_multiple_patients;
                // $assistance->specialty = $request->specialty;

                if ($request->firm_file != "null") {
                    $image = $request->get('firm_file');  // your base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $random = Str::random(10);
                    $imagePath = 'firmas/' . $random . '.png';
                    Storage::disk('public')->put($imagePath, base64_decode($image));

                    $assistance->file_firm = $imagePath;
                }
                $assistance->save();
            }

            $id = Assistance::latest('id')->first();


            if (is_array($request->specialty) == true) {
                //if(sizeof($request->specialty) != 0 ){
                foreach ($request->specialty as $item) {
                    $assistanceSpecial = new AssistanceSpecial;
                    $assistanceSpecial->specialty_id = (int)$item;
                    $assistanceSpecial->assistance_id = $assistance->id;
                    $assistanceSpecial->save();
                }
                //}
            }
        }


        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Usuario actualizado exitosamente',
            'data' => ['user' => $user]
        ]);
    }

    function getLocationCapacitiByDate(int $capacity)
    {
        $currentDateFormat = Carbon::now()->startOfDay();
        $firstDateFormat = Carbon::now()->startOfMonth();
        $endDateFormat = Carbon::now()->endOfMonth();

        $totalDiference = $firstDateFormat->diffInDays($endDateFormat);
        $currentDiference = ($endDateFormat->diffInDays($currentDateFormat)) - 1;

        return ceil($currentDiference * ($capacity / $totalDiference));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'Usuario eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El usuario está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }


    public function getAuxiliaryData(Request $request): JsonResponse
    {
        $academicLevels = AcademicLevel::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $genders = Gender::where('id', '!=', 3);
        $ethnicitys = Ethnicity::orderBy('name')->get();
        $identificationTypes = IdentificationType::get();
        $status = Status::get();
        $study_level_status = StudyLevelStatus::orderBy('name')->get();
        $activities = Activities::orderBy('name')->get();
        $select_RH = SelectRh::get();
        $population_group = PopulationGroup::orderBy('name')->get();
        $marital_status = MaritalStatus::orderBy('name')->get();
        $inabilitys = Inability::orderBy('name')->get();
        $contract_type = ContractType::get();
        $cost_center = CostCenter::get();
        $type_professional = TypeProfessional::get();
        $residence = Residence::orderBy('name')->get();
        //$observation_novelty = ObservationNovelty::get();
        $specialty = Specialty::where('type_professional_id', $request->type_professional_id);
        // if($request->search){
        //     $specialty->Orwhere('name', 'like', '%' . $request->search . '%');
        // }
        if ($request->search != 'undefined') {
            $specialty->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        }




        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'academicLevels' => $academicLevels->toArray(),
                'countries' => $countries->toArray(),
                'genders' => $genders->get()->toArray(),
                'ethnicitys' => $ethnicitys->toArray(),
                'identificationTypes' => $identificationTypes->toArray(),
                'study_level_status' => $study_level_status->toArray(),
                'status' => $status->toArray(),
                'activities' => $activities->toArray(),
                'select_RH' => $select_RH->toArray(),
                'population_group' => $population_group->toArray(),
                'marital_status' => $marital_status->toArray(),
                'contract_type' => $contract_type->toArray(),
                'cost_center' => $cost_center->toArray(),
                'type_professional' => $type_professional->toArray(),
                'inability' => $inabilitys->toArray(),
                'specialty' => $specialty->get()->toArray(),
                'residence' => $residence->toArray(),
                //'observation_novelty' => $observation_novelty->get()->toArray(),

            ]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = User::select(
            'users.*',
            'municipality.region_id',
            'region.country_id',
            DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )
            ->leftJoin('municipality', 'municipality.id', 'users.birthplace_municipality_id')
            ->leftJoin('region', 'region.id', 'municipality.region_id')
            ->where('users.id', $id)->with(
                'status',
                'users_campus',
                'gender',
                'academic_level',
                'identification_type',
                'user_role',
                'user_role.role',
                // 'admissions',
                // 'admissions.location',
                // 'admissions.contract',
                // 'admissions.campus',
                // 'admissions.location.admission_route',
                // 'admissions.location.scope_of_attention',
                // 'admissions.location.program',
                // 'admissions.location.flat',
                // 'admissions.location.pavilion',
                // 'admissions.location.bed',
                'assistance'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Usuario obtenido exitosamente',
            'data' => ['user' => $user]
        ]);
    }


    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $user = User::find($id);
        $status_id = User::where('id', $id)->get()->first()->status_id;
        $THLog = new TalentHumanLog;
        $THLog->talent_human_user_id = $request->own_user;
        $THLog->user_id = $user->id;
        if ($status_id == 1) {
            $user->status_id = 2;
            $THLog->talent_human_action_id = 4;
        } else {
            $user->status_id = 1;
            $THLog->talent_human_action_id = 3;
        }
        $THLog->save();
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['user' => $user]
        ]);
    }

    /**
     * Add role to user
     *
     * @param UserParentRequest $request
     * @return JsonResponse
     */
    public function addParentUser(UserParentRequest $request): JsonResponse
    {
        $exist = UserUser::where([
            ['user_id', $request->usuario_hijo],
            ['user_parent_id', $request->usuario_padre],
        ])->get()->count();

        if ($exist) {
            throw new Exception("El usuario ya tiene asignado ese padre", 423);
        }

        $userUser = new UserUser;
        $userUser->user_id = $request->usuario_hijo;
        $userUser->user_parent_id = $request->usuario_padre;
        $userUser->save();

        return response()->json([
            'status' => true,
            'message' => 'El padre se asignó al usuario exitosamente',
            'data' => ['userUser' => $userUser]
        ]);
    }

    /**
     * Get children of parent user
     *
     * @param integer $userParentId
     * @return JsonResponse
     */
    public function getChildrenOfParentUser(int $userParentId): JsonResponse
    {
        $userParentChildren = UserUser::where('user_parent_id', $userParentId)
            ->with('userParent', 'userChildren')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Hijos de un padre usuario obtenido exitosamente',
            'data' => ['userParentChildren' => $userParentChildren]
        ]);
    }

    /**
     * Sync student of connect
     *
     * @param StudentSyncRequest $request
     * @return JsonResponse
     */
    public function syncOfConnect(
        StudentSyncRequest $request,
        SyncStudent $sync
    ): JsonResponse {
        $sync->handle($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Estudiante sincronizado exitosamente.'
        ]);
    }

    public function forceResetPassword(ForceResetPasswordRequest $request, int $id)
    {
        $user = User::find($id);
        $user->force_reset_password = $request->force_reset_password;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Usuario Actualizado Correctamente',
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'La contraseña debe ser diferente a la antigua'
            ]);
        } else {
            $user->password = Hash::make($request->password);
            $user->force_reset_password = 0;
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Contraseña Actualizada Correctamente',
                'pass' => $user->password
            ]);
        }
    }

    /**
     * @description method to verify or validate user email
     *
     * @param $id Hash
     * @return array
     *
     */
    public function checkUser($hash)
    {
        $id = Crypt::decrypt($hash);
        $user = User::find($id);
        if ($user->email_verified_at != NULL) {
            return response()->json([
                'status' => true,
                'message' => 'Email de usuario ya verificado'
            ]);
        }
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Email de usuario verificado'
        ]);
    }

    /**
     * @description method to find email by identification
     *
     * @param $idnumber
     * @return array
     *
     */
    public function findEmail(FindEmailRequest $request)
    {
        $user = User::select('*')->where('identification', $request->identification)->Join('user_role', 'users.id', 'user_role.user_id')->Join('role', 'role.id', '=', 'user_role.role_id')->get()->toArray();
        $status = count($user) > 0 ? true : false;
        return response()->json([
            'status' => $status,
            'message' => 'Busqueda realizada',
            'data' => $user
        ]);
    }

    /**
     * @description method to find certificate by identification
     *
     * @param $idnumber
     * @return array
     *
     */
    public function findCertificate(FindEmailRequest $request)
    {
        $identification = $request->identification;
        $user = User::select('*')
            ->with(
                'user_role',
                'user_role.role',
                'user_role.user_role_course',
                'user_role.user_role_course.inscription_status',
                'user_role.user_role_course.course',
                'user_role.user_role_course.course.coursebase',
                'user_role.user_role_course.course.campus',
                'user_role.user_role_course.course.entity_type',
                'user_role.user_role_course.course.category',
                'user_role.user_role_course.user_certificates',
                'user_role.user_role_course.user_certificates.user_employee',
            )
            ->where('identification', $identification)
            ->get()->toArray();

        $status = count($user) > 0 ? true : false;
        return response()->json([
            'status' => $status,
            'message' => 'Busqueda realizada',
            'data' => $user
        ]);
    }
}
