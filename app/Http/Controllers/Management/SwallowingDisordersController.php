<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\SwallowingDisordersTL;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class SwallowingDisordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SwallowingDisordersTL = SwallowingDisordersTL::select();

        if ($request->_sort) {
            $SwallowingDisordersTL->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SwallowingDisordersTL->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SwallowingDisordersTL = $SwallowingDisordersTL->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SwallowingDisordersTL = $SwallowingDisordersTL->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenidos exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTL]
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


        $SwallowingDisordersTL = SwallowingDisordersTL::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $SwallowingDisordersTL = SwallowingDisordersTL::select('swallowing_disorders_tl.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('swallowing_disorders_tl.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'swallowing_disorders_tl.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTL]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $SwallowingDisordersTL = new SwallowingDisordersTL;
        $SwallowingDisordersTL->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTL->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTL->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTL->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTL->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTL->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTL->observations = $request->observations;
        $SwallowingDisordersTL->type_record_id = $request->type_record_id;
        $SwallowingDisordersTL->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTL->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución asociado al paciente exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTL->toArray()]
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
        $SwallowingDisordersTL = SwallowingDisordersTL::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenido exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTL]
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
        $SwallowingDisordersTL = SwallowingDisordersTL::find($id);
        $SwallowingDisordersTL->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTL->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTL->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTL->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTL->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTL->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTL->observations = $request->observations;
        $SwallowingDisordersTL->type_record_id = $request->type_record_id;
        $SwallowingDisordersTL->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTL->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución actualizado exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTL]
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
            $SwallowingDisordersTL = SwallowingDisordersTL::find($id);
            $SwallowingDisordersTL->delete();

            return response()->json([
                'status' => true,
                'message' => 'Alteraciones en la Deglución eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Alteraciones en la Deglución en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
