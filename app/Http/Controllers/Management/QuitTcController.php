<?php

namespace App\Http\Controllers\Management;

use App\Models\QuitTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuitTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class QuitTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $QuitTc = QuitTc::select();

        if ($request->_sort) {
            $QuitTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $QuitTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $QuitTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $QuitTc = $QuitTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $QuitTc = $QuitTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Abandonados obtenidos exitosamente',
            'data' => ['quit_tc' => $QuitTc]
        ]);
    }

    public function store(QuitTcRequest $request): JsonResponse
    {
        $QuitTc = new QuitTc;
        $QuitTc->phone = $request->phone;
        $QuitTc->status_call = $request->status_call;
        $QuitTc->agent = $request->agent;
        $QuitTc->date_time = $request->date_time;
        $QuitTc->duration_seg = $request->duration_seg;
        $QuitTc->uniqueid = $request->uniqueid;
        $QuitTc->cedula_ruc = $request->cedula_ruc;
        $QuitTc->first_name = $request->first_name;
        $QuitTc->last_name = $request->last_name;
        $QuitTc->observations = $request->observations;
        $QuitTc->fila = $request->fila;
        $QuitTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Abandonados creados exitosamente',
            'data' => ['quit_tc' => $QuitTc->toArray()]
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
        $QuitTc = QuitTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Abandonados obtenidos exitosamente',
            'data' => ['quit_tc' => $QuitTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(QuitTcRequest $request, int $id): JsonResponse
    {
        $QuitTc = new QuitTc;
        $QuitTc->phone = $request->phone;
        $QuitTc->status_call = $request->status_call;
        $QuitTc->agent = $request->agent;
        $QuitTc->date_time = $request->date_time;
        $QuitTc->duration_seg = $request->duration_seg;
        $QuitTc->uniqueid = $request->uniqueid;
        $QuitTc->cedula_ruc = $request->cedula_ruc;
        $QuitTc->first_name = $request->first_name;
        $QuitTc->last_name = $request->last_name;
        $QuitTc->observations = $request->observations;
        $QuitTc->fila = $request->fila;
        $QuitTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Abandonados actualizados exitosamente',
            'data' => ['quit_tc' => $QuitTc]
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

            $QuitTc = new QuitTc;
            if(isset($item['Phone'])){
                $QuitTc->phone  = $item['Phone'];
            }
            if(isset($item['Status Call'])){
                $QuitTc->status_call  = $item['Status Call'];
            }
            if(isset($item['Agente'])){
                $QuitTc->agent  = $item['Agente'];
            }  
            if(isset($item['Date & Time'])){
                $QuitTc->date_time = $item['Date & Time'];
            }  
            if(isset($item['Duration(Seg)'])){
                $QuitTc->duration_seg = $item['Duration(Seg)'];
            }
            if(isset($item['Uniqueid'])){
                $QuitTc->uniqueid = $item['Uniqueid'];
            }
            if(isset($item['Cedula/RUC'])){
                $QuitTc->cedula_RUC = $item['Cedula/RUC'];
            }
            if(isset($item['First Name'])){
                $QuitTc->first_name = $item['First Name'];
            }
            if(isset($item['Last Name'])){
                $QuitTc->last_name = $item['Last Name'];
            }
            if(isset($item['Observaciones'])){
                $QuitTc->observations = $item['Observaciones'];
            }
            if(isset($item['Cola'])){
                $QuitTc->fila = $item['Cola'];
            }
            $QuitTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Abandonados actualizados exitosamente',
            'data' => ['quit_tc' => $QuitTc]
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
            $QuitTc = QuitTc::find($id);
            $QuitTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Abandonados eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Abandonados estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
