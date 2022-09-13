<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwRiskFactors;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChSwRiskFactorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwRiskFactors = ChSwRiskFactors::select();

        if ($request->_sort) {
            $ChSwRiskFactors->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwRiskFactors->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwRiskFactors = $ChSwRiskFactors->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwRiskFactors = $ChSwRiskFactors->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Factores de Riesgos  obtenida exitosamente',
            'data' => ['ch_sw_risk_factors' => $ChSwRiskFactors]
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


        $ChSwRiskFactors = ChSwRiskFactors::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->where('ch_sw_risk_factors.type_record_id', 1)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSwRiskFactors = ChSwRiskFactors::select('ch_sw_risk_factors.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_sw_risk_factors.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_sw_risk_factors' => $ChSwRiskFactors]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwRiskFactors = new ChSwRiskFactors;
        $ChSwRiskFactors->net = $request->net;
        $ChSwRiskFactors->spa = $request->spa;
        $ChSwRiskFactors->violence = $request->violence;
        $ChSwRiskFactors->victim = $request->victim;
        $ChSwRiskFactors->economic = $request->economic;
        $ChSwRiskFactors->living = $request->living;
        $ChSwRiskFactors->attention = $request->attention;
        $ChSwRiskFactors->stigmatization = $request->stigmatization;
        $ChSwRiskFactors->interference = $request->interference;
        $ChSwRiskFactors->spaces = $request->spaces;
        $ChSwRiskFactors->observations = $request->observations;
        $ChSwRiskFactors->type_record_id = $request->type_record_id;
        $ChSwRiskFactors->ch_record_id = $request->ch_record_id;
        $ChSwRiskFactors->save();

        return response()->json([
            'status' => true,
            'message' => 'Factores de Riesgos  asociada al paciente exitosamente',
            'data' => ['ch_sw_risk_factors' => $ChSwRiskFactors->toArray()]
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
        $ChSwRiskFactors = ChSwRiskFactors::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Factores de Riesgos  asociada exitosamente',
            'data' => ['ch_sw_risk_factors' => $ChSwRiskFactors]
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
        $ChSwRiskFactors = ChSwRiskFactors::find($id);
        $ChSwRiskFactors->net = $request->net;
        $ChSwRiskFactors->spa = $request->spa;
        $ChSwRiskFactors->violence = $request->violence;
        $ChSwRiskFactors->victim = $request->victim;
        $ChSwRiskFactors->economic = $request->economic;
        $ChSwRiskFactors->living = $request->living;
        $ChSwRiskFactors->attention = $request->attention;
        $ChSwRiskFactors->stigmatization = $request->stigmatization;
        $ChSwRiskFactors->interference = $request->interference;
        $ChSwRiskFactors->spaces = $request->spaces;
        $ChSwRiskFactors->observations = $request->observations;
        $ChSwRiskFactors->type_record_id = $request->type_record_id;
        $ChSwRiskFactors->ch_record_id = $request->ch_record_id;
        $ChSwRiskFactors->save();

        return response()->json([
            'status' => true,
            'message' => 'Factores de Riesgos  actualizada exitosamente',
            'data' => ['ch_sw_risk_factors' => $ChSwRiskFactors]
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
            $ChSwRiskFactors = ChSwRiskFactors::find($id);
            $ChSwRiskFactors->delete();

            return response()->json([
                'status' => true,
                'message' => 'Factores de Riesgos  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Factores de Riesgos  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
