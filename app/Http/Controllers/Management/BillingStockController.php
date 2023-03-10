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
        $BillingStock = BillingStock::select('billing_stock.*')->with('billing', 'billing.company', 'product', 'product.factory', 'product.product_generic', 'product_supplies_com', 'product_supplies_com.factory', 'product_supplies_com.product_supplies')
            ->Leftjoin('product', 'billing_stock.product_id', 'product.id')
            ->Leftjoin('product_generic', 'product.product_generic_id', 'product_generic.id')
            ->Leftjoin('product_supplies_com', 'billing_stock.product_supplies_com_id', 'product_supplies_com.id')
            ->Leftjoin('product_supplies', 'product_supplies_com.product_supplies_id', 'product_supplies.id')
            ->groupBy('billing_stock.id');

        if ($request->_sort) {
            $BillingStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingStock->where(function ($query) use ($request) {
                $query->Where('product.name', 'like', '%' . $request->search . '%')
                    ->orWhere('product_generic.description', 'like', '%' . $request->search . '%')
                    ->orWhere('product_supplies_com.name', 'like', '%' . $request->search . '%')
                    ->orWhere('product_supplies.description', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->billing_id) {
            $BillingStock->where('billing_stock.billing_id', $request->billing_id)->where('amount_provitional', '!=', 0);
        }
        if ($request->product_id) {
            $BillingStock->where('billing_stock.product_id', $request->product_id);
        }
        if ($request->product_supplies_com_id) {
            $BillingStock->where('billing_stock.product_supplies_com_id', $request->product_supplies_com_id);
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

    public function store(Request $request): JsonResponse
    {
        if ($request->product_id) {
            $supplies = json_decode($request->product_id);
            foreach ($supplies as $element) {

                $BillingStock = new BillingStock;
                $BillingStock->amount = $element->amount;
                $BillingStock->amount_unit = $element->amount_unit;
                $BillingStock->amount_provitional = $element->amount;
                $BillingStock->iva = $element->iva;
                $BillingStock->billing_id = $request->billing_id;
                $BillingStock->product_id = $element->product_id;
                $BillingStock->product_supplies_com_id = null;
                $BillingStock->save();
            }
        }

        if ($request->product_supplies_com_id) {
            $supplies1 = json_decode($request->product_supplies_com_id);
            foreach ($supplies1 as $element1) {

                $BillingStock = new BillingStock;
                $BillingStock->amount = $element1->amount;
                $BillingStock->amount_unit = $element1->amount_unit;
                $BillingStock->amount_provitional = $element1->amount;
                $BillingStock->iva = $element1->iva;
                $BillingStock->billing_id = $request->billing_id;
                $BillingStock->product_id = null;
                $BillingStock->product_supplies_com_id = $element1->product_supplies_com_id;
                $BillingStock->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Insumos creados exitosamente',
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

        if ($request->product_id) {

            $supplies = json_decode($request->product_id);
            foreach ($supplies as $element) {
                $BillingStock = new BillingStock;
                $BillingStock->amount = $element->amount;
                $BillingStock->amount_unit = $element->amount_unit;
                $BillingStock->amount_provitional = $element->amount_provitional;
                $BillingStock->iva = $element->iva;
                $BillingStock->billing_id = $id;
                $BillingStock->product_id = $element->product_id;
                $BillingStock->product_supplies_com_id = null;
                $BillingStock->save();
            }
        }
        if ($request->product_supplies_com_id) {
            // $BillingStockDelete = BillingStock::where('billing_id', $id);
            // $BillingStockDelete->delete();
            $supplies1 = json_decode($request->product_supplies_com_id);
            foreach ($supplies1 as $element1) {
                $BillingStock = new BillingStock;
                $BillingStock->amount = $element1->amount;
                $BillingStock->amount_unit = $element1->amount_unit;
                $BillingStock->amount_provitional = $element1->amount_provitional;
                $BillingStock->iva = $element1->iva;
                $BillingStock->billing_id = $id;
                $BillingStock->product_supplies_com_id = $element1->product_supplies_com_id;
                $BillingStock->product_id = null;
                $BillingStock->save();
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Insumos actualizados exitosamente',
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
