<?php

namespace App\Http\Controllers\Management;

use App\Models\DietComponent;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DietComponentRequest;
use Illuminate\Database\QueryException;

class DietComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DietComponent = DietComponent::select();

        if ($request->_sort) {
            $DietComponent->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DietComponent->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $DietComponent = $DietComponent->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $DietComponent = $DietComponent->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Components de dietas obtenidas exitosamente',
            'data' => ['diet_component' => $DietComponent]
        ]);
    }

    public function store(DietComponentRequest $request): JsonResponse
    {
        $DietComponent = new DietComponent;
        $DietComponent->name = $request->name;
        $DietComponent->description = $request->description;

        $DietComponent->save();

        return response()->json([
            'status' => true,
            'message' => 'Components de dietas creadas exitosamente',
            'data' => ['diet_component' => $DietComponent->toArray()]
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
        $DietComponent = DietComponent::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Components de dietas obtenidas exitosamente',
            'data' => ['diet_component' => $DietComponent]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DietComponentRequest $request, int $id): JsonResponse
    {
        $DietComponent = DietComponent::find($id);
        $DietComponent->name = $request->name;
        $DietComponent->description = $request->description;

        $DietComponent->save();

        return response()->json([
            'status' => true,
            'message' => 'Components de dietas actualizadas exitosamente',
            'data' => ['diet_component' => $DietComponent]
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
            $DietComponent = DietComponent::find($id);
            $DietComponent->delete();

            return response()->json([
                'status' => true,
                'message' => 'Components de dietas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Components de dietas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
