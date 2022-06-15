<?php

namespace App\Http\Controllers\Management;

use App\Models\LanguageTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LanguageTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $LanguageTl = LanguageTl::select();

        if ($request->_sort) {
            $LanguageTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $LanguageTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $LanguageTl = $LanguageTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $LanguageTl = $LanguageTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Lenguaje obtenidos exitosamente',
            'data' => ['language_tl' => $LanguageTl]
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
        
       
        $LanguageTl = LanguageTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Lenguaje asociado al paciente exitosamente',
            'data' => ['language_tl' => $LanguageTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $LanguageTl = new LanguageTl;
        $LanguageTl->phonetic_phonological = $request->phonetic_phonological;
        $LanguageTl->syntactic = $request->syntactic;
        $LanguageTl->morphosyntactic = $request->morphosyntactic;
        $LanguageTl->semantic = $request->semantic;
        $LanguageTl->pragmatic = $request->pragmatic;
        $LanguageTl->reception = $request->reception;
        $LanguageTl->coding = $request->coding;
        $LanguageTl->decoding = $request->decoding;
        $LanguageTl->production = $request->production;
        $LanguageTl->observations = $request->observations;
        $LanguageTl->type_record_id = $request->type_record_id;
        $LanguageTl->ch_record_id = $request->ch_record_id;
        $LanguageTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Lenguaje asociado al paciente exitosamente',
            'data' => ['language_tl' => $LanguageTl->toArray()]
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
        $LanguageTl = LanguageTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Lenguaje obtenido exitosamente',
            'data' => ['language_tl' => $LanguageTl]
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
        $LanguageTl = LanguageTl::find($id);
        $LanguageTl->phonetic_phonological = $request->phonetic_phonological;
        $LanguageTl->syntactic = $request->syntactic;
        $LanguageTl->morphosyntactic = $request->morphosyntactic;
        $LanguageTl->semantic = $request->semantic;
        $LanguageTl->pragmatic = $request->pragmatic;
        $LanguageTl->reception = $request->reception;
        $LanguageTl->coding = $request->coding;
        $LanguageTl->decoding = $request->decoding;
        $LanguageTl->production = $request->production;
        $LanguageTl->observations = $request->observations;
        $LanguageTl->type_record_id = $request->type_record_id;
        $LanguageTl->ch_record_id = $request->ch_record_id;
        $LanguageTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Lenguaje actualizado exitosamente',
            'data' => ['language_tl' => $LanguageTl]
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
            $LanguageTl = LanguageTl::find($id);
            $LanguageTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Lenguaje eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Lenguaje en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
