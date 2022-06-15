<?php

namespace App\Http\Controllers\Management;

use App\Models\CifDiagnosisTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CifDiagnosisTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CifDiagnosisTl = CifDiagnosisTl::select();

        if ($request->_sort) {
            $CifDiagnosisTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $CifDiagnosisTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $CifDiagnosisTl = $CifDiagnosisTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CifDiagnosisTl = $CifDiagnosisTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Diagnostico CIF obtenidos exitosamente',
            'data' => ['cif_diagnosis_tl' => $CifDiagnosisTl]
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
        
       
        $CifDiagnosisTl = CifDiagnosisTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico CIF asociado al paciente exitosamente',
            'data' => ['cif_diagnosis_tl' => $CifDiagnosisTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $CifDiagnosisTl = new CifDiagnosisTl;
        $CifDiagnosisTl->text = $request->text;
        $CifDiagnosisTl->type_record_id = $request->type_record_id;
        $CifDiagnosisTl->ch_record_id = $request->ch_record_id;
        $CifDiagnosisTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico CIF asociado al paciente exitosamente',
            'data' => ['cif_diagnosis_tl' => $CifDiagnosisTl->toArray()]
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
        $CifDiagnosisTl = CifDiagnosisTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico CIF obtenido exitosamente',
            'data' => ['cif_diagnosis_tl' => $CifDiagnosisTl]
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
        $CifDiagnosisTl = CifDiagnosisTl::find($id);
        $CifDiagnosisTl->text = $request->text;
        $CifDiagnosisTl->type_record_id = $request->type_record_id;
        $CifDiagnosisTl->ch_record_id = $request->ch_record_id;
        $CifDiagnosisTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnostico CIF actualizado exitosamente',
            'data' => ['cif_diagnosis_tl' => $CifDiagnosisTl]
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
            $CifDiagnosisTl = CifDiagnosisTl::find($id);
            $CifDiagnosisTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diagnostico CIF eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Diagnostico CIF en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
