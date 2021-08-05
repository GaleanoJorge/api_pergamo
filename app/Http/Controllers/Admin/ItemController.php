<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Actions\Admin\GetMenuItemsDynamic;
use Exception;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @param MenuRequest $request
     * @return JsonResponse
     */
    public function index(MenuRequest $request): JsonResponse
    {
        $menu = GetMenuItemsDynamic::handle($request->role_id);

        return response()->json([
            'status' => true,
            'message' => 'Items como menú obtenidos exitosamente',
            'data' => ['menu' => $menu]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemRequest $request
     * @return JsonResponse
     */
    public function store(ItemRequest $request): JsonResponse
    {
        $item = new Item;
        $item->item_parent_id = $request->item_padre;
        $item->name = $request->nombre;
        $item->route = $request->ruta;
        $item->icon = $request->icono;
        $item->save();

        return response()->json([
            'status' => true,
            'message' => 'Item creado exitosamente',
            'data' => ['item' => $item->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $item = Item::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Item obtenido exitosamente',
            'data' => ['item' => $item]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItemRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(ItemRequest $request, int $id): JsonResponse
    {

        $item = Item::find($id);
        $item->item_parent_id = $request->item_padre;
        $item->name = $request->nombre;
        $item->route = $request->ruta;
        $item->icon = $request->icono;
        $item->save();

        return response()->json([
            'status' => true,
            'message' => 'Item actualizado exitosamente',
            'data' => ['item' => $item]
        ]);
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
            $item = Item::find($id);

            if (!$item) {
                throw new Exception('El item que intenta eliminar no existe', 423);
            }

            $item->delete();

            return response()->json([
                'status' => true,
                'message' => 'Item eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El item está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }
}
