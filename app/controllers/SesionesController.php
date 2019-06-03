<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class SesionesController extends ControllerBase
{

    public function agregar_sesion(){
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
        
        $sesion = new ean\cc\Sesion();
        $ses_det = new ean\cc\DetalleSesion();

        $detalle = ean\cc\Detallesyllabus::findFirst(['idDetalle = :det:',
        'bind' => [ 'det' => $json->idDetalle ],]);

        if( $detalle === false ){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Detalle no existe' ,
                ]
            );
            return $response;
        }       

        $phql = 'SELECT s.* FROM ean\cc\Sesion s 
                 INNER JOIN ean\cc\DetalleSesion d
                 ON s.idSesion = d.idSesion
                 WHERE d.idDetalle = :det:
                 AND   s.numero = :num:';
        $validar = $this->modelsManager
        ->executeQuery( $phql,
            [
                'det' => $detalle->idDetalle,
                'num' => $json->numero,
            ]        
        )->getFirst();

        if( $validar != false){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Ya existe sesion con el mismo numero',
                    'Sesion'   => $validar,
                ]
            ); 
            return $response; 
        }

        $numero = $json->numero - 1 ;

        if( $numero != 1){
            $phql = 'SELECT s.* FROM ean\cc\Sesion s 
            INNER JOIN ean\cc\DetalleSesion d
            ON s.idSesion = d.idSesion
            WHERE d.idDetalle = :det:
            AND   s.numero = :num:';
            $validar = $this->modelsManager
            ->executeQuery( $phql,
                [
                    'det' => $detalle->idDetalle,
                    'num' => $numero,
                ]        
            )->getFirst();

            if( $validar === false){
                $response->setStatusCode(409, 'Conflict');
                $response->setJsonContent(
                    [
                        'status'   => 'ERROR',
                        'messages' => 'No existe número de sesion predecesor validar',
                        'Sesion'   => $numero,
                    ]
                ); 
                return $response; 
            }            
        }

        $sesion->contenidos = $json->contenidos ;
        $sesion->tAutonomo = $json->tAutonomo ;
        $sesion->acompDirecto = $json->acompDirecto ;
        $sesion->numero = $json->numero ;
        $sesion->duracion = 15 ;

        if ($sesion->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido añadir la sesion',
                    'Sesion'   => $sesion,
                ]
            );              
        }else{
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => 'Se registro correctamente la sesion para el detalle '.$detalle->idDetalle,
                    'Sesion'   => $sesion,
                ]
            );   
            $ses_det->idDetalle = $detalle->idDetalle;
            $ses_det->idSesion  = $sesion->idSesion;
            $ses_det->create();
        }     
        
        return $response;   

    }

}

