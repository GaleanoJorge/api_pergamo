<?php

namespace App\Http\Controllers\Management;

use App\Models\Ethnicity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EthnicityRequest;
use Illuminate\Database\QueryException;

class EthnicityController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $Ethnicity = Ethnicity::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $Ethnicity = Ethnicity::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Ethnicity = Ethnicity::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Ethnicity = Ethnicity::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Etnia obtenidas exitosamente',
            'data' => ['ethnicity' => $Ethnicity]
        ]);
    }
    

    public function store(EthnicityRequest $request): JsonResponse
    {
        $Ethnicity = new Ethnicity;
        $Ethnicity->name = $request->name;
        $Ethnicity->code = $request->code;
      
        $Ethnicity->save();

        return response()->json([
            'status' => true,
            'message' => 'Etnia creado exitosamente',
            'data' => ['ethnicity' => $Ethnicity->toArray()]
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
        
       
        $Ethnicity = Ethnicity::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Etnia obtenidas exitosamente',
            'data' => ['ethnicity' => $Ethnicity]
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
        $Ethnicity = Ethnicity::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Etnia obtenido exitosamente',
            'data' => ['ethnicity' => $Ethnicity ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EthnicityRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(EthnicityRequest $request, int $id): JsonResponse
    {
        $Ethnicity = Ethnicity::find($id);
        $Ethnicity->name = $request->name;
        $Ethnicity->code = $request->code;
       
    
        $Ethnicity->save();

        return response()->json([
            'status' => true,
            'message' => 'Etnia actualizado exitosamente',
            'data' => ['ethnicity' => $Ethnicity]
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
            $Ethnicity = Ethnicity::find($id);
            $Ethnicity->delete();

            return response()->json([
                'status' => true,
                'message' => 'Etnia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Etnia esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
