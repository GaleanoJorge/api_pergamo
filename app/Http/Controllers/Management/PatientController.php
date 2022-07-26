<?php

namespace App\Http\Controllers\Management;

use Exception;
use App\Http\Helpers\Notifications\Notifications;
use App\Models\Patient;
use App\Models\Inability;
use App\Models\UserRole;
use App\Models\ContractType;
use App\Models\Assistance;
use App\Models\UserRoleCourse;
use App\Models\UserRoleCategoryInscription;
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
use App\Http\Requests\PatientRequest;
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
use App\Models\UserUser;
use Mockery\Undefined;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PatientController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexByRole(Request $request): JsonResponse
    {

        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');

        if ($request->locality_id) {
            $patients->where('', $request->locality_id);
        }

        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pacientes obtenidos exitosamente',
            'data' => ['patients' => $patients]
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

        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'patients.id', 'user_role.user_id')
            ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');



        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients]
        ]);
    }

    public function indexPacientByAdmission(Request $request, int $roleId): JsonResponse
    {

        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');



        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->admission_route_id) {
            $patients->where('location.admission_route_id', $request->admission_route_id);
        } else {
            $patients->where('location.admission_route_id', 2);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function indexByRoleLocation(int $locality, int $roleId): JsonResponse
    {

        $patients = Patient::select(
            'assistance.id AS assistance_id',
            'patients.id'
        )->Join('user_role', 'patients.id', 'user_role.user_id')
            ->Join('assistance', 'patients.id', 'assistance.user_id')

            ->where('user_role.role_id', $roleId);
        $patients = $patients->get()->toArray();


        if ($locality) {
            foreach ($patients as $key => $row) {
                $localityArr = LocationCapacity::select('locality_id')->where('assistance_id', $row['assistance_id'])->get()->toArray();
                $pila = array();
                foreach ($localityArr as $key => $row2) {
                    array_push($pila, $row2['locality_id']);
                }
                if (in_array($locality, $pila)) {
                    $patientsfinal = Patient::select(
                        'patients.*',
                        'assistance.id AS assistance_id',
                        DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
                    )->Join('user_role', 'patients.id', 'user_role.user_id')
                        ->Join('assistance', 'patients.id', 'assistance.user_id')
                        ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')

                        ->where('user_role.role_id', $roleId)
                        ->where('patients.id', $row['id'])
                        ->with(
                            'status',
                            'gender',
                            'inability',
                            'academic_level',
                            'identification_type',
                            'user_role',
                            'user_role.role',
                            'assistance'
                        )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');

                    $patientsfinal = $patientsfinal->get()->toArray();
                } else {
                    $patientsfinal = array();
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patientsfinal]
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

        $patients = Patient::select(
            'patients.*',
            'admissions.id AS admissions_id',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')
            ->leftjoin('management_plan', 'admissions.id', 'management_plan.admissions_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')
            ->where('location.admission_route_id', 2)
            ->where('admissions.discharge_date', '=', '0000-00-00 00:00:00')
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'admissions',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
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
            $patients->where('management_plan.assigned_user_id', $userId);
        } else {
            $management = null;
        }

        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->admission_route_id) {
            $patients->where('location.admission_route_id', $request->admission_route_id);
        } else {
            $patients->where('location.admission_route_id', 2);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients, 'management' => $management],
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

        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )
            ->leftjoin('admissions', 'patients.id', 'admissions.patient_id')
            ->Join('location', 'location.admissions_id', 'admissions.id')
            ->leftjoin('pac_monitoring', 'pac_monitoring.admissions_id', 'admissions.id')
            ->leftjoin('reason_consultation', 'reason_consultation.admissions_id', 'admissions.id')

            ->where('location.program_id', 22)
            ->where('admissions.discharge_date', '=', "0000-00-00 00:00:00")
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                'residence_municipality',
                'residence',
                'admissions',
                'admissions.pac_monitoring',
                'admissions.reason_consultation',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed'
            )->orderBy('admissions.entry_date', 'DESC')->groupBy('id');



        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pacientes de plan complementario obtenidos exitosamente',
            'data' => ['patients' => $patients]
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

        $patients = DB::select('SELECT patients.*, b.fecha FROM patients JOIN user_role ON patients.id = user_role.user_id LEFT JOIN (SELECT admissions.discharge_date AS fecha, admissions.id AS id FROM admissions ORDER BY admissions.id) b ON patients.id = b.id WHERE user_role.role_id =2');
        $patients = collect($patients);
        //$patients = (object) $patients;

        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }



        if ($request->search) {
            $patients->where(function ($query) use ($request) {
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
            $patients = $patients;
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }*/

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients]
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
        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'patients.id', 'user_role.user_id')
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
           
            );

        if ($roleId > 0) {
            $patients = $patients->where('user_role.role_id', $roleId);
        }

        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients]
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
        $patients = Patient::select(
            'patients.*',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
        )->with(
            'status',
            'gender',
            'inability',
            'academic_level',
            'identification_type',
        );

        // if ($roleId > 0) {
        //     $patients->Join('user_role', 'patients.id', 'user_role.user_id');
        //     $patients = $patients->where('user_role.role_id', $roleId);
        // }

        if ($request->_sort) {
            $patients->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $patients->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $patients = $patients->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $patients = $patients->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['patients' => $patients]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return JsonResponse
     */
    public function store(PatientRequest $request): JsonResponse
    {

        DB::beginTransaction();
        $validate = Patient::Where('identification', $request->identification)->first();
        $validate_wrong_user = UserChange::Join('patients', 'patients.id', 'user_change.wrong_user_id')->Where('patients.identification', $request->identification);
        if ($validate) {
            // if ($validate_wrong_user) {
            //     $patients = new Patient;
            //     $patients->status_id = $request->status_id;
            //     $patients->gender_id = $request->gender_id;
            //     $patients->academic_level_id = $request->academic_level_id;
            //     $patients->identification_type_id = $request->identification_type_id;
            //     $patients->birthplace_municipality_id = $request->birthplace_municipality_id;
            //     $patients->birthplace_country_id = $request->birthplace_country_id;
            //     $patients->birthplace_region_id = $request->birthplace_region_id;
            //     $patients->locality_id = $request->locality_id;
            //     $patients->residence_id = $request->residence_id;
            //     $patients->residence_region_id = $request->residence_region_id;
            //     $patients->residence_municipality_id = $request->residence_municipality_id;
            //     $patients->residence_address = $request->residence_address;
            //     $patients->residence_country_id = $request->residence_country_id;
            //     $patients->study_level_status_id = $request->study_level_status_id;
            //     $patients->activities_id = $request->activities_id;
            //     $patients->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
            //     $patients->select_rh_id = $request->select_RH_id;
            //     $patients->marital_status_id = $request->marital_status_id;
            //     $patients->population_group_id = $request->population_group_id;
            //     $patients->username = $request->username;
            //     $patients->is_disability = $request->is_disability;
            //     $patients->is_street_dweller = $request->is_street_dweller;
            //     $patients->disability = $request->disability;
            //     $patients->gender_type = $request->gender_type;
            //     $patients->email = $request->email;
            //     $patients->firstname = $request->firstname;
            //     $patients->middlefirstname = $request->middlefirstname;
            //     $patients->lastname = $request->lastname;
            //     $patients->middlelastname = $request->middlelastname;
            //     $patients->identification = $request->identification;
            //     $patients->birthday = $request->birthday;
            //     $patients->phone = $request->phone;
            //     $patients->age = $request->age;

            //     if ($request->file('file')) {
            //         $path = Storage::disk('public')->put('file', $request->file('file'));
            //         $patients->file = $path;
            //     }
            //     $patients->landline = $request->landline;
            //     $patients->ethnicity_id = $request->ethnicity_id;
            //     $patients->force_reset_password = 1;
            //     $patients->save();
            // } else {
                return response()->json([
                    'status' => false,
                    'message' => 'El número de documento ya se encuentra registrado.',
                ]);
            // }
        } else {
            $patients = new Patient;
            $patients->status_id = $request->status_id;
            $patients->gender_id = $request->gender_id;
            $patients->academic_level_id = $request->academic_level_id;
            $patients->identification_type_id = $request->identification_type_id;
            $patients->birthplace_municipality_id = $request->birthplace_municipality_id;
            $patients->birthplace_country_id = $request->birthplace_country_id;
            $patients->birthplace_region_id = $request->birthplace_region_id;
            $patients->locality_id = $request->locality_id;
            $patients->residence_id = $request->residence_id;
            $patients->residence_region_id = $request->residence_region_id;
            $patients->residence_municipality_id = $request->residence_municipality_id;
            $patients->residence_address = $request->residence_address;
            $patients->residence_country_id = $request->residence_country_id;
            $patients->study_level_status_id = $request->study_level_status_id;
            $patients->activities_id = $request->activities_id;
            $patients->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
            $patients->select_rh_id = $request->select_RH_id;
            $patients->marital_status_id = $request->marital_status_id;
            $patients->population_group_id = $request->population_group_id;
            $patients->username = $request->username;
            $patients->is_disability = $request->is_disability;
            $patients->is_street_dweller = $request->is_street_dweller;
            $patients->disability = $request->disability;
            $patients->gender_type = $request->gender_type;
            $patients->email = $request->email;
            $patients->firstname = $request->firstname;
            $patients->middlefirstname = $request->middlefirstname;
            $patients->lastname = $request->lastname;
            $patients->middlelastname = $request->middlelastname;
            $patients->identification = $request->identification;
            $patients->birthday = $request->birthday;
            $patients->age = $request->age;
            $patients->phone = $request->phone;
            $patients->landline = $request->landline;
            $patients->ethnicity_id = $request->ethnicity_id;

            if ($request->file('file')) {
                $path = Storage::disk('public')->put('file', $request->file('file'));
                $patients->file = $path;
            }
            $patients->save();
        }

        DB::commit();

        // Notificación:
        $shippingConfirmation = Notifications::sendNotification(
            $request->email,
            'mails.userRegistration',
            'Se ha realizado su registro en la Escuela Judicial Rodrigo Lara Bonilla',
            [
                'id' => Crypt::encrypt($patients->id),
                'name' => $request->firstname . ' ' . $request->lastname,
                'patients' => $request->username,
                'password' => $request->password,
                'host' => env('FRONT_URL')
            ]
        );
        return response()->json([
            'status' => true,
            'message' => 'Usuario creado exitosamente',
            'data' => ['patients' => $patients],
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
            'data' => ['patients' => $aux_curriculum]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PatientRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(PatientRequest $request, int $id): JsonResponse
    {


        DB::beginTransaction();

        $patients = Patient::find($id);
        $patients->status_id = $request->status_id;
        $patients->gender_id = $request->gender_id;
        $patients->academic_level_id = $request->academic_level_id;
        $patients->identification_type_id = $request->identification_type_id;
        $patients->birthplace_municipality_id = $request->birthplace_municipality_id;
        $patients->username = $request->username;
        $patients->email = $request->email;
        $patients->firstname = $request->firstname;
        $patients->middlefirstname = $request->middlefirstname;
        $patients->lastname = $request->lastname;
        $patients->middlelastname = $request->middlelastname;
        $patients->identification = $request->identification;
        $patients->birthday = $request->birthday;
        $patients->phone = $request->phone;
        $patients->landline = $request->landline;
        $patients->ethnicity_id = $request->ethnicity_id;
        $patients->is_disability = $request->is_disability;
        $patients->age = $request->age;
        $patients->activities_id = $request->activities_id;
        $patients->is_street_dweller = $request->is_street_dweller;
        $patients->is_disability = $request->is_disability;
        $patients->disability = $request->disability;
        $patients->residence_address = $request->residence_address;
        $patients->residence_country_id = $request->residence_country_id;
        $patients->locality_id = $request->locality_id;
        $patients->residence_id = $request->residence_id;
        $patients->neighborhood_or_residence_id = $request->neighborhood_or_residence_id;
        if ($request->gender_id == 3) {
            $patients->gender_type = $request->gender_type;
        }
        $patients->save();

        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Usuario actualizado exitosamente',
            'data' => ['patients' => $patients]
        ]);
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
            $patients = Patient::find($id);
            $patients->delete();

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
        $special_field = Specialty::where('type_professional_id', $request->type_professional_id);
        // if($request->search){
        //     $special_field->Orwhere('name', 'like', '%' . $request->search . '%');
        // }
        if ($request->search != 'undefined') {
            $special_field->where(function ($query) use ($request) {
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
                'special_field' => $special_field->get()->toArray(),
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
        $patients = Patient::select(
            'patients.*',
            'municipality.region_id',
            'region.country_id',
            DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo'),
            DB::raw('DATE(patients.birthday) as birthday_parse'),
        )
            ->leftJoin('municipality', 'municipality.id', 'patients.birthplace_municipality_id')
            ->leftJoin('region', 'region.id', 'municipality.region_id')
            ->where('patients.id', $id)
            ->with(
                'status',
                'gender',
                'inability',
                'academic_level',
                'identification_type',
                // 'all_admissions',
                'admissions',
                'admissions.briefcase',
                'admissions.location',
                'admissions.contract',
                'admissions.contract.company',
                'admissions.campus',
                'admissions.location.admission_route',
                'admissions.location.scope_of_attention',
                'admissions.location.program',
                'admissions.location.flat',
                'admissions.location.pavilion',
                'admissions.location.bed',
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Paciente obtenido exitosamente',
            'data' => ['patients' => $patients]
        ]);
    }


    public function changeStatus(int $id): JsonResponse
    {
        $patients = patient::find($id);
        $status_id = patient::where('id', $id)->get()->first()->status_id;
        if ($status_id == 1) {
            $patients->status_id = 2;
        } else {
            $patients->status_id = 1;
        }
        $patients->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => ['patients' => $patients]
        ]);
    }

    /**
     * Add role to patients
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
     * Get children of parent patients
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
        $patients = patient::find($id);
        $patients->force_reset_password = $request->force_reset_password;
        $patients->save();

        return response()->json([
            'status' => true,
            'message' => 'Usuario Actualizado Correctamente',
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $patients = patient::find(Auth::patients()->id);

        if (Hash::check($request->password, $patients->password)) {
            return response()->json([
                'status' => false,
                'message' => 'La contraseña debe ser diferente a la antigua'
            ]);
        } else {
            $patients->password = Hash::make($request->password);
            $patients->force_reset_password = 0;
            $patients->save();
            return response()->json([
                'status' => true,
                'message' => 'Contraseña Actualizada Correctamente',
                'pass' => $patients->password
            ]);
        }
    }

    /**
     * @description method to verify or validate patients email
     *
     * @param $id Hash
     * @return array
     *
     */
    public function checkUser($hash)
    {
        $id = Crypt::decrypt($hash);
        $patients = patient::find($id);
        if ($patients->email_verified_at != NULL) {
            return response()->json([
                'status' => true,
                'message' => 'Email de usuario ya verificado'
            ]);
        }
        $patients->email_verified_at = date('Y-m-d H:i:s');
        $patients->save();
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
        $patients = patient::select('*')->where('identification', $request->identification)->Join('user_role', 'patients.id', 'user_role.user_id')->Join('role', 'role.id', '=', 'user_role.role_id')->get()->toArray();
        $status = count($patients) > 0 ? true : false;
        return response()->json([
            'status' => $status,
            'message' => 'Busqueda realizada',
            'data' => $patients
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
        $patients = patient::select('*')
            ->with(
                'inability',
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

        $status = count($patients) > 0 ? true : false;
        return response()->json([
            'status' => $status,
            'message' => 'Busqueda realizada',
            'data' => $patients
        ]);
    }
}
