<?php

namespace App\Http\Controllers\Management;

use App\Models\Diagnosis;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Diagnosis = Diagnosis::select();

        if ($request->_sort) {
            $Diagnosis->orderBy($request->_sort, $request->_order);
        }

        if ($request->id) {
            $Diagnosis->where('id', $request->id);
            $Diagnosis = $Diagnosis->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['diagnosis' => $Diagnosis]
        ]);
        }

        if ($request->search) {
            if ($request->search == '') {
                return response()->json([
                    'status' => true,
                    'message' => 'Diagnósticos obtenidos exitosamente, aaaa',
                    'data' => ['diagnosis' => []]
                ]);
            } else {
                $Diagnosis->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('code', 'like', '%' . $request->search . '%');
                });
            }
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Diagnósticos obtenidos exitosamente, bbb',
                'data' => ['diagnosis' => []]
            ]);
        }

        $Diagnosis = $Diagnosis->get()->toArray();
        // if($request->query("pagination", true)=="false"){
        //     $Diagnosis=$Diagnosis->get()->toArray();    
        // }
        // else{
        //     $page= $request->query("current_page", 1);
        //     $per_page=$request->query("per_page", 10);

        //     $Diagnosis=$Diagnosis->paginate($per_page,'*','page',$page); 
        // } 


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['diagnosis' => $Diagnosis]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Diagnosis = new Diagnosis;
        $Diagnosis->code = $request->code;
        $Diagnosis->name = $request->name;


        $Diagnosis->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico asociado al paciente exitosamente',
            'data' => ['diagnosis' => $Diagnosis->toArray()]
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
        $Diagnosis = Diagnosis::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['diagnosis' => $Diagnosis]
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
        $Diagnosis = Diagnosis::find($id);
        $Diagnosis->code = $request->code;
        $Diagnosis->name = $request->name;



        $Diagnosis->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['diagnosis' => $Diagnosis]
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
            $Diagnosis = Diagnosis::find($id);
            $Diagnosis->delete();

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
