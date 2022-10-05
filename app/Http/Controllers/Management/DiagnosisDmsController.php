<?php

namespace App\Http\Controllers\Management;

use App\Models\DiagnosisDms;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class DiagnosisDmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DiagnosisDms = DiagnosisDms::select();

        if ($request->_sort) {
            $DiagnosisDms->orderBy($request->_sort, $request->_order);
        }

        if ($request->id) {
            $DiagnosisDms->where('id', $request->id);
        }

        if ($request->search) {
            if ($request->search == '') {
                return response()->json([
                    'status' => true,
                    'message' => 'Diagnósticos DMS obtenidos exitosamente, aaaa',
                    'data' => ['diagnosis_dms' => []]
                ]);
            } else {
                $DiagnosisDms->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('code', 'like', '%' . $request->search . '%');
                });
            }
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Diagnósticos DMS obtenidos exitosamente, bbb',
                'data' => ['diagnosis_dms' => []]
            ]);
        }

        $DiagnosisDms = $DiagnosisDms->get()->toArray();
        // if($request->query("pagination", true)=="false"){
        //     $DiagnosisDms=$DiagnosisDms->get()->toArray();    
        // }
        // else{
        //     $page= $request->query("current_page", 1);
        //     $per_page=$request->query("per_page", 10);

        //     $DiagnosisDms=$DiagnosisDms->paginate($per_page,'*','page',$page); 
        // } 


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos DMS obtenidos exitosamente',
            'data' => ['diagnosis_dms' => $DiagnosisDms]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $DiagnosisDms = new DiagnosisDms;
        $DiagnosisDms->code = $request->code;
        $DiagnosisDms->name = $request->name;
        $DiagnosisDms->value = $request->value;


        $DiagnosisDms->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico asociado al paciente exitosamente',
            'data' => ['diagnosis_dms' => $DiagnosisDms->toArray()]
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
        $DiagnosisDms = DiagnosisDms::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['diagnosis_dms' => $DiagnosisDms]
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
        $DiagnosisDms = DiagnosisDms::find($id);
        $DiagnosisDms->code = $request->code;
        $DiagnosisDms->name = $request->name;
        $DiagnosisDms->value = $request->value;



        $DiagnosisDms->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['diagnosis_dms' => $DiagnosisDms]
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
            $DiagnosisDms = DiagnosisDms::find($id);
            $DiagnosisDms->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diagnóstico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Diagnóstico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
