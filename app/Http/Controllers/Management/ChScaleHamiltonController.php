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
        $ChScaleHamilton = ChScaleHamilton::select();

        if ($request->_sort) {
            $ChScaleHamilton->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScaleHamilton->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChScaleHamilton = $ChScaleHamilton->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScaleHamilton = $ChScaleHamilton->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
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
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_hamilton' => $ChScaleHamilton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleHamilton = new ChScaleHamilton;
        $ChScaleHamilton->variable_one  = $request-> variable_one ;
        $ChScaleHamilton->variable_two  = $request-> variable_two;
        $ChScaleHamilton->variable_three  = $request-> variable_three;
        $ChScaleHamilton->variable_four  = $request-> variable_four;
        $ChScaleHamilton->variable_five  = $request-> variable_five;
        $ChScaleHamilton->variable_six  = $request-> variable_six;
        $ChScaleHamilton->variable_seven  = $request-> variable_seven;
        $ChScaleHamilton->variable_eigth  = $request->variable_seven;
        $ChScaleHamilton->variable_nine   = $request->variable_nine;
        $ChScaleHamilton->variable_ten  = $request-> variable_ten;
        $ChScaleHamilton->variable_eleven  = $request-> variable_eleven;
        $ChScaleHamilton->variable_twelve  = $request-> variable_twelve;
        $ChScaleHamilton->variable_thirteen  = $request-> variable_thirteen;
        $ChScaleHamilton->variable_fourteen  = $request->variable_fourteen;
        $ChScaleHamilton->variable_fifteen  = $request-> variable_fifteen;
        $ChScaleHamilton->variable_sixteen  = $request-> variable_sixteen;
        $ChScaleHamilton->variable_seventeen  = $request-> variable_seventeen;
        $ChScaleHamilton->variable_eighteen  = $request-> variable_eighteen;
        $ChScaleHamilton->total  = $request-> total;
        $ChScaleHamilton->qualification  = $request->qualification;
        $ChScaleHamilton->type_record_id = $request->type_record_id;
        $ChScaleHamilton->ch_record_id = $request->ch_record_id;
        $ChScaleHamilton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
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
            'message' => 'Escalas obtenido exitosamente',
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
        $ChScaleHamilton->variable_one  = $request-> variable_one ;
        $ChScaleHamilton->variable_two  = $request-> variable_two;
        $ChScaleHamilton->variable_three  = $request-> variable_three;
        $ChScaleHamilton->variable_four  = $request-> variable_four;
        $ChScaleHamilton->variable_five  = $request-> variable_five;
        $ChScaleHamilton->variable_six  = $request-> variable_six;
        $ChScaleHamilton->variable_seven  = $request-> variable_seven;
        $ChScaleHamilton->variable_eigth  = $request->variable_seven;
        $ChScaleHamilton->variable_nine   = $request->variable_nine;
        $ChScaleHamilton->variable_ten  = $request-> variable_ten;
        $ChScaleHamilton->variable_eleven  = $request-> variable_eleven;
        $ChScaleHamilton->variable_twelve  = $request-> variable_twelve;
        $ChScaleHamilton->variable_thirteen  = $request-> variable_thirteen;
        $ChScaleHamilton->variable_fourteen  = $request->variable_fourteen;
        $ChScaleHamilton->variable_fifteen  = $request-> variable_fifteen;
        $ChScaleHamilton->variable_sixteen  = $request-> variable_sixteen;
        $ChScaleHamilton->variable_seventeen  = $request-> variable_seventeen;
        $ChScaleHamilton->variable_eighteen  = $request-> variable_eighteen;
        $ChScaleHamilton->total  = $request-> total;
        $ChScaleHamilton->qualification  = $request->qualification;
        $ChScaleHamilton->type_record_id = $request->type_record_id;
        $ChScaleHamilton->ch_record_id = $request->ch_record_id;
        $ChScaleHamilton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
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
