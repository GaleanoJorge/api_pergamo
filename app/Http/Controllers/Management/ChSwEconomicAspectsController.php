<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwEconomicAspects;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwEconomicAspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwEconomicAspects = ChSwEconomicAspects::select();


        if ($request->_sort) {
            $ChSwEconomicAspects->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwEconomicAspects->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwEconomicAspects = $ChSwEconomicAspects->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwEconomicAspects = $ChSwEconomicAspects->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Capacidad de copago obtenidos exitosamente',
            'data' => ['ch_sw_economic_aspects' => $ChSwEconomicAspects]
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


        $ChSwEconomicAspects = ChSwEconomicAspects::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Capacidad de copago obtenidos exitosamente',
            'data' => ['ch_sw_economic_aspects' => $ChSwEconomicAspects]
        ]);
    }

    public function store(Request $request): JsonResponse
    {


        $ChSwEconomicAspects = new ChSwEconomicAspects;
        $ChSwEconomicAspects->copay = $request->copay;
        $ChSwEconomicAspects->type_record_id = $request->type_record_id;
        $ChSwEconomicAspects->ch_record_id = $request->ch_record_id;
        $ChSwEconomicAspects->save();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad de copago asociada al paciente exitosamente',
            'data' => ['ch_sw_economic_aspects' => $ChSwEconomicAspects->toArray()]
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
        $ChSwEconomicAspects = ChSwEconomicAspects::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad de copago obtenida exitosamente',
            'data' => ['ch_sw_economic_aspects' => $ChSwEconomicAspects]
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
        $ChSwEconomicAspects = ChSwEconomicAspects::find($id);
        $ChSwEconomicAspects->copay = $request->copay;
        $ChSwEconomicAspects->type_record_id = $request->type_record_id;
        $ChSwEconomicAspects->ch_record_id = $request->ch_record_id;
        $ChSwEconomicAspects->type_record_id = $request->type_record_id;
        $ChSwEconomicAspects->ch_record_id = $request->ch_record_id;
        $ChSwEconomicAspects->save();

        return response()->json([
            'status' => true,
            'message' => 'Capacidad de copago  actualizada exitosamente',
            'data' => ['ch_sw_economic_aspects' => $ChSwEconomicAspects]
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
            $ChSwEconomicAspects = ChSwEconomicAspects::find($id);
            $ChSwEconomicAspects->delete();

            return response()->json([
                'status' => true,
                'message' => 'Capacidad de copago  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Capacidad de copago  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
