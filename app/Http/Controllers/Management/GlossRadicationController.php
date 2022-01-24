<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossRadication;
use Illuminate\Support\Facades\Auth;
use App\Models\Gloss;
use App\Models\GlossResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossRadicationRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;

class GlossRadicationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $GlossRadication = GlossRadication::with('gloss_response', 'user');

        if ($request->_sort) {
            $GlossRadication->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossRadication->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->gloss_response_id) {
            $GlossRadication->where('gloss_response_id', $request->gloss_response_id);
        }

        if ($request->query("pagination", true) == "false") {
            $GlossRadication = $GlossRadication->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossRadication = $GlossRadication->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de radicación Glosa obtenidos exitosamente',
            'data' => ['gloss_radication' => $GlossRadication]
        ]);
    }

    public function store(GlossRadicationRequest $request): JsonResponse
    {
        if ($request->single == 0) {
            $settled = 0;
            $already_settled = 0;
            $without_reponse = 0;
            $gloss_id = json_decode($request->gloss_id);
            $gloss_response_id = json_decode($request->gloss_response_id);
            $total_selected = json_decode($request->total_selected);
            for ($i = 0; $i < sizeof($gloss_id); ++$i) {
                $validate_radication = GlossRadication::where('gloss_response_id', '=', $gloss_response_id[$i])->get()->toArray();
                if ($validate_radication) {
                    $already_settled++;
                } else {
                    $settled++;
                    $GlossRadication = new GlossRadication;
                    $GlossRadication->gloss_response_id = $gloss_response_id[$i];
                    $GlossRadication->radication_date = Carbon::now();
                    $GlossRadication->user_id = Auth::user()->id;
                    $GlossRadication->observation = $request->observation;
                    if ($request->file('file')) {
                        $path = Storage::disk('public')->put('file', $request->file('file'));
                        $GlossRadication->file = $path;
                    }
                    $GlossRadication->save();
                    $Gloss = Gloss::find($gloss_id[$i]);
                    $Gloss->gloss_status_id = 3;
                    $Gloss->save();
                }
            }
            $without_reponse = sizeof($total_selected) - sizeof($gloss_id);
            return response()->json([
                'status' => true,
                'message' => 'Respuesta de radicación masiva de Glosa creados exitosamente',
                'data' => ['Se han radicado ' . $settled . ' correctamente. ' . $already_settled . ' ya se encuentran radicadas y ' . $without_reponse . ' no cuentan con respuesta']
            ]);
        } else {
            $GlossRadication = new GlossRadication;
            $GlossRadication->gloss_response_id = $request->gloss_response_id;
            $GlossRadication->radication_date = Carbon::now();
            $GlossRadication->user_id = Auth::user()->id;
            $GlossRadication->observation = $request->observation;
            if ($request->file('file')) {
                $path = Storage::disk('public')->put('file', $request->file('file'));
                $GlossRadication->file = $path;
            }
            $GlossRadication->save();
            $Gloss = Gloss::find($request->gloss_id);
            $Gloss->gloss_status_id = 3;
            $Gloss->save();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de radicación Glosa creados exitosamente',
                'data' => ['gloss_radication' => $GlossRadication->toArray()]
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
        $GlossRadication = GlossRadication::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de radicación Glosa obtenidos exitosamente',
            'data' => ['gloss_radication' => $GlossRadication]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossRadicationRequest $request, int $id): JsonResponse
    {
        $GlossRadication = GlossRadication::find($id);
        $GlossRadication->gloss_response_id = $request->gloss_response_id;
        $GlossRadication->radication_date = Carbon::now();
        $GlossRadication->user_id = Auth::user()->id;
        $GlossRadication->observation = $request->observation;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $GlossRadication->file = $path;
        }
        $GlossRadication->save();

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de radicación Glosa actualizados exitosamente',
            'data' => ['gloss_radication' => $GlossRadication]
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
            $GlossRadication = GlossRadication::find($id);
            $GlossRadication->delete();

            return response()->json([
                'status' => true,
                'message' => 'Respuesta de radicación Glosa eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Respuesta de radicación Glosa estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
