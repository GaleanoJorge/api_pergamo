<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeProfessional;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialFieldRequest;
use Illuminate\Database\QueryException;

class SpecialFieldController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $SpecialField = SpecialField::select();

        if($request->_sort){
            $SpecialField->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $SpecialField->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $SpecialField=$SpecialField->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $SpecialField=$SpecialField->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Especialidad del empleado asociados exitosamente',
            'data' => ['special_field' => $SpecialField]
        ]);
    }
    

    public function store(SpecialFieldRequest $request): JsonResponse
    {
        $SpecialField = new SpecialField;
        
        $SpecialField->name = $request->name; 
     
        $SpecialField->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad del empleadocreada exitosamente',
            'data' => ['special_field' => $SpecialField->toArray()]
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
        $SpecialField = SpecialField::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad del empleado obtenido exitosamente',
            'data' => ['special_field' => $SpecialField]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SpecialFieldRequest $request, int $id): JsonResponse
    {
        $SpecialField = SpecialField::find($id);
        $SpecialField->name = $request->name; 

        $SpecialField->save();

        return response()->json([
            'status' => true,
            'message' => 'Especialidad del empleado actualizado exitosamente',
            'data' => ['special_field' => $SpecialField]
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
            $SpecialField = SpecialField::find($id);
            $SpecialField->delete();

            return response()->json([
                'status' => true,
                'message' => 'Especialidad del empleado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Especialidad del empleado esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
