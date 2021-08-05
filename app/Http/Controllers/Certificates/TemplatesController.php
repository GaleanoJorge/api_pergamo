<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Certificate;
use App\Models\Signatures;
use App\Models\TemplateHasSignature;
use Illuminate\Http\Request;
use App\Http\Requests;
use Iluminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Validator;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $templates = Template::with('papers_format')->with('template_has_signature.signatures')->get();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);        
            $templates = Template::paginate($per_page, '*', 'page', $page);
        }
        return response()->json(['templates' => $templates], 200);
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
            'name' => 'required|string|max:45',
            'color' => 'string|max:45',
            'background' => 'image',
            'thumbnail' => 'required|image',
            'papers_formats_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $path = '';
        $path_thumbnail = '';
        if ($request->hasFile('background')) {
            $path = \Storage::url($request->file('background')->store('public/certificates_templates'));
        }
        if ($request->hasFile('thumbnail')) {
            $path_thumbnail = \Storage::url($request->file('thumbnail')->store('public/certificates_templates'));
        }
        $arr = [
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'background' => $path,
            'thumbnail' => $path_thumbnail,
            'papers_formats_id' => $request->input('papers_formats_id')
        ];
        $template = Template::create($arr);
        return response()->json([
            'template' => $template,
            'notification' => 'Registro creado exitosamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = Template::with('papers_format')->with('template_has_signature.signatures')->find($id);
        if (!$template) {
            return response()->json([
                'error' => 'templante_does_not_exist',
                'notification' => 'No existe el elemento'
            ], 404);
        }
        return response()->json(['template' => $template], 200);
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
        $template = Template::with('template_has_signature')->findorFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:45',
            'color' => 'string|max:45',
            'background' => 'sometimes|image',
            'thumbnail' => 'sometimes|image',
            'papers_formats_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $path = '';
        $path_thumbnail = '';
        if ($request->has('signatures')) {
            $signatures_edited = json_decode($request->input('signatures')); 
            if (is_array($signatures_edited)) {
                $ids = array();
                foreach ($signatures_edited as $key => $item) {
                    if ($item->id == NULL) {
                        $arr = [
                            'position' => $item->position,
                            'templates_id' => $item->templates_id,
                            'signatures_id' => $item->signatures_id,
                            'position_x' => $item->position_x,
                            'position_y' => $item->position_y,
                            'height' => $item->height,
                            'width' => $item->width,
                        ];
                        $obj = TemplateHasSignature::create($arr);
                        array_push($ids, $obj->id);
                    } else {
                        $ths = TemplateHasSignature::find($item->id);
                        if ($ths != null) {
                            $arr = [
                                'id' => $item->id,
                                'position' => $item->position,
                                'templates_id' => $item->templates_id,
                                'signatures_id' => $item->signatures_id,
                                'position_x' => $item->position_x,
                                'position_y' => $item->position_y,
                                'height' => $item->height,
                                'width' => $item->width,
                            ];
                            $ths->fill($arr);
                            $ths->update();
                            array_push($ids, $item->id);
                        }
                    }
                }
                $to_delete = TemplateHasSignature::where('templates_id', '=', $template->id)->whereNotIn('id', $ids)->get();
                if (count($to_delete) > 0) {
                    foreach ($to_delete as $key => $item) {
                        $dlt = TemplateHasSignature::find($item->id);
                        $dlt->delete();
                    }
                }
            }
        }

        $template->fill($request->except(['background', 'thumbnail']));
        if ($request->hasFile('background')) {
            $new_path = str_replace("/storage/","/public/",$template->background);
            Storage::delete($new_path);
            $path = \Storage::url($request->file('background')->store('public/certificates_templates'));
            $template->background = $path;
        }
        if ($request->hasFile('thumbnail')) {
            $new_path_thumbnail = str_replace("/storage/","/public/",$template->thumbnail);
            Storage::delete($new_path_thumbnail);
            $path_thumbnail = \Storage::url($request->file('thumbnail')->store('public/certificates_templates'));
            $template->thumbnail = $path_thumbnail;
        }
        $template->update();
        return response()->json([
            'template' => $template,
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
        $template = Template::findOrFail($id);
        $certificates = Certificate::where('templates_id', $template->id)->get();
        if (count($certificates) > 0) {
            return response()->json([
                'status' => False,
                'template_delete' => False,
                'message' => 'Existen certificados relacionados con esta plantilla, no se puede eliminar',
                'notification' => 'Existen certificados relacionados con esta plantilla, no se puede eliminar',
            ], 400); 
        }
        $signatures = TemplateHasSignature::where('templates_id', $template->id)->get();
        if (count($signatures) > 0) {
            foreach ($signatures as $key => $item) {
                $to_delete = TemplateHasSignature::find($item->id); 
                $to_delete->delete();
            }
        }
        $template->delete();
        if ($template->background != '') {
            $new_path = str_replace("/storage/","/public/",$template->background);
            Storage::delete($new_path);
        }
        $new_path_thumbnail = str_replace("/storage/","/public/",$template->thumbnail);
        Storage::delete($new_path_thumbnail);
        return response()->json([
            'template_delete' => True,
            'notification' => 'Registro eliminado exitosamente',
        ], 200);
    }
}
