<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePayette;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScalePayetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScalePayette = ChScalePayette::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScalePayette = ChScalePayette::select();

            if ($request->_sort) {
                $ChScalePayette->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScalePayette->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScalePayette->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScalePayette = $ChScalePayette->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScalePayette = $ChScalePayette->paginate($per_page, '*', 'page', $page);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Escala payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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

        $ChScalePayette = ChScalePayette::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePayette = new ChScalePayette;
        $ChScalePayette->q_one_title = $request->q_one_title;
        $ChScalePayette->q_one_value = $request->q_one_value;
        $ChScalePayette->q_one_detail = $request->q_one_detail;
        $ChScalePayette->q_two_title = $request->q_two_title;
        $ChScalePayette->q_two_value = $request->q_two_value;
        $ChScalePayette->q_two_detail = $request->q_two_detail;
        $ChScalePayette->q_three_title = $request->q_three_title;
        $ChScalePayette->q_three_value = $request->q_three_value;
        $ChScalePayette->q_three_detail = $request->q_three_detail;
        $ChScalePayette->q_four_title = $request->q_four_title;
        $ChScalePayette->q_four_value = $request->q_four_value;
        $ChScalePayette->q_four_detail = $request->q_four_detail;
        $ChScalePayette->q_five_title = $request->q_five_title;
        $ChScalePayette->q_five_value = $request->q_five_value;
        $ChScalePayette->q_five_detail = $request->q_five_detail;
        $ChScalePayette->q_six_title = $request->q_six_title;
        $ChScalePayette->q_six_value = $request->q_six_value;
        $ChScalePayette->q_six_detail = $request->q_six_detail;
        $ChScalePayette->q_seven_title = $request->q_seven_title;
        $ChScalePayette->q_seven_value = $request->q_seven_value;
        $ChScalePayette->q_seven_detail = $request->q_seven_detail;
        $ChScalePayette->q_eight_title = $request->q_eight_title;
        $ChScalePayette->q_eight_value = $request->q_eight_value;
        $ChScalePayette->q_eight_detail = $request->q_eight_detail;
        $ChScalePayette->q_nine_title = $request->q_nine_title;
        $ChScalePayette->q_nine_value = $request->q_nine_value;
        $ChScalePayette->q_nine_detail = $request->q_nine_detail;
        $ChScalePayette->q_ten_title = $request->q_ten_title;
        $ChScalePayette->q_ten_value = $request->q_ten_value;
        $ChScalePayette->q_ten_detail = $request->q_ten_detail;
        $ChScalePayette->classification = $request->classification;
        $ChScalePayette->risk = $request->risk;
        $ChScalePayette->recommendations = $request->recommendations;
        $ChScalePayette->type_record_id = $request->type_record_id;
        $ChScalePayette->ch_record_id = $request->ch_record_id;
        $ChScalePayette->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette asociada al paciente exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette->toArray()]
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
        $ChScalePayette = ChScalePayette::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette obtenida exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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
        $ChScalePayette = ChScalePayette::find($id);
        $ChScalePayette->q_one_title = $request->q_one_title;
        $ChScalePayette->q_one_value = $request->q_one_value;
        $ChScalePayette->q_one_detail = $request->q_one_detail;
        $ChScalePayette->q_two_title = $request->q_two_title;
        $ChScalePayette->q_two_value = $request->q_two_value;
        $ChScalePayette->q_two_detail = $request->q_two_detail;
        $ChScalePayette->q_three_title = $request->q_three_title;
        $ChScalePayette->q_three_value = $request->q_three_value;
        $ChScalePayette->q_three_detail = $request->q_three_detail;
        $ChScalePayette->q_four_title = $request->q_four_title;
        $ChScalePayette->q_four_value = $request->q_four_value;
        $ChScalePayette->q_four_detail = $request->q_four_detail;
        $ChScalePayette->q_five_title = $request->q_five_title;
        $ChScalePayette->q_five_value = $request->q_five_value;
        $ChScalePayette->q_five_detail = $request->q_five_detail;
        $ChScalePayette->q_six_title = $request->q_six_title;
        $ChScalePayette->q_six_value = $request->q_six_value;
        $ChScalePayette->q_six_detail = $request->q_six_detail;
        $ChScalePayette->q_seven_title = $request->q_seven_title;
        $ChScalePayette->q_seven_value = $request->q_seven_value;
        $ChScalePayette->q_seven_detail = $request->q_seven_detail;
        $ChScalePayette->q_eight_title = $request->q_eight_title;
        $ChScalePayette->q_eight_value = $request->q_eight_value;
        $ChScalePayette->q_eight_detail = $request->q_eight_detail;
        $ChScalePayette->q_nine_title = $request->q_nine_title;
        $ChScalePayette->q_nine_value = $request->q_nine_value;
        $ChScalePayette->q_nine_detail = $request->q_nine_detail;
        $ChScalePayette->q_ten_title = $request->q_ten_title;
        $ChScalePayette->q_ten_value = $request->q_ten_value;
        $ChScalePayette->q_ten_detail = $request->q_ten_detail;
        $ChScalePayette->classification = $request->classification;
        $ChScalePayette->risk = $request->risk;
        $ChScalePayette->recommendations = $request->recommendations;
        $ChScalePayette->type_record_id = $request->type_record_id;
        $ChScalePayette->ch_record_id = $request->ch_record_id;
        $ChScalePayette->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Payette actualizada exitosamente',
            'data' => ['ch_scale_payette' => $ChScalePayette]
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
            $ChScalePayette = ChScalePayette::find($id);

            $ChScalePayette->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Payette eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Payette en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
