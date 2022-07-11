<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAdd;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\FixedAccessories;
use Illuminate\Http\Request;
use App\Models\FixedAssets;
use App\Models\FixedLoan;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class FixedAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAdd = FixedAdd::with(
            'fixed_assets',
            'fixed_assets.fixed_type_role',
            'fixed_assets.fixed_type_role.fixed_type',
            'fixed_assets.fixed_clasification',
            'fixed_location_campus',
            'fixed_location_campus.campus',
            'fixed_location_campus.flat',
            'responsible_user',
            'responsible_user.user',
            'fixed_accessories',
            'fixed_accessories.fixed_type_role',
            'fixed_accessories.fixed_type_role.fixed_type'
        )->select('fixed_add.*', DB::raw('SUM(fixed_loan.amount_provition) AS cantidad_enviada'))
            ->leftJoin('fixed_loan', 'fixed_loan.fixed_add_id', 'fixed_add.id')
            ->groupBy('fixed_add.id');

        if ($request->_sort) {
            $FixedAdd->orderBy($request->_sort, $request->_order);
        }

        if ($request->fixed_assets_id) {
            $FixedAdd->where('fixed_add.fixed_assets_id', $request->fixed_assets_id);
        }
        if ($request->fixed_accessories_id) {
            $FixedAdd->where('fixed_add.fixed_accessories_id', $request->fixed_accessories_id);
        }

        if ($request->insum == "true") {
            $FixedAdd->whereNotNull('fixed_assets_id')->whereNull('fixed_accessories_id');
        } else if ($request->insum == "false") {
            $FixedAdd->whereNull('fixed_assets_id')->whereNotNull('fixed_accessories_id');
        }

        if ($request->cantidad) {
            $FixedAdd->where(function ($query) use ($request) {
                if ($request->cantidad == 0) {
                    $query->where('fixed_loan.amount_provition', '>', 0);
                }
            });
        }

        if ($request->status) {
            $FixedAdd->where('fixed_add.status', $request->status);
        }

        if ($request->search) {
            $FixedAdd->where('fixed_add.status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAdd = $FixedAdd->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAdd = $FixedAdd->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Asociados act.fijos obtenidos exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyLotId(Request $request, int $id): JsonResponse
    {
        $FixedAdd = FixedAdd::select('fixed_add.*')
            ->leftJoin('fixed_add', 'fixed_add.id', '=', 'fixed_type.id')
            ->where('fixed_type.id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenidas exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $FixedAdd = new FixedAdd;
        $FixedAdd->request_amount = $request->request_amount;
        $FixedAdd->status = $request->status;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->save();

        return response()->json([
            'status' => true,
            'message' => 'Act. fijos guardado exitosamente',
            'data' => ['fixed_add' => $FixedAdd->toArray()]
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
        $FixedAdd = FixedAdd::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Act. fijos obtenido exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
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
        $FixedAdd = FixedAdd::find($id);
        $FixedAdd->request_amount = $request->request_amount;
        $FixedAdd->status = $request->status;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociados act. fijos actualizado exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
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
        $FixedAdd = FixedAdd::find($id);
        if ($FixedAdd) {
            if ($request->status == "ENVIADO") {
                $FixedAdd->request_amount = $FixedAdd->request_amount - $request->amount;
                $FixedAdd->status = $request->status;
                $FixedAdd->save();

                if ($request->fixed_assets_id != null) {

                    $elements = json_decode($request->fixed_assets_id);
                    foreach ($elements as $element) {
                        $FixedAssets = FixedAssets::find($element->fixed_assets_id);
                        $FixedAssets->actual_amount = $FixedAssets->actual_amount - $element->amount;
                        $FixedAssets->save();

                        $FixedLoan = new FixedLoan();
                        $FixedLoan->fixed_add =  $FixedAdd->id;
                        $FixedLoan->fixed_assets_id =  $FixedAssets->id;
                        $FixedLoan->fixed_accessories_id =  null;
                        $FixedLoan->amount_damaged =  0;
                        $FixedLoan->amount =  0;
                        $FixedLoan->amount_provition =  $element->request_amount;
                        $FixedLoan->save();
                    }
                } else {
                    $elements = json_decode($request->fixed_accessories_id);
                    foreach ($elements as $element) {
                        $FixedAccessories = FixedAccessories::find($element->fixed_accessories_id);
                        $FixedAccessories->actual_amount = $FixedAccessories->actual_amount - $element->amount;
                        $FixedAccessories->save();

                        $FixedLoan = new FixedLoan();
                        $FixedLoan->fixed_add =  $FixedAdd->id;
                        $FixedLoan->fixed_accessories_id =  $FixedAccessories->id;
                        $FixedLoan->fixed_assets_id =  null;
                        $FixedLoan->amount_damaged =  0;
                        $FixedLoan->amount =  0;
                        $FixedLoan->amount_provition =  $element->request_amount;
                        $FixedLoan->save();
                    }
                }
            }
            if ($request->status == "ACEPTADO") {
                $FixedAdd->request_amount = $FixedAdd->request_amount - $request->amount;
                $FixedAdd->status = $request->status;
                $FixedAdd->observation = $request->observation;
                $FixedAdd->save();

                $elements = json_decode($request->fixed_assets_id);
                foreach ($elements as $element) {
                    $FixedAssets = FixedAssets::find($element->fixed_assets_id);
                    $FixedLoan = FixedLoan::find($element->fixed_loan_id);
                    $FixedLoan->amount_damaged =  $element->amount_damaged;
                    $FixedLoan->amount =  $element->amount;
                    $FixedLoan->save();
                }

                $elements = json_decode($request->fixed_accessories_id);
                foreach ($elements as $element) {
                    $FixedAccessories = FixedAccessories::find($element->fixed_accessories_id);
                    $FixedLoan = FixedLoan::find($element->fixed_loan_id);
                    $FixedLoan->amount_damaged =  $element->amount_damaged;
                    $FixedLoan->amount =  $element->amount;
                    $FixedLoan->save();
                }
            }
        } else {
            $FixedAdd = new FixedAdd;
            $FixedAdd->request_amount = $request->amount_provition;
            $FixedAdd->status = $request->status;
            $FixedAdd->observation = '';
            $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
            $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
            $FixedAdd->responsible_user_id = $request->responsible_user_id;
            $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
            $FixedAdd->save();

            $FixedLoan = new FixedLoan;
            $FixedLoan->fixed_add_id =  $FixedAdd->id;
            $FixedLoan->fixed_assets_id =  $FixedAdd->fixed_assets_id;
            $FixedLoan->fixed_accessories_id =  $FixedAdd->fixed_accessories_id;
            $FixedLoan->amount_damaged =  0;
            $FixedLoan->amount =  0;
            $FixedLoan->amount_provition =  $request->amount_provition;
            $FixedLoan->responsible_user_id =  $request->responsible_user_id;
            $FixedLoan->save();
        }

        // fixed_type


        // $FixedAdd->amount = $FixedAdd->amount - $request->amount;
        // $FixedAdd->save();
        // $PharmacyReceptorInventory = FixedAdd::select('pharmacy_lot_stock.*')
        //     ->leftJoin('pharmacy_lot', 'pharmacy_lot_stock.pharmacy_lot_id', 'pharmacy_lot.id')->where('pharmacy_lot.pharmacy_stock_id', $request->pharmacy_stock_id)->where('pharmacy_lot_stock_id', $request->pharmacy_lot_stock_id)->first();
        // if ($PharmacyReceptorInventory) {
        //     $PharmacyReceptorInventory->amount = $PharmacyReceptorInventory->amount + $request->amount;
        //     $PharmacyReceptorInventory->save();
        // } else {
        //     $PharmacyReceptorInventory = new FixedAdd;
        //     $FixedAdd->amount = $request->amount;
        //     $FixedAdd->fixed_add_id = $request->fixed_add_id;
        //     $FixedAdd->fixed_loan_id = $request->fixed_loan_id;
        //     $PharmacyReceptorInventory->save();
        // }

        return response()->json([
            'status' => true,
            'message' => 'Inventario activos actualizado exitosamente',
            'data' => ['fixed_loan' => $FixedAdd]
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
            $FixedAdd = FixedAdd::find($id);
            $FixedAdd->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociados act. fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociados act. fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
