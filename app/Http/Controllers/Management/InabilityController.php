<?php

namespace App\Http\Controllers\Management;

use App\Models\Inability;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InabilityRequest;
use Illuminate\Database\QueryException;

class InabilityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Inability = Inability::select();

        if($request->_sort){
            $Inability->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Inability->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Inability=$Inability->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Inability=$Inability->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Discapacidad del paciente asociados exitosamente',
            'data' => ['inability' => $Inability]
        ]);
    }
    

    public function store(InabilityRequest $request): JsonResponse
    {
        $Inability = new Inability;
        $Inability->name = $request->name; 
        $Inability->code = $request->code; 
       
        $Inability->save();

        return response()->json([
            'status' => true,
            'message' => 'Discapacidad del paciente creada exitosamente',
            'data' => ['inability' => $Inability->toArray()]
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
        $Inability = Inability::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Discapacidad del paciete obtenido exitosamente',
            'data' => ['inability' => $Inability]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(InabilityRequest $request, int $id): JsonResponse
    {
        $Inability = Inability::find($id);
        $Inability->name = $request->name; 
        $Inability->code = $request->code; 
        
        $Inability->save();

        return response()->json([
            'status' => true,
            'message' => 'Discapacidad del paciete actualizado exitosamente',
            'data' => ['inability' => $Inability]
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
            $Inability = Inability::find($id);
            $Inability->delete();

            return response()->json([
                'status' => true,
                'message' => 'Discapacidad del paciete eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Discapacidad del paciete esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
