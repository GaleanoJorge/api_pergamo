<?php

namespace App\Http\Controllers\Management;

use App\Models\CiiuDivision;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CiiuDivisionRequest;
use Illuminate\Database\QueryException;

class CiiuDivisionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $CiiuDivision = $CiiuDivision = CiiuDivision::orderBy($request->_sort, $request->_order);
            CiiuDivision::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $CiiuDivision  = CiiuDivision::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CiiuDivision = CiiuDivision::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $CiiuDivision = CiiuDivision::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Division de la clasificación industrial internacional uniforme de la empresa asociados exitosamente',
            'data' => ['ciiu_division' => $CiiuDivision]
        ]);
    }
    

    public function store(CiiuDivisionRequest $request): JsonResponse
    {
        $CiiuDivision = new CiiuDivision;
        $CiiuDivision->code = $request->code;
        $CiiuDivision->name = $request->name;  
        $CiiuDivision->save();

        return response()->json([
            'status' => true,
            'message' => 'Division de la clasificación industrial internacional uniforme de la empresa creada exitosamente',
            'data' => ['ciiu_division' => $CiiuDivision->toArray()]
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
        $CiiuDivision = CiiuDivision::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Division de la clasificación industrial internacional uniforme de la empresaobtenido exitosamente',
            'data' => ['ciiu_division' => $CiiuDivision]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CiiuDivisionRequest $request, int $id): JsonResponse
    {
        $CiiuDivision = CiiuDivision::find($id);
        $CiiuDivision->code = $request->code;
        $CiiuDivision->name = $request->name;  
        $CiiuDivision->save();

        return response()->json([
            'status' => true,
            'message' => 'Division de la clasificación industrial internacional uniforme de la empresaactualizado exitosamente',
            'data' => ['ciiu_division' => $CiiuDivision]
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
            $CiiuDivision = Document::find($id);
            $CiiuDivision->delete();

            return response()->json([
                'status' => true,
                'message' => 'Division de la clasificación industrial internacional uniforme de la empresa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Division de la clasificación industrial internacional uniforme de la empresa esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
