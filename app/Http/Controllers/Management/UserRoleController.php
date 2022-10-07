<?php

namespace App\Http\Controllers\Management;

use Exception;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoleRequest;
use App\Http\Requests\UserRoleCoordinatorRequest;
use App\Http\Requests\UserRoleFormerRequest;
use App\Models\Group;
use App\Models\User;
use App\Models\UserRoleCategoryInscription;
use App\Models\UserRoleCourse;
use App\Models\UserRoleGroup;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return response()->json([
            'status' => true,
            'message' => 'entra',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoles(Request $request)
    {
        
        $deleteUserRoles = UserRole::select('user_role.*')->where('user_id', $request->user_id);
        $deleteUserRoles->delete();

        $array_role = json_decode($request->roles);
        foreach($array_role as $rol){
            $userRole = new UserRole;
            $userRole->role_id = $rol;
            $userRole->user_id = $request->user_id;
            $userRole->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Roles asociados al personal',
            'data' => $userRole->toArray(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $urg = UserRoleGroup::find($id);
            $urg->delete();

            return response()->json([
                'status' => true,
                'message' => 'Discente eliminado del grupo',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El discente ya participo en el grupo.',
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByUserRole(int $userId, $roleId)
    {
        $result = [];
        $userRole = UserRole::where([
            ['user_id', $userId],
            ['role_id', $roleId],
        ])->with(
            'user',
            'user_role_course',
            'user_role_course.course',
            'user_role_course.course.coursebase',
            'user_role_course.course.category',
            'user_role_course.course.category.categories_origin',
            'user_role_course.course.category.categories_origin.origin',
            'user_role_course.course.category.categories_origin.origin.validity',
            'user_role_course.inscription_status',
        )->get()->toArray();
        foreach ($userRole as $key => $ur) {
            foreach ($ur['user_role_course'] as $keyB => $urc) {
                $urg = UserRoleGroup::select('user_role_group.id AS idMain', 'user_role_group.*', 'group.*')
                    ->join('group', 'group.id', 'user_role_group.group_id')
                    ->where([
                        ['user_role_id', $ur['id']],
                        ['group.course_id', $urc['course_id']]
                    ])->get()->toArray();
                foreach ($urg as $keyC => $urgF) {
                    array_push($result, array(
                        "category" => array("name" => $userRole[$key]['user_role_course'][$keyB]['course']['category']['name']),
                        "course" => $userRole[$key]['user_role_course'][$keyB]['course'],
                        "inscription_status" => $urc['inscription_status'],
                        "user_role_group" => $urgF
                    ));
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['user_role' => $result]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByUserRoleCoordinator(int $userId, $roleId)
    {
        $result = [];
        $userRole = UserRole::where([
            ['user_id', $userId],
            ['role_id', $roleId],
        ])->with(
            'user',
            'user_role_course',
            'user_role_course.course',
            'user_role_course.course.coursebase',
            'user_role_course.course.category',
            'user_role_course.course.category.categories_origin',
            'user_role_course.course.category.categories_origin.origin',
            'user_role_course.course.category.categories_origin.origin.validity'
        )->get()->toArray();
        foreach ($userRole as $key => $ur) {
            foreach ($ur['user_role_course'] as $keyB => $urc) {
                array_push($result, array(
                    "category" => array("name" => $userRole[$key]['user_role_course'][$keyB]['course']['category']['name']),
                    "course" => $userRole[$key]['user_role_course'][$keyB]['course'],
                    "inscription_status" => null,
                    "user_role_group" => array("idMain" => $urc['id'])
                ));
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['user_role' => $result]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(UserRoleRequest $request)
    {
        $userRole = UserRole::where([
            ['user_id', $request->user_id],
            ['role_id', $request->role_id],
        ]);

        $group = Group::where('id', $request->group_id);

        if ($userRole->count() == 0) {
            throw new Exception("El discente no esta asociado a este rol", 423);
        }

        if ($group->count() == 0) {
            throw new Exception("El grupo no existe", 423);
        }

        $userRoleCourse = UserRoleCourse::where([
            ['user_role_id', $userRole->first()->id],
            ['course_id', $group->first()->course_id],
        ]);

        if ($userRoleCourse->count() == 0) {
            $userRoleCourse = new UserRoleCourse;
            $userRoleCourse->user_role_id = $userRole->first()->id;
            $userRoleCourse->course_id = $group->first()->course_id;
            $userRoleCourse->inscription_status_id = $request->inscription_status_id;
            $userRoleCourse->is_extraordinary = 1;
            $userRoleCourse->save();
        } else {
            $userRoleCourse = UserRoleCourse::find($userRoleCourse->first()->id);
            $userRoleCourse->inscription_status_id = $request->inscription_status_id;
            $userRoleCourse->updated_at = Carbon::now();
            $userRoleCourse->is_extraordinary = 1;
            $userRoleCourse->save();
        }

        $userRoleGroup = UserRoleGroup::where([
            ['user_role_id', $userRole->first()->id],
            ['group_id', $request->group_id],
        ]);

        if ($userRoleGroup->count() == 0) {
            $userRoleGroup = new UserRoleGroup;
            $userRoleGroup->user_role_id = $userRole->first()->id;
            $userRoleGroup->group_id = $request->group_id;
            $userRoleGroup->status_id = 1;
            $userRoleGroup->save();
        } else {
            $userRoleGroup = UserRoleGroup::find($userRoleGroup->first()->id);
            $userRoleGroup->updated_at = Carbon::now();
            $userRoleGroup->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Discente asociado correctamente',
            'data' => ['user_role' => $userRoleGroup]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCoordinator(UserRoleCoordinatorRequest $request)
    {
        $userRole = UserRole::where([
            ['user_id', $request->user_id],
            ['role_id', $request->role_id],
        ]);

        if ($userRole->count() == 0) {
            throw new Exception("El coordinador no esta asociado a este rol", 423);
        }

        $userRoleCourse = UserRoleCourse::where([
            ['user_role_id', $userRole->first()->id],
            ['course_id', $request->course_id],
        ]);

        if ($userRoleCourse->count() == 0) {
            $userRoleCourse = new UserRoleCourse;
            $userRoleCourse->user_role_id = $userRole->first()->id;
            $userRoleCourse->course_id = $request->course_id;
            $userRoleCourse->inscription_status_id = 1;
            $userRoleCourse->is_extraordinary = 1;
            $userRoleCourse->save();
        } else {
            $userRoleCourse = UserRoleCourse::find($userRoleCourse->first()->id);
            $userRoleCourse->updated_at = Carbon::now();
            $userRoleCourse->is_extraordinary = 1;
            $userRoleCourse->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Coordinador asociado correctamente',
            'data' => ['user_role' => $userRoleCourse]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCoordinator($id)
    {
        try {
            $urg = UserRoleCourse::find($id);
            $urg->delete();

            return response()->json([
                'status' => true,
                'message' => 'Coordinador eliminado del curso',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El coordinador ya participo en el curso.',
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByUserRoleFormer(int $userId, $roleId)
    {
        $user = User::select(
            'category.id AS category_id',
            'category.name AS category_name',
            'inscription_status.name AS inscription_status_name',
            'inscription_status.id AS inscription_status_id',
            'user_role_category_inscription.id AS user_role_category_inscription_id',
            'origin.name AS origin_name',
            'origin.id AS origin_id',
            'validity.id AS validity_id',
            'validity.name AS validity_name',
        )->join('user_role', 'user_role.user_id', 'users.id')
            ->join('user_role_category_inscription', 'user_role_category_inscription.user_role_id', 'user_role.id')
            ->join('category', 'category.id', 'user_role_category_inscription.category_id')
            ->join('inscription_status', 'inscription_status.id', 'user_role_category_inscription.inscription_status_id')
            ->join('categories_origin', 'categories_origin.category_id', 'category.id')
            ->join('origin', 'origin.id', 'categories_origin.origin_id')
            ->join('validity', 'validity.id', 'origin.validity_id')
            ->where([
                ['users.id', $userId],
                ['user_role.role_id', $roleId]
            ])->distinct()->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Usuarios obtenidos exitosamente',
            'data' => ['user_role' => $user]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFormer(UserRoleFormerRequest $request)
    {
        $userRole = UserRole::where([
            ['user_id', $request->user_id],
            ['role_id', $request->role_id],
        ]);

        if ($userRole->count() == 0) {
            throw new Exception("El formador no esta asociado a este rol", 423);
        }

        $uris = UserRoleCategoryInscription::where([
            ['user_role_id', $userRole->first()->id],
            ['category_id', $request->category_id],
        ]);

        if ($uris->count() == 0) {
            $uris = new UserRoleCategoryInscription;
            $uris->user_role_id = $userRole->first()->id;
            $uris->category_id = $request->category_id;
            $uris->inscription_status_id = $request->inscription_status_id;
            $uris->is_extraordinary = 1;
            $uris->save();
        } else {
            $uris = UserRoleCategoryInscription::find($uris->first()->id);
            $uris->updated_at = Carbon::now();
            $uris->inscription_status_id = $request->inscription_status_id;
            $uris->is_extraordinary = 1;
            $uris->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Formador asociado correctamente',
            'data' => ['user_role' => $uris]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFormer($id)
    {
        try {
            $urg = UserRoleCategoryInscription::find($id);
            $urg->delete();

            return response()->json([
                'status' => true,
                'message' => 'Formador eliminado del programa',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El formador ya participo en el programa.',
            ], 423);
        }
    }
}
