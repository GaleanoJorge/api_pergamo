<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleNews;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleNewsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleNews = ChScaleNews::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
        } else {

        $ChScaleNews = ChScaleNews::select();

        if($request->_sort){
            $ChScaleNews->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleNews->where('name','like','%' . $request->search. '%');
        }
        if ($request->ch_record_id) {
            $ChScaleNews->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->latest  && isset($request->latest)) {
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleNews=$ChScaleNews->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleNews=$ChScaleNews->paginate($per_page,'*','page',$page); 
        } 

    }
        return response()->json([
            'status' => true,
            'message' => 'Escala News obtenida exitosamente',
            'data' => ['ch_scale_news' => $ChScaleNews]
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
       
        $ChScaleNews = ChScaleNews::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
            'data' => ['ch_scale_news' => $ChScaleNews]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleNews = new ChScaleNews; 
        $ChScaleNews->p_one_title= $request->p_one_title;
        $ChScaleNews->p_one_value= $request->p_one_value;
        $ChScaleNews->p_one_detail= $request->p_one_detail;
        $ChScaleNews->p_two_title= $request->p_two_title;
        $ChScaleNews->p_two_value= $request->p_two_value;
        $ChScaleNews->p_two_detail= $request->p_two_detail;
        $ChScaleNews->p_three_title= $request->p_three_title;
        $ChScaleNews->p_three_value= $request->p_three_value;
        $ChScaleNews->p_three_detail= $request->p_three_detail;
        $ChScaleNews->p_four_title= $request->p_four_title;
        $ChScaleNews->p_four_value= $request->p_four_value;
        $ChScaleNews->p_four_detail= $request->p_four_detail;
        $ChScaleNews->p_five_title= $request->p_five_title;
        $ChScaleNews->p_five_value= $request->p_five_value;
        $ChScaleNews->p_five_detail= $request->p_five_detail;
        $ChScaleNews->p_six_title= $request->p_six_title;
        $ChScaleNews->p_six_value= $request->p_six_value;
        $ChScaleNews->p_six_detail= $request->p_six_detail;
        $ChScaleNews->p_seven_title= $request->p_seven_title;
        $ChScaleNews->p_seven_value= $request->p_seven_value;
        $ChScaleNews->p_seven_detail= $request->p_seven_detail;
        $ChScaleNews->p_eight_title= $request->p_eight_title;
        $ChScaleNews->p_eight_value= $request->p_eight_value;
        $ChScaleNews->p_eight_detail= $request->p_eight_detail;
        $ChScaleNews->qualification= $request->qualification;
        $ChScaleNews->risk= $request->risk;
        $ChScaleNews->response= $request->response;
        $ChScaleNews->type_record_id = $request->type_record_id; 
        $ChScaleNews->ch_record_id = $request->ch_record_id; 
        $ChScaleNews->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala News asociada al paciente exitosamente',
            'data' => ['ch_scale_news' => $ChScaleNews->toArray()]
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
        $ChScaleNews = ChScaleNews::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala News obtenida exitosamente',
            'data' => ['ch_scale_news' => $ChScaleNews]
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
        $ChScaleNews = ChScaleNews::find($id);  
        $ChScaleNews->p_one_title= $request->p_one_title;
        $ChScaleNews->p_one_value= $request->p_one_value;
        $ChScaleNews->p_one_detail= $request->p_one_detail;
        $ChScaleNews->p_two_title= $request->p_two_title;
        $ChScaleNews->p_two_value= $request->p_two_value;
        $ChScaleNews->p_two_detail= $request->p_two_detail;
        $ChScaleNews->p_three_title= $request->p_three_title;
        $ChScaleNews->p_three_value= $request->p_three_value;
        $ChScaleNews->p_three_detail= $request->p_three_detail;
        $ChScaleNews->p_four_title= $request->p_four_title;
        $ChScaleNews->p_four_value= $request->p_four_value;
        $ChScaleNews->p_four_detail= $request->p_four_detail;
        $ChScaleNews->p_five_title= $request->p_five_title;
        $ChScaleNews->p_five_value= $request->p_five_value;
        $ChScaleNews->p_five_detail= $request->p_five_detail;
        $ChScaleNews->p_six_title= $request->p_six_title;
        $ChScaleNews->p_six_value= $request->p_six_value;
        $ChScaleNews->p_six_detail= $request->p_six_detail;
        $ChScaleNews->p_seven_title= $request->p_seven_title;
        $ChScaleNews->p_seven_value= $request->p_seven_value;
        $ChScaleNews->p_seven_detail= $request->p_seven_detail;
        $ChScaleNews->p_eight_title= $request->p_eight_title;
        $ChScaleNews->p_eight_value= $request->p_eight_value;
        $ChScaleNews->p_eight_detail= $request->p_eight_detail;
        $ChScaleNews->qualification= $request->qualification;
        $ChScaleNews->risk= $request->risk;
        $ChScaleNews->response= $request->response;
        $ChScaleNews->type_record_id = $request->type_record_id; 
        $ChScaleNews->ch_record_id = $request->ch_record_id; 
        $ChScaleNews->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala News actualizada exitosamente',
            'data' => ['ch_scale_news' => $ChScaleNews]
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
            $ChScaleNews = ChScaleNews::find($id);
            
            $ChScaleNews->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala News eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala News en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
