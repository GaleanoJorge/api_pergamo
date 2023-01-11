<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceProcedureRequest;
use App\Models\AssistanceProcedure;
use Illuminate\Database\QueryException;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AssistanceProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AssistanceProcedure = AssistanceProcedure::select('assistance_procedure.*');

        if ($request->user_id) {
            $AssistanceProcedure->where('user_id', $request->user_id);
        }

        if ($request->procedure_id) {
            $AssistanceProcedure
                ->select(
                    'assistance_procedure.*',
                    DB::raw('CONCAT_WS(" ",users.lastname,users.middlelastname,users.firstname,users.middlefirstname) AS nombre_completo')
                )
                ->leftJoin('assistance', 'assistance_procedure.assistance_id', 'assistance.id')
                ->leftJoin('users', 'assistance.user_id', 'users.id')
                ->leftJoin('medical_diary', 'assistance.id', 'medical_diary.assistance_id')
                ->leftJoin('medical_diary_days', 'medical_diary.id', 'medical_diary_days.medical_diary_id')
                // ->where('medical_diary_days.medical_status_id', 1)
                ->groupBy('assistance.id')
                ->where('assistance_procedure.procedure_id', $request->procedure_id)
                ->whereNotNull('medical_diary.id')
                ->with(
                    'assistance.user.user_role.role'
                );
        }

        if($request->medical_status_id && $request->medical_status_id != 'null'){
            $AssistanceProcedure
                ->where('medical_diary_days.medical_status_id', $request->medical_status_id);
        }

        if ($request->campus_id && $request->campus_id != 'null'  && $request->campus_id != 'undefined') {
            $AssistanceProcedure->where('campus_id', $request->campus_id);
        }

        if ($request->init_date != 'null' && isset($request->init_date)) {
            $init_date = Carbon::parse($request->init_date);
            $AssistanceProcedure
                ->where('medical_diary_days.start_hour', '>=', $init_date);
        }

        if ($request->finish_date != 'null' && isset($request->finish_date)) {
            $finish_date = new DateTime($request->finish_date . 'T23:59:59.9');
            $AssistanceProcedure->where('medical_diary_days.finish_hour', '<=', $finish_date);
        }


        if ($request->_sort) {
            $AssistanceProcedure->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AssistanceProcedure->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $AssistanceProcedure = $AssistanceProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AssistanceProcedure = $AssistanceProcedure->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Procedimiento del usuario obtenidos exitosamente',
            'data' => ['assistance_procedure' => $AssistanceProcedure]
        ]);
    }


    public function store(AssistanceProcedureRequest $request): JsonResponse
    {
        $AssistanceProcedure = new AssistanceProcedure;
        $AssistanceProcedure->name = $request->name;
        $AssistanceProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento del usuario creado exitosamente',
            'data' => ['assistance_procedure' => $AssistanceProcedure->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $AssistanceProcedure = AssistanceProcedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento del usuario obtenido exitosamente',
            'data' => ['assistance_procedure' => $AssistanceProcedure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AssistanceProcedureRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistanceProcedureRequest $request, int $id): JsonResponse
    {
        $AssistanceProcedure = AssistanceProcedure::find($id);
        $AssistanceProcedure->name = $request->name;
        $AssistanceProcedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos del asistencial actualizado exitosamente',
            'data' => ['assistance_procedure' => $AssistanceProcedure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AssistanceProcedureRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function updateCups(AssistanceProcedureRequest $request): JsonResponse
    {

        $deleteAssistanceProcedure = AssistanceProcedure::select('assistance_procedure.*')
            ->where('assistance_id', $request->assistance_id)->get()->toArray();

        if (sizeof($deleteAssistanceProcedure) > 0) {
            foreach ($deleteAssistanceProcedure as $item) {
                $AssistanceProcedure = AssistanceProcedure::find($item['id']);
                $AssistanceProcedure->delete();
            }
        }
        $array_procedure = json_decode($request->procedure);
        foreach ($array_procedure as $procedures) {
            $AssistanceProcedure = new AssistanceProcedure;
            // var_dump($procedures);
            $AssistanceProcedure->procedure_id = $procedures;
            $AssistanceProcedure->assistance_id = $request->assistance_id;
            $AssistanceProcedure->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos asociados al convenio exitosamente',
            'data' => ['assistance_procedure' => $AssistanceProcedure]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $AssistanceProcedure = AssistanceProcedure::find($id);
            $AssistanceProcedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Procedimiento del assistencial eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Procedimiento del usuario en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
