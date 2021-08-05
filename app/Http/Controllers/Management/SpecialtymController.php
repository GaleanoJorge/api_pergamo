<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialtym;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SpecialtymRequest;


class SpecialtymController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $specialtym = Specialtym::with('status')->orderBy('name');

        if($request->status_id)
        {
            $specialtym->where('status_id',  "=", $request->status_id);
        }

        $specialtym = $specialtym->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Especialidades obtenidas exitosamente.',
            'data' => ['specialtym' => $specialtym]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SpecialtymRequest $request
     * @return JsonResponse
     */

    public function store(SpecialtymRequest $request): JsonResponse
    {
        $specialtym = new Specialtym;
        $specialtym->name = $request->name;
        $specialtym->status_id = $request->status_id;
        $specialtym->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad creada exitosamente',
            'data' => ['specialtym' => $specialtym->toArray()]
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
        $specialtym = Specialtym::with('status')
            ->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad obtenida exitosamente',
            'data' => ['specialtym' => $specialtym]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SpecialtymRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SpecialtymRequest $request, int $id): JsonResponse
    {
        $specialtym = Specialtym::find($id);
        $specialtym->name = $request->name;
        $specialtym->status_id = $request->status_id;
        $specialtym->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad actualizada exitosamente',
            'data' => ['especialtym' => $specialtym]
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
            $specialtym = Specialtym::find($id);
            $specialtym->delete();

            return response()->json([
                'status' => true,
                'message' => 'Especialidad eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La especialidad esta en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
