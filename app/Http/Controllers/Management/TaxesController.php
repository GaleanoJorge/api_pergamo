<?php

namespace App\Http\Controllers\Management;

use App\Models\Taxes;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaxesRequest;
use Illuminate\Database\QueryException;

class TaxesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $Taxes = Taxes::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $Taxes  = Taxes::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Taxes = Taxes::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $Taxes = Taxes::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la empresa obtenidas exitosamente',
            'data' => ['taxes' => $Taxes]
        ]);
    }
    

    public function store(TaxesRequest $request): JsonResponse
    {
        $Taxes = new Taxes;
        $Taxes->code = $request->code;
        $Taxes->name = $request->name;
        $Taxes->save();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la empresa creada exitosamente',
            'data' => ['taxes' => $Taxes->toArray()]
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
        $Taxes = Taxes::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la empresa obtenido exitosamente',
            'data' => ['company_taxes' => $Taxes]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(TaxesRequest $request, int $id): JsonResponse
    {
        $Taxes = Taxes::find($id);
        $Taxes->code = $request->code;
        $Taxes->name = $request->name;
        $Taxes->save();

        return response()->json([
            'status' => true,
            'message' => 'Impuestos de la empresa actualizado exitosamente',
            'data' => ['taxes' => $Taxes]
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
            $Taxes = Taxes::find($id);
            $Taxes->delete();

            return response()->json([
                'status' => true,
                'message' => 'Impuestos de la empresa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Impuestos de la empresa esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
