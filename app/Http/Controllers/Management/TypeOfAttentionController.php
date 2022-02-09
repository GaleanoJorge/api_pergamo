<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeOfAttention;
use App\Models\Location;
use App\Models\Bed;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeOfAttentionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TypeOfAttentionController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $TypeOfAttention = TypeOfAttention::select();

        if ($request->_sort) {
            $TypeOfAttention->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TypeOfAttention->where('name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) === "false") {
            $TypeOfAttention = $TypeOfAttention->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TypeOfAttention = $TypeOfAttention->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tipo de atención obtenidos exitosamente',
            'data' => ['type_of_attention' => $TypeOfAttention]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeOfAttentionRequest $request
     * @return JsonResponse
     */
    public function store(TypeOfAttentionRequest $request): JsonResponse
    {
        $TypeOfAttention = new TypeOfAttention;
        $TypeOfAttention->name = $request->name;
        $TypeOfAttention->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Tipo de atención creado exitosamente',
            'data' => ['type_of_attention' => $TypeOfAttention->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $TypeOfAttention = TypeOfAttention::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de atención obtenido exitosamente',
            'data' => ['type_of_attention' => $TypeOfAttention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $TypeOfAttention = TypeOfAttention::find($id);
        $TypeOfAttention->name = $request->name;
        $TypeOfAttention->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Tipo de atención actualizado exitosamente',
            'data' => ['type_of_attention' => $TypeOfAttention]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $TypeOfAttention = TypeOfAttention::find($id);
            $TypeOfAttention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de atención eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de atención está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
