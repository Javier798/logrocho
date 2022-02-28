<?php


/**
 * Clase de gestion de libros
 */
class bd
{

    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    /**
     * obtenerLogin
     *
     * @param  mixed $array
     * @return void
     */
    function obtenerLogin($array)
    {
        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 1) {
                $sentencia = $sentencia . " AND ";
            }
            $contador++;
        }
        $sql = "SELECT * FROM `usuarios` WHERE $sentencia;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    public function buscarPinchosBares($token)
    {
        $sql = "select * from bares b, pinchos p WHERE b.Nombre LIKE '%".$token."%' OR b.Descripcion LIKE '%".$token."%' or p.Nombre LIKE '%".$token."%' or p.Descripcion LIKE '%".$token."%'";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    /**
     * getIdBares
     *
     * @return void
     */
    public function getIdBares()
    {

        $sql = "SELECT Cod_bar,Nombre FROM `bares`;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    /**
     * getIdPinchos
     *
     * @return void
     */
    public function getIdPinchos()
    {

        $sql = "SELECT Cod_pincho,Nombre FROM `pinchos`;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    /**
     * getIdUsuarios
     *
     * @return void
     */
    public function getIdUsuarios()
    {

        $sql = "SELECT Cod_usuario,Nombre FROM `usuarios`;";
        $libros = $this->conexion->query($sql);
        return $libros;
    }
    /**
     * altaBares
     *
     * @param  mixed $array
     * @return void
     */
    public function altaBares($array)
    {
        try {

            $sql = "INSERT INTO `bares`(`Nombre`, `Localizacion`, `Puntuacion`,`Descripcion`,`Longitud`,`Latitud`) VALUES ($array[nombre],$array[localizacion],$array[puntuacion],$array[descripcion],$array[longitud],$array[latitud]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Pincho dado de alta correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     *get id usuario 
     *
     * @param  mixed $array
     * @return void
     */
    public function altaPinchos($array)
    {
        try {

            $sql = "INSERT INTO `pinchos`(`Nombre`, `Descripcion`, `Puntuacion`, `Fk_bar`) VALUES ($array[nombre],$array[descripcion],$array[puntuacion],$array[bar]);";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * altaPinchos
     *
     * @param  mixed $array
     * @return void
     */
    public function getIdUsuario($email)
    {
        try {

            $sql = "select Cod_usuario from usuarios where Email='" . $email . "';";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * bajaBares
     *
     * @param  mixed $id
     * @return void
     */
    public function bajaBares($id)
    {
        try {
            $sql = "DELETE FROM `bares` WHERE Cod_bar=$id";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Bar dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * bajaPincho
     *
     * @param  mixed $id
     * @return void
     */
    public function bajaPincho($id)
    {
        try {
            $sql = "DELETE FROM `pinchos` WHERE Cod_pincho=$id";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Pincho dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * bajaUsuarios
     *
     * @param  mixed $id
     * @return void
     */
    public function bajaUsuarios($id)
    {
        try {
            $sql = "DELETE FROM `Usuarios` WHERE Cod_usuario=$id";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Usuario dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * modificaBares
     *
     * @param  mixed $array
     * @return void
     */
    public function modificaBares($array)
    {
        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 2) {
                $sentencia = $sentencia . ", ";
            }
            $contador++;
        }
        $sql = "UPDATE `bares` SET " . $sentencia;
        $result = $this->conexion->query($sql);
        if ($result) {
            echo "Bar modificado correctamente.";
        }
        return $result;
    }
    /**
     * modificaPinchos
     *
     * @param  mixed $array
     * @return void
     */
    public function modificaPinchos($array)
    {
        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 2) {
                $sentencia = $sentencia . ", ";
            }
            $contador++;
        }
        $sql = "UPDATE `pinchos` SET " . $sentencia;

        $result = $this->conexion->query($sql);
        if ($result) {
            echo "Pincho modificado correctamente.";
        }
        return $result;
    }

    /**
     * getBaresLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    public function getBaresLimit($ordenacion, $indice, $cantidad, $filtro, $puntuacion, $puntuacionMax)
    {
        $sql = "select Cod_bar,Nombre,Descripcion,Localizacion,Longitud,Latitud,
        COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos IN(SELECT cod_pincho from pinchos WHERE Fk_bar=Cod_bar)),1),0) as Puntuacion,
        (SELECT ruta from imagenes_bar WHERE Fk_bar=Cod_bar Limit 1) as ruta FROM bares 
        where Nombre LIKE '%" . $filtro . "%' OR Localizacion LIKE '%" . $filtro . "%' AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos IN(SELECT cod_pincho from pinchos WHERE Fk_bar=Cod_bar)),1),0)>=" . $puntuacion . "
         AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos IN(SELECT cod_pincho from pinchos WHERE Fk_bar=Cod_bar)),1),0)<=" . $puntuacionMax . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getBares
     *
     * @return void
     */
    public function getBares()
    {
        $sql = "select Cod_bar,Nombre,Descripcion,Localizacion,Longitud,Latitud,TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos IN(SELECT cod_pincho from pinchos WHERE Fk_bar=Cod_bar)),1) as Puntuacion,(SELECT ruta from imagenes_bar WHERE Fk_bar=Cod_bar Limit 1) as ruta FROM bares";
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getBareDetalle
     *
     * @param  mixed $id
     * @return void
     */
    public function getBareDetalle($id)
    {
        $sql = "select Cod_bar,Nombre,Descripcion,Localizacion,Longitud,Latitud,TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos IN(SELECT cod_pincho from pinchos WHERE Fk_bar=" . $id . ")),1) as Puntuacion FROM bares where Cod_bar =" . $id;
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getPinchosLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    public function getPinchosLimit($ordenacion, $indice, $cantidad, $puntuacion, $puntuacionmax, $filtro, $bar)
    {
        if (!preg_match('/[0-9]/', $bar)) {
            $sql = "select Cod_pincho,Nombre,Descripcion,(SELECT Nombre from bares where Fk_bar =Cod_bar) as NombreBar,Fk_bar,
            COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0) as Puntuacion,
            (SELECT ruta from imagenes_pincho WHERE Fk_pincho=Cod_pincho Limit 1) as ruta FROM pinchos 
            where Nombre LIKE '%" . $filtro . "%' OR (SELECT Nombre from bares where Fk_bar =Cod_bar) Like '%" . $filtro . "%' AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0)>=" . $puntuacion . "
             AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0)<=" . $puntuacionmax . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        } else {
            $sql = "select Cod_pincho,Nombre,Descripcion,(SELECT Nombre from bares where Fk_bar =Cod_bar) as NombreBar,Fk_bar,
        COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0) as Puntuacion,
        (SELECT ruta from imagenes_pincho WHERE Fk_pincho=Cod_pincho Limit 1) as ruta FROM pinchos 
        where Nombre LIKE '%" . $filtro . "%' AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0)>=" . $puntuacion . "
         AND COALESCE(TRUNCATE((Select avg(Valoracion) from reseña where Fk_pinchos =Cod_pincho),1),0)<=" . $puntuacionmax . " AND Fk_bar=" . $bar . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        }
        $result = $this->conexion->query($sql);

        return $result;
    }

    /**
     * getPinchosPorBarLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getPinchosPorBarLimit($ordenacion, $indice, $cantidad, $id)
    {
        $sql = "SELECT * FROM pinchos" . " where Fk_bar=" . $id . " " . $ordenacion .  " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getPinchosPorBar
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getPinchosPorBar($id)
    {
        $sql = "SELECT *,(SELECT ruta from imagenes_pincho WHERE Fk_pincho=Cod_pincho Limit 1) as ruta FROM pinchos" . " where Fk_bar=" . $id;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getPinchos
     *
     * @return void
     */
    public function getPinchos()
    {
        $sql = "SELECT *,(SELECT ruta from imagenes_pincho ip WHERE ip.Fk_pincho=p.Cod_pincho Limit 1) as ruta FROM pinchos p ";
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getPinchoDetalle
     *
     * @param  mixed $id
     * @return void
     */
    public function getPinchoDetalle($id)
    {
        $sql = "SELECT *,(SELECT ruta from imagenes_pincho ip WHERE ip.Fk_pincho=p.Cod_pincho Limit 1) as ruta,(SELECT Nombre from bares where Fk_bar =Cod_bar) as NombreBar FROM pinchos p where Cod_pincho=" . $id;
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getUsuarioDetalle
     *
     * @param  mixed $id
     * @return void
     */
    public function getUsuarioDetalle($id)
    {
        $sql = "SELECT * FROM usuarios where Cod_usuario=" . $id;
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getUsuariosLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    public function getUsuariosLimit($ordenacion, $indice, $cantidad)
    {
        $sql = "SELECT * FROM usuarios" . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getUsuarios
     *
     * @return void
     */
    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * altaUsuarios
     *
     * @param  mixed $array
     * @return void
     */
    public function altaUsuarios($array)
    {
        try {

            $sql = "INSERT INTO `Usuarios`(`Nombre`,`Email`, `Apellido`, `Contraseña`, `Rol`) VALUES ($array[nombre],$array[email],$array[apellido],sha1($array[contraseña]),$array[rol]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * modificaUsuarios
     *
     * @param  mixed $array
     * @return void
     */
    public function modificaUsuarios($array)
    {
        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 2) {
                $sentencia = $sentencia . ", ";
            }
            $contador++;
        }
        $sql = "UPDATE `usuarios` SET " . $sentencia;

        $result = $this->conexion->query($sql);
        if ($result) {
            echo "Usuario modificado correctamente.";
        } else {
            echo "Error.";
        }
        return $result;
    }
    /**
     * getRese
     *
     * @param  mixed $id
     * @param  mixed $codUsu
     * @return void
     */
    public function getReseñaDetalle($id, $codUsu)
    {
        $sql = "SELECT *,(SELECT COUNT(*) from likes WHERE Fk_reseña=r.Cod_reseña) As likes,(select ruta from imagenes_usuario i where i.Fk_usuario=$codUsu) as ruta FROM reseña r where Cod_reseña=" . $id;
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * getResenasLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @return void
     */
    public function getResenasLimit($ordenacion, $indice, $cantidad)
    {
        $sql = "SELECT *,(SELECT COUNT(*) from likes WHERE Fk_reseña=r.Cod_reseña) As likes FROM reseña r" . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getResenasPorBarLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getResenasPorBarLimit($ordenacion, $indice, $cantidad, $id)
    {
        $sql = "SELECT * FROM reseña" . " " . "where Fk_pinchos=" . $id . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getResenasPorBarLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getResenasPorPincho($id)
    {
        $sql = "SELECT *,(SELECT COUNT(*) from likes where Fk_usuario=".$_SESSION["codigo_usuaraio"]." and fk_reseña=Cod_reseña) as likes,(SELECT ruta from imagenes_usuario where fk_usuario=Fk_usuarios) as ruta FROM reseña where Fk_pinchos=$id order by (SELECT COUNT(*) from likes where Cod_reseña=Fk_reseña) DESC";
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getResenasPorUsuarioLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getResenasPorUsuarioLikeLimit($ordenacion, $indice, $cantidad, $id)
    {
        $sql = "SELECT *,(SELECT ruta from imagenes_usuario where fk_usuario=Fk_usuarios) as ruta,(SELECT ruta from imagenes_usuario where fk_usuario=Fk_usuarios) as ruta,(SELECT COUNT(*) from likes where Fk_usuario=".$_SESSION["codigo_usuaraio"]." and fk_reseña=Cod_reseña) as likesUsuario FROM reseña r where r.Cod_reseña IN (SELECT Fk_reseña from likes l WHERE l.Fk_usuario=$id) " .  $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }

    /**
     * getResenasPorUsuarioLimit
     *
     * @param  mixed $ordenacion
     * @param  mixed $indice
     * @param  mixed $cantidad
     * @param  mixed $id
     * @return void
     */
    public function getResenasPorUsuarioLimit($ordenacion, $indice, $cantidad, $id)
    {
        $sql = "SELECT *,(SELECT ruta from imagenes_usuario where fk_usuario=Fk_usuarios) as ruta,(SELECT COUNT(*) from likes where Fk_usuario=".$_SESSION["codigo_usuaraio"]." and fk_reseña=Cod_reseña) as likesUsuario,(SELECT COUNT(*) from likes WHERE Fk_reseña=r.Cod_reseña) As likes FROM reseña r" . " " . "where r.Fk_usuarios=" . $id . " " . $ordenacion . " LIMIT " . $indice . "," . $cantidad;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * borrarLikesDeUsuario
     *
     * @param  mixed $id
     * @return void
     */
    public function borrarLikesDeUsuario($id)
    {
        $sql = "DELETE FROM `likes` WHERE Fk_usuario=" . $id;
        $result = $this->conexion->query($sql);

        return $result;
    }
    /**
     * getResenas
     *
     * @return void
     */
    public function getResenas()
    {
        $sql = "SELECT * FROM reseña";
        $result = $this->conexion->query($sql);
        return $result;
    }
    /**
     * altaResenas
     *
     * @param  mixed $array
     * @return void
     */
    public function altaResenas($array)
    {
        try {

            $sql = "INSERT INTO `reseña`(`Mensaje`,`Valoracion`,`Fk_pinchos`,`Fk_usuarios`) VALUES ($array[mensaje],$array[valoracion],$array[Fk_pinchos],$array[Fk_usuarios]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dada de alta correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * a
     *
     * @param  mixed $array
     * @return void
     */
    public function añadeImagenBar($array)
    {
        try {

            $sql = "INSERT INTO `imagenes_bar`(`ruta`,`Fk_bar`) VALUES ($array[ruta],$array[Fk_bar]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dada de alta correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * a
     *
     * @param  mixed $array
     * @return void
     */
    public function añadeImagenUsuario($array)
    {
        try {

            $sql = "INSERT INTO `imagenes_usuario`(`ruta`,`Fk_usuario`) VALUES ($array[ruta],$array[Fk_usuario]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dada de alta correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * a
     *
     * @param  mixed $array
     * @return void
     */
    public function añadeImagenPincho($array)
    {
        try {

            $sql = "INSERT INTO `imagenes_pincho`(`ruta`,`Fk_pincho`) VALUES ($array[ruta],$array[Fk_pincho]);";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dada de alta correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * bajaImnagenBar
     *
     * @param  mixed $id
     * @param  mixed $ruta
     * @return void
     */
    public function bajaImnagenBar($id, $ruta)
    {
        try {
            $sql = "DELETE FROM `imagenes_bar` WHERE ruta=" . $ruta . " and Fk_bar=" . $id;
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * bajaImnagenPincho
     *
     * @param  mixed $id
     * @param  mixed $ruta
     * @return void
     */
    public function bajaImnagenPincho($id, $ruta)
    {
        try {
            $sql = "DELETE FROM `imagenes_pincho` WHERE ruta=" . $ruta . " and Fk_pincho=" . $id;
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * bajaImnagenUsuario
     *
     * @param  mixed $id
     * @param  mixed $ruta
     * @return void
     */
    public function bajaImnagenUsuario($id, $ruta)
    {
        try {
            $sql = "DELETE FROM `imagenes_usuario` WHERE ruta=" . $ruta . " and Fk_usuario=" . $id;
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * bajaResenas
     *
     * @param  mixed $id
     * @return void
     */
    public function bajaResenas($id)
    {
        try {
            $sql = "DELETE FROM `reseña` WHERE Cod_reseña=$id";
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                echo "Reseña dado de baja correctamente.";
            } else {
                print_r($this->conexion->errorInfo());
                throw new \Exception("Error por consulta");
            }
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * getUltimoUsuario
     *
     * @return void
     */
    public function getUltimoUsuario()
    {
        try {
            $sql = "SELECT max(Cod_usuario) as max from usuarios;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * getUltimoPincho
     *
     * @return void
     */
    public function getUltimoPincho()
    {
        try {
            $sql = "SELECT max(Cod_pincho) as max from pinchos;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * getUltimoBar
     *
     * @return void
     */
    public function getUltimoBar()
    {
        try {
            $sql = "SELECT max(Cod_bar) as max from bares;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * modificaResenas
     *
     * @param  mixed $array
     * @return void
     */
    public function modificaResenas($array)
    {
        $contador = 0;
        $sentencia = "";

        foreach ($array as $key => $value) {
            $sentencia = $sentencia . $key . $value;
            if ($contador < count($array) - 2) {
                $sentencia = $sentencia . ", ";
            }
            $contador++;
        }
        $sql = "UPDATE `reseña` SET " . $sentencia;

        $result = $this->conexion->query($sql);
        if ($result) {
            echo "Reseña modificado correctamente.";
        } else {
            echo "Error.";
        }
        return $result;
    }
    /**
     * getImagenBar
     *
     * @param  mixed $id
     * @return void
     */
    public function getImagenBar($id)
    {
        try {

            $sql = "SELECT ruta,Cod_img_bar from imagenes_bar i where Fk_bar=$id;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * getImagenUsuario
     *
     * @param  mixed $id
     * @return void
     */
    public function getImagenUsuario($id)
    {
        try {

            $sql = "SELECT ruta,Cod_img_usuario from imagenes_usuario i where Fk_usuario=$id;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    /**
     * getImagenPincho
     *
     * @param  mixed $id
     * @return void
     */
    public function getImagenPincho($id)
    {
        try {

            $sql = "SELECT ruta,Cod_img_pincho from imagenes_pincho i where Fk_pincho=$id;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    public function añadirLike($id)
    {
        try {

            $sql = "INSERT INTO `likes`(`Fk_reseña`, `Fk_usuario`) VALUES ($id,".$_SESSION["codigo_usuaraio"].");";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    public function borrarLike($id)
    {
        try {
            $sql = "DELETE FROM `likes` WHERE fk_usuario=".$_SESSION["codigo_usuaraio"]." and fk_reseña=$id;";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        } catch (\PDOException $e) {
            echo "error pdo";
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
}
