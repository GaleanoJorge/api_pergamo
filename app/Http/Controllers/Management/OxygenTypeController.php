<?php

namespace App\Http\Controllers\Management;

use App\Models\OxygenType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OxygenTypeRequest;
use Illuminate\Database\QueryException;

class OxygenTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $OxygenType = OxygenType::select();

        if ($request->_sort) {
            $OxygenType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $OxygenType->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $OxygenType = $OxygenType->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $OxygenType = $OxygenType->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de Oxigeno obtenidas exitosamente',
            'data' => ['oxygen_type' => $OxygenType]
        ]);
    }

    public function store(OxygenTypeRequest $request): JsonResponse
    {
        $OxygenType = new OxygenType;
        $OxygenType->name = $request->name;
        $OxygenType->description = $request->description;

        $OxygenType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Oxigeno creadas exitosamente',
            'data' => ['oxygen_type' => $OxygenType->toArray()]
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
        $OxygenType = OxygenType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Oxigeno obtenidas exitosamente',
            'data' => ['oxygen_type' => $OxygenType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(OxygenTypeRequest $request, int $id): JsonResponse
    {
        $OxygenType = OxygenType::find($id);
        $OxygenType->name = $request->name;
       

        $OxygenType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Oxigeno actualizadas exitosamente',
            'data' => ['oxygen_type' => $OxygenType]
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
            $OxygenType = OxygenType::find($id);
            $OxygenType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de Oxigeno eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de Oxigeno esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
