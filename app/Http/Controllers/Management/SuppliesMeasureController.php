<?php

namespace App\Http\Controllers\Management;

use App\Models\SuppliesMeasure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SuppliesMeasureRequest;
use Illuminate\Database\QueryException;

class SuppliesMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SuppliesMeasure = SuppliesMeasure::select();

        if ($request->_sort) {
            $SuppliesMeasure->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SuppliesMeasure->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SuppliesMeasure = $SuppliesMeasure->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SuppliesMeasure = $SuppliesMeasure->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Medida medicamentos exitosamente',
            'data' => ['supplies_measure' => $SuppliesMeasure]
        ]);
    }

    public function store(SuppliesMeasureRequest $request): JsonResponse
    {
        $SuppliesMeasure = new SuppliesMeasure;
        $SuppliesMeasure->name = $request->name;
        $SuppliesMeasure->save();

        return response()->json([
            'status' => true,
            'message' => 'Medida medicamentos creados exitosamente',
            'data' => ['supplies_measure' => $SuppliesMeasure->toArray()]
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
        $SuppliesMeasure = SuppliesMeasure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Medida medicamentos exitosamente',
            'data' => ['supplies_measure' => $SuppliesMeasure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SuppliesMeasureRequest $request, int $id): JsonResponse
    {
        $SuppliesMeasure = SuppliesMeasure::find($id);
        $SuppliesMeasure->name = $request->name;
        $SuppliesMeasure->save();

        return response()->json([
            'status' => true,
            'message' => 'Medida medicamentos actualizados exitosamente',
            'data' => ['supplies_measure' => $SuppliesMeasure]
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
            $SuppliesMeasure = SuppliesMeasure::find($id);
            $SuppliesMeasure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Medida medicamentos eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Medida medicamentos estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
