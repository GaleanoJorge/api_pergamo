<?php

namespace App\Http\Controllers\Management;

use App\Models\UserAgreement;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserAgreementRequest;
use Illuminate\Database\QueryException;

class UserAgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $UserAgreement = UserAgreement::select('user_agreement.*')->with('company');

        if ($request->user_id) {
            $UserAgreement->where('user_id', $request->user_id);
        }

        if ($request->_sort) {
            $UserAgreement->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $UserAgreement->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $UserAgreement = $UserAgreement->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $UserAgreement = $UserAgreement->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'convenios del usuario obtenidos exitosamente',
            'data' => ['user_agreement' => $UserAgreement]
        ]);
    }


    public function store(UserAgreementRequest $request): JsonResponse
    {
        $UserAgreement = new UserAgreement;
        $UserAgreement->name = $request->name;
        $UserAgreement->save();

        return response()->json([
            'status' => true,
            'message' => 'convenio del usuario creado exitosamente',
            'data' => ['user_agreement' => $UserAgreement->toArray()]
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
        $UserAgreement = UserAgreement::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'convenio del usuario obtenido exitosamente',
            'data' => ['user_agreement' => $UserAgreement]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserAgreementRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UserAgreementRequest $request, int $id): JsonResponse
    {
        $UserAgreement = UserAgreement::find($id);
        $UserAgreement->name = $request->name;
        $UserAgreement->save();

        return response()->json([
            'status' => true,
            'message' => 'usuario asociado a convenio exitosamente',
            'data' => ['user_agreement' => $UserAgreement]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserAgreementRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function updateAgreement(UserAgreementRequest $request): JsonResponse
    {

        $deleteUserAgreement = UserAgreement::select('user_agreement.*')->where('user_id', $request->user_id)->get()->toArray();

        if (sizeof($deleteUserAgreement) > 0) {
            foreach ($deleteUserAgreement as $item) {
                $UserAgreement = UserAgreement::find($item['id']);
                $UserAgreement->delete();
            }
            $array_companies = json_decode($request->companies);
            foreach ($array_companies as $company) {
                $UserAgreement = new UserAgreement;
                $UserAgreement->company_id = $company;
                $UserAgreement->user_id = $request->user_id;
                $UserAgreement->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'usuario asociado a convenio exitosamente',
            'data' => ['user_agreement' => $UserAgreement]
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
            $UserAgreement = UserAgreement::find($id);
            $UserAgreement->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dia eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dias esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
