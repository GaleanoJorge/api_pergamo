<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\PapersFormat;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Base\Template;
use Illuminate\Http\JsonResponse;
use Validator;


class PapersFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paper = PapersFormat::all();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);   
            $paper = PapersFormat::paginate($per_page, '*', 'page', $page);
        }
        return response()->json(['papers_formats' => $paper], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'landscape' => 'required|boolean',
                'height' => 'required|numeric',
                'width' => 'required|numeric',
                'name' => 'required|string|max:45',
                'margin_top' => 'required|numeric',
                'margin_bottom' => 'required|numeric',
                'margin_left' => 'required|numeric',
                'margin_rigth' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return response()
                ->json(['error' => $validator->errors()], 422);
        }
        $papersFormat = new PapersFormat;
        $papersFormat->created_at = date('Y-m-d H:i:s');
        $papersFormat->height = $request->input('height');
        $papersFormat->width = $request->input('width');
        $papersFormat->name = $request->input('name');
        $papersFormat->margin_top = $request->input('margin_top');
        $papersFormat->margin_bottom = $request->input('margin_bottom');
        $papersFormat->margin_left = $request->input('margin_left');
        $papersFormat->margin_rigth = $request->input('margin_rigth');
        $papersFormat->save();
        return response()->json(['PapersFormat' => $papersFormat], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $papersFormat = PapersFormat::find($id);
        if (!$papersFormat) {
            return response()->json(['error' => 'papers_format_does_not_exist'], 404);
        }
        return response()->json(['papersFormat' => $papersFormat], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'landscape' => 'required|boolean',
                'height' => 'required|numeric',
                'width' => 'required|numeric',
                'name' => 'required|string|max:45',
                'margin_top' => 'required|numeric',
                'margin_bottom' => 'required|numeric',
                'margin_left' => 'required|numeric',
                'margin_rigth' => 'required|numeric',
            ]
        );
        if ($validator->fails()) {
            return response()
                ->json(['error' => $validator->errors()], 422);
        }
        $papersFormat = PapersFormat::findOrFail($id);
        $papersFormat->fill($request->all());
        $papersFormat->save();
        return response()->json(['papersFormat' => $papersFormat], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\id  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $papersFormat = PapersFormat::find($id);
        $templates = Template::where('papers_formats_id', $papersFormat->id)->get();
        if (count($templates) > 0) {
            return response()->json([
                'delete_success' => False,
                'status' => False,
                'message' => 'Existen plantillas relacionadas con este formato, no se puede eliminar',
            ], 423); 
        }
        $papersFormat->delete();
        return response()->json(['delete_success' => True], 200);
    }
}
