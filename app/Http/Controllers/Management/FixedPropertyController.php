<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedProperty;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedProperty = FixedProperty::select();

        if ($request->_sort) {
            $FixedProperty->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedProperty->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedProperty = $FixedProperty->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedProperty = $FixedProperty->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condición obtenidos exitosamente',
            'data' => ['fixed_property' => $FixedProperty]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedProperty = new FixedProperty;
        $FixedProperty->name = $request->name;
        $FixedProperty->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición asociado exitosamente',
            'data' => ['fixed_property' => $FixedProperty->toArray()]
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
        $FixedProperty = FixedProperty::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condición obtenido exitosamente',
            'data' => ['fixed_property' => $FixedProperty]
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
        $FixedProperty = FixedProperty::find($id);
        $FixedProperty->name = $request->name;
        $FixedProperty->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición actualizado exitosamente',
            'data' => ['fixed_property' => $FixedProperty]
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
            $FixedProperty = FixedProperty::find($id);
            $FixedProperty->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condición eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condición en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
