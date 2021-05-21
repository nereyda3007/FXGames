<?php
    
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'mermaid');

function connect(){
    $conex = mysqli_connect(HOST, USER, PASS, DB);
    mysqli_set_charset($conex, 'utf8');
    return $conex;
}

function nuevoUsuario($tr, $nombre, $ape, $email, $pass, $fecha, $nov, $acu, $cond){
    $conex=connect();
    $stmt = $conex->prepare("INSERT INTO usuarios (`TRATAMIENTO`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `PASSWORD`, `FECHA_NAC`, `NOVEDADES`, `ACUERDO`, `CONDICIONES`) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssiii", $t, $n, $a, $e, $p, $f, $no, $ac, $c);
    $t = $tr;
    $n = $nombre;
    $a = $ape;
    $e = $email;
    $p = $pass;
    $f = $fecha;
    $no = $nov;
    $ac = $acu;
    $c = $cond;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function comprobarUsuario($email){
    $query = "SELECT * FROM `usuarios` WHERE EMAIL='$email'";
    
    $con = mysqli_query(connect(), $query);
    $numFila = mysqli_num_rows($con);

    return $numFila;
}

function login($email, $pass){
    $query = "SELECT EMAIL, PASSWORD FROM usuarios WHERE EMAIL='$email'";
    
    $con = mysqli_query(connect(), $query);
    $numFila = mysqli_num_rows($con);
    
    if($numFila!=0){
        $fila = mysqli_fetch_array($con);
        $encontrado = password_verify($pass, $fila['PASSWORD']);
    }else{
        $encontrado = false;
    }
    
    return $encontrado;
}

function updatePass($email,$pass) {
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `usuarios` SET `PASSWORD`=? WHERE EMAIL=?");
    $stmt->bind_param("ss", $p, $e);
    $e = $email;
    $p = $pass;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function registrarIncidencia($tit, $nombre, $ape, $email, $asunto){
    $conex=connect();
    $msg = html_entity_decode($asunto);
    $stmt = $conex->prepare("INSERT INTO incidencias (`TITULO`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `MENSAJE`) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $t, $n, $a, $e, $m);
    $t = $tit;
    $n = $nombre;
    $a = $ape;
    $e = $email;
    $m = $asunto;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function generarClave($long){
    $cadena = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $longCad = strlen($cadena);
    $clave = "";
    
    for($i=0;$i<$long;$i++){
        $clave .= $cadena[rand(0, $longCad-1)];
    }
    
    return $clave;
}

function videojuegos($tabla,$categoria){
    $query = "SELECT * FROM $tabla WHERE CATEGORIA='$categoria'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function productosOfertas($tipo) {
    $query = "SELECT * FROM `videojuegos` WHERE OFERTA=1 AND `TIPO`= '$tipo'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function datosVideojuego($id){
    $query = "SELECT * FROM videojuegos WHERE ID='$id'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);
    
    return $datos;
}

function datosImagenes($id){
    $query = "SELECT * FROM imagenes WHERE ID='$id'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);
    
    return $datos;
}

function datosImagenesCarrusel($nombre){
    $query = "SELECT * FROM imagenes WHERE NOMBRE='$nombre' and USO = 'CARRUSEL'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function obtenerImagen($nombre){
    $query = "SELECT BASE FROM imagenes WHERE NOMBRE='$nombre' and USO ='PRINCIPAL'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);
    
    return $datos[0];
}

function obtenerImagenPerfil($id){
    $query = "SELECT IMGPERFIL FROM usuarios WHERE ID='$id'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);
    
    return $datos[0];
}

function filtroEdad($cat,$edad){
    $query = "SELECT * FROM videojuegos WHERE CATEGORIA='$cat' AND EDAD_RECOMENDADA=$edad";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroEdadOfertas($tipo,$edad){
    $query = "SELECT * FROM videojuegos WHERE `TIPO`= '$tipo' AND EDAD_RECOMENDADA=$edad AND OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroFecha($cat,$fecha){
    $query = "SELECT * FROM videojuegos WHERE CATEGORIA='$cat' AND FECHA_LANZAMIENTO LIKE '%$fecha%'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroFechaOfertas($tipo,$fecha){
    $query = "SELECT * FROM videojuegos WHERE TIPO='$tipo' AND FECHA_LANZAMIENTO LIKE '%$fecha%' AND OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroGenero($cat,$genero){
    $genero = html_entity_decode($genero);
    $query = "SELECT * FROM videojuegos WHERE CATEGORIA='$cat' AND GENERO LIKE '%$genero%'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroGeneroOfertas($tipo,$genero){
     $genero = html_entity_decode($genero);
    $query = "SELECT * FROM videojuegos WHERE TIPO='$tipo' AND GENERO LIKE '%$genero%' AND OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroStock($cat,$disp){
    $query = "SELECT * FROM videojuegos WHERE CATEGORIA='$cat' AND DISPONIBILIDAD=$disp";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroStockOfertas($tipo,$disp){
    $query = "SELECT * FROM videojuegos WHERE TIPO='$tipo' AND DISPONIBILIDAD=$disp AND OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroPrecio($cat,$precio){
    $query = "SELECT * FROM videojuegos WHERE CATEGORIA='$cat' AND PRECIO<=$precio";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function filtroPrecioOfertas($tipo,$precio){
    $query = "SELECT * FROM videojuegos WHERE TIPO='$tipo' AND PRECIO<=$precio AND OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function indexProductos(){
    $query = "SELECT ID, TIPO, TITULO FROM videojuegos";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function indexOfertas(){
    $query = "SELECT ID, TIPO, TITULO FROM videojuegos WHERE OFERTA=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function obtenerProductos(){
    $query = "SELECT * FROM videojuegos WHERE DISPONIBILIDAD=1";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}


function eliminarOfertas($id){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `videojuegos` SET `OFERTA`=?, `PRECIO_OFERTA`=? WHERE `ID`=?");
    $stmt->bind_param("idi", $o, $p, $i);
    $o = 0;
    $p = 0;
    $i = $id;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}

function cantidadProducto($id){
    $query ="SELECT PRECIO, STOCK, OFERTA, PRECIO_OFERTA FROM videojuegos WHERE ID=$id";
    $con = mysqli_query(connect(), $query);

    $datos = mysqli_fetch_array($con);
    
    return $datos;
}

function insertarProductoCompra($id,$titulo,$precio,$cantidad,$total,$usuario){
    $conex=connect();
    $titulo = str_replace("'","\'",$titulo);
    $stmt = $conex->prepare("INSERT INTO `compras`(`ID`, `NOMBRE`, `PRECIO`, `CANTIDAD`, `TOTAL`,`USUARIO`) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isdids", $i, $t, $p, $c, $to,$u);
    $i = $id;
    $t = $titulo;
    $p = $precio;
    $c = $cantidad;
    $to = $total;
    $u = $usuario;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;

}

function actualizarCantidadProducto($id,$cant,$total){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `compras` SET `CANTIDAD`=?, `TOTAL`=? WHERE `ID`=?");
    $stmt->bind_param("idi", $c, $t, $i);
    $c = $cant;
    $t = $total;
    $i = $id;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function obtenerProductosTienda($usuario){
    $query = "SELECT DISTINCT `ID`, `NOMBRE`, `PRECIO`, `CANTIDAD`, `TOTAL`, `USUARIO` FROM `compras` WHERE USUARIO='$usuario'";
    $con = mysqli_query(connect(), $query);
    
    return $con;
}

function borrarProductoTienda($id){
    $conex=connect();
    $stmt = $conex->prepare("DELETE FROM compras WHERE ID=?");
    $stmt->bind_param("i", $i);
    $i = $id;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function obtenerTotalFacturas(){
    $query = "SELECT DISTINCT IDFACTURA FROM facturas";
    $con = mysqli_query(connect(), $query);
    $rows = mysqli_num_rows($con);

    return $rows;   
}

function insertarDatosFactura($idFactura,$idProducto,$titulo,$cantidad,$precio,$total,$usuario,$localizador){
    $conex=connect();
    $titulo = str_replace("'","\'",$titulo);
    $stmt = $conex->prepare("INSERT INTO `facturas`(`IDFACTURA`, `IDPRODUCTO`, `TITULO`, `CANTIDAD`, `PRECIO`, `TOTAL`, `USUARIO`, `LOCALIZADOR`) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iisiddss", $if, $ip, $t, $c, $p, $to, $u, $l);
    $if = $idFactura;
    $ip = $idProducto;
    $t = $titulo;
    $c = $cantidad;
    $p = $precio;
    $to = $total;
    $u = $usuario;
    $l = $localizador;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function borrarTablaCompras(){
    $conex=connect();
    $stmt = $conex->prepare("DELETE FROM compras");
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function devolverResultados($buscar){
    $query = "SELECT * FROM videojuegos WHERE UPPER(TITULO) LIKE UPPER('%$buscar%') OR UPPER(DESCRIPCION) LIKE UPPER('%$buscar%') OR UPPER(PLATAFORMA) LIKE UPPER('%$buscar%') OR UPPER(GENERO) LIKE UPPER('%$buscar%') OR UPPER(CATEGORIA) LIKE UPPER('%$buscar%') OR UPPER(TIPO) LIKE UPPER('%$buscar%')";
    $con = mysqli_query(connect(), $query);

    return $con;
}

function buscarPorNombre($nombre){
    $query = "SELECT * FROM videojuegos WHERE UPPER(TITULO) LIKE UPPER('$nombre')";
    $con = mysqli_query(connect(), $query);

    return $con;
}

function darQuitarPermisos($permiso,$email){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `usuarios` SET `ADMIN`=? WHERE `EMAIL`=?");
    $stmt->bind_param("is", $p, $e);
    $p = $permiso;
    $e = $email;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function agregarOfertas($id,$preciodesc){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `videojuegos` SET `PRECIO_OFERTA`=?, `OFERTA`=? WHERE `ID`=?");
    $stmt->bind_param("dii", $po, $o, $i);
    $po = $preciodesc;
    $o = 1;
    $i = $id;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}

function actualizarPrecio($titulo,$preciodesc){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `videojuegos` SET `PRECIO_OFERTA`=?, `OFERTA`=? WHERE `TITULO`=?");
    $stmt->bind_param("dis", $po, $o, $t);
    $po = $preciodesc;
    $o = 1;
    $t = $titulo;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}

function eliminarOfertaEspecifica($nombre){
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `videojuegos` SET `PRECIO_OFERTA`=?, `OFERTA`=? WHERE `TITULO`=?");
    $stmt->bind_param("dis", $po, $o, $t);
    $po = 0;
    $o = 0;
    $t = $nombre;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}


function datosPersonales($email){
    $query = "SELECT * FROM usuarios WHERE EMAIL='$email'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);
    
    return $datos;
}

function actualizarStock($id,$cantidad){
    $query = "SELECT * FROM videojuegos WHERE ID=$id";
    $con = mysqli_query(connect(), $query);
    $datos = mysqli_fetch_array($con);
    $total = $datos['STOCK']-$cantidad;
    if($total==0) {
        $conex=connect();
        $stmt = $conex->prepare("UPDATE `videojuegos` SET `STOCK`=?,`DISPONIBILIDAD`=? WHERE `ID`=?");
        $stmt->bind_param("iii", $c,$d, $i);
        $c = $total;
        $d = 0;
        $i = $id;
        $stmt->execute();
        $stmt->close();
        $conex->close();
        return $datos;
    }else{
        $conex=connect();
        $stmt = $conex->prepare("UPDATE `videojuegos` SET `STOCK`=? WHERE `ID`=?");
        $stmt->bind_param("ii", $c, $i);
        $c = $total;
        $i = $id;
        $stmt->execute();
        $stmt->close();
        $conex->close();
        return $datos;
    }

}

function actualizarDatosPersonales($nombre, $ape, $email, $pass, $fecha,$dir){
    $query = "UPDATE `usuarios` SET `NOMBRE`='$nombre',`APELLIDOS`='$ape',`PASSWORD`='$pass',`FECHA_NAC`='$fecha',`DIRECCION`='$dir' WHERE EMAIL='$email'";
    $con = mysqli_query(connect(), $query);

    return $con;
}

function misPedidos($usuario){
    $query = "SELECT * FROM facturas WHERE USUARIO='$usuario'";
    $con = mysqli_query(connect(), $query);

    return $con;
}

function datosUsuario($email){
    $query = "SELECT * FROM usuarios WHERE EMAIL='$email'";
    $con = mysqli_query(connect(), $query);
    
    $datos = mysqli_fetch_array($con);

    return $datos;
}

function insertarProducto($tit,$des,$precio,$of,$pdes,$dis,$stock,$plat,$edad,$fecha,$gen,$video,$cat,$tipo) {
    $conex=connect();
    $tit = str_replace("'","\'",$tit);
    $des = str_replace("'","\'",$des);
    $stmt = $conex->prepare("INSERT INTO `videojuegos`(`TITULO`, `DESCRIPCION`, `PRECIO`, `OFERTA`, `PRECIO_OFERTA`, `DISPONIBILIDAD`, `STOCK`,`PLATAFORMA`,`EDAD_RECOMENDADA`,`FECHA_LANZAMIENTO`,`GENERO`,`VIDEO`,`CATEGORIA`,`TIPO`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssdidiisisssss", $t, $d, $p, $o, $pd, $di, $s,$pl,$e,$f,$g,$v,$c,$ti);
    $t = $tit;
    $d = $des;
    $p = $precio;
    $o = $of;
    $pd = $pdes;
    $di = $dis;
    $s = $stock;
    $pl = $plat;
    $e = $edad;
    $f = $fecha;
    $g = $gen;
    $v  = $video;
    $c  = $cat;
    $ti = $tipo;
    $stmt->execute();
    $stmt->close();
    $conex->close();
    //return $conex;
}

function insertarImagen($tit,$base64,$uso) {
    $conex=connect();
    $tit = str_replace("'","\'",$tit);
    $stmt = $conex->prepare("INSERT INTO `imagenes`(`NOMBRE`, `BASE`, `USO`) VALUES (?,?,?)");
    $stmt->bind_param("sss", $t, $b, $u);
    $t = $tit;
    $b = $base64;
    $u = $uso;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}

  
function editarImagenPerfil($email,$base64) {
    $conex=connect();
    $stmt = $conex->prepare("UPDATE `usuarios` SET `IMGPERFIL`=? WHERE `EMAIL`=?");
    $stmt->bind_param("ss", $i, $e);
    $i = $base64;
    $e = $email;
    $stmt->execute();
    $stmt->close();
    $conex->close();
}
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>