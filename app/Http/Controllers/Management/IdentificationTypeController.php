<?php

namespace App\Http\Controllers\Management;

use App\Models\IdentificationType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IdentificationTypeRequest;
use Illuminate\Database\QueryException;

class IdentificationTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $IdentificationType = IdentificationType::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $IdentificationType  = IdentificationType::where('cot_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $IdentificationType = IdentificationType::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $IdentificationType = IdentificationType::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipos de identificaciones obtenidas exitosamente',
            'data' => ['identification_type' => $IdentificationType]
        ]);
    }
    

    public function store(IdentificationTypeRequest $request): JsonResponse
    {
        $IdentificationType = new IdentificationType;
        $IdentificationType->code = $request->code;
        $IdentificationType->name = $request->name; 
        $IdentificationType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de identificaciones creada exitosamente',
            'data' => ['identification_type' => $IdentificationType->toArray()]
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
        $IdentificationType = IdentificationType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de identificaciones  obtenido exitosamente',
            'data' => ['identification_type' => $IdentificationType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(IdentificationTypeRequest $request, int $id): JsonResponse
    {
        $IdentificationType = IdentificationType::find($id);
        $IdentificationType->code = $request->code;
        $IdentificationType->name = $request->name;
        
        $IdentificationType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de identificaciones actualizado exitosamente',
            'data' => ['identification_type' => $IdentificationType]
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
            $IdentificationType = IdentificationType::find($id);
            $IdentificationType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipos de identificaciones eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipos de identificaciones esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
