<?php

namespace App\Http\Controllers\Management;

use App\Models\ChMedicalCertificate;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChMedicalCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChMedicalCertificate = ChMedicalCertificate::with('enterally_diet','diet_consistency'); /// Cargar 

        if ($request->_sort) {
            $ChMedicalCertificate->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChMedicalCertificate->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChMedicalCertificate = $ChMedicalCertificate->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChMedicalCertificate = $ChMedicalCertificate->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Certificado Medico  obtenidos exitosamente',
            'data' => ['ch_medical_certificate' => $ChMedicalCertificate]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChMedicalCertificate = ChMedicalCertificate::with('enterally_diet', 'diet_consistency', 'type_record', 'ch_record')
        ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChMedicalCertificate = $ChMedicalCertificate->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChMedicalCertificate = $ChMedicalCertificate->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Certificado Medico Asociada  al paciente exitosamente',
            'data' => ['ch_medical_certificate' => $ChMedicalCertificate]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChMedicalCertificate = new ChMedicalCertificate;
        $ChMedicalCertificate->name = $request->name;
        
        $ChMedicalCertificate->save();

        return response()->json([
            'status' => true,
            'message' => 'Certificado Medico Asociada  al paciente exitosamente',
            'data' => ['ch_medical_certificate' => $ChMedicalCertificate->toArray()]
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
        $ChMedicalCertificate = ChMedicalCertificate::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Certificado Medico obtenido exitosamente',
            'data' => ['ch_medical_certificate' => $ChMedicalCertificate]
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
        $ChMedicalCertificate = ChMedicalCertificate::find($id);
        $ChMedicalCertificate->name = $request->name;
        
        $ChMedicalCertificate->save();

        return response()->json([
            'status' => true,
            'message' => 'Certificado Medico actualizado exitosamente',
            'data' => ['ch_medical_certificate' => $ChMedicalCertificate]
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
            $ChMedicalCertificate = ChMedicalCertificate::find($id);
            $ChMedicalCertificate->delete();

            return response()->json([
                'status' => true,
                'message' => 'Certificado Medico  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Certificado Medico  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
