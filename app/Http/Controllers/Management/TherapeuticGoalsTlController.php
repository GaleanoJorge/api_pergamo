<?php

namespace App\Http\Controllers\Management;

use App\Models\TherapeuticGoalsTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TherapeuticGoalsTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TherapeuticGoalsTl = TherapeuticGoalsTl::select();

        if ($request->_sort) {
            $TherapeuticGoalsTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TherapeuticGoalsTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $TherapeuticGoalsTl = $TherapeuticGoalsTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TherapeuticGoalsTl = $TherapeuticGoalsTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Objetivos Terapeuticos obtenidos exitosamente',
            'data' => ['therapeutic_goals_tl' => $TherapeuticGoalsTl]
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
        
       
        $TherapeuticGoalsTl = TherapeuticGoalsTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Objetivos Terapeuticos asociado al paciente exitosamente',
            'data' => ['therapeutic_goals_tl' => $TherapeuticGoalsTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $TherapeuticGoalsTl = new TherapeuticGoalsTl;
        $TherapeuticGoalsTl->hold_phonoarticulators = $request->hold_phonoarticulators;
        $TherapeuticGoalsTl->strengthen_phonoarticulators = $request->strengthen_phonoarticulators;
        $TherapeuticGoalsTl->strengthen_tone = $request->strengthen_tone;
        $TherapeuticGoalsTl->favor_process = $request->favor_process;
        $TherapeuticGoalsTl->strengthen_thread = $request->strengthen_thread;
        $TherapeuticGoalsTl->favor_psycholinguistic = $request->favor_psycholinguistic;
        $TherapeuticGoalsTl->increase_processes = $request->increase_processes;
        $TherapeuticGoalsTl->strengthen_qualities = $request->strengthen_qualities;
        $TherapeuticGoalsTl->strengthen_communication = $request->strengthen_communication;
        $TherapeuticGoalsTl->improve_skills = $request->improve_skills;
        $TherapeuticGoalsTl->type_record_id = $request->type_record_id;
        $TherapeuticGoalsTl->ch_record_id = $request->ch_record_id;
        $TherapeuticGoalsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos Terapeuticos asociado al paciente exitosamente',
            'data' => ['therapeutic_goals_tl' => $TherapeuticGoalsTl->toArray()]
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
        $TherapeuticGoalsTl = TherapeuticGoalsTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos Terapeuticos obtenido exitosamente',
            'data' => ['therapeutic_goals_tl' => $TherapeuticGoalsTl]
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
        $TherapeuticGoalsTl = TherapeuticGoalsTl::find($id);
        $TherapeuticGoalsTl->hold_phonoarticulators = $request->hold_phonoarticulators;
        $TherapeuticGoalsTl->strengthen_phonoarticulators = $request->strengthen_phonoarticulators;
        $TherapeuticGoalsTl->strengthen_tone = $request->strengthen_tone;
        $TherapeuticGoalsTl->favor_process = $request->favor_process;
        $TherapeuticGoalsTl->strengthen_thread = $request->strengthen_thread;
        $TherapeuticGoalsTl->favor_psycholinguistic = $request->favor_psycholinguistic;
        $TherapeuticGoalsTl->increase_processes = $request->increase_processes;
        $TherapeuticGoalsTl->strengthen_qualities = $request->strengthen_qualities;
        $TherapeuticGoalsTl->strengthen_communication = $request->strengthen_communication;
        $TherapeuticGoalsTl->improve_skills = $request->improve_skills;
        $TherapeuticGoalsTl->type_record_id = $request->type_record_id;
        $TherapeuticGoalsTl->ch_record_id = $request->ch_record_id;
        $TherapeuticGoalsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos Terapeuticos actualizado exitosamente',
            'data' => ['therapeutic_goals_tl' => $TherapeuticGoalsTl]
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
            $TherapeuticGoalsTl = TherapeuticGoalsTl::find($id);
            $TherapeuticGoalsTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Objetivos Terapeuticos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Objetivos Terapeuticos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
