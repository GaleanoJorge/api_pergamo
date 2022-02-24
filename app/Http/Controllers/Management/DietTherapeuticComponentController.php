<?php

namespace App\Http\Controllers\Management;

use App\Models\DietTherapeuticComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietTherapeuticComponentRequest;
use Illuminate\Database\QueryException;

class DietTherapeuticComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietTherapeuticComponent = DietTherapeuticComponent::with('diet_therapeutic', 'diet_component');

        if ($request->_sort) {
            $DietTherapeuticComponent->orderBy($request->_sort, $request->_order);
        }
        if ($request->diet_therapeutic_id) {
            $DietTherapeuticComponent->where('diet_therapeutic_id', $request->diet_therapeutic_id);
        }
        if ($request->diet_component_id) {
            $DietTherapeuticComponent->where('diet_component_id', $request->diet_component_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietTherapeuticComponent = $DietTherapeuticComponent->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietTherapeuticComponent = $DietTherapeuticComponent->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas y componentes obtenidas exitosamente',
            'data' => ['diet_therapeutic_component' => $DietTherapeuticComponent]
        ]);
    }

    public function store(DietTherapeuticComponentRequest $request): JsonResponse
    {
        $components = json_decode($request->diet_component_id);

        foreach ($components as $conponent) {
            $DietTherapeuticComponent = new DietTherapeuticComponent;
            $DietTherapeuticComponent->diet_therapeutic_id = $request->diet_therapeutic_id;
            $DietTherapeuticComponent->diet_component_id = $conponent;

            $DietTherapeuticComponent->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas y componentes creadas exitosamente',
            'data' => ['diet_therapeutic_component' => $DietTherapeuticComponent->toArray()]
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
        $DietTherapeuticComponent = DietTherapeuticComponent::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas y componentes obtenidas exitosamente',
            'data' => ['diet_therapeutic_component' => $DietTherapeuticComponent]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietTherapeuticComponentRequest $request, int $id): JsonResponse
    {

        $DietTherapeuticComponentDelete = DietTherapeuticComponent::where('diet_therapeutic_id', $id);
        $DietTherapeuticComponentDelete->delete();
        $components = json_decode($request->diet_component_id);

        foreach ($components as $conponent) {
            $DietTherapeuticComponent = new DietTherapeuticComponent;
            $DietTherapeuticComponent->diet_therapeutic_id = $id;
            $DietTherapeuticComponent->diet_component_id = $conponent;

            $DietTherapeuticComponent->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Dietas terapeuticas y componentes actualizadas exitosamente',
            'data' => ['diet_therapeutic_component' => $DietTherapeuticComponent]
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
            $DietTherapeuticComponentDelete = DietTherapeuticComponent::where('diet_therapeutic_id', $id);
            $DietTherapeuticComponentDelete->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dietas terapeuticas y componentes eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dietas terapeuticas y componentes esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
