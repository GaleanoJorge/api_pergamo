<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeProfessional;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeProfessionalRequest;
use Illuminate\Database\QueryException;

class TypeProfessionalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $TypeProfessional = TypeProfessional::select();

        if($request->_sort){
            $TypeProfessional->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $TypeProfessional->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $TypeProfessional=$TypeProfessional->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $TypeProfessional=$TypeProfessional->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo Profesional asociados exitosamente',
            'data' => ['type_professional' => $TypeProfessional]
        ]);
    }
    

    public function store(TypeProfessionalRequest $request): JsonResponse

    {
        $TypeProfessional = new TypeProfessional;
       
        $TypeProfessional->name = $request->name; 
     
        $TypeProfessional->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Profesional creada exitosamente',
            'data' => ['type_professional' => $TypeProfessional->toArray()]
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
        $TypeProfessional = TypeProfessional::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Profesional obtenido exitosamente',
            'data' => ['type_professional' => $TypeProfessional]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TypeProfessionalRequest $request, int $id): JsonResponse
    
    {
        $TypeProfessional = TypeProfessional::find($id);
    
        $TypeProfessional->name = $request->name; 

        $TypeProfessional->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo Profesional actualizado exitosamente',
            'data' => ['type_professional' => $TypeProfessional]
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
            $TypeProfessional = TypeProfessional::find($id);
            $TypeProfessional->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo Profesional eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo Profesional esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
