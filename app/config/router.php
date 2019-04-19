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
$Inicio->get('/salir', 'salir');
$Inicio->post('/obt_permisos', 'obtener_permisos');

$app->mount($Inicio);
