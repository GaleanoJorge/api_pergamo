<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEvoSoap;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEvoSoapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEvoSoap = ChEvoSoap::select();

        if ($request->_sort) {
            $ChEvoSoap->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEvoSoap->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEvoSoap = $ChEvoSoap->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEvoSoap = $ChEvoSoap->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Soap obtenidos exitosamente',
            'data' => ['ch_evo_soap' => $ChEvoSoap]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChEvoSoap = ChEvoSoap::where('ch_record_id', $id)->
        where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Soap asociado al paciente exitosamente',
            'data' => ['ch_evo_soap' => $ChEvoSoap]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChEvoSoap = new ChEvoSoap;
        $ChEvoSoap->subjective = $request->subjective;
        $ChEvoSoap->objective = $request->objective;
        $ChEvoSoap->type_record_id = $request->type_record_id;
        $ChEvoSoap->ch_record_id = $request->ch_record_id;
        $ChEvoSoap->save();

        return response()->json([
            'status' => true,
            'message' => 'Soap asociado al paciente exitosamente',
            'data' => ['ch_evo_soap' => $ChEvoSoap->toArray()]
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
        $ChEvoSoap = ChEvoSoap::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Soap obtenido exitosamente',
            'data' => ['ch_evo_soap' => $ChEvoSoap]
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
        $ChEvoSoap = ChEvoSoap::find($id);
        $ChEvoSoap->subjective = $request->subjective;
        $ChEvoSoap->objective = $request->objective;
        $ChEvoSoap->type_record_id = $request->type_record_id;
        $ChEvoSoap->ch_record_id = $request->ch_record_id;
        $ChEvoSoap->save();

        return response()->json([
            'status' => true,
            'message' => 'Soap actualizado exitosamente',
            'data' => ['ch_evo_soap' => $ChEvoSoap]
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
            $ChEvoSoap = ChEvoSoap::find($id);
            $ChEvoSoap->delete();

            return response()->json([
                'status' => true,
                'message' => 'Soap eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Soap en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
