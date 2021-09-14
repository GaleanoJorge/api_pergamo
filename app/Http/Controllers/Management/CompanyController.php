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

        if ($request->_sort) {
            $Company = Company::orderBy($request->_sort, $request->_order);
        }
        if ($request->search) {
            $Company  = Company::where('cma_name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $Company = Company::get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);
            $Company = Company::paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud obtenidas exitosamente',
            'data' => ['company' => $Company]
        ]);
    }
    

    public function store(CompanyRequest $request): JsonResponse
    {
        $Company = new Company;
        $Company->com_identype = $request->com_identype;
        $Company->com_code = $request->com_code;
        $Company->com_name= $request->com_name;
        $Company->com_category= $request->com_category;
        $Company->com_type = $request->com_type;
        $Company->com_administrator = $request->com_administrator;
        $Company->com_country = $request->com_country;
        $Company->com_city = $request->com_city;
        $Company->com_address = $request->com_address;
        $Company->com_phone = $request->com_phone;
        $Company->com_web = $request->com_web;
        $Company->com_mail = $request->com_mail;
        $Company->com_representative = $request->com_representative;
        $Company->com_repre_phone = $request->com_repre_phone;
        $Company->com_repre_mail = $request->com_repre_mail;
        $Company->com_repre_identification = $request->com_repre_identification;
        $Company->com_iva = $request->com_iva;
        $Company->com_retainer = $request->com_retainer;
        $Company->com_kindperson = $request->com_kindperson;
        $Company->com_registration = $request->com_registration;
        $Company->com_opportunity = $request->com_opportunity;
        $Company->com_discount = $request->com_discount;
        $Company->com_term = $request->com_term;
        $Company->save();

        return response()->json([
            'status' => true,
            'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud creada exitosamente',
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
            'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud obtenido exitosamente',
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
        $Company->com_identype = $request->com_identype;
        $Company->com_code = $request->com_code;
        $Company->com_name= $request->com_name;
        $Company->com_category= $request->com_category;
        $Company->com_type = $request->com_type;
        $Company->com_administrator = $request->com_administrator;
        $Company->com_country = $request->com_country;
        $Company->com_city = $request->com_city;
        $Company->com_address = $request->com_address;
        $Company->com_phone = $request->com_phone;
        $Company->com_web = $request->com_web;
        $Company->com_mail = $request->com_mail;
        $Company->com_representative = $request->com_representative;
        $Company->com_repre_phone = $request->com_repre_phone;
        $Company->com_repre_mail = $request->com_repre_mail;
        $Company->com_repre_identification = $request->com_repre_identification;
        $Company->com_iva = $request->com_iva;
        $Company->com_retainer = $request->com_retainer;
        $Company->com_kindperson = $request->com_kindperson;
        $Company->com_registration = $request->com_registration;
        $Company->com_opportunity = $request->com_opportunity;
        $Company->com_discount = $request->com_discount;
        $Company->com_term = $request->com_term;

        return response()->json([
            'status' => true,
            'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud actualizado exitosamente',
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
                'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Empresas dentro de las que se indetifican las prestadoras de salud esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
