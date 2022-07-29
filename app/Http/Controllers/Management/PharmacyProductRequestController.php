<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\AssignedManagementPlan;
use App\Models\AssistanceSupplies;
use App\Models\ChRecord;
use App\Models\ManagementPlan;
use App\Models\PharmacyLot;
use App\Models\PharmacyLotStock;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyRequestShipping;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
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
        $PharmacyProductRequest = PharmacyProductRequest::select(
            'pharmacy_product_request.*',
            DB::raw('SUM(pharmacy_request_shipping.amount_provition) AS cantidad_enviada')
        )
            ->leftJoin('pharmacy_request_shipping', 'pharmacy_request_shipping.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->with(
                'product_generic',
                'product_supplies',
                'own_pharmacy_stock',
                'request_pharmacy_stock',
                'request_pharmacy_stock.campus',
                'own_pharmacy_stock.campus',
                'pharmacy_request_shipping',
                'pharmacy_request_shipping.pharmacy_lot_stock',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                'user_request',
                'admissions',
                'admissions.patients',
                'services_briefcase',
                'services_briefcase.briefcase',
                'services_briefcase.manual_price',
                'user_request_pad',
            )
            
            ->groupBy('pharmacy_product_request.id');

            if($request->status=="PATIENT"){

            }else{
                $PharmacyProductRequest->WhereNotNull('own_pharmacy_stock_id');
            }

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
        if ($request->cantidad) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                if ($request->cantidad == 0) {
                    $query->where('pharmacy_request_shipping.amount_provition', '>', 0);
                }
            });
        }
        if ($request->request_amount) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                if ($request->request_amount == 0) {
                    $query->where('pharmacy_product_request.request_amount', '>', 0);
                }
            });
        }

        if ($request->status) {
            $PharmacyProductRequest->where('pharmacy_product_request.status', $request->status);
        }

        if ($request->admissions_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.admissions_id', $request->admissions_id);
        }



        if ($request->user_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.user_request_id', $request->user_id);
        }


        if ($request->status) {
            $PharmacyProductRequest->where('pharmacy_product_request.status', $request->status);
        }

        if ($request->product == "true") {
            //medicamento  product_generic_id
            $PharmacyProductRequest->whereNotNull('product_generic_id')->whereNull('product_supplies_id');
        } else if ($request->product == "false") {
            // insumo product_supplies_id
            $PharmacyProductRequest->whereNull('product_generic_id')->whereNotNull('product_supplies_id');
        }

        if ($request->search) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->where('pharmacy_product_request.status', 'like', '%' . $request->search . '%');
            });
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
    public function forUse(Request $request): JsonResponse
    {
        $arreglo=[];
        $PharmacyProductRequest = PharmacyProductRequest::select(
            'pharmacy_product_request.*',
            DB::raw('SUM(pharmacy_request_shipping.amount_provition) AS cantidad_enviada'),
            DB::raw('COUNT(assistance_supplies.supplies_status_id = 1) AS created'),
            DB::raw('                
                SUM(
                    IF( assistance_supplies.supplies_status_id = 1, 
                        1,0 
                    )
                ) AS disponibles'),
            DB::raw('
                SUM(
                    IF( assistance_supplies.supplies_status_id = 3, 
                       1,0 
                    )
               ) AS dañadas'),
            DB::raw('                
               SUM(
                   IF( assistance_supplies.supplies_status_id = 2, 
                       1,0 
                   )
               ) AS Usadas'),
        )
            ->leftJoin('pharmacy_request_shipping', 'pharmacy_request_shipping.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->leftJoin('assistance_supplies', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->with(
                'management_plan',
                'product_generic',
                'product_supplies',
                'own_pharmacy_stock',
                'request_pharmacy_stock',
                'request_pharmacy_stock.campus',
                'own_pharmacy_stock.campus',
                'pharmacy_request_shipping',
                'pharmacy_request_shipping.pharmacy_lot_stock',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                'user_request'
            )->groupBy('pharmacy_product_request.id');

        if ($request->user) {
            $PharmacyProductRequest->where('pharmacy_product_request.user_request_id', $request->user_id);
        }

        if ($request->patient) {
            $ch_record = ChRecord::find($request->patient)->first();
            $assigned = AssignedManagementPlan::find($ch_record->assigned_management_plan_id)->first();
            if($request->product){
                $PharmacyProductRequest
                    ->where('pharmacy_product_request.management_plan_id', $assigned->management_plan_id);
                    // ->where('SUM(IF( assistance_supplies.supplies_status_id = 1, 1,0 )) ', '!=', '0');
    

                } else {
                    $management = ManagementPlan::find($assigned->management_plan_id)->first();
                    $PharmacyProductRequest
                    ->where('admissions_id',$management->admissions_id)
                    ->whereNotNull('product_supplies_id');
      
            }
        }

        // if ($request->patient) {
        //     $ch_record = ChRecord::find($request->patient)->first();
        //     $assigned = AssignedManagementPlan::find($ch_record->assigned_management_plan_id)->first();

        //     $PharmacyProductRequest->where('pharmacy_product_request.management_plan_id', $assigned->management_plan_id);
        // }

        if ($request->_sort) {
            $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->product == "true") {
            //medicamento  product_generic_id
            $PharmacyProductRequest->whereNotNull('product_generic_id')->whereNull('product_supplies_id');
        } else if ($request->product == "false") {
            // insumo product_supplies_id
            $PharmacyProductRequest->whereNull('product_generic_id')->whereNotNull('product_supplies_id');
        }

        if ($request->search) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->where('pharmacy_product_request.status', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyProductRequest = $PharmacyProductRequest->paginate($per_page, '*', 'page', $page);
        }

        foreach ($PharmacyProductRequest as $item) {
            if($item['disponibles']==0){

            }else{
                array_push($arreglo, $item);
            }


        }


        return response()->json([

            'status' => true,
            'message' => 'Producto solicitado obtenidos exitosamente',
            'data' => ['pharmacy_product_request' => $arreglo]
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
        $PharmacyProductRequest->admissions_id = $request->admissions_id;
        $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
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
        $PharmacyProductRequest->admissions_id = $request->admissions_id;
        $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->user_request_id = $request->user_request_id;
        $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
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
        $user_id = Auth::user()->id;
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

                        if ($PharmacyProductRequest->product_generic_id) {
                            $quantity = ProductGeneric::find($PharmacyProductRequest->product_generic_id);
                        } else {
                            $quantity = ProductSupplies::find($PharmacyProductRequest->product_supplies_id);
                        }

                        for ($i = 0; $i < $element->amount; $i++) {
                            for ($j = 0; $j < $quantity->dose ? $quantity->dose : 1 ; $j++) {
                                $assistanceSupplies = new AssistanceSupplies;
                                $assistanceSupplies->user_incharge_id =  $user_id;
                                $assistanceSupplies->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                                $assistanceSupplies->supplies_status_id = 1;
                                $assistanceSupplies->save();
                            }
                        }

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
            $PharmacyProductRequest->user_request_id = $request->user_request_id;
            $PharmacyProductRequest->admissions_id = $request->admissions_id;
            $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
            $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
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
