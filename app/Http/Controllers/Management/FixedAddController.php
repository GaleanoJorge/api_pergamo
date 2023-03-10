<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAdd;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Authorization;
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
        $FixedAdd = FixedAdd::select('fixed_add.*')
            ->leftJoin('fixed_nom_product', 'fixed_add.fixed_nom_product_id', 'fixed_nom_product.id')
            ->leftJoin('admissions', 'fixed_add.admissions_id', 'admissions.id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->leftJoin('fixed_assets', 'fixed_add.fixed_assets_id', 'fixed_assets.id')
            ->with(
                'fixed_assets',
                'fixed_assets.fixed_type',
                'fixed_assets.fixed_clasification',
                'fixed_assets.fixed_stock',
                'fixed_location_campus',
                'fixed_location_campus.campus',
                'fixed_location_campus.flat',
                'responsible_user',
                // 'responsible_user.user',
                'fixed_accessories',
                'fixed_accessories.fixed_type',
                'fixed_nom_product',
                'admissions',
                'admissions.patients',
                'admissions.campus',
                'own_fixed_user',
                'procedure',
                'procedure.manual_price',
                'fixed_nom_product',
                'fixed_nom_product.fixed_clasification',
                'fixed_nom_product.fixed_clasification.fixed_type',
                'request_fixed_user',
                // 'request_fixed_user.campus',
            )->groupBy('fixed_add.id');

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
        if ($request->admissions) {
            $FixedAdd->where('fixed_add.admissions_id', $request->admissions);
        }
        if ($request->admissions_id) {
            $FixedAdd->where('fixed_add.admissions_id', $request->admissions_id);
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
            $FixedAdd->where(function ($query) use ($request) {
                $query->Where('fixed_nom_product.name', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.firstname', 'like', '%' . $request->search . '%');
            });
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
        if ($request->fixed_nom_product_id && $request->procedure_id) {
            $FixedAdd = new FixedAdd;
            $FixedAdd->status = $request->status;
            $FixedAdd->observation = $request->observation;
            $FixedAdd->request_amount = $request->request_amount;
            $FixedAdd->admissions_id = $request->admissions_id;
            $FixedAdd->responsible_user_id = $request->responsible_user_id;
            $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
            $FixedAdd->management_plan_id = $request->management_plan_id;
            $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
            $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
            $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
            $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
            $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
            $FixedAdd->procedure_id = $request->procedure_id;
            $FixedAdd->save();
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No se diligenciaron todos los datos',
                'data' => ['fixed_add' => []]
            ]);
        }

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
        $FixedAdd->status = $request->status;
        $FixedAdd->observation = $request->observation;
        $FixedAdd->request_amount = $request->request_amount;
        $FixedAdd->admissions_id = $request->admissions_id;
        $FixedAdd->responsible_user_id = $request->responsible_user_id;
        $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
        $FixedAdd->management_plan_id = $request->management_plan_id;
        $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
        $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
        $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
        $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
        $FixedAdd->procedure_id = $request->procedure_id;
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
                if ($request->status == "ENVIADO PATIENT") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
                    $FixedAdd->responsible_user_id = $request->responsible_user_id;

                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'PRESTADO PACIENTE';
                    $FixedAssets->save();

                    $auth = new Authorization;
                    $auth->services_briefcase_id = $FixedAdd->procedure_id;
                    $auth->admissions_id = $FixedAdd->admissions_id;
                    $auth->auth_status_id = 1;
                    $auth->fixed_add_id =  $FixedAdd->id;

                    $auth->save();
                }


                if ($request->status == "DEVUELTO PACIENTE") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'ACEPTAR PACIENTE';
                    $FixedAssets->save();
                }

                if ($request->status == "ACEPTADO PACIENTE") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'STOCK';
                    $FixedAssets->save();
                }


                if ($request->status == "DEVUELTO") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'PRESTADO';
                    $FixedAssets->save();
                }

                if ($request->status == "ENVIADO") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'PRESTADO';
                    $FixedAssets->save();
                }

                if ($request->status == "ACEPTADO") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->observation = $request->observation;
                    $FixedAdd->responsible_user_id = $request->responsible_user_id;
                    $FixedAdd->save();

                    $FixedAssets = FixedAssets::find($request->fixed_assets_id);
                    $FixedAssets->status_prod = 'STOCK';
                    $FixedAssets->save();
                }

                if ($request->status == "RECHAZADO") {
                    $FixedAdd->status = $request->status;
                    $FixedAdd->observation = $request->observation;
                    $FixedAdd->responsible_user_id = $request->responsible_user_id;
                    $FixedAdd->save();
                }
            }
        } else {
            $FixedAdd = new FixedAdd;
            $FixedAdd->status = $request->status;
            $FixedAdd->observation = $request->observation;
            $FixedAdd->request_amount = $request->request_amount;
            $FixedAdd->admissions_id = $request->admissions_id;
            $FixedAdd->responsible_user_id = $request->responsible_user_id;
            $FixedAdd->fixed_assets_id = $request->fixed_assets_id;
            $FixedAdd->management_plan_id = $request->management_plan_id;
            $FixedAdd->fixed_accessories_id = $request->fixed_accessories_id;
            $FixedAdd->fixed_nom_product_id = $request->fixed_nom_product_id;
            $FixedAdd->fixed_location_campus_id = $request->fixed_location_campus_id;
            $FixedAdd->own_fixed_user_id = $request->own_fixed_user_id;
            $FixedAdd->request_fixed_user_id = $request->request_fixed_user_id;
            $FixedAdd->procedure_id = $request->procedure_id;
            $FixedAdd->save();

            $FixedAssets = FixedAssets::find($request->fixed_assets_id);;
            $FixedAssets->status = $request->status;
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
