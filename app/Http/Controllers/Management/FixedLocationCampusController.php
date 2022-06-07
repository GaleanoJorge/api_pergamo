<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedLocationCampus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedLocationCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedLocationCampus = FixedLocationCampus::with('flat','campus','fixed_area_campus');

        if ($request->_sort) {
            $FixedLocationCampus->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedLocationCampus->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedLocationCampus = $FixedLocationCampus->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedLocationCampus = $FixedLocationCampus->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condición obtenidos exitosamente',
            'data' => ['fixed_location_campus' => $FixedLocationCampus]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedLocationCampus = new FixedLocationCampus;
        $FixedLocationCampus->flat_id = $request->flat_id;
        $FixedLocationCampus->campus_id = $request->campus_id;
        $FixedLocationCampus->fixed_area_campus_id = $request->fixed_area_campus_id;
        $FixedLocationCampus->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición asociado exitosamente',
            'data' => ['fixed_location_campus' => $FixedLocationCampus->toArray()]
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
        $FixedLocationCampus = FixedLocationCampus::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condición obtenido exitosamente',
            'data' => ['fixed_location_campus' => $FixedLocationCampus]
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
        $FixedLocationCampus = FixedLocationCampus::find($id);
        $FixedLocationCampus->flat_id = $request->flat_id;
        $FixedLocationCampus->campus_id = $request->campus_id;
        $FixedLocationCampus->fixed_area_campus_id = $request->fixed_area_campus_id;
        $FixedLocationCampus->save();

        return response()->json([
            'status' => true,
            'message' => 'Condición actualizado exitosamente',
            'data' => ['fixed_location_campus' => $FixedLocationCampus]
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
            $FixedLocationCampus = FixedLocationCampus::find($id);
            $FixedLocationCampus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condición eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condición en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
