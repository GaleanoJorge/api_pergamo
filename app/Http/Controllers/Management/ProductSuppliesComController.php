<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductSuppliesCom;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSuppliesComRequest;
use Illuminate\Database\QueryException;

class ProductSuppliesComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Products = ProductSuppliesCom::with('product_supplies', 'factory');

        if ($request->_sort) {
            $Products->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Products->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Products = $Products->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Products = $Products->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Productos de insumos obtenidos exitosamente',
            'data' => ['product_supplies_com' => $Products]
        ]);
    }


    public function store(ProductSuppliesComRequest $request): JsonResponse
    {
        $ProductSuppliesCom = new ProductSuppliesCom;
        $ProductSuppliesCom->name = $request->name;
        $ProductSuppliesCom->factory_id = $request->factory_id;
        $ProductSuppliesCom->product_supplies_id = $request->product_supplies_id;
        $ProductSuppliesCom->invima_registration = $request->invima_registration;
        $ProductSuppliesCom->invima_status_id = $request->invima_status_id;
        $ProductSuppliesCom->sanitary_registration_id = $request->sanitary_registration_id;
        $ProductSuppliesCom->packing_id = $request->packing_id;
        $ProductSuppliesCom->unit_packing = $request->unit_packing;
        $ProductSuppliesCom->code_cum_file = $request->code_cum_file;
        $ProductSuppliesCom->code_cum_consecutive = $request->code_cum_consecutive;
        $ProductSuppliesCom->useful_life = $request->useful_life;
        $ProductSuppliesCom->date_cum = $request->date_cum;
        $ProductSuppliesCom->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos de insumos creado exitosamente',
            'data' => ['product_supplies_com' => $ProductSuppliesCom->toArray()]
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
        $ProductSuppliesCom = ProductSuppliesCom::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Productos de insumos obtenido exitosamente',
            'data' => ['product_supplies_com' => $ProductSuppliesCom]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductSuppliesComRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductSuppliesComRequest $request, int $id): JsonResponse
    {
        $ProductSuppliesCom = ProductSuppliesCom::find($id);
        $ProductSuppliesCom->name = $request->name;
        $ProductSuppliesCom->factory_id = $request->factory_id;
        $ProductSuppliesCom->product_supplies_id = $request->product_supplies_id;
        $ProductSuppliesCom->invima_registration = $request->invima_registration;
        $ProductSuppliesCom->invima_status_id = $request->invima_status_id;
        $ProductSuppliesCom->sanitary_registration_id = $request->sanitary_registration_id;
        $ProductSuppliesCom->packing_id = $request->packing_id;
        $ProductSuppliesCom->unit_packing = $request->unit_packing;
        $ProductSuppliesCom->code_cum_file = $request->code_cum_file;
        $ProductSuppliesCom->code_cum_consecutive = $request->code_cum_consecutive;
        $ProductSuppliesCom->useful_life = $request->useful_life;
        $ProductSuppliesCom->date_cum = $request->date_cum;
        $ProductSuppliesCom->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos de insumos actualizado exitosamente',
            'data' => ['product_supplies_com' => $ProductSuppliesCom]
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
            $ProductSuppliesCom = ProductSuppliesCom::find($id);
            $ProductSuppliesCom->delete();

            return response()->json([
                'status' => true,
                'message' => 'Productos de insumos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Productos de insumos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
