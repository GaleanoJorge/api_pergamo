<?php

namespace App\Http\Controllers\Management;

use App\Models\VoiceAlterationsTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VoiceAlterationsTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $VoiceAlterationsTl = VoiceAlterationsTl::select();
        if ($request->_sort) {
            $VoiceAlterationsTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $VoiceAlterationsTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $VoiceAlterationsTl = $VoiceAlterationsTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VoiceAlterationsTl = $VoiceAlterationsTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Voz  obtenidos exitosamente',
            'data' => ['voice_alterations_tl' => $VoiceAlterationsTl]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        
       
        $VoiceAlterationsTl = VoiceAlterationsTl::with( 'type_record', 'ch_record')
        ->where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $VoiceAlterationsTl = $VoiceAlterationsTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VoiceAlterationsTl = $VoiceAlterationsTl->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Voz Asociada  al paciente exitosamente',
            'data' => ['voice_alterations_tl' => $VoiceAlterationsTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $VoiceAlterationsTl = new VoiceAlterationsTl;
        $VoiceAlterationsTl->bell_alteration = $request->bell_alteration;
        $VoiceAlterationsTl->tone_alteration = $request->tone_alteration;
        $VoiceAlterationsTl->intensity_alteration = $request->intensity_alteration;
        $VoiceAlterationsTl->observations = $request->observations;
        $VoiceAlterationsTl->type_record_id = $request->type_record_id;
        $VoiceAlterationsTl->ch_record_id = $request->ch_record_id;
        $VoiceAlterationsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Voz Asociada  al paciente exitosamente',
            'data' => ['voice_alterations_tl' => $VoiceAlterationsTl->toArray()]
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
        $VoiceAlterationsTl = VoiceAlterationsTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Voz obtenido exitosamente',
            'data' => ['voice_alterations_tl' => $VoiceAlterationsTl]
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
        $VoiceAlterationsTl = VoiceAlterationsTl::find($id);
        $VoiceAlterationsTl->bell_alteration = $request->bell_alteration;
        $VoiceAlterationsTl->tone_alteration = $request->tone_alteration;
        $VoiceAlterationsTl->intensity_alteration = $request->intensity_alteration; 
        $VoiceAlterationsTl->observations = $request->observations; 
        $VoiceAlterationsTl->type_record_id = $request->type_record_id;
        $VoiceAlterationsTl->ch_record_id = $request->ch_record_id;
        $VoiceAlterationsTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Alteraciones en la Voz actualizado exitosamente',
            'data' => ['voice_alterations_tl' => $VoiceAlterationsTl]
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
            $VoiceAlterationsTl = VoiceAlterationsTl::find($id);
            $VoiceAlterationsTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Alteraciones en la Voz  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Alteraciones en la Voz  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
