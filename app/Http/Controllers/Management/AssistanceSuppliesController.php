<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistanceSupplies;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceSuppliesRequest;
use App\Models\Authorization;
use App\Models\ChRecord;
use App\Models\ManagementPlan;
use App\Models\PharmacyProductRequest;
use App\Models\Product;
use App\Models\ProductGeneric;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class AssistanceSuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $AssistanceSupplies = AssistanceSupplies::select('assistance_supplies.*')
            ->with(
                'users',
                'pharmacy_product_request',
                'pharmacy_product_request.management_plan',
                'pharmacy_product_request.product_generic',
                'pharmacy_product_request.product_supplies',
                'pharmacy_product_request.own_pharmacy_stock',
                'pharmacy_product_request.own_pharmacy_stock.campus',
                'pharmacy_product_request.request_pharmacy_stock',
                'pharmacy_product_request.request_pharmacy_stock.campus',
                'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock',
                'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
            )
            ->leftjoin('pharmacy_product_request', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->leftjoin('product_generic', 'pharmacy_product_request.product_generic_id', 'product_generic.id');


        if ($request->user_id) {
            $AssistanceSupplies->where('user_incharge_id', $request->user);
        }

        if ($request->status) {
            $AssistanceSupplies->where('supplies_status_id', $request->status);
        }

        // if ($request->patient) {
        //     $AssistanceSupplies->where('supplies_status_id', $request->status);
        // }


        if ($request->_sort) {
            $AssistanceSupplies->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $AssistanceSupplies->where(function ($query) use ($request) {
                $query->where('identification', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlefirstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('middlelastname', 'like', '%' . $request->search . '%')
                    ->orWhere('auth_number', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $AssistanceSupplies = $AssistanceSupplies->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AssistanceSupplies = $AssistanceSupplies->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Suministros del assistencial asociados exitosamente',
            'data' => ['assistance_supplies' => $AssistanceSupplies]
        ]);
    }

    public function applicatedByAssigned(Request $request): JsonResponse
    {

        if ($request->ch_record ) {
            
            $ch_record = ChRecord::find($request->ch_record);
            if($request->pharmacy_product_request_id){
                $pharmacy_product_request_id = $request->pharmacy_product_request_id;
            }else {
                $pharmacy = PharmacyProductRequest::select('pharmacy_product_request.*')
                ->leftJoin('management_plan', 'management_plan.id', 'pharmacy_product_request.management_plan_id')
                ->leftJoin('assigned_management_plan', 'assigned_management_plan.management_plan_id', 'management_plan.id')
                ->leftJoin('ch_record', 'ch_record.assigned_management_plan_id', 'assigned_management_plan.id')
                ->where('ch_record.id', $request->ch_record)->first();
                $pharmacy_product_request_id =  $pharmacy->id;
            }

            $applicated = AssistanceSupplies::select('assistance_supplies.*')
                ->where('supplies_status_id', 2)
                ->where('pharmacy_product_request_id', $pharmacy_product_request_id)->get()->toArray();

            $product = AssistanceSupplies::select('assistance_supplies.*')
                ->leftjoin('pharmacy_product_request', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
                ->leftjoin('product_generic', 'pharmacy_product_request.product_generic_id', 'product_generic.id')
                ->where('pharmacy_product_request.id', $pharmacy_product_request_id)
                ->with(
                    'pharmacy_product_request',
                    'pharmacy_product_request.management_plan',
                    'pharmacy_product_request.services_briefcase.manual_price.product.drug_concentration',
                    'pharmacy_product_request.services_briefcase.manual_price.product.multidose_concentration',
                    'pharmacy_product_request.services_briefcase.manual_price.product.measurement_units',
                )->first();

            if(!$product){
                return response()->json([
                    'status' => false,
                    'message' => 'Sin medicamentos despachados. Contacte con farmacia',
                ]);
            }


            $applicatedCount = 0;

            foreach ($applicated as $item) {

                $compare = ChRecord::find($item['ch_record_id']);
                if ($ch_record->assigned_management_plan_id == $compare->assigned_management_plan_id) {
                    $applicatedCount++;
                }
            }

            $dose = $product->pharmacy_product_request->services_briefcase->manual_price->product->product_dose_id == 2 ? 1 : floatval($product->pharmacy_product_request->services_briefcase->manual_price->product->drug_concentration->value);
            $appli = $product->pharmacy_product_request->services_briefcase->manual_price->product->product_dose_id == 2 ? $product->pharmacy_product_request->management_plan->dosage_administer - ($dose * $applicatedCount) 
                : ceil(($product->pharmacy_product_request->management_plan->dosage_administer - ($dose * $applicatedCount))/ $dose);

            // var_dump($appli);

            // $administer = $dose*$applicatedCount;
            // var_dump($applicatedCount);
            // $management_dose = (float) $product->dosage_administer;


            // $appli = $management_dose > $administer ? ceil($management_dose - $administer) : 0;
        }


        // $AssistanceSupplies = AssistanceSupplies::select('assistance_supplies.*')
        // ->with(
        //     'users',
        //     'pharmacy_product_request',
        //     'pharmacy_product_request.management_plan',
        //     'pharmacy_product_request.product_generic',
        //     'pharmacy_product_request.product_supplies',
        //     'pharmacy_product_request.own_pharmacy_stock',
        //     'pharmacy_product_request.own_pharmacy_stock.campus',
        //     'pharmacy_product_request.request_pharmacy_stock',
        //     'pharmacy_product_request.request_pharmacy_stock.campus',
        //     'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock',
        //     'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
        //     'pharmacy_product_request.pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
        // )
        // ->leftjoin('pharmacy_product_request', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')
        // ->leftjoin('product_generic', 'pharmacy_product_request.product_generic_id', 'product_generic.id')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Suministros del assistencial asociados exitosamente',
            'data' => [
                ['assistance_supplies' => $appli < 0 ? 0 : $appli,
                'type' => $product->pharmacy_product_request->services_briefcase->manual_price->product->product_dose_id,
                'product' => $product
                ]
                ]
        ]);
    }


    public function store(AssistanceSuppliesRequest $request)
    {
        $AssistanceSupplies = new AssistanceSupplies;
        $AssistanceSupplies->user_incharge_id = $request->user_incharge_id;
        $AssistanceSupplies->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $AssistanceSupplies->ch_record_id = $request->ch_record_id;
        $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
        $AssistanceSupplies->observation = $request->observation;
        $AssistanceSupplies->save();

        return response()->json([
            'status' => true,
            'message' => 'Suministros creados exitosamente',
            'data' => ['assistance_supplies' => $AssistanceSupplies->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $AssistanceSupplies = AssistanceSupplies::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Suministros obtenidos exitosamente',
            'data' => ['assistance_supplies' => $AssistanceSupplies]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssistanceSuppliesRequest $request, int $PharmacyProductRequest_id): JsonResponse
    {

        global $aplicated;
        $aplicated = 0;

        $supplies = AssistanceSupplies::select('assistance_supplies.*')
            ->where('supplies_status_id', 1)
            ->where('pharmacy_product_request_id', $PharmacyProductRequest_id)->get()->toArray();

        if (sizeof($supplies) > 0) {
            // $supplies->first();
            if ($request->supplies_status_id == 2) {
                //cproducto o insumo
                $PharmacyProductRequest = PharmacyProductRequest::select('pharmacy_product_request.*', 'manual_price.supplies_id AS supplies_id', 'manual_price.product_id AS product_id')
                    ->leftjoin('services_briefcase', 'pharmacy_product_request.services_briefcase_id', 'services_briefcase.id')
                    ->leftjoin('manual_price', 'services_briefcase.manual_price_id', 'manual_price.id')
                    ->with(
                        'services_briefcase.manual_price'
                        )
                    ->where('pharmacy_product_request.id', $PharmacyProductRequest_id)
                    ->get()->toArray();

                $ch_record = ChRecord::find($request->ch_record_id);

                if ($PharmacyProductRequest[0]['product_id'] != null) {

                    $applicated = AssistanceSupplies::select('assistance_supplies.*')
                        ->where('supplies_status_id', 2)
                        ->where('pharmacy_product_request_id', $PharmacyProductRequest_id)->get()->toArray();

                    $product =  Product::select('product.*', 'product_concentration.value AS value')
                        ->leftjoin('product_generic', 'product.product_generic_id', 'product_generic.id')
                        ->leftjoin('product_concentration', 'product_generic.drug_concentration_id', 'product_concentration.id')
                        ->where('product.id', $request->product_comercial)
                        ->with(
                            'product_generic'
                        )->get()->toArray();

                    $management_plan = ManagementPlan::select('management_plan.*', 'management_plan.dosage_administer AS dosage_administer')
                        ->leftjoin('assigned_management_plan', 'management_plan.id', 'assigned_management_plan.management_plan_id')
                        ->leftjoin('ch_record', 'assigned_management_plan.id', 'ch_record.assigned_management_plan_id')
                        ->where('ch_record.id', $request->ch_record_id)->get()->toArray();

                    $product_dose = $product[0]['product_generic']['product_dose_id'] == 2 ? 1 : (float) $product[0]['value'];
                    $management_plan_dose = floatval($management_plan[0]['dosage_administer']);

                    $aplicated = 0;

                    foreach ($applicated as $item) {
                        $compare = ChRecord::find($item['ch_record_id']);
                        if ($ch_record->assigned_management_plan_id == $compare->assigned_management_plan_id) {
                            $aplicated++;
                        }
                    }

                    $value = $product[0]['product_generic']['product_dose_id'] == 2 ? $aplicated :  $product_dose * $aplicated;

                    // var_dump($product_dose);
                    if ($value >= $management_plan_dose) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Ya cuenta con aplicación',
                        ]);
                    } else if ($request->quantity) {
                        // $min_border = 
                        $center = $request->quantity * $product_dose + $value;
                        $validator = $center == $management_plan_dose ? true
                            : ($center <= $management_plan_dose ? true
                                : ($center - $product_dose < $management_plan_dose ? true
                                    : false));

                        if (!$validator) {
                            return response()->json([
                                'status' => false,
                                'message' => 'Cantidad invalida',
                            ]);
                        }

                        // $search_auth = Authorization::select('authorization.*')
                        //     ->where()

                        $auth = new Authorization;

                        $auth->services_briefcase_id = $PharmacyProductRequest[0]['services_briefcase_id'];
                        $auth->assigned_management_plan_id = $ch_record->assigned_management_plan_id;
                        $auth->admissions_id = $ch_record->admissions_id;
                        $auth->auth_status_id = 3;
                        // $auth->application_id = $AssistanceSupplies->id;
                        $auth->product_com_id =  $request->product_comercial;
                        $auth->supplies_com_id = $request->insume_comercial;

                        $auth->save();

                        $supplies = AssistanceSupplies::select('assistance_supplies.*')
                            ->where('supplies_status_id', 1)
                            ->where('pharmacy_product_request_id', $PharmacyProductRequest_id)->get();

                        $counter = 0;

                        foreach ($supplies as $item) {
                            $AssistanceSupplies = AssistanceSupplies::find($item->id);

                            $AssistanceSupplies->observation = $request->observation;
                            $AssistanceSupplies->application_hour = $request->clock;
                            $AssistanceSupplies->ch_record_id = $request->ch_record_id;
                            $AssistanceSupplies->authorization_id =  $auth->id;
                            $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
                            $AssistanceSupplies->user_incharge_id = $request->user_incharge_id;

                            $AssistanceSupplies->save();

                            $counter++;

                            if ($request->quantity == $counter) {
                                break;
                            }

                            // $request->quantity > $counter ? $counter++ : break;
                        }

                        $auth->application_id = $AssistanceSupplies->id;
                        $auth->quantity = $counter;

                        $auth->save();
                    } else {

                        $AssistanceSupplies = AssistanceSupplies::find($supplies[0]['id']);

                        $AssistanceSupplies->observation = $request->observation;
                        $AssistanceSupplies->application_hour = $request->clock;
                        $AssistanceSupplies->ch_record_id = $request->ch_record_id;
                        $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
                        $AssistanceSupplies->user_incharge_id = $request->user_incharge_id;

                        $auth = new Authorization;

                        $auth->services_briefcase_id = $PharmacyProductRequest[0]['services_briefcase_id'];
                        $auth->ch_interconsultation_id = $ch_record->ch_interconsultation_id;
                        $auth->assigned_management_plan_id = $ch_record->assigned_management_plan_id;
                        $auth->admissions_id = $ch_record->admissions_id;
                        $auth->auth_status_id = 3;
                        $auth->application_id = $AssistanceSupplies->id;
                        $auth->product_com_id =  $request->product_comercial;
                        $auth->supplies_com_id = $request->insume_comercial;

                        $auth->save();

                        $AssistanceSupplies->save();
                    }
                    



                    return response()->json([
                        'status' => true,
                        'message' => 'Producto aplicado exitosamente',
                        'data' => ['assistance_supplies' => $AssistanceSupplies]
                    ]);
                } else {

                    $AssistanceSupplies = AssistanceSupplies::find($supplies[0]['id']);

                    $AssistanceSupplies->observation = $request->observation;
                    $time = time();

                    $AssistanceSupplies->application_hour = date("H:i:s", $time);
                    $AssistanceSupplies->ch_record_id = $request->ch_record_id;
                    $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
                    $AssistanceSupplies->user_incharge_id = Auth::user()->id;

                    if($PharmacyProductRequest[0]['services_briefcase']['manual_price']['has_auth'] == 1){
                        $auth = new Authorization;
    
                        $auth->services_briefcase_id = $PharmacyProductRequest[0]['services_briefcase_id'];
                        $auth->ch_interconsultation_id = $ch_record->ch_interconsultation_id;
                        $auth->assigned_management_plan_id = $ch_record->assigned_management_plan_id;
                        $auth->admissions_id = $PharmacyProductRequest[0]['admissions_id'];
                        $auth->auth_status_id = 3;
                        $auth->application_id = $AssistanceSupplies->id;
                        $auth->product_com_id = $request->product_comercial;
                        $auth->supplies_com_id = $request->insume_comercial;
    
                        $auth->save();

                        $AssistanceSupplies->authorization_id = $auth->id;
                    }



                    $AssistanceSupplies->save();

                    return response()->json([
                        'status' => true,
                        'message' => 'Insumo usado exitosamente',
                        'data' => ['assistance_supplies' => $AssistanceSupplies]
                    ]);
                }
            } else if ($request->supplies_status_id == 3) {
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Acción invalida',
            ]);
        }


        // if ($request->supplies_status_id == 2) {
        // } else if ($request->supplies_status_id == 3) {
        //     $supplies = AssistanceSupplies::select('assistance_supplies.*')
        //         ->where('supplies_status_id', 1)
        //         ->where('pharmacy_product_request_id', $PharmacyProductRequest_id);
        //     if ($supplies->count() > 0) {

        //         $supplies->first();

        //         $AssistanceSupplies =  AssistanceSupplies::find($supplies->id);

        //         $AssistanceSupplies->ch_record_id = $request->ch_record_id;
        //         $AssistanceSupplies->user_incharge_id = Auth::user()->id;
        //         $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
        //         $AssistanceSupplies->application_hour = $request->clock;
        //         $AssistanceSupplies->observation = $request->observation;

        //         $AssistanceSupplies->save();

        //         return response()->json([
        //             'status' => true,
        //             'message' => 'Suministros reportado como dañado exitosamente',
        //             'data' => ['assistance_supplies' => $AssistanceSupplies]
        //         ]);
        //     }
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Acción invalida',
        //         // 'data' => ['assistance_supplies' => $AssistanceSupplies]
        //     ]);
        // }
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
            $AssistanceSupplies = AssistanceSupplies::find($id);
            $AssistanceSupplies->delete();

            return response()->json([
                'status' => true,
                'message' => 'Suministro eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Suministro en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
