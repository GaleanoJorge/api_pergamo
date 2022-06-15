<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingPadPgp;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingPadPgpRequest;
use App\Models\AuthBillingPadPgp;
use App\Models\BillingPadPgpLog;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use stdClass;

class BillingPadPgpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingPadPgp = BillingPadPgp::select()
            ->with('contract');

        if ($request->_sort) {
            $BillingPadPgp->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $BillingPadPgp->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->contract_id) {
            $BillingPadPgp->where('contract_id', $request->contract_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingPadPgp = $BillingPadPgp->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingPadPgp = $BillingPadPgp->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_pgp' => $BillingPadPgp]
        ]);
    }

    public function store(BillingPadPgpRequest $request): JsonResponse
    {
        $BillingPadPgp = new BillingPadPgp;
        $BillingPadPgp->total_value = $request->total_value;
        $BillingPadPgp->validation_date = $request->validation_date;
        $BillingPadPgp->contract_id = $request->contract_id;
        $BillingPadPgp->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadPgp->save();

        return response()->json([
            'status' => true,
            'message' => 'facturas creadas exitosamente',
            'data' => ['billing_pad_pgp' => $BillingPadPgp]
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
        $BillingPadPgp = BillingPadPgp::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'facturas obtenidas exitosamente',
            'data' => ['billing_pad_pgp' => $BillingPadPgp]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingPadPgpRequest $request, int $id): JsonResponse
    {

        $BillingPadPgp = BillingPadPgp::find($id);
        $BillingPadPgp->total_value = $request->total_value;
        $BillingPadPgp->validation_date = $request->validation_date;
        $BillingPadPgp->contract_id = $request->contract_id;
        $BillingPadPgp->billing_pad_status_id = $request->billing_pad_status_id;
        $BillingPadPgp->save();

        return response()->json([
            'status' => true,
            'message' => 'factura actualizada exitosamente',
            'data' => ['billing_pad_pgp' => $BillingPadPgp]
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
            $BillingPadPgpDelete = BillingPadPgp::where('procedure_id', $id);
            $BillingPadPgpDelete->delete();

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
