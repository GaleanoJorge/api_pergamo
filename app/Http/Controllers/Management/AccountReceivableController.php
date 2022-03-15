<?php

namespace App\Http\Controllers\Management;

use App\Models\AccountReceivable;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountReceivableRequest;
use Illuminate\Database\QueryException;

class AccountReceivableController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse

    {
        $AccountReceivable = AccountReceivable::select();

        if($request->_sort){
            $AccountReceivable->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AccountReceivable->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AccountReceivable=$AccountReceivable->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AccountReceivable=$AccountReceivable->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro asociada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }
    

    public function store(AccountReceivableRequest $request): JsonResponse
    {
        $AccountReceivable = new AccountReceivable;
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->gloss_ambit = $request->gloss_ambit;
        $AccountReceivable->status_bill = $request->status_bill; 
        $AccountReceivable->observation = $request->observation; 
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro creada exitosamente',
            'data' => ['account_receivable' => $AccountReceivable->toArray()]
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
        $AccountReceivable = AccountReceivable::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro obtenido exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AccountReceivableRequest $request, int $id): JsonResponse
    {
        $AccountReceivable = AccountReceivable::find($id);
        $AccountReceivable->file_payment = $request->file_payment;
        $AccountReceivable->user_id = $request->user_id;
        $AccountReceivable->gloss_ambit = $request->gloss_ambit;
        $AccountReceivable->status_bill = $request->status_bill; 
        $AccountReceivable->observation = $request->observation;
        $AccountReceivable->save();

        return response()->json([
            'status' => true,
            'message' => 'Cuenta de cobro actualizado exitosamente',
            'data' => ['account_receivable' => $AccountReceivable]
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
            $AccountReceivable = AccountReceivable::find($id);
            $AccountReceivable->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuenta de cobro eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuenta de cobro esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
