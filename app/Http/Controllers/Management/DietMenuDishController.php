<?php

namespace App\Http\Controllers\Management;

use App\Models\DietMenuDish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietMenuDishRequest;
use Illuminate\Database\QueryException;

class DietMenuDishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietMenuDish = DietMenuDish::with('diet_menu', 'diet_dish');

        if ($request->_sort) {
            $DietMenuDish->orderBy($request->_sort, $request->_order);
        }

        if ($request->diet_menu_id) {
            $DietMenuDish->where('diet_menu_id', $request->diet_menu_id);
        }
        if ($request->diet_dish_id) {
            $DietMenuDish->where('diet_dish_id', $request->diet_dish_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietMenuDish = $DietMenuDish->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietMenuDish = $DietMenuDish->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_menu_dish' => $DietMenuDish]
        ]);
    }

    public function getByMenuId(Request $request, int $menu_id): JsonResponse
    {
        $DietMenuDish = DietMenuDish::with('diet_menu', 'diet_dish')
            ->where('diet_menu_id', $menu_id);

        if ($request->query("pagination", true) == "false") {
            $DietMenuDish = $DietMenuDish->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietMenuDish = $DietMenuDish->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_menu_dish' => $DietMenuDish]
        ]);
    }

    public function store(DietMenuDishRequest $request): JsonResponse
    {
        $components = json_decode($request->diet_dish_id);

        foreach ($components as $conponent) {
            $DietMenuDish = new DietMenuDish;
            $DietMenuDish->diet_menu_id = $request->diet_menu_id;
            $DietMenuDish->diet_dish_id = $conponent;

            $DietMenuDish->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas creadas exitosamente',
            'data' => ['diet_menu_dish' => $DietMenuDish->toArray()]
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
        $DietMenuDish = DietMenuDish::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_menu_dish' => $DietMenuDish]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietMenuDishRequest $request, int $id): JsonResponse
    {
        $DietMenuDishDelete = DietMenuDish::where('diet_menu_id', $id);
        $DietMenuDishDelete->delete();
        $components = json_decode($request->diet_dish_id);

        foreach ($components as $conponent) {
            $DietMenuDish = new DietMenuDish;
            $DietMenuDish->diet_menu_id = $id;
            $DietMenuDish->diet_dish_id = $conponent;

            $DietMenuDish->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas actualizadas exitosamente',
            'data' => ['diet_menu_dish' => $DietMenuDish]
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
            $DietMenuDishDelete = DietMenuDish::where('diet_menu_id', $id);
            $DietMenuDishDelete->delete();
            return response()->json([
                'status' => true,
                'message' => 'Plato de menú de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Plato de menú de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
