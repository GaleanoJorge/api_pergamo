<?php

namespace App\Http\Controllers\Management;

use App\Models\SwallowingDisordersTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SwallowingDisordersTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SwallowingDisordersTl = SwallowingDisordersTl::select();

        if ($request->_sort) {
            $SwallowingDisordersTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SwallowingDisordersTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SwallowingDisordersTl = $SwallowingDisordersTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SwallowingDisordersTl = $SwallowingDisordersTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenidos exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTl]
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
        
       
        $SwallowingDisordersTl = SwallowingDisordersTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución asociado al paciente exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $SwallowingDisordersTl = new SwallowingDisordersTl;
        $SwallowingDisordersTl->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTl->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTl->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTl->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTl->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTl->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTl->observations = $request->observations;
        $SwallowingDisordersTl->type_record_id = $request->type_record_id;
        $SwallowingDisordersTl->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución asociado al paciente exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTl->toArray()]
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
        $SwallowingDisordersTl = SwallowingDisordersTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución obtenido exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTl]
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
        $SwallowingDisordersTl = SwallowingDisordersTl::find($id);
        $SwallowingDisordersTl->solid_dysphagia = $request->solid_dysphagia;
        $SwallowingDisordersTl->clear_liquid_dysphagia = $request->clear_liquid_dysphagia;
        $SwallowingDisordersTl->thick_liquid_dysphagia = $request->thick_liquid_dysphagia;
        $SwallowingDisordersTl->nasogastric_tube = $request->nasogastric_tube;
        $SwallowingDisordersTl->gastrostomy = $request->gastrostomy;
        $SwallowingDisordersTl->nothing_orally = $request->nothing_orally;
        $SwallowingDisordersTl->observations = $request->observations;
        $SwallowingDisordersTl->type_record_id = $request->type_record_id;
        $SwallowingDisordersTl->ch_record_id = $request->ch_record_id;
        $SwallowingDisordersTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Deglución actualizado exitosamente',
            'data' => ['swallowing_disorders_tl' => $SwallowingDisordersTl]
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
            $SwallowingDisordersTl = SwallowingDisordersTl::find($id);
            $SwallowingDisordersTl->delete();

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
