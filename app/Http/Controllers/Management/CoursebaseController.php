<?php

namespace App\Http\Controllers\Management;

use Exception;
use App\Models\Course;
use App\Models\UserRole;
use App\Models\UserRoleCourse;
use App\Actions\Sync\SyncCourse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CourseSyncRequest;
use App\Http\Requests\CourseBaseRequest;
use App\Models\Base\CourseEducationalInstitution;
use App\Models\Coursebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursebaseController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $courses = Coursebase::with('category')->orderBy('name');

        if ($request->category_id) {
            $courses = $courses->where('category_id',  "=", $request->category_id);
        }
        if ($request->search) {
            $courses->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) == "false") {
            $courses = $courses->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courses = $courses->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cursos base obtenidos exitosamente.',
            'data' => ['courses' => $courses]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseBaseRequest $request
     * @return JsonResponse
     */

    public function store(CourseBaseRequest $request): JsonResponse
    {
        $courseBase = new CourseBase;
        $courseBase->name = $request->name;
        $courseBase->general_objective = $request->general_objective;
        $courseBase->category_id = $request->category_id;
        $courseBase->description = $request->description;
        $courseBase->addressed_to = $request->addressed_to;
        $courseBase->duration = $request->duration;
        $courseBase->contact_email = $request->contact_email;
        if ($request->file('url_img_int')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('url_img_int'));
            $courseBase->url_img_int = $path;
        }
        if ($request->file('url_img_ext')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('url_img_ext'));
            $courseBase->url_img_ext = $path;
        }
        if ($request->file('circular')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('circular'));
            $courseBase->circular = $path;
        }
        $courseBase->save();

        return response()->json([
            'status' => true,
            'message' => 'Curso creado exitosamente',
            'data' => ['course' => $courseBase->toArray()]
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
        $courseBase = CourseBase::with('category')
            ->where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Curso obtenido exitosamente',
            'data' => ['course' => $courseBase]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseBaseRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CourseBaseRequest $request, int $id): JsonResponse
    {
        $courseBase = CourseBase::find($id);
        $courseBase->name = $request->name;
        $courseBase->general_objective = $request->general_objective;
        $courseBase->category_id = $request->category_id;
        $courseBase->description = $request->description;
        $courseBase->addressed_to = $request->addressed_to;
        $courseBase->duration = $request->duration;
        $courseBase->contact_email = $request->contact_email;
        if ($request->file('url_img_int')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('url_img_int'));
            $courseBase->url_img_int = $path;
        }
        if ($request->file('url_img_ext')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('url_img_ext'));
            $courseBase->url_img_ext = $path;
        }
        if ($request->file('circular')) {
            $path = Storage::disk('public')->put('coursebase', $request->file('circular'));
            $courseBase->circular = $path;
        }
        $courseBase->save();

        return response()->json([
            'status' => true,
            'message' => 'Curso actualizado exitosamente',
            'data' => ['cuorse' => $courseBase]
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
            $courseBase = CourseBase::find($id);
            $courseBase->delete();

            return response()->json([
                'status' => true,
                'message' => 'Curso eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El Curso esta en uso, no es posible eliminar'
            ], 423);
        }
    }


    /**
     * Get coursebase by category.
     *
     * @param  int  $category_id
     * @return JsonResponse
     */
    public function getCourseByCategory(Request $request, int $category_id): JsonResponse
    {
        $courseBase = CourseBase::with('category')
            ->where('category_id', $category_id);

        if ($request->search) {
            $courseBase->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->query("pagination", true) == "false") {
            $courseBase = $courseBase->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $courseBase = $courseBase->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Curso obtenido exitosamente',
            'data' => ['course' => $courseBase]
        ]);
    }
}
