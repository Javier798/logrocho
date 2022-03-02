<?php

class controllerApi
{
    /**
     * getBaresLimit
     * devuelve todos los bares usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getBaresLimit($ordenacion, $indice, $cantidad, $puntuacion, $puntuacionmax, $filtro)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getBaresLimit($ordenacion, $indice, $cantidad, $filtro, $puntuacion, $puntuacionmax);
        $datos = [];
        $barRes = [];
        foreach ($result as $bar) {
            $barRes["Cod_bar"] = $bar["Cod_bar"];
            $barRes["Nombre"] = $bar["Nombre"];
            $barRes["Ruta"] = $bar["ruta"];
            $barRes["Localizacion"] = $bar["Localizacion"];
            $barRes["Puntuacion"] = $bar["Puntuacion"];
            $barRes["Descripcion"] = $bar["Descripcion"];
            $barRes["Longitud"] = $bar["Longitud"];
            $barRes["Latitud"] = $bar["Latitud"];
            array_push($datos, $barRes);
        }

        echo json_encode($datos);
    }
public function imagenesMasValoradas()
{
    $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->imagenesMasValoradas();
        $datos = [];
        $barRes = [];
        foreach ($result as $bar) {
            $barRes["ruta"] = $bar["ruta"];
            array_push($datos, $barRes);
        }

        echo json_encode($datos);
    
}
public function imagenesMasVotadas()
{
    $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->imagenesMasVotadas();
        $datos = [];
        $barRes = [];
        foreach ($result as $bar) {
            $barRes["ruta"] = $bar["ruta"];
            array_push($datos, $barRes);
        }

        echo json_encode($datos);
    
}

    
    /**
     * getBares
     * devuelve todos los bares
     * @return void
     */
    function getBares()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getBares();
        $datos = [];
        foreach ($result as $bar) {
            array_push($datos, $bar);
        }
        echo json_encode($datos);
    }

    /**
     * getPinchosLimit
     * dveulve los pinchos usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getPinchosLimit($ordenacion, $indice, $cantidad, $puntuacion, $puntuacionmax, $filtro, $bar)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getPinchosLimit($ordenacion, $indice, $cantidad, $puntuacion, $puntuacionmax, $filtro, $bar);
        $datos = [];

        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["Ruta"] = $pincho["ruta"];
            $pinchoRes["NombreBar"] = $pincho["NombreBar"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }

    /**
     * getPinchosLimit
     * dveulve los pinchos usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getPinchosPorBarLimit($ordenacion, $indice, $cantidad, $id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getPinchosPorBarLimit($ordenacion, $indice, $cantidad, $id);
        $datos = [];

        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getIdBares
     *
     * @return void
     */
    public function getIdBares()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getIdBares();
        $datos = [];

        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes[$pincho["Cod_bar"]] = $pincho["Nombre"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getIdPinchos
     *
     * @return void
     */
    public function getIdPinchos()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getIdPinchos();
        $datos = [];

        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes[$pincho["Cod_pincho"]] = $pincho["Nombre"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getIdUsuarios
     *
     * @return void
     */
    public function getIdUsuarios()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getIdUsuarios();
        $datos = [];

        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes[$pincho["Cod_usuario"]] = $pincho["Nombre"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getPinchos
     * devuelve todos los pinchos
     * @return void
     */
    function getPinchos()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getPinchos();
        $datos = [];
        $pinchoRes = [];
        foreach ($result as $pincho) {
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["Ruta"] = $pincho["ruta"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getPinchoDetalle
     * devuelve los detalles del pincho
     * @param  mixed $id
     * @return void
     */
    function getPinchoDetalle($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getPinchoDetalle($id);
        $pinchoRes = [];
        $datos = [];
        foreach ($result as $pincho) {
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Ruta"] = $pincho["ruta"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["NombreBar"] = $pincho["NombreBar"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            array_push($datos, $pinchoRes);
        }
        $result = $gestor->getImagenPincho($id);
        $rutas = [];
        $ids = [];
        foreach ($result as $bar) {

            array_push($ids, $bar["Cod_img_pincho"]);
            array_push($rutas, $bar["ruta"]);
        }

        $result = $gestor->getResenasPorPincho($id);
        $reseñas = [];
        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["ruta"] = $reseña["ruta"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($reseñas, $reseñaRes);
        }
        array_push($datos, $rutas);
        array_push($datos, $ids);
        array_push($datos, $reseñas);
        echo json_encode($datos);
    }    
    /**
     * getIdUsuario
     * devuelve el id del usuario
     * @param  mixed $email
     * @return void
     */
    public function getIdUsuario($email)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result=$gestor->getIdUsuario($email);
        $datos=[];
        foreach ($result as $id) {

            return $id["Cod_usuario"];    
        }
        
    }
    /**
     * getBarDetalle
     * deveulve un bar con sus fotos y pinchos
     * @param  mixed $id
     * @return void
     */
    function getBarDetalle($id)
    {
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getBareDetalle($id);
        $barRes = [];
        $datos = [];

        foreach ($result as $bar) {
            $barRes["Cod_bar"] = $bar["Cod_bar"];
            $barRes["Nombre"] = $bar["Nombre"];
            $barRes["Localizacion"] = $bar["Localizacion"];
            $barRes["Puntuacion"] = $bar["Puntuacion"];
            $barRes["Descripcion"] = $bar["Descripcion"];
            $barRes["Longitud"] = $bar["Longitud"];
            $barRes["Latitud"] = $bar["Latitud"];
            array_push($datos, $barRes);
        }
        $result = $gestor->getImagenBar($id);
        $rutas = [];
        $ids = [];
        foreach ($result as $bar) {

            array_push($ids, $bar["Cod_img_bar"]);
            array_push($rutas, $bar["ruta"]);
        }
        array_push($datos, $rutas);
        array_push($datos, $ids);
        $pinchos = [];
        $result = $gestor->getPinchosPorBar($id);
        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            $imagenesPinchos = [];
            $imgPinmchos = $gestor->getImagenPincho($pinchoRes["Cod_pincho"]);
            foreach ($imgPinmchos as $pincho) {
                array_push($imagenesPinchos, $pincho["ruta"]);
            }
            array_push($pinchos, $imagenesPinchos);
            array_push($pinchos, $pinchoRes);
        }
        array_push($datos, $pinchos);

        echo json_encode($datos);
    }
    public function getPinchosPorBar($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getPinchosPorBar($id);
        $datos = [];
        foreach ($result as $pincho) {
            $pinchoRes = [];
            $pinchoRes["Cod_pincho"] = $pincho["Cod_pincho"];
            $pinchoRes["Nombre"] = $pincho["Nombre"];
            $pinchoRes["Descripcion"] = $pincho["Descripcion"];
            $pinchoRes["Fk_bar"] = $pincho["Fk_bar"];
            $pinchoRes["Ruta"] = $pincho["ruta"];
            $pinchoRes["Puntuacion"] = $pincho["Puntuacion"];
            array_push($datos, $pinchoRes);
        }
        echo json_encode($datos);
    }
    /**
     * getUsuarioDetalle
     * deveulve los detalles de un usuario
     * @param  mixed $id
     * @return void
     */
    function getUsuarioDetalle($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUsuarioDetalle($id);
        $usuarioRes = [];
        $datos = [];
        foreach ($result as $usuario) {
            $usuarioRes["Cod_usuario"] = $usuario["Cod_usuario"];
            $usuarioRes["Nombre"] = $usuario["Nombre"];
            $usuarioRes["Email"] = $usuario["Email"];
            $usuarioRes["Apellido"] = $usuario["Apellido"];
            $usuarioRes["Contrasena"] = $usuario["Contraseña"];
            $usuarioRes["Rol"] = $usuario["Rol"];
            array_push($datos, $usuarioRes);
        }
        $result = $gestor->getImagenUsuario($id);
        $rutas = [];
        $ids = [];
        foreach ($result as $bar) {

            array_push($ids, $bar["Cod_img_usuario"]);
            array_push($rutas, $bar["ruta"]);
        }
        array_push($datos, $rutas);
        array_push($datos, $ids);
        echo json_encode($datos);
    }
    /**
     * getUsuariosLimit
     * devuelve usuarios usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getUsuariosLimit($ordenacion, $indice, $cantidad)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUsuariosLimit($ordenacion, $indice, $cantidad);
        $datos = [];

        foreach ($result as $usuario) {
            $usuarioRes = [];
            $usuarioRes["Cod_usuario"] = $usuario["Cod_usuario"];
            $usuarioRes["Nombre"] = $usuario["Nombre"];
            $usuarioRes["Email"] = $usuario["Email"];
            $usuarioRes["Apellido"] = $usuario["Apellido"];
            $usuarioRes["Contrasena"] = $usuario["Contraseña"];
            $usuarioRes["Rol"] = $usuario["Rol"];
            array_push($datos, $usuarioRes);
        }
        echo json_encode($datos);
    }
    /**
     * getusuarios
     * devuelve todos los usuarios
     * @return void
     */
    function getusuarios()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUsuarios();
        $datos = [];

        foreach ($result as $usuario) {
            $usuarioRes = [];
            $usuarioRes["Cod_usuario"] = $usuario["Cod_usuario"];
            $usuarioRes["Nombre"] = $usuario["Nombre"];
            $usuarioRes["Email"] = $usuario["Email"];
            $usuarioRes["Apellido"] = $usuario["Apellido"];
            $usuarioRes["Contrasena"] = $usuario["Contraseña"];
            $usuarioRes["Rol"] = $usuario["Rol"];
            array_push($datos, $usuarioRes);
        }
        echo json_encode($datos);
    }
    /**
     *
     * borra la reseña
     * @param  mixed $id
     * @return void
     */
    function getUltimoUsuario()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUltimoUsuario();
        $datos = [];
        foreach ($result as $reseña) {
            $reseñaRes["max"] = $reseña["max"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }

    /**
     * bajaLike
     * borra la reseña
     * @param  mixed $id
     * @return void
     */
    function getUltimoPincho()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUltimoPincho();
        $datos = [];
        foreach ($result as $reseña) {
            $reseñaRes["max"] = $reseña["max"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }

    /**
     * bajaLike
     * borra la reseña
     * @param  mixed $id
     * @return void
     */
    function getUltimoBar()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getUltimoBar();
        $datos = [];
        foreach ($result as $reseña) {
            $reseñaRes["max"] = $reseña["max"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }

    /**
     * getRese
     * devuelve los detalles de una reseña
     * @param  mixed $id
     * @return void
     */
    function getReseñasDetalle($id, $codUsu)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getReseñaDetalle($id, $codUsu);
        $reseñaRes = [];
        $datos = [];
        foreach ($result as $reseña) {
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["likes"] = $reseña["likes"];
            $reseñaRes["ruta"] = $reseña["ruta"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }
    /**
     * getRese
     * devuelve reseñas usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getReseñasLimit($ordenacion, $indice, $cantidad)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenasLimit($ordenacion, $indice, $cantidad);
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["likes"] = $reseña["likes"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }
    /**
     * getRese
     * devuelve reseñas usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getReseñasPorPinchoLimit($ordenacion, $indice, $cantidad, $id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenasPorBarLimit($ordenacion, $indice, $cantidad, $id);
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }

    /**
     * getRese
     * devuelve reseñas usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getReseñasPorPincho($id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenasPorPincho($id);
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["ruta"] = $reseña["ruta"];
            $reseñaRes["likes"] = $reseña["likes"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }
    
    /**
     * getResenasPorUsuarioLikeLimit
     * devuelve las reseñas a las que el usuario les ha dado like
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    function getResenasPorUsuarioLikeLimit($ordenacion, $indice, $cantidad, $id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenasPorUsuarioLikeLimit($ordenacion, $indice, $cantidad, $id);
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["likesUsuario"] = $reseña["likesUsuario"];
            $reseñaRes["ruta"] = $reseña["ruta"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }

    /**
     * getRese
     * devuelve reseñas usando limit
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    function getResenasPorUsuarioLimit($ordenacion, $indice, $cantidad, $id)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenasPorUsuarioLimit($ordenacion, $indice, $cantidad, $id);
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["likes"] = $reseña["likes"];
            $reseñaRes["likesUsuario"] = $reseña["likesUsuario"];
            $reseñaRes["ruta"] = $reseña["ruta"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }
        
    /**
     * resBaresPinchos
     * devuelve las reseñas por pincho
     * @param  mixed $token
     * @return void
     */
    public function resBaresPinchos($token)
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->buscarPinchosBares($token);
        $datos = [];
        foreach ($result as $reseña) {
            array_push($datos, $reseña);
        }
        echo json_encode($datos);
    }
    /**
     * getReseñas
     * devuelve todas las reseñas
     * @return void
     */
    function getReseñas()
    {
        $gestor = new bd(Conexion::getConexion(host, bdname, user, password));
        $result = $gestor->getResenas();
        $datos = [];

        foreach ($result as $reseña) {
            $reseñaRes = [];
            $reseñaRes["Cod_resena"] = $reseña["Cod_reseña"];
            $reseñaRes["Mensaje"] = $reseña["Mensaje"];
            $reseñaRes["Valoracion"] = $reseña["Valoracion"];
            $reseñaRes["Fk_pinchos"] = $reseña["Fk_pinchos"];
            $reseñaRes["Fk_usuarios"] = $reseña["Fk_usuarios"];
            array_push($datos, $reseñaRes);
        }
        echo json_encode($datos);
    }
}
