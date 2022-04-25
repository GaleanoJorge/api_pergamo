<?php

namespace App\Http\Controllers\Management;

use App\Models\BankInformation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BankInformationRequest;
use Illuminate\Database\QueryException;

class BankInformationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
    
        $BankInformation = BankInformation::with('bank_id','account_type');

        if($request->_sort){
            $BankInformation->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $BankInformation->where('name','like','%' . $request->search. '%');
        }

        
        if ($request->bank_infomation_id) {
            $BankInformation->where('bank_id', $request->bank_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $BankInformation=$BankInformation->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $BankInformation=$BankInformation->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'Información Bancaria asociada exitosamente',
            'data' => ['bank_information' => $BankInformation]
        ]);
    }
    

    public function store(BankInformationRequest $request): JsonResponse
    {
        $BankInformation = new BankInformation;
        $BankInformation->bank = $request->bank;
        $BankInformation->account_type = $request->account_type;
        $BankInformation->account_number = $request->account_number;
     
        $BankInformation->save();

        return response()->json([
            'status' => true,
            'message' => 'Información Bancaria creada exitosamente',
            'data' => ['bank_information' => $BankInformation->toArray()]
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
        $BankInformation = BankInformation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Información Bancaria obtenido exitosamente',
            'data' => ['bank_information' => $BankInformation]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BankInformationRequest $request, int $id): JsonResponse
    {
        $BankInformation = BankInformation::find($id);
        $BankInformation->bank = $request->bank;
        $BankInformation->account_type = $request->account_type;
        $BankInformation->account_number = $request->account_number;
        $BankInformation->save();

        return response()->json([
            'status' => true,
            'message' => 'Información Bancaria actualizado exitosamente',
            'data' => ['bank_information' => $BankInformation]
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
            $BankInformation = BankInformation::find($id);
            $BankInformation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Información Bancaria eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Información Bancaria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
