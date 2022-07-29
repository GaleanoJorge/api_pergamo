<?php

namespace App\Http\Controllers\Management;

use App\Models\ChAuscultation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChAuscultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChAuscultation = ChAuscultation::select();

        if ($request->_sort) {
            $ChAuscultation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChAuscultation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChAuscultation = $ChAuscultation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChAuscultation = $ChAuscultation->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Auscultacion obtenidos exitosamente',
            'data' => ['ch_auscultation' => $ChAuscultation]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {
        $ChAuscultation = ChAuscultation::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Auscultacion obtenido exitosamente',
            'data' => ['ch_auscultation' => $ChAuscultation]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChAuscultation = new ChAuscultation;
        $ChAuscultation->auscultation = $request->auscultation;
        $ChAuscultation->observation = $request->observation;
        $ChAuscultation->type_record_id = $request->type_record_id;
        $ChAuscultation->ch_record_id = $request->ch_record_id;
        $ChAuscultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Auscultacion asociado al paciente exitosamente',
            'data' => ['ch_auscultation' => $ChAuscultation->toArray()]
        ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene un auscultacion principal asociado'
        //     ], 423);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChAuscultation = ChAuscultation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Auscultacion obtenido exitosamente',
            'data' => ['ch_auscultation' => $ChAuscultation]
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
        $ChAuscultation = ChAuscultation::find($id);
        $ChAuscultation->auscultation = $request->auscultation;
        $ChAuscultation->observation = $request->observation;
        $ChAuscultation->type_record_id = $request->type_record_id;
        $ChAuscultation->ch_record_id = $request->ch_record_id;
        $ChAuscultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Auscultacion actualizado exitosamente',
            'data' => ['ch_auscultation' => $ChAuscultation]
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
            $ChAuscultation = ChAuscultation::find($id);
            $ChAuscultation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Auscultacion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Auscultacion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
