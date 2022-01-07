<?php

namespace App\Http\Controllers\Management;

use App\Models\GlossConciliations;
use App\Models\Gloss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossConciliationsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GlossConciliationsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $GlossConciliations = GlossConciliations::with('user');

        if ($request->_sort) {
            $GlossConciliations->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $GlossConciliations->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $GlossConciliations = $GlossConciliations->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $GlossConciliations = $GlossConciliations->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Respuesta de Glosa obtenidos exitosamente',
            'data' => ['gloss_response' => $GlossConciliations]
        ]);
    }

    public function store(GlossConciliationsRequest $request): JsonResponse
    {
       
            $GlossConciliations = new GlossConciliations;
            $GlossConciliations->gloss_id = $request->gloss_id;        
            $GlossConciliations->observations = $request->observations;
            $GlossConciliations->cociliations_date = Carbon::now();
            $GlossConciliations->user_id = Auth::user()->id;
            $GlossConciliations->accepted_value = $request->accepted_value;
            $GlossConciliations->value_not_accepted = $request->value_not_accepted;
            if ($request->file('file')) {
                $path = Storage::disk('public')->put('file', $request->file('file'));
                $GlossConciliations->file = $path;
            }
            $GlossConciliations->save();
    
            $Gloss= Gloss::find($request->gloss_id);
            $Gloss->gloss_status_id=5;
            $Gloss->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Respuesta de Conciliación creada exitosamente',
                'data' => ['gloss_response' => $GlossConciliations->toArray()]
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
        $GlossConciliations = GlossConciliations::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Servicio de Glosa obtenidos exitosamente',
            'data' => ['gloss_conciliations' => $GlossConciliations]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossConciliationsRequest $request, int $id): JsonResponse
    {
        $GlossConciliations = GlossConciliations::find($id);
        $GlossConciliations->observations = $request->observations;
        $GlossConciliations->cociliations_date = Carbon::now();
        $GlossConciliations->user_id = Auth::user()->id;
        $GlossConciliations->accepted_value = $request->accepted_value;
        $GlossConciliations->value_not_accepted = $request->value_not_accepted;
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('file', $request->file('file'));
            $GlossConciliations->file = $path;
        }
        $GlossConciliations->save();

        return response()->json([
            'status' => true,
            'message' => 'Conciliación actualizados exitosamente',
            'data' => ['gloss_conciliations' => $GlossConciliations]
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
            $GlossConciliations = GlossConciliations::find($id);
            $GlossConciliations->delete();

            return response()->json([
                'status' => true,
                'message' => 'Conciliación eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Conciliación estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
