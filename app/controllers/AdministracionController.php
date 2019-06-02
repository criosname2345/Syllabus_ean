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

    public function listar_jerarquias(){
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

        // $usuario = $this->session->get('usuario');
        // $jerarquia = ean\cc\Jerarquia::find(['idJerarquia = :Jerarquia:',
        // 'bind' => [ 'Jerarquia' => $usuario['idJerarquia'] ],]);

        $rp_jerarquias = array();
        $rp_jerarquias = $this->obt_jerarquias();

        // if($jerarquia === false ){
        //     $response->setStatusCode(409, 'Conflict');
        //     $response->setJsonContent(
        //         [
        //             'status'   => 'ERROR',
        //             'messages' => 'No se encuentra jerarquia del usuario',
        //         ]
        //     );
        //     return $response;
        // }    

        // if( $jerarquia->jerarquiaSuperior === false ){
        //     $rp_jerarquias = ean\cc\Jerarquia::find( );
        // }else{
        //     $rp_jerarquias = ean\cc\Jerarquia::find(['jerarquiaSuperior = :Jerarquia:',
        //     'bind' => [ 'Jerarquia' => $jerarquia->idJerarquia ],]);
        // }

        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Jerarquias del usuario',
                'jerarquias' => $rp_jerarquias ,
            ]
        );
        return $response;

    }

    public function modificar_jerarquia(){
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

       $jerarquia = ean\cc\Jerarquia::findFirst(['idJerarquia = :Jerarquia:',
       'bind' => [ 'Jerarquia' => $json->idJerarquia ],]);    

       if( $jerarquia === false ){
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Debe enviar id Jerarquia correcto',
            ]
        );
        return $response;           
       }

       if( isset( $json->nombre ) ){
        $jerarquia->nombre = $json->nombre;
       }     

       if ( $jerarquia->update() === false ) {
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Id de jerarquia no existe',
            ]
        );           
       } else {
        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Nombre de jerarquia modificado',
            ]
        );   
       }

       return $response;  

    }

    public function borrar_jerarquia(){
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

       $jerarquia = ean\cc\Jerarquia::findFirst(['idJerarquia = :Jerarquia:',
       'bind' => [ 'Jerarquia' => $json->idJerarquia ],]);    

       if( $jerarquia === false ){
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Debe enviar id Jerarquia correcto',
            ]
        );
        return $response;           
       }

       $jerInferiores = ean\cc\Jerarquia::findFirst(['jerarquiaSuperior = :Jer: and eliminado is NULL ',
       'bind' => [ 'Jer' => $json->idJerarquia ],]);
       if( ! $jerInferiores === false ){
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Jerarquía ya contiene jerarquias inferiores activas',
            ]
        );
        return $response;     
       }
       $unidadAd = ean\cc\Unidad::findFirst(['idJerarquia = :Jer: and eliminado is NULL ',
       'bind' => [ 'Jer' => $jerarquia->idJerarquia ],]);         
       if( ! $unidadAd === false ){
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Jerarquía ya contiene unidades activas adscritas',
            ]
        );
        return $response;     
       }

       if($jerarquia->eliminado === null ){
        $jerarquia->eliminado = 'X';
       } else {
        $jerarquia->eliminado = null ;   
       }
       
       $jerarquia->update();
       $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Jerarquia eliminada id:'.$json->idJerarquia,
            ]
        );   

       return $response;  

    }

    public function crear_unidad(){
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
       
       $unidad = new ean\cc\Unidad();    
       $unidad->nombre = $json->nombre;
       $unidad->justificacion = $json->justificacion;
       $unidad->tipo   = $json->tipo;
       $unidad->creditos = $json->creditos;
       $unidad->nivel = $json->nivel;
       $unidad->codigosSap = $json->codigosSap;

       $jerarquia = ean\cc\Jerarquia::findFirst(['idJerarquia = :Jerarquia:',
       'bind' => [ 'Jerarquia' => $json->idJerarquia ],]);  
       if( $jerarquia === false ){
        $response->setStatusCode(409, 'Conflict');
        $response->setJsonContent(
            [
                'status'   => 'ERROR',
                'messages' => 'Debe enviar id Jerarquia correcto',
            ]
        );
        return $response;           
       }
       $unidad->idJerarquia = $jerarquia->idJerarquia;

       if ($unidad->create() === false) {
           $response->setStatusCode(409, 'Conflict');
           $response->setJsonContent(
               [
                   'status'   => 'ERROR',
                   'messages' => 'No se ha podido grabar la unidad',
                   'unidad'   => $unidad,
               ]
           );  
       } else {
           $response->setJsonContent(
               [
                   'status'   => 'OK',
                   'messages' => 'Se registro correctamente la unidad',
                   'jerarquia' => $unidad,
               ]
           );              
       }

       return $response; 
       
   }

   public function listar_unidades(){
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

        // $usuario = $this->session->get('usuario');
        // $jerarquia = ean\cc\Jerarquia::findFirst(['idJerarquia = :Jerarquia:',
        // 'bind' => [ 'Jerarquia' => $usuario['idJerarquia'] ],]);
        $rp_jerarquias = array();
        $rp_jerarquias = $this->obt_jerarquias();

        if($rp_jerarquias === false ){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se encuentra jerarquia del usuario',
                ]
            );
            return $response;
        }

        // switch ( $jerarquia->tipo ) {
        //     case 1:
        //         $rp_jerarquias = ean\cc\Jerarquia::find( );
        //         break;
        //     case 2:
        //         $ar_jerarquias = ean\cc\Jerarquia::find(['jerarquiaSuperior = :Jerarquia:',
        //         'bind' => [ 'Jerarquia' => $jerarquia->idJerarquia ],]);
        //         foreach($ar_jerarquias as $arjer){
        //             $rp_jerarquias[] = $arjer ;
        //         }
        //         $rp_jerarquias[] = $jerarquia ;
        //         break;
        //     case 3:
        //         // echo "i es igual a 2";
        //         break;
        // }

        $rp_unidades = array();

        foreach($rp_jerarquias as $jer_iter){
            $unidades = ean\cc\Unidad::find( ['idJerarquia = :Jerarquia:', 
            'bind' => [ 'Jerarquia' => $jer_iter->idJerarquia ],] );
            foreach($unidades as $und){
                $rp_unidades[] = $und;
            }
        }

        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Unidades del usuario',
                'jerarquias' => $rp_unidades ,
            ]
        );
        return $response;

    }

    public function modificar_unidad(){
            
    }

}

