<?php

namespace App\Http\Controllers\Management;

use App\Models\Area;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $area = Area::select('*');

        if ($request->_sort) {
            $area->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $area->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $area = $area->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $area = $area->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Areas obtenidas exitosamente',
            'data' => ['areas' => $area]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AreaRequest $request
     * @return JsonResponse
     */
    public function store(AreaRequest $request): JsonResponse
    {
        $Area = new Area;
        $Area->name = $request->name;
        $Area->description = $request->description;
        $Area->save();

        return response()->json([
            'status' => true,
            'message' => 'Área creada exitosamente',
            'data' => ['area' => $Area->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $Area = Area::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Área obtenida exitosamente',
            'data' => ['area' => $Area]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AreaRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AreaRequest $request, int $id)
    {
        $Area = Area::find($id);
        $Area->name = $request->name;
        $Area->description = $request->description;
        $Area->save();

        return response()->json([
            'status' => true,
            'message' => 'Área actualizada exitosamente',
            'data' => ['area' => $Area]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $Area = Area::find($id);
            $Area->delete();

            return response()->json([
                'status' => true,
                'message' => 'Área eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Área esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
