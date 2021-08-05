<?php

namespace App\Http\Helpers\Notifications;
use App\Http\Controllers\Notifications\SendEmailsController;

class Notifications {
    
    public static function sendNotification($email,$template,$subject,$data) {
        try {
            // instanciamos el controlador SendEmail
            $notificationEmail = new SendEmailsController();
            // usamos el método index para enviar correo
            $notificationEmail->index($email,$template,$subject,$data);
            $response = true;
        } catch (\Throwable $th) {
            //throw $th;
            $response = false;
        }
        return $response;
    }
}