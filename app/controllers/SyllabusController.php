<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class SyllabusController extends ControllerBase
{

    public function crear_cab_syllabus()
    {
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
         $usuario = $this->session->get('usuario');

         $syllabusCab = new ean\cc\Syllabuscab();
         $syllabusCab->fecCreacion = date("Y-m-d"); 
         $syllabusCab->codigo = $json->codigo;
         $syllabusCab->observacion = $json->observacion;
         // 0 - borrador
         // 1 - Paso para revision
         // 2 - revisado
         // 3 - aprobado
         $syllabusCab->status = 0;
         $syllabusCab->autorCreacion = $usuario['id'];
         $unidad = ean\cc\Unidad::findFirst(['idUnidad = :unidad:',
         'bind' => [ 'unidad' => $json->idUnidad ],]);
         if($unidad === false ){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se encuentra unidad con ID '.$unidad->idUnidad,
                ]
            );
            return $response;
        }
        if($unidad->idSyllabusCab != false){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Unidad ya contiene cabecera de Syllabus',
                ]
            );
            return $response;
        }
        if($unidad->eliminado != false){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Unidad se encuentra eliminada, no se puede crear syllabus',
                ]
            );
            return $response;
        }

        $syllabusCab->idUnidad = $json->idUnidad ;

        if ($syllabusCab->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido grabar el syllabus',
                    'Syllabus'   => $syllabusCab,
                ]
            );           
        }else{
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => 'Se registro correctamente el Syllabus',
                    'Syllabus'   => $syllabusCab,
                ]
            );   
            $unidad->idSyllabusCab = $syllabusCab->idSyllabusCab;
            $unidad->save();
        }     
        
        return $response;  

    }

}

