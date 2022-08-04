<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAccessories;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedAccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAccessories = FixedAccessories::with('campus', 'fixed_type');

        if ($request->_sort) {
            $FixedAccessories->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedAccessories->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAccessories = $FixedAccessories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAccessories = $FixedAccessories->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos obtenidos exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyByUserId(Request $request, int $id): JsonResponse
    {
        $parmacy = FixedAccessories::select('fixed_accessories.*')
            ->leftJoin('fixed_permission_type', 'fixed_accessories.fixed_permission_type_id', '=', 'fixed_permission_type.id')
            ->where('fixed_permission_type.user_id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'lotes por usuario obtenidas exitosamente',
            'data' => ['pharmacy_lot_stock' => $parmacy]
        ]);
    }



    public function store(Request $request): JsonResponse
    {
        $FixedAccessories = new FixedAccessories;
        $FixedAccessories->name = $request->name;
        $FixedAccessories->status = $request->status;
        $FixedAccessories->amount_total = $request->amount_total;
        $FixedAccessories->actual_amount = $request->amount_total;
        $FixedAccessories->campus_id = $request->campus_id;
        $FixedAccessories->fixed_type_id = $request->fixed_type_id;
        $FixedAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos asociado exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories->toArray()]
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
        $FixedAccessories = FixedAccessories::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos obtenido exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
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
        $FixedAccessories = FixedAccessories::find($id);
        $FixedAccessories->name = $request->name;
        $FixedAccessories->status = $request->status;
        $FixedAccessories->amount_total = $request->amount_total;
        $FixedAccessories->actual_amount = $request->amount_total;
        $FixedAccessories->campus_id = $request->campus_id;
        $FixedAccessories->fixed_type_id = $request->fixed_type_id;
        $FixedAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios de act. fijos actualizado exitosamente',
            'data' => ['fixed_accessories' => $FixedAccessories]
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
        $FixedAccessories = FixedAccessories::find($id);
        $FixedAccessories->actual_amount = $FixedAccessories->amount - $request->actual_amount;
        $FixedAccessories->save();
        $PharmacyReceptorInventory = FixedAccessories::select('fixed_accessories.*');
        // ->leftJoin('pharmacy_lot', 'pharmacy_lot_stock.pharmacy_lot_id', 'pharmacy_lot.id')->where('pharmacy_lot.pharmacy_stock_id', $request->pharmacy_stock_id)->where('pharmacy_lot_stock_id', $request->pharmacy_lot_stock_id)->first();
        if ($PharmacyReceptorInventory) {
            $PharmacyReceptorInventory->actual_amount = $PharmacyReceptorInventory->actual_amount + $request->amount;
            $PharmacyReceptorInventory->save();
        } else {
            $PharmacyReceptorInventory = new FixedAccessories;
            $FixedAccessories->name = $request->name;
            $FixedAccessories->status = $request->status;
            $FixedAccessories->amount_total = $request->amount_total;
            $FixedAccessories->actual_amount = $request->amount_total;
            $FixedAccessories->campus_id = $request->campus_id;
            $FixedAccessories->fixed_type_id = $request->fixed_type_id;
            $PharmacyReceptorInventory->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Inventario lote actualizado exitosamente',
            'data' => ['fixed_accessories' => $PharmacyReceptorInventory]
        ]);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Inventario lote actualizado exitosamente',
        //     'data' => ['billing_stock_id' => $PharmacyReceptorInventory]
        // ]);
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
            $FixedAccessories = FixedAccessories::find($id);
            $FixedAccessories->delete();

            return response()->json([
                'status' => true,
                'message' => 'Accesorios de act. fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Accesorios de act. fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
