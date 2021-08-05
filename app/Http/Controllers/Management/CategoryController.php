<?php

namespace App\Http\Controllers\Management;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Actions\Management\GetCategoriesDynamic;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $category = Category::with('area', 'subarea', 'user','category','category.category');

        if ($request->_sort) {
            $category->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $category->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->area_id) {
            $category->where('area_id', $request->area_id);
        }

        if ($request->subarea_id) {
            $category->where('subarea_id', $request->subarea_id);
        }
        if ($request->user_id) {
            $category->where('user_id', $request->user_id);
        }

        if ($request->query("pagination", true) === "false") {
            $category = $category->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $category = $category->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categorias obtenidas exitosamente',
            'data' => ['categories' => $category]
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function getByProgram(Request $request,int $programId = null): JsonResponse
    {
        if($programId==0){
        $category = Category::with('area', 'subarea', 'user', 'category','category.category');
        }else if($programId==1){
            $category = Category::with('area', 'subarea', 'user', 'category','category.category')->where('category_parent_id',null);
        }else{
            $category = Category::with('area', 'subarea', 'user', 'category','category.category')->where('category_parent_id','!=',null);
        }

        if ($request->_sort) {
            $category->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $category->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->area_id) {
            $category->where('area_id', $request->area_id);
        }

        if ($request->subarea_id) {
            $category->where('subarea_id', $request->subarea_id);
        }
        if ($request->user_id) {
            $category->where('user_id', $request->user_id);
        }

        if ($request->query("pagination", true) === "false") {
            $category = $category->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $category = $category->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Categorias obtenidas exitosamente',
            'data' => ['categories' => $category]
        ]);
    }

   /**
     * Display a listing of the resource
     *
     * @return JsonResponse
     */
    public function getBySubProgram(Request $request,int $programId = null): JsonResponse
    {
     
        $category = Category::with('area', 'subarea', 'user', 'category','category.category')->where('category_parent_id',$programId);
        

        if ($request->_sort) {
            $category->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $category->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->area_id) {
            $category->where('area_id', $request->area_id);
        }

        if ($request->subarea_id) {
            $category->where('subarea_id', $request->subarea_id);
        }
        if ($request->user_id) {
            $category->where('user_id', $request->user_id);
        }

        if ($request->query("pagination", true) === "false") {
            $category = $category->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $category = $category->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Subcategorias obtenidas exitosamente',
            'data' => ['categories' => $category]
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $category = new Category;
        $category->category_parent_id = $request->category_parent_id;
        // $category->subarea_id = $request->subarea_id;
        // $category->area_id = $request->area_id;
        $category->user_id = Auth::user()->id;
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->file('url_img')) {
            $path = Storage::disk('public')->put('category', $request->file('url_img'));
            $category->url_img = $path;
        }
        if ($request->file('url_img_ext')) {
            $path = Storage::disk('public')->put('category', $request->file('url_img_ext'));
            $category->url_img_ext = $path;
        }
        $category->save();
        if ($request->category_parent_id === null) {
            return response()->json([
                'status' => true,
                'message' => 'Programa creado exitosamente',
                'data' => ['category' => $category->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'SubPrograma creado exitosamente',
                'data' => ['category' => $category->toArray()]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $category = Category::where('id', $id)->with('area', 'subarea', 'user', 'category','category.category')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Categoría obtenida exitosamente',
            'data' => ['category' => $category]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        $category = Category::find($id);
        $category->category_parent_id = $request->category_parent_id;
        // $category->area_id = $request->area_id;
        // $category->subarea_id = $request->subarea_id;
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->file('url_img')) {
            $path = Storage::disk('public')->put('category', $request->file('url_img'));
            $category->url_img = $path;
        }
        if ($request->file('url_img_ext')) {
            $path = Storage::disk('public')->put('category', $request->file('url_img_ext'));
            $category->url_img_ext = $path;
        }
        $category->save();

        if ($request->category_parent_id === null) {
            return response()->json([
                'status' => true,
                'message' => 'Programa actualizado exitosamente',
                'data' => ['category' => $category->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'SubPrograma actualizado exitosamente',
                'data' => ['category' => $category->toArray()]
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
            $category = Category::find($id);
            $category->delete();

            return response()->json([
                'status' => true,
                'message' => 'Categoría eliminada exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Categoría está en uso, no es posible eliminarla.',
            ], 423);
        }
    }

    /**
     * Get the category by origin id
     *
     * @param integer $originId
     * @return JsonResponse
     */
    public function getByOrigin(int $originId): JsonResponse
    {
        $categories = GetCategoriesDynamic::handle($originId);

        return response()->json([
            'status' => true,
            'message' => 'Categorias dinámicas por origen obtenidas exitosamente.',
            'data' => ['categories' => $categories]
        ]);
    }

    /**
     * Get the category by origin id
     *
     * @param integer $originId
     * @return JsonResponse
     */
    public function getCatByOrigin(Request $request, int $originId): JsonResponse
    {
        // $categories = GetCategoriesDynamic::handle($originId);
        // $categories = Category::where('origin_id', $originId)->with('area', 'subarea', 'origin', 'user');
        $categories = Category::select('category.*')
            ->with('area', 'subarea', 'origin', 'user', 'categories_origin', 'category')
            ->join('categories_origin', 'category.id', 'categories_origin.category_id')
            ->where('categories_origin.origin_id', $originId);
        if ($request->search) {
            $categories->where('name', 'like', '%' . $request->search . '%');
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
            'message' => 'Categorias dinámicas por origen obtenidas exitosamente.',
            'data' => ['categories' => $categories]
        ]);
    }
    /**
     * Get the goals by category id
     *
     * @param integer $categoryId
     * @return JsonResponse
     */
    public function getGoals(int $categoryId): JsonResponse
    {
        $categoryGoals = Category::where('id', $categoryId)->with('goals.unit')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos por Categoría obtenidas exitosamente.',
            'data' => ['categoryGoals' => $categoryGoals]
        ]);
    }

    public function all(): JsonResponse
    {
        // $categories = Category::select('*')->where('category_parent_id','=',null);
        $categories = Category::select('*');
        $categories = $categories->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Categorias obtenidas exitosamente',
            'data' => ['categories' => $categories]
        ]);
    }
}
