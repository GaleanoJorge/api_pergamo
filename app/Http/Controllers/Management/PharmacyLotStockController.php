<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyLotStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\BillingStock;
use App\Models\LogPharmacyLot;
use App\Models\LogPharmaLote;
use App\Models\PharmacyLot;
use App\Models\PharmacyStock;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Dompdf\Dompdf as PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;


class PharmacyLotStockController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyLotStock = PharmacyLotStock::select('pharmacy_lot_stock.*')
            ->leftJoin('billing_stock', 'billing_stock.id', 'pharmacy_lot_stock.billing_stock_id')
            ->leftJoin('product', 'product.id', 'billing_stock.product_id')
            ->leftJoin('factory', 'factory.id', 'product.factory_id')
            ->leftJoin('product_supplies_com', 'product_supplies_com.id', 'billing_stock.product_supplies_com_id')
            ->leftJoin('factory AS fc', 'fc.id', 'product_supplies_com.factory_id')
            ->leftJoin('pharmacy_lot', 'pharmacy_lot.id', 'pharmacy_lot_stock.pharmacy_lot_id')
            ->leftJoin('pharmacy_stock', 'pharmacy_stock.id', 'pharmacy_lot.pharmacy_stock_id')
            ->leftJoin('campus', 'campus.id', 'pharmacy_stock.campus_id')
            ->with(
                'pharmacy_lot',
                'billing_stock',
                'billing_stock.product',
                'billing_stock.product.factory',
                'billing_stock.product.product_generic',
                'billing_stock.product_supplies_com',
                'billing_stock.product_supplies_com.factory',
                'billing_stock.product_supplies_com.product_supplies',
                'pharmacy_stock',
                'pharmacy_stock.campus',
                'pharmacy_adjustment'
            )->groupBy('pharmacy_lot_stock.id');

        if ($request->islot == true) {
            $PharmacyLotStock->groupby('pharmacy_lot_id');
        }
        if ($request->_sort) {
            if ($request->_sort != "actions" && $request->_sort != "product" && $request->_sort != "factory"  && $request->_sort != "amount_total"  && $request->_sort != "actual_amount"  && $request->_sort != "lot" && $request->_sort != "expiration_date" && $request->_sort != "product_supplies_com" && $request->_sort != "pharmacy_stock") {
                $PharmacyLotStock->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->pharmacy_stock_id) {
            $PharmacyLotStock->where('pharmacy_lot_stock.pharmacy_stock_id', $request->pharmacy_stock_id);
        }
        if ($request->campus_id) {
            $PharmacyLotStock->where('pharmacy_stock.campus_id', $request->campus_id);
        }
        if ($request->product_generic_id) {
            $PharmacyLotStock->where('product.product_generic_id', $request->product_generic_id);
        }
        if ($request->product_supplies_id) {
            $PharmacyLotStock->where('product_supplies_com.product_supplies_id', $request->product_supplies_id);
        }
        if ($request->product == "true") {
            $PharmacyLotStock->whereNotNull('billing_stock.product_id')->whereNull('billing_stock.product_supplies_com_id');
        } else if ($request->product == "false") {
            $PharmacyLotStock->whereNull('billing_stock.product_id')->whereNotNull('billing_stock.product_supplies_com_id');
        }

        $PharmacyLotStock->where(function ($query) use ($request) {
            if ($request->actual_amount == 0) {
                $query->where('pharmacy_lot_stock.actual_amount', '>', 0);
            }
        });

        if ($request->search) {
            $PharmacyLotStock->where(function ($query) use ($request) {
                $query->Where('product.name', 'like', '%' . $request->search . '%')
                    ->orWhere('product_supplies_com.name', 'like', '%' . $request->search . '%')
                    ->orWhere('factory.name', 'like', '%' . $request->search . '%')
                    ->orWhere('lot', 'like', '%' . $request->search . '%')
                    ->orWhere('pharmacy_stock.name', 'like', '%' . $request->search . '%')
                    ->orWhere('campus.name', 'like', '%' . $request->search . '%')
                    ->orWhere('fc.name', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->query("pagination", true) == "false") {
            $PharmacyLotStock = $PharmacyLotStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $PharmacyLotStock = $PharmacyLotStock->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Registro en lote obtenidos exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyLotStock]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyByUserId(Request $request, int $id): JsonResponse
    {
        $parmacy = PharmacyStock::select('pharmacy_stock.*')
            ->leftJoin('pharmacy_lot', 'pharmacy_stock.id', '=', 'pharmacy_lot.pharmacy_stock_id')
            ->leftJoin('user_pharmacy_stock', 'pharmacy_stock.id', '=', 'user_pharmacy_stock.pharmacy_stock_id')
            ->where('user_pharmacy_stock.user_id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'lotes por usuario obtenidas exitosamente',
            'data' => ['pharmacy_lot_stock' => $parmacy]
        ]);
    }



    /**
     * Imprimir inventario 
     */

    public function viewInventory(Request $request)
    {
        $pharmacy = PharmacyLotStock::select('pharmacy_lot_stock.*')
            ->leftJoin('billing_stock', 'billing_stock.id', 'pharmacy_lot_stock.billing_stock_id')
            ->leftJoin('product_supplies_com', 'product_supplies_com.id', 'billing_stock.product_supplies_com_id')
            ->leftJoin('product', 'product.id', 'billing_stock.product_id')
            ->leftJoin('factory', 'factory.id', 'product.factory_id')
            ->with(
                'pharmacy_lot',
                'pharmacy_stock',
                'billing_stock',
                'billing_stock.product',
                'billing_stock.product.factory',
                'billing_stock.product.product_generic',
                'billing_stock.product_supplies_com.product_supplies',
                'billing_stock.product_supplies_com.factory',
            );

        if ($request->type == 1) {
            $pharmacy = $pharmacy->where('billing_stock.product_id', '!=', null)
            ->where('pharmacy_lot_stock.actual_amount', '>', 0)
            ->where('pharmacy_stock_id', $request->pharmacy_stock_id)
            ->get()->toArray();
        } else {
            $pharmacy = $pharmacy->where('billing_stock.product_supplies_com_id', '!=', null)
            ->where('pharmacy_lot_stock.actual_amount', '>', 0)
            ->where('pharmacy_stock_id', $request->pharmacy_stock_id)
            ->get()->toArray();
        }



        $html = view('reports.inventory', [
            'pharmacy' => $pharmacy,
            'type' => $request->type,
            'pharmacy_stock_id' => $request->pharmacy_stock_id,

        ])->render();
        $options = new Options();
        $options->set('isRemoteEnabled', true);


        $dompdf = new PDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Carta', 'landscape');
        $dompdf->render();
        // $this->injectPageCount($dompdf);
        $file = $dompdf->output();

        if ($request->type == 1) {
            $name = 'InventarioMedicamentos.pdf';
        } else {
            $name = 'InventarioInsumos.pdf';
        }

        // $name = 'InventarioInsumos.pdf';

        Storage::disk('public')->put($name, $file);
        // if (count($pharmacy) > 0) {
        //     foreach ($pharmacy as $ph) {


        // $html = view('reports.inventorySupplies', [
        //     'pharmacy' => $pharmacy,

        // ])->render();

        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $dompdf = new PDF($options);
        // $dompdf->loadHtml($html);
        // $dompdf->setPaper('Carta', 'landscape');
        // $dompdf->render();
        // // $this->injectPageCount($dompdf);
        // $file = $dompdf->output();

        // $name = 'InventarioInsumos.pdf';

        // Storage::disk('public')->put($name, $file);

        // }

        return response()->json([
            'status' => true,
            'ph' => $pharmacy,
            'message' => 'Reporte generado exitosamente',
            'url' => asset('/storage' . '/' . $name),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyLotId(Request $request, int $id): JsonResponse
    {
        $parmacy = PharmacyLot::select('Billing_stock.*')
            ->leftJoin('Billing_stock', 'Billing_stock.id', '=', 'pharmacy_stock.id')
            ->where('pharmacy_stock.id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'lotes obtenidas exitosamente',
            'data' => ['pharmacy_lot_stock' => $parmacy]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyBillingId(Request $request, int $id): JsonResponse
    {
        $parmacy = BillingStock::select('billing_stock.*')
            ->leftJoin('billing_stock', 'billing_stock.id', '=', 'pharmacy_stock.id')
            ->where('pharmacy_stock.id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Orden de compra obtenido exitosamente',
            'data' => ['pharmacy_lot_stock' => $parmacy]
        ]);
    }



    public function store(Request $request): JsonResponse
    {
        $elements = json_decode($request->billing_stock_id);
        foreach ($elements as $element) {
            $PharmacyLotStock = new PharmacyLotStock;
            $PharmacyLotStock->lot = $element->lot;
            $PharmacyLotStock->amount_total = $element->amount_total;
            $PharmacyLotStock->sample = floor($element->amount_total * 0.1);
            $PharmacyLotStock->actual_amount = $element->amount_total;
            $PharmacyLotStock->expiration_date = $element->expiration_date;
            $PharmacyLotStock->pharmacy_lot_id = $request->pharmacy_lot_id;
            $PharmacyLotStock->billing_stock_id = $element->billing_stock_id;
            $PharmacyLotStock->pharmacy_stock_id = $request->pharmacy_stock_id;
            $PharmacyLotStock->save();

            $BillingStock = BillingStock::find($element->billing_stock_id);
            $BillingStock->amount_provitional = $BillingStock->amount_provitional - $element->amount_total;
            $BillingStock->save();
            $LogPharmacyLot = new LogPharmacyLot;
            $LogPharmacyLot->billing_stock_id = $BillingStock->id;
            $LogPharmacyLot->pharmacy_lot_stock_id = $PharmacyLotStock->id;
            $LogPharmacyLot->lot = $element->lot;
            $LogPharmacyLot->sample = floor($element->amount_total * 0.1);
            $LogPharmacyLot->actual_amount = $element->amount_total;
            $LogPharmacyLot->expiration_date = $element->expiration_date;
            $LogPharmacyLot->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Registro en lote asociado exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyLotStock->toArray()]
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
        $PharmacyLotStock = PharmacyLotStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro en lote obtenido exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyLotStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $i
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $PharmacyLotStock = PharmacyLotStock::find($id);
        $PharmacyLotStock->lot = $request->lot;
        $PharmacyLotStock->amount_total = $request->amount_total;
        $PharmacyLotStock->sample = $request->sample;
        $PharmacyLotStock->actual_amount = $request->actual_amount;
        $PharmacyLotStock->expiration_date = $request->expiration_date;
        $PharmacyLotStock->pharmacy_lot_id = $request->pharmacy_lot_id;
        $PharmacyLotStock->billing_stock_id = $request->billing_stock_id;
        $PharmacyLotStock->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyLotStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en lote actualizado exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyLotStock]
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
        $PharmacyLotStock = PharmacyLotStock::find($id);
        $PharmacyLotStock->actual_amount = $PharmacyLotStock->amount - $request->actual_amount;
        $PharmacyLotStock->save();
        $PharmacyReceptorInventory = PharmacyLotStock::select('pharmacy_lot_stock.*')
            ->leftJoin('pharmacy_lot', 'pharmacy_lot_stock.pharmacy_lot_id', 'pharmacy_lot.id')->where('pharmacy_lot.pharmacy_stock_id', $request->pharmacy_stock_id)->where('pharmacy_lot_stock_id', $request->pharmacy_lot_stock_id)->first();
        if ($PharmacyReceptorInventory) {
            $PharmacyReceptorInventory->actual_amount = $PharmacyReceptorInventory->actual_amount + $request->amount;
            $PharmacyReceptorInventory->save();
        } else {
            $PharmacyReceptorInventory = new PharmacyLotStock;
            $PharmacyLotStock->lot = $request->lot;
            $PharmacyLotStock->amount_total = $request->amount_total;
            $PharmacyLotStock->sample = floor($request->amount_total * 0.1);
            $PharmacyLotStock->actual_amount = $request->actual_amount;
            $PharmacyLotStock->expiration_date = $request->expiration_date;
            $PharmacyLotStock->pharmacy_lot_id = $request->pharmacy_lot_id;
            $PharmacyLotStock->billing_stock_id = $request->billing_stock_id;
            $PharmacyLotStock->pharmacy_stock_id = $request->pharmacy_stock_id;
            $PharmacyReceptorInventory->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Inventario lote actualizado exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyReceptorInventory]
        ]);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Inventario lote actualizado exitosamente',
        //     'data' => ['billing_stock_id' => $PharmacyReceptorInventory]
        // ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $i
     * @return JsonResponse
     */
    public function updateInvAdjustment(Request $request, int $id): JsonResponse
    {
        if ($request->sign == 0) {
            $PharmacyLotStock = PharmacyLotStock::find($id);
            $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount + $request->amount;
            $PharmacyLotStock->save();

            $LogPharmaLote = new LogPharmaLote;
            $LogPharmaLote->pharmacy_lot_stock_id = $PharmacyLotStock->id;
            $LogPharmaLote->pharmacy_adjustment_id = $request->pharmacy_adjustment_id;
            $LogPharmaLote->actual_amount = $PharmacyLotStock->actual_amount;
            $LogPharmaLote->amount = $request->amount;
            $LogPharmaLote->sign = $request->sign;
            $LogPharmaLote->observation = $request->observation;
            $LogPharmaLote->save();
        } else {
            $PharmacyLotStock = PharmacyLotStock::find($id);
            $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $request->amount;
            $PharmacyLotStock->save();

            $LogPharmaLote = new LogPharmaLote;
            $LogPharmaLote->pharmacy_lot_stock_id = $PharmacyLotStock->id;
            $LogPharmaLote->pharmacy_adjustment_id = $request->pharmacy_adjustment_id;
            $LogPharmaLote->actual_amount = $PharmacyLotStock->actual_amount;
            $LogPharmaLote->amount = $request->amount;
            $LogPharmaLote->sign = $request->sign;
            $LogPharmaLote->observation = $request->observation;
            $LogPharmaLote->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Inventario lote actualizado exitosamente',
            'data' => ['pharmacy_lot_stock' => $PharmacyLotStock]
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
            $PharmacyLotStock = PharmacyLotStock::find($id);
            $PharmacyLotStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro en lote eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro en lote en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
