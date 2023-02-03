<?php

namespace App\Http\Controllers\Management;

use App\Models\LogPharmacyLot;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LogPharmacyLotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LogPharmacyLot = LogPharmacyLot::with('billing_stock','pharmacy_lot_stock','billing_stock.product','billing_stock.product_supplies_com','billing_stock.product_supplies_com.factory','billing_stock.product.factory');

        if ($request->_sort) {
            $LogPharmacyLot->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LogPharmacyLot->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LogPharmacyLot = $LogPharmacyLot->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LogPharmacyLot = $LogPharmacyLot->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'logs lotes obtenidos exitosamente',
            'data' => ['log_pharmacy_lot' => $LogPharmacyLot]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $LogPharmacyLot = new LogPharmacyLot;
        $LogPharmacyLot->lot = $request->lot;
        $LogPharmacyLot->actual_amount = $request->actual_amount;
        $LogPharmacyLot->sample = $request->sample;
        $LogPharmacyLot->expiration_date = $request->expiration_date;
        $LogPharmacyLot->billing_stock_id = $request->billing_stock_id;
        $LogPharmacyLot->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $LogPharmacyLot->save();
        
        return response()->json([
            'status' => true,
            'message' => 'logs lotes asociada al paciente exitosamente',
            'data' => ['log_pharmacy_lot' => $LogPharmacyLot->toArray()]
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
        $LogPharmacyLot = LogPharmacyLot::where('id', $id)
        ->get()->toArray();
        
        return response()->json([
            'status' => true,
            'message' => 'logs lotes obtenida exitosamente',
            'data' => ['log_pharmacy_lot' => $LogPharmacyLot]
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
        $LogPharmacyLot = LogPharmacyLot::find($id);
        $LogPharmacyLot->lot = $request->lot;
        $LogPharmacyLot->actual_amount = $request->actual_amount;
        $LogPharmacyLot->sample = $request->sample;
        $LogPharmacyLot->expiration_date = $request->expiration_date;
        $LogPharmacyLot->billing_stock_id = $request->billing_stock_id;
        $LogPharmacyLot->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $LogPharmacyLot->save();

        return response()->json([
            'status' => true,
            'message' => 'logs lotes actualizada exitosamente',
            'data' => ['log_pharmacy_lot' => $LogPharmacyLot]
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
            $LogPharmacyLot = LogPharmacyLot::find($id);
            $LogPharmacyLot->delete();

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
