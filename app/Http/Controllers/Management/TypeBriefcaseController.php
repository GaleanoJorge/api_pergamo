<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeBriefcaseRequest;
use Illuminate\Database\QueryException;

class TypeBriefcaseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TypeBriefcase = TypeBriefcase::select();

        if($request->_sort){
            $TypeBriefcase->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TypeBriefcase->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TypeBriefcase=$TypeBriefcase->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TypeBriefcase=$TypeBriefcase->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Tipos de portafolios obtenidos exitosamente',
            'data' => ['type_briefcase' => $TypeBriefcase]
        ]);
    }

    public function store(TypeBriefcaseRequest $request): JsonResponse
    {
        $TypeBriefcase = new TypeBriefcase;
        $TypeBriefcase->name = $request->name;
        $TypeBriefcase->code = $request->code;
        
        $TypeBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de portafolios de entidades de salud creada exitosamente',
            'data' => ['type_briefcase' => $TypeBriefcase->toArray()]
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
        $TypeBriefcase = TypeBriefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de portafolios de entidades de salud obtenido exitosamente',
            'data' => ['type_briefcase' => $TypeBriefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TypeBriefcaseRequest $request, int $id): JsonResponse
    {
        $TypeBriefcase = TypeBriefcase::find($id);
        $TypeBriefcase->name = $request->name;
        $TypeBriefcase->code = $request->code;
        $TypeBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de portafolios de entidades de salud actualizado exitosamente',
            'data' => ['type_briefcase' => $TypeBriefcase]
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
            $TypeBriefcase = TypeBriefcase::find($id);
            $TypeBriefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de portafolios de entidad de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de portafolios de entidad de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
