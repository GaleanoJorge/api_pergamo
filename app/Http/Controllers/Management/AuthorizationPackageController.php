<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthorizationPackage;
use App\Models\CampusBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationPackageRequest;
use App\Models\Authorization;
use App\Models\Base\AuthLog;
use App\Models\Base\Briefcase;
use App\Models\Briefcase as ModelsBriefcase;
use App\Models\ServicesBriefcase;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class AuthorizationPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $AuthorizationPackage = AuthorizationPackage::with('procedure');

        if ($request->_sort) {
            $AuthorizationPackage->orderBy($request->_sort, $request->_order);
        }

        if ($request->authorization_package_id) {
            $AuthorizationPackage->where('authorization_package_id', $request->authorization_package_id);
        }

        if ($request->search) {
            $AuthorizationPackage->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $AuthorizationPackage = $AuthorizationPackage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AuthorizationPackage = $AuthorizationPackage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenidos exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackage]
        ]);
    }


    /**
     * Get procedure by manual.
     *
     * @param  int  $packageId
     * @return JsonResponse
     */
    public function getByPackage(Request $request, int $packageId): JsonResponse
    {
        $AuthorizationPackage = AuthorizationPackage::where('authorization_package_id', $packageId)->with('procedure');
        if ($request->search) {
            $AuthorizationPackage->where('name', 'like', '%' . $request->search . '%')
                ->Orwhere('id', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $AuthorizationPackage = $AuthorizationPackage->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $AuthorizationPackage = $AuthorizationPackage->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackage]
        ]);
    }

    public function store(AuthorizationPackageRequest $request): JsonResponse
    {
        $Authorization =  new Authorization;
        $Authorization->services_briefcase_id = $request->services_briefcase_id;
        $Authorization->admissions_id = $request->admissions_id;
        $validate = Briefcase::select('briefcase.*')->where('id',  $request->briefcase_id)->first();
        if ($validate->type_auth == 1) {
            $Authorization->auth_status_id =  2;
        } else {
            $Authorization->auth_status_id =  1;
        }
        $serviceBriefcase = ServicesBriefcase::select('services_briefcase.*')->where('id',  $request->services_briefcase_id)->first();
        $Authorization->manual_price_id = $serviceBriefcase->manual_price_id;
        
        $Authorization->save();
        
        $auth_log = new AuthLog;

        $auth_log->current_status_id = $Authorization->auth_status_id;
        $auth_log->authorization_id = $Authorization->id;
        $auth_log->user_id = Auth::user()->id;

        $auth_log->save();
        
        $AuthorizationPackage = new AuthorizationPackage;
        $AuthorizationPackage->authorization_id = $Authorization->id;
        $AuthorizationPackage->user_id = Auth::user()->id;

        $AuthorizationPackage->save();

        $Authorization_array= json_decode($request->auth_array);
        $count = 0;
        foreach($Authorization_array as $item){
            $auth_up = Authorization::find($item->auth);
            if($auth_up){
                $auth_up->auth_package_id = $Authorization->id;
                $auth_up->save();
            } else {
                $count++;
            }
        }


if($count > 0){
    return response()->json([
        'status' => true,
        'message' => 'Paquete de authorizaciones creado. Se presentaron' . $count . ' errores',
        'data' => ['authorization_package' => $AuthorizationPackage]
    ]);
}else{
    return response()->json([
        'status' => true,
        'message' => 'Paquete de procedimientos creada exitosamente',
        'data' => ['authorization_package' => $AuthorizationPackage]
    ]);
}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $AuthorizationPackage = AuthorizationPackage::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos obtenido exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackage]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AuthorizationPackageRequest $request, int $id): JsonResponse
    {
        $AuthorizationPackageDelete = AuthorizationPackage::where('authorization_package_id', $id);
        $AuthorizationPackageDelete->delete();
        $components = json_decode($request->procedure_id);

        foreach ($components as $conponent) {
            $AuthorizationPackage = new AuthorizationPackage;
            $AuthorizationPackage->authorization_package_id = $id;
            // $AuthorizationPackage->value = $conponent->value;
            // $AuthorizationPackage->manual_price_id = $conponent->manual_price_id;
            $AuthorizationPackage->dynamic_charge = $conponent->dynamic_charge;
            $AuthorizationPackage->max_quantity = $conponent->max_quantity;
            $AuthorizationPackage->min_quantity = $conponent->min_quantity;
            $AuthorizationPackage->procedure_id = $conponent->procedure_id;
            $AuthorizationPackage->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de procedimientos actualizado exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackage]
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
            $AuthorizationPackage = AuthorizationPackage::find($id);
            $AuthorizationPackage->delete();

            return response()->json([
                'status' => true,
                'message' => 'Paquete de procedimientos eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Paquete de procedimientos esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
