<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAp;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChApController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAp = ChAp::select();

        if ($request->_sort) {
            $ChAp->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChAp->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChAp = $ChAp->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChAp = $ChAp->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Ap obtenidos exitosamente',
            'data' => ['ch_ap' => $ChAp]
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


        $ChAp = ChAp::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();
        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChAp = ChAp::select('ch_ap.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_ap.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_ap.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Ap asociado al paciente exitosamente',
            'data' => ['ch_ap' => $ChAp]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChAp = new ChAp;
        $ChAp->analisys = $request->analisys;
        $ChAp->plan = $request->plan;
        $ChAp->type_record_id = $request->type_record_id;
        $ChAp->ch_record_id = $request->ch_record_id;
        $ChAp->save();

        return response()->json([
            'status' => true,
            'message' => 'Ap asociado al paciente exitosamente',
            'data' => ['ch_ap' => $ChAp->toArray()]
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
        $ChAp = ChAp::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ap obtenido exitosamente',
            'data' => ['ch_ap' => $ChAp]
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
        $ChAp = ChAp::find($id);
        $ChAp->analisys = $request->analisys;
        $ChAp->plan = $request->plan;
        $ChAp->type_record_id = $request->type_record_id;
        $ChAp->ch_record_id = $request->ch_record_id;
        $ChAp->save();

        return response()->json([
            'status' => true,
            'message' => 'Ap actualizado exitosamente',
            'data' => ['ch_ap' => $ChAp]
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
            $ChAp = ChAp::find($id);
            $ChAp->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ap eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ap en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
