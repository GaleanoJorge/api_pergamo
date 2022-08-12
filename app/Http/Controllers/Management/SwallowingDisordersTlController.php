<?php

namespace App\Http\Controllers\Management;

use App\Models\SwallowingDisordersTI;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SwallowingDisordersTIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SwallowingDisordersTI = SwallowingDisordersTI::select();

        if ($request->_sort) {
            $SwallowingDisordersTI->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SwallowingDisordersTI->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SwallowingDisordersTI = $SwallowingDisordersTI->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SwallowingDisordersTI = $SwallowingDisordersTI->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenidos exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTI]
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
        
       
        $SwallowingDisordersTI = SwallowingDisordersTI::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución asociado al paciente exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTI]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $SwallowingDisordersTI = new SwallowingDisordersTI;
        $SwallowingDisordersTI->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTI->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTI->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTI->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTI->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTI->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTI->observations = $request->observations;
        $SwallowingDisordersTI->type_record_id = $request->type_record_id;
        $SwallowingDisordersTI->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTI->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución asociado al paciente exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTI->toArray()]
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
        $SwallowingDisordersTI = SwallowingDisordersTI::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenido exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTI]
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
        $SwallowingDisordersTI = SwallowingDisordersTI::find($id);
        $SwallowingDisordersTI->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTI->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTI->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTI->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTI->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTI->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTI->observations = $request->observations;
        $SwallowingDisordersTI->type_record_id = $request->type_record_id;
        $SwallowingDisordersTI->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTI->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución actualizado exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTI]
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
            $SwallowingDisordersTI = SwallowingDisordersTI::find($id);
            $SwallowingDisordersTI->delete();

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
