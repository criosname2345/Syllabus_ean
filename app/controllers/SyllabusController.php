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

    public function listar_syllabus_per(){
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

        $rp_syllabus = array();
        $jerarquias = $this->obt_jerarquias();

        $rp_unidades = array();
        $ar_syllabus = array();

        foreach($jerarquias as $jer_iter){
        $unidades = ean\cc\Unidad::find( ['idJerarquia = :Jerarquia:', 
        'bind' => [ 'Jerarquia' => $jer_iter->idJerarquia ],] );
            foreach($unidades as $und){
                $rp_unidades[] = $und;
            }
        }

        foreach($unidades as $unidad){
            if($unidad->idSyllabusCab != false && $unidad->eliminado === null ){
                $ar_syllabus[] = ean\cc\Syllabuscab::findFirst( ['idSyllabusCab = :syl:', 
                'bind' => [ 'syl' => $unidad->idSyllabusCab ],] );    
            }        
        }

        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'jer',
                'Jerarquias'   => $ar_syllabus,
            ]
        ); 

        return $response;

    }

    public function crear_det_syllabus(){
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

        $sylcab = ean\cc\Syllabuscab::findFirst(['idSyllabusCab = :syl:',
        'bind' => [ 'syl' => $json->idSyllabusCab ],]);

        if($sylcab === false){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No existe syllabus con ID'.$json->idSyllabusCab ,
                ]
            );
            return $response;
        }

        if($sylcab->status === 0 || $sylcab->status === 1 ){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'Status borrado o paso a revision, no puede crear otra versión' ,
                ]
            );
            return $response;
        }

        $detalle = new ean\cc\Detallesyllabus();
        $detalle->creacion = date("Y-m-d"); 
        $detalle->modalidad = $json->modalidad;
        $detalle->duracion = $json->duracion;
        $detalle->proposito = $json->proposito;
        $detalle->metodologia = $json->metodologia;
        $detalle->resumenContenidos = $json->resumenContenidos;
        $detalle->evaluacion  = $json->evaluacion;
        $detalle->bibliografia = $json->bibliografia;
        $detalle->enlacesWeb = $json->enlacesWeb;
        $detalle->lengua  = $json->lengua;
        $detalle->prLengua = $json->prLengua;
        $detalle->obsVersion = "Creado";
        $detalle->version = 1;
        $detalle->idSyllabusCab = $sylcab->idSyllabusCab ;
        $detalle->autorDetalle = $usuario['id'];

        if ($detalle->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido grabar el detalle del Syllabus',
                    'Detalle'   => $detalle,
                ]
            );              
        }else{
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => 'Se registro correctamente el detalle del Syllabus',
                    'Detalle'   => $detalle,
                ]
            );   
            $sylcab->versionActual = $detalle->idDetalle;
            $sylcab->save();
        }     
        
        return $response;          

    }

}

