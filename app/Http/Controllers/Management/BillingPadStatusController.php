<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadStatusRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class BillingPadStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadStatus = BillingPadStatus::select();

        if ($request->_sort) {
            $BillingPadStatus->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPadStatus->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadStatus = $BillingPadStatus->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPadStatus = $BillingPadStatus->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_status' => $BillingPadStatus]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillingPadStatusRequest $request): JsonResponse
    {
        $BillingPadStatus = new BillingPadStatus;
        $BillingPadStatus->procedure_id = $request->name;
        $BillingPadStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad_status' => $BillingPadStatus]
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
        $BillingPadStatus = BillingPadStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_status' => $BillingPadStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadStatusRequest $request, int $id): JsonResponse
    {

        $BillingPadStatus = BillingPadStatus::find($id);
        $BillingPadStatus->procedure_id = $request->name;
        $BillingPadStatus->save();


        return response()->json([
            'status' => true,
            'message' => 'facturas actualizadas exitosamente',
            'data' => ['billing_pad_status' => $BillingPadStatus]
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
            $BillingPadStatusDelete = BillingPadStatus::where('procedure_id', $id);
            $BillingPadStatusDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'facturas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'facturas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
