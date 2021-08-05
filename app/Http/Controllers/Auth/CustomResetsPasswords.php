<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait CustomResetsPasswords {
    use ResetsPasswords;

    public function rules() {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|between:8,20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@()$%^&*=_{}[\]:;<>,.\/~`±§+-]).{8,20}$/'
        ];
    }

    /*public function validationErrorMessages(){
        return [
            'password.required' => 'La contraseña es requerida.',
            'password.confirmed' => 'La contraseña y la confirmación son distintas.',
            'password.regex' => 'No cumple con las condiciones minimas de seguridad.',
        ];
    }*/

    public function sendResetResponse(Request $request, $response): JsonResponse
    {
        /*return redirect($this->redirectPath())
                            ->with('status', trans($response));*/
        return response()->json([
            'status' => true,
            'message' => trans($response)
        ]);
    }

    public function sendResetFailedResponse(Request $request, $response): JsonResponse
    {
        /*return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);*/
        return response()->json([
            'status' => false,
            'message' => trans($response)
        ], 423);

    }
}