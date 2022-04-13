<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\PharmacyProductRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class PharmacyProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PharmacyProductRequest = PharmacyProductRequest::with('product_generic', 'pharmacy_stock', 'pharmacy_stock.campus');


        //$PharmacyProductRequest = PharmacyProductRequest::select();

        if ($request->_sort) {
            $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyProductRequest->where('status', 'like', '%' . $request->search . '%');
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byadmission(Request $request, int $id): JsonResponse
    {
        $PharmacyProductRequest = PharmacyProductRequest::where('admissions_id', $id);

        if ($request->_sort) {
            $PharmacyProductRequest->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $PharmacyProductRequest->where('status', 'like', '%' . $request->search . '%');
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


    public function store(Request $request): JsonResponse
    {
        $PharmacyProductRequest = new PharmacyProductRequest;
        $PharmacyProductRequest->amount = $request->amount;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyProductRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado asociado al de factura exitosamente',
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
        $PharmacyProductRequest->amount = $request->amount;
        $PharmacyProductRequest->product_generic_id = $request->product_generic_id;
        $PharmacyProductRequest->pharmacy_stock_id = $request->pharmacy_stock_id;
        $PharmacyProductRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Producto solicitado actualizado exitosamente',
            'data' => ['pharmacy_product_request' => $PharmacyProductRequest]
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
