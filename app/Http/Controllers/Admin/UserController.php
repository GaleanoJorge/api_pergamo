<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Notifications;
use App\Models\User;
use App\Models\UserRole;
use App\Models\ContractType;
use App\Models\Assistance;
use App\Models\UserRoleCourse;
use App\Models\UserRoleCategoryInscription;
use App\Models\Curriculum;
use App\Models\StudyLevelStatus;
use App\Models\Activities;
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
use App\Models\Specialty;
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
use App\Models\CostCenter;
use App\Models\SpecialField;
use App\Models\TypeProfessional;
use App\Models\ObservationNovelty;
use App\Models\UserChange;
use Beta\Microsoft\Graph\Model\Currency;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

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
            \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )  ->Join('user_role', 'users.id', 'user_role.user_id')
        ->with(
            'status',
            'gender',
            'academic_level',
            'identification_type',
            'admissions',
            'admissions.location','admissions.contract',
            'admissions.campus','admissions.location.admission_route','admissions.location.scope_of_attention','admissions.location.program','admissions.location.flat','admissions.location.pavilion','admissions.location.bed'
        )->where('user_role.role_id', $roleId)
            ->join('status', 'status.id', '=', 'users.status_id')
            ->join('identification_type', 'identification_type.id', '=', 'users.identification_type_id');

          

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }
        if($request->identification){
            $users->where('identification','!=',$request->identification);
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
    public function indexByPacient(Request $request): JsonResponse
    {

        $users = DB::select('SELECT users.*, b.fecha FROM users JOIN user_role ON users.id = user_role.user_id LEFT JOIN (SELECT admissions.discharge_date AS fecha, admissions.id AS id FROM admissions ORDER BY admissions.id) b ON users.id = b.id WHERE user_role.role_id =2');
        //$users = collect($users);
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
            \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
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
            \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->with(
            'status',
            'gender',
            'academic_level',
            'identification_type',
            'user_role',
            'user_role.role'
        );

        if ($roleId > 0) {
            $users->Join('user_role', 'users.id', 'user_role.user_id');
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
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {

        \DB::beginTransaction();
        $validate = User::Where('identification', $request->identification);
        $validate_wrong_user = UserChange::Join('users', 'users.id', 'user_change.wrong_user_id')->Where('users.identification', $request->identification);
        if($validate){
            if($validate_wrong_user){
                $user = new User;
                $user->status_id = $request->status_id;
                $user->gender_id = $request->gender_id;
                $user->academic_level_id = $request->academic_level_id;
                $user->identification_type_id = $request->identification_type_id;
                $user->birthplace_municipality_id = $request->birthplace_municipality_id;
                $user->birthplace_country_id = $request->birthplace_country_id;
                $user->birthplace_region_id = $request->birthplace_region_id;
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
                $user->landline = $request->landline;
                $user->ethnicity_id = $request->ethnicity_id;
                $user->save();

                $userRole = new UserRole;
                $userRole->role_id = $request->role_id;
                $userRole->user_id = $user->id;
                $userRole->save(); 
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario exístente con este número de cedula',
                ]);

            }

        }else{
        $user = new User;
        $user->status_id = $request->status_id;
        $user->gender_id = $request->gender_id;
        $user->academic_level_id = $request->academic_level_id;
        $user->identification_type_id = $request->identification_type_id;
        $user->birthplace_municipality_id = $request->birthplace_municipality_id;
        $user->birthplace_country_id = $request->birthplace_country_id;
        $user->birthplace_region_id = $request->birthplace_region_id;
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
        $user->landline = $request->landline;
        $user->ethnicity_id = $request->ethnicity_id;
        $user->save();

        if($request->role_id==3){
            $assistance= new Assistance;
            $assistance->user_id=$user->id;

            $assistance->medical_record=$request->medical_record;
            $assistance->contract_type_id=$request->contract_type_id;
            $assistance->cost_center_id=$request->cost_center_id;
            $assistance->type_professional_id=$request->type_professional_id;
            $assistance->attends_external_consultation=$request->attends_external_consultation;
            $assistance->serve_multiple_patients=$request->serve_multiple_patients;
            
            if ($request->file('file_firm')) {
                $path = Storage::disk('public')->put('file_firm', $request->file('file_firm'));
                $assistance->file_firm = $path;
            }
            $assistance->save();

            if(sizeof($request->special_field) > 0){
                foreach($request->special_field as $item){
                    $assistanceSpecial = new AssistanceSpecial;
                    $assistanceSpecial->special_field_id = $item;
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

        \DB::commit();

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
            'data' => ['user' => $user]
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
        $user = User::select('users.*', 'municipality.region_id', 'region.country_id',
        \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )
            ->leftJoin('municipality', 'municipality.id', 'users.birthplace_municipality_id')
            ->leftJoin('region', 'region.id', 'municipality.region_id')
            ->where('users.id', $id)->with(
                'status',
                'gender',
                'academic_level',
                'identification_type',
                'municipality',
                'roles',
                'assistance',
                'assistance.special_field'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Usuario obtenido exitosamente',
            'data' => ['user' => $user]
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
    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
         

        \DB::beginTransaction();

        $user = User::find($id);
        $user->status_id = $request->status_id;
        $user->gender_id = $request->gender_id;
        $user->academic_level_id = $request->academic_level_id;
        $user->identification_type_id = $request->identification_type_id;
        $user->birthplace_municipality_id = $request->birthplace_municipality_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->middlefirstname = $request->middlefirstname;
        $user->lastname = $request->lastname;
        $user->middlelastname = $request->middlelastname;
        $user->identification = $request->identification;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->landline = $request->landline;
        $user->ethnicity_id = $request->ethnicity_id;
        $user->is_disability = $request->is_disability;
        $user->disability = $request->disability;
        $user->residence_country_id = $request -> residence_country_id;

        if ($request->gender_id==3) {
            $user->gender_type = $request->gender_type;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if($request->role_id==3){
            $assistance= Assistance::find($request->assistance_id);
            $assistance->medical_record=$request->medical_record;
            $assistance->contract_type_id=$request->contract_type_id;
            $assistance->cost_center_id=$request->cost_center_id;
            $assistance->type_professional_id=$request->type_professional_id;
            $assistance->attends_external_consultation=$request->attends_external_consultation;
            $assistance->serve_multiple_patients=$request->serve_multiple_patients;
            
            if ($request->file('file_firm')) {
                $path = Storage::disk('public')->put('file_firm', $request->file('file_firm'));
                $assistance->file_firm = $path;
            }
            $assistance->save();

            if($request->special_field == null){
                //if(sizeof($request->special_field) != 0 ){
                foreach($request->special_field as $item){
                    $assistanceSpecial = new AssistanceSpecial;
                    $assistanceSpecial->special_field_id = $item;
                    $assistanceSpecial->assistance_id = $assistance->id;    
                    $assistanceSpecial->save();
                }
            //}
            }

        }


        \DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Usuario actualizado exitosamente',
            'data' => ['user' => $user]
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
        $academicLevels = AcademicLevel::get();
        $countries = Country::get();
        $genders = Gender::get();
        $ethnicitys = Ethnicity::get();
        $identificationTypes = IdentificationType::get();
        $status = Status::get();
        $study_level_status = StudyLevelStatus::get();
        $activities = Activities::get();
        $select_RH = SelectRh::get();
        $population_group = PopulationGroup::get();
        $marital_status = MaritalStatus::get();
        $contract_type = ContractType::get();
        $cost_center = CostCenter::get();
        $type_professional = TypeProfessional::get();
        //$observation_novelty = ObservationNovelty::get();
        $special_field = SpecialField::where('type_professional_id',$request->type_professional_id);
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
                'genders' => $genders->toArray(),
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
                'special_field' => $special_field->get()->toArray(),
                //'observation_novelty' => $observation_novelty->get()->toArray(),

            ]
        ]);
    }

    public function changeStatus(int $id): JsonResponse
    {
        $user = User::find($id);
        $status_id = User::where('id', $id)->get()->first()->status_id;
        if ($status_id == 1) {
            $user->status_id = 2;
        } else {
            $user->status_id = 1;
        }
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
