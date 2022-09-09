<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwFamilyDynamics;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChSwFamilyDynamicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwFamilyDynamics = ChSwFamilyDynamics::select();

        if ($request->_sort) {
            $ChSwFamilyDynamics->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwFamilyDynamics->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwFamilyDynamics = $ChSwFamilyDynamics->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwFamilyDynamics = $ChSwFamilyDynamics->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Dinámica familiar obtenida exitosamente',
            'data' => ['ch_sw_family_dynamics' => $ChSwFamilyDynamics]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChSwFamilyDynamics = ChSwFamilyDynamics::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with(
                'ch_sw_communications',
                'authority',
                'decisions',
                'ch_sw_expression',)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSwFamilyDynamics = ChSwFamilyDynamics::select('ch_sw_family_dynamics.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_sw_family_dynamics.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_sw_family_dynamics' => $ChSwFamilyDynamics]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwFamilyDynamics = new ChSwFamilyDynamics;
        $ChSwFamilyDynamics->decisions_id = $request->decisions_id;
        $ChSwFamilyDynamics->authority_id = $request->authority_id;
        $ChSwFamilyDynamics->ch_sw_communications_id = $request->ch_sw_communications_id;
        $ChSwFamilyDynamics->ch_sw_expression_id = $request->ch_sw_expression_id;
        $ChSwFamilyDynamics->observations = $request->observations;
        $ChSwFamilyDynamics->type_record_id = $request->type_record_id;
        $ChSwFamilyDynamics->ch_record_id = $request->ch_record_id;
        $ChSwFamilyDynamics->save();

        return response()->json([
            'status' => true,
            'message' => 'Dinámica familiar asociada al paciente exitosamente',
            'data' => ['ch_sw_family_dynamics' => $ChSwFamilyDynamics->toArray()]
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
        $ChSwFamilyDynamics = ChSwFamilyDynamics::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dinámica familiar asociada exitosamente',
            'data' => ['ch_sw_family_dynamics' => $ChSwFamilyDynamics]
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
        $ChSwFamilyDynamics = ChSwFamilyDynamics::find($id);
        $ChSwFamilyDynamics->decisions_id = $request->decisions_id;
        $ChSwFamilyDynamics->authority_id = $request->authority_id;
        $ChSwFamilyDynamics->ch_sw_communications_id = $request->ch_sw_communications_id;
        $ChSwFamilyDynamics->ch_sw_expression_id = $request->ch_sw_expression_id;
        $ChSwFamilyDynamics->observations = $request->observations;
        $ChSwFamilyDynamics->type_record_id = $request->type_record_id;
        $ChSwFamilyDynamics->ch_record_id = $request->ch_record_id;
        $ChSwFamilyDynamics->save();

        return response()->json([
            'status' => true,
            'message' => 'Dinámica familiar actualizada exitosamente',
            'data' => ['ch_sw_family_dynamics' => $ChSwFamilyDynamics]
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
            $ChSwFamilyDynamics = ChSwFamilyDynamics::find($id);
            $ChSwFamilyDynamics->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dinámica familiar eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dinámica familiar en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
