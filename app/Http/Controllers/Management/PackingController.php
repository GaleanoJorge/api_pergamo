<?php

namespace App\Http\Controllers\Management;

use App\Models\Packing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Packing = Packing::select();

        if ($request->_sort) {
            $Packing->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Packing->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Packing = $Packing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Packing = $Packing->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenidos exitosamente',
            'data' => ['packing' => $Packing]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Packing = new Packing;
        $Packing->name = $request->name;
        $Packing->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte asociado al paciente exitosamente',
            'data' => ['Packing' => $Packing->toArray()]
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
        $Packing = Packing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenido exitosamente',
            'data' => ['packing' => $Packing]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $Packing = Packing::find($id);
        $Packing->name = $request->name; 
        $Packing->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte actualizado exitosamente',
            'data' => ['packing' => $Packing]
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
            $Packing = Packing::find($id);
            $Packing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de soporte eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de soporte en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
