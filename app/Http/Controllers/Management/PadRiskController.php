<?php

namespace App\Http\Controllers\Management;

use App\Models\PadRisk;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PadRiskRequest;
use Illuminate\Database\QueryException;

class PadRiskController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $PadRisk = PadRisk::with('status');

        if($request->_sort){
            $PadRisk->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $PadRisk->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $PadRisk->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $PadRisk=$PadRisk->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $PadRisk=$PadRisk->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Riesgos de Pad obtenidos exitosamente',
            'data' => ['pad_risk' => $PadRisk]
        ]);
    }

    public function store(PadRiskRequest $request): JsonResponse
    {
        $PadRisk = new PadRisk;
        $PadRisk->name = $request->name;
        $PadRisk->status_id = 1;
        
        $PadRisk->save();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos de Pad creados exitosamente',
            'data' => ['pad_risk' => $PadRisk->toArray()]
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
        $PadRisk = PadRisk::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos de Pad obtenidos exitosamente',
            'data' => ['pad_risk' => $PadRisk]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PadRiskRequest $request, int $id): JsonResponse
    {
        $PadRisk = PadRisk::find($id);
        $PadRisk->name = $request->name;
        $PadRisk->status_id = $request->status_id;
        
        $PadRisk->save();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos de Pad actualizados exitosamente',
            'data' => ['pad_risk' => $PadRisk]
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
            $PadRisk = PadRisk::find($id);
            $PadRisk->delete();

            return response()->json([
                'status' => true,
                'message' => 'Riesgos de Pad eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Riesgos de Pad estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
