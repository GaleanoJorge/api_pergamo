<?php

namespace App\Http\Controllers\Management;

use App\Models\CategoriesOrigin;
use App\Models\Category;
use App\Models\Origin;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CategoryOriginRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoriesOriginController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $categories = CategoriesOrigin::select('categories_origin.*')
            ->with('category')
            ->join('category', 'category.id', 'categories_origin.category_id');

        if ($request->validity_id) {
            $categories->where('origin.validity_id', $request->validity_id);
        }
        if ($request->origin_id) {
            $categories->where('categories_origin.origin_id', $request->origin_id);
        }
        if ($request->parent_id) {
            $categories->where('category.category_parent_id', $request->parent_id);
        }else{
            $categories->whereNull('category.category_parent_id');
        }

        if ($request->search) {
            $categories->where('category.name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) == "false") {
            $categories = $categories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categories = $categories->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'programas obtenidos exitosamente',
            'data' => ['categories' => $categories]
        ]);
    }

    public function indexArray(Request $request): JsonResponse
    {
        if($request->origin_id){
            $ready = CategoriesOrigin::where('categories_origin.origin_id', $request->origin_id);

            $categories = Category::select('categoriesOrigin.id',
            \DB::raw("COALESCE(categoriesOrigin.origin_id,{$request->origin_id}) AS origin_id"),
            \DB::raw("COALESCE(categoriesOrigin.category_id,category.id) AS category_id"),
            'categoriesOrigin.planned_budget','categoriesOrigin.allocated_budget',
            'categoriesOrigin.executed_budget','category.name')
            ->leftJoinSub($ready,'categoriesOrigin',function($join){
                $join->on('category.id', '=', 'categoriesOrigin.category_id');
            })->where('category.category_parent_id',$request->category_id)
            ->groupBy('category.id');

            if ($request->query("pagination", true) == "false") {
                $categories = $categories->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);

                $categories = $categories->paginate($per_page, '*', 'page', $page);
            }

            return response()->json([
                'status' => true,
                'message' => 'Subprogramas obtenidos exitosamente',
                'data' => ['categories' => $categories]
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Selecciona el plan de formación para cargar los programas, subprogramas'
            ],400);
        }
    }

    public function updateArray(Request $request): JsonResponse
    {
        $data = (array)$request->data;

        foreach ($data as $row) {
            if(($row['id']*1)>0){
                $categoryOrigin = CategoriesOrigin::find($row['id']);
            }else{
                $categoryOrigin = new CategoriesOrigin;
            }
            $categoryOrigin->origin_id = $row['origin_id'];
            $categoryOrigin->category_id = $row['category_id'];
            $categoryOrigin->allocated_budget = $row['allocated_budget'];
            $categoryOrigin->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Presupuesto actualizado exitosamente'
        ]);
    }

    public function getAuxiliaryData(Request $request): JsonResponse
    {
        $origins = Origin::getWithValidity();
        $categories = Category::whereNull('category.category_parent_id')->get();

        return response()->json([
            'status' => true,
            'message' => 'Auxiliares obtenidas exitosamente',
            'data' => [
                'origins' => $origins->toArray(),
                'categories' => $categories->toArray()
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryOriginRequest $request
     * @return JsonResponse
     */
    public function store(CategoryOriginRequest $request): JsonResponse
    {
        $exists = CategoriesOrigin::where('category_id',$request->category_id)->where('origin_id',$request->origin_id)->first();
        if ($exists===null){
            $categoryOrigin = new CategoriesOrigin();
        $categoryOrigin->origin_id = $request->origin_id;
        $categoryOrigin->category_id = $request->category_id;
        $categoryOrigin->save();

        return response()->json([
            'status' => true,
            'message' => 'Programa asociado al plan exitosamente',
            'data' => ['circuit' => $categoryOrigin->toArray()]
        ]);
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Este programa ya se encuentra asociado al plan'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $categoryOrigin = CategoriesOrigin::find($id);
            $categoryOrigin->delete();

            return response()->json([
                'status' => true,
                'message' => 'Programa disociado del plan exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El programa está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    public function reportAllocatedBudget(Request $request): JsonResponse
    {
        $categories = CategoriesOrigin::select('program.name AS program','category.name AS subprogram',
            'category.id AS subprogram_id', 'categories_origin.allocated_budget',
            \DB::raw('SUM(event_concept.planned_quantity * event_concept.planned_unit_value) AS planned_budget'),
            \DB::raw('SUM(event_concept.real_quantity * event_concept.real_unit_value) AS executed_budget'),
            \DB::raw('(SUM(event_concept.planned_quantity * event_concept.planned_unit_value) - SUM(event_concept.real_quantity * event_concept.real_unit_value)) AS diff'))
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->leftJoin('event','event.categories_origin_id','categories_origin.id')
            ->leftJoin('event_concept','event.id','event_concept.event_id')
        ->groupBy('categories_origin.id');

        /*if ($request->validity_id) {
            $categories->where('origin.validity_id', $request->validity_id);
        }*/
        if ($request->origin_id) {
            $categories->where('categories_origin.origin_id', $request->origin_id);
        }

        if ($request->search) {
            $categories->where('category.name','like','%' . $request->search. '%')
                ->orWhere('program.name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) == "false") {
            $categories = $categories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categories = $categories->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Presupuestos obtenidos exitosamente',
            'data' => ['categories' => $categories]
        ]);
    }

    public function reportConsolidatedLogistics(Request $request): JsonResponse
    {
        $categories = CategoriesOrigin::select('program.name AS program','category.name AS subprogram','category.id AS subprogram_id',
            \DB::raw('SUM(event_concept.planned_quantity * event_concept.planned_unit_value) AS planned_budget'),
            \DB::raw('SUM(event_concept.real_quantity * event_concept.real_unit_value) AS executed_budget'),
            \DB::raw('(SUM(event_concept.planned_quantity * event_concept.planned_unit_value) - SUM(event_concept.real_quantity * event_concept.real_unit_value)) AS saldo'))
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->join('event','event.categories_origin_id','categories_origin.id')
            ->join('event_concept','event.id','event_concept.event_id')
            ->join('concept','concept.id','event_concept.concept_id')
            ->join('concept_base','concept_base.id','concept.concept_base_id')
            ->where('event.approved_status_id',4)
            ->where('concept_base.concept_type_id','<>',2)
            ->groupBy('categories_origin.id');

        /*if ($request->validity_id) {
            $categories->where('origin.validity_id', $request->validity_id);
        }*/
        if ($request->origin_id) {
            $categories->where('categories_origin.origin_id', $request->origin_id);
        }

        if ($request->search) {
            $categories->where('category.name','like','%' . $request->search. '%')
                ->orWhere('program.name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) == "false") {
            $categories = $categories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categories = $categories->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Matriz logistica obtenida exitosamente',
            'data' => ['categories' => $categories]
        ]);
    }

    public function reportConsolidatedTransport(Request $request): JsonResponse
    {
        $categories = CategoriesOrigin::select('program.name AS program','category.name AS subprogram','category.id AS subprogram_id',
            \DB::raw('SUM(event_concept.planned_quantity * event_concept.planned_unit_value) AS planned_budget'),
            \DB::raw('SUM(event_concept.real_quantity * event_concept.real_unit_value) AS executed_budget'),
            \DB::raw('(SUM(event_concept.planned_quantity * event_concept.planned_unit_value) - SUM(event_concept.real_quantity * event_concept.real_unit_value)) AS saldo'))
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->join('event','event.categories_origin_id','categories_origin.id')
            ->join('event_concept','event.id','event_concept.event_id')
            ->join('concept','concept.id','event_concept.concept_id')
            ->join('concept_base','concept_base.id','concept.concept_base_id')
            ->where('concept_base.concept_type_id',2)
            ->groupBy('categories_origin.id');

        /*if ($request->validity_id) {
            $categories->where('origin.validity_id', $request->validity_id);
        }*/
        if ($request->origin_id) {
            $categories->where('categories_origin.origin_id', $request->origin_id);
        }

        if ($request->search) {
            $categories->where('category.name','like','%' . $request->search. '%')
                ->orWhere('program.name','like','%' . $request->search. '%');
        }

        if ($request->query("pagination", true) == "false") {
            $categories = $categories->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categories = $categories->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Matriz transporte obtenida exitosamente',
            'data' => ['categories' => $categories]
        ]);
    }

}
