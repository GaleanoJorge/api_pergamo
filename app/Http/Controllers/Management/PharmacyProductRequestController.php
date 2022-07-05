<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\PharmacyLot;
use App\Models\PharmacyLotStock;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyRequestShipping;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PharmacyProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyProductRequest = PharmacyProductRequest::with('product_generic', 'product_supplies', 'own_pharmacy_stock', 'request_pharmacy_stock', 'request_pharmacy_stock.campus', 'own_pharmacy_stock.campus','user_request')
            ->select('pharmacy_product_request.*', DB::raw('SUM(pharmacy_request_shipping.amount_provition) AS cantidad_enviada'))
            ->leftJoin('pharmacy_request_shipping', 'pharmacy_request_shipping.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->groupBy('pharmacy_product_request.id');

        if ($request->_sort) {
            $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->pharmacy_stock_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.pharmacy_stock_id', $request->pharmacy_stock_id);
        }
        if ($request->product_generic_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.product_generic_id', $request->product_generic_id);
        }
        if ($request->product_supplies_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.product_supplies_id', $request->product_supplies_id);
        }
        
        if ($request->status) {
            $PharmacyProductRequest->where('pharmacy_product_request.status', $request->status);
        }

        if ($request->search) {
            $PharmacyProductRequest->where('pharmacy_product_request.status', 'like', '%' . $request->search . '%');
        }

        if ($request->product == "true") {
            //medicamento  product_generic_id
            $PharmacyProductRequest->whereNotNull('product_generic_id')->whereNull('product_supplies_id');
        } else if ($request->product == "false") {
            // insumo product_supplies_id
            $PharmacyProductRequest->whereNull('product_generic_id')->whereNotNull('product_supplies_id');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyProductRequest = $PharmacyProductRequest->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenidos exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyLotId(Request $request, int $id): JsonResponse
    {
        $parmacy = PharmacyProductRequest::select('pharmacy_product_request.*')
            ->leftJoin('pharmacy_product_request', 'pharmacy_product_request.id', '=', 'pharmacy_stock.id')
            ->where('pharmacy_stock.id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenidas exitosamente',
            'data' => ['pharmacy_product_request' => $parmacy]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $PharmacyProductRequest = new PharmacyProductRequest;
        $PharmacyProductRequest->request_amount = $request->request_amount;
        $PharmacyProductRequest->status = $request->status;
        $PharmacyProductRequest->observation = $request->observation;
        $PharmacyProductRequest->user_request_id = $request->user_request_id;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado asociado al de factura exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest->toArray()]
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
        $PharmacyProductRequest = PharmacyProductRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenido exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
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
        $PharmacyProductRequest = PharmacyProductRequest::find($id);
        $PharmacyProductRequest->request_amount = $request->request_amount;
        $PharmacyProductRequest->status = $request->status;
        $PharmacyProductRequest->observation = $request->observation;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->user_request_id = $request->user_request_id;
        $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado actualizado exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $i
     * @return JsonResponse
     */
    public function updateInventoryByLot(Request $request, int $id): JsonResponse
    {
        if ($id != -1) {
            $PharmacyProductRequest = PharmacyProductRequest::find($id);
            if ($PharmacyProductRequest) {
                if ($request->status == "ENVIADO") {
                    $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;
                    $PharmacyProductRequest->status = $request->status;
                    $PharmacyProductRequest->save();

                    $elements = json_decode($request->pharmacy_lot_stock_id);
                    foreach ($elements as $element) {
                        $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                        $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                        $PharmacyLotStock->save();

                        $PharmacyRequestShipping = new PharmacyRequestShipping;
                        $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                        $PharmacyRequestShipping->pharmacy_lot_stock_id =  $PharmacyLotStock->id;
                        $PharmacyRequestShipping->amount_damaged =  0;
                        $PharmacyRequestShipping->amount =  0;
                        $PharmacyRequestShipping->amount_provition =  $element->amount;
                        $PharmacyRequestShipping->save();
                    }
                }
                if ($request->status == "ACEPTADO") {
                    $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;
                    $PharmacyProductRequest->status = $request->status;
                    $PharmacyProductRequest->observation = $request->observation;
                    $PharmacyProductRequest->save();
                    $elements = json_decode($request->pharmacy_lot_stock_id);
                    foreach ($elements as $element) {
                        $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                        
                        $LastPharmacyLot = PharmacyLot::find($PharmacyLotStock->pharmacy_lot_id);
                        
                        $PharmacyRequestShipping = PharmacyRequestShipping::find($element->pharmacy_request_shipping_id);
                        // $PharmacyRequestShipping->amount = $element->amount  - $element->amount_provition ;
                        $PharmacyRequestShipping->amount_damaged =  $element->amount_damaged;
                        $PharmacyRequestShipping->amount =  $element->amount;
                        $PharmacyRequestShipping->save();

                        $NewParmacyLot = new PharmacyLot;
                        $NewParmacyLot->subtotal = $LastPharmacyLot->subtotal;
                        $NewParmacyLot->vat = $LastPharmacyLot->vat;
                        $NewParmacyLot->total = $LastPharmacyLot->total;
                        $NewParmacyLot->receipt_date = $LastPharmacyLot->receipt_date;
                        $NewParmacyLot->pharmacy_stock_id = $request->own_pharmacy_stock_id;
                        $NewParmacyLot->save();

                        $NewPharmacyLotStock = new PharmacyLotStock;
                        $NewPharmacyLotStock->lot = $PharmacyLotStock->lot;
                        $NewPharmacyLotStock->amount_total = $PharmacyLotStock->amount_total;
                        $NewPharmacyLotStock->sample = $PharmacyLotStock->sample;
                        $NewPharmacyLotStock->actual_amount = $element->amount;
                        $NewPharmacyLotStock->expiration_date = $PharmacyLotStock->expiration_date;
                        $NewPharmacyLotStock->pharmacy_lot_id = $NewParmacyLot->id;
                        $NewPharmacyLotStock->billing_stock_id = $PharmacyLotStock->billing_stock_id;
                        $NewPharmacyLotStock->save();
                    }
                }
            }
        } else {
            $PharmacyProductRequest = new PharmacyProductRequest;
            $PharmacyProductRequest->request_amount = $request->amount_provition;
            $PharmacyProductRequest->status = $request->status;
            $PharmacyProductRequest->observation = '';
            $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
            $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
            $PharmacyProductRequest->user_request_id = $request->user_request_id;
            $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
            $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
            $PharmacyProductRequest->save();

            $PharmacyRequestShipping = new PharmacyRequestShipping;
            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
            $PharmacyRequestShipping->pharmacy_lot_stock_id =  $request->pharmacy_lot_stock_id;
            $PharmacyRequestShipping->amount_damaged =  0;
            $PharmacyRequestShipping->amount =  0;
            $PharmacyRequestShipping->amount_provition =  $request->amount_provition;
            $PharmacyRequestShipping->save();

            $PharmacyLotStock = PharmacyLotStock::find($request->pharmacy_lot_stock_id);
            $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $request->amount_provition;
            $PharmacyLotStock->save();
        }



        return response()->json([
            'status' => true,
            'message' => 'Inventario lote actualizado exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
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
            $PharmacyProductRequest = PharmacyProductRequest::find($id);
            $PharmacyProductRequest->delete();

            return response()->json([
                'status' => true,
                'message' => 'Producto solicitado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Producto solicitado en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
