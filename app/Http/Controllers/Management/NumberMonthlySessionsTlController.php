<?php

namespace App\Http\Controllers\Management;

use App\Models\NumberMonthlySessionsTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class NumberMonthlySessionsTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $NumberMonthlySessionsTl = NumberMonthlySessionsTl::select();

        if ($request->_sort) {
            $NumberMonthlySessionsTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $NumberMonthlySessionsTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $NumberMonthlySessionsTl = $NumberMonthlySessionsTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $NumberMonthlySessionsTl = $NumberMonthlySessionsTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'numero de sesiones mensuales e intensidad semana obtenidos exitosamente',
            'data' => ['number_monthly_sessions_tl' => $NumberMonthlySessionsTl]
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
        
       
        $NumberMonthlySessionsTl = NumberMonthlySessionsTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'numero de sesiones mensuales e intensidad semana asociado al paciente exitosamente',
            'data' => ['number_monthly_sessions_tl' => $NumberMonthlySessionsTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $NumberMonthlySessionsTl = new NumberMonthlySessionsTl;
        $NumberMonthlySessionsTl->monthly_sessions = $request->monthly_sessions;
        $NumberMonthlySessionsTl->weekly_intensity = $request->weekly_intensity;
        $NumberMonthlySessionsTl->recomendations = $request->recomendations;
        $NumberMonthlySessionsTl->type_record_id = $request->type_record_id;
        $NumberMonthlySessionsTl->ch_record_id = $request->ch_record_id;
        $NumberMonthlySessionsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'numero de sesiones mensuales e intensidad semana asociado al paciente exitosamente',
            'data' => ['number_monthly_sessions_tl' => $NumberMonthlySessionsTl->toArray()]
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
        $NumberMonthlySessionsTl = NumberMonthlySessionsTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'numero de sesiones mensuales e intensidad semana obtenido exitosamente',
            'data' => ['number_monthly_sessions_tl' => $NumberMonthlySessionsTl]
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
        $NumberMonthlySessionsTl = NumberMonthlySessionsTl::find($id);
        $NumberMonthlySessionsTl->monthly_sessions = $request->monthly_sessions;
        $NumberMonthlySessionsTl->weekly_intensity = $request->weekly_intensity;
        $NumberMonthlySessionsTl->recomendations = $request->recomendations;
        $NumberMonthlySessionsTl->type_record_id = $request->type_record_id;
        $NumberMonthlySessionsTl->ch_record_id = $request->ch_record_id;
        $NumberMonthlySessionsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'numero de sesiones mensuales e intensidad semana actualizado exitosamente',
            'data' => ['number_monthly_sessions_tl' => $NumberMonthlySessionsTl]
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
            $NumberMonthlySessionsTl = NumberMonthlySessionsTl::find($id);
            $NumberMonthlySessionsTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'numero de sesiones mensuales e intensidad semana eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'numero de sesiones mensuales e intensidad semana en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
