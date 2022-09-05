<?php

namespace App\Http\Controllers\Management;

use App\Models\Factory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FactoryRequest;
use Illuminate\Database\QueryException;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Factory = Factory::select();

        if ($request->_sort != "actions") {
            $Factory->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Factory->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Factory = $Factory->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Factory = $Factory->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Empresas fabricantes de medicamentos obtenidos exitosamente',
            'data' => ['factory' => $Factory]
        ]);
    }


    public function store(FactoryRequest $request): JsonResponse
    {
        $Factory = new Factory;
        $Factory->name = $request->name;
        $Factory->status_id = $request->status_id;
        $Factory->save();
        return response()->json([
            'status' => true,
            'message' => 'Empresas fabricantes de medicamentos  creado exitosamente',
            'data' => ['factory' => $Factory->toArray()]
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
        $Factory = Factory::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Empresas fabricantes de medicamentos obtenido exitosamente',
            'data' => ['factory' => $Factory]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FactoryRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FactoryRequest $request, int $id): JsonResponse
    {
        $Factory = Factory::find($id);
        $Factory->name = $request->name;
        $Factory->status_id = $request->status_id;
        $Factory->save();

        return response()->json([
            'status' => true,
            'message' => 'Empresas fabricantes de medicamentos  actualizado exitosamente',
            'data' => ['factory' => $Factory]
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
            $Factory = Factory::find($id);
            $Factory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Empresas fabricantes de medicamentos  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Empresas fabricantes de medicamentos  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
