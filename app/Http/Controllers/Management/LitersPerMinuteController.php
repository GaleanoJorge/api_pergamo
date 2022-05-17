<?php

namespace App\Http\Controllers\Management;

use App\Models\LitersPerMinute;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LitersPerMinuteRequest;
use Illuminate\Database\QueryException;

class LitersPerMinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LitersPerMinute = LitersPerMinute::select();

        if ($request->_sort) {
            $LitersPerMinute->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LitersPerMinute->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LitersPerMinute = $LitersPerMinute->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $LitersPerMinute = $LitersPerMinute->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Litros Por Minutos obtenidas exitosamente',
            'data' => ['liters_per_minute' => $LitersPerMinute]
        ]);
    }

    public function store(LitersPerMinuteRequest $request): JsonResponse
    {
        $LitersPerMinute = new LitersPerMinute;
        $LitersPerMinute->name = $request->name;
        $LitersPerMinute->description = $request->description;

        $LitersPerMinute->save();

        return response()->json([
            'status' => true,
            'message' => 'Litros Por Minutos creadas exitosamente',
            'data' => ['liters_per_minute' => $LitersPerMinute->toArray()]
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
        $LitersPerMinute = LitersPerMinute::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Litros Por Minutos obtenidas exitosamente',
            'data' => ['liters_per_minute' => $LitersPerMinute]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(LitersPerMinuteRequest $request, int $id): JsonResponse
    {
        $LitersPerMinute = LitersPerMinute::find($id);
        $LitersPerMinute->name = $request->name;
        $LitersPerMinute->save();

        return response()->json([
            'status' => true,
            'message' => 'Litros Por Minutos actualizadas exitosamente',
            'data' => ['liters_per_minute' => $LitersPerMinute]
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
            $LitersPerMinute = LitersPerMinute::find($id);
            $LitersPerMinute->delete();

            return response()->json([
                'status' => true,
                'message' => 'Litros Por Minutos eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Litros Por Minutos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
