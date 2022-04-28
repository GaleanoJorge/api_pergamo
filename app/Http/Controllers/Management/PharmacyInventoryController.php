<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyInventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\PharmacyStock;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyInventory = PharmacyInventory::with(
            'pharmacy_lot',
            'pharmacy_lot.billing_stock',
            'pharmacy_lot.billing_stock.product',
            'pharmacy_lot.billing_stock.product.factory',
            'pharmacy_lot.billing_stock.product.product_generic'
        );

        if ($request->_sort) {
            $PharmacyInventory->orderBy($request->_sort, $request->_order);
        }

        if ($request->pharmacy_stock_id) {
            $PharmacyInventory->where('pharmacy_stock_id', $request->pharmacy_stock_id);
        }

        if ($request->search) {
            $PharmacyInventory->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyInventory = $PharmacyInventory->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyInventory = $PharmacyInventory->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Inventario farmacia obtenidos exitosamente',
            'data' => ['pharmacy_inventory' => $PharmacyInventory]
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
            ->leftJoin('permission_pharmacy_stock', 'pharmacy_stock.permission_pharmacy_stock_id', '=', 'permission_pharmacy_stock.id')
            ->where('permission_pharmacy_stock.user_id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Farmacias por usuario obtenidas exitosamente',
            'data' => ['pharmacy_inventory' => $parmacy]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $PharmacyInventory = new PharmacyInventory;
        $PharmacyInventory->actual_amount = $request->actual_amount;
        $PharmacyInventory->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyInventory->pharmacy_lot_id = $request->pharmacy_lot_id;
        $PharmacyInventory->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventario farmacia asociado al en farmacia exitosamente',
            'data' => ['pharmacy_inventory' => $PharmacyInventory->toArray()]
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
        $PharmacyInventory = PharmacyInventory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Inventario farmacia obtenido exitosamente',
            'data' => ['pharmacy_inventory' => $PharmacyInventory]
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
        $PharmacyInventory = PharmacyInventory::find($id);
        $PharmacyInventory->actual_amount = $request->actual_amount;
        $PharmacyInventory->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyInventory->pharmacy_lot_id = $request->pharmacy_lot_id;
        $PharmacyInventory->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventario farmacia actualizado exitosamente',
            'data' => ['pharmacy_inventory' => $PharmacyInventory]
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
        $PharmacyInventory = PharmacyInventory::find($id);
        $PharmacyInventory->actual_amount = $PharmacyInventory->actual_amount - $request->amount;
        $PharmacyInventory->save();
        $PharmacyReceptorInventory = PharmacyInventory::select()->where('pharmacy_stock_id', $request->pharmacy_stock_id)->where('pharmacy_lot_id', $request->pharmacy_lot_id)->first();
        if ($PharmacyReceptorInventory) {
            $PharmacyReceptorInventory->actual_amount = $PharmacyReceptorInventory->actual_amount + $request->amount;
            $PharmacyReceptorInventory->save();
        } else {
            $PharmacyReceptorInventory = new PharmacyInventory;
            $PharmacyReceptorInventory->actual_amount = $request->amount;
            $PharmacyReceptorInventory->pharmacy_stock_id = $request->pharmacy_stock_id;
            $PharmacyReceptorInventory->pharmacy_lot_id = $request->pharmacy_lot_id;
            $PharmacyReceptorInventory->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Inventario farmacia actualizado exitosamente',
            'data' => ['pharmacy_inventory' => $PharmacyReceptorInventory]
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
            $PharmacyInventory = PharmacyInventory::find($id);
            $PharmacyInventory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Inventario farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Inventario farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
