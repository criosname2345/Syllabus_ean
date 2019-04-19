<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function validar_logueo($correo = null , $token = null) {

        $respuesta = false;

        $usuario = $this->session->get('usuario');

        if (isset($usuario)) {  
            if ( $usuario['token'] === $token ) {
                $respuesta = true;
            };                     
        }

        if(!$respuesta){
            $this->session->remove('usuario');
            // Destruye toda la sesión
            $this->session->destroy();
        }

        return $respuesta;

    }
    
    public function obt_permisos(){
        $usuario = $this->session->get('usuario');
        $permisos = ean\cc\Permiso::find(['idRol = :Rol:',
        'bind' => [ 'Rol' => $usuario['rol'] ],]);
        return $permisos;
    }

}
