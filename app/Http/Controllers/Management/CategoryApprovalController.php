<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryApprovalRequest;
use Illuminate\Http\Request;
use App\Models\CategoryApproval;
use Illuminate\Support\Facades\Storage;

class CategoryApprovalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $categoryApproval = CategoryApproval::orderBy('id');

        if ($request->_sort) {
            $categoryApproval->orderBy($request->_sort, $request->_order);
        }

        if ($request->category_id) {
            $categoryApproval->where('category_id', $request->category_id);
        }

        if ($request->query("pagination", true) === "false") {
            $categoryApproval = $categoryApproval->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categoryApproval = $categoryApproval->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Archivos de aprovación obtenidos exitosamente',
            'data' => ['categoryApproval' => $categoryApproval]
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
        $categoryApproval = CategoryApproval::where('category_id', $categoryId);
        if ($request->search) {
            $categoryApproval->where('approval_date', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%')
            ;
        }
        if ($request->query("pagination", true) === "false") {
            $categoryApproval = $categoryApproval->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $categoryApproval = $categoryApproval->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Archivos de aprovación obtenidos exitosamente',
            'data' => ['categoryApproval' => $categoryApproval]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseThemesRequest $request
     * @return JsonResponse
     */
    public function store(CategoryApprovalRequest $request): JsonResponse
    {
        $categoryApproval = CategoryApproval::where([
            ['category_id', $request->category_id],
            ['approval_file', $request->approval_file],
            ['approval_date', $request->approval_date]
        ])->get();
        if (! $categoryApproval->count()) {
            $categoryApproval = new CategoryApproval;
            $categoryApproval->category_id = $request->category_id;
            if ($request->file('approval_file')) {
                $path = Storage::disk('public')->put('categoryApproval', $request->file('approval_file'));
                $categoryApproval->approval_file = $path;
            }
            $categoryApproval->approval_date = $request->approval_date;
            $categoryApproval->save();

            return response()->json([
                'status' => true,
                'message' => 'Archivo de aprovación guardado exitosamente',
                'data' => ['categoryApproval' =>  $categoryApproval->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'El archivo de aprovación ya estaba asociado al programa',
                'data' => ['categoryApproval' =>  $categoryApproval->toArray()]
            ]);
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  CategoryApprovalRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $categoryApproval = CategoryApproval::find($id);
        $categoryApproval->category_id = $request->category_id;
        if ($request->file('approval_file')) {
            $path = Storage::disk('public')->put('categoryApproval', $request->file('approval_file'));
            $categoryApproval->approval_file = $path;
        }
        $categoryApproval->approval_date = $request->approval_date;
        
        $categoryApproval->save();

        return response()->json([
            'status' => true,
            'message' => 'Archivo de aprovación actualizado exitosamente',
            'data' => ['cuorse' => $categoryApproval]
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $file = CategoryApproval::select('approval_file as file')->where('id', $id)->first()->file;
            $urlfile=env('APP_URL').'/'.$file;
            Storage::delete($urlfile);
            $categoryApproval = CategoryApproval::find($id);
            $categoryApproval->delete();

            return response()->json([
                'status' => true,
                'message' => 'Archivo de aprovación eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Archivo de aprovación en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
