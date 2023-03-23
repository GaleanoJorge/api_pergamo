<?php

namespace App\Http\Controllers\Management;

use App\Models\ServiceLevelTc;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceLevelTcRequest;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ServiceLevelTcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServiceLevelTc = ServiceLevelTc::select();

        if ($request->_sort) {
            $ServiceLevelTc->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ServiceLevelTc->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->status_id) {
            $ServiceLevelTc->where('status_id', $request->status_id);
        }

        if ($request->query("pagination", true) == "false") {
            $ServiceLevelTc = $ServiceLevelTc->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServiceLevelTc = $ServiceLevelTc->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Nivel de servicio obtenidos exitosamente',
            'data' => ['service_level_tc' => $ServiceLevelTc]
        ]);
    }

    public function store(ServiceLevelTcRequest $request): JsonResponse
    {
        $ServiceLevelTc = new ServiceLevelTc;
        $ServiceLevelTc->line = $request->line;
        $ServiceLevelTc->i0_10 = $request->i0_10;
        $ServiceLevelTc->i11_20= $request->i11_20;
        $ServiceLevelTc->i21_30= $request->i21_30;
        $ServiceLevelTc->i31_40= $request->i31_40;
        $ServiceLevelTc->i41_50= $request->i41_50;
        $ServiceLevelTc->i51_60= $request->i51_60;
        $ServiceLevelTc->older_than_60= $request->older_than_60;
        $ServiceLevelTc->total_calls_received= $request->total_calls_received;
        $ServiceLevelTc->replied_20= $request->replied_20;
        $ServiceLevelTc->service_level= $request->service_level;
        $ServiceLevelTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Nivel de servicio creados exitosamente',
            'data' => ['service_level_tc' => $ServiceLevelTc->toArray()]
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
        $ServiceLevelTc = ServiceLevelTc::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nivel de servicio obtenidos exitosamente',
            'data' => ['service_level_tc' => $ServiceLevelTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ServiceLevelTcRequest $request, int $id): JsonResponse
    {
        $ServiceLevelTc = new ServiceLevelTc;
        $ServiceLevelTc->line = $request->line;
        $ServiceLevelTc->i0_10 = $request->i0_10;
        $ServiceLevelTc->i11_20= $request->i11_20;
        $ServiceLevelTc->i21_30= $request->i21_30;
        $ServiceLevelTc->i31_40= $request->i31_40;
        $ServiceLevelTc->i41_50= $request->i41_50;
        $ServiceLevelTc->i51_60= $request->i51_60;
        $ServiceLevelTc->older_than_60= $request->older_than_60;
        $ServiceLevelTc->total_calls_received= $request->total_calls_received;
        $ServiceLevelTc->replied_20= $request->replied_20;
        $ServiceLevelTc->service_level= $request->service_level;
        $ServiceLevelTc->save();

        return response()->json([
            'status' => true,
            'message' => 'Nivel de servicio actualizado exitosamente',
            'data' => ['service_level_tc' => $ServiceLevelTc]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function import(Request $request): JsonResponse
    {
        foreach ($request->toArray() as $key => $item) {

            $ServiceLevelTc = new ServiceLevelTc;
            if(isset($item['COLA'])){
                $ServiceLevelTc->line  = $item['COLA'];
            }
            if(isset($item['0 - 10'])){
                $ServiceLevelTc->i0_10 = $item['0 - 10'];
            }
            if(isset($item['11 - 20'])){
                $ServiceLevelTc->i11_20  = $item['11 - 20'];
            }
            if(isset($item['21 - 30'])){
                $ServiceLevelTc->i21_30  = $item['21 - 30'];
            }
            if(isset($item['31 - 40'])){
                $ServiceLevelTc->i31_40 = $item['31 - 40'];
            }
            if(isset($item['41 - 50'])){
                $ServiceLevelTc->i41_50  = $item['41 - 50'];
            }
            if(isset($item['51 - 60'])){
                $ServiceLevelTc->i51_60  = $item['51 - 60'];
            }
            if(isset($item['MAYOR A 60'])){
                $ServiceLevelTc->older_than_60  = $item['MAYOR A 60'];
            }
            if(isset($item['TOTAL LLAMADAS RECIBIDAS'])){
                $ServiceLevelTc->total_calls_received  = $item['TOTAL LLAMADAS RECIBIDAS'];
            }
            if(isset($item['CONTESTADAS ANTES DE 20 SEG'])){
                $ServiceLevelTc->replied_20  = $item['CONTESTADAS ANTES DE 20 SEG'];
            }
            if(isset($item['NIVEL DE SERVICIO'])){
                $ServiceLevelTc->service_level  = $item['NIVEL DE SERVICIO'];
            }
            $ServiceLevelTc->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Nivel de servicio actualizados exitosamente',
            'data' => ['service_level_tc' => $ServiceLevelTc]
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
            $ServiceLevelTc = ServiceLevelTc::find($id);
            $ServiceLevelTc->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nivel de servicio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nivel de servicio esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
