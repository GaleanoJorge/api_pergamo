<?php

namespace App\Http\Controllers\Management;

use App\Models\ServicesFixedStock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ServicesFixedStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServicesFixedStock = ServicesFixedStock::select();

        if ($request->_sort) {
            $ServicesFixedStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ServicesFixedStock->where('status', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ServicesFixedStock = $ServicesFixedStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServicesFixedStock = $ServicesFixedStock->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Servicios en Activos fijos obtenidos exitosamente',
            'data' => ['services_fixed_stock' => $ServicesFixedStock]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        // $ServicesFixedStockDelete = ServicesFixedStock::where('fixed_stock_id', $request->fixed_stock_id)->get();
        // $ServicesFixedStockDelete->delete();

        $services = json_decode($request->services);
        foreach ($services as $service) {
            $ServicesFixedStock = new ServicesFixedStock;
            $ServicesFixedStock->fixed_stock_id = $request->fixed_stock_id;
            $ServicesFixedStock->scope_of_attention_id = $service;
            $ServicesFixedStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Servicios en Activos fijos asociado al en Activos fijos exitosamente',
            'data' => ['services_fixed_stock' => $ServicesFixedStock->toArray()]
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
        $ServicesFixedStock = ServicesFixedStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicios en Activos fijos obtenido exitosamente',
            'data' => ['services_fixed_stock' => $ServicesFixedStock]
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
        $ServicesFixedStock = ServicesFixedStock::find($id);
        $ServicesFixedStock->fixed_stock_id = $request->fixed_stock_id;
        $ServicesFixedStock->scope_of_attention_id = $request->scope_of_attention_id;



        $ServicesFixedStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Servicios en Activos fijos actualizado exitosamente',
            'data' => ['services_fixed_stock' => $ServicesFixedStock]
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
            $ServicesFixedStock = ServicesFixedStock::find($id);
            $ServicesFixedStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Servicios en Activos fijos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Servicios en Activos fijos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
