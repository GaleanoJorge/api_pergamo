<?php

namespace App\Http\Controllers\Management;

use App\Models\ChETherGoalsFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChETherGoalsFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChETherGoalsFT = ChETherGoalsFT::select();

        if ($request->ch_record_id) {
            $ChETherGoalsFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChETherGoalsFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChETherGoalsFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChETherGoalsFT = $ChETherGoalsFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChETherGoalsFT = $ChETherGoalsFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_ther_goals_f_t' => $ChETherGoalsFT]
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
        $ChETherGoalsFT = ChETherGoalsFT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
        ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChETherGoalsFT = ChETherGoalsFT::select('ch_e_ther_goals_f_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_ther_goals_f_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_ther_goals_f_t' => $ChETherGoalsFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        //$validate = ChETherGoalsFT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);

        //if (!$validate) {
            $ChETherGoalsFT = new ChETherGoalsFT;
            $ChETherGoalsFT->check1_hold = $request->check1_hold;
            $ChETherGoalsFT->check2_improve = $request->check2_improve;
            $ChETherGoalsFT->check3_structure = $request->check3_structure;
            $ChETherGoalsFT->check4_promote = $request->check4_promote;
            $ChETherGoalsFT->check5_strengthen = $request->check5_strengthen;
            $ChETherGoalsFT->check6_promote_2 = $request->check6_promote_2;
            $ChETherGoalsFT->check7_develop = $request->check7_develop;
            $ChETherGoalsFT->check8_strengthen_2 = $request->check8_strengthen_2;
            $ChETherGoalsFT->check9_favor = $request->check9_favor;
            $ChETherGoalsFT->check10_functionality = $request->check10_functionality;

            $ChETherGoalsFT->type_record_id = $request->type_record_id;
            $ChETherGoalsFT->ch_record_id = $request->ch_record_id;
            $ChETherGoalsFT->save();

            return response()->json([
                'status' => true,
                'message' => 'Valoracion asociados al paciente exitosamente',
                'data' => ['ch_e_ther_goals_f_t' => $ChETherGoalsFT->toArray()]
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
        $ChETherGoalsFT = ChETherGoalsFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_ther_goals_f_t' => $ChETherGoalsFT]
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
        $ChETherGoalsFT = ChETherGoalsFT::find($id);
        $ChETherGoalsFT->check1_hold = $request->check1_hold;
        $ChETherGoalsFT->check2_improve = $request->check2_improve;
        $ChETherGoalsFT->check3_structure = $request->check3_structure;
        $ChETherGoalsFT->check4_promote = $request->check4_promote;
        $ChETherGoalsFT->check5_strengthen = $request->check5_strengthen;
        $ChETherGoalsFT->check6_promote_2 = $request->check6_promote_2;
        $ChETherGoalsFT->check7_develop = $request->check7_develop;
        $ChETherGoalsFT->check8_strengthen_2 = $request->check8_strengthen_2;
        $ChETherGoalsFT->check9_favor = $request->check9_favor;
        $ChETherGoalsFT->check10_functionality = $request->check10_functionality;

        $ChETherGoalsFT->type_record_id = $request->type_record_id;
        $ChETherGoalsFT->ch_record_id = $request->ch_record_id;
        $ChETherGoalsFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_ther_goals_f_t' => $ChETherGoalsFT]
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
            $ChETherGoalsFT = ChETherGoalsFT::find($id);
            $ChETherGoalsFT->delete();

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
