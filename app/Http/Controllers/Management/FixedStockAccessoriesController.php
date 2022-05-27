<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedStockAccessories;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedStockAccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedStockAccessories = FixedStockAccessories::select();

        if ($request->_sort) {
            $FixedStockAccessories->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedStockAccessories->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedStockAccessories = $FixedStockAccessories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedStockAccessories = $FixedStockAccessories->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Accesorios obtenidos exitosamente',
            'data' => ['fixed_stock_accessories' => $FixedStockAccessories]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedStockAccessories = new FixedStockAccessories;
        $FixedStockAccessories->amount_loan = $request->amount_loan;
        $FixedStockAccessories->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedStockAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios asociado exitosamente',
            'data' => ['fixed_stock_accessories' => $FixedStockAccessories->toArray()]
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
        $FixedStockAccessories = FixedStockAccessories::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios obtenido exitosamente',
            'data' => ['fixed_stock_accessories' => $FixedStockAccessories]
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
        $FixedStockAccessories = FixedStockAccessories::find($id);
        $FixedStockAccessories->amount_loan = $request->amount_loan;
        $FixedStockAccessories->fixed_accessories_id = $request->fixed_accessories_id;
        $FixedStockAccessories->save();

        return response()->json([
            'status' => true,
            'message' => 'Accesorios actualizado exitosamente',
            'data' => ['fixed_stock_accessories' => $FixedStockAccessories]
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
            $FixedStockAccessories = FixedStockAccessories::find($id);
            $FixedStockAccessories->delete();

            return response()->json([
                'status' => true,
                'message' => 'Accesorios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Accesorios en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
