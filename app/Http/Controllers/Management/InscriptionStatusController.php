<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\InscriptionStatusRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\InscriptionStatus;

class InscriptionStatusController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $inscriptionStatus = InscriptionStatus::select('*');

        if ($request->_sort) {
            $inscriptionStatus->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $inscriptionStatus->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $inscriptionStatus = $inscriptionStatus->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $inscriptionStatus = $inscriptionStatus->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estados inscripción obtenidos exitosamente',
            'data' => ['inscriptionStatus' => $inscriptionStatus]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InscriptionStatusRequest $request
     * @return JsonResponse
     */
    public function store(InscriptionStatusRequest $request): JsonResponse
    {
        $inscriptionStatus = new InscriptionStatus;
        $inscriptionStatus->name = $request->name;
        $inscriptionStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado inscripción creado exitosamente',
            'data' => ['inscriptionStatus' => $inscriptionStatus->toArray()]
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
        $inscriptionStatus = InscriptionStatus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado inscripción obtenido exitosamente',
            'data' => ['inscriptionStatus' => $inscriptionStatus]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InscriptionStatusRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(InscriptionStatusRequest $request, int $id): JsonResponse
    {
        $inscriptionStatus = InscriptionStatus::find($id);
        $inscriptionStatus->name = $request->name;
        $inscriptionStatus->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado inscripción actualizado exitosamente',
            'data' => ['inscriptionStatus' => $inscriptionStatus]
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
            $inscriptionStatus = InscriptionStatus::find($id);
            $inscriptionStatus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado inscripción eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El estado inscripción está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
