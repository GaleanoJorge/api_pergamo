<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedLoan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use App\Models\Base\FixedStockAccessories;
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
        $FixedLoan = FixedLoan::select();

        if ($request->_sort) {
            $FixedLoan->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedLoan->where('name', 'like', '%' . $request->search . '%');
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
            'message' => 'Condición obtenidos exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedLoan = new FixedLoan;
        $FixedLoan->fixed_assets_id = $request->fixed_assets_id;
        $FixedLoan->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedLoan->own_user_id = $request->own_user_id;
        $FixedLoan->request_user_id = $request->request_user_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->status = $request->status;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición asociado exitosamente',
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
            'message' => 'Condición obtenido exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
        ]);
    }

    public function updateInventoryByLot(Request $request, int $id): JsonResponse
    {
        if ($id != -1) {
            $FixedLoan = FixedLoan::find($id);
            if ($FixedLoan) {
                if ($request->status == "ENVIADO") {
                    $FixedLoan->request_amount = $FixedLoan->request_amount - $request->amount;
                    $FixedLoan->status = $request->status;
                    $FixedLoan->save();

                    $elements = json_decode($request->fixed_stock_accessories_id);
                    foreach ($elements as $element) {
                        $FixedStockAccessories = FixedStockAccessories::find($element->fixed_stock_accessories_id);
                        $FixedStockAccessories->actual_amount = $FixedStockAccessories->actual_amount - $element->amount;
                        $FixedStockAccessories->save();

                        // $PharmacyRequestShipping = new PharmacyRequestShipping;
                        // $PharmacyRequestShipping->pharmacy_product_request_id =  $FixedLoan->id;
                        // $PharmacyRequestShipping->fixed_stock_accessories_id =  $FixedStockAccessories->id;
                        // $PharmacyRequestShipping->amount_damaged =  0;
                        // $PharmacyRequestShipping->amount =  0;
                        // $PharmacyRequestShipping->amount_provition =  $element->amount;
                        // $PharmacyRequestShipping->save();
                    }
                }
                if ($request->status == "ACEPTADO") {
                    $FixedLoan->amount = $FixedLoan->amount - $request->amount_loan;
                    $FixedLoan->status = $request->status;
                    $FixedLoan->observation = $request->observation;
                    $FixedLoan->save();
                    $elements = json_decode($request->fixed_stock_accessories_id);
                    foreach ($elements as $element) {
                        $FixedStockAccessories = FixedStockAccessories::find($element->fixed_stock_accessories_id);

                        $LastFixedLoan = FixedLoan::find($FixedStockAccessories->pharmacy_lot_id);

                        // $PharmacyRequestShipping = PharmacyRequestShipping::find($element->pharmacy_request_shipping_id);
                        // $PharmacyRequestShipping->amount_damaged =  $element->amount_damaged;
                        // $PharmacyRequestShipping->amount =  $element->amount;
                        // $PharmacyRequestShipping->save();

                        $NewFixedLoan = new FixedLoan;
                        $NewFixedLoan->name = $LastFixedLoan->name;
                        $NewFixedLoan->amount = $LastFixedLoan->amount;
                        $NewFixedLoan->fixed_type_role_id = $LastFixedLoan->fixed_type_role_id;
                        $NewFixedLoan->save();

                        $NewFixedStockAccessories = new FixedStockAccessories;
                        $NewFixedStockAccessories->amount_loan = $FixedStockAccessories->amount_loan;
                        $NewFixedStockAccessories->fixed_accessories_id = $FixedStockAccessories->fixed_accessories_id;
                        $NewFixedStockAccessories->save();
                    }
                }
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Inventario Activo actualizado exitosamente',
            'data' => ['pharmacy_product_request' => $FixedLoan]
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
        $FixedLoan->fixed_assets_id = $request->fixed_assets_id;
        $FixedLoan->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedLoan->own_user_id = $request->own_user_id;
        $FixedLoan->request_user_id = $request->request_user_id;
        $FixedLoan->responsible_user_id = $request->responsible_user_id;
        $FixedLoan->status = $request->status;
        $FixedLoan->observation = $request->observation;
        $FixedLoan->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición actualizado exitosamente',
            'data' => ['fixed_loan' => $FixedLoan]
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
            $FixedLoan = FixedLoan::find($id);
            $FixedLoan->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condición eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condición en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
