<?php
class controllerBD
{    
    /**
     * altaBares
     * aniade bares
     * @param  mixed $nombre
     * @param  mixed $localizacion
     * @param  mixed $puntuacion
     * @param  mixed $descripcion
     * @return void
     */
    function altaBares($nombre, $localizacion,$puntuacion,$descripcion,$longitud,$latitud)
    {
        $arrayFiltros = [
            "nombre" => "'" . $nombre . "'",
            "localizacion" => "'" . $localizacion . "'",
            "puntuacion" => "'" . $puntuacion . "'",
            "descripcion" => "'" . $descripcion . "'",
            "longitud" => "" . $longitud . "",
            "latitud" => "" . $latitud . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->altaBares($arrayFiltros);
    }    
    /**
     * bajaBares
     * borra los bares
     * @param  mixed $id
     * @return void
     */
    function bajaBares($id)
    {

        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaBares($id);
    }
    public function anadirLikes($idResenia)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->aniadirLike($idResenia);
    }
    /**
     * bajaPincho
     * borra pincho
     * @param  mixed $id
     * @return void
     */
    function bajaPincho($id)
    {

        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaPincho($id);
    }
    /**
     * borra los likes del usuario
     * @param  mixed $id
     * @return void
     */
    function borrarLikesDeUsuario($id)
    {

        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->borrarLikesDeUsuario($id);
    }
    /**
     * modificarBares
     * modifica los bares
     * @param  mixed $nombre
     * @param  mixed $localizacion
     * @param  mixed $puntuacion
     * @param  mixed $descripcion
     * @param  mixed $id
     * @return void
     */
    function modificarBares($nombre, $localizacion,$puntuacion,$descripcion,$longitud,$latitud,$id)
    {
        $arrayFiltros = [];
        if($nombre!=""){
            $arrayFiltros["nombre="]="'".$nombre."'";
        }
        if($localizacion!=""){
            $arrayFiltros["localizacion="]="'".$localizacion."'";
        }
        if($puntuacion!=""){
            $arrayFiltros["puntuacion="]="'".$puntuacion."'";
        }
        if($descripcion!=""){
            $arrayFiltros["descripcion="]="'".$descripcion."'";
        }
        if($longitud!=""){
            $arrayFiltros["longitud="]="'".str_replace(array(".",","), '', $longitud)."'";
        }
        if($latitud!=""){

            $arrayFiltros["latitud="]="'".str_replace(array(".",","), '', $latitud)."'";
        }
        if(!empty($arrayFiltros)){
            $arrayFiltros[" where Cod_bar="]=$id;
        }
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->modificaBares($arrayFiltros);
    }
    
    /**
     * modificarPinchos
     * modifica los pinchos
     * @param  mixed $nombre
     * @param  mixed $descripcion
     * @param  mixed $puntuacion
     * @param  mixed $bar
     * @param  mixed $id
     * @return void
     */
    function modificarPinchos($nombre, $descripcion,$puntuacion,$bar,$id)
    {
        
        $arrayFiltros = [];
        if($nombre!=""){
            $arrayFiltros["Nombre="]="'".$nombre."'";
        }
        if($bar!=""){
            $arrayFiltros["Fk_bar="]="'".$bar."'";
        }
        if($puntuacion!=""){
            $arrayFiltros["Puntuacion="]="'".$puntuacion."'";
        }
        if($descripcion!=""){
            $arrayFiltros["Descripcion="]="'".$descripcion."'";
        }
        if(!empty($arrayFiltros)){
            $arrayFiltros[" where Cod_pincho="]=$id;
        }
       
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->modificaPinchos($arrayFiltros);
    }
    
    /**
     * altaPinchos
     * aniade pinchos
     * @param  mixed $nombre
     * @param  mixed $descripcion
     * @param  mixed $puntuacion
     * @param  mixed $bar
     * @return void
     */
    function altaPinchos($nombre, $descripcion,$puntuacion,$bar)
    {
        $arrayFiltros = [
            "nombre" => "'" . $nombre . "'",
            "descripcion" => "'" . $descripcion . "'",
            "puntuacion" => "" . $puntuacion . "",
            "bar" => "" . $bar . "",

        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->altaPinchos($arrayFiltros);
    }    
    /**
     * altaUsuarios
     * aniade usuarios
     * @param  mixed $nombre
     * @param  mixed $apellidos
     * @param  mixed $contrasena
     * @param  mixed $rol
     * @return void
     */
    function altaUsuarios($nombre,$email, $apellidos,$contrasena,$rol)
    {
        $arrayFiltros = [
            "nombre" => "'" . $nombre . "'",
            "email" => "'" . $email . "'",
            "apellido" => "'" . $apellidos . "'",
            "contrasenia" => "'" . $contrasena . "'",
            "rol" => "'" . $rol . "'",


        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->altaUsuarios($arrayFiltros);
    }    
    /**
     * bajaUsuarios
     * borra usuarios
     * @param  mixed $id
     * @return void
     */
    function bajaUsuarios($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaUsuarios($id);
        if($id==$_SESSION["codigo_usuaraio"]){
            session_destroy();    
        }
        
    }    
    /**
     * modificarUsuarios
     * modifica usuarios
     * @param  mixed $nombre
     * @param  mixed $apellido
     * @param  mixed $contrasena
     * @param  mixed $rol
     * @param  mixed $id
     * @return void
     */
    function modificarUsuarios($nombre,$email, $apellido,$contrasena,$rol,$id)
    {
        
        $arrayFiltros = [];
        if($nombre!=""){
            $arrayFiltros["Nombre="]="'".$nombre."'";
        }
        if($apellido!=""){
            $arrayFiltros["apellido="]="'".$apellido."'";
        }
        if($contrasena!=""){
            $arrayFiltros["contrasena="]="'".$contrasena."'";
        }
        if($rol!=""){
            $arrayFiltros["rol="]="'".$rol."'";
        }
        if($email!=""){
            $arrayFiltros["email="]="'".$email."'";
        }
        if(!empty($arrayFiltros)){
            $arrayFiltros[" where Cod_usuario="]=$id;
        }
       
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->modificaUsuarios($arrayFiltros);
    }    
    /**
     * altaResena
     * aniade una resenia
     * @param  mixed $mensaje
     * @param  mixed $valoracion
     * @param  mixed $Fk_pinchos
     * @param  mixed $Fk_usuarios
     * @return void
     */
    function altaResena($mensaje,$valoracion,$Fk_pinchos,$Fk_usuarios)
    {
        $arrayFiltros = [
            "mensaje" => "'" . $mensaje . "'",
            "valoracion" => "" . $valoracion . "",
            "Fk_pinchos" => "" . $Fk_pinchos . "",
            "Fk_usuarios" => "" . $Fk_usuarios . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->altaResenas($arrayFiltros);
    }    
    /**
     * bajaResenas
     * borra la resenia
     * @param  mixed $id
     * @return void
     */
    function bajaResenas($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaResenas($id);
    }    
    /**
     * modificarRsena modifica la resenia
     *
     * @param  mixed $mensaje
     * @param  mixed $valoracion
     * @param  mixed $id
     * @return void
     */
    function modificarRsena($mensaje, $valoracion,$id)
    {
        $arrayFiltros = [];
        if($mensaje!=""){
            $arrayFiltros["mensaje="]="'".$mensaje."'";
        }
        if($valoracion!=""){
            $arrayFiltros["valoracion="]="'".$valoracion."'";
        }
        
        if(!empty($arrayFiltros)){
            $arrayFiltros[" where Cod_resenia="]=$id;
        }
       
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->modificaResenas($arrayFiltros);
    }

    /**
     * aniade un like
     *
     * @param  mixed $fkResenias
     * @param  mixed $fkusuario
     * @return void
     */
    function aniadirLike($fkResenias, $fkusuario)
    {
        
        $arrayFiltros = [
            "Fk_resenia" => "" . $fkResenias . "",
            "Fk_usuario" => "" . $fkusuario . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->altaResenas($arrayFiltros);
    }
    /**
     * bajaLike
     * borra la resenia
     * @param  mixed $id
     * @return void
     */
    function bajaLike($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaResenas($id);
    }

        
    /**
     * guardarImagenBar
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @return void
     */
    public function guardarImagenBar($id,$imagen)
    {
        $ruta ="https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_bar/".$id."/".$imagen["name"];

        if (!file_exists("View/img/img_bar/".$id)) {
            mkdir("./View/img/img_bar/".$id, 0777, true);
        }
        if (!file_exists("./View/img/img_bar/".$id."/".$imagen["name"])) {
            
            move_uploaded_file($imagen["tmp_name"], "./View/img/img_bar/".$id."/".$imagen["name"]);
        }
        
        $arrayFiltros = [
            "ruta" => "'" . $ruta . "'",
            "Fk_bar" => "" . $id . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->aniadeImagenBar($arrayFiltros);
    }
    
    /**
     * guardarImagenUsuario
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @return void
     */
    public function guardarImagenUsuario($id,$imagen)
    {
        $ruta ="https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_usuario/".$id."/".$imagen["name"];

        if (!file_exists("View/img/img_usuario/".$id)) {
            mkdir("./View/img/img_usuario/".$id, 0777, true);
        }
        if (!file_exists("./View/img/img_usuario/".$id."/".$imagen["name"])) {
            
            move_uploaded_file($imagen["tmp_name"], "./View/img/img_usuario/".$id."/".$imagen["name"]);
        }
        
        $arrayFiltros = [
            "ruta" => "'" . $ruta . "'",
            "Fk_usuario" => "" . $id . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->aniadeImagenUsuario($arrayFiltros);
    }
    
    /**
     * borrarImagenBar
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @param  mixed $idImg
     * @return void
     */
    public function borrarImagenBar($id,$imagen,$idImg)
    {
        $ruta ="'https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_bar/".$id."/".$imagen."'";
        if (file_exists("./View/img/img_bar/".$id."/".$imagen)) {
            unlink("./View/img/img_bar/".$id."/".$imagen);
        }
        
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaImnagenBar($id,$ruta);
    }
    
    /**
     * guardarImagenPincho
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @return void
     */
    public function guardarImagenPincho($id,$imagen)
    {
        $ruta ="https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_pincho/".$id."/".$imagen["name"];

        if (!file_exists("View/img/img_pincho/".$id)) {
            mkdir("./View/img/img_pincho/".$id, 0777, true);
        }
        if (!file_exists("./View/img/img_pincho/".$id."/".$imagen["name"])) {
            
            move_uploaded_file($imagen["tmp_name"], "./View/img/img_pincho/".$id."/".$imagen["name"]);
        }
        
        $arrayFiltros = [
            "ruta" => "'" . $ruta . "'",
            "Fk_pincho" => "" . $id . "",
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->aniadeImagenPincho($arrayFiltros);
    }    
    /**
     * borrarImagenPincho
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @param  mixed $idImg
     * @return void
     */
    public function borrarImagenPincho($id,$imagen,$idImg)
    {
        $ruta ="'https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_pincho/".$id."/".$imagen."'";
        if (file_exists("./View/img/img_pincho/".$id."/".$imagen)) {
            
            unlink("./View/img/img_pincho/".$id."/".$imagen);
        }
        
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaImnagenPincho($id,$ruta);
    }
    
    /**
     * borrarImagenUsuario
     *
     * @param  mixed $id
     * @param  mixed $imagen
     * @param  mixed $idImg
     * @return void
     */
    public function borrarImagenUsuario($id,$imagen,$idImg)
    {
        $ruta ="'https://franciscojavier.ociobinario.com/dwes/PruebaProyecto/View/img/img_usuario/".$id."/".$imagen."'";
        if (file_exists("./View/img/img_usuario/".$id."/".$imagen)) {
            
            unlink("./View/img/img_usuario/".$id."/".$imagen);
        }
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->bajaImnagenUsuario($id,$ruta);
    }
    public function borrarLikes($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $gestor->borrarLike($id);
    }
}
