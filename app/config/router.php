<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

//Index - autenticacion y control de sesion - seguridad
$Inicio = new MicroCollection();
// Establece el manejador principal. Por ejemplo, la instancia de un controlador
$Inicio->setHandler('IndexController', true);
// Establece un prefijo común para todas la rutas
$Inicio->setPrefix('/api/index');
// Usa el método 'obtener' en IndexController
$Inicio->post('/aut', 'autenticar');
// $Inicio->get('/salir/{usuario}', 'salir');
$Inicio->get('/salir', 'salir');
$Inicio->post('/obt_permisos', 'obtener_permisos');

$app->mount($Inicio);

// Gestion de administración de la universidad
$Administracion = new MicroCollection();
$Administracion->setHandler('AdministracionController', true);
$Administracion->setPrefix('/admin');
$Administracion->post('/c_jerarquia', 'crear_jerarquia');
$Administracion->post('/l_jerarquia', 'listar_jerarquias');
$Administracion->post('/m_jerarquia', 'modificar_jerarquia');
$Administracion->post('/b_jerarquia', 'borrar_jerarquia');
$Administracion->post('/c_unidad', 'crear_unidad');
$app->mount($Administracion);
