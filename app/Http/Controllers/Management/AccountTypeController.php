<?php

namespace App\Http\Controllers\Management;

use App\Models\AccountType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountTypeRequest;
use Illuminate\Database\QueryException;

class AccountTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AccountType = AccountType::select();

        if($request->_sort){
            $AccountType->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $AccountType->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $AccountType=$AccountType->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $AccountType=$AccountType->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Tipo de cuenta bancaria obtenida exitosamente',
            'data' => ['account_type' => $AccountType]
        ]);
    }
    

    public function store(AccountTypeRequest $request): JsonResponse
    {
        $AccountType = new AccountType;
        $AccountType->name = $request->name;     
        $AccountType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de cuenta bancaria creado exitosamente',
            'data' => ['account_type' => $AccountType->toArray()]
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
        $AccountType = AccountType::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de cuenta bancaria obtenido exitosamente',
            'data' => ['account_type' => $AccountType]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountTypeRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AccountTypeRequest $request, int $id): JsonResponse
    {
        $AccountType = AccountType ::find($id);
        $AccountType->name = $request->name;      
        $AccountType->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de cuenta bancaria actualizado exitosamente',
            'data' => ['account_type' => $AccountType]
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
            $AccountType = AccountType::find($id);
            $AccountType->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de cuenta bancaria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo de cuenta bancaria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
