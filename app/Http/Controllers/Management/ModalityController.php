<?php

namespace App\Http\Controllers\Management;

use App\Models\Modality;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ModalityRequest;
use Illuminate\Database\QueryException;

class ModalityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Modality = Modality::select();

        if($request->_sort){
            $Modality->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Modality->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Modality=$Modality->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Modality=$Modality->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Modalidad obtenidos exitosamente',
            'data' => ['modality' => $Modality]
        ]);
    }

    public function store(ModalityRequest $request): JsonResponse
    {
        $Modality = new Modality;
        $Modality->name = $request->name;
        
        $Modality->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad creada exitosamente',
            'data' => ['modality' => $Modality->toArray()]
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
        $Modality = Modality::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad obtenido exitosamente',
            'data' => ['modality' => $Modality]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ModalityRequest $request, int $id): JsonResponse
    {
        $Modality = Modality::find($id);
        $Modality->name = $request->name;
        
        $Modality->save();

        return response()->json([
            'status' => true,
            'message' => 'Modalidad actualizado exitosamente',
            'data' => ['modality' => $Modality]
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
            $Modality = Modality::find($id);
            $Modality->delete();

            return response()->json([
                'status' => true,
                'message' => 'Modalidad eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Modalidad esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
