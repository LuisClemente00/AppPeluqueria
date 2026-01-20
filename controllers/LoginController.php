<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController {
    public static function login(Router $router) {
        // Lógica para mostrar la vista de inicio de sesión
        $router->render('auth/login');
    }

    public static function logout() {
        // Lógica para cerrar sesión
        echo "Cerrar sesión";
    }

    public static function olvide(Router $router) {
        // Lógica para recuperar contraseña 
        $router->render('auth/olvide-password', [

        ]);
    }

    public static function recuperar() {
        // Lógica para recuperar contraseña
        echo "Recuperar contraseña";
    }

    public static function crear(Router $router) {
        // Lógica para crear cuenta
        $usuario = new Usuario;

        // Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alerta este vacío
            if(empty($alertas)) {
                // Verificar que el usuario no esté registrado
                $resultado = $usuario->existeUsuario();

                if($resultado && $resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Generar un token unico
                    $usuario->crearToken();

                    // Enviar el email

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);

                    $email->enviarConfirmacion();
                }

                
            }

            
        };

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}