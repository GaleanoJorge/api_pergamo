<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseApprovalRequest;
use Illuminate\Http\Request;
use App\Models\CourseApproval;
use Illuminate\Support\Facades\Storage;

class CourseApprovalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {

        $courseApproval = CourseApproval::orderBy('id');

        if ($request->_sort) {
            $courseApproval->orderBy($request->_sort, $request->_order);
        }

        if ($request->category_id) {
            $courseApproval->where('category_id', $request->category_id);
        }

        if ($request->query("pagination", true) === "false") {
            $courseApproval = $courseApproval->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseApproval = $courseApproval->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Archivos de aprovación obtenidos exitosamente',
            'data' => ['courseApproval' => $courseApproval]
        ]);
    }

       /**
     * Get Module by category.
     *
     * @param  int  $categoryId
     * @return JsonResponse
     */
    public function getByCourse(Request $request, int $courseId): JsonResponse
    {
        $courseApproval = CourseApproval::where('course_id', $courseId);
        if ($request->search) {
            $courseApproval->where('approval_date', 'like', '%' . $request->search . '%')
            ->Orwhere('id', 'like', '%' . $request->search . '%')
            ;
        }
        if ($request->query("pagination", true) === "false") {
            $courseApproval = $courseApproval->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseApproval = $courseApproval->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Archivos de aprovación obtenidos exitosamente',
            'data' => ['courseApproval' => $courseApproval]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseApprovalRequest $request
     * @return JsonResponse
     */
    public function store(CourseApprovalRequest $request): JsonResponse
    {
        $courseApproval = CourseApproval::where([
            ['course_id', $request->course_id],
            ['approval_file', $request->approval_file],
            ['approval_date', $request->approval_date]
        ])->get();
        if (! $courseApproval->count()) {
            $courseApproval = new CourseApproval;
            $courseApproval->course_id = $request->course_id;
            if ($request->file('approval_file')) {
                $path = Storage::disk('public')->put('courseApproval', $request->file('approval_file'));
                $courseApproval->approval_file = $path;
            }
            $courseApproval->approval_date = $request->approval_date;
            $courseApproval->save();

            return response()->json([
                'status' => true,
                'message' => 'Archivo de aprovación guardado exitosamente',
                'data' => ['courseApproval' =>  $courseApproval->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'El archivo de aprovación ya estaba asociado al programa',
                'data' => ['courseApproval' =>  $courseApproval->toArray()]
            ]);
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  CourseApprovalRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $courseApproval = CourseApproval::find($id);
        $courseApproval->course_id = $request->course_id;
        if ($request->file('approval_file')) {
            $path = Storage::disk('public')->put('courseApproval', $request->file('approval_file'));
            $courseApproval->approval_file = $path;
        }
        $courseApproval->approval_date = $request->approval_date;
        
        $courseApproval->save();

        return response()->json([
            'status' => true,
            'message' => 'Archivo de aprovación actualizado exitosamente',
            'data' => ['courseApproval' => $courseApproval]
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $courseApproval = CourseApproval::find($id);
            $courseApproval->delete();

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
