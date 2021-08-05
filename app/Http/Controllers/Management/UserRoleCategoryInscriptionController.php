<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Requests\UserRoleCategoryInscriptionRequest;

use App\Models\UserRoleCategoryInscription;
use App\Models\UserRole;

use Notifications;

class UserRoleCategoryInscriptionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $users = UserRole::with(['categories' => function ($query){
            $query->orderBy('updated_at', 'desc');
        }])
            ->select('users.email', 'user_role.id', 'users.identification',
                \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
                , 'specialty.name AS specialty', 'municipality.name AS municipality'
                , 'entity.name AS entity', 'position.name AS position'
            )
            ->Join('users', 'users.id', 'user_role.user_id')
            ->Join('curriculum', 'users.id', 'curriculum.user_id')
            ->leftJoin('specialty', 'specialty.id', 'curriculum.specialty_id')
            ->leftJoin('municipality', 'municipality.id', 'curriculum.municipality_id')
            ->leftJoin('entity', 'entity.id', 'curriculum.entity_id')
            ->leftJoin('position', 'position.id', 'curriculum.position_id')
            ->where('user_role.role_id', 4)
            ->where('curriculum.inactive', 0);
        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
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

    public function indexTrainersByCourse(Request $request): JsonResponse
    {
        $users = UserRoleCategoryInscription::select(
            'users.email', 'user_role_category_inscription.id', 'users.identification',
            'user_role_category_inscription.user_role_id',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
        )->Join('user_role', 'user_role.id', 'user_role_category_inscription.user_role_id')
            ->Join('users', 'users.id', 'user_role.user_id')
            ->Join('course', 'course.category_id', 'user_role_category_inscription.category_id');

        if ($request->_sort) {
            $users->orderBy($request->_sort, $request->_order);
        }

        if ($request->course_id) {
            $users->where('course.id', $request->course_id);
        }

        if ($request->inscription_status_id) {
            $users->where('inscription_status_id', $request->inscription_status_id);
        }

        if ($request->search) {
            $users->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%');
            });
        }
        $users->groupBy('users.id');

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
            'data' => ['trainers' => $users]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            if ($request->categories_inscription) {
                \DB::beginTransaction();
                foreach ($request->categories_inscription as $row) {
                    $categoryInscripcion = new UserRoleCategoryInscription;
                    $categoryInscripcion->user_role_id = $row["user_role_id"];
                    $categoryInscripcion->category_id = $row["category_id"];
                    $categoryInscripcion->inscription_status_id = (@$row["inscription_status_id"]) ? @$row["inscription_status_id"] : NULL;
                    $categoryInscripcion->observation = (@$row["observation"]) ? @$row["observation"] : NULL;
                    $categoryInscripcion->save();
                }
                \DB::commit();
            }

            return response()->json([
                'status' => true,
                'message' => 'Inscripción a programas creada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => true,
                'message' => 'Ops! algo a fallado'
            ]);
        }
    }

    public function update(UserRoleCategoryInscriptionRequest $request, int $id): JsonResponse
    {
        $categoryInscripcion = UserRoleCategoryInscription::with('user_role.user', 'category')->find($id);
        $categoryInscripcion->user_role_id = $request->user_role_id;
        $categoryInscripcion->category_id = $request->category_id;
        $categoryInscripcion->inscription_status_id = (@$request->inscription_status_id) ? @$request->inscription_status_id : NULL;
        $categoryInscripcion->observation = (@$request->observation) ? @$request->observation : NULL;
        $categoryInscripcion->save();
        $category = $categoryInscripcion->category->name;
        if ($categoryInscripcion->inscription_status_id == 1) {
            // Notificación:
            $shippingConfirmation = Notifications::sendNotification(
                $categoryInscripcion->user_role->user->email,
                'mails.admittedTrainer',
                'Proceso de Admisión como formador Escuela Judicial Rodrigo Lara Bonilla',
                [
                    'name' => $categoryInscripcion->user_role->user->firstname . ' ' . $categoryInscripcion->user_role->user->lastname,
                    'category' => $category

                ]
            );
        } else if ($categoryInscripcion->inscription_status_id == 2) {
            $shippingConfirmation = Notifications::sendNotification(
                $categoryInscripcion->user_role->user->email,
                'mails.trainerNotAdmitted',
                'Proceso de Admisión como formador "Escuela Judicial Rodrigo Lara Bonilla"',
                [

                    'name' => $categoryInscripcion->user_role->user->firstname . ' ' . $categoryInscripcion->user_role->user->lastname,
                    'category' => $category
                ]
            );
        }
        return response()->json([
            'status' => true,
            'message' => 'Inscripción a programa actualizada exitosamente',
            'data' => ['categoryInscripcion' => $categoryInscripcion]
        ]);
    }
}
