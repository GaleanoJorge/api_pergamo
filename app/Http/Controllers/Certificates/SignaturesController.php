<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\Signatures;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Base\Template;
use App\Models\TemplateHasSignature;
use Iluminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Validator;

class SignaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $signatures = Signatures::all();
        if ($request->has('current_page') || $request->has('per_page')) {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);   
            $signatures = Signatures::paginate($per_page, '*', 'page', $page);
        }
        return response()->json(['signatures' => $signatures], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('elements')) { // If field present in request
            // Convert it to JSON so it can be validated as such
            $request['elements'] = json_encode($request['elements'], True);
        }
        $validator = Validator::make(
        $request->all(),
            [
                'image' => 'required|image',
                'name' => 'required|string|max:45',
                'code' => 'required|string|max:13',
                'elements' => 'required|json'
            ]
        );
        if ($validator->fails()) {
            return response()
            ->json(['error' => $validator->errors()], 422);
        }
        if ($request->input('elements')) { // If field present in request
            // Restore it so it can be saved properly
            $request['elements'] = json_decode($request['elements'], True);
        }        
        $path = \Storage::url($request->file('image')->store('public/certificates_signatures'));
        $signature = new Signatures;
        $signature->url = $path;
        $signature->name = $request->input('name');
        $signature->elements = $request->input('elements');
        $signature->code = $request->input('code');
        $signature->save();
        return response()->json(['signature' => $signature], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $signature = Signatures::find($id);
        if (!$signature) {
            return response()->json(['error' => 'signatures_does_not_exist'], 404);
        }
        return response()->json(['signature' => $signature], 200);
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
        $signature = Signatures::findOrFail($id);
        if ($request->input('elements')) { // If field present in request
            // Convert it to JSON so it can be validated as such
            $request['elements'] = json_encode($request['elements'], True);
        }
        $validator = Validator::make(
        $request->all(),
            [
                'image' => 'sometimes|required|image',
                'name' => 'required|string|max:45',
                'code' => 'required|string|max:13',
                'elements' => 'required|json'
            ]
        );
        if ($validator->fails()) {
            return response()
            ->json(['error' => $validator->errors()], 422);
        }
        if ($request->input('elements')) { // If field present in request
            // Restore it so it can be saved properly
            $request['elements'] = json_decode($request['elements'], True);
        }   
        $signature->fill($request->except(['image']));
        if ($request->hasFile('image')) {
            $new_path = str_replace("/storage/","/public/",$signature->url);
            Storage::delete($new_path);
            $path = \Storage::url($request->file('image')->store('public/certificates_signatures'));
            $signature->url = $path;
        }
        $signature->update();
        return response()->json(['signature_updated' => $signature], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signature = Signatures::find($id);
        $templates = TemplateHasSignature::where('signatures_id', '=', $signature->id)->get();
        if (count($templates) > 0) {
            return response()->json([
                'signature_delete' => False,
                'status' => False,
                'message' => 'Existen plantillas relacionadas con esta firma, no se puede eliminar',
            ], 423); 
        }
        $signature->delete();
        $new_path = str_replace("/storage/","/public/",$signature->url);
        Storage::delete($new_path);
        return response()->json(['signature_delete' => True], 200);
    }
}
