<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleScreening;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleScreening = ChScaleScreening::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScaleScreening = ChScaleScreening::select();

            if ($request->_sort) {
                $ChScaleScreening->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleScreening->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScaleScreening->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScaleScreening = $ChScaleScreening->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleScreening = $ChScaleScreening->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Escala Screening obtenido exitosamente',
            'data' => ['ch_scale_screening' => $ChScaleScreening]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {

        $ChScaleScreening = ChScaleScreening::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Screening obtenido exitosamente',
            'data' => ['ch_scale_screening' => $ChScaleScreening]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleScreening = new ChScaleScreening;
        $ChScaleScreening->v_one_title  = $request->v_one_title;
        $ChScaleScreening->v_one_value  = $request->v_one_value;
        $ChScaleScreening->v_one_detail  = $request->v_one_detail;
        $ChScaleScreening->v_two_title  = $request->v_two_title;
        $ChScaleScreening->v_two_value  = $request->v_two_value;
        $ChScaleScreening->v_two_detail  = $request->v_two_detail;
        $ChScaleScreening->v_three_title  = $request->v_three_title;
        $ChScaleScreening->v_three_value  = $request->v_three_value;
        $ChScaleScreening->v_three_detail   = $request->v_three_detail;
        $ChScaleScreening->v_four_title  = $request->v_four_title;
        $ChScaleScreening->v_four_value  = $request->v_four_value;
        $ChScaleScreening->v_four_detail  = $request->v_four_detail;
        $ChScaleScreening->v_five_title  = $request->v_five_title;
        $ChScaleScreening->v_five_value  = $request->v_five_value;
        $ChScaleScreening->v_five_detail  = $request->v_five_detail;
        $ChScaleScreening->v_six_title  = $request->v_six_title;
        $ChScaleScreening->v_six_value  = $request->v_six_value;
        $ChScaleScreening->v_six_detail  = $request->v_six_detail;
        $ChScaleScreening->v_seven_title  = $request->v_seven_title;
        $ChScaleScreening->v_seven_value  = $request->v_seven_value;
        $ChScaleScreening->v_seven_detail  = $request->v_seven_detail;
        $ChScaleScreening->v_eight_title  = $request->v_eight_title;
        $ChScaleScreening->v_eight_value  = $request->v_eight_value;
        $ChScaleScreening->v_eight_detail  = $request->v_eight_detail;
        $ChScaleScreening->v_nine_title  = $request->v_nine_title;
        $ChScaleScreening->v_nine_value   = $request->v_nine_value;
        $ChScaleScreening->v_nine_detail  = $request->v_nine_detail;
        $ChScaleScreening->v_ten_title  = $request->v_ten_title;
        $ChScaleScreening->v_ten_value  = $request->v_ten_value;
        $ChScaleScreening->v_ten_detail  = $request->v_ten_detail;
        $ChScaleScreening->total  = $request->total;
        $ChScaleScreening->risk  = $request->risk;
        $ChScaleScreening->type_record_id = $request->type_record_id;
        $ChScaleScreening->ch_record_id = $request->ch_record_id;
        $ChScaleScreening->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Screening asociada al paciente exitosamente',
            'data' => ['ch_scale_screening' => $ChScaleScreening->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChScaleScreening = ChScaleScreening::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Screening obtenida exitosamente',
            'data' => ['ch_scale_screening' => $ChScaleScreening]
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
        $ChScaleScreening = ChScaleScreening::find($id);
        $ChScaleScreening->v_one_title  = $request->v_one_title;
        $ChScaleScreening->v_one_value  = $request->v_one_value;
        $ChScaleScreening->v_one_detail  = $request->v_one_detail;
        $ChScaleScreening->v_two_title  = $request->v_two_title;
        $ChScaleScreening->v_two_value  = $request->v_two_value;
        $ChScaleScreening->v_two_detail  = $request->v_two_detail;
        $ChScaleScreening->v_three_title  = $request->v_three_title;
        $ChScaleScreening->v_three_value  = $request->v_three_value;
        $ChScaleScreening->v_three_detail   = $request->v_three_detail;
        $ChScaleScreening->v_four_title  = $request->v_four_title;
        $ChScaleScreening->v_four_value  = $request->v_four_value;
        $ChScaleScreening->v_four_detail  = $request->v_four_detail;
        $ChScaleScreening->v_five_title  = $request->v_five_title;
        $ChScaleScreening->v_five_value  = $request->v_five_value;
        $ChScaleScreening->v_five_detail  = $request->v_five_detail;
        $ChScaleScreening->v_six_title  = $request->v_six_title;
        $ChScaleScreening->v_six_value  = $request->v_six_value;
        $ChScaleScreening->v_six_detail  = $request->v_six_detail;
        $ChScaleScreening->v_seven_title  = $request->v_seven_title;
        $ChScaleScreening->v_seven_value  = $request->v_seven_value;
        $ChScaleScreening->v_seven_detail  = $request->v_seven_detail;
        $ChScaleScreening->v_eight_title  = $request->v_eight_title;
        $ChScaleScreening->v_eight_value  = $request->v_eight_value;
        $ChScaleScreening->v_eight_detail  = $request->v_eight_detail;
        $ChScaleScreening->v_nine_title  = $request->v_nine_title;
        $ChScaleScreening->v_nine_value   = $request->v_nine_value;
        $ChScaleScreening->v_nine_detail  = $request->v_nine_detail;
        $ChScaleScreening->v_ten_title  = $request->v_ten_title;
        $ChScaleScreening->v_ten_value  = $request->v_ten_value;
        $ChScaleScreening->v_ten_detail  = $request->v_ten_detail;
        $ChScaleScreening->total  = $request->total;
        $ChScaleScreening->risk  = $request->risk;
        $ChScaleScreening->type_record_id = $request->type_record_id;
        $ChScaleScreening->ch_record_id = $request->ch_record_id;
        $ChScaleScreening->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Screening actualizada exitosamente',
            'data' => ['ch_scale_screening' => $ChScaleScreening]
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
            $ChScaleScreening = ChScaleScreening::find($id);

            $ChScaleScreening->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Screening eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Screening en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
