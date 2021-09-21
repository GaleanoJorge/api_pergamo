<?php

namespace App\Http\Controllers\Management;

use App\Models\Iva;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IvaRequest;
use Illuminate\Database\QueryException;

class IvaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Iva = Iva::select();

        if($request->_sort){
            $Iva->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Iva->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Iva=$Iva->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Iva=$Iva->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Nombre del tipo de iva asociados exitosamente',
            'data' => ['iva' => $Iva]
        ]);
    }
    

    public function store(IvaRequest $request): JsonResponse
    {
        $Iva = new Iva;
        $Iva->name = $request->name; 
        $Iva->save();

        return response()->json([
            'status' => true,
            'message' => 'Nombre del tipo de iva creada exitosamente',
            'data' => ['iva' => $Iva->toArray()]
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
        $Iva = Iva::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nombre del tipo de iva obtenido exitosamente',
            'data' => ['iva' => $Iva]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(IvaRequest $request, int $id): JsonResponse
    {
        $Iva = Iva::find($id);
        $Iva->name = $request->name; 
        $Iva->save();

        return response()->json([
            'status' => true,
            'message' => 'Nombre del tipo de iva actualizado exitosamente',
            'data' => ['iva' => $Iva]
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
            $Iva = Iva::find($id);
            $Iva->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nombre del tipo de iva eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nombre del tipo de iva esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
