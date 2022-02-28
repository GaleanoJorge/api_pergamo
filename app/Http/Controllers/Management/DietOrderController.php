<?php

namespace App\Http\Controllers\Management;

use App\Models\DietOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietOrderRequest;
use Illuminate\Database\QueryException;

class DietOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietOrder = DietOrder::with('admissions', 'diet_menu');

        if ($request->_sort) {
            $DietOrder->orderBy($request->_sort, $request->_order);
        }

        if ($request->admissions_id) {
            $DietOrder->where('admissions_id', $request->admissions_id);
        }
        if ($request->diet_menu_id) {
            $DietOrder->where('diet_menu_id', $request->diet_menu_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietOrder = $DietOrder->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietOrder = $DietOrder->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_order' => $DietOrder]
        ]);
    }

    public function store(DietOrderRequest $request): JsonResponse
    {
        $components = json_decode($request->diet_component_id);

        foreach ($components as $conponent) {

            $DietOrder = new DietOrder;
            $DietOrder->diet_menu_id = $request->diet_menu_id;
            $DietOrder->admissions_id = $conponent;
           
            $DietOrder->save();
        }

     
        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas creadas exitosamente',
            'data' => ['diet_order' => $DietOrder->toArray()]
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
        $DietOrder = DietOrder::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_order' => $DietOrder]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietOrderRequest $request, int $id): JsonResponse
    {
        $DietOrderDelete = DietOrder::where('diet_menu_id', $id);
        $DietOrderDelete->delete();
        $components = json_decode($request->admissions_id);

        foreach ($components as $conponent) {
            $DietOrder =new DietOrder;
            $DietOrder->diet_menu_id = $id;
            $DietOrder->admissions_id = $conponent;
    
            $DietOrder->save();
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas actualizadas exitosamente',
            'data' => ['diet_order' => $DietOrder]
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
            $DietOrder = DietOrder::find($id);
            $DietOrder->delete();

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
