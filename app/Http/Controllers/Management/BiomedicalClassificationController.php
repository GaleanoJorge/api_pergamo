<?php

namespace App\Http\Controllers\Management;

use App\Models\BiomedicalClassification;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BiomedicalClassificationRequest;
use Illuminate\Database\QueryException;

class BiomedicalClassificationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $BiomedicalClassification = BiomedicalClassification::select();

        if($request->_sort){
            $BiomedicalClassification->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $BiomedicalClassification->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $BiomedicalClassification=$BiomedicalClassification->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $BiomedicalClassification=$BiomedicalClassification->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo obtenidos exitosamente',
            'data' => ['biomedical_classification' => $BiomedicalClassification]
        ]);
    }
     

    public function store(BiomedicalClassificationRequest $request): JsonResponse
    {
        $BiomedicalClassification = new BiomedicalClassification;
        $BiomedicalClassification->name = $request->name;
        $BiomedicalClassification->fixed_clasification_id = $request->fixed_clasification_id;
        $BiomedicalClassification->save();

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo creado exitosamente',
            'data' => ['biomedical_classification' => $BiomedicalClassification->toArray()]
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
        $BiomedicalClassification = BiomedicalClassification::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo obtenido exitosamente',
            'data' => ['biomedical_classification' => $BiomedicalClassification]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BiomedicalClassificationRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BiomedicalClassificationRequest $request, int $id): JsonResponse
    {
        $BiomedicalClassification = BiomedicalClassification ::find($id);
        $BiomedicalClassification->name = $request->name;
        $BiomedicalClassification->fixed_clasification_id = $request->fixed_clasification_id;
        $BiomedicalClassification->save();
        return response()->json([
            'status' => true,
            'message' => 'Descripción del activo actualizado exitosamente',
            'data' => ['biomedical_classification' => $BiomedicalClassification]
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
            $BiomedicalClassification = BiomedicalClassification::find($id);
            $BiomedicalClassification->delete();

            return response()->json([
                'status' => true,
                'message' => 'Descripción del activo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Descripción del activoesta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
