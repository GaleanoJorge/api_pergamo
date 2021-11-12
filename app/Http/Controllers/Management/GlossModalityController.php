<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossModality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossModalityRequest;
use Illuminate\Database\QueryException;

class GlossModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $GlossModality = GlossModality::select();

        if ($request->_sort) {
            $GlossModality->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossModality->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $GlossModality = $GlossModality->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossModality = $GlossModality->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa obtenidos exitosamente',
            'data' => ['gloss_modality' => $GlossModality]
        ]);
    }

    public function store(GlossModalityRequest $request): JsonResponse
    {
        $GlossModality = new GlossModality;
        $GlossModality->name = $request->name;
        $GlossModality->status_id = $request->status_id;

        $GlossModality->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa creados exitosamente',
            'data' => ['gloss_modality' => $GlossModality->toArray()]
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
        $GlossModality = GlossModality::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa obtenidos exitosamente',
            'data' => ['gloss_modality' => $GlossModality]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossModalityRequest $request, int $id): JsonResponse
    {
        $GlossModality = GlossModality::find($id);
        $GlossModality->name = $request->name;
        $GlossModality->status_id = $request->status_id;

        $GlossModality->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa actualizados exitosamente',
            'data' => ['gloss_modality' => $GlossModality]
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
            $GlossModality = GlossModality::find($id);
            $GlossModality->delete();

            return response()->json([
                'status' => true,
                'message' => 'Modalidad de Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Modalidad de Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
