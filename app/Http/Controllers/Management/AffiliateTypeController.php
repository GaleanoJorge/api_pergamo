<?php

namespace App\Http\Controllers\Management;

use App\Models\AffiliateType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AffiliateTypeRequest;
use Illuminate\Database\QueryException;

class AffiliateTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AffiliateType = AffiliateType::select();

        if($request->_sort){
            $AffiliateType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AffiliateType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AffiliateType=$AffiliateType->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AffiliateType=$AffiliateType->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Tipo de afiliado asociados exitosamente',
            'data' => ['affiliate_type' => $AffiliateType]
        ]);
    }
    

    public function store(AffiliateTypeRequest $request): JsonResponse
    {
        $AffiliateType = new AffiliateType;
        
        $AffiliateType->name = $request->name; 
       
        $AffiliateType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de afiliado creada exitosamente',
            'data' => ['affiliate_type' => $AffiliateType->toArray()]
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
        $AffiliateType = AffiliateType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de afiliado obtenido exitosamente',
            'data' => ['affiliate_type' => $AffiliateType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AffiliateTypeRequest $request, int $id): JsonResponse
    {
        $AffiliateType = AffiliateType::find($id);
         
        $AffiliateType->name = $request->name; 
        
        $AffiliateType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de afiliado actualizado exitosamente',
            'data' => ['affiliate_type' => $AffiliateType]
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
            $AffiliateType = AffiliateType::find($id);
            $AffiliateType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de afiliado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de afiliado esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
