<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDiagnosticAids;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Database\QueryException;

class ChDiagnosticAidsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDiagnosticAids = ChDiagnosticAids::with('ch_diagnostic_aids');

        if($request->_sort){
            $ChDiagnosticAids->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ChDiagnosticAids->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ChDiagnosticAids=$ChDiagnosticAids->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ChDiagnosticAids=$ChDiagnosticAids->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Ayudas Diagnósticas obtenidas exitosamente',
            'data' => ['ch_diagnostic_aids' => $ChDiagnosticAids]
        ]);
    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChDiagnosticAids = ChDiagnosticAids::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Ayudas Diagnósticas obtenidas exitosamente',
            'data' => ['ch_diagnostic_aids' => $ChDiagnosticAids]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
            $ChDiagnosticAids = new ChDiagnosticAids;
    
            if (isset($request->aids)) {
                $validator = array_search('RADIOGRAFIA', $request->aids);
                if(isset($validator)){
                    $ChDiagnosticAids->scan = $request->aids[$validator];
                };
    
                $validator = array_search('ESPIROMETRIA', $request->aids);
                if($validator){
                    $ChDiagnosticAids->spirometry = $request->aids[$validator];
                };
    
                $validator = array_search('GASES ARTERIALES', $request->aids);
                if($validator){
                    $ChDiagnosticAids->gases = $request->aids[$validator];
                };
    
                $validator = array_search('POLISOMNOGRAFIA', $request->aids);
                if($validator){
                    $ChDiagnosticAids->polysomnography = $request->aids[$validator];
                };
    
                $validator = array_search('OTRO', $request->aids);
                if($validator){
                    $ChDiagnosticAids->other = $request->aids[$validator];
                };

            }
            
        $ChDiagnosticAids->observation = $request->observation; 
        $ChDiagnosticAids->type_record_id = $request->type_record_id; 
        $ChDiagnosticAids->ch_record_id = $request->ch_record_id; 
        $ChDiagnosticAids->save();

        return response()->json([
            'status' => true,
            'message' => 'Ayudas Diagnósticas asociadas al paciente exitosamente',
            'data' => ['ch_diagnostic_aids' => $ChDiagnosticAids->toArray()]
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
        $ChDiagnosticAids = ChDiagnosticAids::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Ayudas Diagnósticas obtenidas exitosamente',
            'data' => ['ch_diagnostic_aids' => $ChDiagnosticAids]
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
        $ChDiagnosticAids = ChDiagnosticAids::find($id);  
        $ChDiagnosticAids->scan = $request->scan; 
        $ChDiagnosticAids->spirometry = $request->spirometry; 
        $ChDiagnosticAids->gases = $request->gases; 
        $ChDiagnosticAids->polysomnography = $request->polysomnography; 
        $ChDiagnosticAids->other = $request->other; 
        $ChDiagnosticAids->observation = $request->observation; 
        $ChDiagnosticAids->type_record_id = $request->type_record_id; 
        $ChDiagnosticAids->ch_record_id = $request->ch_record_id; 
        $ChDiagnosticAids->save();

        return response()->json([
            'status' => true,
            'message' => 'Ayudas Diagnósticas actualizadas exitosamente',
            'data' => ['ch_diagnostic_aids' => $ChDiagnosticAids]
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
            $ChDiagnosticAids = ChDiagnosticAids::find($id);
            $ChDiagnosticAids->delete();

            return response()->json([
                'status' => true,
                'message' => 'Ayudas Diagnósticas eliminadas exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ayudas Diagnósticas en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
