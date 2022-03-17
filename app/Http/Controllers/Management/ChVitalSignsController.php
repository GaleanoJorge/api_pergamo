<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalSigns;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChVitalSignsRequest;
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
        $ChVitalSigns = ChVitalSigns::with('vital_hydration', 'vital_ventilated', 'vital_temperature', 'vital_neurological');

        if ($request->_sort) {
            $ChVitalSigns->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalSigns->where('status', 'like', '%' . $request->search . '%')
                ->orWhere('cardiac_frequency', 'like', '%' . $request->search . '%')
                ->orWhere('respiratory_frequency', 'like', '%' . $request->search . '%')
                ->orWhere('temperature', 'like', '%' . $request->search . '%')
                ->orWhere('oxigen_saturation', 'like', '%' . $request->search . '%')
                ->orWhere('intracranial_pressure', 'like', '%' . $request->search . '%')
                ->orWhere('cerebral_perfusion_pressure', 'like', '%' . $request->search . '%')
                ->orWhere('intra_abdominal', 'like', '%' . $request->search . '%')
                ->orWhere('pressure_systolic', 'like', '%' . $request->search . '%')
                ->orWhere('pressure_diastolic', 'like', '%' . $request->search . '%')
                ->orWhere('pressure_half', 'like', '%' . $request->search . '%')
                ->orWhere('pulse', 'like', '%' . $request->search . '%')
                ->orWhere('venous_pressure', 'like', '%' . $request->search . '%')
                ->orWhere('size', 'like', '%' . $request->search . '%')
                ->orWhere('weight', 'like', '%' . $request->search . '%')
                ->orWhere('glucometry', 'like', '%' . $request->search . '%')
                ->orWhere('body_mass_index', 'like', '%' . $request->search . '%')
                ->orWhere('pulmonary_systolic', 'like', '%' . $request->search . '%')
                ->orWhere('pulmonary_diastolic', 'like', '%' . $request->search . '%')
                ->orWhere('pulmonary_half', 'like', '%' . $request->search . '%')
                ->orWhere('head_circunference', 'like', '%' . $request->search . '%')
                ->orWhere('abdominal_perimeter', 'like', '%' . $request->search . '%')
                ->orWhere('chest_perimeter', 'like', '%' . $request->search . '%')
                ->orWhere('fetal_heart_rate', 'like', '%' . $request->search . '%')
                ->orWhere('right_reaction', 'like', '%' . $request->search . '%')
                ->orWhere('pupil_size_right', 'like', '%' . $request->search . '%')
                ->orWhere('left_reaction', 'like', '%' . $request->search . '%')
                ->orWhere('pupil_size_left', 'like', '%' . $request->search . '%')
                ->orWhere('glomerular_filtration_rate', 'like', '%' . $request->search . '%')
                ->orWhere('cardiovascular_risk', 'like', '%' . $request->search . '%');
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


    //validar
    public function store(ChVitalSignsRequest $request): JsonResponse
    {
        $ChVitalSigns = new ChVitalSigns;
        $ChVitalSigns->status = $request->status;    
        $ChVitalSigns->date =  $request->Fecha;
        $ChVitalSigns->cardiac_frequency = $request->cardiac_frequency;
        $ChVitalSigns->respiratory_frequency = $request->respiratory_frequency;
        $ChVitalSigns->temperature = $request->temperature;
        $ChVitalSigns->oxigen_saturation = $request->oxigen_saturation;
        $ChVitalSigns->intracranial_pressure = $request->intracranial_pressure;
        $ChVitalSigns->cerebral_perfusion_pressure = $request->cerebral_perfusion_pressure;
        $ChVitalSigns->intra_abdominal = $request->intra_abdominal;
        $ChVitalSigns->pressure_systolic = $request->pressure_systolic;
        $ChVitalSigns->pressure_diastolic = $request->Diapressure_diastolicstolica;
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
        $ChVitalSigns->fetal_heart_rate = $request->fetal_heart_rate;
        $ChVitalSigns->right_reaction = $request->right_reaction;
        $ChVitalSigns->pupil_size_right = $request->pupil_size_right;
        $ChVitalSigns->left_reaction = $request->left_reaction;
        $ChVitalSigns->pupil_size_left = $request->pupil_size_left;
        $ChVitalSigns->glomerular_filtration_rate = $request->glomerular_filtration_rate; //tfc
        $ChVitalSigns->cardiovascular_risk = $request->cardiovascular_risk; //tfc
        $ChVitalSigns->vital_hydration_id = $request->vital_hydration_id;
        $ChVitalSigns->vital_ventilated_id = $request->vital_ventilated_id;
        $ChVitalSigns->vital_temperature_id = $request->vital_temperature_id;
        $ChVitalSigns->vital_neurological_id =  $request->vital_neurological_id;
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
    public function update(ChVitalSignsRequest $request, int $id): JsonResponse
    {
        $ChVitalSigns = ChVitalSigns::find($id);
        $ChVitalSigns->vital_hydration_id =  $request->vital_hydration_id;
        $ChVitalSigns->vital_ventilated_id =  $request->vital_ventilated_id;
        $ChVitalSigns->vital_temperature_id =  $request->vital_temperature_id;
        $ChVitalSigns->vital_neurological_id =  $request->vital_neurological_id;
        if ($request->vital_hydration_id) {
            $ChVitalSigns->vital_hydration_id = $request->vital_hydration_id;
        }
        if ($request->vital_hydration_id) {
            $ChVitalSigns->vital_hydration_id = $request->vital_hydration_id;
        }
        if ($request->vital_ventilated_id) {
            $ChVitalSigns->vital_ventilated_id = $request->vital_ventilated_id;
        }
        if ($request->vital_temperature_id) {
            $ChVitalSigns->vital_temperature_id = $request->vital_temperature_id;
        }
        if ($request->vital_neurological_id) {
            $ChVitalSigns->vital_neurological_id = $request->vital_neurological_id;
        }

        $ChVitalSigns->condition =  $request->  // validar campo
            $ChVitalSigns->user_id = Auth::user()->id;
        $ChVitalSigns->date =  $request->Fecha;
        $ChVitalSigns->cardiac_frequency =  $request->cardiac_frequency;
        $ChVitalSigns->respiratory_frequency =  $request->respiratory_frequency;
        $ChVitalSigns->temperature =  $request->temperature;
        $ChVitalSigns->oxigen_saturation =  $request->oxigen_saturation;
        $ChVitalSigns->intracranial_pressure =  $request->intracranial_pressure;
        $ChVitalSigns->cerebral_perfusion_pressure =  $request->cerebral_perfusion_pressure;
        $ChVitalSigns->intra_abdominal =  $request->intra_abdominal;
        $ChVitalSigns->pressure_systolic =  $request->pressure_systolic;
        $ChVitalSigns->pressure_diastolic =  $request->Diapressure_diastolicstolica;
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
        $ChVitalSigns->fetal_heart_rate =  $request->fetal_heart_rate;
        $ChVitalSigns->right_reaction =  $request->right_reaction;
        $ChVitalSigns->pupil_size_right =  $request->pupil_size_right;
        $ChVitalSigns->left_reaction =  $request->left_reaction;
        $ChVitalSigns->pupil_size_left =  $request->pupil_size_left;
        $ChVitalSigns->glomerular_filtration_rate =  $request->glomerular_filtration_rate; //tfc
        $ChVitalSigns->cardiovascular_risk =  $request->cardiovascular_risk; //tfc
        $ChVitalSigns->vital_hydration_id =  $request->vital_hydration_id;
        $ChVitalSigns->vital_ventilated_id =  $request->vital_ventilated_id;
        $ChVitalSigns->vital_temperature_id =  $request->vital_temperature_id;
        $ChVitalSigns->vital_neurological_id =  $request->vital_neurological_id;

        /*  $ChVitalSigns->gloss_status_id = 1;
        $ChVitalSigns->user_id = Auth::user()->id;
        $ChVitalSigns->regimen_id = $request->regime_id;
        $ChVitalSigns->received_by_id = $request->received_by_id;
        $ChVitalSigns->invoice_prefix = $request->invoice_prefix;
        $ChVitalSigns->objetion_detail = $request->objetion_detail;
        $ChVitalSigns->invoice_consecutive = $request->invoice_consecutive;
        $ChVitalSigns->objeted_value = $request->objeted_value;
        $ChVitalSigns->invoice_value = $request->invoice_value;
        $ChVitalSigns->emission_date = $request->emission_date;
        $ChVitalSigns->radication_date = $request->radication_date;
        $ChVitalSigns->received_date = $request->received_date;
        $ChVitalSigns->assing_user_id = $request->assing_user_id;*/

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
