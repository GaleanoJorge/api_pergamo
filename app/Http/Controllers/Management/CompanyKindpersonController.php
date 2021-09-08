<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyKindperson;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyKindpersonRequest;
use Illuminate\Database\QueryException;

class CompanyKindpersonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $CompanyKindperson = CompanyKindperson::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $CompanyKindperson  = CompanyKindperson::where('cok_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyKindperson = CompanyKindperson::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $CompanyKindperson = CompanyKindperson::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipos de personas contablemente obtenidas exitosamente',
            'data' => ['company_kindperson' => $CompanyKindperson]
        ]);
    }
    

    public function store(CompanyKindpersonRequest $request): JsonResponse
    {
        $CompanyKindperson = new CompanyKindperson;
        $CompanyKindperson->cok_name = $request->cok_name;
        
        $CompanyKindperson->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de persona contablemente creada exitosamente',
            'data' => ['company_kindperson' => $CompanyKindperson->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $cok_id): JsonResponse
    {
        $CompanyKindperson = CompanyKindperson::where('cok_id', $cok_id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de persona contablemente obtenido exitosamente',
            'data' => ['company_kindperson' => $CompanyKindperson]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyKindpersonRequest $request, int $id): JsonResponse
    {
        $CompanyKindperson = CompanyKindperson::find($id);
        $CompanyKindperson->cok_name = $request->cok_name;
        
        $CompanyKindperson->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de persona contablemente  actualizado exitosamente',
            'data' => ['company_kindperson' => $CompanyKindperson]
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
            $CompanyKindperson = CompanyKindperson::find($id);
            $CompanyKindperson->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de persona contablemente eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de persona contablemente esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
