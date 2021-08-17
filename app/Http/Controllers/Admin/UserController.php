<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Notifications;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserRoleCourse;
use App\Models\UserRoleCategoryInscription;
use App\Models\Curriculum;
use App\Models\UserUser;

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
use Beta\Microsoft\Graph\Model\Currency;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        )->Join('user_role', 'users.id', 'user_role.user_id')->with(
            'status',
            'gender',
            'academic_level',
            'identification_type'
        )->where('user_role.role_id', $roleId)
            ->join('status', 'status.id', '=', 'users.status_id')
            ->join('identification_type', 'identification_type.id', '=', 'users.identification_type_id');

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

        $user = new User;
        $user->status_id = $request->status_id;
        $user->gender_id = $request->gender_id;
        $user->academic_level_id = $request->academic_level_id;
        $user->identification_type_id = $request->identification_type_id;
        $user->birthplace_municipality_id = $request->birthplace_municipality_id;
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
                'roles'
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

        if ($request->gender_id==3) {
            $user->gender_type = $request->gender_type;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();


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

        if ($request->query("activo", true) === "true") {
            $positions = Position::where('status_id', 1)->get();
            $specialties = Specialty::where('status_id', 1)->get();
        } else {
            $positions = Position::get();
            $specialties = Specialty::get();
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
                'positions' => $positions->toArray(),
                'status' => $status->toArray(),
                'specialties' => $specialties->toArray(),
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
