<?php

namespace App\Http\Controllers\Management;

use App\Models\ServicesBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesBriefcaseRequest;
use Illuminate\Database\QueryException;

class ServicesBriefcaseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::select();

        if($request->_sort){
            $ServicesBriefcase->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ServicesBriefcase->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ServicesBriefcase=$ServicesBriefcase->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ServicesBriefcase=$ServicesBriefcase->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenidos exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    public function store(ServicesBriefcaseRequest $request): JsonResponse
    {
        $ServicesBriefcase = new ServicesBriefcase;
        $ServicesBriefcase->contract_id = $request->contract_id;
        $ServicesBriefcase->procedure_id = $request->procedure_id;
        $ServicesBriefcase->modality_id = $request->modality_id;
        $ServicesBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios creada exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase->toArray()]
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
        $ServicesBriefcase = ServicesBriefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ServicesBriefcaseRequest $request, int $id): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::find($id);
        $ServicesBriefcase->contract_id = $request->contract_id;
        $ServicesBriefcase->procedure_id = $request->procedure_id;
        $ServicesBriefcase->modality_id = $request->modality_id;
        
        $ServicesBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios actualizado exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
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
            $ServicesBriefcase = ServicesBriefcase::find($id);
            $ServicesBriefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'portafolio de servicios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'portafolio de servicios esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
