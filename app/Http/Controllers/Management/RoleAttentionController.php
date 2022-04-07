<?php

namespace App\Http\Controllers\Management;

use App\Models\RoleAttention;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleAttentionRequest;
use Illuminate\Database\QueryException;

class RoleAttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RoleAttention = RoleAttention::with('role', 'type_of_attention');

        if ($request->_sort) {
            $RoleAttention->orderBy($request->_sort, $request->_order);
        }

        if ($request->role_id) {
            $RoleAttention->where('role_id', $request->role_id);
        }
        if ($request->type_of_attention_id) {
            $RoleAttention->where('type_of_attention_id', $request->type_of_attention_id);
        }

        if ($request->query("pagination", true) == "false") {
            $RoleAttention = $RoleAttention->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 30);

            $RoleAttention = $RoleAttention->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Atenciones por rol obtenidas exitosamente',
            'data' => ['role_attention' => $RoleAttention]
        ]);
    }

    public function store(RoleAttentionRequest $request): JsonResponse
    {
        $components = json_decode($request->type_of_attention_id);

        foreach ($components as $conponent) {

            $RoleAttention = new RoleAttention;
            $RoleAttention->role_id = $request->role_id;
            $RoleAttention->type_of_attention_id = $conponent;
           
            $RoleAttention->save();
        }

     
        return response()->json([
            'status' => true,
            'message' => 'Atenciones por rol creadas exitosamente',
            'data' => ['role_attention' => $RoleAttention->toArray()]
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
        $RoleAttention = RoleAttention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Atenciones por rol obtenidas exitosamente',
            'data' => ['role_attention' => $RoleAttention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RoleAttentionRequest $request, int $id): JsonResponse
    {
        $RoleAttentionDelete = RoleAttention::where('type_of_attention_id', $id);
        $RoleAttentionDelete->delete();
        $components = json_decode($request->type_of_attention_id);

        foreach ($components as $conponent) {
            $RoleAttention =new RoleAttention;
            $RoleAttention->role_id = $id;
            $RoleAttention->type_of_attention_id = $conponent;
    
            $RoleAttention->save();
        }
        

        return response()->json([
            'status' => true,
            'message' => 'Atenciones por rol actualizadas exitosamente',
            'data' => ['role_attention' => $RoleAttention]
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
            $RoleAttention = RoleAttention::find($id);
            $RoleAttention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Atenciones por rol eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Atenciones por rol esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
