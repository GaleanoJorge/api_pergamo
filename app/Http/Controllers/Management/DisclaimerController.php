<?php

namespace App\Http\Controllers\Management;

use App\Models\Disclaimer;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DisclaimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Disclaimer = Disclaimer::select('disclaimer.*');


        if ($request->record_id) {
            $Disclaimer->where('ch_record_id', $request->record_id);
        }

        if ($request->_sort) {
            $Disclaimer->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Disclaimer->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Disclaimer = $Disclaimer->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Disclaimer = $Disclaimer->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Nota aclaratoria obtenidos exitosamente',
            'data' => ['disclaimer' => $Disclaimer]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id = null): JsonResponse
    {


        $Disclaimer = Disclaimer::where('ch_record_id', $id)
      ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Nota aclaratoria obtenido exitosamente',
            'data' => ['disclaimer' => $Disclaimer]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Disclaimer = new Disclaimer;
        $Disclaimer->observation = $request->observation;
        $Disclaimer->ch_record_id = $request->ch_record_id;
        $Disclaimer->save();      

           
       

        return response()->json([
            'status' => true,
            'message' => 'Nota aclaratoria asociado al paciente exitosamente',
            'data' => ['disclaimer' => $Disclaimer->toArray()]
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
        $Disclaimer = Disclaimer::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nota aclaratoria obtenido exitosamente',
            'data' => ['disclaimer' => $Disclaimer]
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
        $Disclaimer = Disclaimer::find($id);
        $Disclaimer = new Disclaimer;
        $Disclaimer->observation = $request->observation;
        $Disclaimer->ch_record_id = $request->ch_record_id;
        $Disclaimer->save();           
   
       

        return response()->json([
            'status' => true,
            'message' => 'Nota aclaratoria actualizado exitosamente',
            'data' => ['disclaimer' => $Disclaimer]
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
            $Disclaimer = Disclaimer::find($id);
            $Disclaimer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nota aclaratoria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nota aclaratoria en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
