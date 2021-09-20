<?php

namespace App\Http\Controllers\Management;

use App\Models\Procedure;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureRequest;
use Illuminate\Database\QueryException;

class ProcedureController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Procedures = Procedure::select();

        if($request->_sort){
            $Procedures->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Procedures->where('name','like','%' . $request->search. '%')
            >orWhere('code', 'like', '%' . $request->search . '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Procedures=$Procedures->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Procedures=$Procedures->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Procedimientos obtenidos exitosamente',
            'data' => ['procedure' => $Procedures]
        ]);
    }
    

    public function store(ProcedureRequest $request): JsonResponse
    {
        $Procedure = new Procedure;
        $Procedure->code = $request->code;
        $Procedure->equivalent = $request->equivalent;
        $Procedure->name = $request->name;
        $Procedure->procedure_category_id = $request->procedure_category_id;
        $Procedure->pbs_type_id = $request->pbs_type_id;
        $Procedure->procedure_age_id = $request->procedure_age_id;
        $Procedure->gender_id = $request->gender_id;
        $Procedure->status_id = $request->status_id;
        $Procedure->procedure_purpose_id = $request->procedure_purpose_id;
        $Procedure->purpose_service_id = $request->purpose_service_id;
        $Procedure->procedure_type_id = $request->procedure_type_id;
        $Procedure->time = $request->time;
        
        $Procedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento creado exitosamente',
            'data' => ['procedure' => $Procedure->toArray()]
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
        $Procedure = Procedure::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento obtenido exitosamente',
            'data' => ['procedure' => $Procedure]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProcedureRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedureRequest $request, int $id): JsonResponse
    {
        $Procedure = new Procedure;
        $Procedure->code = $request->code;
        $Procedure->equivalent = $request->equivalent;
        $Procedure->name = $request->name;
        $Procedure->procedure_category_id = $request->procedure_category_id;
        $Procedure->nopos = $request->nopos;
        $Procedure->age_id = $request->age_id;
        $Procedure->gender_id = $request->gender_id;
        $Procedure->procedure_type_id = $request->procedure_type_id;
        $Procedure->status_id = $request->status_id;
        $Procedure->purpose_id = $request->purpose_id;
        $Procedure->time = $request->time;
        $Procedure->save();

        return response()->json([
            'status' => true,
            'message' => 'Procedimiento actualizado exitosamente',
            'data' => ['procedure' => $Procedure]
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
            $Procedure = Procedure::find($id);
            $Procedure->delete();

            return response()->json([
                'status' => true,
                'message' => 'Procedimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Procedimiento esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
