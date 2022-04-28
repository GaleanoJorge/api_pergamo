<?php

namespace App\Http\Controllers\Management;

use App\Models\PharmacyRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyRequest = PharmacyRequest::with('pharmacy_inventory','pharmacy_inventory.billing_stock');
     //   $PharmacyRequest = PharmacyRequest::with('pharmacy_inventory','pharmacy_inventory.billing_stock','pharmacy_inventory.billing_stock.product','pharmacy_inventory.billing_stock.product.factory', 'pharmacy_inventory.billing_stock.product.product_generic');

        if ($request->_sort) {
            $PharmacyRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyRequest->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $PharmacyRequest = $PharmacyRequest->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PharmacyRequest = $PharmacyRequest->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenidos exitosamente',
            'data' => ['pharmacy_request' => $PharmacyRequest]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $PharmacyRequest = new PharmacyRequest;
        $PharmacyRequest->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyRequest->pharmacy_inventory_id = $request->pharmacy_inventory_id;
        $PharmacyRequest->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $PharmacyRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia asociado al en farmacia exitosamente',
            'data' => ['pharmacy_request' => $PharmacyRequest->toArray()]
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
        $PharmacyRequest = PharmacyRequest::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia obtenido exitosamente',
            'data' => ['pharmacy_request' => $PharmacyRequest]
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
        $PharmacyRequest = PharmacyRequest::find($id);
        $PharmacyRequest->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyRequest->pharmacy_inventory_id = $request->pharmacy_inventory_id;
        $PharmacyRequest->pharmacy_product_request_id = $request->pharmacy_product_request_id;
        $PharmacyRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Registro en farmacia actualizado exitosamente',
            'data' => ['pharmacy_request' => $PharmacyRequest]
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
            $PharmacyRequest = PharmacyRequest::find($id);
            $PharmacyRequest->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro en farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registro en farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
