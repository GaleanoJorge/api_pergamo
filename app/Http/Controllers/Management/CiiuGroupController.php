<?php

namespace App\Http\Controllers\Management;

use App\Models\CiiuGroup;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CiiuGroupRequest;
use Illuminate\Database\QueryException;

class CiiuGroupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CiiuGroup = CiiuGroup::select();

        if($request->_sort){
            $CiiuGroup->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CiiuGroup->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CiiuGroup=$CiiuGroup->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CiiuGroup=$CiiuGroup->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Gurpos de la clasificación industrial internacional uniforme asociados exitosamente',
            'data' => ['ciiu_group' => $CiiuGroup]
        ]);
    }
    

    public function store(CiiuGroupRequest $request): JsonResponse
    {
        $CiiuGroup = new CiiuGroup;
        $CiiuGroup->code = $request->code;
        $CiiuGroup->name = $request->name; 
        $CiiuGroup->division_id  = $request->division_id; 
        $CiiuGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Gurpos de la clasificación industrial internacional uniforme creada exitosamente',
            'data' => ['ciiu_group' => $CiiuGroup->toArray()]
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
        $CiiuGroup = CiiuGroup::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Gurpos de la clasificación industrial internacional uniforme obtenido exitosamente',
            'data' => ['ciiu_group' => $CiiuGroup]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CiiuGroupRequest $request, int $id): JsonResponse
    {
        $CiiuGroup = CiiuGroup::find($id);
        $CiiuGroup->code = $request->code;
        $CiiuGroup->name = $request->name;  
        $CiiuGroup->division_id = $request->division_id; 
        $CiiuGroup->save();

        return response()->json([
            'status' => true,
            'message' => 'Gurpos de la clasificación industrial internacional uniforme actualizado exitosamente',
            'data' => ['ciiu_group' => $CiiuGroup]
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
            $CiiuGroup = CiiuGroup::find($id);
            $CiiuGroup->delete();

            return response()->json([
                'status' => true,
                'message' => 'Gurpos de la clasificación industrial internacional uniforme eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gurpos de la clasificación industrial internacional uniforme esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
