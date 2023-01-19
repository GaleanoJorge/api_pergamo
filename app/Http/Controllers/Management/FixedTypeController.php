<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedType = FixedType::select();

        if ($request->_sort) {
            $FixedType->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedType->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedType = $FixedType->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedType = $FixedType->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenidos exitosamente',
            'data' => ['fixed_type' => $FixedType]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedType = new FixedType;
        $FixedType->name = $request->name;
        $FixedType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo asociado exitosamente',
            'data' => ['fixed_type' => $FixedType->toArray()]
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
        $FixedType = FixedType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenido exitosamente',
            'data' => ['fixed_type' => $FixedType]
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
        $FixedType = FixedType::find($id);
        $FixedType->name = $request->name;
        $FixedType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo actualizado exitosamente',
            'data' => ['fixed_type' => $FixedType]
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
            $FixedType = FixedType::find($id);
            $FixedType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
