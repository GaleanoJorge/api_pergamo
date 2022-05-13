<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingStockRequest;
use Illuminate\Database\QueryException;

class BillingStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingStock = BillingStock::with('billing', 'product', 'product.factory', 'product.product_generic')
            //->Join('product', 'billing_stock.product_id', 'product.id')
            //->Join('billing', 'billing_stock.billing_id', 'billing.id')
            ;

        if ($request->_sort) {
            $BillingStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingStock->where('amount', 'like', '%' . $request->search . '%');
        }
        if ($request->billing_id) {
            $BillingStock->where('billing_id', $request->billing_id);
        }
        if ($request->product_id) {
            $BillingStock->where('product_id', $request->product_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingStock = $BillingStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingStock = $BillingStock->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos obtenidas exitosamente',
            'data' => ['billing_stock' => $BillingStock]
        ]);
    }

    public function store(BillingStockRequest $request): JsonResponse
    {
        $supplies = json_decode($request->product_id);
        foreach ($supplies as $element) {

            $BillingStock = new BillingStock;
            $BillingStock->amount = $element->amount;
            $BillingStock->billing_id = $request->billing_id;
            $BillingStock->product_id = $element->product_id;
            $BillingStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos creadas exitosamente',
            'data' => ['billing_stock' => $BillingStock->toArray()]
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
        $BillingStock = BillingStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos obtenidas exitosamente',
            'data' => ['billing_stock' => $BillingStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingStockRequest $request, int $id): JsonResponse
    {
        $BillingStockDelete = BillingStock::where('billing_id', $id);
        $BillingStockDelete->delete();
        $supplies = json_decode($request->product_id);
        foreach ($supplies as $element) {
            $BillingStock = new BillingStock;
            $BillingStock->amount = $element->amount;
            $BillingStock->billing_id = $id;
            $BillingStock->product_id = $element->product_id;
            $BillingStock->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Medicamentos actualizadas exitosamente',
            'data' => ['billing_stock' => $BillingStock]
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
            $BillingStockDelete = BillingStock::where('billing_id', $id);
            $BillingStockDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Medicamentos eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Medicamentos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}