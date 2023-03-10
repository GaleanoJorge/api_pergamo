<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTherapeuticAss;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChTherapeuticAssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTherapeuticAss = ChTherapeuticAss::with('ch_therapeutic_ass');

        if ($request->_sort) {
            $ChTherapeuticAss->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChTherapeuticAss->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChTherapeuticAss = $ChTherapeuticAss->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTherapeuticAss = $ChTherapeuticAss->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica obtenida exitosamente',
            'data' => ['ch_therapeutic_ass' => $ChTherapeuticAss]
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


        $ChTherapeuticAss = ChTherapeuticAss::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with(
                'ch_ass_pattern',
                'ch_ass_swing',
                'ch_ass_frequency',
                'ch_ass_mode',
                'ch_ass_cough',
                'ch_ass_chest_type',
                'ch_ass_chest_symmetry'
            )
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica obtenida exitosamente',
            'data' => ['ch_therapeutic_ass' => $ChTherapeuticAss]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChTherapeuticAss::where('ch_record_id', $request->ch_record_id)->where('ch_ass_pattern_id', $request->ch_ass_pattern_id)
            ->where('ch_ass_swing_id', $request->ch_ass_swing_id)
            ->where('ch_ass_frequency_id', $request->ch_ass_frequency_id)
            ->where('ch_ass_mode_id', $request->ch_ass_mode_id)
            ->where('ch_ass_cough_id', $request->ch_ass_cough_id)
            ->where('ch_ass_chest_type_id', $request->ch_ass_chest_type_id)
            ->where('ch_ass_chest_symmetry_id', $request->ch_ass_chest_symmetry_id)
            ->first();

            $ChAssSigns = new ChAssSigns;

            if (isset($request->ch_signs)) {
                foreach ($request->ch_signs as $element) {
                    if ($element == 'ALETEO NASAL') {
                        $ChAssSigns->fluter = $element;
                    } else if ($element == 'CIANOSIS DISTAL') {
                        $ChAssSigns->distal = $element;
                    } else if ($element == 'CIANOSIS GENERALIZADA') {
                        $ChAssSigns->widespread = $element;
                    } else if ($element == 'CIANOSIS PERIBUCAL') {
                        $ChAssSigns->peribucal = $element;
                    } else if ($element == 'CIANOSIS PERIORBITAL') {
                        $ChAssSigns->periorbitary = $element;
                    } else if ($element == 'NINGUNO') {
                        $ChAssSigns->none = $element;
                    }else if ($element == 'USO DE MUSCULOS INTERCOSTALES') {
                        $ChAssSigns->intercostal = $element;
                    } else if ($element == 'USO DE MUSCULOS SUPRACLAVICULARES') {
                        $ChAssSigns->aupraclavicular = $element;
                }
            }
        }
    
                
            $ChAssSigns->type_record_id = $request->type_record_id; 
            $ChAssSigns->ch_record_id = $request->ch_record_id; 
            $ChAssSigns->save();

        $ChTherapeuticAss = new ChTherapeuticAss;

        $ChTherapeuticAss->ch_ass_pattern_id = $request->ch_ass_pattern_id;
        $ChTherapeuticAss->ch_ass_swing_id = $request->ch_ass_swing_id;
        $ChTherapeuticAss->ch_ass_frequency_id = $request->ch_ass_frequency_id;
        $ChTherapeuticAss->ch_ass_mode_id = $request->ch_ass_mode_id;
        $ChTherapeuticAss->ch_ass_cough_id = $request->ch_ass_cough_id;
        $ChTherapeuticAss->ch_ass_chest_type_id = $request->ch_ass_chest_type_id;
        $ChTherapeuticAss->ch_ass_chest_symmetry_id = $request->ch_ass_chest_symmetry_id;
        $ChTherapeuticAss->type_record_id = $request->type_record_id;
        $ChTherapeuticAss->ch_record_id = $request->ch_record_id;
        $ChTherapeuticAss->ch_ass_signs_id = $ChAssSigns->id;
        $ChTherapeuticAss->save();



        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica asociada al paciente exitosamente',
            'data' => ['ch_therapeutic_ass' => $ChTherapeuticAss->toArray()]
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
        $ChTherapeuticAss = ChTherapeuticAss::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica asociada exitosamente',
            'data' => ['ch_therapeutic_ass' => $ChTherapeuticAss]
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
        $ChTherapeuticAss = ChTherapeuticAss::find($id);
        $ChTherapeuticAss->ch_ass_pattern = $request->ch_ass_pattern;
        $ChTherapeuticAss->ch_ass_swing = $request->ch_ass_swing;
        $ChTherapeuticAss->ch_ass_frequency = $request->ch_ass_frequency;
        $ChTherapeuticAss->ch_ass_mode = $request->ch_ass_mode;
        $ChTherapeuticAss->ch_ass_cough = $request->ch_ass_cough;
        $ChTherapeuticAss->ch_ass_chest_type = $request->ch_ass_chest_type;
        $ChTherapeuticAss->ch_ass_chest_symmetry_id = $request->ch_ass_chest_symmetry_id;
        $ChTherapeuticAss->type_record_id = $request->type_record_id;
        $ChTherapeuticAss->ch_record_id = $request->ch_record_id;
        $ChTherapeuticAss->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica actualizada exitosamente',
            'data' => ['ch_therapeutic_ass' => $ChTherapeuticAss]
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
            $ChTherapeuticAss = ChTherapeuticAss::find($id);
            $ChTherapeuticAss->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración terapéutica eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración terapéutica en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
