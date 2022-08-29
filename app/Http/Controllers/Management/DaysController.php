<?php

namespace App\Http\Controllers\Management;

use App\Models\Days;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DaysRequest;
use Illuminate\Database\QueryException;

class DaysController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Days = Days::select();

        if($request->_sort){
            $Days->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Days->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Days=$Days->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Days=$Days->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Dias obtenidos exitosamente',
            'data' => ['Days' => $Days]
        ]);
    }
    

    public function store(DaysRequest $request): JsonResponse
    {
        $Days = new Days;
        $Days->name = $request->name;     
        $Days->save();

        return response()->json([
            'status' => true,
            'message' => 'Dia creado exitosamente',
            'data' => ['Days' => $Days->toArray()]
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
        $Days = Days::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dia obtenido exitosamente',
            'data' => ['Days' => $Days]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DaysRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DaysRequest $request, int $id): JsonResponse
    {
        $Days = Days ::find($id);
        $Days->name = $request->name;      
        $Days->save();

        return response()->json([
            'status' => true,
            'message' => 'Dias actualizado exitosamente',
            'data' => ['Days' => $Days]
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
            $Days = Days::find($id);
            $Days->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diaseliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dias esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
