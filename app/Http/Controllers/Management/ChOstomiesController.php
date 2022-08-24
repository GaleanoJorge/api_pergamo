<?php

namespace App\Http\Controllers\Management;

use App\Models\ChOstomies;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChOstomiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChOstomies = ChOstomies::with('ostomy', 'type_record', 'ch_record');

        if ($request->_sort) {
            $ChOstomies->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChOstomies->where('ostomy_id', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChOstomies = $ChOstomies->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChOstomies = $ChOstomies->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Ostomías  obtenidos exitosamente',
            'data' => ['ch_ostomies' => $ChOstomies]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChOstomies = ChOstomies::with('ostomy', 'type_record', 'ch_record')
            ->where('ch_record_id', $id)->where('type_record_id', $type_record_id);

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChOstomies = ChOstomies::with('ostomy', 'type_record', 'ch_record')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_ostomies.ch_record_id') //
                    // ->get()->toArray() // tener cuidado con esta linea si hay dos get()->toArray()
                ;
            }
        }

        if ($request->query("pagination", true) == "false") {
            $ChOstomies = $ChOstomies->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChOstomies = $ChOstomies->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Ostomías Asociada  al paciente exitosamente',
            'data' => ['ch_ostomies' => $ChOstomies]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChOstomies = new ChOstomies;
        $ChOstomies->ostomy_id = $request->ostomy_id;
        $ChOstomies->observation = $request->observation;
        $ChOstomies->type_record_id = $request->type_record_id;
        $ChOstomies->ch_record_id = $request->ch_record_id;

        $ChOstomies->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomías Asociada  al paciente exitosamente',
            'data' => ['ch_ostomies' => $ChOstomies->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChOstomies = ChOstomies::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ostomías obtenido exitosamente',
            'data' => ['ch_ostomies' => $ChOstomies]
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
        $ChOstomies = ChOstomies::find($id);
        $ChOstomies->ostomy_id = $request->ostomy_id;
        $ChOstomies->observation = $request->observation;
        $ChOstomies->type_record_id = $request->type_record_id;
        $ChOstomies->ch_record_id = $request->ch_record_id;

        $ChOstomies->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomías actualizado exitosamente',
            'data' => ['ch_ostomies' => $ChOstomies]
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
            $ChOstomies = ChOstomies::find($id);
            $ChOstomies->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ostomías  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ostomías  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
