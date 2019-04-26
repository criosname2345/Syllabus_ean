<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class AdministracionController extends ControllerBase
{

    public function crear_jerarquia(){
         // Crear una respuesta
         $response = new Response();
         if ( ! $this->request->isPost()) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Servicio no es post',
                ]
            );
            return $response;
         }
         $json = $this->request->getJsonRawBody();  
         if (!$this->validar_logueo($json->correo , $json->token)){
            // Cambiar el HTTP status
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Usuario no ha sido autenticado',
                ]
            );
            return $response;
        }
        
        $jerarquia = new ean\cc\Jerarquia();    
        $jerarquia->nombre = $json->nombre;
        $jerarquia->tipo   = $json->tipo;
        $jerarquia->jerarquiaSuperior = $json->jer_sup;

        if($json->tipo > 1 && !isset($json->jer_sup)){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'La jerarquia requiere jerarquia superior',
                ]
            );
            return $response;           
        }

        if ($jerarquia->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido grabar la jerarquia',
                    'jerarquia'   => $jerarquia,
                ]
            );  
        } else {
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => 'Se registro correctamente la jerarquia',
                    'jerarquia' => $jerarquia,
                ]
            );              
        }

        return $response; 
        
    }

    public function listar_jerarquia(){
         // Crear una respuesta
         $response = new Response();
         if ( ! $this->request->isPost()) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Servicio no es post',
                ]
            );
            return $response;
         }
         $json = $this->request->getJsonRawBody();  
         if (!$this->validar_logueo($json->correo , $json->token)){
            // Cambiar el HTTP status
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

}

