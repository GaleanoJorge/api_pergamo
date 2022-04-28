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
        $ChScaleZarit = ChScaleZarit::select();

        if ($request->_sort) {
            $ChScaleZarit->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScaleZarit->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChScaleZarit = $ChScaleZarit->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScaleZarit = $ChScaleZarit->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
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
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_zarit' => $ChScaleZarit]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleZarit = new ChScaleZarit;
        $ChScaleZarit->q_one = $request ->q_one;              
        $ChScaleZarit->q_two = $request ->q_two;
        $ChScaleZarit->q_three = $request ->q_three;
        $ChScaleZarit->q_four = $request ->q_four;
        $ChScaleZarit->q_five = $request ->q_five;
        $ChScaleZarit->q_six = $request ->q_six;
        $ChScaleZarit->q_seven = $request ->q_seven;
        $ChScaleZarit->q_eight = $request ->q_eight;
        $ChScaleZarit->q_nine = $request ->q_nine;
        $ChScaleZarit->q_ten = $request ->q_ten;
        $ChScaleZarit->q_eleven = $request ->q_eleven;
        $ChScaleZarit->q_twelve = $request ->q_twelve;
        $ChScaleZarit->q_thirteen = $request ->q_thirteen;
        $ChScaleZarit->q_fourteen = $request ->q_fourteen;
        $ChScaleZarit->q_fifteen = $request ->q_fifteen;
        $ChScaleZarit->q_sixteen = $request ->q_sixteen;
        $ChScaleZarit->q_seventeen = $request ->q_seventeen;
        $ChScaleZarit->q_eighteen = $request ->q_eighteen;
        $ChScaleZarit->q_nineteen = $request ->q_nineteen;
        $ChScaleZarit->q_twenty = $request ->q_twenty;
        $ChScaleZarit->q_twenty_one = $request ->q_twenty_one;
        $ChScaleZarit->q_twenty_two = $request ->q_twenty_two;
        $ChScaleZarit->total = $request ->total;
        $ChScaleZarit->classification = $request ->classification;
        $ChScaleZarit->type_record_id = $request->type_record_id;
        $ChScaleZarit->ch_record_id = $request->ch_record_id;
        $ChScaleZarit->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
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
            'message' => 'Escalas obtenido exitosamente',
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
        $ChScaleZarit->q_one = $request ->q_one;              
        $ChScaleZarit->q_two = $request ->q_two;
        $ChScaleZarit->q_three = $request ->q_three;
        $ChScaleZarit->q_four = $request ->q_four;
        $ChScaleZarit->q_five = $request ->q_five;
        $ChScaleZarit->q_six = $request ->q_six;
        $ChScaleZarit->q_seven = $request ->q_seven;
        $ChScaleZarit->q_eight = $request ->q_eight;
        $ChScaleZarit->q_nine = $request ->q_nine;
        $ChScaleZarit->q_ten = $request ->q_ten;
        $ChScaleZarit->q_eleven = $request ->q_eleven;
        $ChScaleZarit->q_twelve = $request ->q_twelve;
        $ChScaleZarit->q_thirteen = $request ->q_thirteen;
        $ChScaleZarit->q_fourteen = $request ->q_fourteen;
        $ChScaleZarit->q_fifteen = $request ->q_fifteen;
        $ChScaleZarit->q_sixteen = $request ->q_sixteen;
        $ChScaleZarit->q_seventeen = $request ->q_seventeen;
        $ChScaleZarit->q_eighteen = $request ->q_eighteen;
        $ChScaleZarit->q_nineteen = $request ->q_nineteen;
        $ChScaleZarit->q_twenty = $request ->q_twenty;
        $ChScaleZarit->q_twenty_one = $request ->q_twenty_one;
        $ChScaleZarit->q_twenty_two = $request ->q_twenty_two;
        $ChScaleZarit->total = $request ->total;
        $ChScaleZarit->classification = $request ->classification;
        $ChScaleZarit->type_record_id = $request->type_record_id;
        $ChScaleZarit->ch_record_id = $request->ch_record_id;
        $ChScaleZarit->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
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
