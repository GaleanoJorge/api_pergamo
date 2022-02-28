<?php

namespace App\Http\Controllers\Management;

use App\Models\DietSupplies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietSuppliesRequest;
use Illuminate\Database\QueryException;

class DietSuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietSupplies = DietSupplies::with('diet_supply_type', 'measurement_units');

        if ($request->_sort) {
            $DietSupplies->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietSupplies->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->diet_supply_type_id) {
            $DietSupplies->where('diet_supply_type_id', $request->diet_supply_type_id);
        }
        if ($request->measurement_units_id) {
            $DietSupplies->where('measurement_units_id', $request->measurement_units_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietSupplies = $DietSupplies->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietSupplies = $DietSupplies->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Insumos de dietas obtenidas exitosamente',
            'data' => ['diet_supplies' => $DietSupplies]
        ]);
    }

    public function store(DietSuppliesRequest $request): JsonResponse
    {
        $DietSupplies = new DietSupplies;
        $DietSupplies->name = $request->name;
        $DietSupplies->diet_supply_type_id = $request->diet_supply_type_id;
        $DietSupplies->measurement_units_id = $request->measurement_units_id;
       
        $DietSupplies->save();
     
        return response()->json([
            'status' => true,
            'message' => 'Insumos de dietas creadas exitosamente',
            'data' => ['diet_supplies' => $DietSupplies->toArray()]
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
        $DietSupplies = DietSupplies::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Insumos de dietas obtenidas exitosamente',
            'data' => ['diet_supplies' => $DietSupplies]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietSuppliesRequest $request, int $id): JsonResponse
    {
        $DietSupplies = DietSupplies::find($id);
        $DietSupplies->name = $request->name;
        $DietSupplies->diet_supply_type_id = $request->diet_supply_type_id;
        $DietSupplies->measurement_units_id = $request->measurement_units_id;

        $DietSupplies->save();

        return response()->json([
            'status' => true,
            'message' => 'Insumos de dietas actualizadas exitosamente',
            'data' => ['diet_supplies' => $DietSupplies]
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
            $DietSupplies = DietSupplies::find($id);
            $DietSupplies->delete();

            return response()->json([
                'status' => true,
                'message' => 'Insumos de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Insumos de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
