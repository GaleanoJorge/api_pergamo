<?php

namespace App\Http\Controllers\Management;

use App\Models\AdmissionRoute;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdmissionRouteRequest;
use Illuminate\Database\QueryException;

class AdmissionRouteController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AdmissionRoute = AdmissionRoute::select();

        if($request->_sort){
            $AdmissionRoute->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AdmissionRoute->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AdmissionRoute=$AdmissionRoute->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AdmissionRoute=$AdmissionRoute->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Vía de ingreso del paciente asociados exitosamente',
            'data' => ['admission_route' => $AdmissionRoute]
        ]);
    }
    

    public function store(AdmissionRouteRequest $request): JsonResponse
    {
        $AdmissionRoute = new AdmissionRoute;
        $AdmissionRoute->name = $request->name; 
        $AdmissionRoute->save();

        return response()->json([
            'status' => true,
            'message' => 'Vía de ingreso del paciente  creada exitosamente',
            'data' => ['admission_route' => $AdmissionRoute->toArray()]
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
        $AdmissionRoute = AdmissionRoute::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Vía de ingreso del paciente obtenido exitosamente',
            'data' => ['admission_route' => $AdmissionRoute]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AdmissionRouteRequest $request, int $id): JsonResponse
    {
        $AdmissionRoute = AdmissionRoute::find($id); 
        $AdmissionRoute->name = $request->name; 
        
        $AdmissionRoute->save();

        return response()->json([
            'status' => true,
            'message' => 'Vía de ingreso del paciente  actualizado exitosamente',
            'data' => ['admission_route' => $AdmissionRoute]
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
            $AdmissionRoute = AdmissionRoute::find($id);
            $AdmissionRoute->delete();

            return response()->json([
                'status' => true,
                'message' => 'Vía de ingreso del paciente  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Vía de ingreso del paciente  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
