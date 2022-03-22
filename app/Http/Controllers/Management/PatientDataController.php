<?php

namespace App\Http\Controllers\Management;

use App\Models\PatientData;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientDataRequest;
use App\Models\Admissions;
use Illuminate\Database\QueryException;

class PatientDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        // $PatientData = PatientData::select(
        //     'patient_data.*',
        //     \DB::raw('CONCAT_WS(" ",patient_data.lastname, patient_data.middlelastname, patient_data.firtsname, patient_data.middlefirst) AS complete_name')
        // )   ->with(
        //     'patient_data_type',
        //     'identification_type_id'
        // );
        $PatientData = PatientData::select();
        if ($request->_sort) {
            $PatientData->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PatientData->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PatientData = $PatientData->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PatientData = $PatientData->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Acompañantes/responsables asociados exitosamente',
            'data' => ['patient_data' => $PatientData]
        ]);
    }

    public function getByPatient(Request $request, int $admissionId): JsonResponse
    {
        $PatientData = PatientData::where('admissions_id', $admissionId);
        if ($request->search) {
            $PatientData->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $PatientData = $PatientData->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PatientData = $PatientData->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Acompañantes y/o responsables por contrato obtenido exitosamente',
            'data' => ['patient_data' => $PatientData]
        ]);
    }

    public function store(PatientDataRequest $request): JsonResponse
    {
        $validate = PatientData::where('admissions_id', $request->admissions_id)->get();
        $countR = 0;
        $countA = 0;
        $count = 0;
        foreach ($validate as $item) {
            if ($item->patient_data_type == 'RESPONSABLE') {
                $countR++;
            } else if ($item->patient_data_type == 'ACOMPAÑANTE') {
                $countA++;
            } else {
                $count++;
            }
        }
        if ($countR > 0 && $request->patient_data_type == 'RESPONSABLE') {
            // $state = $request->patient_data_type;
            return response()->json([
                'status' => true,
                'message' => 'El paciente ya cuenta con un responsable',
            ]);
        } else if ($countA > 0 && $request->patient_data_type == 'ACOMPAÑANTE'){
            return response()->json([
                'status' => true,
                'message' => 'El paciente ya cuenta con un acompañante',
            ]);
        } else {
            $PatientData = new PatientData;
            $PatientData->admissions_id = $request->admissions_id;
            $PatientData->patient_data_type = $request->patient_data_type;
            $PatientData->firstname = $request->firstname;
            $PatientData->middlefirstname = $request->middlefirstname;
            $PatientData->lastname = $request->lastname;
            $PatientData->middlelastname = $request->middlelastname;
            $PatientData->identification = $request->identification;
            $PatientData->phone = $request->phone;
            $PatientData->email = $request->email;
            $PatientData->residence_address = $request->residence_address;
            $PatientData->identification_type_id = $request->identification_type_id;
            $PatientData->affiliate_type_id = $request->affiliate_type_id;
            $PatientData->special_attention_id = $request->special_attention_id;
            $PatientData->relationship_id = $request->relationship_id;
    
            $PatientData->save();
    
            return response()->json([
                'status' => true,
                'message' => ' creado exitosamente',
                'data' => ['patient_data' => $PatientData->toArray()]
            ]);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $PatientData = PatientData::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Acompañantes/responsables del paciente obtenido exitosamente',
            'data' => ['patient_data' => $PatientData]
        ]);
    }

    /**
     * @param  int  $packageId
     * Get procedure by manual.
     *
     * @return JsonResponse
     */
    public function getByAdmissions(Request $request, int $admissionId): JsonResponse
    {
        $PatientData = PatientData::select(
            'patient_data.*',
            \DB::raw('CONCAT_WS(" ",patient_data.lastname,patient_data.middlelastname,patient_data.firstname,patient_data.middlefirstname) AS nombre_completo')
        )
            ->where('admissions_id', $admissionId)->with('identification_type');
        if ($request->search) {
            $PatientData->where('name', 'like', '%' . $request->search . '%')

                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $PatientData = $PatientData->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PatientData = $PatientData->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Acompañantes por admisión obtenidos exitosamente',
            'data' => ['patient_data' => $PatientData]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PatientDataRequest $request, int $id): JsonResponse
    {

        $PatientData = PatientData::find($id);
        $PatientData->admissions_id = $request->admissions_id;
        $PatientData->patient_data_type = $request->patient_data_type;
        $PatientData->firstname = $request->firstname;
        $PatientData->middlefirstname = $request->middlefirstname;
        $PatientData->lastname = $request->lastname;
        $PatientData->middlelastname = $request->middlelastname;
        $PatientData->identification = $request->identification;
        $PatientData->phone = $request->phone;
        $PatientData->email = $request->email;
        $PatientData->residence_address = $request->residence_address;
        $PatientData->identification_type_id = $request->identification_type_id;
        $PatientData->affiliate_type_id = $request->affiliate_type_id;
        $PatientData->special_attention_id = $request->special_attention_id;

        $PatientData->save();

        return response()->json([
            'status' => true,
            'message' => 'Acompañantes/responsables actualizado exitosamente',
            'data' => ['patient_data' => $PatientData]
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
            $PatientData = PatientData::find($id);
            $PatientData->delete();

            return response()->json([
                'status' => true,
                'message' => 'Acompañante/responsable eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Acompañante/responsables esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
