<?php
const host = "localhost";
const bdname = "franciscojaviero_logrocho";
const user = "franciscojaviero_franciscojaviero";
const password = "vesper!2021";
class controllerSesion
{
    
    /**
     * login
     * muestra el login
     * @param  mixed $respuesta
     * @return void
     */
    public function login($respuesta)
    {
        $accion =  $this->getRuta("/comprobarlogin", "/login");
        require("View/login.php");
    }    
    /**
     * is_valid_email
     * comprueba si el email es valido
     * @param  mixed $str
     * @return void
     */
    function is_valid_email($str)
    {
        return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
    }    
    /**
     * comprobarLogin
     * comprueba si el login es correcto
     * @param  mixed $nombre
     * @param  mixed $contrase
     * @return void
     */
    function comprobarLogin($nombre, $contrasenia)
    {
        
        $apiController = new controllerApi();
        if(!$this->is_valid_email($nombre)){
            $_SESSION["respuestaLogin"] ="introduzca un email valido";
            header('Location: ' . $this->getRuta("/login", "/comprobarlogin"));
            return;
        }
        $ruta = $this->getRuta("/login", "/comprobarlogin");
        //echo $ruta_hasta_frontal;
        if (empty($nombre) || empty($contrasenia)) {
            $respuesta = "Introduzca ambos campos";
            $_SESSION["respuestaLogin"] = $respuesta;
            header("Location: " . $ruta);
            return;
        }

        $arrayFiltros = [
            "Email=" => "'" . $nombre . "'",
            "Contrasenia=" => "sha1('" . $contrasenia . "')"
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
       

        $resultado = $gestor->obtenerLogin($arrayFiltros);
       
        if ($resultado->rowCount() == 0) {
            $respuesta = "Usuario o contrasenia incorrectos";
            $_SESSION["respuestaLogin"] = $respuesta;
            header("Location: ".$ruta);
            return;
        } else {
            
            $_SESSION["usuario"] = $nombre;
            $_SESSION["codigo_usuaraio"]=$apiController->getIdUsuario($nombre);
            header("Location: " . $this->getRuta("/listadoBares", "/comprobarlogin"));
           // var_dump($this->getRuta("/listadoBares", "/comprobarlogin"));
            return;
        }
    }
    /**
     * comprobarLogin
     * comprueba si el login es correcto
     * @param  mixed $nombre
     * @param  mixed $contrase
     * @return void
     */
    function comprobarLoginFront($nombre, $contrasenia)
    {
        $apiController = new controllerApi();
        if(!$this->is_valid_email($nombre)){
            $_SESSION["respuestaLogin"] ="introduzca un email valido";
            header('Location: ' . $this->getRuta("/loginFront", "/comprobarloginFront"));
            return;
        }
        $ruta = $this->getRuta("/loginFront", "/comprobarloginFront");
        //echo $ruta_hasta_frontal;
        if (empty($nombre) || empty($contrasenia)) {
            $respuesta = "Introduzca ambos campos";
            $_SESSION["respuestaLogin"] = $respuesta;
            header("Location: " . $ruta);
            return;
        }

        $arrayFiltros = [
            "Email=" => "'" . $nombre . "'",
            "Contrasenia=" => "sha1('" . $contrasenia . "')"
        ];
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));

        $resultado = $gestor->obtenerLogin($arrayFiltros);
        if ($resultado->rowCount() == 0) {
            $respuesta = "Usuario o contrasenia incorrectos";
            $_SESSION["respuestaLogin"] = $respuesta;
            header("Location: ".$ruta);
            return;
        } else {
            $_SESSION["usuario"] = $nombre;
            $_SESSION["codigo_usuaraio"]=$apiController->getIdUsuario($nombre);
            
            header("Location: " . $this->getRuta("/home", "/comprobarloginFront"));
            return;
        }
    }
    /**
     * mostrarBares
     * muestra los bares
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarBares($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/listadoBares.php");
    }    
    /**
     * mostrarPinchos
     * muestra los pinchos
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarPinchos($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("contacto",$accionActual);
        $logOut= $this->getRuta("logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/listadoPinchos.php");
    }    
    /**
     * mostrarResenas
     * muetra las resenias
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarResenas($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/listadoResenas.php");
    }    
    /**
     * mostrarUsuarios
     * muestra los usuarios
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarUsuarios($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/listadoUsuarios.php");
    }    
    /**
     * mostrarInfoBares
     * muestra la ifnormacion de los bares
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoBares($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/infoBares.php");
    }
    /**
     * mostrarInfoBares
     * muestra la ifnormacion de los bares
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoBaresFront($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/infoBaresFront.php");
    }
    /**
     * mostrarInfoBares
     * muestra la ifnormacion de los bares
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoPinchosFront($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/infoPinchosFront.php");
    }
    /**
     * mostrarInfoUsuarios
     * muestra la informacion de los usuarios
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoUsuarios($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/infoUsuarios.php");
    }    
    /**
     * mostrarAniadirUsuario
     * muestra la informacion de los usuarios
     * @param  mixed $accionActual
     * @return void
     */
    public function mostraraniadirUsuario($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/aniadirUsuario.php");
    }      
    /**
     * mostraranadirBares
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostraranadirBares($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/aniadirBar.php");
    }      
    /**
     * mostrlistadoBaresFront
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrlistadoBaresFront($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/listadoBaresFront.php");
    }      
    /**
     * mostrlistadoPinchosFront
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrlistadoPinchosFront($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/listadoPinchosFront.php");
    }      
    /**
     * mostrRegistro
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrRegistro($accionActual)
    {
        
        require("View/registro.php");
    }      
    /**
     * mostrarInfoUsuarioFront
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoUsuarioFront($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/infoUsuarioFront.php");
    }
        
    /**
     * mostraraniadirPincho
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostraraniadirPincho($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/aniadirPincho.php");
    }    
    /**
     * mostrarLoginFront
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarLoginFront($accionActual)
    {
        $registro =$this->getRuta("/registro",$accionActual);
        $accion =  $this->getRuta("/comprobarloginFront", $accionActual);
        require("View/loginFront.php");
    }

    
    /**
     * mostrarContacto
     * muestra el contacto
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarContacto($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/contacto.php");
    }    
    /**
     * mostrarInfoPinchos
     * muestra la informacion de los pinchos
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoPinchos($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/infoPinchos.php");
    }    
    /**
     * mostrarInfoRese
     * muestra la informacion de la resenia
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarInfoResenia($accionActual)
    {
        $usuarios = $this->getRuta("/listadoUsuarios",$accionActual);
        $resenias= $this->getRuta("/listadoResenas",$accionActual);
        $pinchos= $this->getRuta("/listadoPinchos",$accionActual);
        $bares= $this->getRuta("/listadoBares",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOut",$accionActual);
        $error404=$this->getRuta("error404",$accionActual);
        $error500=$this->getRuta("error500",$accionActual);
        require("View/infoResena.php");
    }
    /**
     * mostrarError404
     * muestra la pagina de error
     * @return void
     */
    public function mostrarError404()
    {
        require("View/error404.php");
    }
    /**
     * mostrarError404
     * muestra la pagina de error
     * @return void
     */
    public function mostrarError500()
    {
        require("View/error500.php");
    }    
    /**
     * cambiarContrasena
     * muestra el cambio de la contrasenia
     * @return void
     */
    public function cambiarContrasena()
    {
        require("View/cambiarContrasena.php");
    }    
    /**
     * comprobarSession
     * comprueba las sesiones
     * @param  mixed $accionActual
     * @return void
     */
    function comprobarSession($accionActual)
    {

        if (!isset($_SESSION["usuario"])) {
            header('Location: ' . $this->getRuta("/login", $accionActual));
            return;
        }
    }
    /**
     * comprobarSession
     * comprueba las sesiones
     * @param  mixed $accionActual
     * @return void
     */
    function comprobarSessionFront($accionActual)
    {

        if (!isset($_SESSION["usuario"])) {
            header('Location: ' . $this->getRuta("/loginFront", $accionActual));
            return;
        }
    }
    /**
     * logOut
     * cierra la sesion
     * @param  mixed $accionActual
     * @return void
     */
    public function logOut($accionActual)
    {
        session_destroy();
        header("Location: ".$this->getRuta("/login",$accionActual));
    }
    /**
     * logOut
     * cierra la sesion
     * @param  mixed $accionActual
     * @return void
     */
    public function logOutFront($accionActual)
    {
        session_destroy();
        header("Location: ".$this->getRuta("/loginFront",$accionActual));
    }    
    /**
     * home
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function home($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/home.php");
    }    
    /**
     * mostrarMapa
     *
     * @param  mixed $accionActual
     * @return void
     */
    public function mostrarMapa($accionActual)
    {
        $bares= $this->getRuta("/mostrarBaresFront",$accionActual);
        $contacto= $this->getRuta("/contacto",$accionActual);
        $logOut= $this->getRuta("/logOutFront",$accionActual);
        $mapa= $this->getRuta("/mapa",$accionActual);
        $home= $this->getRuta("/home",$accionActual);
        $perfil= $this->getRuta("/mostrarInfoUsuarioFront?id=".$_SESSION["codigo_usuaraio"],$accionActual);
        $pinchos= $this->getRuta("/mostrarPinchosFront",$accionActual);
        require("View/mapa.php");
    }
    /**
     * getRuta
     * crea una ruta
     * @param  mixed $accionDestino
     * @param  mixed $accionActual
     * @return void
     */
    static function getRuta($accionDestino, $accionActual)
    {
        //$rutaActual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $rutaActual = "/dwes/PruebaProyecto/index.php";
        $ruta = str_replace($accionActual, "", $rutaActual);
        $accion =  $ruta . $accionDestino;
        return $accion;
    }
}

