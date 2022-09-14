<?php

namespace App\Http\Controllers\Management;

use App\Models\InterventionTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InterventionTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $InterventionTl = InterventionTl::select();

        if ($request->_sort) {
            $InterventionTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $InterventionTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $InterventionTl = $InterventionTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $InterventionTl = $InterventionTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Intervención obtenidos exitosamente',
            'data' => ['intervention_tl' => $InterventionTl]
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
        
       
        $InterventionTl = InterventionTl::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('intervention_tl.type_record_id', 1)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Intervención asociado al paciente exitosamente',
            'data' => ['intervention_tl' => $InterventionTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $InterventionTl = new InterventionTl;
        $InterventionTl->text = $request->text;
        $InterventionTl->type_record_id = $request->type_record_id;
        $InterventionTl->ch_record_id = $request->ch_record_id;
        $InterventionTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Intervención asociado al paciente exitosamente',
            'data' => ['intervention_tl' => $InterventionTl->toArray()]
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
        $InterventionTl = InterventionTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Intervención obtenido exitosamente',
            'data' => ['intervention_tl' => $InterventionTl]
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
        $InterventionTl = InterventionTl::find($id);
        $InterventionTl->text = $request->text;
        $InterventionTl->type_record_id = $request->type_record_id;
        $InterventionTl->ch_record_id = $request->ch_record_id;
        $InterventionTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Intervención actualizado exitosamente',
            'data' => ['intervention_tl' => $InterventionTl]
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
            $InterventionTl = InterventionTl::find($id);
            $InterventionTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Intervención eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Intervención en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
