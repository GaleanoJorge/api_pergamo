<?php

namespace App\Http\Controllers\Management;

use App\Models\BillingStockRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BillingStockRequestRequest;
use Illuminate\Database\QueryException;

class BillingStockRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BillingStockRequest = BillingStockRequest::with('billing', 'product_generic', 'product_supplies');

        if ($request->_sort) {
            $BillingStockRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $BillingStockRequest->where('amount', 'like', '%' . $request->search . '%');
        }
        if ($request->billing_id) {
            $BillingStockRequest->where('billing_id', $request->billing_id);
        }
        if ($request->product_generic_id) {
            $BillingStockRequest->where('product_generic_id', $request->product_generic_id);
        }
        if ($request->product_supplies_id) {
            $BillingStockRequest->where('product_supplies_id', $request->product_supplies_id);
        }

        if ($request->query("pagination", true) == "false") {
            $BillingStockRequest = $BillingStockRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $BillingStockRequest = $BillingStockRequest->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos obtenidas exitosamente',
            'data' => ['billing_stock_request' => $BillingStockRequest]
        ]);
    }

    public function store(request $request): JsonResponse
    {
        if ($request->product_generic_id) {
            $supplies = json_decode($request->product_generic_id);
            foreach ($supplies as $element) {

                $BillingStockRequest = new BillingStockRequest;
                $BillingStockRequest->amount = $element->amount;
                $BillingStockRequest->billing_id = $request->billing_id;
                $BillingStockRequest->product_generic_id = $element->product_generic_id;
                $BillingStockRequest->product_supplies_id = null;
                $BillingStockRequest->save();
            }
        }

        if ($request->product_supplies_id) {
            $supplies1 = json_decode($request->product_supplies_id);
            foreach ($supplies1 as $element1) {

                $BillingStockRequest = new BillingStockRequest;
                $BillingStockRequest->product_supplies_id = $element1->product_supplies_id;
                $BillingStockRequest->amount = $element1->amount;
                $BillingStockRequest->billing_id = $request->billing_id;
                $BillingStockRequest->product_generic_id = null;
                $BillingStockRequest->save();
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Insumos creados exitosamente',
            'data' => ['billing_stock_request' => $BillingStockRequest->toArray()]
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
        $BillingStockRequest = BillingStockRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Medicamentos obtenidas exitosamente',
            'data' => ['billing_stock_request' => $BillingStockRequest]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BillingStockRequestRequest $request, int $id): JsonResponse
    {
        $BillingStockRequestDelete = BillingStockRequest::where('billing_id', $id);
        $BillingStockRequestDelete->delete();

        if ($request->product_generic_id) {

            $supplies = json_decode($request->product_generic_id);
            foreach ($supplies as $element) {
                $BillingStockRequest = new BillingStockRequest;
                $BillingStockRequest->amount = $element->amount;
                $BillingStockRequest->billing_id = $id;
                $BillingStockRequest->product_generic_id = $element->product_generic_id;
                $BillingStockRequest->product_supplies_id = null;

                $BillingStockRequest->save();
            }
            return response()->json([
                'status' => true,
                'message' => 'Medicamentos actualizadas exitosamente',
                'data' => ['billing_stock_request' => $BillingStockRequest]
            ]);
        }
        if ($request->product_supplies_id) {

            $BillingStockRequestDelete = BillingStockRequest::where('billing_id', $id);
            $BillingStockRequestDelete->delete();
            $supplies1 = json_decode($request->product_supplies_id);
            foreach ($supplies1 as $element1) {
                $BillingStockRequest = new BillingStockRequest;
                $BillingStockRequest->amount = $element1->amount;
                $BillingStockRequest->billing_id = $id;
                $BillingStockRequest->product_supplies_id = $element1->product_supplies_id;
                $BillingStockRequest->product_generic_id = null;

                $BillingStockRequest->save();
            }


            return response()->json([
                'status' => true,
                'message' => 'Insumos actualizados exitosamente',
                'data' => ['billing_stock_request' => $BillingStockRequest]
            ]);
        }
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
            $BillingStockRequestDelete = BillingStockRequest::where('billing_id', $id);
            $BillingStockRequestDelete->delete();

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
