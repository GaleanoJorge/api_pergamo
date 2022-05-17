<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleJhDowton;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChScaleJhDowtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleJhDowton = ChScaleJhDowton::select();

        if ($request->_sort) {
            $ChScaleJhDowton->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChScaleJhDowton->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChScaleJhDowton = $ChScaleJhDowton->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChScaleJhDowton = $ChScaleJhDowton->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_jh_dowton' => $ChScaleJhDowton]
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

        $ChScaleJhDowton = ChScaleJhDowton::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_jh_dowton' => $ChScaleJhDowton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleJhDowton = new ChScaleJhDowton;
        $ChScaleJhDowton->falls = $request->falls;
        $ChScaleJhDowton->medication = $request->medication;
        $ChScaleJhDowton->deficiency = $request->deficiency;
        $ChScaleJhDowton->mental = $request->mental;
        $ChScaleJhDowton->wandering = $request->wandering;
        $ChScaleJhDowton->total = $request->total;
        $ChScaleJhDowton->risk = $request->risk;
        $ChScaleJhDowton->type_record_id = $request->type_record_id;
        $ChScaleJhDowton->ch_record_id = $request->ch_record_id;
        $ChScaleJhDowton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
            'data' => ['ch_scale_jh_dowton' => $ChScaleJhDowton->toArray()]
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
        $ChScaleJhDowton = ChScaleJhDowton::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenido exitosamente',
            'data' => ['ch_scale_jh_dowton' => $ChScaleJhDowton]
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
        $ChScaleJhDowton = ChScaleJhDowton::find($id);
        $ChScaleJhDowton->falls = $request->falls;
        $ChScaleJhDowton->medication = $request->medication;
        $ChScaleJhDowton->deficiency = $request->deficiency;
        $ChScaleJhDowton->mental = $request->mental;
        $ChScaleJhDowton->wandering = $request->wandering;
        $ChScaleJhDowton->total = $request->total;
        $ChScaleJhDowton->risk = $request->risk;
        $ChScaleJhDowton->type_record_id = $request->type_record_id;
        $ChScaleJhDowton->ch_record_id = $request->ch_record_id;
        $ChScaleJhDowton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
            'data' => ['ch_scale_jh_dowton' => $ChScaleJhDowton]
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
            $ChScaleJhDowton = ChScaleJhDowton::find($id);

            $ChScaleJhDowton->delete();

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
