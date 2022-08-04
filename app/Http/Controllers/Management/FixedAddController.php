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
                'fixed_assets.fixed_type',
                'fixed_assets.fixed_clasification',
                'fixed_location_campus',
                'fixed_location_campus.campus',
                'fixed_location_campus.flat',
                'responsible_user',
                'responsible_user.user',
                'fixed_accessories',
                'fixed_accessories.fixed_type',
                'fixed_nom_product',
                'admissions',
                'admissions.patients',
            )
            // ->select('fixed_add.*', DB::raw('SUM(fixed_loan.amount_provition) AS cantidad_enviada'))
            // ->leftJoin('fixed_loan', 'fixed_loan.fixed_add_id', 'fixed_add.id')
            // ->groupBy('fixed_add.id')
        ;


        if ($request->_sort) {
            $FixedAdd->orderBy($request->_sort, $request->_order);
        }
        if ($request->user_role_id) {
            $FixedAdd->where('fixed_add.user_role_id', $request->user_role_id);
        }

        if ($request->fixed_assets_id) {
            $FixedAdd->where('fixed_add.fixed_assets_id', $request->fixed_assets_id);
        }

        if ($request->fixed_nom_product_id) {
            $FixedAdd->where('fixed_add.fixed_nom_product_id', $request->fixed_nom_product_id);
        }
        if ($request->fixed_accessories_id) {
            $FixedAdd->where('fixed_add.fixed_accessories_id', $request->fixed_accessories_id);
        }

        if ($request->cantidad) {
            $FixedAdd->where(function ($query) use ($request) {
                if ($request->cantidad == 0) {
                    $query->where('fixed_loan.amount_provition', '>', 0);
                }
            });
        }

        if ($request->insum == "true") {
            $FixedAdd->whereNotNull('fixed_nom_product_id')->whereNull('fixed_accessories_id');
        } else if ($request->insum == "false") {
            $FixedAdd->whereNull('fixed_nom_product_id')->whereNotNull('fixed_accessories_id');
        }

        if ($request->status) {
            $FixedAdd->where('fixed_add.status', $request->status);
        }
        if ($request->user_role_id) {
            $FixedAdd->where('fixed_add.responsible_user_id', $request->user_role_id);
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
            'message' => 'Insumo solicitado obtenidas exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $FixedAdd = new FixedAdd;
        $FixedAdd->request_amount = $request->request_amount;
        $FixedAdd->status = $request->status;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->admissions_id = $request->admissions_id;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
        $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
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
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->admissions_id = $request->admissions_id;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
        $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
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
        if ($id != -1) {
            $FixedAdd = FixedAdd::find($id);
            if ($FixedAdd) {
                if ($request->status == "ENVIADO") {
                    $FixedAdd->request_amount = $FixedAdd->request_amount - $request->amount;
                    $FixedAdd->status = $request->status;
                    $FixedAdd->save();

                    $elements = json_decode($request->fixed_assets_id);
                    foreach ($elements as $element) {
                        $FixedAssets = FixedAssets::find($element->fixed_assets_id);
                        $FixedAssets->actual_amount = $FixedAssets->actual_amount - $element->amount;
                        $FixedAssets->save();

                        $FixedLoan = new FixedLoan;
                        $FixedLoan->fixed_add_id =  $FixedAdd->id;
                        $FixedLoan->fixed_assets_id = $request->fixed_assets_id;;
                        $FixedLoan->fixed_accessories_id =  null;
                        $FixedLoan->amount_damaged =  0;
                        $FixedLoan->amount =  0;
                        $FixedLoan->amount_provition =  $element->amount;
                        $FixedLoan->save();
                    }
                    $elements = json_decode($request->fixed_accessories_id);
                    foreach ($elements as $element) {
                        $FixedAccessories = FixedAccessories::find($element->fixed_accessories_id);
                        $FixedAccessories->actual_amount = $FixedAccessories->actual_amount - $element->amount;
                        $FixedAccessories->save();

                        $FixedLoan = new FixedLoan;
                        $FixedLoan->fixed_add_id =  $FixedAdd->id;
                        $FixedLoan->fixed_accessories_id =  $FixedAccessories->id;
                        $FixedLoan->fixed_assets_id =  null;
                        $FixedLoan->amount_damaged =  0;
                        $FixedLoan->amount =  0;
                        $FixedLoan->amount_provition =  $element->amount;
                        $FixedLoan->save();
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



                        $NewPharmacyLotStock = new FixedAccessories;
                        $FixedAccessories->name = $FixedAccessories->name;
                        $FixedAccessories->amount = $FixedAccessories->amount;
                        $FixedAccessories->actual_amount = $element->amount;
                        $FixedAccessories->campus_id = $FixedAccessories->campus_id;
                        $FixedAccessories->fixed_type_id = $FixedAccessories->fixed_type_id;
                        $NewPharmacyLotStock->save();
                    }
                }
            }
        } else {
            $FixedAdd = new FixedAdd;
            $FixedAdd->request_amount = $request->amount_provition;
            $FixedAdd->status = $request->status;
            $FixedAdd->observation = '';
            $FixedAdd->responsible_user_id = $request->responsible_user_id;
            $FixedAdd->admissions_id = $request->admissions_id;
            $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
            $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
            $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
            $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
            $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
            $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
            $FixedAdd->save();

            // if ($request->fixed_accessories_id >= 1) {
            //     $FixedLoan = new FixedLoan;
            //     $FixedLoan->fixed_add_id =  $FixedAdd->id;
            //     $FixedLoan->fixed_assets_id =  null;
            //     $FixedLoan->fixed_accessories_id =  $request->fixed_accessories_id;
            //     $FixedLoan->amount_damaged =  0;
            //     $FixedLoan->amount =  0;
            //     $FixedLoan->amount_provition =  $request->amount_provition;
            //     $FixedLoan->save();

            //     $FixedAccessories = FixedAccessories::find($request->fixed_accessories_id);
            //     $FixedAccessories->actual_amount = $FixedAccessories->actual_amount - $request->amount_provition;
            //     $FixedAccessories->save();
            // } else {
            $FixedLoan = new FixedLoan;
            $FixedLoan->fixed_add_id =  $FixedAdd->id;
            $FixedLoan->fixed_assets_id =  $request->fixed_assets_id;
            $FixedLoan->fixed_accessories_id = null;
            $FixedLoan->amount_damaged =  0;
            $FixedLoan->amount =  0;
            $FixedLoan->amount_provition =  $request->amount_provition;
            $FixedLoan->save();

            $FixedAssets = FixedAssets::find($request->fixed_assets_id);
            $FixedAssets->actual_amount = $FixedAssets->actual_amount - $request->amount_provition;
            $FixedAssets->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'Inventario activos actualizado exitosamente',
            'data' => ['fixed_add' => $FixedAdd]
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
