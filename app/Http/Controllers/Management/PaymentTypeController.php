<?php

namespace App\Http\Controllers\Management;

use App\Models\PaymentType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PaymentTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        if ($request->_sort) {
            $PaymentType = PaymentType::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $PaymentType = PaymentType::where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $PaymentType = PaymentType::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $PaymentType = PaymentType::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipos de pago obtenidos exitosamente',
            'data' => ['payment_type' => $PaymentType]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $PaymentType = new PaymentType;
        $PaymentType->name = $request->name;
      
      
        $PaymentType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de pago creado exitosamente',
            'data' => ['payment_type' => $PaymentType->toArray()]
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
        $PaymentType = PaymentType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipos de pago obtenidos exitosamente',
            'data' => ['payment_type' => $PaymentType ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $PaymentType = PaymentType::find($id);
        $PaymentType->name = $request->name;
       
    
        $PaymentType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de pago actualizado exitosamente',
            'data' => ['payment_type' => $PaymentType]
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
            $PaymentType = PaymentType::find($id);
            $PaymentType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de pago eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de pago esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
