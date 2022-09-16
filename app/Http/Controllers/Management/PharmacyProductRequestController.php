<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Admissions;
use App\Models\AssignedManagementPlan;
use App\Models\AssistanceSupplies;
use App\Models\ServicesBriefcase;
use App\Models\ChRecord;
use App\Models\ManagementPlan;
use App\Models\PharmacyLot;
use App\Models\PharmacyLotStock;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyRequestShipping;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PharmacyProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyProductRequest = PharmacyProductRequest::select(
            'pharmacy_product_request.*',
            DB::raw('pharmacy_request_shipping.amount_provition AS cantidad_enviada')
        )
            ->leftJoin('pharmacy_request_shipping', 'pharmacy_request_shipping.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
            ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
            ->leftJoin('admissions', 'pharmacy_product_request.admissions_id', 'admissions.id')
            ->leftJoin('patients', 'patients.id', 'admissions.patient_id')
            ->with(
                'product_generic',
                'product_supplies',
                'own_pharmacy_stock',
                'request_pharmacy_stock',
                'request_pharmacy_stock.campus',
                'own_pharmacy_stock.campus',
                'pharmacy_request_shipping',
                'pharmacy_request_shipping.pharmacy_lot_stock',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                'user_request',
                'admissions',
                'admissions.patients',
                'services_briefcase',
                'services_briefcase.briefcase',
                'services_briefcase.manual_price',
                'user_request_pad',
            )
            ->groupBy('pharmacy_product_request.id');

        if ($request->status == "PATIENT" && $request->own_pharmacy_stock_id) {
            $PharmacyProductRequest
                ->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'PATIENT')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PATIENT');
                })
                ->get();
        } else if ($request->status == "PATIENT") {
            $PharmacyProductRequest
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'PATIENT')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PATIENT');
                })
                ->get();
        } else if ($request->status == "ENVIADO" && $request->own_pharmacy_stock_id) {
            $PharmacyProductRequest
                ->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'ENVIADO')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL');
                })
                ->get();
        } else if ($request->status == "ENVIADO" && $request->request_pharmacy_stock_id) {
            $PharmacyProductRequest
                ->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'ENVIADO')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL');
                })
                ->get();
        } else if ($request->status == "ENVIADO FARMACIA" && $request->own_pharmacy_stock_id) {
            $PharmacyProductRequest
                ->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'ENVIO FARMACIA')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL FARMACIA');
                })
                ->get();
        } else if ($request->status == "ENVIADO FARMACIA" && $request->request_pharmacy_stock_id) {
            $PharmacyProductRequest
                ->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'ENVIO FARMACIA')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL FARMACIA');
                })
                ->get();
        } else if ($request->status == "SOLICITADO"  && $request->request_pharmacy_stock_id) {

            $PharmacyProductRequest
                ->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'SOLICITADO')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL');
                })
                ->get();
        } else if ($request->status == "SOLICITADO" && $request->own_pharmacy_stock_id) {

            $PharmacyProductRequest->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where('pharmacy_product_request.status', 'SOLICITADO')->get();
        } else if ($request->status == "SOLICITADO FARMACIA"  && $request->request_pharmacy_stock_id) {

            $PharmacyProductRequest
                ->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where(function ($query) {
                    $query->where('pharmacy_product_request.status', 'SOLICITADO FARMACIA')
                        ->orWhere('pharmacy_product_request.status', 'ENVIO PARCIAL FARMACIA');
                })
                ->get();
        } else if ($request->status == "SOLICITADO FARMACIA" && $request->own_pharmacy_stock_id) {

            $PharmacyProductRequest->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where('pharmacy_product_request.status', 'SOLICITADO FARMACIA')->get();
        } else if ($request->status == "DEVUELTO_PACIENTE" && $request->own_pharmacy_stock_id) {

            $PharmacyProductRequest->where('own_pharmacy_stock_id', $request->own_pharmacy_stock_id)
                ->where('pharmacy_product_request.status', 'DEVUELTO_PACIENTE')->get();
        } else if ($request->status == "DEVUELTO FARMACIA" && $request->request_pharmacy_stock_id) {

            $PharmacyProductRequest->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where('pharmacy_product_request.status', 'DEVUELTO FARMACIA')->get();
        } else if ($request->status == "DAMAGED" && $request->request_pharmacy_stock_id) {
            $PharmacyProductRequest->where('request_pharmacy_stock_id', $request->request_pharmacy_stock_id)
                ->where('pharmacy_product_request.status', 'DAÑADO')->get();
        } else {
            $PharmacyProductRequest->WhereNotNull('own_pharmacy_stock_id');
        }

        // if ($request->status == "ENVIADO") {
        //     // $PharmacyProductRequest->Where('request_pharmacy_stock_id');
        //     // $PharmacyProductRequest->where('status',"DEVUELTO");
        //     $PharmacyProductRequest->where(function ($query) use ($request) {
        //         $query->where('pharmacy_product_request.status', "ENVIADO")
        //             ->whereNotNull('pharmacy_product_request.request_pharmacy_stock_id');
        //     });
        //     // $PharmacyProductRequest->orWhere('status',"DEVUELTO");
        //     $PharmacyProductRequest->orWhere(function ($query) use ($request) {
        //         $query->where('pharmacy_product_request.status', "DEVUELTO")
        //             ->whereNull('pharmacy_product_request.request_pharmacy_stock_id');
        //     });
        // }

        if ($request->_sort) {
            if ($request->_sort != "actions" && $request->_sort != "request_pharmacy_stock"  && $request->_sort != "product_generic" && $request->_sort != "request_amount" && $request->_sort != "services_briefcase"  && $request->_sort != "identification"   && $request->_sort != "own_pharmacy_stock" && $request->_sort != "user_request_pad") {
                $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
            }
        }
        if ($request->product_generic_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.product_generic_id', $request->product_generic_id);
        }
        // if ($request->request_pharmacy_stock_id) {
        //     $PharmacyProductRequest->where('pharmacy_product_request.request_pharmacy_stock_id', $request->request_pharmacy_stock_id);
        // }
        // if ($request->own_pharmacy_stock_id) {
        //     $PharmacyProductRequest->where('pharmacy_product_request.own_pharmacy_stock_id','=' ,$request->own_pharmacy_stock_id);
        // }
        if ($request->product_supplies_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.product_supplies_id', $request->product_supplies_id);
        }
        if ($request->cantidad) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                if ($request->cantidad == 0) {
                    $query->where('pharmacy_request_shipping.amount_provition', '>', 0);
                }
            });
        }
        // if ($request->request_amount) {
        $PharmacyProductRequest->where(function ($query) use ($request) {
            if ($request->request_amount == 0) {
                $query->where('pharmacy_product_request.request_amount', '>', 0);
            }
        });

        // }

        if ($request->admissions_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.admissions_id', $request->admissions_id);
        }
        if ($request->record_id) {
            $admissions_id = ChRecord::find($request->record_id);
            $admissions = $admissions_id->admissions_id;
            $PharmacyProductRequest->where('pharmacy_product_request.admissions_id', $admissions);
        }


        if ($request->user_id) {
            $PharmacyProductRequest->where('pharmacy_product_request.user_request_id', $request->user_id);
        }


        // if ($request->status) {
        //     $PharmacyProductRequest->orWhere('pharmacy_product_request.status', $request->status);
        // }

        if ($request->product == 1) {
            //medicamento  product_generic_id
            // $PharmacyProductRequest->whereNotNull('pharmacy_product_request.product_generic_id')->whereNull('pharmacy_product_request.product_supplies_id');
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->whereNotNull('pharmacy_product_request.product_generic_id')
                    ->whereNull('pharmacy_product_request.product_supplies_id')
                    ->orWhere(function ($que) use ($request) {
                        $que->whereNull('pharmacy_product_request.product_generic_id')
                            ->whereNull('pharmacy_product_request.product_supplies_id')
                            ->whereNotNull('pharmacy_product_request.services_briefcase_id')
                            ->Where(function ($q) use ($request) {
                                $q->whereNotNull('manual_price.product_id')
                                    ->whereNull('manual_price.supplies_id');
                            });
                    });
            });
        } else if ($request->product == 2) {

            // insumo product_supplies_id
            // $PharmacyProductRequest->whereNull('pharmacy_product_request.product_generic_id')->whereNotNull('pharmacy_product_request.product_supplies_id');
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->whereNull('pharmacy_product_request.product_generic_id')
                    ->whereNotNull('pharmacy_product_request.product_supplies_id')
                    ->orWhere(function ($que) use ($request) {
                        $que->whereNull('pharmacy_product_request.product_generic_id')
                            ->whereNull('pharmacy_product_request.product_supplies_id')
                            ->whereNotNull('pharmacy_product_request.services_briefcase_id')
                            ->Where(function ($q) use ($request) {
                                $q->whereNull('manual_price.product_id')
                                    ->whereNotNull('manual_price.supplies_id');
                            });
                    });
            });
        } else if ($request->product == 3) {

            // insumo product_supplies_id
            // $PharmacyProductRequest->whereNull('pharmacy_product_request.product_generic_id')->whereNotNull('pharmacy_product_request.product_supplies_id');
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->whereNull('pharmacy_product_request.product_generic_id')
                    ->whereNotNull('pharmacy_product_request.product_supplies_id')
                    ->orWhere(function ($que) use ($request) {
                        $que->whereNull('pharmacy_product_request.product_generic_id')
                            ->whereNull('pharmacy_product_request.product_supplies_id')
                            ->whereNotNull('pharmacy_product_request.services_briefcase_id')
                            ->Where(function ($q) use ($request) {
                                $q->whereNotNull('manual_price.product_id')
                                    ->orWhereNotNull('manual_price.supplies_id');
                            });
                    });
            });
        }

        if ($request->search) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->where('pharmacy_product_request.status', 'like', '%' . $request->search . '%')
                    ->orWhere('patients.identification', 'like', '%' . $request->search . '%')
                    ->orWhere('manual_price.name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyProductRequest = $PharmacyProductRequest->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenidos exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
        ]);
    }

    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $PharmacyProductRequest = PharmacyProductRequest::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $PharmacyProductRequest = PharmacyProductRequest::select('pharmacy_product_request.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('pharmacy_product_request.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'pharmacy_product_request.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forUse(Request $request): JsonResponse
    {
        $arreglo = [];
        $PharmacyProductRequest = PharmacyProductRequest::select(
            'pharmacy_product_request.*',
            // DB::raw('SUM(pharmacy_request_shipping.amount_provition) AS cantidad_enviada'),
            // DB::raw('COUNT(assistance_supplies.supplies_status_id = 1) AS created'),
            DB::raw('                
                SUM(
                    IF( assistance_supplies.supplies_status_id = 1, 
                        1,0 
                    )
                ) AS disponibles'),
            DB::raw('
                SUM(
                    IF( assistance_supplies.supplies_status_id = 3, 
                       1,0 
                    )
               ) AS dañadas'),
            DB::raw('                
               SUM(
                   IF( assistance_supplies.supplies_status_id = 2, 
                       1,0 
                   )
               ) AS Usadas'),
            DB::raw('                
               SUM(
                   IF( assistance_supplies.supplies_status_id = 4 OR assistance_supplies.supplies_status_id = 5, 
                       1,0 
                   )
               ) AS returned'),
        )
            // ->leftJoin('pharmacy_request_shipping', 'pharmacy_request_shipping.pharmacy_product_request_id', 'pharmacy_product_request.id')
            ->leftJoin('assistance_supplies', 'assistance_supplies.pharmacy_product_request_id', 'pharmacy_product_request.id')

            ->with(
                'product_generic',
                'product_supplies',
                'admissions',
                'admissions.patients',
                'services_briefcase',
                'services_briefcase.briefcase',
                'services_briefcase.manual_price',
                'user_request_pad',
                'management_plan',
                'own_pharmacy_stock',
                'request_pharmacy_stock',
                'request_pharmacy_stock.campus',
                'own_pharmacy_stock.campus',
                'pharmacy_request_shipping',
                'pharmacy_request_shipping.pharmacy_lot_stock',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product.product_generic',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com.product_supplies',
                'pharmacy_request_shipping.pharmacy_lot_stock.billing_stock.product_supplies_com',
                'user_request'
            )->groupBy('pharmacy_product_request.id');

        // if ($request->user) {
        //     $PharmacyProductRequest->where('pharmacy_product_request.user_request_id', $request->user_id);
        // }

        //desde historia clinica
        if ($request->patient) {
            $ch_record = ChRecord::find($request->patient);
            $assigned = AssignedManagementPlan::find($ch_record->assigned_management_plan_id);
            if ($request->product) {
                $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                    ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                    ->where('pharmacy_product_request.management_plan_id', $assigned->management_plan_id)
                    ->whereNotNull('manual_price.product_id');
            } else {
                $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                    ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                    ->where('pharmacy_product_request.admissions_id', $ch_record->admissions_id)
                    ->whereNotNull('manual_price.supplies_id');
            }
        }

        //
        if ($request->type == '1') {

            // $EnabledAdmissions =  Admissions::Leftjoin('patients', 'admissions.patient_id', 'patients.id')
            //     ->select(
            //         'admissions.*',
            //         DB::raw('CONCAT_WS(" ",patients.lastname,patients.middlelastname,patients.firstname,patients.middlefirstname) AS nombre_completo')
            //     )
            //     ->where('patients.id', $request->user_id)
            //     ->where('discharge_date', '0000-00-00 00:00:00')->orderBy('created_at', 'desc')->get()->toArray();
            $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')
                ->where(function ($query) use ($request) {
                    $query->where('status', 'ACEPTADO')
                        ->orWhere('status', 'ENVIO PATIENT');
                })
                ->whereNotNull('manual_price.product_id');
            // foreach ($EnabledAdmissions as $item) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->Where('admissions_id', $request->admissions);
            });
            // }
        } else if ($request->type == '2') {

            $PharmacyProductRequest->leftJoin('services_briefcase', 'services_briefcase.id', 'pharmacy_product_request.services_briefcase_id')
                ->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id');
            // foreach ($EnabledAdmissions as $item) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('status', 'ACEPTADO')
                        ->orWhere('status', 'ENVIO PATIENT');
                })
                    ->Where('admissions_id', $request->admissions)
                    ->whereNotNull('manual_price.supplies_id');
            });
        }

        // if ($request->patient) {
        //     $ch_record = ChRecord::find($request->patient)->first();
        //     $assigned = AssignedManagementPlan::find($ch_record->assigned_management_plan_id)->first();

        //     $PharmacyProductRequest->where('pharmacy_product_request.management_plan_id', $assigned->management_plan_id);
        // }

        if ($request->_sort) {
            $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
        }

        // if ($request->product == "true") {
        //     //medicamento  product_generic_id
        //     // $PharmacyProductRequest->whereNotNull('product_generic_id')->whereNull('product_supplies_id');
        // } else if ($request->product == "false") {
        //     // insumo product_supplies_id
        //     $PharmacyProductRequest->whereNull('product_generic_id')->whereNotNull('product_supplies_id');
        // }

        if ($request->search) {
            $PharmacyProductRequest->where(function ($query) use ($request) {
                $query->where('pharmacy_product_request.status', 'like', '%' . $request->search . '%');
            });
        }

        // if ($request->query("pagination", true) == "false") {
        //     $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
        // } else {
        //     $page = $request->query("current_page", 1);
        //     $per_page = $request->query("per_page", 10);

        //     $PharmacyProductRequest = $PharmacyProductRequest->paginate($per_page, '*', 'page', $page);
        // }
        $PharmacyProductRequest = $PharmacyProductRequest->get()->toArray();
        foreach ($PharmacyProductRequest as $item) {
            if ($item['disponibles'] == 0) {
            } else {
                array_push($arreglo, $item);
            }
        }

        return response()->json([

            'status' => true,
            'message' => 'Producto solicitado obtenidos exitosamente',
            'data' => ['pharmacy_product_request' => $arreglo]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPharmacyLotId(Request $request, int $id): JsonResponse
    {
        $parmacy = PharmacyProductRequest::select('pharmacy_product_request.*')
            ->leftJoin('pharmacy_product_request', 'pharmacy_product_request.id', '=', 'pharmacy_stock.id')
            ->where('pharmacy_stock.id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenidas exitosamente',
            'data' => ['pharmacy_product_request' => $parmacy]
        ]);
    }


    public function store(Request $request): JsonResponse
    {

        if ($request->record_id) {
            $admissions_id = ChRecord::find($request->record_id);
            $admissions_id = $admissions_id->admissions_id;
        } else {
            $admissions_id = $request->admissions_id;
        }

        if ($request->services_briefcase_id) {
            $product = ServicesBriefcase::select('manual_price.*')->where('services_briefcase.id', $request->services_briefcase_id)->leftJoin('manual_price', 'manual_price.id', 'services_briefcase.manual_price_id')->get()->first();
        }

        $PharmacyProductRequest = new PharmacyProductRequest;
        $PharmacyProductRequest->request_amount = $request->request_amount;
        $PharmacyProductRequest->status = $request->status;
        $PharmacyProductRequest->observation = $request->observation;
        $PharmacyProductRequest->user_request_id = $request->user_request_id;
        $PharmacyProductRequest->admissions_id = $admissions_id;
        $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
        $PharmacyProductRequest->product_generic_id = $request->services_briefcase_id ? $product->product_id : $request->product_generic_id;
        $PharmacyProductRequest->product_supplies_id = $request->services_briefcase_id ? $product->supplies_id : $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
        $PharmacyProductRequest->save();
        if ($request->status == "DEVUELTO_PACIENTE") {
            $lot = PharmacyRequestShipping::where('pharmacy_product_request_id', $request->pharmacy_request)->get()->first();
            $PharmacyRequestShipping = new PharmacyRequestShipping;
            $PharmacyRequestShipping->amount_damaged =  0;
            $PharmacyRequestShipping->amount =  $request->request_amount;
            $PharmacyRequestShipping->amount_provition =  $request->request_amount;
            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
            $PharmacyRequestShipping->pharmacy_lot_stock_id = $lot->pharmacy_lot_stock_id;
            $PharmacyRequestShipping->amount_operation = $request->request_amount;
            $PharmacyRequestShipping->user_responsible_id = Auth()->user()->id;

            $PharmacyRequestShipping->save();


            $supplies = AssistanceSupplies::select('assistance_supplies.*')
                ->where('supplies_status_id', 1)
                ->where('pharmacy_product_request_id', $request->pharmacy_request)->get()->toArray();
            for ($i = 0; $i < $request->request_amount; $i++) {
                $AssistanceSupplies = AssistanceSupplies::find($supplies[$i]['id']);
                $AssistanceSupplies->supplies_status_id = 4;
                $AssistanceSupplies->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest->toArray()]
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
        $PharmacyProductRequest = PharmacyProductRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado obtenido exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
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
        $PharmacyProductRequest = PharmacyProductRequest::find($id);
        $PharmacyProductRequest->request_amount = $request->request_amount;
        $PharmacyProductRequest->status = $request->status;
        $PharmacyProductRequest->observation = $request->observation;
        $PharmacyProductRequest->admissions_id = $request->admissions_id;
        $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->user_request_id = $request->user_request_id;
        $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
        $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
        $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
        $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
        $PharmacyProductRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado actualizado exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
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

        $user_id = Auth::user()->id;
        if ($id != -1) {
            $PharmacyProductRequest = PharmacyProductRequest::find($id);
            $PharmacyProductRequest2 = PharmacyProductRequest::find($id);
            $COUNT2 = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->orderBy('created_at', 'asc');
            $COUNT2 = $COUNT2->get()->toArray();

            $status_ant = $PharmacyProductRequest->status;
            if ($PharmacyProductRequest) {
                if ($request->status == "ENVIADO FARMACIA") {
                    $varamount = $PharmacyProductRequest->request_amount;
                    $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;


                    if ($PharmacyProductRequest->request_amount <= 0) {
                        $PharmacyProductRequest->status = 'ENVIO FARMACIA';
                    } else {
                        $PharmacyProductRequest->status = "ENVIO PARCIAL FARMACIA";
                    }
                    $PharmacyProductRequest->save();

                    $elements = json_decode($request->pharmacy_lot_stock_id);
                    foreach ($elements as $element) {
                        $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                        $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                        $PharmacyLotStock->save();



                        $PharmacyRequestShipping = new PharmacyRequestShipping;
                        $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                        $PharmacyRequestShipping->pharmacy_lot_stock_id =  $PharmacyLotStock->id;
                        $PharmacyRequestShipping->amount_damaged =  0;
                        $PharmacyRequestShipping->amount =  0;
                        $PharmacyRequestShipping->amount_provition =  $varamount;
                        $PharmacyRequestShipping->amount_operation =  $varamount;
                        $PharmacyRequestShipping->save();
                    }
                    $COUNT3 = PharmacyProductRequest::where('id', $id)->orderBy('created_at', 'DESC');
                    $COUNT3 = $COUNT3->get()->toArray();


                    $PharmacyRequestShipping = new PharmacyRequestShipping;
                    $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                    $PharmacyRequestShipping->pharmacy_lot_stock_id =  $PharmacyLotStock->id;
                    $PharmacyRequestShipping->amount_damaged =  0;
                    $PharmacyRequestShipping->amount =  $element->amount;
                    $PharmacyRequestShipping->amount_provition =  $varamount;
                    $PharmacyRequestShipping->amount_operation =  $varamount - $element->amount;
                    $PharmacyRequestShipping->save();

                    $pharmacyvalid = PharmacyProductRequest::find($id + 1);

                    if (!$pharmacyvalid) {
                        $PharmacyProductRequestNew = new PharmacyProductRequest;
                        $PharmacyProductRequestNew->request_amount = 0 + $request->amount;
                        $PharmacyProductRequestNew->status = $PharmacyProductRequest->status;
                        $PharmacyProductRequestNew->observation = '';
                        $PharmacyProductRequestNew->product_generic_id = $PharmacyProductRequest->product_generic_id;
                        $PharmacyProductRequestNew->product_supplies_id = $PharmacyProductRequest->product_supplies_id;
                        $PharmacyProductRequestNew->own_pharmacy_stock_id = $PharmacyProductRequest->request_pharmacy_stock_id;
                        $PharmacyProductRequestNew->request_pharmacy_stock_id = $PharmacyProductRequest->own_pharmacy_stock_id;
                        $PharmacyProductRequestNew->user_request_id = $PharmacyProductRequest->user_request_id;
                        $PharmacyProductRequestNew->admissions_id = $PharmacyProductRequest->admissions_id;
                        $PharmacyProductRequestNew->services_briefcase_id = $PharmacyProductRequest->services_briefcase_id;
                        $PharmacyProductRequestNew->user_request_pad_id = $PharmacyProductRequest->user_request_pad_id;
                        $PharmacyProductRequestNew->save();

                        $PharmacyRequestShipping3 = new PharmacyRequestShipping;
                        $PharmacyRequestShipping3->amount_damaged = 0;
                        $PharmacyRequestShipping3->amount =  0;
                        $PharmacyRequestShipping3->amount_provition =  $request->amount;
                        $PharmacyRequestShipping3->pharmacy_product_request_id = $PharmacyProductRequestNew->id;
                        $PharmacyRequestShipping3->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                        $PharmacyRequestShipping3->amount_operation = $request->amount;
                        $PharmacyRequestShipping3->save();
                    } else {
                        $pharmacyvalid->status = "ENVIO FARMACIA";
                        $pharmacyvalid->request_amount = $pharmacyvalid->request_amount + $request->amount;
                        $pharmacyvalid->save();

                        $PharmacyRequestShipping3 = new PharmacyRequestShipping;
                        $PharmacyRequestShipping3->amount_damaged = $request->amount_damaged;
                        $PharmacyRequestShipping3->amount =  $request->amount;
                        $PharmacyRequestShipping3->amount_provition =  $pharmacyvalid->request_amount;
                        $PharmacyRequestShipping3->pharmacy_product_request_id = $pharmacyvalid->id;
                        $PharmacyRequestShipping3->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                        $PharmacyRequestShipping3->amount_operation = $pharmacyvalid->request_amount;
                        $PharmacyRequestShipping3->save();
                    }
                }
                if ($request->status == "ENVIADO") {
                    $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;


                    if ($status_ant == "PATIENT" || $status_ant == "ENVIO PATIENT") {
                        $PharmacyProductRequest2 = PharmacyProductRequest::with('services_briefcase', 'services_briefcase.manual_price')->where("id", $id)->first();

                        if ($PharmacyProductRequest2->services_briefcase->manual_price->product_id) {
                            $quantity = ProductGeneric::find($PharmacyProductRequest2->services_briefcase->manual_price->product_id);
                        } else {
                            $quantity = ProductSupplies::find($PharmacyProductRequest2->services_briefcase->manual_price->supplies_id);
                        }
                        $elements = json_decode($request->pharmacy_lot_stock_id);
                        foreach ($elements as $element) {
                            $COUNT = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->where('amount', 0);
                            $COUNT = $COUNT->get()->toArray();
                            if (count($COUNT) == 0) {
                                $PharmacyRequestShipping = new PharmacyRequestShipping;
                                $PharmacyRequestShipping->amount_damaged =  0;
                                $PharmacyRequestShipping->amount =  0;
                                $PharmacyRequestShipping->amount_provition =  $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->pharmacy_product_request_id =  $id;
                                $PharmacyRequestShipping->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping->amount_operation = $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->save();
                                if ($element->amount <= $PharmacyRequestShipping->amount_operation) {
                                    $PharmacyRequestShipping2 = new PharmacyRequestShipping;
                                    $PharmacyRequestShipping2->amount_damaged = 0;
                                    $PharmacyRequestShipping2->amount =  $element->amount;
                                    $PharmacyRequestShipping2->amount_provition =  $PharmacyRequestShipping->amount_provition;
                                    $PharmacyRequestShipping2->pharmacy_product_request_id =  $id;
                                    $PharmacyRequestShipping2->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                    $PharmacyRequestShipping2->amount_operation = $PharmacyRequestShipping->amount_operation - $element->amount;
                                    $PharmacyRequestShipping2->save();

                                    $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                                    $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                                    $PharmacyLotStock->save();
                                    if ($PharmacyProductRequest->request_amount <= 0) {
                                        $PharmacyProductRequest->status = 'ACEPTADO';
                                    } else {
                                        $PharmacyProductRequest->status = "ENVIO PATIENT";
                                    }
                                    $PharmacyProductRequest->save();
                                } else {
                                    return response()->json([
                                        'status' => false,
                                        'message' => 'El valor no debe superar la cantidad solicitada',
                                    ]);
                                }
                            } else {
                                if ($element->amount <= end($COUNT)['amount_operation']) {
                                    $PharmacyRequestShipping2 = new PharmacyRequestShipping;
                                    $PharmacyRequestShipping2->amount_damaged = 0;
                                    $PharmacyRequestShipping2->amount =  $element->amount;
                                    $PharmacyRequestShipping2->amount_provition =  $COUNT[0]['amount_provition'];
                                    $PharmacyRequestShipping2->pharmacy_product_request_id =  $id;
                                    $PharmacyRequestShipping2->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                    $PharmacyRequestShipping2->amount_operation = end($COUNT)['amount_operation'] - $element->amount;
                                    $PharmacyRequestShipping2->save();

                                    $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                                    $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                                    $PharmacyLotStock->save();
                                    if ($PharmacyProductRequest->request_amount <= 0) {
                                        $PharmacyProductRequest->status = 'ACEPTADO';
                                    } else {
                                        $PharmacyProductRequest->status = "ENVIO PATIENT";
                                    }
                                    $PharmacyProductRequest->save();
                                } else {
                                    return response()->json([
                                        'status' => false,
                                        'message' => 'El valor no debe superar la cantidad solicitada',
                                    ]);
                                }
                            }




                            for ($i = 0; $i < $element->amount; $i++) {
                                if ($quantity->product_dose_id == 2) {
                                    $cantidad = $quantity->dose;
                                } else {
                                    $cantidad = 1;
                                }
                                for ($j = 0; $j < $cantidad; $j++) {
                                    $assistanceSupplies = new AssistanceSupplies;
                                    $assistanceSupplies->user_incharge_id =  $user_id;
                                    $assistanceSupplies->pharmacy_product_request_id =  $PharmacyProductRequest2->id;
                                    $assistanceSupplies->supplies_status_id = 1;
                                    $assistanceSupplies->save();
                                }
                            }
                        }
                    } else if ($status_ant == "SOLICITADO") {
                        $elements = json_decode($request->pharmacy_lot_stock_id);
                        foreach ($elements as $element) {
                            $COUNT = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->where('amount', 0);
                            $COUNT = $COUNT->get()->toArray();
                            if (count($COUNT) == 0) {
                                $PharmacyRequestShipping = new PharmacyRequestShipping;
                                $PharmacyRequestShipping->amount_damaged =  0;
                                $PharmacyRequestShipping->amount =  0;
                                $PharmacyRequestShipping->amount_provition =  $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->pharmacy_product_request_id =  $id;
                                $PharmacyRequestShipping->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping->amount_operation = $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->save();
                            }
                            $COUNT2 = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->orderBy('created_at', 'asc');
                            $COUNT2 = $COUNT2->get()->toArray();

                            if ($element->amount <= end($COUNT2)['amount_operation']) {
                                $PharmacyRequestShipping2 = new PharmacyRequestShipping;
                                $PharmacyRequestShipping2->amount_damaged = 0;
                                $PharmacyRequestShipping2->amount =  $element->amount;
                                $PharmacyRequestShipping2->amount_provition =  $COUNT2[0]['amount_provition'];
                                $PharmacyRequestShipping2->pharmacy_product_request_id =  $id;
                                $PharmacyRequestShipping2->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping2->amount_operation = end($COUNT2)['amount_operation'] - $element->amount;
                                $PharmacyRequestShipping2->save();

                                $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                                $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                                $PharmacyLotStock->save();
                                if ($PharmacyProductRequest->request_amount <= 0) {
                                    $PharmacyProductRequest->status = 'ACEPTADO';
                                    $PharmacyProductRequest->own_pharmacy_stock_id = null;
                                } else {
                                    $PharmacyProductRequest->status = "ENVIO PARCIAL";
                                    $PharmacyProductRequest->own_pharmacy_stock_id = null;
                                }
                                $PharmacyProductRequest->save();
                            } else {
                                return response()->json([
                                    'status' => false,
                                    'message' => 'El valor no debe superar la cantidad solicitada',
                                ]);
                            }
                        }
                    } else if ($status_ant == "SOLICITADO FARMACIA") {
                        $elements = json_decode($request->pharmacy_lot_stock_id);
                        foreach ($elements as $element) {
                            $COUNT = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->where('amount', 0);
                            $COUNT = $COUNT->get()->toArray();
                            if (count($COUNT) == 0) {
                                $PharmacyRequestShipping = new PharmacyRequestShipping;
                                $PharmacyRequestShipping->amount_damaged =  0;
                                $PharmacyRequestShipping->amount =  0;
                                $PharmacyRequestShipping->amount_provition =  $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->pharmacy_product_request_id =  $id;
                                $PharmacyRequestShipping->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping->amount_operation = $PharmacyProductRequest2->request_amount;
                                $PharmacyRequestShipping->save();
                            }
                            $COUNT2 = PharmacyRequestShipping::where('pharmacy_product_request_id', $id)->orderBy('created_at', 'asc');
                            $COUNT2 = $COUNT2->get()->toArray();

                            if ($element->amount <= end($COUNT2)['amount_operation']) {
                                $PharmacyRequestShipping2 = new PharmacyRequestShipping;
                                $PharmacyRequestShipping2->amount_damaged = 0;
                                $PharmacyRequestShipping2->amount =  $element->amount;
                                $PharmacyRequestShipping2->amount_provition =  $COUNT2[0]['amount_provition'];
                                $PharmacyRequestShipping2->pharmacy_product_request_id =  $id;
                                $PharmacyRequestShipping2->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping2->amount_operation = end($COUNT2)['amount_operation'] - $element->amount;
                                $PharmacyRequestShipping2->save();


                                $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                                $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                                $PharmacyLotStock->save();
                                if ($PharmacyProductRequest->request_amount <= 0) {
                                    $PharmacyProductRequest->status = 'ENVIADO FARMACIA';
                                } else {
                                    $PharmacyProductRequest->status = "ENVIO PARCIAL FARMACIA";
                                }
                                $PharmacyProductRequest->save();
                            } else {
                                return response()->json([
                                    'status' => false,
                                    'message' => 'El valor no debe superar la cantidad solicitada',
                                ]);
                            }
                        }

                        // $PharmacyRequestShipping2 = new PharmacyRequestShipping;
                        // $PharmacyRequestShipping2->amount_damaged = 0;
                        // $PharmacyRequestShipping2->amount =  $element->amount;
                        // $PharmacyRequestShipping2->amount_provition =  $element->amount;
                        // $PharmacyRequestShipping2->pharmacy_product_request_id =  $id;
                        // $PharmacyRequestShipping2->pharmacy_lot_stock_id = $element->pharmacy_lot_stock_id;
                        // $PharmacyRequestShipping2->amount_operation = end($COUNT2)['amount_operation'] - $element->amount;
                        // $PharmacyRequestShipping2->save();

                    } else {
                        if ($PharmacyProductRequest->request_amount <= 0) {
                            $PharmacyProductRequest->status = 'ENVIADO';
                        } else {
                            $PharmacyProductRequest->status = "ENVIO PARCIAL";
                        }
                        $PharmacyProductRequest->save();

                        $elements = json_decode($request->pharmacy_lot_stock_id);
                        foreach ($elements as $element) {
                            $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                            $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $element->amount;
                            $PharmacyLotStock->save();



                            $PharmacyRequestShipping = new PharmacyRequestShipping;
                            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                            $PharmacyRequestShipping->pharmacy_lot_stock_id =  $PharmacyLotStock->id;
                            $PharmacyRequestShipping->amount_damaged =  0;
                            $PharmacyRequestShipping->amount =  $element->amount;
                            $PharmacyRequestShipping->amount_provition =  end($COUNT2)['amount_provition'];
                            $PharmacyRequestShipping->amount_operation =  end($COUNT2)['amount_operation'] - $element->amount;
                            $PharmacyRequestShipping->save();
                        }
                    }
                }
                if ($request->status == "ACEPTADO") {
                    // $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;
                    // $PharmacyProductRequest->status = $request->status;
                    $PharmacyProductRequest->observation = $request->observation;
                    $PharmacyProductRequest->save();
                    $elements = json_decode($request->pharmacy_lot_stock_id);
                    foreach ($elements as $element) {
                        $var = $PharmacyProductRequest->request_amount;
                        $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                        $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - ($element->amount + ($element->amount_damaged >= 1 ? $element->amount_damaged : 0));
                        $PharmacyRequestShipping1 = PharmacyRequestShipping::find($element->pharmacy_request_shipping_id);

                        $LastPharmacyLot = PharmacyLot::find($PharmacyLotStock->pharmacy_lot_id);


                        if (($element->amount + $element->amount_damaged) > $var) {
                            return response()->json([
                                'status' => false,
                                'message' => 'El valor no debe superar la cantidad solicitada',
                            ]);
                        } else {
                            if ($element->amount_damaged > 0) {
                                $PharmacyProductRequest3 = new PharmacyProductRequest;
                                $PharmacyProductRequest3->request_amount = $element->amount_damaged;
                                $PharmacyProductRequest3->status = "ENVIADO";
                                $PharmacyProductRequest3->observation = "Dañado: " . $request->observation;
                                $PharmacyProductRequest3->user_request_id = Auth::user()->id;
                                $PharmacyProductRequest3->services_briefcase_id = $PharmacyProductRequest->services_briefcase_id;
                                $PharmacyProductRequest3->product_generic_id = $PharmacyProductRequest->product_generic_id;
                                $PharmacyProductRequest3->product_supplies_id = $PharmacyProductRequest->product_supplies_id;
                                $PharmacyProductRequest3->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
                                $PharmacyProductRequest3->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
                                $PharmacyProductRequest3->save();

                                $PharmacyRequestShipping3 = new PharmacyRequestShipping;
                                $PharmacyRequestShipping3->amount_damaged =  $element->amount_damaged;
                                $PharmacyRequestShipping3->amount =  0;
                                $PharmacyRequestShipping3->amount_provition =  $element->amount_damaged;
                                $PharmacyRequestShipping3->pharmacy_product_request_id =  $PharmacyProductRequest3->id;
                                $PharmacyRequestShipping3->pharmacy_lot_stock_id = $PharmacyRequestShipping1->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping3->amount_operation = $element->amount_damaged;
                                $PharmacyRequestShipping3->save();
                            }
                            if ($request->status == "ACEPTADO") {
                                $PharmacyProductRequest3->status = "DAÑADO";
                                $PharmacyProductRequest3->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
                                $PharmacyProductRequest3->request_amount = $element->amount_damaged;
                                $PharmacyProductRequest3->save();
                            }
                            $PharmacyRequestShipping = new PharmacyRequestShipping;
                            $PharmacyRequestShipping->amount_damaged =  0;
                            $PharmacyRequestShipping->amount =  $element->amount;
                            $PharmacyRequestShipping->amount_provition =  $PharmacyRequestShipping1->amount_provition;
                            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyRequestShipping1->pharmacy_product_request_id;
                            $PharmacyRequestShipping->pharmacy_lot_stock_id = $PharmacyRequestShipping1->pharmacy_lot_stock_id;
                            $PharmacyRequestShipping->amount_operation = $PharmacyRequestShipping1->amount_operation - ($element->amount + $element->amount_damaged);
                            if ($PharmacyRequestShipping->amount_operation <= 0) {
                                $PharmacyProductRequest->status = $request->status;
                            } else {
                                $PharmacyProductRequest->status = "ENVIO PARCIAL";
                            }
                            $PharmacyProductRequest->save();
                            $PharmacyRequestShipping->save();

                            if ($PharmacyProductRequest->product_generic_id) {
                                $quantity = ProductGeneric::find($PharmacyProductRequest->product_generic_id);
                            } else {
                                $quantity = ProductSupplies::find($PharmacyProductRequest->product_supplies_id);
                            }

                            for ($i = 0; $i < $element->amount; $i++) {
                                for ($j = 0; $j < $quantity->dose; $j++) {
                                    $assistanceSupplies = new AssistanceSupplies;
                                    $assistanceSupplies->user_incharge_id =  $user_id;
                                    $assistanceSupplies->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                                    $assistanceSupplies->supplies_status_id = 1;
                                    $assistanceSupplies->save();
                                }
                            }
                            $pharmacynow = PharmacyLotStock::where('pharmacy_stock_id', $PharmacyProductRequest->own_pharmacy_stock_id)
                                ->where('lot', '=', $PharmacyLotStock->lot)->get()->first();
                            $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $element->amount_damaged;
                            if (!$pharmacynow) {
                                $NewPharmacyLotStock = new PharmacyLotStock;
                                $NewPharmacyLotStock->lot = $PharmacyLotStock->lot;
                                $NewPharmacyLotStock->amount_total =  $element->amount;
                                $NewPharmacyLotStock->sample = $PharmacyLotStock->sample;
                                $NewPharmacyLotStock->actual_amount = $NewPharmacyLotStock->amount_total;
                                $NewPharmacyLotStock->expiration_date = $PharmacyLotStock->expiration_date;
                                $NewPharmacyLotStock->pharmacy_lot_id = $LastPharmacyLot->id;
                                $NewPharmacyLotStock->billing_stock_id = $PharmacyLotStock->billing_stock_id;
                                $NewPharmacyLotStock->pharmacy_stock_id = $PharmacyProductRequest->own_pharmacy_stock_id;
                                $NewPharmacyLotStock->save();
                            } else {
                                $NewPharmacyLot = PharmacyLotStock::where('id', $pharmacynow->id)
                                    ->with('pharmacy_stock', 'pharmacy_stock.type_pharmacy_stock')->get()->first();

                                $NewPharmacyLotStock = PharmacyLotStock::find($pharmacynow->id);
                                if ($NewPharmacyLot->pharmacy_stock->type_pharmacy_stock->id == 1) {
                                    $NewPharmacyLotStock->actual_amount =  $NewPharmacyLotStock->actual_amount + $PharmacyRequestShipping->amount;
                                } else {
                                    $NewPharmacyLotStock->actual_amount =  $NewPharmacyLotStock->actual_amount + $PharmacyRequestShipping->amount;
                                    $NewPharmacyLotStock->amount_total =  $NewPharmacyLotStock->amount_total + $PharmacyRequestShipping->amount;
                                }


                                $NewPharmacyLotStock->save();
                            }
                        }
                    }
                } else if ($request->status == "ACEPTADO FARMACIA") {
                    // $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $request->amount;
                    // $PharmacyProductRequest->status = $request->status;
                    $PharmacyProductRequest->observation = $request->observation;
                    $PharmacyProductRequest->save();
                    $elements = json_decode($request->pharmacy_lot_stock_id);
                    foreach ($elements as $element) {
                        $var = $PharmacyProductRequest->request_amount;
                        $PharmacyLotStock = PharmacyLotStock::find($element->pharmacy_lot_stock_id);
                        $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - ($element->amount + ($element->amount_damaged >= 1 ? $element->amount_damaged : 0));
                        $PharmacyRequestShipping1 = PharmacyRequestShipping::find($element->pharmacy_request_shipping_id);

                        $LastPharmacyLot = PharmacyLot::find($PharmacyLotStock->pharmacy_lot_id);


                        if (($element->amount + $element->amount_damaged) > $var) {
                            return response()->json([
                                'status' => false,
                                'message' => 'El valor no debe superar la cantidad solicitada',
                            ]);
                        } else {
                            if ($element->amount_damaged > 0) {
                                $PharmacyProductRequest3 = new PharmacyProductRequest;
                                $PharmacyProductRequest3->request_amount = $element->amount_damaged;
                                $PharmacyProductRequest3->status = "ENVIADO";
                                $PharmacyProductRequest3->observation = "Dañado: " . $request->observation;
                                $PharmacyProductRequest3->user_request_id = Auth::user()->id;
                                $PharmacyProductRequest3->services_briefcase_id = $PharmacyProductRequest->services_briefcase_id;
                                $PharmacyProductRequest3->product_generic_id = $PharmacyProductRequest->product_generic_id;
                                $PharmacyProductRequest3->product_supplies_id = $PharmacyProductRequest->product_supplies_id;
                                $PharmacyProductRequest3->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
                                $PharmacyProductRequest3->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
                                $PharmacyProductRequest3->save();

                                $PharmacyRequestShipping3 = new PharmacyRequestShipping;
                                $PharmacyRequestShipping3->amount_damaged =  $element->amount_damaged;
                                $PharmacyRequestShipping3->amount =  0;
                                $PharmacyRequestShipping3->amount_provition =  $element->amount_damaged;
                                $PharmacyRequestShipping3->pharmacy_product_request_id =  $PharmacyProductRequest3->id;
                                $PharmacyRequestShipping3->pharmacy_lot_stock_id = $PharmacyRequestShipping1->pharmacy_lot_stock_id;
                                $PharmacyRequestShipping3->amount_operation = $element->amount_damaged;
                                $PharmacyRequestShipping3->save();
                            }
                            if ($request->status == "ACEPTADO") {
                                $PharmacyRequestShipping3->amount =  0;
                                $PharmacyProductRequest3->status = "DAÑADO";
                                $PharmacyProductRequest3->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
                                $PharmacyProductRequest3->request_amount = $element->amount_damaged;
                                $PharmacyProductRequest3->save();
                            }
                            $PharmacyRequestShipping = new PharmacyRequestShipping;
                            $PharmacyRequestShipping->amount_damaged =  0;
                            $PharmacyRequestShipping->amount =  $element->amount;
                            $PharmacyRequestShipping->amount_provition =  $PharmacyRequestShipping1->amount_provition;
                            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyRequestShipping1->pharmacy_product_request_id;
                            $PharmacyRequestShipping->pharmacy_lot_stock_id = $PharmacyRequestShipping1->pharmacy_lot_stock_id;
                            $PharmacyRequestShipping->amount_operation = $PharmacyRequestShipping1->amount_operation - ($element->amount + $element->amount_damaged);
                            if ($PharmacyRequestShipping->amount_operation <= 0) {
                                $PharmacyProductRequest->status = $request->status;
                            } else {
                                $PharmacyProductRequest->status = "ENVIO PARCIAL FARMACIA";
                            }
                            $PharmacyProductRequest->save();
                            $PharmacyRequestShipping->save();

                            if ($PharmacyProductRequest->product_generic_id) {
                                $quantity = ProductGeneric::find($PharmacyProductRequest->product_generic_id);
                            } else {
                                $quantity = ProductSupplies::find($PharmacyProductRequest->product_supplies_id);
                            }

                            for ($i = 0; $i < $element->amount; $i++) {
                                for ($j = 0; $j < $quantity->dose; $j++) {
                                    $assistanceSupplies = new AssistanceSupplies;
                                    $assistanceSupplies->user_incharge_id =  $user_id;
                                    $assistanceSupplies->pharmacy_product_request_id =  $PharmacyProductRequest->id;
                                    $assistanceSupplies->supplies_status_id = 1;
                                    $assistanceSupplies->save();
                                }
                            }
                            $pharmacynow = PharmacyLotStock::where('pharmacy_stock_id', $request->own_pharmacy_stock_id)
                                ->where('lot', '=', $PharmacyLotStock->lot)->get()->first();
                            $PharmacyProductRequest->request_amount = $PharmacyProductRequest->request_amount - $element->amount_damaged;
                            if (!$pharmacynow) {
                                $NewPharmacyLotStock = new PharmacyLotStock;
                                $NewPharmacyLotStock->lot = $PharmacyLotStock->lot;
                                $NewPharmacyLotStock->amount_total =  $element->amount;
                                $NewPharmacyLotStock->sample = $PharmacyLotStock->sample;
                                $NewPharmacyLotStock->actual_amount = $NewPharmacyLotStock->amount_total;
                                $NewPharmacyLotStock->expiration_date = $PharmacyLotStock->expiration_date;
                                $NewPharmacyLotStock->pharmacy_lot_id = $LastPharmacyLot->id;
                                $NewPharmacyLotStock->billing_stock_id = $PharmacyLotStock->billing_stock_id;
                                $NewPharmacyLotStock->pharmacy_stock_id = $request->own_pharmacy_stock_id;
                                $NewPharmacyLotStock->save();
                            } else {
                                $NewPharmacyLot = PharmacyLotStock::where('id', $pharmacynow->id)
                                    ->with('pharmacy_stock', 'pharmacy_stock.type_pharmacy_stock')->get()->first();

                                $NewPharmacyLotStock = PharmacyLotStock::find($pharmacynow->id);
                                if ($NewPharmacyLot->pharmacy_stock->type_pharmacy_stock->id == 1) {
                                    $NewPharmacyLotStock->actual_amount =  $NewPharmacyLotStock->actual_amount + $PharmacyRequestShipping->amount;
                                } else {
                                    $NewPharmacyLotStock->actual_amount =  $NewPharmacyLotStock->actual_amount + $PharmacyRequestShipping->amount;
                                    $NewPharmacyLotStock->amount_total =  $NewPharmacyLotStock->amount_total + $PharmacyRequestShipping->amount;
                                }


                                $NewPharmacyLotStock->save();
                            }
                        }
                    }
                }
            }
        } else {

            $PharmacyProductRequest = new PharmacyProductRequest;
            $PharmacyProductRequest->request_amount = $request->amount_provition;
            $PharmacyProductRequest->status = $request->status;
            $PharmacyProductRequest->observation = '';
            $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
            $PharmacyProductRequest->product_supplies_id = $request->product_supplies_id;
            $PharmacyProductRequest->own_pharmacy_stock_id = $request->own_pharmacy_stock_id;
            $PharmacyProductRequest->request_pharmacy_stock_id = $request->request_pharmacy_stock_id;
            $PharmacyProductRequest->user_request_id = $request->user_request_id;
            $PharmacyProductRequest->admissions_id = $request->admissions_id;
            $PharmacyProductRequest->services_briefcase_id = $request->services_briefcase_id;
            $PharmacyProductRequest->user_request_pad_id = $request->user_request_pad_id;
            $PharmacyProductRequest->save();

            $PharmacyRequestShipping = new PharmacyRequestShipping;
            $PharmacyRequestShipping->pharmacy_product_request_id =  $PharmacyProductRequest->id;
            $PharmacyRequestShipping->pharmacy_lot_stock_id =  $request->pharmacy_lot_stock_id;
            $PharmacyRequestShipping->amount_damaged =  0;
            $PharmacyRequestShipping->amount =  0;
            $PharmacyRequestShipping->amount_provition =  $request->amount_provition;
            $PharmacyRequestShipping->amount_operation =  $request->amount_provition;
            $PharmacyRequestShipping->save();

            $PharmacyLotStock = PharmacyLotStock::find($request->pharmacy_lot_stock_id);
            $PharmacyLotStock->actual_amount = $PharmacyLotStock->actual_amount - $request->amount_provition;
            $PharmacyLotStock->save();
        }




        return response()->json([
            'status' => true,
            'message' => 'Inventario lote actualizado exitosamente',
            'data' => ['pharmacy_product_request' => "HAROLD Y JORGE X 100PRE"]
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
            $PharmacyProductRequest = PharmacyProductRequest::find($id);
            $PharmacyProductRequest->delete();

            return response()->json([
                'status' => true,
                'message' => 'Producto solicitado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Producto solicitado en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
