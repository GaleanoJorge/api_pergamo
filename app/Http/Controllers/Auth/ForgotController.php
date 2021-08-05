<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotController extends Controller
{
    use SendsPasswordResetEmails;

    public function __invoke(Request $request)
    {
        $validate = $this->validateEmail($request);

        if ($validate) {
            return $validate;
        }

        return $this->sendResetLinkEmail($request);
    }

    protected function validateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'message' => 'Faltan o hay algún error en los datos',
                'errors' => $validator->errors()
            ], 422);
        }
    }

    protected function sendResetLinkResponse($response)
    {
        return response()->json(
            ['message' => 'Se ha enviado un correo electrónico para que pueda restablecer la contraseña']
        );
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'error' => 'EMAIL_NO_EXIST',
            'msg' => 'El correo electrónico no existe.'
        ], 423);
    }
}
