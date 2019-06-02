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

    public function obt_jerarquias(){

        $rp_jerarquias = array();

        $usuario = $this->session->get('usuario');
        $jerarquia = ean\cc\Jerarquia::findFirst(['idJerarquia = :Jerarquia:',
        'bind' => [ 'Jerarquia' => $usuario['idJerarquia'] ],]);

        if($jerarquia === false ){
            return false;
        }
        if( $jerarquia->tipo === 1 ){
            $rp_jerarquias = ean\cc\Jerarquia::find( );
            return $rp_jerarquias;
        } //Si el usuario no tiene permisos generales revisar que jer tiene

        $rp_jerarquias[] = $jerarquia ; //Agregar primer Jerarquia
        $ar_jerarquias = ean\cc\Jerarquia::find(['jerarquiaSuperior = :Jerarquia:',
        'bind' => [ 'Jerarquia' => $jerarquia->idJerarquia ],]);

        $jer_ini = count($ar_jerarquias);

        while( $jer_ini > 0 ){  
            unset($arr_jer_aux); 
            $arr_jer_aux = array();
            foreach($ar_jerarquias as $arjer){
                $rp_jerarquias[] = $arjer ; // Se agregan todas las jeraquias inferiores
                //Se buscan si estas jerarquias inferiores tienen mas jerarquias inferiores
                $jer_sec = ean\cc\Jerarquia::find(['jerarquiaSuperior = :Jerarquia:',
                'bind' => [ 'Jerarquia' => $arjer->idJerarquia ],]);
                //Se agregan jerarquias para revisar en la siguiente iteración
                foreach($jer_sec as $jeraux){
                    $arr_jer_aux[] = $jeraux;
                }
            }
            $jer_ini = count( $arr_jer_aux );
            if($jer_ini > 0){
                $ar_jerarquias = $arr_jer_aux;
            }
        }

        // foreach($ar_jerarquias as $arjer){
        //     $rp_jerarquias[] = $arjer ;
        //     if($arjer != 4 ){
                 
        //     }
        // }

        return $rp_jerarquias;
    }

}
