<?php

namespace App\Http\Controllers\Management;

use App\Models\TalentHumanAction;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TalentHumanActionRequest;
use Illuminate\Database\QueryException;

class TalentHumanActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TalentHumanAction = TalentHumanAction::select();

        if ($request->_sort) {
            $TalentHumanAction->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $TalentHumanAction->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $TalentHumanAction = $TalentHumanAction->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $TalentHumanAction = $TalentHumanAction->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['talent_human_action' => $TalentHumanAction]
        ]);
    }

    public function store(TalentHumanActionRequest $request): JsonResponse
    {
        $TalentHumanAction = new TalentHumanAction;
        $TalentHumanAction->name = $request->name;
        $TalentHumanAction->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['talent_human_action' => $TalentHumanAction]
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
        $TalentHumanAction = TalentHumanAction::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['talent_human_action' => $TalentHumanAction]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TalentHumanActionRequest $request, int $id): JsonResponse
    {

        $TalentHumanAction = TalentHumanAction::find($id);
        $TalentHumanAction->name = $request->name;
        $TalentHumanAction->save();


        return response()->json([
            'status' => true,
            'message' => 'facturas actualizadas exitosamente',
            'data' => ['talent_human_action' => $TalentHumanAction]
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
            $TalentHumanActionDelete = TalentHumanAction::where('procedure_id', $id);
            $TalentHumanActionDelete->delete();

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
