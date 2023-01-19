<?php

namespace App\Http\Controllers\Management;

use App\Models\StorageConditions;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorageConditionsRequest;
use Illuminate\Database\QueryException;

class StorageConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $StorageConditions = StorageConditions::select();

        if ($request->_sort) {
            if ($request->_sort != "actions") {

                $StorageConditions->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->search) {
            $StorageConditions->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $StorageConditions = $StorageConditions->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $StorageConditions = $StorageConditions->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condiciones de almacenamiento listados exitosamente',
            'data' => ['storage_conditions' => $StorageConditions]
        ]);
    }


    public function store(StorageConditionsRequest $request): JsonResponse
    {
        $StorageConditions = new StorageConditions;
        $StorageConditions->name = $request->name;
        $StorageConditions->save();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de almacenamiento creada exitosamente',
            'data' => ['storage_conditions' => $StorageConditions->toArray()]
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
        $StorageConditions = StorageConditions::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de almacenamiento obtenido exitosamente',
            'data' => ['storage_conditions' => $StorageConditions]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(StorageConditionsRequest $request, int $id): JsonResponse
    {
        $StorageConditions = StorageConditions::find($id);
        $StorageConditions->name = $request->name;
        $StorageConditions->save();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de almacenamiento actualizado exitosamente',
            'data' => ['storage_conditions' => $StorageConditions]
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
            $StorageConditions = StorageConditions::find($id);
            $StorageConditions->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condiciones de almacenamiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condiciones de almacenamiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
