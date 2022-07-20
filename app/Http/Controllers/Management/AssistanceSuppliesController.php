<?php

namespace App\Http\Controllers\Management;

use App\Models\AssistanceSupplies;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssistanceSuppliesRequest;
use App\Models\Assistance;
use App\Models\PharmacyProductRequest;
use App\Models\PharmacyRequestShipping;
use App\Models\ProductGeneric;
use App\Models\ProductSupplies;
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
        $AssistanceSupplies = AssistanceSupplies::find($id);

        $AssistanceSupplies->user_incharge_id = $request->user_incharge_id;
        if ($request->ch_record_id) {
            $AssistanceSupplies->ch_record_id = $request->ch_record_id;
        }
        $AssistanceSupplies->supplies_status_id = $request->supplies_status_id;
        $AssistanceSupplies->observation = $request->observation;

        $AssistanceSupplies->save();

        $PharmacyProductRequest = PharmacyProductRequest::find($AssistanceSupplies->pharmacy_product_request_id);
        if ($PharmacyProductRequest->product_generic_id) {
            $quantity = ProductGeneric::find($PharmacyProductRequest->product_generic_id);
        } else {
            $quantity = ProductSupplies::find($PharmacyProductRequest->product_supplies_id);
        }

        if ($quantity->product_dose_id == 2) {

            $applications = AssistanceSupplies::where('pharmacy_product_request_id', $AssistanceSupplies->pharmacy_product_request_id)
                ->where('supplies_status_id', 1)->get()->toArray();

            $x = count($applications) % $quantity->dose;
            if ($x == 0) {
                $requestShipping = PharmacyRequestShipping::where('pharmacy_product_request_id', $AssistanceSupplies->pharmacy_product_request_id)->first();
                if ($requestShipping->amount > 0) {
                    $requestShipping->amount = $requestShipping->amount - 1;
                }
                $requestShipping->save();
            }
        } else {
            $requestShipping = PharmacyRequestShipping::where('pharmacy_product_request_id', $AssistanceSupplies->pharmacy_product_request_id)->first();
            if ($requestShipping->amount > 0) {
                $requestShipping->amount = $requestShipping->amount - 1;
            }
            $requestShipping->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Suministros del assitencia actualizados exitosamente',
            'data' => ['assistance_supplies' => $AssistanceSupplies]
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
