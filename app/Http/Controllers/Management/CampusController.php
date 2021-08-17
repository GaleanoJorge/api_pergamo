<?php

namespace App\Http\Controllers\Management;

use App\Models\Campus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CampusRequest;
use Illuminate\Database\QueryException;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $campus = Campus::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $campus = Campus::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $campus = Campus::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $campus = Campus::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'campus obtenidas exitosamente',
            'data' => ['campus' => $campus]
        ]);
    }

    public function store(CampusRequest $request): JsonResponse
    {
        $Campus = new Campus;
        $Campus->name = $request->name;
        $Campus->region_id = $request->region_id;
        $Campus->save();

        return response()->json([
            'status' => true,
            'message' => 'Sede creado exitosamente',
            'data' => ['campus' => $Campus->toArray()]
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
        $Campus = Campus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Sedes obtenido exitosamente',
            'data' => ['campus' => $Campus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampusRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CampusRequest $request, int $id): JsonResponse
    {
        $Campus = Campus::find($id);
        $Campus->name = $request->name;
        $Campus->region_id = $request->region_id;
        $Campus->save();

        return response()->json([
            'status' => true,
            'message' => 'Campus actualizado exitosamente',
            'data' => ['campus' => $Campus]
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
            $Campus = Campus::find($id);
            $Campus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Campus eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El campus esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
