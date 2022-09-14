<?php

namespace App\Http\Controllers\Management;

use App\Models\ChHairValoration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChHairValorationRequest;
use Illuminate\Database\QueryException;

class ChHairValorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChHairValoration = ChHairValoration::select('ch_hair_valoration.*');

        if ($request->_sort) {
            $ChHairValoration->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChHairValoration->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChHairValoration = $ChHairValoration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChHairValoration = $ChHairValoration->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoraciones capilares asociadas exitosamente',
            'data' => ['ch_hair_valoration' => $ChHairValoration]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record): JsonResponse
    {

        $ChHairValoration = ChHairValoration::select('ch_hair_valoration.*')
            ->where('ch_record_id', $id)
            ->where('ch_hair_valoration.type_record_id', 1)
            ->where('type_record_id', $type_record);


        if ($request->query("pagination", true) == "false") {
            $ChHairValoration = $ChHairValoration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChHairValoration = $ChHairValoration->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoraciones capilares exitosamente',
            'data' => ['ch_hair_valoration' => $ChHairValoration]
        ]);
    }


    public function store(ChHairValorationRequest $request)
    {
        $validate = ChHairValoration::select('ch_hair_valoration.*')
            ->where('ch_record_id', $request->ch_record_id)
            ->where('type_record_id', $request->type_record_id)
            ->where('hair_revision', $request->hair_revision)->first();
        if (!$validate) {
            $ChHairValoration = new ChHairValoration;
            $ChHairValoration->hair_revision  = $request->hair_revision;
            $ChHairValoration->observation = $request->observation;
            $ChHairValoration->type_record_id = $request->type_record_id;
            $ChHairValoration->ch_record_id = $request->ch_record_id;
            $ChHairValoration->save();

            return response()->json([
                'status' => true,
                'message' => 'Valoraciones capilares creada exitosamente',
                'data' => ['ch_hair_valoration' => $ChHairValoration->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación'
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChHairValoration = ChHairValoration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoraciones capilares obtenidas exitosamente',
            'data' => ['ch_hair_valoration' => $ChHairValoration]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChHairValorationRequest $request, int $id): JsonResponse
    {
        $ChHairValoration = ChHairValoration::find($id);
        $ChHairValoration->hair_revision = $request->hair_revision;
        $ChHairValoration->hair_revision = $request->hair_revision;
        $ChHairValoration->observation = $request->observation;
        // $ChHairValoration->type_record_id = $request->type_record_id; 
        // $ChHairValoration->ch_record_id = $request->ch_record_id; 
        $ChHairValoration->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoraciones capilares actualizadas exitosamente',
            'data' => ['ch_hair_valoration' => $ChHairValoration]
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
            $ChHairValoration = ChHairValoration::find($id);
            $ChHairValoration->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoraciones capilares eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoraciones capilares esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
