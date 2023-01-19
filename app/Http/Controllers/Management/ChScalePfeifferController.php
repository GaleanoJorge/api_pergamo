<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePfeiffer;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScalePfeifferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScalePfeiffer = ChScalePfeiffer::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

            $ChScalePfeiffer = ChScalePfeiffer::select();

            if ($request->_sort) {
                $ChScalePfeiffer->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScalePfeiffer->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScalePfeiffer->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }
            if ($request->query("pagination", true) == "false") {
                $ChScalePfeiffer = $ChScalePfeiffer->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScalePfeiffer = $ChScalePfeiffer->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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

        $ChScalePfeiffer = ChScalePfeiffer::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePfeiffer = new ChScalePfeiffer;
        $ChScalePfeiffer->study_title = $request->study_title;
        $ChScalePfeiffer->study_value = $request->study_value;
        $ChScalePfeiffer->study_detail = $request->study_detail;
        $ChScalePfeiffer->q_one_title = $request->q_one_title;
        $ChScalePfeiffer->q_one_value = $request->q_one_value;
        $ChScalePfeiffer->q_one_detail = $request->q_one_detail;
        $ChScalePfeiffer->q_two_title = $request->q_two_title;
        $ChScalePfeiffer->q_two_value = $request->q_two_value;
        $ChScalePfeiffer->q_two_detail = $request->q_two_detail;
        $ChScalePfeiffer->q_three_title = $request->q_three_title;
        $ChScalePfeiffer->q_three_value = $request->q_three_value;
        $ChScalePfeiffer->q_three_detail = $request->q_three_detail;
        $ChScalePfeiffer->q_four_title = $request->q_four_title;
        $ChScalePfeiffer->q_four_value = $request->q_four_value;
        $ChScalePfeiffer->q_four_detail = $request->q_four_detail;
        $ChScalePfeiffer->q_five_title = $request->q_five_title;
        $ChScalePfeiffer->q_five_value = $request->q_five_value;
        $ChScalePfeiffer->q_five_detail = $request->q_five_detail;
        $ChScalePfeiffer->q_six_title = $request->q_six_title;
        $ChScalePfeiffer->q_six_value = $request->q_six_value;
        $ChScalePfeiffer->q_six_detail = $request->q_six_detail;
        $ChScalePfeiffer->q_seven_title = $request->q_seven_title;
        $ChScalePfeiffer->q_seven_value = $request->q_seven_value;
        $ChScalePfeiffer->q_seven_detail = $request->q_seven_detail;
        $ChScalePfeiffer->q_eight_title = $request->q_eight_title;
        $ChScalePfeiffer->q_eight_value = $request->q_eight_value;
        $ChScalePfeiffer->q_eight_detail = $request->q_eight_detail;
        $ChScalePfeiffer->q_nine_title = $request->q_nine_title;
        $ChScalePfeiffer->q_nine_value = $request->q_nine_value;
        $ChScalePfeiffer->q_nine_detail = $request->q_nine_detail;
        $ChScalePfeiffer->q_ten_title = $request->q_ten_title;
        $ChScalePfeiffer->q_ten_value = $request->q_ten_value;
        $ChScalePfeiffer->q_ten_detail = $request->q_ten_detail;
        $ChScalePfeiffer->total = $request->total;
        $ChScalePfeiffer->classification = $request->classification;
        $ChScalePfeiffer->type_record_id = $request->type_record_id;
        $ChScalePfeiffer->ch_record_id = $request->ch_record_id;
        $ChScalePfeiffer->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer->toArray()]
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
        $ChScalePfeiffer = ChScalePfeiffer::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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
        $ChScalePfeiffer = ChScalePfeiffer::find($id);
        $ChScalePfeiffer->study_title = $request->study_title;
        $ChScalePfeiffer->study_value = $request->study_value;
        $ChScalePfeiffer->study_detail = $request->study_detail;
        $ChScalePfeiffer->q_one_title = $request->q_one_title;
        $ChScalePfeiffer->q_one_value = $request->q_one_value;
        $ChScalePfeiffer->q_one_detail = $request->q_one_detail;
        $ChScalePfeiffer->q_two_title = $request->q_two_title;
        $ChScalePfeiffer->q_two_value = $request->q_two_value;
        $ChScalePfeiffer->q_two_detail = $request->q_two_detail;
        $ChScalePfeiffer->q_three_title = $request->q_three_title;
        $ChScalePfeiffer->q_three_value = $request->q_three_value;
        $ChScalePfeiffer->q_three_detail = $request->q_three_detail;
        $ChScalePfeiffer->q_four_title = $request->q_four_title;
        $ChScalePfeiffer->q_four_value = $request->q_four_value;
        $ChScalePfeiffer->q_four_detail = $request->q_four_detail;
        $ChScalePfeiffer->q_five_title = $request->q_five_title;
        $ChScalePfeiffer->q_five_value = $request->q_five_value;
        $ChScalePfeiffer->q_five_detail = $request->q_five_detail;
        $ChScalePfeiffer->q_six_title = $request->q_six_title;
        $ChScalePfeiffer->q_six_value = $request->q_six_value;
        $ChScalePfeiffer->q_six_detail = $request->q_six_detail;
        $ChScalePfeiffer->q_seven_title = $request->q_seven_title;
        $ChScalePfeiffer->q_seven_value = $request->q_seven_value;
        $ChScalePfeiffer->q_seven_detail = $request->q_seven_detail;
        $ChScalePfeiffer->q_eight_title = $request->q_eight_title;
        $ChScalePfeiffer->q_eight_value = $request->q_eight_value;
        $ChScalePfeiffer->q_eight_detail = $request->q_eight_detail;
        $ChScalePfeiffer->q_nine_title = $request->q_nine_title;
        $ChScalePfeiffer->q_nine_value = $request->q_nine_value;
        $ChScalePfeiffer->q_nine_detail = $request->q_nine_detail;
        $ChScalePfeiffer->q_ten_title = $request->q_ten_title;
        $ChScalePfeiffer->q_ten_value = $request->q_ten_value;
        $ChScalePfeiffer->q_ten_detail = $request->q_ten_detail;
        $ChScalePfeiffer->total = $request->total;
        $ChScalePfeiffer->classification = $request->classification;
        $ChScalePfeiffer->type_record_id = $request->type_record_id;
        $ChScalePfeiffer->ch_record_id = $request->ch_record_id;
        $ChScalePfeiffer->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_pfeiffer' => $ChScalePfeiffer]
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
            $ChScalePfeiffer = ChScalePfeiffer::find($id);

            $ChScalePfeiffer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escalas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
