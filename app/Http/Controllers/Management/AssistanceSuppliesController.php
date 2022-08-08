<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistanceSupplies;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceSuppliesRequest;
use App\Models\Assistance;
use App\Models\Authorization;
use App\Models\ChRecord;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyRequestShipping;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


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
    public function update(AssistanceSuppliesRequest $request, int $id): JsonResponse
    {
        if ($request->supplies_status_id == 2) {
            $supplies = AssistanceSupplies::select('assistance_supplies.*')
                ->where('supplies_status_id', '1')
                ->where('pharmacy_product_request_id', $id)->first();
            if ($supplies->count() > 0) {

                $AssistanceSupplies =  AssistanceSupplies::find($supplies->id);

                $PharmacyProductRequest = PharmacyProductRequest::find($AssistanceSupplies->pharmacy_product_request_id);

                if ($PharmacyProductRequest->product_supplies_id) {

                    $AssistanceSupplies->ch_record_id = $request->ch_record_id;

                    $ch_record = ChRecord::find($request->ch_record_id);

                    $PharmacyProductRequest = PharmacyProductRequest::find($AssistanceSupplies->pharmacy_product_request_id);

                    $register_insume = new Authorization;

                    $register_insume->services_briefcase_id = $PharmacyProductRequest->services_briefcase_id;
                    $register_insume->assigned_management_plan_id = $ch_record->assigned_management_plan_id;
                    $register_insume->admissions_id = $PharmacyProductRequest->admissions_id;
                    $register_insume->auth_status_id = 3;
                    $register_insume->application_id = $AssistanceSupplies->id;
                    $register_insume->product_id = $PharmacyProductRequest->product_generic_id;
                    $register_insume->supplies_id = $PharmacyProductRequest->product_supplies_id;

                    $register_insume->save();
                } else {
                    $validate = AssistanceSupplies::select('assistance_supplies.*')
                        ->where('supplies_status_id', '2')
                        ->where('pharmacy_product_request_id', $id)->get()->toArray();
                    if (sizeof($validate) > 0) {
                        $compare2 = ChRecord::find($request->ch_record_id);
                        foreach ($validate as $item) {
                            $compare = ChRecord::find($item['ch_record_id']);
                            if ($compare->assigned_management_plan_id == $compare2->assigned_management_plan_id) {
                                return response()->json([
                                    'status' => false,
                                    'message' => 'Ya cuenta con aplicación',
                                ]);
                            } else {
                                $AssistanceSupplies->ch_record_id = $request->ch_record_id;

                                $ch_record = ChRecord::find($request->ch_record_id);

                                $PharmacyProductRequest = PharmacyProductRequest::find($AssistanceSupplies->pharmacy_product_request_id);

                                $register_insume = new Authorization;

                                $register_insume->services_briefcase_id = $PharmacyProductRequest->services_briefcase_id;
                                $register_insume->assigned_management_plan_id = $ch_record->assigned_management_plan_id;
                                $register_insume->admissions_id = $PharmacyProductRequest->admissions_id;
                                $register_insume->auth_status_id = 3;
                                $register_insume->application_id = $AssistanceSupplies->id;
                                $register_insume->product_id = $PharmacyProductRequest->product_generic_id;
                                $register_insume->supplies_id = $PharmacyProductRequest->product_supplies_id;

                                $register_insume->save();
                            }
                        }
                    } else {
                        $AssistanceSupplies->ch_record_id = $request->ch_record_id;
                    }
                }

                $AssistanceSupplies->user_incharge_id = Auth::user()->id;
                $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
                $AssistanceSupplies->application_hour = $request->clock;
                $AssistanceSupplies->observation = $request->observation;

                $AssistanceSupplies->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Producto aplicado exitosamente',
                    'data' => ['assistance_supplies' => $AssistanceSupplies]
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'No se encuentra stock para registrar',
                    // 'data' => ['assistance_supplies' => $AssistanceSupplies]
                ]);
            }
        } else {
            $supplies = AssistanceSupplies::select('assistance_supplies.*')
                ->where('supplies_status_id', '1')
                ->where('pharmacy_product_request_id', $id)->first();
            if ($supplies->count() > 0) {

                $AssistanceSupplies =  AssistanceSupplies::find($supplies->id);

                $AssistanceSupplies->ch_record_id = $request->ch_record_id;
                $AssistanceSupplies->user_incharge_id = Auth::user()->id;
                $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
                $AssistanceSupplies->application_hour = $request->clock;
                $AssistanceSupplies->observation = $request->observation;

                $AssistanceSupplies->save();

                // $ch_record = ChRecord::find($request->ch_record_id);

                // $PharmacyProductRequest = PharmacyProductRequest::find($AssistanceSupplies->pharmacy_product_request_id);

                // $register_insume = new Authorization;

                // $register_insume->services_briefcase_id = $ch_record->assigned_management_plan_id;
                // $register_insume->admissions_id = $PharmacyProductRequest->admissions_id;

                return response()->json([
                    'status' => true,
                    'message' => 'Suministros reportado como dañado exitosamente',
                    'data' => ['assistance_supplies' => $AssistanceSupplies]
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Acción invalida',
                // 'data' => ['assistance_supplies' => $AssistanceSupplies]
            ]);
        }
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
