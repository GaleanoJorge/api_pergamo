<?php

namespace App\Http\Controllers\Management;

use App\Models\CommunicationTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class CommunicationTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CommunicationTl = CommunicationTl::select();

        if ($request->_sort) {
            $CommunicationTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $CommunicationTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $CommunicationTl = $CommunicationTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $CommunicationTl = $CommunicationTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Comunicación obtenidos exitosamente',
            'data' => ['communication_tl' => $CommunicationTl]
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


        $CommunicationTl = CommunicationTl::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $CommunicationTl = CommunicationTl::select('communication_tl.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('communication_tl.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'communication_tl.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['communication_tl' => $CommunicationTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $CommunicationTl = new CommunicationTl;
        $CommunicationTl->eye_contact = $request->eye_contact;
        $CommunicationTl->courtesy_rules = $request->courtesy_rules;
        $CommunicationTl->communicative_intention = $request->communicative_intention;
        $CommunicationTl->communicative_purpose = $request->communicative_purpose;
        $CommunicationTl->oral_verb_modality = $request->oral_verb_modality;
        $CommunicationTl->written_verb_modality = $request->written_verb_modality;
        $CommunicationTl->nonsymbolic_nonverbal_modality = $request->nonsymbolic_nonverbal_modality;
        $CommunicationTl->symbolic_nonverbal_modality = $request->symbolic_nonverbal_modality;
        $CommunicationTl->observations = $request->observations;
        $CommunicationTl->type_record_id = $request->type_record_id;
        $CommunicationTl->ch_record_id = $request->ch_record_id;
        $CommunicationTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación asociado al paciente exitosamente',
            'data' => ['communication_tl' => $CommunicationTl->toArray()]
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
        $CommunicationTl = CommunicationTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación obtenido exitosamente',
            'data' => ['communication_tl' => $CommunicationTl]
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
        $CommunicationTl = CommunicationTl::find($id);
        $CommunicationTl->eye_contact = $request->eye_contact;
        $CommunicationTl->courtesy_rules = $request->courtesy_rules;
        $CommunicationTl->communicative_intention = $request->communicative_intention;
        $CommunicationTl->semantic = $request->semantic;
        $CommunicationTl->oral_verb_modality = $request->oral_verb_modality;
        $CommunicationTl->written_verb_modality = $request->written_verb_modality;
        $CommunicationTl->nonsymbolic_nonverbal_modality = $request->nonsymbolic_nonverbal_modality;
        $CommunicationTl->symbolic_nonverbal_modality = $request->symbolic_nonverbal_modality;
        $CommunicationTl->observations = $request->observations;
        $CommunicationTl->type_record_id = $request->type_record_id;
        $CommunicationTl->ch_record_id = $request->ch_record_id;
        $CommunicationTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Comunicación actualizado exitosamente',
            'data' => ['communication_tl' => $CommunicationTl]
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
            $CommunicationTl = CommunicationTl::find($id);
            $CommunicationTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Comunicación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Comunicación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
