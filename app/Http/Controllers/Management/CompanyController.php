<?php

namespace App\Http\Controllers\Management;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Database\QueryException;

class CompanyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Company = Company::select();

        if($request->_sort){
            $Company->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Company->where('name','like','%' . $request->search. '%');
        }
        
        if($request->query("pagination", true)=="false"){
            $Company=$Company->get()->toArray();    
        }
        else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Company=$Company->paginate($per_page,'*','page',$page); 
        } 


        return response()->json([
            'status' => true,
            'message' => 'compañías dentro de las que se indetifican las prestadoras de salud obtenidas exitosamente',
            'data' => ['company' => $Company]
        ]);
    }
    

    public function store(CompanyRequest $request): JsonResponse
    {
        $Company = new Company;
        $Company->identype_id= $request->identype_id;
        $Company->code = $request->code;
        $Company->name= $request->name;
        $Company->category_id= $request->category_id;
        $Company->type = $request->type;
        $Company->administrator = $request->administrator;
        $Company->country_id = $request->country_id;
        $Company->city_id = $request->city_id;
        $Company->address = $request->address;
        $Company->phone = $request->phone;
        $Company->web = $request->web;
        $Company->mail = $request->mail;
        $Company->representative = $request->representative;
        $Company->repre_phone = $request->repre_phone;
        $Company->repre_mail = $request->repre_mail;
        $Company->repreentification = $request->repreentification;
        $Company->iva = $request->iva;
        $Company->retainer = $request->retainer;
        $Company->kindperson_id = $request->kindperson_id;
        $Company->registration = $request->registration;
        $Company->opportunity = $request->opportunity;
        $Company->discount = $request->discount;
        $Company->term = $request->term;
        $Company->save();

        return response()->json([
            'status' => true,
            'message' => 'compañías dentro de las que se indetifican las prestadoras de salud creada exitosamente',
            'data' => ['company' => $Company->toArray()]
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
        $Company = Company::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'compañías dentro de las que se indetifican las prestadoras de salud obtenido exitosamente',
            'data' => ['company' => $Company]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CompanyRequest $request, int $id): JsonResponse
    {
        $Company = Company::find($id);
        $Company->identype_id = $request->identype_id;
        $Company->code = $request->code;
        $Company->name= $request->name;
        $Company->category_id= $request->category_id ;
        $Company->type = $request->type;
        $Company->administrator = $request->administrator;
        $Company->country_id = $request->country_id;
        $Company->city_id = $request->city_id;
        $Company->address = $request->address;
        $Company->phone = $request->phone;
        $Company->web = $request->web;
        $Company->mail = $request->mail;
        $Company->representative = $request->representative;
        $Company->repre_phone = $request->repre_phone;
        $Company->repre_mail = $request->repre_mail;
        $Company->repreentification = $request->repreentification;
        $Company->iva = $request->iva;
        $Company->retainer = $request->retainer;
        $Company->kindperson_id = $request->kindperson_id;
        $Company->registration = $request->registration;
        $Company->opportunity = $request->opportunity;
        $Company->discount = $request->discount;
        $Company->term = $request->term;

        return response()->json([
            'status' => true,
            'message' => 'compañías dentro de las que se indetifican las prestadoras de salud actualizado exitosamente',
            'data' => ['company' => $Company]
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
            $Company = Company::find($id);
            $Company->delete();

            return response()->json([
                'status' => true,
                'message' => 'compañías dentro de las que se indetifican las prestadoras de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'compañías dentro de las que se indetifican las prestadoras de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
