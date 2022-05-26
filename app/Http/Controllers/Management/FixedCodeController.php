<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedCode;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedCode = FixedCode::select();

        if ($request->_sort) {
            $FixedCode->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedCode->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedCode = $FixedCode->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedCode = $FixedCode->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Codigo de clasificación obtenidos exitosamente',
            'data' => ['fixed_code' => $FixedCode]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedCode = new FixedCode;
        $FixedCode->name = $request->name;
        $FixedCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de clasificación asociado al paciente exitosamente',
            'data' => ['fixed_code' => $FixedCode->toArray()]
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
        $FixedCode = FixedCode::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de clasificación obtenido exitosamente',
            'data' => ['fixed_code' => $FixedCode]
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
        $FixedCode = FixedCode::find($id);
        $FixedCode->name = $request->name;
        $FixedCode->save();

        return response()->json([
            'status' => true,
            'message' => 'Codigo de clasificación actualizado exitosamente',
            'data' => ['fixed_code' => $FixedCode]
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
            $FixedCode = FixedCode::find($id);
            $FixedCode->delete();

            return response()->json([
                'status' => true,
                'message' => 'Codigo de clasificación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Codigo de clasificación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
