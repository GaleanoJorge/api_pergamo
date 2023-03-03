<?php

namespace App\Http\Controllers\Management;

use App\Models\PareBaseTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PareBaseTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PareBaseTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PareBaseTc = PareBaseTc::select();

        if ($request->_sort) {
            $PareBaseTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PareBaseTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $PareBaseTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $PareBaseTc = $PareBaseTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PareBaseTc = $PareBaseTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Base pura obtenida exitosamente',
            'data' => ['pare_base_tc' => $PareBaseTc]
        ]);
    }

    public function store(PareBaseTcRequest $request): JsonResponse
    {
        $PareBaseTc = new PareBaseTc;
        $PareBaseTc->phone = $request->phone;
        $PareBaseTc->status_call = $request->status_call;
        $PareBaseTc->agent = $request->agent;
        $PareBaseTc->date_time = $request->date_time;
        $PareBaseTc->duration_seg = $request->duration_seg;
        $PareBaseTc->uniqueid = $request->uniqueid;
        $PareBaseTc->cedula_ruc = $request->cedula_ruc;
        $PareBaseTc->first_name = $request->first_name;
        $PareBaseTc->last_name = $request->last_name;
        $PareBaseTc->observations = $request->observations;
        $PareBaseTc->fila = $request->fila;
        $PareBaseTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Base pura creada exitosamente',
            'data' => ['pare_base_tc' => $PareBaseTc->toArray()]
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
        $PareBaseTc = PareBaseTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Base pura obtenida exitosamente',
            'data' => ['pare_base_tc' => $PareBaseTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PareBaseTcRequest $request, int $id): JsonResponse
    {
        $PareBaseTc = new PareBaseTc;
        $PareBaseTc->phone = $request->phone;
        $PareBaseTc->status_call = $request->status_call;
        $PareBaseTc->agent = $request->agent;
        $PareBaseTc->date_time = $request->date_time;
        $PareBaseTc->duration_seg = $request->duration_seg;
        $PareBaseTc->uniqueid = $request->uniqueid;
        $PareBaseTc->cedula_ruc = $request->cedula_ruc;
        $PareBaseTc->first_name = $request->first_name;
        $PareBaseTc->last_name = $request->last_name;
        $PareBaseTc->observations = $request->observations;
        $PareBaseTc->fila = $request->fila;
        $PareBaseTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Base pura actualizada exitosamente',
            'data' => ['pare_base_tc' => $PareBaseTc]
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

            $PareBaseTc = new PareBaseTc;
            if(isset($item['Phone'])){
                $PareBaseTc->phone  = $item['Phone'];
            }
            if(isset($item['Status Call'])){
                $PareBaseTc->status_call  = $item['Status Call'];
            }
            if(isset($item['Agente'])){
                $PareBaseTc->agent  = $item['Agente'];
            }  
            if(isset($item['Date & Time'])){
                $PareBaseTc->date_time = $item['Date & Time'];
            }  
            if(isset($item['Duration(Seg)'])){
                $PareBaseTc->duration_seg = $item['Duration(Seg)'];
            }
            if(isset($item['Uniqueid'])){
                $PareBaseTc->uniqueid = $item['Uniqueid'];
            }
            if(isset($item['Cedula-RUC'])){
                $PareBaseTc->cedula_RUC = $item['Cedula-RUC'];
            }
            if(isset($item['First Name'])){
                $PareBaseTc->first_name = $item['First Name'];
            }
            if(isset($item['Last Name'])){
                $PareBaseTc->last_name = $item['Last Name'];
            }
            if(isset($item['Observaciones'])){
                $PareBaseTc->observations = $item['Observaciones'];
            }
            if(isset($item['Cola'])){
                $PareBaseTc->fila = $item['Cola'];
            }
            $PareBaseTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Base pura actualizada exitosamente',
            'data' => ['pare_base_tc' => $PareBaseTc]
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
            $PareBaseTc = PareBaseTc::find($id);
            $PareBaseTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Base pura eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Base pura esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
