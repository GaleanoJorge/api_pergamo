<?php

namespace App\Http\Controllers\Management;

use App\Models\LogPharmaLote;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogPharmaLoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogPharmaLote = LogPharmaLote::with('billing_stock', 'pharmacy_lot_stock', 'billing_stock.product', 'billing_stock.product_supplies_com', 'billing_stock.product_supplies_com.factory', 'billing_stock.product.factory');

        if ($request->_sort) {
            $LogPharmaLote->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogPharmaLote->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogPharmaLote = $LogPharmaLote->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogPharmaLote = $LogPharmaLote->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'logs lotes obtenidos exitosamente',
            'data' => ['log_pharma_lote' => $LogPharmaLote]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $LogPharmaLote = new LogPharmaLote;
        $LogPharmaLote->actual_amount = $request->actual_amount;
        $LogPharmaLote->amount = $request->amount;
        $LogPharmaLote->sign = $request->sign;
        $LogPharmaLote->observation = $request->observation;
        $LogPharmaLote->pharmacy_adjustment_id = $request->pharmacy_adjustment_id;
        $LogPharmaLote->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $LogPharmaLote->save();
        
        return response()->json([
            'status' => true,
            'message' => 'logs lotes asociada al paciente exitosamente',
            'data' => ['log_pharma_lote' => $LogPharmaLote->toArray()]
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
        $LogPharmaLote = LogPharmaLote::where('id', $id)
            ->get()->toArray();
            
            return response()->json([
                'status' => true,
                'message' => 'logs lotes obtenida exitosamente',
                'data' => ['log_pharma_lote' => $LogPharmaLote]
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
        $LogPharmaLote = LogPharmaLote::find($id);
        $LogPharmaLote->actual_amount = $request->actual_amount;
        $LogPharmaLote->amount = $request->amount;
        $LogPharmaLote->sign = $request->sign;
        $LogPharmaLote->observation = $request->observation;
        $LogPharmaLote->pharmacy_adjustment_id = $request->pharmacy_adjustment_id;
        $LogPharmaLote->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $LogPharmaLote->save();
        
        return response()->json([
            'status' => true,
            'message' => 'logs lotes actualizada exitosamente',
            'data' => ['log_pharma_lote' => $LogPharmaLote]
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
            $LogPharmaLote = LogPharmaLote::find($id);
            $LogPharmaLote->delete();

            return response()->json([
                'status' => true,
                'message' => 'logs lotes eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'logs lotes en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
