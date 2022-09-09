<?php

namespace App\Http\Controllers\Management;

use App\Models\SpeechTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class SpeechTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $SpeechTl = SpeechTl::select();

        if ($request->_sort) {
            $SpeechTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $SpeechTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $SpeechTl = $SpeechTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $SpeechTl = $SpeechTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Hablaobtenidos exitosamente',
            'data' => ['speech_tl' => $SpeechTl]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $SpeechTl = SpeechTl::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $SpeechTl = SpeechTl::select('speech_tl.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'speech_tl.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['speech_tl' => $SpeechTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $SpeechTl = new SpeechTl;
        $SpeechTl->breathing = $request->breathing;
        $SpeechTl->joint = $request->joint;
        $SpeechTl->resonance = $request->resonance;
        $SpeechTl->fluency = $request->fluency;
        $SpeechTl->prosody = $request->prosody;
        $SpeechTl->observations = $request->observations;
        $SpeechTl->type_record_id = $request->type_record_id;
        $SpeechTl->ch_record_id = $request->ch_record_id;
        $SpeechTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Habla asociado al paciente exitosamente',
            'data' => ['speech_tl' => $SpeechTl->toArray()]
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
        $SpeechTl = SpeechTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Habla obtenido exitosamente',
            'data' => ['speech_tl' => $SpeechTl]
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
        $SpeechTl = SpeechTl::find($id);
        $SpeechTl->breathing = $request->breathing;
        $SpeechTl->joint = $request->joint;
        $SpeechTl->resonance = $request->resonance;
        $SpeechTl->fluency = $request->fluency;
        $SpeechTl->prosody = $request->prosody;
        $SpeechTl->observations = $request->observations;
        $SpeechTl->type_record_id = $request->type_record_id;
        $SpeechTl->ch_record_id = $request->ch_record_id;
        $SpeechTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Habla actualizado exitosamente',
            'data' => ['speech_tl' => $SpeechTl]
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
            $SpeechTl = SpeechTl::find($id);
            $SpeechTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Habla eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Habla en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
