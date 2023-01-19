<?php

namespace App\Http\Controllers\Management;

use App\Models\ChScaleLawton;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChScaleLawtonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->latest) {
            $ChScaleLawton = ChScaleLawton::where('ch_record_id', $request->ch_record_id)->orderBy('created_at', 'desc')->take(1)->get()->toArray();
       
        } else {
            $ChScaleLawton = ChScaleLawton::select();
    
            if($request->_sort){
                $ChScaleLawton->orderBy($request->_sort, $request->_order);
            }            
    
            if ($request->search) {
                $ChScaleLawton->where('name','like','%' . $request->search. '%');
            }
            if ($request->ch_record_id) {
                $ChScaleLawton->where('ch_record_id', $request->ch_record_id);
            }
    
            if ($request->latest  && isset($request->latest)) {
              
            }
            
            if($request->query("pagination", true)=="false"){
                $ChScaleLawton=$ChScaleLawton->get()->toArray();    
            }
            else{
                $page= $request->query("current_page", 1);
                $per_page=$request->query("per_page", 10);
                
                $ChScaleLawton=$ChScaleLawton->paginate($per_page,'*','page',$page); 
            } 
        }
        


        return response()->json([
            'status' => true,
            'message' => 'Escala Lawton obtenida exitosamente',
            'data' => ['ch_scale_lawton' => $ChScaleLawton]
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
       
        $ChScaleLawton = ChScaleLawton::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Escala Lawton obtenida exitosamente',
            'data' => ['ch_scale_lawton' => $ChScaleLawton]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChScaleLawton = new ChScaleLawton; 
        $ChScaleLawton->phone_title = $request->phone_title; 
        $ChScaleLawton->phone_value= $request->phone_value;
        $ChScaleLawton->phone_detail= $request->phone_detail;
        $ChScaleLawton->shopping_title= $request->shopping_title;
        $ChScaleLawton->shopping_value= $request->shopping_value;
        $ChScaleLawton->shopping_detail = $request->shopping_detail; 
        $ChScaleLawton->food_title= $request->food_title;
        $ChScaleLawton->food_value= $request->food_value;
        $ChScaleLawton->food_detail= $request->food_detail;
        $ChScaleLawton->house_title= $request->house_title;
        $ChScaleLawton->house_value = $request->house_value; 
        $ChScaleLawton->house_detail= $request->house_detail;
        $ChScaleLawton->clothing_title= $request->clothing_title;
        $ChScaleLawton->clothing_value= $request->clothing_value;
        $ChScaleLawton->clothing_detail= $request->clothing_detail;
        $ChScaleLawton->transport_title= $request->transport_title;
        $ChScaleLawton->transport_value= $request->transport_value;
        $ChScaleLawton->transport_detail= $request->transport_detail;
        $ChScaleLawton->medication_title= $request->medication_title;
        $ChScaleLawton->medication_value= $request->medication_value;
        $ChScaleLawton->medication_detail= $request->medication_detail;
        $ChScaleLawton->finance_title= $request->finance_title;
        $ChScaleLawton->finance_value= $request->finance_value;
        $ChScaleLawton->finance_detail= $request->finance_detail;
        $ChScaleLawton->total= $request->total;
        $ChScaleLawton->risk= $request->risk;
        $ChScaleLawton->type_record_id = $request->type_record_id; 
        $ChScaleLawton->ch_record_id = $request->ch_record_id; 
        $ChScaleLawton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Lawton asociada al paciente exitosamente',
            'data' => ['ch_scale_lawton' => $ChScaleLawton->toArray()]
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
        $ChScaleLawton = ChScaleLawton::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Escala Lawton obtenida exitosamente',
            'data' => ['ch_scale_lawton' => $ChScaleLawton]
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
        $ChScaleLawton = ChScaleLawton::find($id);  
        $ChScaleLawton->phone_title = $request->phone_title; 
        $ChScaleLawton->phone_value= $request->phone_value;
        $ChScaleLawton->phone_detail= $request->phone_detail;
        $ChScaleLawton->shopping_title= $request->shopping_title;
        $ChScaleLawton->shopping_value= $request->shopping_value;
        $ChScaleLawton->shopping_detail = $request->shopping_detail; 
        $ChScaleLawton->food_title= $request->food_title;
        $ChScaleLawton->food_value= $request->food_value;
        $ChScaleLawton->food_detail= $request->food_detail;
        $ChScaleLawton->house_title= $request->house_title;
        $ChScaleLawton->house_value = $request->house_value; 
        $ChScaleLawton->house_detail= $request->house_detail;
        $ChScaleLawton->clothing_title= $request->clothing_title;
        $ChScaleLawton->clothing_value= $request->clothing_value;
        $ChScaleLawton->clothing_detail= $request->clothing_detail;
        $ChScaleLawton->transport_title= $request->transport_title;
        $ChScaleLawton->transport_value= $request->transport_value;
        $ChScaleLawton->transport_detail= $request->transport_detail;
        $ChScaleLawton->medication_title= $request->medication_title;
        $ChScaleLawton->medication_value= $request->medication_value;
        $ChScaleLawton->medication_detail= $request->medication_detail;
        $ChScaleLawton->finance_title= $request->finance_title;
        $ChScaleLawton->finance_value= $request->finance_value;
        $ChScaleLawton->finance_detail= $request->finance_detail;
        $ChScaleLawton->total= $request->total;
        $ChScaleLawton->risk= $request->risk;
        $ChScaleLawton->type_record_id = $request->type_record_id; 
        $ChScaleLawton->ch_record_id = $request->ch_record_id; 
        $ChScaleLawton->save();

        return response()->json([
            'status' => true,
            'message' => 'Escala Lawton actualizada exitosamente',
            'data' => ['ch_scale_lawton' => $ChScaleLawton]
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
            $ChScaleLawton = ChScaleLawton::find($id);
            
            $ChScaleLawton->delete();

            return response()->json([
                'status' => true,
                'message' => 'Escala Lawton eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Escala Lawton en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
