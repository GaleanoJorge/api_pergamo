<?php

namespace App\Http\Controllers\Management;

use App\Models\ObjetionResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ObjetionResponseRequest;
use Illuminate\Database\QueryException;

class ObjetionResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ObjetionResponse = ObjetionResponse::select();

        if ($request->_sort) {
            $ObjetionResponse->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ObjetionResponse->where('name', 'like', '%' . $request->search . '%');
        } 

        if ($request->query("pagination", true) == "false") {
            $ObjetionResponse = $ObjetionResponse->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ObjetionResponse = $ObjetionResponse->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Objecion pertinente / injustificada obtenidos exitosamente',
            'data' => ['objetion_response' => $ObjetionResponse]
        ]);
    }

    public function store(ObjetionResponseRequest $request): JsonResponse
    {
        $ObjetionResponse = new ObjetionResponse;
        $ObjetionResponse->name = $request->name;
        $ObjetionResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Objecion pertinente / injustificada creados exitosamente',
            'data' => ['objetion_response' => $ObjetionResponse->toArray()]
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
        $ObjetionResponse = ObjetionResponse::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objecion pertinente / injustificada  obtenidos exitosamente',
            'data' => ['objetion_response' => $ObjetionResponse]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ObjetionResponseRequest $request, int $id): JsonResponse
    {
        $ObjetionResponse = ObjetionResponse::find($id);
        $ObjetionResponse->name = $request->name;        
        $ObjetionResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Objecion pertinente / injustificada actualizados exitosamente',
            'data' => ['objetion_response' => $ObjetionResponse]
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
            $ObjetionResponse = ObjetionResponse::find($id);
            $ObjetionResponse->delete();

            return response()->json([
                'status' => true,
                'message' => 'Objecion pertinente / injustificada  eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Objecion pertinente / injustificada  estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
