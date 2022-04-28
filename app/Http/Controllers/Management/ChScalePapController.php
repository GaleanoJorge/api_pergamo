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
        $ChScalePap = ChScalePap::select();

        if ($request->_sort) {
            $ChScalePap->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScalePap->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChScalePap = $ChScalePap->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScalePap = $ChScalePap->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
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
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_pap' => $ChScalePap]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScalePap = new ChScalePap;
        $ChScalePap->variable_one = $request->variable_one;
        $ChScalePap->variable_two = $request->variable_two;
        $ChScalePap->variable_three = $request->variable_three;
        $ChScalePap->variable_four = $request->variable_four;
        $ChScalePap->variable_five = $request->variable_five;
        $ChScalePap->variable_six = $request->variable_six;
        $ChScalePap->total = $request->total;
        $ChScalePap->classification = $request->classification;
        $ChScalePap->type_record_id = $request->type_record_id;
        $ChScalePap->ch_record_id = $request->ch_record_id;
        $ChScalePap->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
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
            'message' => 'Escalas obtenido exitosamente',
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
        $ChScalePap->variable_one = $request->variable_one;
        $ChScalePap->variable_two = $request->variable_two;
        $ChScalePap->variable_three = $request->variable_three;
        $ChScalePap->variable_four = $request->variable_four;
        $ChScalePap->variable_five = $request->variable_five;
        $ChScalePap->variable_six = $request->variable_six;
        $ChScalePap->total = $request->total;
        $ChScalePap->classification = $request->classification;
        $ChScalePap->type_record_id = $request->type_record_id;
        $ChScalePap->ch_record_id = $request->ch_record_id;
        $ChScalePap->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
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
