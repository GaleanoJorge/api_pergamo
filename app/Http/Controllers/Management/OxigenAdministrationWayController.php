<?php

namespace App\Http\Controllers\Management;

use App\Models\OxigenAdministrationWay;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OxigenAdministrationWayRequest;
use Illuminate\Database\QueryException;

class OxigenAdministrationWayController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $OxigenAdministrationWay = OxigenAdministrationWay::select();

        if($request->_sort){
            $OxigenAdministrationWay->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $OxigenAdministrationWay->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $OxigenAdministrationWay=$OxigenAdministrationWay->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $OxigenAdministrationWay=$OxigenAdministrationWay->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Vías de administración de oxígeno obtenidos exitosamente',
            'data' => ['oxigen_administration_way' => $OxigenAdministrationWay]
        ]);
    }

    public function store(OxigenAdministrationWayRequest $request): JsonResponse
    {
        $OxigenAdministrationWay = new OxigenAdministrationWay;
        $OxigenAdministrationWay->name = $request->name;
        
        $OxigenAdministrationWay->save();

        return response()->json([
            'status' => true,
            'message' => 'Vías de administración de oxígeno creados exitosamente',
            'data' => ['oxigen_administration_way' => $OxigenAdministrationWay->toArray()]
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
        $OxigenAdministrationWay = OxigenAdministrationWay::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Vías de administración de oxígeno obtenidos exitosamente',
            'data' => ['oxigen_administration_way' => $OxigenAdministrationWay]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(OxigenAdministrationWayRequest $request, int $id): JsonResponse
    {
        $OxigenAdministrationWay = OxigenAdministrationWay::find($id);
        $OxigenAdministrationWay->name = $request->name;
        
        $OxigenAdministrationWay->save();

        return response()->json([
            'status' => true,
            'message' => 'Vías de administración de oxígeno actualizados exitosamente',
            'data' => ['oxigen_administration_way' => $OxigenAdministrationWay]
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
            $OxigenAdministrationWay = OxigenAdministrationWay::find($id);
            $OxigenAdministrationWay->delete();

            return response()->json([
                'status' => true,
                'message' => 'Vías de administración de oxígeno eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Vías de administración de oxígeno estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
