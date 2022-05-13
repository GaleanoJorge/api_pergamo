<?php

namespace App\Http\Controllers\Management;

use App\Models\ServicesBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServicesBriefcaseRequest;
use Illuminate\Database\QueryException;

class ServicesBriefcaseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::select();

        if($request->_sort){
            $ServicesBriefcase->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ServicesBriefcase->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ServicesBriefcase=$ServicesBriefcase->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ServicesBriefcase=$ServicesBriefcase->paginate($per_page,'*','page',$page); 
        } 
        
        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenidos exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

                   /**
     * Get procedure by manual.
     *
     * @param  int  $briefcaseId
     * @return JsonResponse
     */
    public function getByBriefcase(Request $request, int $briefcaseId): JsonResponse
    {
        if ($request->type==1) {
        $ServicesBriefcase = ServicesBriefcase::select('services_briefcase.*','services_briefcase.value','services_briefcase.factor')
        
        ->leftjoin('manual_price', 'services_briefcase.manual_price_id', '=', 'manual_price.id')
        ->leftjoin('procedure', 'manual_price.procedure_id', '=', 'procedure.id')
        ->leftjoin('product', 'manual_price.product_id', '=', 'product.id')
        //->join('procedure_type', 'procedure.procedure_type_id', '=', 'procedure_type.id')
        ->where('briefcase_id', $briefcaseId)->where('manual_price.procedure_id','!=', 'null')
        ->where('procedure.procedure_type_id','!=', '3')->with('briefcase','manual_price.procedure.procedure_category','manual_price.product','manual_price.product.measurement_units', 'manual_price.manual');
        }
        if ($request->type==2) {
            $ServicesBriefcase = ServicesBriefcase::select('services_briefcase.*','services_briefcase.value','services_briefcase.factor')
            
            ->leftjoin('manual_price', 'services_briefcase.manual_price_id', '=', 'manual_price.id')
            ->leftjoin('procedure', 'manual_price.procedure_id', '=', 'procedure.id')
            ->leftjoin('product', 'manual_price.product_id', '=', 'product.id')
            //->join('procedure_type', 'procedure.procedure_type_id', '=', 'procedure_type.id')
            ->where('briefcase_id', $briefcaseId)->where('manual_price.product_id','!=', 'null')->with('briefcase','manual_price.procedure.procedure_category','manual_price.product','manual_price.product.measurement_units', 'manual_price.manual');
            }
        if ($request->search) {
            $ServicesBriefcase->join('manual_price', 'services_briefcase.manual_price_id', '=', 'manual_price.id')
            ->join('procedure', 'manual_price.procedure_id', '=', 'procedure.id')
            //->join('product', 'manual_price.product_id', '=', 'product.id')
            ->join('procedure_type', 'procedure.procedure_type_id', '=', 'procedure_type.id')->where('procedure.name', 'like', '%' . $request->search . '%')
            ->Orwhere('procedure.code', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) == "false") {
            $ServicesBriefcase = $ServicesBriefcase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ServicesBriefcase = $ServicesBriefcase->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Portafolio por contrato obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    public function store(ServicesBriefcaseRequest $request): JsonResponse
    {
        $ServicesBriefcase = new ServicesBriefcase;
        if($request->price_type_id==1){
            if($request->sign==0){
                $request->factor=$request->factor+100;
                $ServicesBriefcase->value = $request->value*$request->factor/100;
                $factor=$request->factor-100;
                $ServicesBriefcase->factor = '+'.$factor;
            }else{
                $tem=$request->value*$request->factor/100;
                $ServicesBriefcase->value = $request->value-$tem;
                $ServicesBriefcase->factor = '-'.$request->factor;
            }
        }else{
            if($request->sign==0){
                $request->factor=$request->factor+100;
                $ServicesBriefcase->value = 30284*$request->value*$request->factor/100;
                $ServicesBriefcase->factor = '+'.$request->factor;
            }else{
                $tem=30284*$request->value*$request->factor/100;
                $ServicesBriefcase->value = $request->value-$tem;
                $ServicesBriefcase->factor = '-'.$request->factor;
            }
            
        }
        $ServicesBriefcase->briefcase_id = $request->briefcase_id;
        $ServicesBriefcase->manual_price_id = $request->manual_price_id;
        $ServicesBriefcase->save();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios creada exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase->toArray()]
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
        $ServicesBriefcase = ServicesBriefcase::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios obtenido exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ServicesBriefcaseRequest $request, int $id): JsonResponse
    {
        $ServicesBriefcase = ServicesBriefcase::find($id);
        if($request->price_type_id==1){
            if($request->sign==0){
                $request->factor=$request->factor+100;
                $ServicesBriefcase->value = $request->value*$request->factor/100;
                $factor=$request->factor-100;
                $ServicesBriefcase->factor = '+'.$factor;
            }else{
                $tem=$request->value*$request->factor/100;
                $ServicesBriefcase->value = $request->value-$tem;
                $ServicesBriefcase->factor = '-'.$request->factor;
            }
        }else{
            if($request->sign==0){
                $request->factor=$request->factor+100;
                $ServicesBriefcase->value = 30284*$request->value*$request->factor/100;
                $ServicesBriefcase->factor = '+'.$request->factor;
            }else{
                $tem=30284*$request->value*$request->factor/100;
                $ServicesBriefcase->value = $request->value-$tem;
                $ServicesBriefcase->factor = '-'.$request->factor;
            }
            
        }
        $ServicesBriefcase->briefcase_id = $request->briefcase_id;
        $ServicesBriefcase->manual_price_id = $request->manual_price_id;
        $ServicesBriefcase->save();
        

        return response()->json([
            'status' => true,
            'message' => 'portafolio de servicios actualizado exitosamente',
            'data' => ['services_briefcase' => $ServicesBriefcase]
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
            $ServicesBriefcase = ServicesBriefcase::find($id);
            $ServicesBriefcase->delete();

            return response()->json([
                'status' => true,
                'message' => 'portafolio de servicios eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'portafolio de servicios esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
