<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNursingProcedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNursingProcedureRequest;
use Illuminate\Database\QueryException;

class ChNursingProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNursingProcedure = ChNursingProcedure::select('ch_nursing_procedure.*');
        // ->with('nursing_care_plan');

        if ($request->_sort) {
            $ChNursingProcedure->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNursingProcedure->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChNursingProcedure = $ChNursingProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNursingProcedure = $ChNursingProcedure->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria asociadas exitosamente',
            'data' => ['ch_nursing_procedure' => $ChNursingProcedure]
        ]);
    }


    public function store(ChNursingProcedureRequest $request)
    {

        $ChNursingProcedure = new ChNursingProcedure;
        $ChNursingProcedure->nursing_procedure_id = $request->nursing_procedure_id;
        $ChNursingProcedure->observation = $request->observation;
        $ChNursingProcedure->type_record_id = $request->type_record_id;
        $ChNursingProcedure->ch_record_id = $request->ch_record_id;
        $ChNursingProcedure->save();


        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria creados exitosamente',
            'data' => ['ch_nursing_procedure' => $ChNursingProcedure->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id): JsonResponse
    {

        $ChNursingProcedure = ChNursingProcedure::select('ch_nursing_procedure.*')
            ->where('ch_record_id', $id)
            ->where('ch_nursing_procedure.type_record_id', 1)
            ->with('nursing_procedure');


        if ($request->query("pagination", true) == "false") {
            $ChNursingProcedure = $ChNursingProcedure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNursingProcedure = $ChNursingProcedure->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'procedimientos de enfermeria obtenidos exitosamente',
            'data' => ['ch_nursing_procedure' => $ChNursingProcedure]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChNursingProcedure = ChNursingProcedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Controles de liquidos obtenidos exitosamente',
            'data' => ['ch_nursing_procedure' => $ChNursingProcedure]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNursingProcedureRequest $request, int $id): JsonResponse
    {
        $LiquidControlArray = json_decode($request->care_plans);
        foreach ($LiquidControlArray as $item) {
            $ChNursingProcedure = new ChNursingProcedure;
            $ChNursingProcedure->nursing_care_plan_id = $item;
            $ChNursingProcedure->type_record_id = $request->type_record_id;
            $ChNursingProcedure->ch_record_id = $request->ch_record_id;
            $ChNursingProcedure->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Controles de liquidos actualizados exitosamente',
            'data' => ['ch_nursing_procedure' => $ChNursingProcedure]
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
            $ChNursingProcedure = ChNursingProcedure::find($id);
            $ChNursingProcedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'procedimientos de enfermeria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'procedimientos de enfermeria no es posible eliminarlo'
            ], 423);
        }
    }
}
