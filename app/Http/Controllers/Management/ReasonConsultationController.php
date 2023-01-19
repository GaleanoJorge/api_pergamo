<?php

namespace App\Http\Controllers\Management;

use App\Models\ReasonConsultation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReasonConsultationRequest;
use Illuminate\Database\QueryException;

class ReasonConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ReasonConsultation = ReasonConsultation::select();

        if($request->_sort){
            $ReasonConsultation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $ReasonConsultation->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $ReasonConsultation = $ReasonConsultation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $ReasonConsultation=$ReasonConsultation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta asociado exitosamente',
            'data' => ['reason_consultation' => $ReasonConsultation]
        ]);
    }

 
    public function store(Request $request): JsonResponse
    {
        $ReasonConsultation = new ReasonConsultation;
        
        $ReasonConsultation->admissions_id = $request->admissions_id;
        $ReasonConsultation->symptoms = $request->symptoms;
        $ReasonConsultation->respiratory_issues = $request->respiratory_issues;
        $ReasonConsultation->covid_contact = $request->covid_contact;

        $ReasonConsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta creado exitosamente',
            'data' => ['reason_consultation' => $ReasonConsultation->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id):  JsonResponse
    {
        $ReasonConsultation = ReasonConsultation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta obtenido exitosamente',
            'data' => ['reason_consultation' => $ReasonConsultation]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function update(ReasonConsultationRequest $request, int $id): JsonResponse
    {
        $ReasonConsultation = ReasonConsultation::find($id);
        
        $ReasonConsultation->wrong_user_id = $request->user_id;
        $ReasonConsultation->right_user_id = $request->user_id;
        $ReasonConsultation->observation_novelty_id = $request->observation_novelty_id;
        $ReasonConsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Motivo de consulta actualizado exitosamente',
            'data' => ['reason_consultation' => $ReasonConsultation->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $ReasonConsultation = ReasonConsultation::find($id);
            $ReasonConsultation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Motivo de consulta eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Motivo de consulta esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
