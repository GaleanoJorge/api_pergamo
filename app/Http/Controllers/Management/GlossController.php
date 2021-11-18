<?php

namespace App\Http\Controllers\Management;

use App\Models\Gloss;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GlossRequest;
use Illuminate\Database\QueryException;

class GlossController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Gloss = Gloss::with('company','campus','objetion_type','repeated_initial','gloss_modality','gloss_ambit','gloss_service','objetion_code','user','received_by');

        if($request->_sort){
            $Gloss->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Gloss->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Gloss=$Gloss->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Gloss=$Gloss->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Glosas obtenidas exitosamente',
            'data' => ['gloss' => $Gloss]
        ]);
    }
    

    public function store(GlossRequest $request): JsonResponse
    {
        $Gloss = new Gloss;
        $Gloss->objetion_type_id=$request->objetion_type_id;
        $Gloss->repeated_initial_id=$request->repeated_initial_id;
        $Gloss->company_id=$request->company_id;
        $Gloss->campus_id=$request->campus_id;
        $Gloss->gloss_ambit_id=$request->gloss_ambit_id;
        $Gloss->gloss_modality_id=$request->gloss_modality_id;
        $Gloss->gloss_service_id=$request->gloss_service_id;
        $Gloss->objetion_code_id=$request->objetion_code_id;
        $Gloss->user_id=Auth::user()->id;
        $Gloss->received_by_id=$request->received_by_id;
        $Gloss->invoice_prefix=$request->invoice_prefix;
        $Gloss->objetion_detail=$request->objetion_detail;
        $Gloss->invoice_consecutive=$request->invoice_consecutive;
        $Gloss->objeted_value=$request->objeted_value;
        $Gloss->invoice_value=$request->invoice_value;
        $Gloss->emission_date=$request->emission_date;
        $Gloss->radication_date=$request->radication_date;
        $Gloss->received_date=$request->received_date;
        $Gloss->save();

        return response()->json([
            'status' => true,
            'message' => 'Glosas creadas exitosamente',
            'data' => ['gloss' => $Gloss->toArray()]
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
        $Gloss = Gloss::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Glosas obtenidas exitosamente',
            'data' => ['gloss' => $Gloss]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GlossRequest $request, int $id): JsonResponse
    {
        $Gloss = Gloss::find($id);
        $Gloss->objetion_type_id=$request->objetion_type_id;
        $Gloss->repeated_initial_id=$request->repeated_initial_id;
        $Gloss->company_id=$request->company_id;
        $Gloss->campus_id=$request->campus_id;
        $Gloss->gloss_ambit_id=$request->gloss_ambit_id;
        $Gloss->gloss_modality_id=$request->gloss_modality_id;
        $Gloss->gloss_service_id=$request->gloss_service_id;
        $Gloss->objetion_code_id=$request->objetion_code_id;
        $Gloss->user_id=Auth::user()->id;
        $Gloss->received_by_id=$request->received_by_id;
        $Gloss->invoice_prefix=$request->invoice_prefix;
        $Gloss->objetion_detail=$request->objetion_detail;
        $Gloss->invoice_consecutive=$request->invoice_consecutive;
        $Gloss->objeted_value=$request->objeted_value;
        $Gloss->invoice_value=$request->invoice_value;
        $Gloss->emission_date=$request->emission_date;
        $Gloss->radication_date=$request->radication_date;
        $Gloss->received_date=$request->received_date;
        $Gloss->save();
        

        return response()->json([
            'status' => true,
            'message' => 'Glosas actualizadas exitosamente',
            'data' => ['gloss' => $Gloss]
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
            $Gloss = Gloss::find($id);
            $Gloss->delete();

            return response()->json([
                'status' => true,
                'message' => 'Glosas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Glosas esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
