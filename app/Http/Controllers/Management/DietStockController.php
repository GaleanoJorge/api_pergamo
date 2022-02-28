<?php

namespace App\Http\Controllers\Management;

use App\Models\DietStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietStockRequest;
use Illuminate\Database\QueryException;

class DietStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietStock = DietStock::with('diet_supplies', 'company');

        if ($request->_sort) {
            $DietStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietStock->where('amount', 'like', '%' . $request->search . '%');
        }
        if ($request->company_id) {
            $DietStock->where('company_id', $request->company_id);
        }
        if ($request->diet_supplies_id) {
            $DietStock->where('diet_supplies_id', $request->diet_supplies_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietStock = $DietStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietStock = $DietStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas obtenidas exitosamente',
            'data' => ['diet_stock' => $DietStock]
        ]);
    }

    public function store(DietStockRequest $request): JsonResponse
    {
        $DietStock = new DietStock;
        $DietStock->amount = $request->amount;
        $DietStock->company_id = $request->company_id;
        $DietStock->diet_supplies_id = $request->diet_supplies_id;

        $DietStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas creadas exitosamente',
            'data' => ['diet_stock' => $DietStock->toArray()]
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
        $DietStock = DietStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas obtenidas exitosamente',
            'data' => ['diet_stock' => $DietStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietStockRequest $request, int $id): JsonResponse
    {
        $DietStock = DietStock::find($id);
        $DietStock->amount = $request->amount;
        $DietStock->company_id = $request->company_id;
        $DietStock->diet_supplies_id = $request->diet_supplies_id;

        $DietStock->save();

        return response()->json([
            'status' => true,
            'message' => 'Inventarios de dietas actualizadas exitosamente',
            'data' => ['diet_stock' => $DietStock]
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
            $DietStock = DietStock::find($id);
            $DietStock->delete();

            return response()->json([
                'status' => true,
                'message' => 'Inventarios de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Inventarios de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
