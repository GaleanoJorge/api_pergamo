<?php

namespace App\Http\Controllers\Management;

use App\Models\Bank;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BankRequest;
use Illuminate\Database\QueryException;

class BankController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Bank = Bank::select();

        if($request->_sort){
            $Bank->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Bank->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Bank=$Bank->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Bank=$Bank->paginate($per_page,'*','page',$page); 
        }     

        return response()->json([
            'status' => true,
            'message' => 'Nombre de banco obtenido exitosamente',
            'data' => ['bank' => $Bank]
        ]);
    }
    

    public function store(BankRequest $request): JsonResponse
    {
        $Bank = new Bank;
        $Bank->code = $request->code;  
        $Bank->name = $request->name;     
        $Bank->save();

        return response()->json([
            'status' => true,
            'message' => 'Nombre de banco creado exitosamente',
            'data' => ['bank' => $Bank->toArray()]
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
        $Bank = Bank::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nombre de banco obtenido exitosamente',
            'data' => ['bank' => $Bank]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BankRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(BankRequest $request, int $id): JsonResponse
    {
        $Bank = Bank ::find($id);
        $Bank->name = $request->name;      
        $Bank->save();

        return response()->json([
            'status' => true,
            'message' => 'Nombre de banco actualizado exitosamente',
            'data' => ['bank' => $Bank]
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
            $Bank = Bank::find($id);
            $Bank->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nombre de banco eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nombre de banco esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
