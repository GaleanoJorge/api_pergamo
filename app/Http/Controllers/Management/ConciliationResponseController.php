<?php

namespace App\Http\Controllers\Management;

use App\Models\ConciliationResponse;
use App\Models\GlossConciliations;
use App\Models\Gloss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConciliationResponseRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ConciliationResponseController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $ConciliationResponse = ConciliationResponse::with('objetion_response', 'objetion_code_response', 'user');

        if ($request->_sort) {
            $ConciliationResponse->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ConciliationResponse->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_id) {
            $GlossConciliations = GlossConciliations::where('gloss_id', $request->gloss_id)->with('objetion_response', 'objetion_code_response', 'user')
                ->join('conciliation_response', 'gloss_conciliations.id', 'conciliation_response.gloss_conciliations_id');

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de conciliación obtenidos exitosamente',
                'data' => ['conciliation_response' => $GlossConciliations->get()->toArray()]
            ]);
        }
        if ($request->objetion_response_id) {
            $ConciliationResponse->where('objetion_response_id', $request->objetion_response_id);
        }
        if ($request->objetion_code_response_id) {
            $ConciliationResponse->where('objetion_code_response_id', $request->objetion_code_response_id);
        }
        if ($request->query("pagination", true) == "false") {
            $ConciliationResponse = $ConciliationResponse->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ConciliationResponse = $ConciliationResponse->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de conciliación obtenidos exitosamente',
            'data' => ['conciliation_response' => $ConciliationResponse]
        ]);
    }

    public function store(ConciliationResponseRequest $request): JsonResponse
    {

        if ($request->single == '0') {
            $i = 0;
            $err = 0;
            $cont = 0;
            $name = null;
            $gloss_id = json_decode($request->gloss_id);
            $gloss_conciliations_id = json_decode($request->gloss_conciliations_id);
            foreach ($gloss_id as $item) {
                $Gloss_conciliation = GlossConciliations::find($gloss_conciliations_id[$i]);
                $Gloss = Gloss::find($item);

                if ($request->type_response == '1') {
                    if ($Gloss->gloss_status_id == 6) {
                        $cont++;
                        $ConciliationResponse = new ConciliationResponse;

                        $ConciliationResponse->response = $request->response;
                        $ConciliationResponse->type_response = $request->type_response;
                        $ConciliationResponse->gloss_conciliations_id = $gloss_conciliations_id[$i];
                        $ConciliationResponse->file = $request->file;

                        $ConciliationResponse->user_id = Auth::user()->id;
                        $ConciliationResponse->response_date = Carbon::now();

                        $ConciliationResponse->save();

                        $Gloss->gloss_status_id = 7;
                        $Gloss->save();
                    } else {
                        $err++;
                    }
                    $name = 'sostenido ';
                } else {

                    if($Gloss_conciliation->objeted_value != $request->result && ($Gloss->gloss_status_id == 6 || $Gloss->gloss_status_id == 7)){

                        $ConciliationResponse = new ConciliationResponse;
    
    
                        $ConciliationResponse->gloss_conciliations_id = $gloss_conciliations_id[$i];
                        $ConciliationResponse->response_date = Carbon::now();
                        $ConciliationResponse->objetion_code_response_id = $request->objetion_code_response_id;
                        $ConciliationResponse->accepted_value = $request->accepted_value;
                        $ConciliationResponse->value_not_accepted = $request->value_not_accepted;
                        $ConciliationResponse->response = $request->response;
                        $ConciliationResponse->type_response = $request->type_response;
                        $ConciliationResponse->file = $request->file;
                        $ConciliationResponse->objetion_response_id = $request->objetion_response_id;
                        $ConciliationResponse->user_id = Auth::user()->id;
                        $ConciliationResponse->justification_status = $request->justification_status;
                        $ConciliationResponse->save();
    
                        $Gloss->gloss_status_id = 8;
                        $Gloss->save();
    
                        $name = 'respondido ';
                        $cont++;
                    } else {
                        $err++;
                    }
                }
                $i++;
            }
            return response()->json([
                'status' => true,
                'message' => 'Estados cambiados correctamente',
                'data' => 'Se han ' . $name . $cont . ' conciliaciones correctamente. ' . $err . ' No aplican '
            ]);
        } else {
            if ($request->type_response == '1') {

                $ConciliationResponse = new ConciliationResponse;

                $ConciliationResponse->response = $request->response;
                $ConciliationResponse->type_response = $request->type_response;
                $ConciliationResponse->gloss_conciliations_id = $request->gloss_conciliations_id;
                $ConciliationResponse->file = $request->file;

                $ConciliationResponse->user_id = Auth::user()->id;
                $ConciliationResponse->response_date = Carbon::now();

                $ConciliationResponse->save();

                $Gloss = Gloss::find($request->gloss_id);
                $Gloss->gloss_status_id = 7;
                $Gloss->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Conciliación sostenida exitosamente',
                    'data' => ['conciliation_response' => $ConciliationResponse->toArray()]
                ]);
            } else {
                $ConciliationResponse = new ConciliationResponse;


                $ConciliationResponse->gloss_conciliations_id = $request->gloss_conciliations_id;
                $ConciliationResponse->response_date = Carbon::now();
                $ConciliationResponse->objetion_code_response_id = $request->objetion_code_response_id;
                $ConciliationResponse->accepted_value = $request->accepted_value;
                $ConciliationResponse->value_not_accepted = $request->value_not_accepted;
                $ConciliationResponse->response = $request->response;
                $ConciliationResponse->type_response = $request->type_response;
                $ConciliationResponse->file = $request->file;
                $ConciliationResponse->objetion_response_id = $request->objetion_response_id;
                $ConciliationResponse->user_id = Auth::user()->id;
                $ConciliationResponse->justification_status = $request->justification_status;
                $ConciliationResponse->save();

                $Gloss = Gloss::find($request->gloss_id);
                $Gloss->gloss_status_id = 8;
                $Gloss->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Conciliación rewspondida exitosamente',
                    'data' => ['conciliation_response' => $ConciliationResponse->toArray()]
                ]);
            }
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
        $ConciliationResponse = ConciliationResponse::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de conciliación obtenidos exitosamente',
            'data' => ['conciliation_response' => $ConciliationResponse]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ConciliationResponseRequest $request, int $id): JsonResponse
    {
        $ConciliationResponse = ConciliationResponse::find($id);
        $ConciliationResponse->gloss_id = $request->gloss_id;
        $ConciliationResponse->objetion_response_id = $request->objetion_response_id;
        $ConciliationResponse->response = $request->response;
        $ConciliationResponse->objetion_code_response_id = $request->objetion_code_response_id;
        $ConciliationResponse->response_date = Carbon::now();
        $ConciliationResponse->user_id = Auth::user()->id;
        $ConciliationResponse->accepted_value = $request->accepted_value;
        $ConciliationResponse->value_not_accepted = $request->value_not_accepted;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $ConciliationResponse->file = $path;
        }
        $ConciliationResponse->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de conciliación actualizados exitosamente',
            'data' => ['conciliation_response' => $ConciliationResponse]
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
            $ConciliationResponse = ConciliationResponse::find($id);
            $ConciliationResponse->delete();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de conciliación eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Respuesta de conciliación estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
