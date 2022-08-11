<?php

namespace App\Http\Controllers\Management;

use App\Models\ServicesPharmacyStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ServicesPharmacyStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServicesPharmacyStock = ServicesPharmacyStock::select();

        if ($request->_sort) {
            $ServicesPharmacyStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ServicesPharmacyStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ServicesPharmacyStock = $ServicesPharmacyStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServicesPharmacyStock = $ServicesPharmacyStock->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Servicios en farmacia obtenidos exitosamente',
            'data' => ['services_pharmacy_stock' => $ServicesPharmacyStock]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        // $ServicesPharmacyStockDelete = ServicesPharmacyStock::where('pharmacy_stock_id', $request->pharmacy_stock_id)->get();
        // $ServicesPharmacyStockDelete->delete();

        $services = json_decode($request->services);
        foreach ($services as $service) {
            $ServicesPharmacyStock = new ServicesPharmacyStock;
            $ServicesPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
            $ServicesPharmacyStock->scope_of_attention_id = $service;
            $ServicesPharmacyStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Servicios en farmacia asociado al en farmacia exitosamente',
            'data' => ['services_pharmacy_stock' => $ServicesPharmacyStock->toArray()]
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
        $ServicesPharmacyStock = ServicesPharmacyStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicios en farmacia obtenido exitosamente',
            'data' => ['services_pharmacy_stock' => $ServicesPharmacyStock]
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
        $ServicesPharmacyStock = ServicesPharmacyStock::find($id);
        $ServicesPharmacyStock->pharmacy_stock_id = $request->pharmacy_stock_id;
        $ServicesPharmacyStock->scope_of_attention_id = $request->scope_of_attention_id;



        $ServicesPharmacyStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicios en farmacia actualizado exitosamente',
            'data' => ['services_pharmacy_stock' => $ServicesPharmacyStock]
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
            $ServicesPharmacyStock = ServicesPharmacyStock::find($id);
            $ServicesPharmacyStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Servicios en farmacia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Servicios en farmacia en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
