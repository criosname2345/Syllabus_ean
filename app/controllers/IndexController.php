<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    private function _registerSession($usuario,$token)
    {
        $this->session->set(
            'usuario',
            [
                'id'          => $usuario->idUsuario,
                'correo'      => $usuario->correo,
                'rol'         => $usuario->idRol,
                'idJerarquia' => $usuario->idJerarquia,
                'token'       => $token
            ]
        );
    }


    /**
     * Esta acción autentica y registra a un usuario dentro de la aplicación
     */
    public function autenticar()
    {
        // Crear una respuesta
        $response = new Response();
        if ($this->request->isPost()) {

            $json = $this->request->getJsonRawBody();

            $correo    = $json->correo;
            $idSesionAut = $json->idSesionAut;

            if(!isset($idSesionAut)){
                $response->setStatusCode(409, 'Conflict');
                $response->setJsonContent(
                    [
                        'status'   => 'ERROR',
                        'messages' => 'No registra código de acceso Google',
                    ]
                );
                return $response;                
            }

            // Buscar el usuario en la base de datos
            $usuario = ean\cc\Usuario::findFirst(
                [
                    "correo = :correo:",
                    'bind' => [
                        'correo'    => $correo,
                        // 'contrasena' => sha1($password),
                        // 'contrasena' => $password,
                    ]
                ]
            );

            if ($usuario !== false) {
                //Si tiene asignado codigo google verificar, si no guardar        
                $verificar = $usuario->idSesionAut ;  
                if(!isset($verificar)){
                    $usuario->idSesionAut = $this->security->hash($idSesionAut);
                    $usuario->save( );
                }else{
                    if( ! $this->security->checkHash($idSesionAut, $usuario->idSesionAut) ){
                        $response->setStatusCode(409, 'Conflict');
                        $response->setJsonContent(
                            [
                                'status'   => 'ERROR',
                                'messages' => 'Usuario no ha sido autenticado, id incorrecto',
                            ]
                        );
                        return $response;
                    }
                }

                $token = $this->security->getTokenKey();
                $this->_registerSession($usuario , $token);
                $response->setJsonContent(
                    [
                        'status'   => $idSesionAut,
                        'messages' => 'Usuario autenticado',
                        'usuario'  => $usuario,
                        'token'    => $token,
                    ]
                );
                return $response;
            }

            $this->security->hash(rand());
            $this->session->remove('usuario');
            // Destruye toda la sesión
            $this->session->destroy();

            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Usuario no ha sido autenticado',
                ]
            );
            return $response;

        }

    }

    public function salir(){
        // Crear una respuesta
        $response = new Response();       

        $this->session->remove('usuario');
        // Destruye toda la sesión
        $this->session->destroy();

        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Usuario salio exitosamente',
            ]
        );
        return $response;
    }

}

