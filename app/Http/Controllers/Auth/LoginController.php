<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\LogLogin;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Guard for authenticate
     *
     * @var string
     */
    protected $guard;

    /**
     * Injection of dependences
     */
    public function __construct()
    {
        $this->guard = "api";
    }

    /**
     * Generate authentication
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth($this->guard)->attempt($credentials)) {

            return response()->json([
                'error' => 'CREDENTIAL_INVALID',
                'msg' => 'Credenciales incorrectas',
            ], 401);
        }

        $user = User::where('username', $request->username)
            ->with('roles')
            ->select('id', 'status_id', 'email_verified_at')
            ->get()->first();

        if ($user->status_id == 2) {

            return response()->json([
                'error' => 'Usuario inactivo',
                'msg' => 'El usuario esta inactivo',
            ], 401);
        }

        // if ($user->email_verified_at == NULL) {

        //     return response()->json([
        //         'error' => 'Usuario no verificado',
        //         'msg' => 'Debe verificar su correo',
        //     ], 401);
        // }

        $rolesCount = $user->roles->count();

        if ($rolesCount == 0) {

            throw new Exception(
                'No tiene asignado ningún rol, contacte al administrador',
                423
            );
        }
        else if ($rolesCount == 1) {
            $logLogin = new LogLogin;
            $logLogin->user_id = $user->id;
            $logLogin->role_id = $user->roles->first()->id;
            $logLogin->save();
        }
        return $this->respondWithToken($token);
    }


    /**
     * Generate authentication
     *
     * @return JsonResponse
     */
    public function loginJWH(LoginRequest $request): JsonResponse
    {
       // $credentials = request(['username', 'password']);

        $user= Auth::loginUsingId($request->id);


        if (!$token=auth($this->guard)->login($user)) {

            return response()->json([
                'error' => 'CREDENTIAL_INVALID',
                'msg' => 'Credenciales incorrectas ',
            ], 401);
        }

        $user = User::where('username', $request->username)
                ->with('roles')
                ->select('id')
                ->get()->first();

            $rolesCount = $user->roles->count();

        if ($rolesCount == 0) {

            throw new Exception(
                'No tiene asignado ningún rol, contacte al administrador',
                423
            );
        } else if ($rolesCount == 1) {
            $logLogin = new LogLogin;
            $logLogin->user_id = $user->id;
            $logLogin->role_id = $user->roles->first()->id;
            $logLogin->save();
        }

        return $this->respondWithToken($token);
    }


    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth($this->guard)->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth($this->guard)->logout();

        return response()->json(['msg' => 'Cerró sesión exitosamente']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth($this->guard)->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get user authenticate with roles
     *
     * @return JsonResponse
     */
    public function getRolesUserAuth(): JsonResponse
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->with('roles')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuario con roles obtenido exitosamente',
            'data' => ['user' => $user]
        ]);
    }

    /**
     * Register log in change the role of user authenticated
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function changeRoleUserAuth(int $roleId): JsonResponse
    {
        $logLogin = new LogLogin;
        $logLogin->user_id = Auth::user()->id;
        $logLogin->role_id = $roleId;
        $logLogin->save();

        return response()->json([
            'status' => true,
            'message' => 'Cambio de rol en sesión realizado exitosamente',
        ]);
    }
}
