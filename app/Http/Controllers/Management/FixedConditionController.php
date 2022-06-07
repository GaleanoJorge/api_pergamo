<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedCondition;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedCondition = FixedCondition::select();

        if ($request->_sort) {
            $FixedCondition->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedCondition->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedCondition = $FixedCondition->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedCondition = $FixedCondition->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condición obtenidos exitosamente',
            'data' => ['fixed_condition' => $FixedCondition]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedCondition = new FixedCondition;
        $FixedCondition->name = $request->name;
        $FixedCondition->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición asociado exitosamente',
            'data' => ['fixed_condition' => $FixedCondition->toArray()]
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
        $FixedCondition = FixedCondition::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condición obtenido exitosamente',
            'data' => ['fixed_condition' => $FixedCondition]
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
        $FixedCondition = FixedCondition::find($id);
        $FixedCondition->name = $request->name;
        $FixedCondition->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición actualizado exitosamente',
            'data' => ['fixed_condition' => $FixedCondition]
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
            $FixedCondition = FixedCondition::find($id);
            $FixedCondition->delete();

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
