<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleBarthel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleBarthelController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChScaleBarthel = ChScaleBarthel::select();

        if($request->_sort){
            $ChScaleBarthel->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleBarthel->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleBarthel=$ChScaleBarthel->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleBarthel=$ChScaleBarthel->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escala Barthel obtenida exitosamente',
            'data' => ['ch_scale_barthel' => $ChScaleBarthel]
        ]);
    }
    
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {       
       
        $ChScaleBarthel = ChScaleBarthel::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Barthel obtenida exitosamente',
            'data' => ['ch_scale_barthel' => $ChScaleBarthel]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleBarthel = new ChScaleBarthel; 
        $ChScaleBarthel->eat = $request->eat; 
        $ChScaleBarthel->move= $request->move;
        $ChScaleBarthel->cleanliness= $request->cleanliness;
        $ChScaleBarthel->toilet= $request->toilet;
        $ChScaleBarthel->shower= $request->shower;
        $ChScaleBarthel->commute= $request->commute;
        $ChScaleBarthel->shower= $request->cleanliness;
        $ChScaleBarthel->stairs= $request->stairs;
        $ChScaleBarthel->dress= $request->dress;
        $ChScaleBarthel->fecal= $request->fecal;
        $ChScaleBarthel->urine= $request->urine;
        $ChScaleBarthel->classification= $request->classification;
        $ChScaleBarthel->score= $request->score;
        $ChScaleBarthel->type_record_id = $request->type_record_id; 
        $ChScaleBarthel->ch_record_id = $request->ch_record_id; 
        $ChScaleBarthel->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Berthel asociada al paciente exitosamente',
            'data' => ['ch_scale_barthel' => $ChScaleBarthel->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChScaleBarthel = ChScaleBarthel::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escalas Barthel obtenida exitosamente',
            'data' => ['ch_scale_barthel' => $ChScaleBarthel]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChScaleBarthel = ChScaleBarthel::find($id);  
        $ChScaleBarthel->eat = $request->eat; 
        $ChScaleBarthel->move= $request->move;
        $ChScaleBarthel->cleanliness= $request->cleanliness;
        $ChScaleBarthel->toilet= $request->toilet;
        $ChScaleBarthel->shower= $request->shower;
        $ChScaleBarthel->commute= $request->commute;
        $ChScaleBarthel->shower= $request->cleanliness;
        $ChScaleBarthel->stairs= $request->stairs;
        $ChScaleBarthel->dress= $request->dress;
        $ChScaleBarthel->fecal= $request->fecal;
        $ChScaleBarthel->urine= $request->urine;
        $ChScaleBarthel->classification= $request->classification;
        $ChScaleBarthel->score= $request->score;
        $ChScaleBarthel->type_record_id = $request->type_record_id; 
        $ChScaleBarthel->ch_record_id = $request->ch_record_id; 
        $ChScaleBarthel->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas Barhel actualizada exitosamente',
            'data' => ['ch_scale_barthel' => $ChScaleBarthel]
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
            $ChScaleBarthel = ChScaleBarthel::find($id);
            
            $ChScaleBarthel->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Barthel eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Berthel en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
