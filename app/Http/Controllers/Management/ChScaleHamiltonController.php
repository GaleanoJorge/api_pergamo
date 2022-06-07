<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleHamilton;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleHamiltonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleHamilton = ChScaleHamilton::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScaleHamilton = ChScaleHamilton::select();

            if ($request->_sort) {
                $ChScaleHamilton->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScaleHamilton->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScaleHamilton->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScaleHamilton = $ChScaleHamilton->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScaleHamilton = $ChScaleHamilton->paginate($per_page, '*', 'page', $page);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Escala Hamilton obtenido exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton]
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

        $ChScaleHamilton = ChScaleHamilton::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala Hamilton obtenido exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleHamilton = new ChScaleHamilton;
        $ChScaleHamilton->v_one_title  = $request->v_one_title;
        $ChScaleHamilton->v_one_value  = $request->v_one_value;
        $ChScaleHamilton->v_one_detail  = $request->v_one_detail;
        $ChScaleHamilton->v_two_title  = $request->v_two_title;
        $ChScaleHamilton->v_two_value  = $request->v_two_value;
        $ChScaleHamilton->v_two_detail  = $request->v_two_detail;
        $ChScaleHamilton->v_three_title  = $request->v_three_title;
        $ChScaleHamilton->v_three_value  = $request->v_three_value;
        $ChScaleHamilton->v_three_detail   = $request->v_three_detail;
        $ChScaleHamilton->v_four_title  = $request->v_four_title;
        $ChScaleHamilton->v_four_value  = $request->v_four_value;
        $ChScaleHamilton->v_four_detail  = $request->v_four_detail;
        $ChScaleHamilton->v_five_title  = $request->v_five_title;
        $ChScaleHamilton->v_five_value  = $request->v_five_value;
        $ChScaleHamilton->v_five_detail  = $request->v_five_detail;
        $ChScaleHamilton->v_six_title  = $request->v_six_title;
        $ChScaleHamilton->v_six_value  = $request->v_six_value;
        $ChScaleHamilton->v_six_detail  = $request->v_six_detail;
        $ChScaleHamilton->v_seven_title  = $request->v_seven_title;
        $ChScaleHamilton->v_seven_value  = $request->v_seven_value;
        $ChScaleHamilton->v_seven_detail  = $request->v_seven_detail;
        $ChScaleHamilton->v_eight_title  = $request->v_eight_title;
        $ChScaleHamilton->v_eight_value  = $request->v_eight_value;
        $ChScaleHamilton->v_eight_detail  = $request->v_eight_detail;
        $ChScaleHamilton->v_nine_title  = $request->v_nine_title;
        $ChScaleHamilton->v_nine_value   = $request->v_nine_value;
        $ChScaleHamilton->v_nine_detail  = $request->v_nine_detail;
        $ChScaleHamilton->v_ten_title  = $request->v_ten_title;
        $ChScaleHamilton->v_ten_value  = $request->v_ten_value;
        $ChScaleHamilton->v_ten_detail  = $request->v_ten_detail;
        $ChScaleHamilton->v_eleven_title  = $request->v_eleven_title;
        $ChScaleHamilton->v_eleven_value  = $request->v_eleven_value;
        $ChScaleHamilton->v_eleven_value  = $request->v_eleven_value;
        $ChScaleHamilton->v_twelve_title  = $request->v_twelve_title;
        $ChScaleHamilton->v_twelve_value  = $request->v_twelve_value;
        $ChScaleHamilton->v_twelve_detail  = $request->v_twelve_detail;
        $ChScaleHamilton->v_thirteen_title  = $request->v_thirteen_title;
        $ChScaleHamilton->v_thirteen_value  = $request->v_thirteen_value;
        $ChScaleHamilton->v_thirteen_detail  = $request->v_thirteen_detail;
        $ChScaleHamilton->v_fourteen_title  = $request->v_fourteen_title;
        $ChScaleHamilton->v_fourteen_value  = $request->v_fourteen_value;
        $ChScaleHamilton->v_fourteen_detail  = $request->v_fourteen_detail;
        $ChScaleHamilton->v_fifteen_title   = $request->v_fifteen_title;
        $ChScaleHamilton->v_fifteen_value  = $request->v_fifteen_value;
        $ChScaleHamilton->v_fifteen_detail  = $request->v_fifteen_detail;
        $ChScaleHamilton->v_sixteen_title  = $request->v_sixteen_title;
        $ChScaleHamilton->v_sixteen_value  = $request->v_sixteen_value;
        $ChScaleHamilton->v_sixteen_detail  = $request->v_sixteen_detail;
        $ChScaleHamilton->v_seventeen_value  = $request->v_seventeen_value;
        $ChScaleHamilton->v_seventeen_title  = $request->v_seventeen_title;
        $ChScaleHamilton->v_seventeen_detail  = $request->v_seventeen_detail;
        $ChScaleHamilton->total  = $request->total;
        $ChScaleHamilton->qualification  = $request->qualification;
        $ChScaleHamilton->type_record_id = $request->type_record_id;
        $ChScaleHamilton->ch_record_id = $request->ch_record_id;
        $ChScaleHamilton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Hamilton asociada al paciente exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton->toArray()]
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
        $ChScaleHamilton = ChScaleHamilton::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Hamilton obtenida exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton]
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
        $ChScaleHamilton = ChScaleHamilton::find($id);
        $ChScaleHamilton->v_one_title  = $request->v_one_title;
        $ChScaleHamilton->v_one_value  = $request->v_one_value;
        $ChScaleHamilton->v_one_detail  = $request->v_one_detail;
        $ChScaleHamilton->v_two_title  = $request->v_two_title;
        $ChScaleHamilton->v_two_value  = $request->v_two_value;
        $ChScaleHamilton->v_two_detail  = $request->v_two_detail;
        $ChScaleHamilton->v_three_title  = $request->v_three_title;
        $ChScaleHamilton->v_three_value  = $request->v_three_value;
        $ChScaleHamilton->v_three_detail   = $request->v_three_detail;
        $ChScaleHamilton->v_four_title  = $request->v_four_title;
        $ChScaleHamilton->v_four_value  = $request->v_four_value;
        $ChScaleHamilton->v_four_detail  = $request->v_four_detail;
        $ChScaleHamilton->v_five_title  = $request->v_five_title;
        $ChScaleHamilton->v_five_value  = $request->v_five_value;
        $ChScaleHamilton->v_five_detail  = $request->v_five_detail;
        $ChScaleHamilton->v_six_title  = $request->v_six_title;
        $ChScaleHamilton->v_six_value  = $request->v_six_value;
        $ChScaleHamilton->v_six_detail  = $request->v_six_detail;
        $ChScaleHamilton->v_seven_title  = $request->v_seven_title;
        $ChScaleHamilton->v_seven_value  = $request->v_seven_value;
        $ChScaleHamilton->v_seven_detail  = $request->v_seven_detail;
        $ChScaleHamilton->v_eight_title  = $request->v_eight_title;
        $ChScaleHamilton->v_eight_value  = $request->v_eight_value;
        $ChScaleHamilton->v_eight_detail  = $request->v_eight_detail;
        $ChScaleHamilton->v_nine_title  = $request->v_nine_title;
        $ChScaleHamilton->v_nine_value   = $request->v_nine_value;
        $ChScaleHamilton->v_nine_detail  = $request->v_nine_detail;
        $ChScaleHamilton->v_ten_title  = $request->v_ten_title;
        $ChScaleHamilton->v_ten_value  = $request->v_ten_value;
        $ChScaleHamilton->v_ten_detail  = $request->v_ten_detail;
        $ChScaleHamilton->v_eleven_title  = $request->v_eleven_title;
        $ChScaleHamilton->v_eleven_value  = $request->v_eleven_value;
        $ChScaleHamilton->v_eleven_value  = $request->v_eleven_value;
        $ChScaleHamilton->v_twelve_title  = $request->v_twelve_title;
        $ChScaleHamilton->v_twelve_value  = $request->v_twelve_value;
        $ChScaleHamilton->v_twelve_detail  = $request->v_twelve_detail;
        $ChScaleHamilton->v_thirteen_title  = $request->v_thirteen_title;
        $ChScaleHamilton->v_thirteen_value  = $request->v_thirteen_value;
        $ChScaleHamilton->v_thirteen_detail  = $request->v_thirteen_detail;
        $ChScaleHamilton->v_fourteen_title  = $request->v_fourteen_title;
        $ChScaleHamilton->v_fourteen_value  = $request->v_fourteen_value;
        $ChScaleHamilton->v_fourteen_detail  = $request->v_fourteen_detail;
        $ChScaleHamilton->v_fifteen_title   = $request->v_fifteen_title;
        $ChScaleHamilton->v_fifteen_value  = $request->v_fifteen_value;
        $ChScaleHamilton->v_fifteen_detail  = $request->v_fifteen_detail;
        $ChScaleHamilton->v_sixteen_title  = $request->v_sixteen_title;
        $ChScaleHamilton->v_sixteen_value  = $request->v_sixteen_value;
        $ChScaleHamilton->v_sixteen_detail  = $request->v_sixteen_detail;
        $ChScaleHamilton->v_seventeen_value  = $request->v_seventeen_value;
        $ChScaleHamilton->v_seventeen_title  = $request->v_seventeen_title;
        $ChScaleHamilton->v_seventeen_detail  = $request->v_seventeen_detail;
        $ChScaleHamilton->total  = $request->total;
        $ChScaleHamilton->qualification  = $request->qualification;
        $ChScaleHamilton->type_record_id = $request->type_record_id;
        $ChScaleHamilton->ch_record_id = $request->ch_record_id;
        $ChScaleHamilton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Hamilton actualizada exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton]
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
            $ChScaleHamilton = ChScaleHamilton::find($id);

            $ChScaleHamilton->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Hamilton eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Hamilton en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
