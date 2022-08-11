<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEWeeklyFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEWeeklyFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEWeeklyFT = ChEWeeklyFT::select();

        if ($request->ch_record_id) {
            $ChEWeeklyFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEWeeklyFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEWeeklyFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEWeeklyFT = $ChEWeeklyFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEWeeklyFT = $ChEWeeklyFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_weekly_f_t' => $ChEWeeklyFT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {
        $ChEWeeklyFT = ChEWeeklyFT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_weekly_f_t' => $ChEWeeklyFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        //$validate = ChEWeeklyFT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);

        //if (!$validate) {
            $ChEWeeklyFT = new ChEWeeklyFT;
            $ChEWeeklyFT->monthly_sessions = $request->monthly_sessions;
            $ChEWeeklyFT->weekly_intensity = $request->weekly_intensity;
            $ChEWeeklyFT->recommendations = $request->recommendations;

            $ChEWeeklyFT->type_record_id = $request->type_record_id;
            $ChEWeeklyFT->ch_record_id = $request->ch_record_id;
            $ChEWeeklyFT->save();

            return response()->json([
                'status' => true,
                'message' => 'Valoracion asociados al paciente exitosamente',
                'data' => ['ch_e_weekly_f_t' => $ChEWeeklyFT->toArray()]
            ]);
          
        // } else {
        //      return response()->json([
        //         'status' => false,
        //          'message' => 'Ya tiene observación'
        //     ], 423);
        //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEWeeklyFT = ChEWeeklyFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_weekly_f_t' => $ChEWeeklyFT]
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
        $ChEWeeklyFT = ChEWeeklyFT::find($id);
        $ChEWeeklyFT->monthly_sessions = $request->monthly_sessions;
        $ChEWeeklyFT->weekly_intensity = $request->weekly_intensity;
        $ChEWeeklyFT->recommendations = $request->recommendations;

        $ChEWeeklyFT->type_record_id = $request->type_record_id;
        $ChEWeeklyFT->ch_record_id = $request->ch_record_id;
        $ChEWeeklyFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_weekly_f_t' => $ChEWeeklyFT]
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
            $ChEWeeklyFT = ChEWeeklyFT::find($id);
            $ChEWeeklyFT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
