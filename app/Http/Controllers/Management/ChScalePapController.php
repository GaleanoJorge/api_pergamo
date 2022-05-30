<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScalePap;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScalePapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScalePap = ChScalePap::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {
            $ChScalePap = ChScalePap::select();

            if ($request->_sort) {
                $ChScalePap->orderBy($request->_sort, $request->_order);
            }

            if ($request->search) {
                $ChScalePap->where('name', 'like', '%' . $request->search . '%');
            }
            if ($request->ch_record_id) {
                $ChScalePap->where('ch_record_id', $request->ch_record_id);
            }

            if ($request->latest  && isset($request->latest)) {
            }

            if ($request->query("pagination", true) == "false") {
                $ChScalePap = $ChScalePap->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $ChScalePap = $ChScalePap->paginate($per_page, '*', 'page', $page);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Escala PAP obtenida exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap]
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

        $ChScalePap = ChScalePap::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escala PAP obtenida exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePap = new ChScalePap;
        $ChScalePap->v_one_title = $request->v_one_title;
        $ChScalePap->v_one_value = $request->v_one_value;
        $ChScalePap->v_one_detail = $request->v_one_detail;
        $ChScalePap->v_two_title = $request->v_two_title;
        $ChScalePap->v_two_value = $request->v_two_value;
        $ChScalePap->v_two_detail = $request->v_two_detail;
        $ChScalePap->v_three_title = $request->v_three_title;
        $ChScalePap->v_three_value = $request->v_three_value;
        $ChScalePap->v_three_detail = $request->v_three_detail;
        $ChScalePap->v_four_title = $request->v_four_title;
        $ChScalePap->v_four_value = $request->v_four_value;
        $ChScalePap->v_four_detail = $request->v_four_detail;
        $ChScalePap->v_five_title = $request->v_five_title;
        $ChScalePap->v_five_value = $request->v_five_value;
        $ChScalePap->v_five_detail = $request->v_five_detail;
        $ChScalePap->v_six_title = $request->v_six_title;
        $ChScalePap->v_six_value = $request->v_six_value;
        $ChScalePap->v_six_detail = $request->v_six_detail;
        $ChScalePap->total = $request->total;
        $ChScalePap->classification = $request->classification;
        $ChScalePap->type_record_id = $request->type_record_id;
        $ChScalePap->ch_record_id = $request->ch_record_id;
        $ChScalePap->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala PAP asociado al paciente exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap->toArray()]
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
        $ChScalePap = ChScalePap::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala PAP obtenida exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap]
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
        $ChScalePap = ChScalePap::find($id);
        $ChScalePap->v_one_title = $request->v_one_title;
        $ChScalePap->v_one_value = $request->v_one_value;
        $ChScalePap->v_one_detail = $request->v_one_detail;
        $ChScalePap->v_two_title = $request->v_two_title;
        $ChScalePap->v_two_value = $request->v_two_value;
        $ChScalePap->v_two_detail = $request->v_two_detail;
        $ChScalePap->v_three_title = $request->v_three_title;
        $ChScalePap->v_three_value = $request->v_three_value;
        $ChScalePap->v_three_detail = $request->v_three_detail;
        $ChScalePap->v_four_title = $request->v_four_title;
        $ChScalePap->v_four_value = $request->v_four_value;
        $ChScalePap->v_four_detail = $request->v_four_detail;
        $ChScalePap->v_five_title = $request->v_five_title;
        $ChScalePap->v_five_value = $request->v_five_value;
        $ChScalePap->v_five_detail = $request->v_five_detail;
        $ChScalePap->v_six_title = $request->v_six_title;
        $ChScalePap->v_six_value = $request->v_six_value;
        $ChScalePap->total = $request->total;
        $ChScalePap->classification = $request->classification;
        $ChScalePap->type_record_id = $request->type_record_id;
        $ChScalePap->ch_record_id = $request->ch_record_id;
        $ChScalePap->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala PAP actualizada exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap]
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
            $ChScalePap = ChScalePap::find($id);

            $ChScalePap->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala PAP eliminadoa exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas PAP en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
