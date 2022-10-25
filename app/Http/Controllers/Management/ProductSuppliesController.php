<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductSupplies;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSuppliesRequest;
use Illuminate\Database\QueryException;

class ProductSuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductSupplies = ProductSupplies::with('size_supplies_measure', 'measure_supplies_measure')->orderBy('description', 'asc');

        if ($request->_sort) {
            if ($request->_sort != "actions" && $request->_sort != "description" && $request->_sort != "factory") {

                $ProductSupplies->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->search) {
            $ProductSupplies->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ProductSupplies = $ProductSupplies->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProductSupplies = $ProductSupplies->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Productos insumos genericos obtenidos exitosamente',
            'data' => ['product_supplies' => $ProductSupplies]
        ]);
    }


    public function store(ProductSuppliesRequest $request): JsonResponse
    {
        $ProductSupplies = new ProductSupplies;
        $ProductSupplies->product_group_id = $request->product_group_id;
        $ProductSupplies->product_category_id = $request->product_category_id;
        $ProductSupplies->product_subcategory_id = $request->product_subcategory_id;
        $ProductSupplies->size = $request->size;
        $ProductSupplies->measure = $request->measure;
        $ProductSupplies->stature = $request->stature;
        $ProductSupplies->minimum_stock = $request->minimum_stock;
        $ProductSupplies->maximum_stock = $request->maximum_stock;
        $ProductSupplies->description = $request->description;
        $ProductSupplies->size_supplies_measure_id = $request->size_supplies_measure_id;
        $ProductSupplies->measure_supplies_measure_id = $request->measure_supplies_measure_id;
        $ProductSupplies->dose = $request->dose;
        $ProductSupplies->code_gmdn = $request->code_gmdn;
        $ProductSupplies->product_dose_id = $request->product_dose_id;
        $ProductSupplies->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos insumos genericos creado exitosamente',
            'data' => ['product_supplies' => $ProductSupplies->toArray()]
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
        $ProductSupplies = ProductSupplies::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Productos insumos genericos obtenido exitosamente',
            'data' => ['product_supplies' => $ProductSupplies]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductSuppliesRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductSuppliesRequest $request, int $id): JsonResponse
    {
        $ProductSupplies = ProductSupplies::find($id);
        $ProductSupplies->product_group_id = $request->product_group_id;
        $ProductSupplies->product_category_id = $request->product_category_id;
        $ProductSupplies->product_subcategory_id = $request->product_subcategory_id;
        $ProductSupplies->size = $request->size;
        $ProductSupplies->measure = $request->measure;
        $ProductSupplies->stature = $request->stature;
        $ProductSupplies->minimum_stock = $request->minimum_stock;
        $ProductSupplies->maximum_stock = $request->maximum_stock;
        $ProductSupplies->description = $request->description;
        $ProductSupplies->size_supplies_measure_id = $request->size_supplies_measure_id;
        $ProductSupplies->measure_supplies_measure_id = $request->measure_supplies_measure_id;
        $ProductSupplies->dose = $request->dose;
        $ProductSupplies->code_gmdn = $request->code_gmdn;
        $ProductSupplies->product_dose_id = $request->product_dose_id;
        $ProductSupplies->save();

        return response()->json([
            'status' => true,
            'message' => 'Productos insumos genericos actualizado exitosamente',
            'data' => ['product_supplies' => $ProductSupplies]
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
            $ProductSupplies = ProductSupplies::find($id);
            $ProductSupplies->delete();

            return response()->json([
                'status' => true,
                'message' => 'Productos insumos genericos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Productos insumos genericosesta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
