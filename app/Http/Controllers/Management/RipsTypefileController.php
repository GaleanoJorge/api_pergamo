<?php

namespace App\Http\Controllers\Management;

use App\Models\RipsTypefile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RipsTypefileRequest;
use Illuminate\Database\QueryException;

class RipsTypefileController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $RipsTypefile = RipsTypefile::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $RipsTypefile = RipsTypefile::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $RipsTypefile = RipsTypefile::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $RipsTypefile = RipsTypefile::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Contiene las abreviaturas de los archivos para los rips obtenidas exitosamente',
            'data' => ['rips_typefile' => $RipsTypefile]
        ]);
    }
    

    public function store(RipsTypefileRequest $request): JsonResponse
    {
        $RipsTypefile = new RipsTypefile;
        $RipsTypefile->code = $request->code;
        $RipsTypefile->name = $request->name;
       
      
      
        $RipsTypefile->save();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las abreviaturas de los archivos para los rips creado exitosamente',
            'data' => ['rips_typefile' => $RipsTypefile->toArray()]
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
        $RipsTypefile = RipsTypefile::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las abreviaturas de los archivos para los rips obtenido exitosamente',
            'data' => ['rips_typefile' => $RipsTypefile]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RipsTypefileRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(RipsTypefileRequest $request, int $id): JsonResponse
    {
        $RipsTypefile = RipsTypefile::find($id);
        $RipsTypefile->code = $request->code;
        $RipsTypefile->name = $request->name;
       
    
        $RipsTypefile->save();

        return response()->json([
            'status' => true,
            'message' => 'Contiene las abreviaturas de los archivos para los rips actualizado exitosamente',
            'data' => ['rips_typefile' => $RipsTypefile]
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
            $RipsTypefile = RipsTypefile::find($id);
            $RipsTypefile->delete();

            return response()->json([
                'status' => true,
                'message' => 'Contiene las abreviaturas de los archivos para los rips eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Contiene las abreviaturas de los archivos para los rips esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
