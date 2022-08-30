<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistanceProcedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceProcedureRequest;
use Illuminate\Database\QueryException;

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
    public function updateAgreement(AssistanceProcedureRequest $request): JsonResponse
    {

        $deleteAssistanceProcedure = AssistanceProcedure::select('assistance_procedure.*')->where('user_id', $request->user_id)->get()->toArray();

        if (sizeof($deleteAssistanceProcedure) > 0) {
            foreach ($deleteAssistanceProcedure as $item) {
                $AssistanceProcedure = AssistanceProcedure::find($item['id']);
                $AssistanceProcedure->delete();
            }
            $array_companies = json_decode($request->companies);
            foreach ($array_companies as $company) {
                $AssistanceProcedure = new AssistanceProcedure;
                $AssistanceProcedure->company_id = $company;
                $AssistanceProcedure->user_id = $request->user_id;
                $AssistanceProcedure->save();
            }
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
