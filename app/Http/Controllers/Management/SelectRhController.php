<?php

namespace App\Http\Controllers\Management;

use App\Models\SelectRh;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SelectRhRequest;
use Illuminate\Database\QueryException;

class SelectRhController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SelectRh = SelectRh::select();

        if($request->_sort){
            $SelectRh->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SelectRh->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $SelectRh=$SelectRh->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SelectRh=$SelectRh->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo de RH asociados exitosamente',
            'data' => ['select_rh' => $SelectRh]
        ]);
    }
    

    public function store(SelectRhRequest $request): JsonResponse
    {
        $SelectRh = new SelectRh;
        $SelectRh->name = $request->name; 
        
        $SelectRh->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de RH creada exitosamente',
            'data' => ['select_rh' => $SelectRh->toArray()]
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
        $SelectRh = SelectRh::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de RH obtenido exitosamente',
            'data' => ['select_rh' => $SelectRh]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SelectRhRequest $request, int $id): JsonResponse
    {
        $SelectRh = SelectRh::find($id);
        $SelectRh->name = $request->name; 
       
        $SelectRh->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de RH actualizado exitosamente',
            'data' => ['select_rh' => $SelectRh]
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
            $SelectRh = SelectRh::find($id);
            $SelectRh->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de RH eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de RH esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
