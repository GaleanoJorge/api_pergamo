<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSkinValoration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChSkinValorationRequest;
use Illuminate\Database\QueryException;

class ChSkinValorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChSkinValoration = ChSkinValoration::select('ch_skin_valoration.*')
            ->with(
                'body_region',
                'skin_status'
            );

        if ($request->_sort) {
            $ChSkinValoration->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSkinValoration->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSkinValoration = $ChSkinValoration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSkinValoration = $ChSkinValoration->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'valoraciones de piel asociadas exitosamente',
            'data' => ['ch_skin_valoration' => $ChSkinValoration]
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

        $ChSkinValoration = ChSkinValoration::select('ch_skin_valoration.*')
            ->where('ch_record_id', $id)
            ->where('ch_skin_valoration.type_record_id', 1)
            ->where('type_record_id', $type_record)
            ->with(
                'body_region',
                'skin_status',
                'diagnosis',
            );


        if ($request->query("pagination", true) == "false") {
            $ChSkinValoration = $ChSkinValoration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSkinValoration = $ChSkinValoration->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoraciones de piel obtenidas exitosamente',
            'data' => ['ch_skin_valoration' => $ChSkinValoration]
        ]);
    }

    public function store(ChSkinValorationRequest $request)
    {
        $exist_flag = false;
        $validate = ChSkinValoration::select('ch_skin_valoration.*')->where('ch_record_id', $request->ch_record_id)->get()->toArray();
        if (sizeof($validate) > 0) {
            foreach ($validate as $item) {
                if ($item['body_region_id'] == $request->body_region_id) {
                    $exist_flag = true;
                    return response()->json([
                        'status' => false,
                        'message' => 'Ya tiene valoracion activa'
                    ], 423);
                }
            }
        }
        if (!$exist_flag) {
            $ChSkinValoration = new ChSkinValoration;

            $ChSkinValoration->diagnosis_id = $request->diagnosis_id;
            $ChSkinValoration->body_region_id = $request->body_region_id;
            $ChSkinValoration->pressure_ulcers = $request->pressure_ulcers;
            $ChSkinValoration->skin_status_id = $request->skin_status_id;
            $ChSkinValoration->exudate = $request->exudate;
            $ChSkinValoration->concentrated = $request->concentrated;
            $ChSkinValoration->infection_sign = $request->infection_sign;
            $ChSkinValoration->surrounding_skin = $request->surrounding_skin;
            $ChSkinValoration->observation = $request->observation;
            $ChSkinValoration->type_record_id = $request->type_record_id;
            $ChSkinValoration->ch_record_id = $request->ch_record_id;
            $ChSkinValoration->save();

            return response()->json([
                'status' => true,
                'message' => 'valoraciones de piel creadas exitosamente',
                'data' => ['ch_skin_valoration' => $ChSkinValoration->toArray()]
            ]);
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
        $ChSkinValoration = ChSkinValoration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'valoraciones de piel obtenidas exitosamente',
            'data' => ['ch_skin_valoration' => $ChSkinValoration]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChSkinValorationRequest $request, int $id): JsonResponse
    {
        $ChSkinValoration = ChSkinValoration::find($id);
        $ChSkinValoration->name = $request->name;
        $ChSkinValoration->save();

        return response()->json([
            'status' => true,
            'message' => 'valoraciones de piel actualizadas exitosamente',
            'data' => ['ch_skin_valoration' => $ChSkinValoration]
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
            $ChSkinValoration = ChSkinValoration::find($id);
            $ChSkinValoration->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoraciones de piel eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoraciones de piel estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
