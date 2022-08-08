<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAssets;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FixedAssetsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class FixedAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAssets = FixedAssets::with('fixed_clasification', 'campus', 'fixed_nom_product');

        if ($request->_sort) {
            $FixedAssets->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $FixedAssets->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->actual_amount) {
            $FixedAssets->where('fixed_assets.actual_amount', $request->actual_amount);
        }
        if ($request->fixed_stock_id) {
            $FixedAssets->where('fixed_assets.fixed_stock_id', $request->fixed_stock_id);
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAssets = $FixedAssets->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAssets = $FixedAssets->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenidos exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFixedByUserId(Request $request, int $id): JsonResponse
    {
        $parmacy = FixedAssets::select('fixed_stock.*')
            ->leftJoin('fixed_assets', 'fixed_stock.id', '=', 'fixed_assets.fixed_stock_id')
            ->leftJoin('users_fixed_stock', 'fixed_stock.id', '=', 'users_fixed_stock.fixed_stock_id')
            ->where('users_fixed_stock.user_id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'lotes por usuario obtenidas exitosamente',
            'data' => ['fixed_assets' => $parmacy]
        ]);
    }

    public function store(FixedAssetsRequest $request): JsonResponse
    {
        $FixedAssets = new FixedAssets;
        $FixedAssets->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedAssets->fixed_type_id = $request->fixed_type_id;
        $FixedAssets->fixed_property_id = $request->fixed_property_id;
        $FixedAssets->obs_property = $request->obs_property;
        $FixedAssets->plaque = $request->plaque;
        $FixedAssets->company_id = $request->company_id;
        $FixedAssets->campus_id = $request->campus_id;
        $FixedAssets->status = $request->status;
        $FixedAssets->amount_total = $request->amount_total;
        $FixedAssets->actual_amount = $request->actual_amount;
        $FixedAssets->model = $request->model;
        $FixedAssets->mark = $request->mark;
        $FixedAssets->serial = $request->serial;
        $FixedAssets->fixed_nom_product_id = $request->fixed_nom_product_id;
        $FixedAssets->detail_description = $request->detail_description;
        $FixedAssets->color = $request->color;
        $FixedAssets->fixed_condition_id = $request->fixed_condition_id;

        $FixedAssets->calibration_certificate = $request->calibration_certificate;
        $FixedAssets->health_register = $request->health_register;
        $FixedAssets->warranty = $request->warranty;
        $FixedAssets->cv = $request->cv;
        $FixedAssets->last_maintenance = $request->last_maintenance;
        $FixedAssets->last_pame = $request->last_pame;
        $FixedAssets->interventions_carriet = $request->interventions_carriet;
        $FixedAssets->type = $request->type;
        $FixedAssets->mobile_fixed = $request->mobile_fixed;
        $FixedAssets->clasification_risk_id = $request->clasification_risk_id;
        $FixedAssets->biomedical_classification_id = $request->biomedical_classification_id;
        $FixedAssets->code_ecri = $request->code_ecri;
        $FixedAssets->form_acquisition = $request->form_acquisition;
        $FixedAssets->date_adquisicion = $request->date_adquisicion;
        $FixedAssets->date_warranty = $request->date_warranty;
        $FixedAssets->useful_life = $request->useful_life;
        $FixedAssets->cost = $request->cost;
        $FixedAssets->maker = $request->maker;
        $FixedAssets->phone_maker = $request->phone_maker;
        $FixedAssets->email_maker = $request->email_maker;
        $FixedAssets->power_supply = $request->power_supply;
        $FixedAssets->predominant_technology = $request->predominant_technology;
        $FixedAssets->volt = $request->volt;
        $FixedAssets->stream = $request->stream;
        $FixedAssets->power = $request->power;
        $FixedAssets->frequency_rank = $request->frequency_rank;
        $FixedAssets->temperature_rank = $request->temperature_rank;
        $FixedAssets->humidity_rank = $request->humidity_rank;
        $FixedAssets->manuals = $request->manuals;
        $FixedAssets->guide = $request->guide;
        $FixedAssets->periodicity_frequency_id = $request->periodicity_frequency_id;
        $FixedAssets->calibration_frequency_id = $request->calibration_frequency_id;
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos creado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets->toArray()]
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
        $FixedAssets = FixedAssets::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos obtenido exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FixedAssetsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FixedAssetsRequest $request, int $id): JsonResponse
    {
        $FixedAssets = FixedAssets::find($id);
        $FixedAssets->fixed_clasification_id = $request->fixed_clasification_id;
        $FixedAssets->fixed_type_id = $request->fixed_type_id;
        $FixedAssets->fixed_property_id = $request->fixed_property_id;
        $FixedAssets->obs_property = $request->obs_property;
        $FixedAssets->plaque = $request->plaque;
        $FixedAssets->campus_id = $request->campus_id;
        $FixedAssets->status = $request->status;
        $FixedAssets->amount_total = $request->amount_total;
        $FixedAssets->actual_amount = $request->actual_amount;
        $FixedAssets->company_id = $request->company_id;
        $FixedAssets->model = $request->model;
        $FixedAssets->mark = $request->mark;
        $FixedAssets->serial = $request->serial;
        $FixedAssets->fixed_nom_product_id = $request->fixed_nom_product_id;
        $FixedAssets->detail_description = $request->detail_description;
        $FixedAssets->color = $request->color;
        $FixedAssets->fixed_condition_id = $request->fixed_condition_id;
        $FixedAssets->calibration_certificate = $request->calibration_certificate;
        $FixedAssets->health_register = $request->health_register;
        $FixedAssets->warranty = $request->warranty;
        $FixedAssets->cv = $request->cv;
        $FixedAssets->last_maintenance = $request->last_maintenance;
        $FixedAssets->last_pame = $request->last_pame;
        $FixedAssets->interventions_carriet = $request->interventions_carriet;
        $FixedAssets->type = $request->type;
        $FixedAssets->mobile_fixed = $request->mobile_fixed;
        $FixedAssets->clasification_risk_id = $request->clasification_risk_id;
        $FixedAssets->biomedical_classification_id = $request->biomedical_classification_id;
        $FixedAssets->code_ecri = $request->code_ecri;
        $FixedAssets->form_acquisition = $request->form_acquisition;
        $FixedAssets->date_adquisicion = $request->date_adquisicion;
        $FixedAssets->date_warranty = $request->date_warranty;
        $FixedAssets->useful_life = $request->useful_life;
        $FixedAssets->cost = $request->cost;
        $FixedAssets->maker = $request->maker;
        $FixedAssets->phone_maker = $request->phone_maker;
        $FixedAssets->email_maker = $request->email_maker;
        $FixedAssets->power_supply = $request->power_supply;
        $FixedAssets->predominant_technology = $request->predominant_technology;
        $FixedAssets->volt = $request->volt;
        $FixedAssets->stream = $request->stream;
        $FixedAssets->power = $request->power;
        $FixedAssets->frequency_rank = $request->frequency_rank;
        $FixedAssets->temperature_rank = $request->temperature_rank;
        $FixedAssets->humidity_rank = $request->humidity_rank;
        $FixedAssets->manuals = $request->manuals;
        $FixedAssets->guide = $request->guide;
        $FixedAssets->periodicity_frequency_id = $request->periodicity_frequency_id;
        $FixedAssets->calibration_frequency_id = $request->calibration_frequency_id;
        $FixedAssets->save();

        return response()->json([
            'status' => true,
            'message' => 'Activos Fijos actualizado exitosamente',
            'data' => ['fixed_assets' => $FixedAssets]
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
            $FixedAssets = FixedAssets::find($id);
            $FixedAssets->delete();

            return response()->json([
                'status' => true,
                'message' => 'Activos Fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Activos Fijos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
