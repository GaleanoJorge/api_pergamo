<?php

namespace App\Http\Controllers\Management;

use App\Models\EntityType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EntityTypeRequest;

class EntityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $entities = EntityType::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $entities = EntityType::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $entities = EntityType::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $entities = EntityType::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de entidades obtenidos exitosamente',
            'data' => ['entities' => $entities]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EntityTypeRequest $request
     * @return JsonResponse
     */

    public function store(EntityTypeRequest $request): JsonResponse
    {
        $EntityType = new EntityType;
        $EntityType->name = $request->name;
        $EntityType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de entidad creado exitosamente',
            'data' => ['entitytype' => $EntityType->toArray()]
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
        $EntityType = EntityType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de entidad obtenido exitosamente',
            'data' => ['entitytype' => $EntityType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EntityTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(EntityTypeRequest $request, int $id): JsonResponse
    {
        $EntityType = EntityType::find($id);
        $EntityType->name = $request->name;
        $EntityType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de entidad actualizado exitosamente',
            'data' => ['entitytype' => $EntityType]
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
            $EntityType = EntityType::find($id);
            $EntityType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de entidad eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El tipo de entidad esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
