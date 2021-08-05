<?php

namespace App\Http\Controllers\Management;

use App\Models\Module;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ModuleRequest;
use Illuminate\Database\QueryException;


class ModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $modules = Module::with('category', 'entity_type', 'specialtym');

        if ($request->_sort) {
            $modules->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $modules->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $modules->where('category_id', $request->category_id);
        }
        if ($request->entity_type_id) {
            $modules->where('entity_type_id', $request->entity_type_id);
        }
        if ($request->specialtym_id) {
            $modules->where('specialtym_id', $request->specialtym_id);
        }

        if ($request->query("pagination", true) == "false") {
            $modules = $modules->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $modules = $modules->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Modulos obtenidos exitosamente',
            'data' => ['modules' => $modules]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ModuleRequest $request
     * @return JsonResponse
     */
    public function store(ModuleRequest $request): JsonResponse
    {
        $module = new Module;
        $module->category_id = $request->category_id;
        $module->entity_type_id = $request->entity_type_id;
        $module->specialtym_id = $request->specialtym_id;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->save();

        return response()->json([
            'status' => true,
            'message' => 'Módulo creado exitosamente',
            'data' => ['module' => $module->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $module = Module::where('id', $id)
            ->with('category', 'entity_type', 'specialtym')
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modulo obtenido exitosamente',
            'data' => ['module' => $module]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ModuleRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ModuleRequest $request, int $id)
    {
        $module = module::find($id);
        $module->category_id = $request->category_id;
        $module->entity_type_id = $request->entity_type_id;
        $module->specialtym_id = $request->specialtym_id;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->save();

        return response()->json([
            'status' => true,
            'message' => 'Módulo actualizado exitosamente',
            'data' => ['module' => $module]
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $module = Module::find($id);
            $module->delete();

            return response()->json([
                'status' => true,
                'message' => 'Módulo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El módulo esta en uso actualmete, no es posible eliminar'
            ], 423);
        }
    }
    /**
     * Get the modules by course id
     *
     * @param integer $courseId
     * @return JsonResponse
     */
    public function getByCourse(int $courseId): JsonResponse
    {
        $modules = Module::join('course_module', 'course_module.module_id', 'module.id')
            ->where('course_module.course_id', $courseId);

        // if($request->_sort){
        //     $modules->orderBy($request->_sort, $request->_order);
        // }            

        // if ($request->search) {
        //     $modules->where('name','like','%' . $request->search. '%');
        // }

        // if ($request->category_id) {
        //     $modules->where('category_id', $request->category_id);
        // }
        // if ($request->entity_type_id) {
        //     $modules->where('entity_type_id', $request->entity_type_id);
        // }
        // if ($request->specialtym_id) {
        //     $modules->where('specialtym_id', $request->specialtym_id);
        // }

        // if($request->query("pagination", true)=="false"){
        //     $modules=$modules->get()->toArray();    
        // }else{
        //     $page= $request->query("current_page", 1);
        //     $per_page=$request->query("per_page", 10);

        //     $modules=$modules->paginate($per_page,'*','page',$page); 
        // }

        return response()->json([
            'status' => true,
            'message' => 'Modulos por curso obtenidos exitosamente.',
            'data' => ['modules' => $modules->get()->toArray()]
        ]);
    }

    /**
     * Get Module by category.
     *
     * @param  int  $categoryId
     * @return JsonResponse
     */
    public function getByCategory(Request $request, int $categoryId): JsonResponse
    {
        $modules = Module::with('category', 'entity_type', 'specialtym')->where('category_id', $categoryId);
        if ($request->search) {
            $modules->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) === "false") {
            $modules = $modules->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $modules = $modules->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Modulos obtenidos exitosamente',
            'data' => ['modules' => $modules]
        ]);
    }
}
