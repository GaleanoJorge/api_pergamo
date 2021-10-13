<?php

namespace App\Http\Controllers\Management;

use App\Models\Risk;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RiskRequest;
use Illuminate\Database\QueryException;

class RiskController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Risk = Risk::select();

        if($request->_sort){
            $Risk->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Risk->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Risk=$Risk->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Risk=$Risk->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Riesgos listados exitosamente',
            'data' => ['risk' => $Risk]
        ]);
    }
    

    public function store(RiskRequest $request): JsonResponse
    {
        $Risk = new Risk;
        $Risk->name = $request->name; 
        $Risk->save();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos creada exitosamente',
            'data' => ['risk' => $Risk->toArray()]
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
        $Risk = Risk::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos obtenido exitosamente',
            'data' => ['risk' => $Risk]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RiskRequest $request, int $id): JsonResponse
    {
        $Risk = Risk::find($id);
        $Risk->name = $request->name; 
        $Risk->save();

        return response()->json([
            'status' => true,
            'message' => 'Riesgos actualizado exitosamente',
            'data' => ['risk' => $Risk]
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
            $Risk = Risk::find($id);
            $Risk->delete();

            return response()->json([
                'status' => true,
                'message' => 'Riesgos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Riesgos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
