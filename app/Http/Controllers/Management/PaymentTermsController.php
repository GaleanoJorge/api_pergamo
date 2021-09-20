<?php

namespace App\Http\Controllers\Management;

use App\Models\PaymentTerms;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentTermsRequest;
use Illuminate\Database\QueryException;

class PaymentTermsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $PaymentTerms = $PaymentTerms = PaymentTerms::orderBy($request->_sort, $request->_order);
            PaymentTerms::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $PaymentTerms  = PaymentTerms::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $PaymentTerms = PaymentTerms::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $PaymentTerms = PaymentTerms::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Numero de días para el termino de pago, asociados exitosamente',
            'data' => ['payment_terms' => $PaymentTerms]
        ]);
    }
    

    public function store(PaymentTermsRequest $request): JsonResponse
    {
        $PaymentTerms = new PaymentTerms;
        $PaymentTerms->name = $request->name; 
        $PaymentTerms->term = $request->term; 
        $PaymentTerms->save();

        return response()->json([
            'status' => true,
            'message' => 'Numero de días para el termino de pago, creada exitosamente',
            'data' => ['payment_terms' => $PaymentTerms->toArray()]
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
        $PaymentTerms = PaymentTerms::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Numero de días para el termino de pago, obtenido exitosamente',
            'data' => ['payment_terms' => $PaymentTerms]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(PaymentTermsRequest $request, int $id): JsonResponse
    {
        $PaymentTerms = PaymentTerms::find($id);
        $PaymentTerms->name = $request->name;  
        $PaymentTerms->term = $request->term; 
        $PaymentTerms->save();

        return response()->json([
            'status' => true,
            'message' => 'Numero de días para el termino de pago, actualizado exitosamente',
            'data' => ['payment_terms' => $PaymentTerms]
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
            $PaymentTerms = PaymentTerms::find($id);
            $PaymentTerms->delete();

            return response()->json([
                'status' => true,
                'message' => 'Numero de días para el termino de pago, eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Numero de días para el termino de pago, esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
