<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyRequestStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PharmacyRequestStockRequest;
use Illuminate\Database\QueryException;

class PharmacyRequestStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyRequestStock = PharmacyRequestStock::with('pharmacy_request', 'product');
            //->Join('product', 'pharmacy_request_stock.product_id', 'product.id');

        if ($request->_sort) {
            $PharmacyRequestStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyRequestStock->where('amount', 'like', '%' . $request->search . '%');
   }
        if ($request->pharmacy_request_id) {
            $PharmacyRequestStock->where('pharmacy_request_id', $request->pharmacy_request_id);
        }
        if ($request->product_id) {
            $PharmacyRequestStock->where('product_id', $request->product_id);
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyRequestStock = $PharmacyRequestStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $PharmacyRequestStock = $PharmacyRequestStock->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Stock Medicamentos obtenidas exitosamente',
            'data' => ['pharmacy_request_stock' => $PharmacyRequestStock]
        ]);
    }

    public function store(PharmacyRequestStockRequest $request): JsonResponse
    {
        $supplies = json_decode($request->product_id);
        foreach ($supplies as $element) {

            $PharmacyRequestStock = new PharmacyRequestStock;
            $PharmacyRequestStock->amount = $element->amount;
            $PharmacyRequestStock->pharmacy_request_id = $request->pharmacy_request_id;
            $PharmacyRequestStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Stock Medicamentos creadas exitosamente',
            'data' => ['pharmacy_request_stock' => $PharmacyRequestStock->toArray()]
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
        $PharmacyRequestStock = PharmacyRequestStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Stock Medicamentos obtenidas exitosamente',
            'data' => ['pharmacy_request_stock' => $PharmacyRequestStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PharmacyRequestStockRequest $request, int $id): JsonResponse
    {
        $PharmacyRequestStockDelete = PharmacyRequestStock::where('pharmacy_request_id', $id);
        $PharmacyRequestStockDelete->delete();
        $supplies = json_decode($request->product_id);
        foreach ($supplies as $element) {
            $PharmacyRequestStock = new PharmacyRequestStock;
            $PharmacyRequestStock->amount = $element->amount;
            $PharmacyRequestStock->pharmacy_request_id = $element->pharmacy_request_id;
            $PharmacyRequestStock->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Stock Medicamentos actualizadas exitosamente',
            'data' => ['pharmacy_request_stock' => $PharmacyRequestStock]
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
            $PharmacyRequestStockDelete = PharmacyRequestStock::where('pharmacy_request_id', $id);
            $PharmacyRequestStockDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Stock Medicamentos eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Stock Medicamentos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}