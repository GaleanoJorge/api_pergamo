<?php

namespace App\Http\Controllers\Management;

use App\Models\DietAdmissionComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietAdmissionComponentRequest;
use Illuminate\Database\QueryException;

class DietAdmissionComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietAdmissionComponent = DietAdmissionComponent::with('diet_admission', 'diet_component');

        if ($request->_sort) {
            $DietAdmissionComponent->orderBy($request->_sort, $request->_order);
        }

        if ($request->diet_admission_id) {
            $DietAdmissionComponent->where('diet_admission_id', $request->diet_admission_id);
        }
        if ($request->diet_component_id) {
            $DietAdmissionComponent->where('diet_component_id', $request->diet_component_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DietAdmissionComponent = $DietAdmissionComponent->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietAdmissionComponent = $DietAdmissionComponent->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_admission_component' => $DietAdmissionComponent]
        ]);
    }

    public function store(DietAdmissionComponentRequest $request): JsonResponse
    {
        $components = json_decode($request->diet_component_id);

        foreach ($components as $conponent) {

            $DietAdmissionComponent = new DietAdmissionComponent;
            $DietAdmissionComponent->diet_admission_id = $request->diet_admission_id;
            $DietAdmissionComponent->diet_component_id = $conponent;
           
            $DietAdmissionComponent->save();
        }

     
        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas creadas exitosamente',
            'data' => ['diet_admission_component' => $DietAdmissionComponent->toArray()]
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
        $DietAdmissionComponent = DietAdmissionComponent::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas obtenidas exitosamente',
            'data' => ['diet_admission_component' => $DietAdmissionComponent]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietAdmissionComponentRequest $request, int $id): JsonResponse
    {
        $DietAdmissionComponentDelete = DietAdmissionComponent::where('diet_component_id', $id);
        $DietAdmissionComponentDelete->delete();
        $components = json_decode($request->diet_component_id);

        foreach ($components as $conponent) {
            $DietAdmissionComponent =new DietAdmissionComponent;
            $DietAdmissionComponent->diet_admission_id = $id;
            $DietAdmissionComponent->diet_component_id = $conponent;
    
            $DietAdmissionComponent->save();
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Plato de menú de dietas actualizadas exitosamente',
            'data' => ['diet_admission_component' => $DietAdmissionComponent]
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
            $DietAdmissionComponent = DietAdmissionComponent::find($id);
            $DietAdmissionComponent->delete();

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
