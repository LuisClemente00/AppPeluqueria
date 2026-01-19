<?php

namespace Controllers;

use MVC\Router;

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


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $usuario->sincronizar($_POST);

            
        };

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario
        ]);
    }
}