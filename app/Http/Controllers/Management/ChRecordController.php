<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRecord;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\AssignedManagementPlan;
use Carbon\Carbon;

class ChRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRecord = ChRecord::select();

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->record_id) {
            $ChRecord->where('id',$request->record_id );
        }


        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_record' => $ChRecord]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id, int $id2): JsonResponse
    {
        $ChRecord = ChRecord::where('admissions_id', $id)->where('assigned_management_plan_id',$id2);

        if ($request->_sort) {
            $ChRecord->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecord->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRecord = $ChRecord->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRecord = $ChRecord->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_record' => $ChRecord]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChRecord = new ChRecord;
        $ChRecord->status = $request->status;
        $ChRecord->date_attention = Carbon::now();
        $ChRecord->admissions_id = $request->admissions_id;
        $ChRecord->assigned_management_plan_id = $request->assigned_management_plan;
        $ChRecord->user_id = Auth::user()->id;
        $ChRecord->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente asociado al paciente exitosamente',
            'data' => ['ch_record' => $ChRecord->toArray()]
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
        $ChRecord = ChRecord::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenido exitosamente',
            'data' => ['ch_record' => $ChRecord]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChRecord = ChRecord::find($id);
        $ChRecord->status = $request->status;
        $ChRecord->date_finish = Carbon::now();
        $ChRecord->save();

        $ChRecord = ChRecord::find($id)->get()->toArray();

        $assigned= AssignedManagementPlan::find($ChRecord[0]['assigned_management_plan_id']);
        $assigned->execution_date= Carbon::now();
        $assigned->save();


        

        return response()->json([
            'status' => true,
            'message' => 'Registro paciente actualizado exitosamente',
            'data' => ['ch_record' => $ChRecord]
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
            $ChRecord = ChRecord::find($id);
            $ChRecord->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro paciente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro paciente en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
