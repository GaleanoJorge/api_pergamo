<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistantTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistantTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class AssistantTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AssistantTc = AssistantTc::select();

        if ($request->_sort) {
            $AssistantTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AssistantTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $AssistantTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $AssistantTc = $AssistantTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AssistantTc = $AssistantTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidos exitosamente',
            'data' => ['assistant_tc' => $AssistantTc]
        ]);
    }

    public function store(AssistantTcRequest $request): JsonResponse
    {
        $AssistantTc = new AssistantTc;
        $AssistantTc->agent_number = $request->agent_number;
        $AssistantTc->agent_name = $request->agent_name;
        $AssistantTc->hold = $request->hold;
        $AssistantTc->lunch = $request->lunch;
        $AssistantTc->break_am = $request->break_am;
        $AssistantTc->break_pm = $request->break_pm;
        $AssistantTc->outgoing_call = $request->outgoing_call;
        $AssistantTc->bathroom = $request->bathroom;
        $AssistantTc->whatsapp = $request->whatsapp;
        $AssistantTc->user_attention = $request->user_attention;
        $AssistantTc->meeting = $request->meeting;
        $AssistantTc->total = $request->total ;
        $AssistantTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares creados exitosamente',
            'data' => ['assistant_tc' => $AssistantTc->toArray()]
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
        $AssistantTc = AssistantTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares de facturas obtenidos exitosamente',
            'data' => ['assistant_tc' => $AssistantTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistantTcRequest $request, int $id): JsonResponse
    {
        $AssistantTc = new AssistantTc;
        $AssistantTc->agent_number = $request->agent_number;
        $AssistantTc->agent_name = $request->agent_name;
        $AssistantTc->hold = $request->hold;
        $AssistantTc->lunch = $request->lunch;
        $AssistantTc->break_am = $request->break_am;
        $AssistantTc->break_pm = $request->break_pm;
        $AssistantTc->outgoing_call = $request->outgoing_call;
        $AssistantTc->bathroom = $request->bathroom;
        $AssistantTc->whatsapp = $request->whatsapp;
        $AssistantTc->user_attention = $request->user_attention;
        $AssistantTc->meeting = $request->meeting;
        $AssistantTc->total = $request->total ;
        $AssistantTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares de facturas actualizados exitosamente',
            'data' => ['assistant_tc' => $AssistantTc]
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

            $AssistantTc = new AssistantTc;
            if(isset($item['Numero agente'])){
                $AssistantTc->agent_number  = $item['Numero agente'];
            }
            if(isset($item['Agent Name'])){
                $AssistantTc->agent_name = $item['Agent Name'];
            }
            if(isset($item['Hold'])){
                $AssistantTc->hold  = $item['Hold'];
            }
            if(isset($item['Almuerzo'])){
                $AssistantTc->lunch  = $item['Almuerzo'];
            }
            if(isset($item['Break Am'])){
                $AssistantTc->break_am  = $item['Break Am'];
            }
            if(isset($item['Break Pm'])){
                $AssistantTc->break_pm  = $item['Break Pm'];
            }
            if(isset($item['Llamada Saliente'])){
                $AssistantTc->outgoing_call  = $item['Llamada Saliente'];
            }
            if(isset($item['Baño'])){
                $AssistantTc->bathroom  = $item['Baño'];
            }
            if(isset($item['Whatsapp'])){
                $AssistantTc->whatsapp = $item['Whatsapp'];
            }
            if(isset($item['Atención al usuario'])){
                $AssistantTc->user_attention = $item['Atención al usuario'];
            }
            if(isset($item['Reunion'])){
                $AssistantTc->meeting = $item['Reunion'];
            }
            if(isset($item['Total'])){
                $AssistantTc->total  = $item['Total'];
            }
            
            $AssistantTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Auxiliares de facturas actualizados exitosamente',
            'data' => ['assistant_tc' => $AssistantTc]
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
            $AssistantTc = AssistantTc::find($id);
            $AssistantTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Auxiliaress eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Auxiliares esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
