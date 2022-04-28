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
        $ChScaleNews = ChScaleNews::select();

        if($request->_sort){
            $ChScaleNews->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChScaleNews->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChScaleNews=$ChScaleNews->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChScaleNews=$ChScaleNews->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Escalas obtenidos exitosamente',
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
        $ChScaleNews->parameter_one= $request->parameter_one;
        $ChScaleNews->parameter_two= $request->parameter_two;
        $ChScaleNews->parameter_three= $request->parameter_three;
        $ChScaleNews->parameter_four= $request->parameter_four;
        $ChScaleNews->parameter_five= $request->parameter_five;
        $ChScaleNews->parameter_six= $request->parameter_six;
        $ChScaleNews->parameter_seven= $request->parameter_seven;
        $ChScaleNews->parameter_eight= $request->parameter_eight;
        $ChScaleNews->qualification= $request->qualification;
        $ChScaleNews->risk= $request->risk;
        $ChScaleNews->response= $request->response;
        $ChScaleNews->type_record_id = $request->type_record_id; 
        $ChScaleNews->ch_record_id = $request->ch_record_id; 
        $ChScaleNews->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas asociado al paciente exitosamente',
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
            'message' => 'Escalas obtenido exitosamente',
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
        $ChScaleNews->parameter_one= $request->parameter_one;
        $ChScaleNews->parameter_two= $request->parameter_two;
        $ChScaleNews->parameter_three= $request->parameter_three;
        $ChScaleNews->parameter_four= $request->parameter_four;
        $ChScaleNews->parameter_five= $request->parameter_five;
        $ChScaleNews->parameter_six= $request->parameter_six;
        $ChScaleNews->parameter_seven= $request->parameter_seven;
        $ChScaleNews->parameter_eight= $request->parameter_eight;
        $ChScaleNews->qualification= $request->qualification;
        $ChScaleNews->risk= $request->risk;
        $ChScaleNews->response= $request->response;
        $ChScaleNews->type_record_id = $request->type_record_id; 
        $ChScaleNews->ch_record_id = $request->ch_record_id; 
        $ChScaleNews->save();

        return response()->json([
            'status' => true,
            'message' => 'Escalas actualizado exitosamente',
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
                'message' => 'Escalas eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escalas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
