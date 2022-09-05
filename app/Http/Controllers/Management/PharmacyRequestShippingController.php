<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyRequestShipping;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyRequestShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyRequestShipping = PharmacyRequestShipping::select('pharmacy_request_shipping.*')
            ->with(
                'pharmacy_product_request',
                'pharmacy_product_request.own_pharmacy_stock',
                'pharmacy_product_request.request_pharmacy_stock',
                'pharmacy_product_request.request_pharmacy_stock.campus',
                'pharmacy_product_request.product_generic',
                'pharmacy_product_request.product_supplies',
                'pharmacy_lot_stock',
                'pharmacy_lot_stock.billing_stock',
                'pharmacy_lot_stock.billing_stock.product',
                'pharmacy_lot_stock.billing_stock.product_supplies_com',
                'user_responsible',
                //'user_request.users'
            )
            ->leftJoin('pharmacy_product_request', 'pharmacy_product_request.id', 'pharmacy_request_shipping.pharmacy_product_request_id');

        if ($request->user_id) {
            $PharmacyRequestShipping->where('pharmacy_product_request.user_request_id', $request->user_id);
        }


        if ($request->status) {
            $PharmacyRequestShipping->where('pharmacy_product_request.status', $request->status);
        }

        if ($request->_sort) {
            $PharmacyRequestShipping->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyRequestShipping->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->pharmacy_product_request_id) {
            $PharmacyRequestShipping->where('pharmacy_product_request_id', $request->pharmacy_product_request_id);
        }

        if ($request->product1 == "true") {
            //medicamento  product_generic_id
            $PharmacyRequestShipping->whereNotNull('pharmacy_product_request.product_generic_id')->whereNull('pharmacy_product_request.product_supplies_id')
            ->orderBy('created_at', 'desc')->first();
            $PharmacyRequestShipping = $PharmacyRequestShipping->get()->toArray();
        } else if ($request->product1 == "false") {
            // insumo product_supplies_id
            $PharmacyRequestShipping->whereNull('pharmacy_product_request.product_generic_id')->whereNotNull('pharmacy_product_request.product_supplies_id')->orderBy('created_at', 'desc')->first();
            $PharmacyRequestShipping = $PharmacyRequestShipping->get()->toArray();
        }

        return response()->json([
            'status' => true,
            'message' => 'Medicamento a enviar obtenidos exitosamente',
            'data' => ['pharmacy_request_shipping' => $PharmacyRequestShipping]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $PharmacyRequestShipping = new PharmacyRequestShipping;
        $PharmacyRequestShipping->amount = $request->amount;
        $PharmacyRequestShipping->amount_damaged = $request->amount_damaged;
        $PharmacyRequestShipping->amount_provition = $request->amount_provition;
        $PharmacyRequestShipping->amount_operation = $request->amount_provition;
        $PharmacyRequestShipping->user_responsible_id = $request->user_responsible_id;
        $PharmacyRequestShipping->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $PharmacyRequestShipping->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $PharmacyRequestShipping->save();
        
        return response()->json([
            'status' => true,
            'message' => 'Medicamento a enviar asociado al en farmacia exitosamente',
            'data' => ['pharmacy_request_shipping' => $PharmacyRequestShipping->toArray()]
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
        $PharmacyRequestShipping = PharmacyRequestShipping::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Medicamento a enviar obtenido exitosamente',
            'data' => ['pharmacy_request_shipping' => $PharmacyRequestShipping]
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
        $PharmacyRequestShipping = PharmacyRequestShipping::find($id);
        $PharmacyRequestShipping->amount = $request->amount;
        $PharmacyRequestShipping->amount_damaged = $request->amount_damaged;
        $PharmacyRequestShipping->amount_provition = $request->amount_provition;
        $PharmacyRequestShipping->amount_operation = $request->amount_operation;
        $PharmacyRequestShipping->user_responsible_id = $request->user_responsible_id;
        $PharmacyRequestShipping->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $PharmacyRequestShipping->pharmacy_lot_stock_id = $request->pharmacy_lot_stock_id;
        $PharmacyRequestShipping->save();

        return response()->json([
            'status' => true,
            'message' => 'Medicamento a enviar actualizado exitosamente',
            'data' => ['pharmacy_request_shipping' => $PharmacyRequestShipping]
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
            $PharmacyRequestShipping = PharmacyRequestShipping::find($id);
            $PharmacyRequestShipping->delete();

            return response()->json([
                'status' => true,
                'message' => 'Medicamento a enviar eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Medicamento a enviar en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
