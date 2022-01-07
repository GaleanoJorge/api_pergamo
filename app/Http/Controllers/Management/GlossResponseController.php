<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossResponse;
use App\Models\Gloss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossResponseRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GlossResponseController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $GlossResponse = GlossResponse::with('objetion_response', 'objetion_code_response', 'user');

        if ($request->_sort) {
            $GlossResponse->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossResponse->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_id) {
            $GlossResponse->where('gloss_id', $request->gloss_id);
        }
        if ($request->objetion_response_id) {
            $GlossResponse->where('objetion_response_id', $request->objetion_response_id);
        }
        if ($request->objetion_code_response_id) {
            $GlossResponse->where('objetion_code_response_id', $request->objetion_code_response_id);
        }
        if ($request->query("pagination", true) == "false") {
            $GlossResponse = $GlossResponse->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossResponse = $GlossResponse->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de Glosa obtenidos exitosamente',
            'data' => ['gloss_response' => $GlossResponse]
        ]);
    }

    public function store(GlossResponseRequest $request): JsonResponse
    {
        if ($request->single == 0) {
            $cont = 0;
            $err = 0;
            $gloss_id = json_decode($request->gloss_id);
            foreach ($gloss_id as $item) {
                $validate = GlossResponse::where('gloss_id', '=', $item)->get()->toArray();
                if ($validate) {
                    $err++;
                } else {
                    $cont++;
                    $GlossResponse = new GlossResponse;
                    $GlossResponse->gloss_id = $item;
                    $GlossResponse->objetion_response_id = $request->objetion_response_id;
                    $GlossResponse->objetion_code_response_id = $request->objetion_code_response_id;
                    $GlossResponse->response = $request->response;
                    $GlossResponse->response_date = Carbon::now();
                    $GlossResponse->user_id = Auth::user()->id;
                    $GlossResponse->accepted_value = $request->accepted_value;
                    $GlossResponse->value_not_accepted = $request->value_not_accepted;
                    if ($request->file('file')) {
                        $path = Storage::disk('public')->put('file', $request->file('file'));
                        $GlossResponse->file = $path;
                    }
                    $GlossResponse->save();

                    $Gloss = Gloss::find($item);
                    $Gloss->gloss_status_id = 2;
                    $Gloss->save();
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Respuesta de Glosa creados exitosamente',
                'data' => 'Se han respondido ' . $cont . ' Correctamente. ' . $err . ' ya tienen respuesta.',

            ]);
        } else {
            $GlossResponse = new GlossResponse;
            $GlossResponse->gloss_id = $request->gloss_id;        
            $GlossResponse->objetion_response_id = $request->objetion_response_id;
            $GlossResponse->objetion_code_response_id = $request->objetion_code_response_id;
            $GlossResponse->response_date = Carbon::now();
            $GlossResponse->user_id = Auth::user()->id;
            $GlossResponse->accepted_value = $request->accepted_value;
            $GlossResponse->value_not_accepted = $request->value_not_accepted;
            if ($request->file('file')) {
                $path = Storage::disk('public')->put('file', $request->file('file'));
                $GlossResponse->file = $path;
            }
            $GlossResponse->save();
    
            $Gloss= Gloss::find($request->gloss_id);
            $Gloss->gloss_status_id=2;
            $Gloss->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Respuesta de Glosa creados exitosamente',
                'data' => ['gloss_response' => $GlossResponse->toArray()]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $GlossResponse = GlossResponse::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa obtenidos exitosamente',
            'data' => ['gloss_response' => $GlossResponse]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossResponseRequest $request, int $id): JsonResponse
    {
        $GlossResponse = GlossResponse::find($id);
        $GlossResponse->gloss_id = $request->gloss_id;
        $GlossResponse->objetion_response_id = $request->objetion_response_id;
        $GlossResponse->response = $request->response;
        $GlossResponse->objetion_code_response_id = $request->objetion_code_response_id;
        $GlossResponse->response_date = Carbon::now();
        $GlossResponse->user_id = Auth::user()->id;
        $GlossResponse->accepted_value = $request->accepted_value;
        $GlossResponse->value_not_accepted = $request->value_not_accepted;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $GlossResponse->file = $path;
        }
        $GlossResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de Glosa actualizados exitosamente',
            'data' => ['gloss_response' => $GlossResponse]
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
            $GlossResponse = GlossResponse::find($id);
            $GlossResponse->delete();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Respuesta de Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
