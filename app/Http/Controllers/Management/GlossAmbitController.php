<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossAmbit;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossAmbitRequest;
use Illuminate\Database\QueryException;

class GlossAmbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $GlossAmbit = GlossAmbit::with('status', 'gloss_modality');

        if ($request->_sort) {
            $GlossAmbit->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossAmbit->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_modality_id) {
            $GlossModality->where('gloss_modality_id', $request->gloss_modality_id);
        }
        if ($request->status_id) {
            $GlossModality->where('status_id', $request->status_id);
        }


        if ($request->query("pagination", true) == "false") {
            $GlossAmbit = $GlossAmbit->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossAmbit = $GlossAmbit->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Ambito de Glosa obtenidos exitosamente',
            'data' => ['gloss_ambit' => $GlossAmbit]
        ]);
    }

    public function store(GlossAmbitRequest $request): JsonResponse
    {
        $GlossAmbit = new GlossAmbit;
        $GlossAmbit->name = $request->name;
        $GlossAmbit->status_id = $request->status_id;
        $GlossAmbit->gloss_modality_id = $request->gloss_modality_id;

        $GlossAmbit->save();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de Glosa creados exitosamente',
            'data' => ['gloss_ambit' => $GlossAmbit->toArray()]
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
        $GlossAmbit = GlossAmbit::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de Glosa obtenidos exitosamente',
            'data' => ['gloss_ambit' => $GlossAmbit]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossAmbitRequest $request, int $id): JsonResponse
    {
        $GlossAmbit = GlossAmbit::find($id);
        $GlossAmbit->name = $request->name;
        $GlossAmbit->status_id = $request->status_id;
        $GlossAmbit->gloss_modality_id = $request->gloss_modality_id;

        $GlossAmbit->save();

        return response()->json([
            'status' => true,
            'message' => 'Ambito de Glosa actualizados exitosamente',
            'data' => ['gloss_ambit' => $GlossAmbit]
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
            $GlossAmbit = GlossAmbit::find($id);
            $GlossAmbit->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ambito de Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ambito de Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
