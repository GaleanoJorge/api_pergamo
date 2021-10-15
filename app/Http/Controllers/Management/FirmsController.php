<?php

namespace App\Http\Controllers\Management;

use App\Models\Firms;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FirmsRequest;
use Illuminate\Database\QueryException;

class FirmsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Firms = Firms::select();

        if($request->_sort){
            $Firms->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Firms->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Firms=$Firms->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Firms=$Firms->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'Firmas obtenidas exitosamente',
            'data' => ['firms' => $Firms]
        ]);
    }

    public function store(FirmsRequest $request): JsonResponse
    {
        $Firms = new Firms;
        $Firms->name = $request->name;
        
        $Firms->save();

        return response()->json([
            'status' => true,
            'message' => 'Firma creada exitosamente',
            'data' => ['firms' => $Firms->toArray()]
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
        $Firms = Firms::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Firma obtenida exitosamente',
            'data' => ['firms' => $Firms]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FirmsRequest $request, int $id): JsonResponse
    {
        $Firms = Firms::find($id);
        $Firms->name = $request->name;
        
        $Firms->save();

        return response()->json([
            'status' => true,
            'message' => 'Firma actualizada exitosamente',
            'data' => ['firms' => $Firms]
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
            $Firms = Firms::find($id);
            $Firms->delete();

            return response()->json([
                'status' => true,
                'message' => 'Firma eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Firma esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
