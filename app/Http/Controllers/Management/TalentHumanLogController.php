<?php

namespace App\Http\Controllers\Management;

use App\Models\TalentHumanLog;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TalentHumanLogRequest;
use Illuminate\Database\QueryException;

class TalentHumanLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TalentHumanLog = TalentHumanLog::select();

        if ($request->_sort) {
            $TalentHumanLog->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $TalentHumanLog->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->talent_human_action_id) {
            $TalentHumanLog->where('talent_human_action_id', $request->talent_human_action_id);
        }

        if ($request->talent_human_user_id) {
            $TalentHumanLog->where('talent_human_user_id', $request->talent_human_user_id);
        }

        if ($request->user_id) {
            $TalentHumanLog->where('user_id', $request->user_id);
        }

        if ($request->query("pagination", true) == "false") {
            $TalentHumanLog = $TalentHumanLog->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $TalentHumanLog = $TalentHumanLog->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['talent_human_log' => $TalentHumanLog]
        ]);
    }

    public function store(TalentHumanLogRequest $request): JsonResponse
    {
        $TalentHumanLog = new TalentHumanLog;
        $TalentHumanLog->talent_human_action_id = $request->talent_human_action_id;
        $TalentHumanLog->talent_human_user_id = $request->talent_human_user_id;
        $TalentHumanLog->user_id = $request->user_id;
        $TalentHumanLog->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['talent_human_log' => $TalentHumanLog]
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
        $TalentHumanLog = TalentHumanLog::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['talent_human_log' => $TalentHumanLog]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TalentHumanLogRequest $request, int $id): JsonResponse
    {

        $TalentHumanLog = TalentHumanLog::find($id);
        $TalentHumanLog->talent_human_action_id = $request->talent_human_action_id;
        $TalentHumanLog->talent_human_user_id = $request->talent_human_user_id;
        $TalentHumanLog->user_id = $request->user_id;
        $TalentHumanLog->save();


        return response()->json([
            'status' => true,
            'message' => 'facturas actualizadas exitosamente',
            'data' => ['talent_human_log' => $TalentHumanLog]
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
            $TalentHumanLogDelete = TalentHumanLog::where('procedure_id', $id);
            $TalentHumanLogDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'facturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'facturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
