<?php

namespace App\Http\Controllers\Management;

use App\Models\FiscalClasification;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FiscalClasificationRequest;
use Illuminate\Database\QueryException;

class FiscalClasificationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FiscalClasification = FiscalClasification::select();

        if($request->_sort){
            $FiscalClasification->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $FiscalClasification->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $FiscalClasification=$FiscalClasification->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $FiscalClasification=$FiscalClasification->paginate($per_page,'*','page',$page); 
        } 
        return response()->json([
            'status' => true,
            'message' => 'Priorizacion de los atributos fiscales de la empresa obtenida exitosamente',
            'data' => ['fiscal_clasification' => $FiscalClasification]
        ]);
    }
    

    public function store(FiscalClasificationRequest $request): JsonResponse
    {
        $FiscalClasification = new FiscalClasification;
        $FiscalClasification->fst_name = $request->fst_name;
        $FiscalClasification->save();

        return response()->json([
            'status' => true,
            'message' => 'Priorizacion de los atributos fiscales de la empresa creada exitosamente',
            'data' => ['fiscal_clasification' => $FiscalClasification->toArray()]
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
        $FiscalClasification = FiscalClasification::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Priorizacion de los atributos fiscales de la empresa obtenido exitosamente',
            'data' => ['fiscal_clasification' => $FiscalClasification]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(FiscalClasificationRequest $request, int $id): JsonResponse
    {
        $FiscalClasification = FiscalClasification::find($id);
        $FiscalClasification->fst_name = $request->fst_name;
        $FiscalClasification->save();

        return response()->json([
            'status' => true,
            'message' => 'Priorizacion de los atributos fiscales de la empresa actualizado exitosamente',
            'data' => ['fiscal_clasification' => $FiscalClasification]
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
            $FiscalClasification = FiscalClasification::find($id);
            $FiscalClasification->delete();

            return response()->json([
                'status' => true,
                'message' => 'Priorizacion de los atributos fiscales de la empresa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Priorizacion de los atributos fiscales de la empresa esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
