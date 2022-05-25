<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleZarit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleZaritController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleZarit = ChScaleZarit::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        
        } else {

        $ChScaleZarit = ChScaleZarit::select();

        if ($request->_sort) {
            $ChScaleZarit->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScaleZarit->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->ch_record_id) {
            $ChScaleZarit->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->latest  && isset($request->latest)) {
        }
        if ($request->query("pagination", true) == "false") {
            $ChScaleZarit = $ChScaleZarit->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScaleZarit = $ChScaleZarit->paginate($per_page, '*', 'page', $page);
        }

    }
        return response()->json([
            'status' => true,
            'message' => 'Escala Zarit obtenida exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit]
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

        $ChScaleZarit = ChScaleZarit::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Zarit obtenida exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleZarit = new ChScaleZarit;
        $ChScaleZarit->q_one_title = $request ->q_one_title;              
        $ChScaleZarit->q_one_value = $request ->q_one_value;
        $ChScaleZarit->q_one_detail = $request ->q_one_detail;
        $ChScaleZarit->q_two_title = $request ->q_two_title;
        $ChScaleZarit->q_two_value = $request ->q_two_value;
        $ChScaleZarit->q_two_detail = $request ->q_two_detail;
        $ChScaleZarit->q_three_title = $request ->q_three_title;
        $ChScaleZarit->q_three_value = $request ->q_three_value;
        $ChScaleZarit->q_three_detail = $request ->q_three_detail;
        $ChScaleZarit->q_four_title = $request ->q_four_title;
        $ChScaleZarit->q_four_value = $request ->q_four_value;
        $ChScaleZarit->q_four_detail = $request ->q_four_detail;
        $ChScaleZarit->q_five_title = $request ->q_five_title;
        $ChScaleZarit->q_five_value = $request ->q_five_value;
        $ChScaleZarit->q_five_detail = $request ->q_five_detail;
        $ChScaleZarit->q_six_title = $request ->q_six_title;
        $ChScaleZarit->q_six_value = $request ->q_six_value;
        $ChScaleZarit->q_six_detail = $request ->q_six_detail;
        $ChScaleZarit->q_seven_title = $request ->q_seven_title;
        $ChScaleZarit->q_seven_value = $request ->q_seven_value;
        $ChScaleZarit->q_seven_detail = $request ->q_seven_detail;
        $ChScaleZarit->q_eight_title = $request ->q_eight_title;
        $ChScaleZarit->q_eight_value = $request ->q_eight_value;              
        $ChScaleZarit->q_eight_detail = $request ->q_eight_detail;
        $ChScaleZarit->q_nine_title = $request ->q_nine_title;
        $ChScaleZarit->q_nine_value = $request ->q_nine_value;
        $ChScaleZarit->q_nine_detail = $request ->q_nine_detail;
        $ChScaleZarit->q_ten_title = $request ->q_ten_title;
        $ChScaleZarit->q_ten_value = $request ->q_ten_value;
        $ChScaleZarit->q_ten_detail = $request ->q_ten_detail;
        $ChScaleZarit->q_eleven_title = $request ->q_eleven_title;
        $ChScaleZarit->q_eleven_value = $request ->q_eleven_value;
        $ChScaleZarit->q_eleven_detail = $request ->q_eleven_detail;
        $ChScaleZarit->q_twelve_title = $request ->q_twelve_title;
        $ChScaleZarit->q_twelve_value = $request ->q_twelve_value;
        $ChScaleZarit->q_twelve_detail = $request ->q_twelve_detail;
        $ChScaleZarit->q_thirteen_title = $request ->q_thirteen_title;
        $ChScaleZarit->q_thirteen_value = $request ->q_thirteen_value;
        $ChScaleZarit->q_thirteen_detail = $request ->q_thirteen_detail;
        $ChScaleZarit->q_fourteen_title = $request ->q_fourteen_title;
        $ChScaleZarit->q_fourteen_value = $request ->q_fourteen_value;
        $ChScaleZarit->q_fourteen_detail = $request ->q_fourteen_detail;
        $ChScaleZarit->q_fifteen_title = $request ->q_fifteen_title;
        $ChScaleZarit->q_fifteen_value = $request ->q_fifteen_value;
        $ChScaleZarit->q_fifteen_detail = $request ->q_fifteen_detail;              
        $ChScaleZarit->q_sixteen_title = $request ->q_sixteen_title;
        $ChScaleZarit->q_sixteen_value = $request ->q_sixteen_value;
        $ChScaleZarit->q_sixteen_detail = $request ->q_sixteen_detail;
        $ChScaleZarit->q_seventeen_title = $request ->q_seventeen_title;
        $ChScaleZarit->q_seventeen_value = $request ->q_seventeen_value;
        $ChScaleZarit->q_seventeen_detail = $request ->q_seventeen_detail;
        $ChScaleZarit->q_eighteen_title = $request ->q_eighteen_title;
        $ChScaleZarit->q_eighteen_value = $request ->q_eighteen_value;
        $ChScaleZarit->q_eighteen_detail = $request ->q_eighteen_detail;
        $ChScaleZarit->q_nineteen_title = $request ->q_nineteen_title;
        $ChScaleZarit->q_nineteen_value = $request ->q_nineteen_value;
        $ChScaleZarit->q_nineteen_detail = $request ->q_nineteen_detail;
        $ChScaleZarit->q_twenty_title = $request ->q_twenty_title;
        $ChScaleZarit->q_twenty_value = $request ->q_twenty_value;
        $ChScaleZarit->q_twenty_detail = $request ->q_twenty_detail;
        $ChScaleZarit->q_twenty_one_title = $request ->q_twenty_one_title;
        $ChScaleZarit->q_twenty_one_value = $request ->q_twenty_one_value;
        $ChScaleZarit->q_twenty_one_detail = $request ->q_twenty_one_detail;
        $ChScaleZarit->q_twenty_two_title = $request ->q_twenty_two_title;
        $ChScaleZarit->q_twenty_two_value = $request ->q_twenty_two_value;
        $ChScaleZarit->q_twenty_two_detail = $request ->q_twenty_two_detail;
        $ChScaleZarit->total = $request ->total;
        $ChScaleZarit->classification = $request ->classification;
        $ChScaleZarit->type_record_id = $request->type_record_id;
        $ChScaleZarit->ch_record_id = $request->ch_record_id;
        $ChScaleZarit->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Zarit asociada al paciente exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit->toArray()]
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
        $ChScaleZarit = ChScaleZarit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Zarit obtenida exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit]
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
        $ChScaleZarit = ChScaleZarit::find($id);
        $ChScaleZarit->q_one_title = $request ->q_one_title;              
        $ChScaleZarit->q_one_value = $request ->q_one_value;
        $ChScaleZarit->q_one_detail = $request ->q_one_detail;
        $ChScaleZarit->q_two_title = $request ->q_two_title;
        $ChScaleZarit->q_two_value = $request ->q_two_value;
        $ChScaleZarit->q_two_detail = $request ->q_two_detail;
        $ChScaleZarit->q_three_title = $request ->q_three_title;
        $ChScaleZarit->q_three_value = $request ->q_three_value;
        $ChScaleZarit->q_three_detail = $request ->q_three_detail;
        $ChScaleZarit->q_four_title = $request ->q_four_title;
        $ChScaleZarit->q_four_value = $request ->q_four_value;
        $ChScaleZarit->q_four_detail = $request ->q_four_detail;
        $ChScaleZarit->q_five_title = $request ->q_five_title;
        $ChScaleZarit->q_five_value = $request ->q_five_value;
        $ChScaleZarit->q_five_detail = $request ->q_five_detail;
        $ChScaleZarit->q_six_title = $request ->q_six_title;
        $ChScaleZarit->q_six_value = $request ->q_six_value;
        $ChScaleZarit->q_six_detail = $request ->q_six_detail;
        $ChScaleZarit->q_seven_title = $request ->q_seven_title;
        $ChScaleZarit->q_seven_value = $request ->q_seven_value;
        $ChScaleZarit->q_seven_detail = $request ->q_seven_detail;
        $ChScaleZarit->q_eight_title = $request ->q_eight_title;
        $ChScaleZarit->q_eight_value = $request ->q_eight_value;              
        $ChScaleZarit->q_eight_detail = $request ->q_eight_detail;
        $ChScaleZarit->q_nine_title = $request ->q_nine_title;
        $ChScaleZarit->q_nine_value = $request ->q_nine_value;
        $ChScaleZarit->q_nine_detail = $request ->q_nine_detail;
        $ChScaleZarit->q_ten_title = $request ->q_ten_title;
        $ChScaleZarit->q_ten_value = $request ->q_ten_value;
        $ChScaleZarit->q_ten_detail = $request ->q_ten_detail;
        $ChScaleZarit->q_eleven_title = $request ->q_eleven_title;
        $ChScaleZarit->q_eleven_value = $request ->q_eleven_value;
        $ChScaleZarit->q_eleven_detail = $request ->q_eleven_detail;
        $ChScaleZarit->q_twelve_title = $request ->q_twelve_title;
        $ChScaleZarit->q_twelve_value = $request ->q_twelve_value;
        $ChScaleZarit->q_twelve_detail = $request ->q_twelve_detail;
        $ChScaleZarit->q_thirteen_title = $request ->q_thirteen_title;
        $ChScaleZarit->q_thirteen_value = $request ->q_thirteen_value;
        $ChScaleZarit->q_thirteen_detail = $request ->q_thirteen_detail;
        $ChScaleZarit->q_fourteen_title = $request ->q_fourteen_title;
        $ChScaleZarit->q_fourteen_value = $request ->q_fourteen_value;
        $ChScaleZarit->q_fourteen_detail = $request ->q_fourteen_detail;
        $ChScaleZarit->q_fifteen_title = $request ->q_fifteen_title;
        $ChScaleZarit->q_fifteen_value = $request ->q_fifteen_value;
        $ChScaleZarit->q_fifteen_detail = $request ->q_fifteen_detail;              
        $ChScaleZarit->q_sixteen_title = $request ->q_sixteen_title;
        $ChScaleZarit->q_sixteen_value = $request ->q_sixteen_value;
        $ChScaleZarit->q_sixteen_detail = $request ->q_sixteen_detail;
        $ChScaleZarit->q_seventeen_title = $request ->q_seventeen_title;
        $ChScaleZarit->q_seventeen_value = $request ->q_seventeen_value;
        $ChScaleZarit->q_seventeen_detail = $request ->q_seventeen_detail;
        $ChScaleZarit->q_eighteen_title = $request ->q_eighteen_title;
        $ChScaleZarit->q_eighteen_value = $request ->q_eighteen_value;
        $ChScaleZarit->q_eighteen_detail = $request ->q_eighteen_detail;
        $ChScaleZarit->q_nineteen_title = $request ->q_nineteen_title;
        $ChScaleZarit->q_nineteen_value = $request ->q_nineteen_value;
        $ChScaleZarit->q_nineteen_detail = $request ->q_nineteen_detail;
        $ChScaleZarit->q_twenty_title = $request ->q_twenty_title;
        $ChScaleZarit->q_twenty_value = $request ->q_twenty_value;
        $ChScaleZarit->q_twenty_detail = $request ->q_twenty_detail;
        $ChScaleZarit->q_twenty_one_title = $request ->q_twenty_one_title;
        $ChScaleZarit->q_twenty_one_value = $request ->q_twenty_one_value;
        $ChScaleZarit->q_twenty_one_detail = $request ->q_twenty_one_detail;
        $ChScaleZarit->q_twenty_two_title = $request ->q_twenty_two_title;
        $ChScaleZarit->q_twenty_two_value = $request ->q_twenty_two_value;
        $ChScaleZarit->q_twenty_two_detail = $request ->q_twenty_two_detail;
        $ChScaleZarit->total = $request ->total;
        $ChScaleZarit->classification = $request ->classification;
        $ChScaleZarit->type_record_id = $request->type_record_id;
        $ChScaleZarit->ch_record_id = $request->ch_record_id;
        $ChScaleZarit->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Zarit actualizada exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit]
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
            $ChScaleZarit = ChScaleZarit::find($id);

            $ChScaleZarit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Zarit eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Zarit en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
