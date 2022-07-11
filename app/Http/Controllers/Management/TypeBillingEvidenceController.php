<?php

namespace App\Http\Controllers\Management;

use App\Models\TypeBillingEvidence;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TypeBillingEvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $TypeBillingEvidence = TypeBillingEvidence::select();

        if ($request->_sort) {
            $TypeBillingEvidence->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $TypeBillingEvidence->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->id) {
            $TypeBillingEvidence->where('id', $request->id);
        }

        if ($request->query("pagination", true) == "false") {
            $TypeBillingEvidence = $TypeBillingEvidence->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $TypeBillingEvidence = $TypeBillingEvidence->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenidos exitosamente',
            'data' => ['type_billing_evidence' => $TypeBillingEvidence]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $TypeBillingEvidence = new TypeBillingEvidence;
        $TypeBillingEvidence->name = $request->name;
        $TypeBillingEvidence->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte asociado al paciente exitosamente',
            'data' => ['type_billing_evidence' => $TypeBillingEvidence->toArray()]
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
        $TypeBillingEvidence = TypeBillingEvidence::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte obtenido exitosamente',
            'data' => ['type_billing_evidence' => $TypeBillingEvidence]
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
        $TypeBillingEvidence = TypeBillingEvidence::find($id);
        $TypeBillingEvidence->name = $request->name;
        $TypeBillingEvidence->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de soporte actualizado exitosamente',
            'data' => ['type_billing_evidence' => $TypeBillingEvidence]
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
            $TypeBillingEvidence = TypeBillingEvidence::find($id);
            $TypeBillingEvidence->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de soporte eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de soporte en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
