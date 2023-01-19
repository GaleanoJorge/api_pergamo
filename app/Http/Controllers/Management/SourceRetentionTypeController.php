<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SourceRetentionTypeRequest;
use App\Models\SourceRetentionType;
use App\Models\TaxValueUnit;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class SourceRetentionTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SourceRetentionType = SourceRetentionType::with('tax_value_unit')->select();

        if($request->_sort){
            $SourceRetentionType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SourceRetentionType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $SourceRetentionType=$SourceRetentionType->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SourceRetentionType=$SourceRetentionType->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Tipo de retención en la fuente obtenidos exitosamente',
            'data' => ['source_retention_type' => $SourceRetentionType]
        ]);
    }

    public function store(SourceRetentionTypeRequest $request): JsonResponse
    {
        $validate = TaxValueUnit::select()->where('year', Carbon::now()->year)->first();
        if (!$validate) {
            return response()->json([
                'status' => false,
                'message' => 'No existe unidad de valor tributario para el año en curso',
                'data' => ['source_retention_type' => []]
            ]);
        }
        $SourceRetentionType = new SourceRetentionType;
        $SourceRetentionType->name = $request->name;   
        $SourceRetentionType->value = $request->value;
        $SourceRetentionType->type = $request->type;
        $SourceRetentionType->tax_value_unit_id = TaxValueUnit::select()->where('year', Carbon::now()->year)->first()->id;

        $SourceRetentionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de retención en la fuente creado exitosamente',
            'data' => ['source_retention_type' => $SourceRetentionType->toArray()]
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
        $SourceRetentionType = SourceRetentionType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de retención en la fuente obtenido exitosamente',
            'data' => ['source_retention_type' => $SourceRetentionType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SourceRetentionTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SourceRetentionTypeRequest $request, int $id): JsonResponse
    {
        $SourceRetentionType = SourceRetentionType ::find($id);
        $SourceRetentionType->name = $request->name;   
        $SourceRetentionType->value = $request->value;
        $SourceRetentionType->type = $request->type;
        
        $SourceRetentionType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de retención en la fuente actualizado exitosamente',
            'data' => ['source_retention_type' => $SourceRetentionType]
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
            $SourceRetentionType = SourceRetentionType::find($id);
            $SourceRetentionType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de retención en la fuente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de retención en la fuente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
