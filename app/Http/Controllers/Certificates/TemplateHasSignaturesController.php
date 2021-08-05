<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\TemplateHasSignature;
use Illuminate\Http\Request;
use App\Http\Requests;
use Iluminate\Http\JsonResponse;
use Validator;

class TemplateHasSignaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ths = TemplateHasSignature::all();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);   
            $ths = TemplateHasSignature::paginate($per_page, '*', 'page', $page);
        }
        return response()->json(['templates_has_signatures' => $ths], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'position_x' => 'required',
            'position_y' => 'required',
            'templates_id' => 'required',
            'signatures_id' => 'required',
            'height' => 'numeric',
            'width' => 'numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $arr = $request->all();
        $ths = TemplateHasSignature::create($arr);
        return response()->json([
            'templates_has_signatures' => $ths,
            'notification' => 'Registro creado exitosamente',
        ], 200);
    }

    // Falta acomodar de aqui para abajo porque no tiene id !!!!!!!!!!!!!!

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ths = TemplateHasSignature::with('signatures')->find($id);
        if (!$ths) {
            return response()->json(['error' => 'templates_has_signatures_does_not_exist'], 404);
        }
        return response()->json(['templates_has_signatures' => $ths], 200);
    }

    /**
     * Display signatures data by templates_id.
     *
     * @param  int  $templates_id
     * @return \Illuminate\Http\Response
     */
    public function get_signatures($templates_id = '')
    {
        $signatures = TemplateHasSignature::with('signatures')->where('templates_id', $templates_id)->get();
        return response()->json(['template_has_signatures' => $signatures], 200);
    }

    /**
     * Display templates data by signatures_id.
     *
     * @param  int  $signatures_id
     * @return \Illuminate\Http\Response
     */
    public function get_templates($signatures_id = '')
    {
        $templates = TemplateHasSignature::with('templates')->where('signatures_id', $signatures_id)->get();
        return response()->json(['signature_has_templates' => $templates], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ths = TemplateHasSignature::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'position_x' => 'required',
            'position_y' => 'required',
            'templates_id' => 'required',
            'signatures_id' => 'required',
            'height' => 'numeric',
            'width' => 'numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $ths->fill($request->all());
        $ths->update();
        return response()->json([
            'templates_has_signatures' => $ths,
            'notification' => 'Registro actualizado exitosamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ths = TemplateHasSignature::findorFail($id);
        $ths->delete();
        return response()->json([
            'templates_has_signatures' => True,
            'notification' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
