<?php

namespace App\Http\Controllers\Management;

use App\Models\SpecificTestsTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SpecificTestsTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SpecificTestsTl = SpecificTestsTl::select();

        if ($request->_sort) {
            $SpecificTestsTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SpecificTestsTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SpecificTestsTl = $SpecificTestsTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SpecificTestsTl = $SpecificTestsTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Pruebas Especificas obtenidos exitosamente',
            'data' => ['specific_tests_tl' => $SpecificTestsTl]
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
        
       
        $SpecificTestsTl = SpecificTestsTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Pruebas Especificas asociado al paciente exitosamente',
            'data' => ['specific_tests_tl' => $SpecificTestsTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $SpecificTestsTl = new SpecificTestsTl;
        $SpecificTestsTl->hamilton_scale = $request->hamilton_scale;
        $SpecificTestsTl->boston_test = $request->boston_test;
        $SpecificTestsTl->termal_merril = $request->termal_merril;
        $SpecificTestsTl->prolec_plon = $request->prolec_plon;
        $SpecificTestsTl->ped_guss = $request->ped_guss;
        $SpecificTestsTl->vhi_grbas = $request->vhi_grbas;
        $SpecificTestsTl->pemo_speech = $request->pemo_speech;
        $SpecificTestsTl->type_record_id = $request->type_record_id;
        $SpecificTestsTl->ch_record_id = $request->ch_record_id;
        $SpecificTestsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Pruebas Especificas asociado al paciente exitosamente',
            'data' => ['specific_tests_tl' => $SpecificTestsTl->toArray()]
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
        $SpecificTestsTl = SpecificTestsTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Pruebas Especificas obtenido exitosamente',
            'data' => ['specific_tests_tl' => $SpecificTestsTl]
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
        $SpecificTestsTl = SpecificTestsTl::find($id);
        $SpecificTestsTl->hamilton_scale = $request->hamilton_scale;
        $SpecificTestsTl->boston_test = $request->boston_test;
        $SpecificTestsTl->termal_merril = $request->termal_merril;
        $SpecificTestsTl->prolec_plon = $request->prolec_plon;
        $SpecificTestsTl->ped_guss = $request->ped_guss;
        $SpecificTestsTl->vhi_grbas = $request->vhi_grbas;
        $SpecificTestsTl->pemo_speech = $request->pemo_speech;
        $SpecificTestsTl->type_record_id = $request->type_record_id;
        $SpecificTestsTl->ch_record_id = $request->ch_record_id;
        $SpecificTestsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Pruebas Especificas actualizado exitosamente',
            'data' => ['specific_tests_tl' => $SpecificTestsTl]
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
            $SpecificTestsTl = SpecificTestsTl::find($id);
            $SpecificTestsTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Pruebas Especificas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Pruebas Especificas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
