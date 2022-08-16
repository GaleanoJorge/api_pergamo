<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwSupportNetwork;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwSupportNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwSupportNetwork = ChSwSupportNetwork::select();

        if($request->ch_record_id){
            $ChSwSupportNetwork ->where('ch_record_id', $request->ch_record_id)->where('type_record_id',1);
        }     

        if ($request->_sort) {
            $ChSwSupportNetwork->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwSupportNetwork->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwSupportNetwork = $ChSwSupportNetwork->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwSupportNetwork = $ChSwSupportNetwork->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Red de apoyo obtenido exitosamente',
            'data' => ['ch_sw_support_network' => $ChSwSupportNetwork]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $ChSwSupportNetwork = ChSwSupportNetwork::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
          ->with('ch_sw_network')->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Red de apoyo obtenido exitosamente',
            'data' => ['ch_sw_support_network' => $ChSwSupportNetwork]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwSupportNetwork = new ChSwSupportNetwork;
        $ChSwSupportNetwork->provided = $request->provided;
        $ChSwSupportNetwork->sw_note = $request->sw_note;
        $ChSwSupportNetwork->ch_sw_network_id = $request->ch_sw_network_id;
        $ChSwSupportNetwork->type_record_id = $request->type_record_id;
        $ChSwSupportNetwork->ch_record_id = $request->ch_record_id;
        $ChSwSupportNetwork->save();

        return response()->json([
            'status' => true,
            'message' => 'Red de apoyo asociados al paciente exitosamente',
            'data' => ['ch_sw_support_network' => $ChSwSupportNetwork->toArray()]
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
        $ChSwSupportNetwork = ChSwSupportNetwork::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Red de apoyo asociado exitosamente',
            'data' => ['ch_sw_support_network' => $ChSwSupportNetwork]
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
        $ChSwSupportNetwork = ChSwSupportNetwork::find($id);
        $ChSwSupportNetwork->provided = $request->provided;
        $ChSwSupportNetwork->sw_note = $request->sw_note;
        $ChSwSupportNetwork->ch_sw_network_id = $request->ch_sw_network_id;
        $ChSwSupportNetwork->type_record_id = $request->type_record_id;
        $ChSwSupportNetwork->ch_record_id = $request->ch_record_id;
        $ChSwSupportNetwork->save();

        return response()->json([
            'status' => true,
            'message' => 'Red de apoyo actualizado exitosamente',
            'data' => ['ch_sw_support_network' => $ChSwSupportNetwork]
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
            $ChSwSupportNetwork = ChSwSupportNetwork::find($id);
            $ChSwSupportNetwork->delete();

            return response()->json([
                'status' => true,
                'message' => 'Red de apoyo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Red de apoyo en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
