<?php

namespace App\Http\Controllers\Management;

use App\Models\ObjetionCodeResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ObjetionCodeResponseRequest;
use Illuminate\Database\QueryException;

class ObjetionCodeResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ObjetionCodeResponse = ObjetionCodeResponse::select();

        if ($request->_sort) {
            $ObjetionCodeResponse->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ObjetionCodeResponse->where('name', 'like', '%' . $request->search . '%');
        } 

        if ($request->query("pagination", true) == "false") {
            $ObjetionCodeResponse = $ObjetionCodeResponse->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ObjetionCodeResponse = $ObjetionCodeResponse->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Código de objeción respuesta obtenidos exitosamente',
            'data' => ['objetion_code_response' => $ObjetionCodeResponse]
        ]);
    }

    public function store(ObjetionCodeResponseRequest $request): JsonResponse
    {
        $ObjetionCodeResponse = new ObjetionCodeResponse;
        $ObjetionCodeResponse->name = $request->name;
        $ObjetionCodeResponse->code = $request->code;

        $ObjetionCodeResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Código de objeción respuesta creados exitosamente',
            'data' => ['objetion_code_response' => $ObjetionCodeResponse->toArray()]
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
        $ObjetionCodeResponse = ObjetionCodeResponse::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Código de objeción respuesta  obtenidos exitosamente',
            'data' => ['objetion_code_response' => $ObjetionCodeResponse]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ObjetionCodeResponseRequest $request, int $id): JsonResponse
    {
        $ObjetionCodeResponse = ObjetionCodeResponse::find($id);
        $ObjetionCodeResponse->name = $request->name;
        $ObjetionCodeResponse->code = $request->code;
        $ObjetionCodeResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Código de objeción respuesta actualizados exitosamente',
            'data' => ['objetion_code_response' => $ObjetionCodeResponse]
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
            $ObjetionCodeResponse = ObjetionCodeResponse::find($id);
            $ObjetionCodeResponse->delete();

            return response()->json([
                'status' => true,
                'message' => 'Código de objeción respuesta  eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Código de objeción respuesta  estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
