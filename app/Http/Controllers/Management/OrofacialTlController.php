<?php

namespace App\Http\Controllers\Management;

use App\Models\OrofacialTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class OrofacialTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $OrofacialTl = OrofacialTl::select();

        if ($request->_sort) {
            $OrofacialTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $OrofacialTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $OrofacialTl = $OrofacialTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $OrofacialTl = $OrofacialTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Orofacial obtenidos exitosamente',
            'data' => ['orofacial_tl' => $OrofacialTl]
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
        
       
        $OrofacialTl = OrofacialTl::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Orofacial asociado al paciente exitosamente',
            'data' => ['orofacial_tl' => $OrofacialTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $OrofacialTl = new OrofacialTl;
        $OrofacialTl->right_hermiface_symmetry = $request->right_hermiface_symmetry;
        $OrofacialTl->right_hermiface_tone = $request->right_hermiface_tone;
        $OrofacialTl->right_hermiface_sensitivity = $request->right_hermiface_sensitivity;
        $OrofacialTl->left_hermiface_symmetry = $request->left_hermiface_symmetry;
        $OrofacialTl->left_hermiface_tone = $request->left_hermiface_tone;
        $OrofacialTl->left_hermiface_sensitivity = $request->left_hermiface_sensitivity;
        $OrofacialTl->type_record_id = $request->type_record_id;
        $OrofacialTl->ch_record_id = $request->ch_record_id;
        $OrofacialTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Orofacial asociado al paciente exitosamente',
            'data' => ['orofacial_tl' => $OrofacialTl->toArray()]
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
        $OrofacialTl = OrofacialTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Orofacial obtenido exitosamente',
            'data' => ['orofacial_tl' => $OrofacialTl]
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
        $OrofacialTl = OrofacialTl::find($id);
        $OrofacialTl->right_hermiface_symmetry = $request->right_hermiface_symmetry;
        $OrofacialTl->right_hermiface_tone = $request->right_hermiface_tone;
        $OrofacialTl->right_hermiface_sensitivity = $request->right_hermiface_sensitivity;
        $OrofacialTl->left_hermiface_symmetry = $request->left_hermiface_symmetry;
        $OrofacialTl->left_hermiface_tone = $request->left_hermiface_tone;
        $OrofacialTl->left_hermiface_sensitivity = $request->left_hermiface_sensitivity;
        $OrofacialTl->type_record_id = $request->type_record_id;
        $OrofacialTl->ch_record_id = $request->ch_record_id;
        $OrofacialTl->save();
       

        return response()->json([
            'status' => true,
            'message' => 'Orofacial actualizado exitosamente',
            'data' => ['orofacial_tl' => $OrofacialTl]
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
            $OrofacialTl = OrofacialTl::find($id);
            $OrofacialTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Orofacial eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Orofacial en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
