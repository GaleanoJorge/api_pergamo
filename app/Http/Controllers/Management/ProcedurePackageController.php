<?php

namespace App\Http\Controllers\Management;

use App\Models\ProcedurePackage;
use App\Models\CampusBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedurePackageRequest;
use Illuminate\Database\QueryException;

class ProcedurePackageController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::with('procedure');

        if($request->_sort){
            $ProcedurePackage->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ProcedurePackage->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ProcedurePackage=$ProcedurePackage->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ProcedurePackage=$ProcedurePackage->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenidos exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }


                     /**
     * Get procedure by manual.
     *
     * @param  int  $packageId
     * @return JsonResponse
     */
    public function getByPackage(Request $request, int $packageId): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::where('procedure_package_id', $packageId);
        if ($request->search) {
            $ProcedurePackage->where('name', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $ProcedurePackage = $ProcedurePackage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ProcedurePackage = $ProcedurePackage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }

    public function store(ProcedurePackageRequest $request): JsonResponse
    {
        $ProcedurePackage = new ProcedurePackage;
        $ProcedurePackage->procedure_package_id = $request->procedure_package_id;
        $ProcedurePackage->procedure_id = $request->procedure_id;
        $ProcedurePackage->save();


        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos creada exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage->toArray()]
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
        $ProcedurePackage = ProcedurePackage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ProcedurePackageRequest $request, int $id): JsonResponse
    {
        $ProcedurePackage = ProcedurePackage::find($id);
        $ProcedurePackage->procedure_package_id = $request->procedure_package_id;
        $ProcedurePackage->procedure_id = $request->procedure_id;
        $ProcedurePackage->save();

         return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos actualizado exitosamente',
            'data' => ['procedure_package' => $ProcedurePackage]
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
            $ProcedurePackage = ProcedurePackage::find($id);
            $ProcedurePackage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Paquete de procedimientos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Paquete de procedimientos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
