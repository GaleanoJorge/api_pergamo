<?php

namespace App\Http\Controllers\Management;

use App\Models\AdministrationRoute;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdministrationRouteRequest;
use Illuminate\Database\QueryException;

class AdministrationRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AdministrationRoute = AdministrationRoute::select();

        if ($request->_sort) {
            if ($request->_sort != "actions") {

                $AdministrationRoute->orderBy($request->_sort, $request->_order);
            }
        }

        if ($request->search) {
            $AdministrationRoute->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $AdministrationRoute = $AdministrationRoute->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AdministrationRoute = $AdministrationRoute->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Vía De Administración  obtenidos exitosamente',
            'data' => ['administration_route' => $AdministrationRoute]
        ]);
    }


    public function store(AdministrationRouteRequest $request): JsonResponse
    {
        $AdministrationRoute = new AdministrationRoute;
        $AdministrationRoute->name = $request->name;
        $AdministrationRoute->save();

        return response()->json([
            'status' => true,
            'message' => 'Vía De Administración  creado exitosamente',
            'data' => ['administration_route' => $AdministrationRoute->toArray()]
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
        $AdministrationRoute = AdministrationRoute::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Vía De Administración  obtenido exitosamente',
            'data' => ['administration_route' => $AdministrationRoute]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdministrationRouteRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AdministrationRouteRequest $request, int $id): JsonResponse
    {
        $AdministrationRoute = AdministrationRoute::find($id);
        $AdministrationRoute->name = $request->name;
        $AdministrationRoute->save();

        return response()->json([
            'status' => true,
            'message' => 'Vía De Administración  actualizado exitosamente',
            'data' => ['administration_route' => $AdministrationRoute]
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
            $AdministrationRoute = AdministrationRoute::find($id);
            $AdministrationRoute->delete();

            return response()->json([
                'status' => true,
                'message' => 'Vía De Administración  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Vía De Administración  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
