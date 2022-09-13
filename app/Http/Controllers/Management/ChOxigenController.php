<?php

namespace App\Http\Controllers\Management;

use App\Models\ChOxigen;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChOxigenRequest;
use Illuminate\Database\QueryException;

class ChOxigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChOxigen = ChOxigen::select('ch_oxigen.*');

        if ($request->_sort) {
            $ChOxigen->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChOxigen->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChOxigen = $ChOxigen->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChOxigen = $ChOxigen->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoraciones de oxigeno asociadas exitosamente',
            'data' => ['ch_oxigen' => $ChOxigen]
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

        $ChOxigen = ChOxigen::select('ch_oxigen.*')
            ->where('ch_record_id', $id)
            ->where('ch_oxigen.type_record_id', 1)
            ->where('type_record_id', $type_record)
            ->with(
                'liters_per_minute',
                'oxygen_type',
            );


        if ($request->query("pagination", true) == "false") {
            $ChOxigen = $ChOxigen->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChOxigen = $ChOxigen->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoración oxigeno exitosamente',
            'data' => ['ch_oxigen' => $ChOxigen]
        ]);
    }


    public function store(ChOxigenRequest $request)
    {
        $validate = ChOxigen::select('ch_oxigen.*')
            ->where('ch_record_id', $request->ch_record_id)
            ->where('type_record_id', $request->type_record_id)
            ->where('oxygen_type_id', $request->oxygen_type_id)
            ->where('liters_per_minute_id', $request->liters_per_minute_id)
            ->first();
        if (!$validate) {
            $ChOxigen = new ChOxigen;
            $ChOxigen->oxygen_type_id  = $request->oxygen_type_id;
            $ChOxigen->liters_per_minute_id = $request->liters_per_minute_id;
            $ChOxigen->type_record_id = $request->type_record_id;
            $ChOxigen->ch_record_id = $request->ch_record_id;
            $ChOxigen->save();

            return response()->json([
                'status' => true,
                'message' => 'Valoración oxigeno creada exitosamente',
                'data' => ['ch_oxigen' => $ChOxigen->toArray()]
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
        $ChOxigen = ChOxigen::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración oxigeno obtenidas exitosamente',
            'data' => ['ch_oxigen' => $ChOxigen]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChOxigenRequest $request, int $id): JsonResponse
    {
        $ChOxigen = ChOxigen::find($id);
        $ChOxigen->oxygen_type_id  = $request->oxygen_type_id;
        $ChOxigen->liters_per_minute_id = $request->liters_per_minute_id;
        // $ChOxigen->type_record_id = $request->type_record_id; 
        // $ChOxigen->ch_record_id = $request->ch_record_id; 
        $ChOxigen->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración oxigeno actualizada exitosamente',
            'data' => ['ch_oxigen' => $ChOxigen]
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
            $ChOxigen = ChOxigen::find($id);
            $ChOxigen->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración oxigeno eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración oxigeno esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
