<?php

namespace App\Http\Controllers\Management;

use App\Models\DietSuppliesOutputMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietSuppliesOutputMenuRequest;
use App\Models\DietDishStock;
use App\Models\DietMenuDish;
use App\Models\DietStock;
use Illuminate\Database\QueryException;

class DietSuppliesOutputMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietSuppliesOutputMenu = DietSuppliesOutputMenu::with('diet_supplies_output', 'diet_menu');

        if ($request->_sort) {
            $DietSuppliesOutputMenu->orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $DietSuppliesOutputMenu->where('amount', 'like', '%' . $request->search . '%');
        }
        if ($request->diet_supplies_output_id) {
            $DietSuppliesOutputMenu->where('diet_supplies_output_id', $request->diet_supplies_output_id);
        }
        if ($request->diet_menu_id) {
            $DietSuppliesOutputMenu->where('diet_menu_id', $request->diet_menu_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietSuppliesOutputMenu = $DietSuppliesOutputMenu->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietSuppliesOutputMenu = $DietSuppliesOutputMenu->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Salidas y menús obtenidas exitosamente',
            'data' => ['diet_supplies_output_menu' => $DietSuppliesOutputMenu]
        ]);
    }

    public function store(DietSuppliesOutputMenuRequest $request): JsonResponse
    {
        $campus_id = $request->amount;
        $components = json_decode($request->diet_menu_id);


        foreach ($components as $conponent) {
            $DietSuppliesOutputMenu = new DietSuppliesOutputMenu;
            $DietSuppliesOutputMenu->amount = $conponent->amount;
            $DietSuppliesOutputMenu->diet_supplies_output_id = $request->diet_supplies_output_id;
            $DietSuppliesOutputMenu->diet_menu_id = $conponent->diet_menu_id;

            $DietMenuDish = DietMenuDish::where('diet_menu_id', $conponent->diet_menu_id)->get()->toArray();
            foreach ($DietMenuDish as $dish) {
                $DietDishStock = DietDishStock::where('diet_dish_id', $dish['diet_dish_id'])->get()->toArray();
                foreach ($DietDishStock as $supply) {
                    $arrayTest = DietStock::where('diet_supplies_id', $request->diet_supplies_id)
                        ->where('campus_id', $campus_id)->get()->toArray();
                    if ($arrayTest) {
                        $DietStock = DietStock::where('diet_supplies_id', $supply['diet_supplies_id'])->where('campus_id', $campus_id)->first();
                        $cantidadBase = $DietStock->amount;
                        $cantidadSustraida = $supply['amount'] * $conponent->amount;
                        $cantidadTotal = $cantidadBase - $cantidadSustraida;
                        $DietStock->amount = $cantidadTotal;
                        $DietStock->save();
                    } else {
                        $DietStock = new DietStock;
                        $cantidadBase = 0;
                        $cantidadSustraida = $supply['amount'] * $conponent->amount;
                        $cantidadTotal = $cantidadBase - $cantidadSustraida;
                        $DietStock->amount = $cantidadTotal;
                        $DietStock->campus_id = $campus_id;
                        $DietStock->save();
                    }
                }
            }

            $DietSuppliesOutputMenu->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Salidas y menús creadas exitosamente',
            'data' => ['diet_supplies_output_menu' => $DietSuppliesOutputMenu]
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
        $DietSuppliesOutputMenu = DietSuppliesOutputMenu::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Salidas y menús obtenidas exitosamente',
            'data' => ['diet_supplies_output_menu' => $DietSuppliesOutputMenu]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietSuppliesOutputMenuRequest $request, int $id): JsonResponse
    {

        $DietSuppliesOutputMenuDelete = DietSuppliesOutputMenu::where('diet_supplies_output_id', $id);
        $DietSuppliesOutputMenuDelete->delete();
        $components = json_decode($request->diet_menu_id);

        foreach ($components as $conponent) {
            $DietSuppliesOutputMenu = new DietSuppliesOutputMenu;
            $DietSuppliesOutputMenu->amount = $conponent->amount;
            $DietSuppliesOutputMenu->diet_supplies_output_id = $id;
            $DietSuppliesOutputMenu->diet_menu_id = $conponent->diet_menu_id;

            $DietSuppliesOutputMenu->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Salidas y menús actualizadas exitosamente',
            'data' => ['diet_supplies_output_menu' => $DietSuppliesOutputMenu]
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
            $DietSuppliesOutputMenuDelete = DietSuppliesOutputMenu::where('diet_supplies_output_id', $id);
            $DietSuppliesOutputMenuDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Salidas y menús eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Salidas y menús esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
