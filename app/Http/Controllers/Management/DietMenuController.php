<?php

namespace App\Http\Controllers\Management;

use App\Models\DietMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietMenuRequest;
use Illuminate\Database\QueryException;

class DietMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietMenu = DietMenu::with('diet_consistency', 'diet_menu_type', 'diet_week', 'diet_day');

        if ($request->_sort) {
            $DietMenu->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietMenu->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->diet_consistency_id) {
            $DietMenu->where('diet_consistency_id', $request->diet_consistency_id);
        }
        if ($request->diet_menu_type_id) {
            $DietMenu->where('diet_menu_type_id', $request->diet_menu_type_id);
        }
        if ($request->diet_week_id) {
            $DietMenu->where('diet_week_id', $request->diet_week_id);
        }
        if ($request->diet_day_id) {
            $DietMenu->where('diet_day_id', $request->diet_day_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietMenu = $DietMenu->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietMenu = $DietMenu->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Menús de dietas obtenidas exitosamente',
            'data' => ['diet_menu' => $DietMenu]
        ]);
    }

    public function store(DietMenuRequest $request): JsonResponse
    {
        $DietMenu = new DietMenu;
        $DietMenu->name = $request->name;
        $DietMenu->diet_consistency_id = $request->diet_consistency_id;
        $DietMenu->diet_menu_type_id = $request->diet_menu_type_id;
        $DietMenu->diet_week_id = $request->diet_week_id;
        $DietMenu->diet_day_id = $request->diet_day_id;
       
        $DietMenu->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Menús de dietas creadas exitosamente',
            'data' => ['diet_menu' => $DietMenu->toArray()]
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
        $DietMenu = DietMenu::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Menús de dietas obtenidas exitosamente',
            'data' => ['diet_menu' => $DietMenu]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietMenuRequest $request, int $id): JsonResponse
    {
        $DietMenu = DietMenu::find($id);
        $DietMenu->name = $request->name;
        $DietMenu->diet_consistency_id = $request->diet_consistency_id;
        $DietMenu->diet_menu_type_id = $request->diet_menu_type_id;
        $DietMenu->diet_week_id = $request->diet_week_id;
        $DietMenu->diet_day_id = $request->diet_day_id;

        $DietMenu->save();

        return response()->json([
            'status' => true,
            'message' => 'Menús de dietas actualizadas exitosamente',
            'data' => ['diet_menu' => $DietMenu]
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
            $DietMenu = DietMenu::find($id);
            $DietMenu->delete();

            return response()->json([
                'status' => true,
                'message' => 'Menús de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Menús de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
