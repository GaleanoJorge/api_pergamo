<?php

namespace App\Http\Controllers\Management;

use App\Models\PurposeService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PurposeServiceRequest;
use Illuminate\Database\QueryException;

class PurposeServiceController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $PurposeService = PurposeService::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $PurposeService = PurposeService::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $PurposeService = PurposeService::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PurposeService = PurposeService::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Finalidad de los servicios según codificación RIPS obtenidas exitosamente',
            'data' => ['purpose_service' => $PurposeService]
        ]);
    }
    

    public function store(PurposeServiceRequest $request): JsonResponse
    {
        $PurposeService = new PurposeService;
        $PurposeService->name = $request->name;
        
      
        $PurposeService->save();

        return response()->json([
            'status' => true,
            'message' => 'Finalidad de los servicios según codificación RIPS creado exitosamente',
            'data' => ['purpose_service' => $PurposeService->toArray()]
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
        $PurposeService = PurposeService::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Finalidad de los servicios según codificación RIPS obtenido exitosamente',
            'data' => ['purpose_service' => $PurposeService]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PurposeServiceRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PurposeServiceRequest $request, int $id): JsonResponse
    {
        $PurposeService = PurposeService::find($id);
        $PurposeService->name = $request->name;
        
    
        $PurposeService->save();

        return response()->json([
            'status' => true,
            'message' => 'Finalidad de los servicios según codificación RIPS actualizado exitosamente',
            'data' => ['purpose_service' => $PurposeService]
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
            $PurposeService = PurposeService::find($id);
            $PurposeService->delete();

            return response()->json([
                'status' => true,
                'message' => 'OFinalidad de los servicios según codificación RIPS eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Finalidad de los servicios según codificación RIPS esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
