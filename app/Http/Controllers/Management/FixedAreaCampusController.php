<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedAreaCampus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedAreaCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedAreaCampus = FixedAreaCampus::select();

        if ($request->_sort) {
            $FixedAreaCampus->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedAreaCampus->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedAreaCampus = $FixedAreaCampus->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedAreaCampus = $FixedAreaCampus->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Area/Servicios obtenidos exitosamente',
            'data' => ['fixed_area_campus' => $FixedAreaCampus]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedAreaCampus = new FixedAreaCampus;
        $FixedAreaCampus->name = $request->name;
        $FixedAreaCampus->save();

        return response()->json([
            'status' => true,
            'message' => 'Area/Servicios asociado al paciente exitosamente',
            'data' => ['fixed_area_campus' => $FixedAreaCampus->toArray()]
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
        $FixedAreaCampus = FixedAreaCampus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Area/Servicios obtenido exitosamente',
            'data' => ['fixed_area_campus' => $FixedAreaCampus]
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
        $FixedAreaCampus = FixedAreaCampus::find($id);
        $FixedAreaCampus->name = $request->name;
        $FixedAreaCampus->save();

        return response()->json([
            'status' => true,
            'message' => 'Area/Servicios actualizado exitosamente',
            'data' => ['fixed_area_campus' => $FixedAreaCampus]
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
            $FixedAreaCampus = FixedAreaCampus::find($id);
            $FixedAreaCampus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Area/Servicios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Area/Servicios en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
