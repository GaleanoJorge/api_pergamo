<?php

namespace App\Http\Controllers\Management;

use App\Models\AttendedTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AttendedTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class AttendedTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AttendedTc = AttendedTc::select();

        if ($request->_sort) {
            $AttendedTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AttendedTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $AttendedTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $AttendedTc = $AttendedTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AttendedTc = $AttendedTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Atendidos obtenidos exitosamente',
            'data' => ['attended_tc' => $AttendedTc]
        ]);
    }

    public function store(AttendedTcRequest $request): JsonResponse
    {
        $AttendedTc = new AttendedTc;
        $AttendedTc->phone = $request->phone;
        $AttendedTc->status_call = $request->status_call;
        $AttendedTc->agent = $request->agent;
        $AttendedTc->date_time = $request->date_time;
        $AttendedTc->duration_seg = $request->duration_seg;
        $AttendedTc->uniqueid = $request->uniqueid;
        $AttendedTc->cedula_ruc = $request->cedula_ruc;
        $AttendedTc->first_name = $request->first_name;
        $AttendedTc->last_name = $request->last_name;
        $AttendedTc->observations = $request->observations;
        $AttendedTc->fila = $request->fila;
        $AttendedTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Atendidos creados exitosamente',
            'data' => ['attended_tc' => $AttendedTc->toArray()]
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
        $AttendedTc = AttendedTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Atendidos obtenidos exitosamente',
            'data' => ['attended_tc' => $AttendedTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AttendedTcRequest $request, int $id): JsonResponse
    {
        $AttendedTc = new AttendedTc;
        $AttendedTc->phone = $request->phone;
        $AttendedTc->status_call = $request->status_call;
        $AttendedTc->agent = $request->agent;
        $AttendedTc->date_time = $request->date_time;
        $AttendedTc->duration_seg = $request->duration_seg;
        $AttendedTc->uniqueid = $request->uniqueid;
        $AttendedTc->cedula_ruc = $request->cedula_ruc;
        $AttendedTc->first_name = $request->first_name;
        $AttendedTc->last_name = $request->last_name;
        $AttendedTc->observations = $request->observations;
        $AttendedTc->fila = $request->fila;
        $AttendedTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Atendidos actualizados exitosamente',
            'data' => ['attended_tc' => $AttendedTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $AttendedTc = new AttendedTc;
            if(isset($item['Phone'])){
                $AttendedTc->phone  = $item['Phone'];
            }
            if(isset($item['Status Call'])){
                $AttendedTc->status_call  = $item['Status Call'];
            }
            if(isset($item['Agente'])){
                $AttendedTc->agent  = $item['Agente'];
            }  
            if(isset($item['Date & Time'])){
                $AttendedTc->date_time = $item['Date & Time'];
            }  
            if(isset($item['Duration(Seg)'])){
                $AttendedTc->duration_seg = $item['Duration(Seg)'];
            }
            if(isset($item['Uniqueid'])){
                $AttendedTc->uniqueid = $item['Uniqueid'];
            }
            if(isset($item['Cedula/RUC'])){
                $AttendedTc->cedula_RUC = $item['Cedula/RUC'];
            }
            if(isset($item['First Name'])){
                $AttendedTc->first_name = $item['First Name'];
            }
            if(isset($item['Last Name'])){
                $AttendedTc->last_name = $item['Last Name'];
            }
            if(isset($item['Observaciones'])){
                $AttendedTc->observations = $item['Observaciones'];
            }
            if(isset($item['Cola'])){
                $AttendedTc->fila = $item['Cola'];
            }
            $AttendedTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Atendidos actualizados exitosamente',
            'data' => ['attended_tc' => $AttendedTc]
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
            $AttendedTc = AttendedTc::find($id);
            $AttendedTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Atendidos eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Atendidos estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
