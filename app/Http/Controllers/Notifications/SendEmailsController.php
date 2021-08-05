<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Iluminate\Http\JsonResponse;
use App\Mail\TemplateMail;
use Mail;

class SendEmailsController extends Controller {
    
    /**
     * Method to send email.
     *
     * @param string $email addressee
     * @param string $template view blade to render mail
     * @param string $subject mail subject
     * @param array $data mail data
     * @return \Illuminate\Http\Response
     */
    public function index($email, $template, $subject, $data) {
        try {
            Mail::to(explode(",", $email))->send(new TemplateMail($template, $subject, $data));
            $sent = true;
        } catch (\Throwable $th) {
            //throw $th;
            $sent = false;
        }
        return response()->json($sent);
    }
    
}
