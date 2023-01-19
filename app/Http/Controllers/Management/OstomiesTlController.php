<?php

namespace App\Http\Controllers\Management;

use App\Models\OstomiesTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class OstomiesTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $OstomiesTl = OstomiesTl::select();

        if ($request->_sort) {
            $OstomiesTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $OstomiesTl->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->query('pagination', true) == 'false') {
            $OstomiesTl = $OstomiesTl->get()->toArray();
        } else {
            $page = $request->query('current_page', 1);
            $per_page = $request->query('per_page', 10);

            $OstomiesTl = $OstomiesTl->paginate(
                $per_page,
                '*',
                'page',
                $page
            );
        }

        return response()->json([
            'status' => true,
            'message' => 'Ostomias  obtenidos exitosamente',
            'data' => ['ostomies_tl' => $OstomiesTl],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {
        $OstomiesTl = OstomiesTl::with( 'type_record', 'ch_record')
            ->where('ch_record_id', $id)
            ->where('type_record_id', $type_record_id);

        if ($request->query('pagination', true) == 'false') {
            $OstomiesTl = $OstomiesTl->get()->toArray();
        } else {
            $page = $request->query('current_page', 1);
            $per_page = $request->query('per_page', 10);

            $OstomiesTl = $OstomiesTl->paginate(
                $per_page,
                '*',
                'page',
                $page
            );
        }
        return response()->json([
            'status' => true,
            'message' => 'Ostomias Asociada  al paciente exitosamente',
            'data' => ['ostomies_tl' => $OstomiesTl],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $OstomiesTl = new OstomiesTl();
        $OstomiesTl->jejunostomy = $request->jejunostomy;
        $OstomiesTl->colostomy = $request->colostomy; 
        $OstomiesTl->observations = $request->observations;
        $OstomiesTl->type_record_id = $request->type_record_id;
        $OstomiesTl->ch_record_id = $request->ch_record_id;
        $OstomiesTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias Asociada  al paciente exitosamente',
            'data' => [
                'ostomies_tl' => $OstomiesTl->toArray(),
            ],
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
        $OstomiesTl = OstomiesTl::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias obtenido exitosamente',
            'data' => ['ostomies_tl' => $OstomiesTl],
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
        $OstomiesTl = OstomiesTl::find($id);
        $OstomiesTl->jejunostomy =$request->jejunostomy;
        $OstomiesTl->colostomy = $request->colostomy;
        $OstomiesTl->observations = $request->observations;
        $OstomiesTl->type_record_id = $request->type_record_id;
        $OstomiesTl->ch_record_id = $request->ch_record_id;
        $OstomiesTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Ostomias actualizado exitosamente',
            'data' => ['ostomies_tl' => $OstomiesTl],
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
            $OstomiesTl = OstomiesTl::find($id);
            $OstomiesTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ostomias  eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' =>
                    'Ostomias  en uso, no es posible eliminarlo',
                ],
                423
            );
        }
    }
}
