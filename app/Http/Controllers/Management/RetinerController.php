<?php

namespace App\Http\Controllers\Management;

use App\Models\Retiner;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RetinerRequest;
use Illuminate\Database\QueryException;

class RetinerController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Retiner = Retiner::select();

        if($request->_sort){
            $Retiner->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Retiner->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Retiner=$Retiner->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Retiner=$Retiner->paginate($per_page,'*','page',$page); 
        } 

        return response()->json([
            'status' => true,
            'message' => 'Tipo de autorretendoras asociados exitosamente',
            'data' => ['retiner' => $Retiner]
        ]);
    }
    

    public function store(RetinerRequest $request): JsonResponse
    {
        $Retiner = new Retiner;
        $Retiner->name = $request->name; 
        $Retiner->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de autorretendoras creada exitosamente',
            'data' => ['retiner' => $Retiner->toArray()]
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
        $Retiner = Retiner::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de autorretendoras obtenido exitosamente',
            'data' => ['retiner' => $Retiner]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RetinerRequest $request, int $id): JsonResponse
    {
        $Retiner = Retiner::find($id);
        $Retiner->name = $request->name;  
        $Retiner->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de autorretendoras actualizado exitosamente',
            'data' => ['retiner' => $Retiner]
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
            $Retiner = Retiner::find($id);
            $Retiner->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de autorretendoras eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de autorretendoras esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
