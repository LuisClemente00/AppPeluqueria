<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

Class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3bde54c0c8fd46';
        $mail->Password = 'b274399f394813';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon', 'AppSalon.com');
        $mail->Subject = 'COnfirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';


        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='localhost:3000/confirmar-cuenta?token=?" . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta centa, puedes ignorar el mensaje</p>";
        $contenido .="</html";
        $mail->Body = $contenido;

        // Enviar el mail
        $mail->send();

        }
}