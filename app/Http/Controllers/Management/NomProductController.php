<?php

namespace App\Http\Controllers\Management;

use App\Models\NomProduct;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NomProductRequest;
use Illuminate\Database\QueryException;

class NomProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $NomProduct = NomProduct::select();

        if ($request->_sort) {
            if ($request->_sort != "actions") {

                $NomProduct->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->search) {
            $NomProduct->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $NomProduct = $NomProduct->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $NomProduct = $NomProduct->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Nombre productos genericos (Medicamentos) obtenidos exitosamente',
            'data' => ['nom_product' => $NomProduct]
        ]);
    }




    /**
     * Display a listing of the resource
     *
     * @param integer $product_subcategory_id
     * @return JsonResponse
     */
    public function getSubcategoryByCategory(int $product_subcategory_id): JsonResponse
    {
        $NomProduct = NomProduct::where('product_subcategory_id', $product_subcategory_id)
            ->orderBy('name', 'asc')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'SubCategoria de producto obtenidos exitosamente',
            'data' => ['nom_product' => $NomProduct]
        ]);
    }




    public function store(NomProductRequest $request): JsonResponse
    {
        $NomProduct = new NomProduct;
        $NomProduct->name = $request->name;
        $NomProduct->product_subcategory_id = $request->product_subcategory_id;
        $NomProduct->save();

        return response()->json([
            'status' => true,
            'message' => 'Nombre productos genericos (Medicamentos) creado exitosamente',
            'data' => ['nom_product' => $NomProduct->toArray()]
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
        $NomProduct = NomProduct::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nombre productos genericos (Medicamentos) obtenido exitosamente',
            'data' => ['nom_product' => $NomProduct]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NomProductRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(NomProductRequest $request, int $id): JsonResponse
    {
        $NomProduct = NomProduct::find($id);
        $NomProduct->name = $request->name;
        $NomProduct->product_subcategory_id = $request->product_subcategory_id;
        $NomProduct->save();
        return response()->json([
            'status' => true,
            'message' => 'Nombre productos genericos (Medicamentos) actualizado exitosamente',
            'data' => ['nom_product' => $NomProduct]
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
            $NomProduct = NomProduct::find($id);
            $NomProduct->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nombre productos genericos (Medicamentos) eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nombre productos genericos (Medicamentos)esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
