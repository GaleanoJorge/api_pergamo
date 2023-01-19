<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwHygieneHousing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwHygieneHousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwHygieneHousing = ChSwHygieneHousing::select();

        if ($request->_sort) {
            $ChSwHygieneHousing->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwHygieneHousing->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwHygieneHousing = $ChSwHygieneHousing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwHygieneHousing = $ChSwHygieneHousing->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Condiciones de higiene otenidas exitosamente',
            'data' => ['ch_sw_hygiene_housing' => $ChSwHygieneHousing]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $ChSwHygieneHousing = ChSwHygieneHousing::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
          ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Condiciones de higiene obtenidas exitosamente',
            'data' => ['ch_sw_hygiene_housing' => $ChSwHygieneHousing]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwHygieneHousing = new ChSwHygieneHousing;

        $ChSwHygieneHousing->cleanliness = $request->cleanliness;
        $ChSwHygieneHousing->obs_cleanliness = $request->obs_cleanliness;
        $ChSwHygieneHousing->illumination = $request->illumination;
        $ChSwHygieneHousing->obs_illumination = $request->obs_illumination;
        $ChSwHygieneHousing->ventilation = $request->ventilation;
        $ChSwHygieneHousing->obs_ventilation = $request->obs_ventilation;
        $ChSwHygieneHousing->pests = $request->pests;
        $ChSwHygieneHousing->obs_pests = $request->obs_pests;
        $ChSwHygieneHousing->sanitary = $request->sanitary;
        $ChSwHygieneHousing->obs_sanitary = $request->obs_sanitary;
        $ChSwHygieneHousing->trash = $request->trash;
        $ChSwHygieneHousing->obs_trash = $request->obs_trash;
        $ChSwHygieneHousing->type_record_id = $request->type_record_id;
        $ChSwHygieneHousing->ch_record_id = $request->ch_record_id;
        $ChSwHygieneHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de higiene asociadas  exitosamente',
            'data' => ['ch_sw_hygiene_housing' => $ChSwHygieneHousing->toArray()]
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
        $ChSwHygieneHousing = ChSwHygieneHousing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de higiene asociadas exitosamente',
            'data' => ['ch_sw_hygiene_housing' => $ChSwHygieneHousing]
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
        $ChSwHygieneHousing = ChSwHygieneHousing::find($id);
        $ChSwHygieneHousing->cleanliness = $request->cleanliness;
        $ChSwHygieneHousing->obs_cleanliness = $request->obs_cleanliness;
        $ChSwHygieneHousing->illumination = $request->illumination;
        $ChSwHygieneHousing->obs_illumination = $request->obs_illumination;
        $ChSwHygieneHousing->ventilation = $request->ventilation;
        $ChSwHygieneHousing->obs_ventilation = $request->obs_ventilation;
        $ChSwHygieneHousing->pests = $request->pests;
        $ChSwHygieneHousing->obs_pests = $request->obs_pests;
        $ChSwHygieneHousing->sanitary = $request->sanitary;
        $ChSwHygieneHousing->obs_sanitary = $request->obs_sanitary;
        $ChSwHygieneHousing->trash = $request->trash;
        $ChSwHygieneHousing->obs_trash = $request->obs_trash;
        $ChSwHygieneHousing->type_record_id = $request->type_record_id;
        $ChSwHygieneHousing->ch_record_id = $request->ch_record_id;
        $ChSwHygieneHousing->save();

        return response()->json([
            'status' => true,
            'message' => 'Condiciones de higiene actualizadas exitosamente',
            'data' => ['ch_sw_hygiene_housing' => $ChSwHygieneHousing]
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
            $ChSwHygieneHousing = ChSwHygieneHousing::find($id);
            $ChSwHygieneHousing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Condiciones de higiene eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Condiciones de higiene en uso, no es posible eliminarlas'
            ], 423);
        }
    }
}
