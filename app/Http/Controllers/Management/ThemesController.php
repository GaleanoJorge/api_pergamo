<?php

namespace App\Http\Controllers\Management;

use App\Models\Themes;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThemesRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Themes = Themes::with('status');

        if($request->_sort){
            $Themes->orderBy($request->_sort, $request->_order);
        }            

        if ($request->search) {
            $Themes->where('name','like','%' . $request->search. '%');
        }

        if ($request->status_id) {
            $Themes->where('status_id', $request->status_id);
        }
        
        if($request->query("pagination", true)=="false"){
            $Themes=$Themes->get()->toArray();    
        }else{
            $page= $request->query("current_page", 1);
            $per_page=$request->query("per_page", 10);
            
            $Themes = $Themes->paginate($per_page,'*','page',$page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Temas obtenidos exitosamente',
            'data' => ['themes' => $Themes]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ThemesRequest  $request
     * @return JsonResponse
     */
    public function store(ThemesRequest $request): JsonResponse
    {
        $theme = new Themes;
        $theme->status_id = $request->status_id;
        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->save();

        return response()->json([
            'status' => true,
            'message' => 'Tema creado exitosamente',
            'data' => ['themes' => $theme->toArray()]
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
        $theme = Themes::where('id', $id)->with('status')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tema obtenido exitosamente',
            'data' => ['themes' => $theme]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ThemesRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ThemesRequest $request, $id): JsonResponse
    {
        $theme = Themes::find($id);
        $theme->status_id = $request->status_id;
        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->save();

        return response()->json([
            'status' => true,
            'message' => 'Tema actualizado exitosamente',
            'data' => ['themes' => $theme]
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $theme = Themes::find($id);
            $theme->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tema eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tema está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
