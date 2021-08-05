<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Origin;
use App\Http\Requests\OriginRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $origins = Origin::with('user', 'validity');

        if ($request->_sort) {
            $origins->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $origins->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->validity_id) {
            $origins->where('validity_id', $request->validity_id);
        }
        if ($request->user_id) {
            $origins->where('user_id', $request->user_id);
        }

        if ($request->query("pagination", true) === "false") {
            $origins = $origins->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $origins = $origins->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Planes de formacion obtenidos exitosamente',
            'data' => ['origins' => $origins]
        ]);
    }

    /**
     * Get the origin of authenticated user
     *
     * @return JsonResponse
     */
    public function getByUserAuth(): JsonResponse
    {
        $userOrigins = Auth::user()->origins->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Planes de formacion del usuario obtenidos exitosamente.',
            'data' => ['origins' => $userOrigins]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OriginRequest $request
     * @return JsonResponse
     */

    public function store(OriginRequest $request): JsonResponse
    {
        $origin = new Origin;
        $origin->name = $request->name;
        $origin->validity_id = $request->validity_id;
        $origin->user_id = Auth::user()->id;
        $origin->description = $request->description;
        $origin->save();

        return response()->json([
            'status' => true,
            'message' => 'Plan de formación creado exitosamente',
            'data' => ['origin' => $origin->toArray()]
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
        $origin = Origin::with('user', 'validity')
            ->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Plan de formación obtenido exitosamente',
            'data' => ['origin' => $origin]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OriginRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(OriginRequest $request, int $id): JsonResponse
    {
        $origin = Origin::find($id);
        $origin->name = $request->name;
        $origin->validity_id = $request->validity_id;
        $origin->description = $request->description;
        $origin->save();

        return response()->json([
            'status' => true,
            'message' => 'Plan de formación actualizado exitosamente',
            'data' => ['origin' => $origin]
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
            $origin = Origin::find($id);
            $origin->delete();

            return response()->json([
                'status' => true,
                'message' => 'Plan de formación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El plan de formación esta en uso, no es posible eliminar'
            ], 423);
        }
    }
}
