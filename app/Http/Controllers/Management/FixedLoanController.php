<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedLoan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class FixedLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedLoan = FixedLoan::select('fixed_add_id.*')
            ->with(
                'fixed_add',
                'fixed_add.fixed_assets',
                'fixed_add.fixed_accessories');

        if ($request->_sort) {
            $FixedLoan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedLoan->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->fixed_add_id) {
            $FixedLoan->where('fixed_add_id', $request->fixed_add_id);
        }

        if ($request->product1 == "true") {
            //medicamento  product_generic_id
            $FixedLoan->whereNotNull('fixed_add.fixed_assets_id')->whereNull('fixed_add.fixed_accessories_id');
        } else if ($request->product1 == "false") {
            // insumo product_supplies_id
            $FixedLoan->whereNull('fixed_add.fixed_assets_id')->whereNotNull('fixed_add.fixed_accessories_id');
        }


        if ($request->query("pagination", true) == "false") {
            $FixedLoan = $FixedLoan->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedLoan = $FixedLoan->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Envio de activo obtenidos exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedLoan = new FixedLoan;
        $FixedLoan->amount = $request->amount;
        $FixedLoan->amount_damaged = $request->amount_damaged;
        $FixedLoan->amount_provition = $request->amount_provition;
        $FixedLoan->fixed_add_id = $request->fixed_add_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo asociado exitosamente',
            'data' => ['fixed_loan' => $FixedLoan->toArray()]
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
        $FixedLoan = FixedLoan::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo obtenido exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
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
        $FixedLoan = FixedLoan::find($id);
        $FixedLoan->amount = $request->amount;
        $FixedLoan->amount_damaged = $request->amount_damaged;
        $FixedLoan->amount_provition = $request->amount_provition;
        $FixedLoan->fixed_add_id = $request->fixed_add_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Envio de activo actualizado exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  int  $i
    //  * @return JsonResponse
    //  */
    // public function updateInventoryByLot(Request $request, int $id): JsonResponse
    // {
    //     $FixedLoan = FixedLoan::find($id);
    //     $FixedLoan->actual_amount = $FixedLoan->amount - $request->actual_amount;
    //     $FixedLoan->save();
    //     $PharmacyReceptorInventory = FixedLoan::select('pharmacy_lot_stock.*')
    //         ->leftJoin('pharmacy_lot', 'pharmacy_lot_stock.pharmacy_lot_id', 'pharmacy_lot.id')->where('pharmacy_lot.pharmacy_stock_id', $request->pharmacy_stock_id)->where('pharmacy_lot_stock_id', $request->pharmacy_lot_stock_id)->first();
    //     if ($PharmacyReceptorInventory) {
    //         $PharmacyReceptorInventory->actual_amount = $PharmacyReceptorInventory->actual_amount + $request->amount;
    //         $PharmacyReceptorInventory->save();
    //     } else {
    //         $PharmacyReceptorInventory = new FixedLoan;
    //         $FixedLoan->actual_amount = $request->actual_amount;
    //         $FixedLoan->fixed_add_id = $request->fixed_add_id;
    //         $FixedLoan->fixed_loan_id = $request->fixed_loan_id;
    //         $PharmacyReceptorInventory->save();
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Inventario activos actualizado exitosamente',
    //         'data' => ['fixed_loan' => $PharmacyReceptorInventory]
    //     ]);
    //     // return response()->json([
    //     //     'status' => true,
    //     //     'message' => 'Inventario lote actualizado exitosamente',
    //     //     'data' => ['billing_stock_id' => $PharmacyReceptorInventory]
    //     // ]);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $FixedLoan = FixedLoan::find($id);
            $FixedLoan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Envio de activo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Envio de activo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}