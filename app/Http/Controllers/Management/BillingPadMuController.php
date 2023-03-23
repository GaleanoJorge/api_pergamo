<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadMu;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadMuRequest;
use App\Models\AuthBillingPadMu;
use App\Models\BillingPadMuLog;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use stdClass;

class BillingPadMuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadMu = BillingPadMu::select();

        if ($request->_sort) {
            $BillingPadMu->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPadMu->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadMu = $BillingPadMu->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPadMu = $BillingPadMu->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_mu' => $BillingPadMu]
        ]);
    }

    public function store(BillingPadMuRequest $request): JsonResponse
    {
        $BillingPadMu = new BillingPadMu;
        $BillingPadMu->total_value = $request->total_value;
        $BillingPadMu->validation_date = $request->validation_date;
        $BillingPadMu->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadMu->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad_mu' => $BillingPadMu]
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
        $BillingPadMu = BillingPadMu::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_mu' => $BillingPadMu]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadMuRequest $request, int $id): JsonResponse
    {

        $BillingPadMu = BillingPadMu::find($id);
        $BillingPadMu->total_value = $request->total_value;
        $BillingPadMu->validation_date = $request->validation_date;
        $BillingPadMu->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadMu->save();

        return response()->json([
            'status' => true,
            'message' => 'factura actualizada exitosamente',
            'data' => ['billing_pad_mu' => $BillingPadMu]
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
            $BillingPadMuDelete = BillingPadMu::where('procedure_id', $id);
            $BillingPadMuDelete->delete();

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
