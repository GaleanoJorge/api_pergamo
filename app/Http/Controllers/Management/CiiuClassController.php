<?php

namespace App\Http\Controllers\Management;

use App\Models\CiiuClass;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CiiuClassRequest;
use Illuminate\Database\QueryException;

class CiiuClassController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $CiiuClass = CiiuClass::select();

        if($request->_sort){
            $CiiuClass->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CiiuClass->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CiiuClass=$CiiuClass->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CiiuClass=$CiiuClass->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Clase de la clasificación industrial internacional uniforme asociados exitosamente',
            'data' => ['ciiu_class' => $CiiuClass]
        ]);
    }
    

    public function store(CiiuClassRequest $request): JsonResponse
    {
        $CiiuClass = new CiiuClass;
        $CiiuClass->code = $request->code;
        $CiiuClass->name = $request->name; 
        $CiiuClass->group_id = $request->group_id; 
        $CiiuClass->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de la clasificación industrial internacional uniforme creada exitosamente',
            'data' => ['ciiu_class' => $CiiuClass->toArray()]
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
        $CiiuClass = CiiuClass::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Clase de la clasificación industrial internacional uniforme obtenido exitosamente',
            'data' => ['ciiu_class' => $CiiuClass]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CiiuClassRequest $request, int $id): JsonResponse
    {
        $CiiuClass = CiiuClass::find($id);
        $CiiuClass->code = $request->code;
        $CiiuClass->name = $request->name; 
        $CiiuClass->group_id = $request->group_id;
        $CiiuClass->save();

        return response()->json([
            'status' => true,
            'message' => 'Clase de la clasificación industrial internacional uniforme actualizado exitosamente',
            'data' => ['ciiu_class' => $CiiuClass]
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
            $CiiuClass = CiiuClass::find($id);
            $CiiuClass->delete();

            return response()->json([
                'status' => true,
                'message' => 'Clase de la clasificación industrial internacional uniforme eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Clase de la clasificación industrial internacional uniforme esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
