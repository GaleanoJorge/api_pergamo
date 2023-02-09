<?php

namespace App\Http\Controllers\Management;

use App\Models\SourceRetention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SourceRetentionRequest;
use App\Models\AccountReceivable;
use App\Models\MunicipalityIca;
use App\Models\TaxValueUnit;
use App\Models\UserCampus;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SourceRetentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SourceRetention = SourceRetention::select()
            ->with('account_receivable', 'source_retention_type', 'source_retention_type.tax_value_unit');

        if ($request->_sort) {
            $SourceRetention->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SourceRetention->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->account_receivable_id) {
            $SourceRetention->where('account_receivable_id', $request->account_receivable_id);
        }

        if ($request->query("pagination", true) == "false") {
            $SourceRetention = $SourceRetention->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SourceRetention = $SourceRetention->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenidos exitosamente',
            'data' => ['source_retention' => $SourceRetention]
        ]);
    }

    /**
     * Get the retention source by account receivable id.
     * 
     * @param Request $request
     * @param int $account_receivable_id
     * @return JsonResponse
     */
    public function getByAccountReceivableId(Request $request, int $account_receivable_id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::with('user', 'status_bill', 'minimum_salary')
            ->where('account_receivable.id', $account_receivable_id)
            ->select('account_receivable.*', DB::raw('IF(source_retention.id,1,0) as has_retention'))
            ->LeftJoin('source_retention', 'source_retention.account_receivable_id', '=', 'account_receivable.id')
            ->groupBy('account_receivable.id')
            ->first()
            ->toArray();
        $UserCampus = UserCampus::select()
            ->with('campus', 'campus.region', 'campus.municipality')
            ->where('user_id', $AccountReceivable['user_id'])->first()->toArray();
        $ReteicaValue = 0;
        $MuniciipalityIca = MunicipalityIca::select()
            ->where('municipality_id', $UserCampus['campus']['municipality_id'])
            ->where('year', Carbon::parse($AccountReceivable['created_at'])->year)->first();
        if ($MuniciipalityIca) {
            $ReteicaValue = $MuniciipalityIca->value;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No existe retención en la fuente para el municipio seleccionado y/o año en curso',
                'data' => [
                    'source_retention' => [],
                ]
            ]); 
        }
        $SourceRetention = SourceRetention::select()
            ->with('account_receivable', 'source_retention_type', 'source_retention_type.tax_value_unit')
            ->where('account_receivable_id', $account_receivable_id)->get()->toArray();
        $TaxValueUnit = TaxValueUnit::select()->where('year', Carbon::parse($AccountReceivable['created_at'])->year)->first();
        if (!$TaxValueUnit) {
            return response()->json([
                'status' => false,
                'message' => 'No existe unidad de valor tributario para el año seleccionado',
                'data' => [
                    'source_retention' => [],
                ]
            ]);
        }
        $tax_value_unit = $TaxValueUnit->value;
        $salud = 0;
        $arl = 0;
        $pension = 0;
        $ingresos_no_constitutivos = 0;
        $sub_total_1 = 0;
        $deduc1 = 0;
        $deduc2 = 0;
        $deduc3 = 0;
        $total_deduc = 0;
        $sub_total_2 = 0;
        $rent1 = 0;
        $rent2 = 0;
        $rent3 = 0;
        $total_renta = 0;
        $sub_total_3 = 0;
        $Renta_de_Trabajo_Exenta = 0;
        $sub_total_4 = 0;
        $Cifra_control1 = 0;
        $Cifra_control2 = 0;
        $Cifra_control3 = 0;
        $Ingreso_Base = 0;
        $Ingreso_laboral_gravado_en_UVT = 0;
        $Retencion_por_aplicar = 0;
        $Rete_ica = 0;


        if ($AccountReceivable['gross_value_activities'] >= $AccountReceivable['minimum_salary']['value']) {
            $salud = $AccountReceivable['gross_value_activities'] * 0.04;
            $arl = $AccountReceivable['gross_value_activities'] * 0.01;
            $pension = $AccountReceivable['gross_value_activities'] * 0.04;
        }
        $ingresos_no_constitutivos = $salud + $arl + $pension;
        $sub_total_1 = $AccountReceivable['gross_value_activities'] - (round(( $salud + $arl + $pension) / 1000) * 1000);

        foreach ($SourceRetention as $element) {
            $limit = round(($element['source_retention_type']['tax_value_unit']['value'] * $element['source_retention_type']['value']) / 1000) * 1000;
            if ($element['source_retention_type_id'] == 1) {
                if ($element['value'] <= $limit) {
                    $deduc1 = $element['value'];
                } else {
                    $deduc1 = $limit;
                }
            } else if ($element['source_retention_type_id'] == 2) {
                if ($element['value'] <= $limit) {
                    $deduc2 = $element['value'];
                } else {
                    $deduc2 = $limit;
                }
            } else if ($element['source_retention_type_id'] == 3) {
                if ($element['value'] <= $limit) {
                    $deduc3 = $element['value'];
                } else {
                    $deduc3 = $limit;
                }
            } else if ($element['source_retention_type_id'] == 4) {
                if ($element['value'] <= $limit) {
                    $rent1 = $element['value'];
                } else {
                    $rent1 = $limit;
                }
            } else if ($element['source_retention_type_id'] == 5) {
                if ($element['value'] <= $limit) {
                    $rent2 = $element['value'];
                } else {
                    $rent2 = $limit;
                }
            } else if ($element['source_retention_type_id'] == 6) {
                $rent3 = $element['value'];
            }
        }
        $total_deduc = $deduc1 + $deduc2 + $deduc3;
        $sub_total_2 = $sub_total_1 - $total_deduc;
        $total_renta = $rent1 + $rent2 + $rent3;
        $sub_total_3 = $sub_total_2 - $total_renta;
        $max_renta_excenta = round(($tax_value_unit * 240) / 1000) * 1000;
        $renta_provicional = round(($sub_total_3 * 0.25) / 1000) * 1000;
        $Renta_de_Trabajo_Exenta = $renta_provicional >= $max_renta_excenta ? $max_renta_excenta : $renta_provicional;
        $sub_total_4 = $sub_total_3 - $Renta_de_Trabajo_Exenta;
        $Cifra_control1 = round(($sub_total_1 * 0.4) / 1000) * 1000;
        $Cifra_control2 = $Renta_de_Trabajo_Exenta + $total_renta + $total_deduc;
        $Cifra_control3 = round(($tax_value_unit * 420) / 1000) * 1000;
        $array_cifras = array($Cifra_control1, $Cifra_control2, $Cifra_control3);
        $min_cifra = min($array_cifras);
        $Ingreso_Base = $sub_total_1 - $min_cifra;
        $Ingreso_laboral_gravado_en_UVT = round(($Ingreso_Base / $tax_value_unit) * 100) / 100;
        $sub_response = 0;
        if ($Ingreso_laboral_gravado_en_UVT <= 95) {
            $sub_response = 0;
        } else if ($Ingreso_laboral_gravado_en_UVT > 95 && $Ingreso_laboral_gravado_en_UVT <= 150) {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 95) * 0.19 * $tax_value_unit;
        } else if ($Ingreso_laboral_gravado_en_UVT > 150 && $Ingreso_laboral_gravado_en_UVT <= 360) {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 150) * 0.28 * $tax_value_unit;
        } else if ($Ingreso_laboral_gravado_en_UVT > 360 && $Ingreso_laboral_gravado_en_UVT <= 640) {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 360) * 0.33 * $tax_value_unit;
        } else if ($Ingreso_laboral_gravado_en_UVT > 640 && $Ingreso_laboral_gravado_en_UVT <= 945) {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 640) * 0.35 * $tax_value_unit;
        } else if ($Ingreso_laboral_gravado_en_UVT > 945 && $Ingreso_laboral_gravado_en_UVT <= 2300) {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 945) * 0.37 * $tax_value_unit;
        } else {
            $sub_response = ($Ingreso_laboral_gravado_en_UVT - 2300) * 0.39 * $tax_value_unit;
        }
        $Retencion_por_aplicar = round(($sub_response) / 1000) * 1000;

        $Rete_ica = $AccountReceivable['gross_value_activities'] > 142000 ? round((($AccountReceivable['gross_value_activities'] - $Retencion_por_aplicar) / 1000) * $ReteicaValue) : 0;

        $response = array(
            'gross_value_activities' => $AccountReceivable['gross_value_activities'],
            'salud' => $salud,
            'arl' => $arl,
            'pension' => $pension,
            'ingresos_no_constitutivos' => $ingresos_no_constitutivos,
            'sub_total_1' => $sub_total_1,
            'deduc1' => $deduc1,
            'deduc2' => $deduc2,
            'deduc3' => $deduc3,
            'total_deduc' => $total_deduc,
            'sub_total_2' => $sub_total_2,
            'rent1' => $rent1,
            'rent2' => $rent2,
            'rent3' => $rent3,
            'total_renta' => $total_renta,
            'sub_total_3' => $sub_total_3,
            'Renta_de_Trabajo_Exenta' => $Renta_de_Trabajo_Exenta,
            'sub_total_4' => $sub_total_4,
            'Cifra_control1' => $Cifra_control1,
            'Cifra_control2' => $Cifra_control2,
            'Cifra_control3' => $Cifra_control3,
            'Ingreso_Base' => $Ingreso_Base,
            'Ingreso_laboral_gravado_en_UVT' => $Ingreso_laboral_gravado_en_UVT,
            'Retencion_por_aplicar' => $Retencion_por_aplicar,
            'Rete_ica' => $Rete_ica,
        );

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenidos exitosamente',
            'data' => [
                'source_retention' => $response,
            ]
        ]);
    }

    public function store(SourceRetentionRequest $request): JsonResponse
    {
        $components = json_decode($request->source_retention_type_id);
        $i = 0;
        foreach ($components as $conponent) {
            $indicator = 'file_' . $i;
            $SourceRetention = new SourceRetention;
            $SourceRetention->value = $conponent->amount;
            $SourceRetention->account_receivable_id = $request->account_receivable_id;
            $SourceRetention->source_retention_type_id = $conponent->source_retention_type_id;
            if ($request->file($indicator)) {
                $path = Storage::disk('public')->put('source_retention', $request->file($indicator));
                $SourceRetention->file = $path;
            }
            $SourceRetention->save();
            $i++;
        }

        $AR = AccountReceivable::find($request->account_receivable_id);
        if($AR->status_bill_id == 5) {
            $AR->status_bill_id = 6;
            $AR->save();
        } 

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente creado exitosamente',
            'data' => ['source_retention' => $SourceRetention->toArray()]
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
        $SourceRetention = SourceRetention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenido exitosamente',
            'data' => ['source_retention' => $SourceRetention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SourceRetentionRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SourceRetentionRequest $request, int $id): JsonResponse
    {
        $SourceRetention = SourceRetention::find($id);
        $SourceRetention->file = $request->file;
        $SourceRetention->value = $request->value;
        $SourceRetention->account_receivable_id = $request->account_receivable_id;
        $SourceRetention->source_retention_type_id = $request->source_retention_type_id;

        $SourceRetention->save();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente actualizado exitosamente',
            'data' => ['source_retention' => $SourceRetention]
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
            $SourceRetention = SourceRetention::find($id);
            $SourceRetention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Retención en la fuente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Retención en la fuente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
