<?php

namespace App\Http\Controllers\Management;

use App\Models\DietDishStock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietDishStockRequest;
use Illuminate\Database\QueryException;

class DietDishStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietDishStock = DietDishStock::with('diet_dish', 'diet_supplies')
            ->Join('diet_supplies', 'diet_dish_stock.diet_supplies_id', 'diet_supplies.id')
            ->Join('diet_dish', 'diet_dish_stock.diet_dish_id', 'diet_dish.id');

        if ($request->_sort) {
            $DietDishStock->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietDishStock->where('amount', 'like', '%' . $request->search . '%');
            // ->orWhere('diet_dish.name', 'like', '%' . $request->search . '%')
            // ->orWhere('diet_supplies.name', 'like', '%' . $request->search . '%')
            // ->orWhere('diet_dish.id', 'like', '%' . $request->search . '%')
            // ->orWhere('diet_supplies.id', 'like', '%' . $request->search . '%');
        }
        if ($request->diet_dish_id) {
            $DietDishStock->where('diet_dish_id', $request->diet_dish_id);
        }
        if ($request->diet_supplies_id) {
            $DietDishStock->where('diet_supplies_id', $request->diet_supplies_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietDishStock = $DietDishStock->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietDishStock = $DietDishStock->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Platos de invetario de dietas obtenidas exitosamente',
            'data' => ['diet_dish_stock' => $DietDishStock]
        ]);
    }

    public function store(DietDishStockRequest $request): JsonResponse
    {
        $supplies = json_decode($request->diet_supplies_id);
        foreach ($supplies as $element) {

            $DietDishStock = new DietDishStock;
            $DietDishStock->amount = $element->amount;
            $DietDishStock->diet_dish_id = $request->diet_dish_id;
            $DietDishStock->diet_supplies_id = $element->diet_supplies_id;

            $DietDishStock->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Platos de invetario de dietas creadas exitosamente',
            'data' => ['diet_dish_stock' => $DietDishStock->toArray()]
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
        $DietDishStock = DietDishStock::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Platos de invetario de dietas obtenidas exitosamente',
            'data' => ['diet_dish_stock' => $DietDishStock]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietDishStockRequest $request, int $id): JsonResponse
    {
        $DietDishStockDelete = DietDishStock::where('diet_dish_id', $id);
        $DietDishStockDelete->delete();
        $supplies = json_decode($request->diet_supplies_id);
        foreach ($supplies as $element) {

            $DietDishStock = new DietDishStock;
            $DietDishStock->amount = $element->amount;
            $DietDishStock->diet_dish_id = $id;
            $DietDishStock->diet_supplies_id = $element->diet_supplies_id;

            $DietDishStock->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Platos de invetario de dietas actualizadas exitosamente',
            'data' => ['diet_dish_stock' => $DietDishStock]
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
            $DietDishStockDelete = DietDishStock::where('diet_dish_id', $id);
            $DietDishStockDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Platos de invetario de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Platos de invetario de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
