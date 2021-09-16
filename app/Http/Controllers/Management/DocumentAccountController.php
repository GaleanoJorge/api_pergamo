<?php

namespace App\Http\Controllers\Management;

use App\Models\DocumentAccount;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentAccountRequest;
use Illuminate\Database\QueryException;

class DocumentAccountController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $DocumentAccount = DocumentAccount::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $DocumentAccount  = DocumentAccount::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $DocumentAccount = DocumentAccount::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $DocumentAccount = DocumentAccount::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Documentos contables asociados exitosamente',
            'data' => ['document_account' => $DocumentAccount]
        ]);
    }
    

    public function store(DocumentAccountRequest $request): JsonResponse
    {
        $DocumentAccount = new DocumentAccount;
        $DocumentAccount->name = $request->name;
        $DocumentAccount->status_id = $request->status_id;
       
        $DocumentAccount->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos contables creados exitosamente',
            'data' => ['document_account' => $DocumentAccount->toArray()]
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
        $DocumentAccount = DocumentAccount::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Documentos contables obtenido exitosamente',
            'data' => ['document_account' => $DocumentAccount]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(DocumentAccountRequest $request, int $id): JsonResponse
    {
        $DocumentAccount = DocumentAccount::find($id);
        $DocumentAccount->name = $request->name;
        $DocumentAccount->status_id = $request->status_id;
        $DocumentAccount->save();

        return response()->json([
            'status' => true,
            'message' => 'Documentos contables actualizado exitosamente',
            'data' => ['document_account' => $DocumentAccount]
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
            $DocumentAccount = DocumentAccount::find($id);
            $DocumentAccount->delete();

            return response()->json([
                'status' => true,
                'message' => 'Documentos contables eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Documentos contables esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
