<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyCiiu;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyCiiuRequest;
use Illuminate\Database\QueryException;

class CompanyCiiuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $CompanyCiiu = CompanyCiiu::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $CompanyCiiu  = CompanyCiiu::where('cii_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $CompanyCiiu = CompanyCiiu::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $CompanyCiiu = CompanyCiiu::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Asociación de las actividades economicas con las emrpresas  obtenidas exitosamente',
            'data' => ['company_ciiu' => $CompanyCiiu]
        ]);
    }
    

    public function store(CompanyCiiuRequest $request): JsonResponse
    {
        $CompanyCiiu = new CompanyCiiu;
        $CompanyCiiu->cii_company = $request->cii_company;
        $CompanyCiiu->cii_class = $request->cii_class;
        $CompanyCiiu->cii_clasification = $request->cii_clasification;
        $CompanyCiiu->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de las actividades economicas con las emrpresas  creada exitosamente',
            'data' => ['company_ciiu' => $CompanyCiiu->toArray()]
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
        $CompanyCiiu = CompanyCiiu::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de las actividades economicas con las emrpresas  obtenido exitosamente',
            'data' => ['company_ciiu' => $CompanyCiiu]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyCiiuRequest $request, int $id): JsonResponse
    {
        $CompanyCiiu = CompanyCiiu::find($id);
        $CompanyCiiu->cii_company = $request->cii_company;
        $CompanyCiiu->cii_class = $request->cii_class;
        $CompanyCiiu->cii_clasification = $request->cii_clasification;
        $CompanyCiiu->save();

        return response()->json([
            'status' => true,
            'message' => 'Asociación de las actividades economicas con las emrpresas  actualizado exitosamente',
            'data' => ['company_ciiu' => $CompanyCiiu]
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
            $CompanyCiiu = CompanyCiiu::find($id);
            $CompanyCiiu->delete();

            return response()->json([
                'status' => true,
                'message' => 'Asociación de las actividades economicas con las emrpresas  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Asociación de las actividades economicas con las emrpresas  esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
