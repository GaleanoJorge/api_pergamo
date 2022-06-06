<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedRequest = FixedRequest::with('fixed_type', 'request_user', 'fixed_accessories', 'patient', 'fixed_assets');

        if ($request->_sort) {
            $FixedRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedRequest->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedRequest = $FixedRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedRequest = $FixedRequest->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Solicitudes act.fijos obtenidos exitosamente',
            'data' => ['fixed_request' => $FixedRequest]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedRequest = new FixedRequest;
        $FixedRequest->fixed_type_id = $request->fixed_type_id;
        $FixedRequest->fixed_assets_id = $request->fixed_assets_id;
        $FixedRequest->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedRequest->request_user_id = $request->request_user_id;
        $FixedRequest->patient_id = $request->patient_id;
        $FixedRequest->request_amount = $request->request_amount;
        $FixedRequest->status = $request->status;
        $FixedRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Solicitudes act. fijos asociado al paciente exitosamente',
            'data' => ['fixed_request' => $FixedRequest->toArray()]
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
        $FixedRequest = FixedRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Solicitudes act. fijos obtenido exitosamente',
            'data' => ['fixed_request' => $FixedRequest]
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
        $FixedRequest = FixedRequest::find($id);
        $FixedRequest->fixed_type_id = $request->fixed_type_id;
        $FixedRequest->fixed_assets_id = $request->fixed_assets_id;
        $FixedRequest->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedRequest->request_user_id = $request->request_user_id;
        $FixedRequest->patient_id = $request->patient_id;
        $FixedRequest->request_amount = $request->request_amount;
        $FixedRequest->status = $request->status;
        $FixedRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Solicitudes act. fijos actualizado exitosamente',
            'data' => ['fixed_request' => $FixedRequest]
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
            $FixedRequest = FixedRequest::find($id);
            $FixedRequest->delete();

            return response()->json([
                'status' => true,
                'message' => 'Solicitudes act. fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Solicitudes act. fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
