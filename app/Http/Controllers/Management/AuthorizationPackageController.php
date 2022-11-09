<?php

namespace App\Http\Controllers\Management;

use App\Models\AuthorizationPackage;
use App\Models\CampusBriefcase;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorizationPackageRequest;
use App\Models\AuthLog as ModelsAuthLog;
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
            'message' => 'Paquete de autorizaciones obtenidos exitosamente',
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
            'message' => 'Paquete de autorizaciones obtenido exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackage]
        ]);
    }

    public function store(AuthorizationPackageRequest $request): JsonResponse
    {
        $Authorization =  new Authorization;
        $Authorization->services_briefcase_id = $request->services_briefcase_id;
        $Authorization->quantity = $request->quantity;
        $Authorization->admissions_id = $request->admissions_id;
        $serviceBriefcase = ServicesBriefcase::select('services_briefcase.*')->where('id',  $request->services_briefcase_id)->first();
        $Authorization->manual_price_id = $serviceBriefcase->manual_price_id;
        $validate = Briefcase::select('briefcase.*')->where('id',  $serviceBriefcase->briefcase_id)->first();
        if ($validate->type_auth == 1) {
            $Authorization->auth_status_id =  2;
        } else {
            $Authorization->auth_status_id =  1;
        }
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

        $Authorization_array = json_decode($request->auth_array);
        $count = 0;
        foreach ($Authorization_array as $item) {
            $auth_up = Authorization::find($item);
            if ($auth_up) {
                $auth_up->auth_package_id = $Authorization->id;
                $auth_up->save();
            } else {
                $count++;
            }
        }


        if ($count > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Paquete de authorizaciones creado. Se presentaron' . $count . ' errores',
                'data' => ['authorization_package' => $AuthorizationPackage]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Paquete de autorizaciones creada exitosamente',
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
            'message' => 'Paquete de autorizaciones obtenido exitosamente',
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
        $AuthorizationPackageDelete = AuthorizationPackage::find($id);

        $Authorization_buffer = Authorization::where('auth_package_id', $id)->get()->toArray();

        $array_auth = json_decode($request->auth_array);

        foreach ($Authorization_buffer as $item) {
            $auth_update = Authorization::find($item['id']);
            $auth_update->auth_package_id = null;
            $auth_update->save();
        }

        foreach ($array_auth as $item) {
            // $item->auth_package_id = null;
            $Auth_add_package = Authorization::find($item);
            $Auth_add_package->auth_package_id = $id;
            $Auth_add_package->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Paquete de autorizaciones actualizado exitosamente',
            'data' => ['authorization_package' => $AuthorizationPackageDelete]
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
            
            
            $Authorization_buffer = Authorization::where('auth_package_id', $id)->get()->toArray();
            
            foreach ($Authorization_buffer as $item) {
                $auth_update = Authorization::find($item['id']);
                $auth_update->auth_package_id = null;
                $auth_update->save();
            }

            $AuthorizationPackage = AuthorizationPackage::where('authorization_id', $id)->get()->toArray();
            if(count($AuthorizationPackage) ==1){
                $AuthorizationPackageDelete = AuthorizationPackage::find($AuthorizationPackage[0]['id']);
                $AuthorizationPackageDelete->delete();
            }
            
            $AuthorizationLog = AuthLog::where('authorization_id', $id)->get()->toArray();
            if(count($AuthorizationLog) ==1){
                $AuthorizationLog = AuthLog::find($AuthorizationLog[0]['id']);
                $AuthorizationLog->delete();
            }

            $Authorization = Authorization::find($id);
            $Authorization->delete();

            return response()->json([
                'status' => true,
                'message' => 'Paquete de autorizaciones eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Paquete de autorizaciones esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
