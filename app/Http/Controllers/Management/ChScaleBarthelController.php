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
        if($request->latest) {
            $ChScaleBarthel = ChScaleBarthel::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
       
         }else{ 
             
            $ChScaleBarthel = ChScaleBarthel::select();

        if($request->_sort){
            $ChScaleBarthel->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleBarthel->where('name','like','%' . $request->search. '%');
        }
        
        if ($request->ch_record_id) {
            $ChScaleBarthel->where('ch_record_id', $request->ch_record_id);
        }
        if ($request->latest  && isset($request->latest)) {
           
         }
        if($request->query("pagination", true)=="false"){
            $ChScaleBarthel=$ChScaleBarthel->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleBarthel=$ChScaleBarthel->paginate($per_page,'*','page',$page); 
        } 
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
        $ChScaleBarthel->eat_title= $request->eat_title;
        $ChScaleBarthel->eat_value= $request->eat_value;
        $ChScaleBarthel->eat_detail= $request->eat_detail;
        $ChScaleBarthel->move_title= $request->move_title;
        $ChScaleBarthel->move_value= $request->move_value;
        $ChScaleBarthel->move_detail= $request->move_detail;
        $ChScaleBarthel->cleanliness_title= $request->cleanliness_title;
        $ChScaleBarthel->cleanliness_value= $request->cleanliness_value;
        $ChScaleBarthel->cleanliness_detail= $request->cleanliness_detail;
        $ChScaleBarthel->toilet_title= $request->toilet_title;
        $ChScaleBarthel->toilet_value= $request->toilet_value;
        $ChScaleBarthel->toilet_detail= $request->toilet_detail;
        $ChScaleBarthel->shower_title= $request->shower_title;
        $ChScaleBarthel->shower_value= $request->shower_value;
        $ChScaleBarthel->shower_detail= $request->shower_detail;
        $ChScaleBarthel->commute_title= $request->commute_title;
        $ChScaleBarthel->commute_value= $request->commute_value;
        $ChScaleBarthel->commute_detail= $request->commute_detail;
        $ChScaleBarthel->stairs_title= $request->stairs_title;
        $ChScaleBarthel->stairs_value= $request->stairs_value;
        $ChScaleBarthel->stairs_detail= $request->stairs_detail;
        $ChScaleBarthel->dress_title= $request->dress_title;
        $ChScaleBarthel->dress_value= $request->dress_value;
        $ChScaleBarthel->dress_detail= $request->dress_detail;
        $ChScaleBarthel->fecal_title= $request->fecal_title;
        $ChScaleBarthel->fecal_value= $request->fecal_value;
        $ChScaleBarthel->fecal_detail= $request->fecal_detail;
        $ChScaleBarthel->urine_title= $request->urine_title;
        $ChScaleBarthel->urine_value= $request->urine_value;
        $ChScaleBarthel->urine_detail= $request->urine_detail;
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
        $ChScaleBarthel->eat_title= $request->eat_title;
        $ChScaleBarthel->eat_value= $request->eat_value;
        $ChScaleBarthel->eat_detail= $request->eat_detail;
        $ChScaleBarthel->move_title= $request->move_title;
        $ChScaleBarthel->move_value= $request->move_value;
        $ChScaleBarthel->move_detail= $request->move_detail;
        $ChScaleBarthel->cleanliness_title= $request->cleanliness_title;
        $ChScaleBarthel->cleanliness_value= $request->cleanliness_value;
        $ChScaleBarthel->cleanliness_detail= $request->cleanliness_detail;
        $ChScaleBarthel->toilet_title= $request->toilet_title;
        $ChScaleBarthel->toilet_value= $request->toilet_value;
        $ChScaleBarthel->toilet_detail= $request->toilet_detail;
        $ChScaleBarthel->shower_title= $request->shower_title;
        $ChScaleBarthel->shower_value= $request->shower_value;
        $ChScaleBarthel->shower_detail= $request->shower_detail;
        $ChScaleBarthel->commute_title= $request->commute_title;
        $ChScaleBarthel->commute_value= $request->commute_value;
        $ChScaleBarthel->commute_detail= $request->commute_detail;
        $ChScaleBarthel->stairs_title= $request->stairs_title;
        $ChScaleBarthel->stairs_value= $request->stairs_value;
        $ChScaleBarthel->stairs_detail= $request->stairs_detail;
        $ChScaleBarthel->dress_title= $request->dress_title;
        $ChScaleBarthel->dress_value= $request->dress_value;
        $ChScaleBarthel->dress_detail= $request->dress_detail;
        $ChScaleBarthel->fecal_title= $request->fecal_title;
        $ChScaleBarthel->fecal_value= $request->fecal_value;
        $ChScaleBarthel->fecal_detail= $request->fecal_detail;
        $ChScaleBarthel->urine_title= $request->urine_title;
        $ChScaleBarthel->urine_value= $request->urine_value;
        $ChScaleBarthel->urine_detail= $request->urine_detail;
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
