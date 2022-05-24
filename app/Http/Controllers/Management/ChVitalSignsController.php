<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalSigns;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChVitalSignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        //$ChVitalSigns = ChVitalSigns::with('vital_hydration', 'vital_ventilated', 'vital_temperature', 'vital_neurological');
        $ChVitalSigns = ChVitalSigns::select();

        if ($request->_sort) {
            $ChVitalSigns->orderBy($request->_sort, $request->_order);
        }
        if ($request->ch_record_id) {
            $ChVitalSigns->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }
        if ($request->_sort) {
            $ChVitalSigns->orderBy($request->_sort, $request->_order);
        }

        if ($request->query("pagination", true) == "false") {
            $ChVitalSigns = $ChVitalSigns->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);
            $ChVitalSigns = $ChVitalSigns->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Signos vitales obtenidas exitosamente',
            'data' => ['ch_vital_signs' => $ChVitalSigns]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byrecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        $ChVitalSigns = ChVitalSigns::with('vital_hydration', 'vital_ventilated', 'vital_temperature', 'vital_neurological', 'oxygen_type', 'liters_per_minute','parameters_signs', 'type_record','ch_record')
        ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);

        if ($request->_sort) {
            $ChVitalSigns->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalSigns->where('status', 'like', '%' . $request->search . '%');
        }

        
        if ($request->query("pagination", true) == "false") {
            $ChVitalSigns = $ChVitalSigns->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);
            $ChVitalSigns = $ChVitalSigns->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro paciente obtenidos exitosamente',
            'data' => ['ch_vital_signs' => $ChVitalSigns]
        ]);
    }

    //validar
    public function store(Request $request): JsonResponse
    {
        $ChVitalSigns = new ChVitalSigns;
        $ChVitalSigns->clock =  $request->clock;
        $ChVitalSigns->cardiac_frequency = $request->cardiac_frequency;
        $ChVitalSigns->respiratory_frequency = $request->respiratory_frequency;
        $ChVitalSigns->temperature = $request->temperature;
        $ChVitalSigns->oxigen_saturation = $request->oxigen_saturation;
        $ChVitalSigns->intracranial_pressure = $request->intracranial_pressure;
        $ChVitalSigns->cerebral_perfusion_pressure = $request->cerebral_perfusion_pressure;
        $ChVitalSigns->intra_abdominal = $request->intra_abdominal;
        $ChVitalSigns->pressure_systolic = $request->pressure_systolic;
        $ChVitalSigns->pressure_diastolic = $request->pressure_diastolic;
        $ChVitalSigns->pressure_half = $request->pressure_half;
        $ChVitalSigns->pulse = $request->pulse;
        $ChVitalSigns->venous_pressure = $request->venous_pressure;
        $ChVitalSigns->size = $request->size;
        $ChVitalSigns->weight = $request->weight;
        $ChVitalSigns->glucometry = $request->glucometry;
        $ChVitalSigns->body_mass_index = $request->body_mass_index; //i.m.c
        $ChVitalSigns->pulmonary_systolic = $request->pulmonary_systolic;
        $ChVitalSigns->pulmonary_diastolic = $request->pulmonary_diastolic;
        $ChVitalSigns->pulmonary_half = $request->pulmonary_half;
        $ChVitalSigns->head_circunference = $request->head_circunference;
        $ChVitalSigns->abdominal_perimeter = $request->abdominal_perimeter;
        $ChVitalSigns->chest_perimeter = $request->chest_perimeter;
        $ChVitalSigns->right_reaction = $request->right_reaction;
        $ChVitalSigns->pupil_size_right = $request->pupil_size_right;
        $ChVitalSigns->left_reaction = $request->left_reaction;
        $ChVitalSigns->pupil_size_left = $request->pupil_size_left; 
        $ChVitalSigns->mydriatic =  $request->mydriatic;
        $ChVitalSigns->normal =  $request->normal;
        $ChVitalSigns->lazy_reaction_light =  $request->lazy_reaction_light;
        $ChVitalSigns->fixed_lazy_reaction =  $request->fixed_lazy_reaction;
        $ChVitalSigns->miotic_size =  $request->miotic_size;
        $ChVitalSigns->observations_glucometry = $request->observations_glucometry; 
        $ChVitalSigns->ch_vital_hydration_id = $request->ch_vital_hydration_id;
        $ChVitalSigns->ch_vital_ventilated_id = $request->ch_vital_ventilated_id;
        $ChVitalSigns->ch_vital_temperature_id = $request->ch_vital_temperature_id;
        $ChVitalSigns->ch_vital_neurological_id =  $request->ch_vital_neurological_id;
        $ChVitalSigns->oxygen_type_id = $request->oxygen_type_id;
        $ChVitalSigns->liters_per_minute_id =  $request->liters_per_minute_id;
        $ChVitalSigns->parameters_signs_id =  $request->parameters_signs_id;
        $ChVitalSigns->type_record_id = $request->type_record_id;
        $ChVitalSigns->ch_record_id = $request->ch_record_id;
        $ChVitalSigns->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Signos vitales creados exitosamente',
            'data' => ['ch_vital_signs' => $ChVitalSigns->toArray()]
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
        $ChVitalSigns = ChVitalSigns::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Signos vitales obtenidos exitosamente',
            'data' => ['ch_vital_signs' => $ChVitalSigns]
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
        $ChVitalSigns = ChVitalSigns::find($id);
        /*  if ($request->ch_vital_hydration_id) {
            $ChVitalSigns->ch_vital_hydration_id = $request->ch_vital_hydration_id;
        }
        if ($request->ch_vital_hydration_id) {
            $ChVitalSigns->ch_vital_hydration_id = $request->ch_vital_hydration_id;
        }
        if ($request->ch_vital_ventilated_id) {
            $ChVitalSigns->ch_vital_ventilated_id = $request->ch_vital_ventilated_id;
        }
        if ($request->ch_vital_temperature_id) {
            $ChVitalSigns->ch_vital_temperature_id = $request->ch_vital_temperature_id;
        }
        if ($request->ch_vital_neurological_id) {
            $ChVitalSigns->ch_vital_neurological_id = $request->ch_vital_neurological_id;
        }*/

        $ChVitalSigns->clock =  $request->clock;
        $ChVitalSigns->cardiac_frequency =  $request->cardiac_frequency;
        $ChVitalSigns->respiratory_frequency =  $request->respiratory_frequency;
        $ChVitalSigns->temperature =  $request->temperature;
        $ChVitalSigns->oxigen_saturation =  $request->oxigen_saturation;
        $ChVitalSigns->intracranial_pressure =  $request->intracranial_pressure;
        $ChVitalSigns->cerebral_perfusion_pressure =  $request->cerebral_perfusion_pressure;
        $ChVitalSigns->intra_abdominal =  $request->intra_abdominal;
        $ChVitalSigns->pressure_systolic =  $request->pressure_systolic;
        $ChVitalSigns->pressure_diastolic =  $request->pressure_diastolic;
        $ChVitalSigns->pressure_half =  $request->pressure_half;
        $ChVitalSigns->pulse =  $request->pulse;
        $ChVitalSigns->venous_pressure =  $request->venous_pressure;
        $ChVitalSigns->size =  $request->size;
        $ChVitalSigns->weight =  $request->weight;
        $ChVitalSigns->glucometry =  $request->glucometry;
        $ChVitalSigns->body_mass_index =  $request->body_mass_index; //i.m.c
        $ChVitalSigns->pulmonary_systolic =  $request->pulmonary_systolic;
        $ChVitalSigns->pulmonary_diastolic =  $request->pulmonary_diastolic;
        $ChVitalSigns->pulmonary_half =  $request->pulmonary_half;
        $ChVitalSigns->head_circunference =  $request->head_circunference;
        $ChVitalSigns->abdominal_perimeter =  $request->abdominal_perimeter;
        $ChVitalSigns->chest_perimeter =  $request->chest_perimeter;
        $ChVitalSigns->right_reaction =  $request->right_reaction;
        $ChVitalSigns->pupil_size_right =  $request->pupil_size_right;
        $ChVitalSigns->left_reaction =  $request->left_reaction;
        $ChVitalSigns->mydriatic =  $request->mydriatic;
        $ChVitalSigns->normal =  $request->normal;
        $ChVitalSigns->lazy_reaction_light =  $request->lazy_reaction_light;
        $ChVitalSigns->fixed_lazy_reaction =  $request->fixed_lazy_reaction;
        $ChVitalSigns->miotic_size =  $request->miotic_size;
        $ChVitalSigns->observations_glucometry = $request->observations_glucometry;
        $ChVitalSigns->ch_vital_hydration_id =  $request->ch_vital_hydration_id;
        $ChVitalSigns->ch_vital_ventilated_id =  $request->ch_vital_ventilated_id;
        $ChVitalSigns->ch_vital_temperature_id =  $request->ch_vital_temperature_id;
        $ChVitalSigns->ch_vital_neurological_id =  $request->ch_vital_neurological_id;
        $ChVitalSigns->oxygen_type_id = $request->oxygen_type_id;
        $ChVitalSigns->liters_per_minute_id =  $request->liters_per_minute_id;
        $ChVitalSigns->parameters_signs_id =  $request->parameters_signs_id;
        $ChVitalSigns->type_record_id = $request->type_record_id;
        $ChVitalSigns->ch_record_id = $request->ch_record_id;
        $ChVitalSigns->save();


        return response()->json([
            'status' => true,
            'message' => 'Signos vitales actualizados exitosamente',
            'data' => ['ch_vital_signs' => $ChVitalSigns]
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
            $ChVitalSigns = ChVitalSigns::find($id);
            $ChVitalSigns->delete();

            return response()->json([
                'status' => true,
                'message' => 'Signos vitales eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Signos vitales esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
