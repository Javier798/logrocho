<?php
session_start();
require("Controller/controllerSesion.php");
require("Controller/ControllerApi.php");
require("Controller/ControllerBD.php");
require("Model/bd.php");
require("Model/Conexion.php");
$home = "/dwes/PruebaProyecto/index.php/";

//Quito la home de la ruta de la barra de direcciones
$controllerSession = new controllerSesion();
$controllerApi = new controllerApi();
$controllerBD = new controllerBD();
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);
//Creo el array de ruta (filtrando los vacios)

$array_ruta = array_filter(explode("/", $ruta));
//Decido la ruta en funcion de los elementos del array
//var_dump($array_ruta);

if (isset($array_ruta[0]) && $array_ruta[0] == "login") {
    $controllerSession->login("");
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comprobarlogin") {
    $controllerSession->comprobarSession($array_ruta[0]);
    if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
        $user = $_POST["usuario"];
        $password = $_POST["contrasena"];
        $comprobar = $controllerSession->comprobarLogin($user, $password);
    }
} else if (isset($array_ruta[0]) && $array_ruta[0] == "comprobarloginFront") {

    $controllerSession->comprobarSession($array_ruta[0]);
    if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {

        $user = $_POST["usuario"];
        $password = $_POST["contrasena"];
        $comprobar = $controllerSession->comprobarloginFront($user, $password);
    }
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getBares") {

    $controllerApi->getBares();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getBarDetalle") {

    $id = $_POST["id"];
    $controllerApi->getBarDetalle($id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getBarLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $puntuacion = $_POST["puntuacion"];
    $puntuacionmax = $_POST["puntuacionmax"];
    $filtro = $_POST["filtro"];
    $controllerApi->getBaresLimit($ordenacion, $indice, $cantidad,$puntuacion,$puntuacionmax,$filtro);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getPinchoLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $puntuacion = $_POST["puntuacion"];
    $puntuacionmax = $_POST["puntuacionmax"];
    $filtro = $_POST["filtro"];
    $bar = $_POST["bar"];
    $controllerApi->getPinchosLimit($ordenacion, $indice, $cantidad,$puntuacion,$puntuacionmax,$filtro,$bar);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getPinchos") {

    $controllerApi->getPinchos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getPinchoDetalle") {

    $id = $_POST["id"];
    $controllerApi->getPinchoDetalle($id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "altaBar") {

    $controllerBD->altaBares($_POST["nombre"], $_POST["localizacion"], $_POST["puntuacion"], $_POST["descripcion"], $_POST["longitud"], $_POST["latitud"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "bajaBar") {

    $controllerBD->bajaBares($_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "modificarBar") {

    $controllerBD->modificarBares($_POST["nombre"], $_POST["localizacion"], $_POST["puntuacion"], $_POST["descripcion"], $_POST["longitud"], $_POST["latitud"], $_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "altaPincho") {

    $controllerBD->altaPinchos($_POST["nombre"], $_POST["descripcion"], $_POST["puntuacion"], $_POST["bar"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "bajaPincho") {

    $controllerBD->bajaPincho($_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "modificarPincho") {

    $controllerBD->modificarPinchos($_POST["nombre"], $_POST["descripcion"], $_POST["puntuacion"], $_POST["bar"], $_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUsuarios") {

    $controllerApi->getusuarios();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUsuariosLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $controllerApi->getUsuariosLimit($ordenacion, $indice, $cantidad);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUsuariosDetalle") {

    $id = $_POST["id"];
    $controllerApi->getUsuarioDetalle($id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "altaUsuario") {

    $controllerBD->altaUsuarios($_POST["nombre"], $_POST["email"], $_POST["apellido"], $_POST["contraseña"], $_POST["rol"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "altaUsuarioFront") {
    $controllerBD->altaUsuarios($_POST["usuario"], $_POST["email"], $_POST["apellido"], $_POST["contraseña"], $_POST["rol"]);
    $controllerSession->mostrarLoginFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "bajaUsuario") {

    $controllerBD->bajaUsuarios($_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "modificarUsuario") {

    $controllerBD->modificarUsuarios($_POST["nombre"], $_POST["email"], $_POST["apellido"], $_POST["contraseña"], $_POST["rol"], $_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenaDetalle") {

    $id = $_POST["id"];
    $codUsu = $_POST["codUsu"];
    $controllerApi->getReseñasDetalle($id, $codUsu);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenas") {
    $controllerApi->getReseñas();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenasLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $controllerApi->getReseñasLimit($ordenacion, $indice, $cantidad);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "altaResena") {
    $controllerBD->altaResena($_POST["mensaje"], $_POST["valoracion"], $_POST["Fk_pincho"], $_POST["Fk_usuarios"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "bajaResena") {
    $controllerBD->bajaResenas($_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "modificarResena") {
    $controllerBD->modificarRsena($_POST["mensaje"], $_POST["valoracion"], $_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "listadoBares") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarBares($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "listadoPinchos") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarPinchos($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/infoBares/', $array_ruta[0])) {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarInfoBares($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/infoPinchos/', $array_ruta[0])) {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarInfoPinchos($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/infoResena/', $array_ruta[0])) {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarInfoReseña($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "listadoResenas") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarResenas($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "listadoUsuarios") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarUsuarios($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/infoUsuarios/', $array_ruta[0])) {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarInfoUsuarios($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "contacto") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarContacto($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "logOut") {
    $controllerSession->logOut($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "logOutFront") {
    $controllerSession->logOutFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "error404") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarError404($array_ruta[0]);
    $controllerSession->comprobarSession($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "error500") {
    $controllerSession->mostrarError500($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "cambiarContrasena") {
    $controllerSession->cambiarContrasena();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->home($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "nombreBares") {
    $controllerApi->getIdBares();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "nombrePinchos") {
    $controllerApi->getIdPinchos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "nombreUsuarios") {
    $controllerApi->getIdUsuarios();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getPinchosPorBar") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $id = $_POST["id"];
    $controllerApi->getPinchosPorBarLimit($ordenacion, $indice, $cantidad, $id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenasPorPincho") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $id = $_POST["id"];
    $controllerApi->getReseñasPorPinchoLimit($ordenacion, $indice, $cantidad, $id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenasPorUsuarioLikeLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $id = $_POST["id"];
    $controllerApi->getResenasPorUsuarioLikeLimit($ordenacion, $indice, $cantidad, $id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "guardarImagenBar") {
    $id = $_POST["bar"];
    $imagen = $_FILES["imagen"];
    $controllerBD->guardarImagenBar($id, $imagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarImagenBar") {
    $idImagen = $_POST["id"];
    $nombre = $_POST["nombre"];
    $bar = $_POST["bar"];
    $controllerBD->borrarImagenBar($bar, $nombre, $idImagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "guardarImagenPincho") {
    $id = $_POST["pincho"];
    $imagen = $_FILES["imagen"];
    $controllerBD->guardarImagenPincho($id, $imagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "guardarImagenBar") {
    $id = $_POST["bar"];
    $imagen = $_FILES["imagen"];
    $controllerBD->guardarImagenBar($id, $imagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarImagenPincho") {
    $idImagen = $_POST["id"];
    $nombre = $_POST["nombre"];
    $bar = $_POST["pincho"];
    $controllerBD->borrarImagenPincho($bar, $nombre, $idImagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "guardarImagenUsuario") {
    $id = $_POST["usuario"];
    $imagen = $_FILES["imagen"];
    $controllerBD->guardarImagenUsuario($id, $imagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "eliminarImagenUsuario") {
    $idImagen = $_POST["id"];
    $nombre = $_POST["nombre"];
    $bar = $_POST["usuario"];
    $controllerBD->borrarImagenUsuario($bar, $nombre, $idImagen);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "anadirUsuario") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarañadirUsuario($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "borrarLikes") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerBD->borrarLikesDeUsuario($_POST["id"]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUltimoUsuario") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerApi->getUltimoUsuario();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "anadirPincho") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostrarañadirPincho($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUltimoPincho") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerApi->getUltimoPincho();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "anadirBar") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerSession->mostraranadirBares($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getUltimoBar") {
    $controllerSession->comprobarSession($array_ruta[0]);
    $controllerApi->getUltimoBar();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "getResenasPorUsuarioLimit") {
    $ordenacion = $_POST["ordenacion"];
    $indice = $_POST["indice"];
    $cantidad = $_POST["cantidad"];
    $id = $_POST["id"];
    $controllerApi->getResenasPorUsuarioLimit($ordenacion, $indice, $cantidad, $id);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "mostrarBaresFront") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrlistadoBaresFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loginFront") {
    $controllerSession->mostrarLoginFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "mapa") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrarMapa($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "mostrarPinchosFront") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrlistadoPinchosFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/mostrarInfoUsuarioFront/', $array_ruta[0])) {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrarInfoUsuarioFront($array_ruta[0]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "registro") {
    
    $controllerSession->mostrRegistro($array_ruta[0]);
} else if (isset($array_ruta[0]) && preg_match('/mostrarInfoBaresFront/', $array_ruta[0])) {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrarInfoBaresFront($array_ruta[0]);
}
else if (isset($array_ruta[0]) && $array_ruta[0] == "getPinchosPorBarFront") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $id = $_POST["id"];
    $controllerApi->getPinchosPorBar($id);
}else if (isset($array_ruta[0]) && preg_match('/mostrarInfoPinchosFront/', $array_ruta[0])) {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $controllerSession->mostrarInfoPinchosFront($array_ruta[0]);
}else if (isset($array_ruta[0]) && $array_ruta[0] == "getTodasResenasPorPincho") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $id = $_POST["id"];
    $controllerApi->getReseñasPorPincho($id);
}else if (isset($array_ruta[0]) && $array_ruta[0] == "anadirLikes") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $id = $_POST["id"];
    $controllerBD->anadirLikes($id);
}else if (isset($array_ruta[0]) && $array_ruta[0] == "borrarLike") {
    $controllerSession->comprobarSessionFront($array_ruta[0]);
    $id = $_POST["id"];
    $controllerBD->borrarLikes($id);
}else if (isset($array_ruta[0]) && $array_ruta[0] == "resBaresPinchos") {
    
    $token = $_POST["token"];
    $controllerApi->resBaresPinchos($token);
}

