<?php

namespace App\Http\Controllers\Management;

use App\Models\Billing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\BillingStock;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Billing = Billing::select(
            'billing.*',
            DB::raw(
                "SUM(billing_stock.amount_provitional)"
            ),
        )->with('company', 'pharmacy_stock')->leftJoin('billing_stock', 'billing_stock.billing_id', 'billing.id')->groupBy('billing.id');

        if ($request->_sort) {
            if ($request->_sort != "actions" && $request->_sort != "company" && $request->_sort != "pharmacy_stock") {

                $Billing->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->search) {
            $Billing->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->type_billing_evidence_id) {
            $Billing->where('type_billing_evidence_id', $request->type_billing_evidence_id)->where('amount_provitional', '!=', 0);
        }

        if ($request->query("pagination", true) == "false") {
            $Billing = $Billing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Billing = $Billing->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Registro de factura obtenidos exitosamente',
            'data' => ['billing' => $Billing]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id): JsonResponse
    {
        $Billing = Billing::where('admissions_id', $id);

        if ($request->_sort) {
            $Billing->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Billing->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Billing = $Billing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Billing = $Billing->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro de factura obtenidos exitosamente',
            'data' => ['billing' => $Billing]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Billing = new Billing;

        $Billing->company_id = $request->company_id;
        $Billing->pharmacy_stock_id = $request->pharmacy_stock_id;
        $Billing->type_billing_evidence_id = $request->type_billing_evidence_id;
        $Billing->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro de factura asociado al de factura exitosamente',
            'data' => ['billing' => $Billing->toArray()]
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
        $Billing = Billing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro de factura obtenido exitosamente',
            'data' => ['billing' => $Billing]
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
        $Billing = Billing::find($id);


        $Billing->company_id = $request->company_id;
        $Billing->pharmacy_stock_id = $request->pharmacy_stock_id;
        $Billing->type_billing_evidence_id = $request->type_billing_evidence_id;
        $Billing->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro de factura actualizado exitosamente',
            'data' => ['billing' => $Billing]
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
            $BillingStockDeleteArray = BillingStock::where('billing_id', $id)->get()->toArray();
            foreach ($BillingStockDeleteArray as $element) {
                $BillingStockDelete = BillingStock::where('id', $element['id']);
                $BillingStockDelete->delete();
            }

            $Billing = Billing::find($id);
            $Billing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Orden de compra eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Orden de compra en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
