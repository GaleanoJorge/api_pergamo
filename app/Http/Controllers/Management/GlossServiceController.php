<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossServiceRequest;
use Illuminate\Database\QueryException;

class GlossServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $GlossService = GlossService::select();

        if ($request->_sort) {
            $GlossService->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossService->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $GlossService = $GlossService->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossService = $GlossService->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa obtenidos exitosamente',
            'data' => ['gloss_service' => $GlossService]
        ]);
    }

    public function store(GlossServiceRequest $request): JsonResponse
    {
        $GlossService = new GlossService;
        $GlossService->name = $request->name;
        $GlossService->status_id = $request->status_id;
        $GlossService->gloss_ambit_id = $request->gloss_ambit_id;

        $GlossService->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa creados exitosamente',
            'data' => ['gloss_service' => $GlossService->toArray()]
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
        $GlossService = GlossService::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa obtenidos exitosamente',
            'data' => ['gloss_service' => $GlossService]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossServiceRequest $request, int $id): JsonResponse
    {
        $GlossService = GlossService::find($id);
        $GlossService->name = $request->name;
        $GlossService->status_id = $request->status_id;
        $GlossService->gloss_ambit_id = $request->gloss_ambit_id;

        $GlossService->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa actualizados exitosamente',
            'data' => ['gloss_service' => $GlossService]
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
            $GlossService = GlossService::find($id);
            $GlossService->delete();

            return response()->json([
                'status' => true,
                'message' => 'Servicio de Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Servicio de Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
