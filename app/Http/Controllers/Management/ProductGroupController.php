<?php

namespace App\Http\Controllers\Management;

use App\Models\ProductGroup;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductGroupRequest;
use Illuminate\Database\QueryException;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProductGroup = ProductGroup::select();

        if ($request->_sort) {
            $ProductGroup->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ProductGroup->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $ProductGroup->where('id', $request->id);
        }

        if ($request->query("pagination", true) == "false") {
            $ProductGroup = $ProductGroup->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProductGroup = $ProductGroup->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Grupo de Productos obtenidos exitosamente',
            'data' => ['product_group' => $ProductGroup]
        ]);
    }


    public function store(ProductGroupRequest $request): JsonResponse
    {
        $ProductGroup = new ProductGroup;
        $ProductGroup->name = $request->name;
        $ProductGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo de Productos creado exitosamente',
            'data' => ['product_group' => $ProductGroup->toArray()]
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
        $ProductGroup = ProductGroup::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Grupo de Productos obtenido exitosamente',
            'data' => ['product_group' => $ProductGroup]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductGroupRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProductGroupRequest $request, int $id): JsonResponse
    {
        $ProductGroup = ProductGroup::find($id);
        $ProductGroup->name = $request->name;
        $ProductGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Grupo de Productos actualizado exitosamente',
            'data' => ['product_group' => $ProductGroup]
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
            $ProductGroup = ProductGroup::find($id);
            $ProductGroup->delete();

            return response()->json([
                'status' => true,
                'message' => 'Grupo de Productos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Grupo de Productos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
