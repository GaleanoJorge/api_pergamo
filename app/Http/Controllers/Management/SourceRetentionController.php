<?php

namespace App\Http\Controllers\Management;

use App\Models\SourceRetention;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SourceRetentionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class SourceRetentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SourceRetention = SourceRetention::select()
            ->with('account_receivable', 'source_retention_type', 'source_retention_type.tax_value_unit');;

        if ($request->_sort) {
            $SourceRetention->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SourceRetention->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->account_receivable_id) {
            $SourceRetention->where('account_receivable_id', $request->account_receivable_id);
        }

        if ($request->query("pagination", true) == "false") {
            $SourceRetention = $SourceRetention->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SourceRetention = $SourceRetention->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenidos exitosamente',
            'data' => ['source_retention' => $SourceRetention]
        ]);
    }

    public function store(SourceRetentionRequest $request): JsonResponse
    {
        $components = json_decode($request->source_retention_type_id);
        $i = 0;
        foreach ($components as $conponent) {
            $indicator = 'file_' . $i;
            $SourceRetention = new SourceRetention;
            $SourceRetention->value = $conponent->amount;
            $SourceRetention->account_receivable_id = $request->account_receivable_id;
            $SourceRetention->source_retention_type_id = $conponent->source_retention_type_id;
            if ($request->file($indicator)) {
                $path = Storage::disk('public')->put('source_retention', $request->file($indicator));
                $SourceRetention->file = $path;
            }
            $SourceRetention->save();
            $i++;
        }

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente creado exitosamente',
            'data' => ['source_retention' => $SourceRetention->toArray()]
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
        $SourceRetention = SourceRetention::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente obtenido exitosamente',
            'data' => ['source_retention' => $SourceRetention]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SourceRetentionRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SourceRetentionRequest $request, int $id): JsonResponse
    {
        $SourceRetention = SourceRetention::find($id);
        $SourceRetention->file = $request->file;
        $SourceRetention->value = $request->value;
        $SourceRetention->account_receivable_id = $request->account_receivable_id;
        $SourceRetention->source_retention_type_id = $request->source_retention_type_id;

        $SourceRetention->save();

        return response()->json([
            'status' => true,
            'message' => 'Retención en la fuente actualizado exitosamente',
            'data' => ['source_retention' => $SourceRetention]
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
            $SourceRetention = SourceRetention::find($id);
            $SourceRetention->delete();

            return response()->json([
                'status' => true,
                'message' => 'Retención en la fuente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Retención en la fuente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
