<?php

namespace App\Http\Controllers\Management;

use App\Models\ObjetionCode;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ObjetionCodeRequest;
use Illuminate\Database\QueryException;

class ObjetionCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ObjetionCode = ObjetionCode::select();

        if ($request->_sort) {
            $ObjetionCode->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ObjetionCode->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ObjetionCode = $ObjetionCode->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ObjetionCode = $ObjetionCode->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa obtenidos exitosamente',
            'data' => ['objetion_code' => $ObjetionCode]
        ]);
    }

    public function store(ObjetionCodeRequest $request): JsonResponse
    {
        $ObjetionCode = new ObjetionCode;
        $ObjetionCode->name = $request->name;
        $ObjetionCode->code = $request->code;

        $ObjetionCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa creados exitosamente',
            'data' => ['objetion_code' => $ObjetionCode->toArray()]
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
        $ObjetionCode = ObjetionCode::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa obtenidos exitosamente',
            'data' => ['objetion_code' => $ObjetionCode]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ObjetionCodeRequest $request, int $id): JsonResponse
    {
        $ObjetionCode = ObjetionCode::find($id);
        $ObjetionCode->name = $request->name;
        $ObjetionCode->code = $request->code;

        $ObjetionCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad de Glosa actualizados exitosamente',
            'data' => ['objetion_code' => $ObjetionCode]
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
            $ObjetionCode = ObjetionCode::find($id);
            $ObjetionCode->delete();

            return response()->json([
                'status' => true,
                'message' => 'Modalidad de Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Modalidad de Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
