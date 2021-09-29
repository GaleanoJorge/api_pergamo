<?php

namespace App\Http\Controllers\Management;

use App\Models\CompanyMail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyMailRequest;
use Illuminate\Database\QueryException;

class CompanyMailController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $CompanyMail = CompanyMail::select();

        if($request->_sort){
            $CompanyMail->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $CompanyMail->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $CompanyMail=$CompanyMail->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $CompanyMail=$CompanyMail->paginate($per_page,'*','page',$page); 
        } 
        return response()->json([
            'status' => true,
            'message' => 'Correo Electronico de la empresa obtenido exitosamente',
            'data' => ['company_mail' => $CompanyMail->toArray()]
        ]);
    }    
    

        public function store(CompanyMailRequest $request): JsonResponse
    {
        $CompanyMail =new CompanyMail;
        $CompanyMail->company_id= $request->company_id;
        $CompanyMail->mail = $request->mail;
        $CompanyMail->city_id = $request->city_id;
        $CompanyMail->document_id = $request->document_id;
        $CompanyMail->save();

        return response()->json([
            'status' => true,
            'message' => 'Correo Electronico de la empresa creada exitosamente',
            'data' => ['company_mail' => $CompanyMail->toArray()]
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
        $CompanyMail = CompanyMail::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Correo Electronico de la empresa obtenido exitosamente',
            'data' => ['company_mail' => $CompanyMail]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyMailRequest $request, int $id): JsonResponse
    {
        $CompanyMail = CompanyMail::find($id);
        $CompanyMail->company_id = $request->company_id;
        $CompanyMail->mail = $request->mail;
        $CompanyMail->city_id= $request->city_id;
        $CompanyMail->document_id = $request->document_id;
        $CompanyMail->save();

        return response()->json([
            'status' => true,
            'message' => 'Correo Electronico de la empresa actualizado exitosamente',
            'data' => ['company_mail' => $CompanyMail]
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
            $CompanyMail = CompanyMail::find($id);
            $CompanyMail->delete();

            return response()->json([
                'status' => true,
                'message' => 'Correo Electronico de la empresa eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Correo Electronico de la empresa esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
