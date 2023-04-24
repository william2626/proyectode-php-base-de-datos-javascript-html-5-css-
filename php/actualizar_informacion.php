<?php
    if(
       !isset($_POST['nombrec'])||
       !isset($_POST['fecha'])||
       !isset($_POST['correo'])||
       !isset($_POST['pass'])||
       !isset($_POST['id'])
    )exit();

    include_once "../bd/base_de_datos.php";
    $id = $_POST['id'];
    $nombrec = $_POST['nombrec'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    $sentencia = $base_de_datos->prepare("UPDATE usuarios SET
                                 nombrec = '$nombrec',
                                 fecha = '$fecha',
                                 correo = '$correo',
                                 pass = '$pass'
                                 WHERE id = '$id';
                                 ");
    $resultado = $sentencia->execute([$id, $nombrec, $fecha, $correo, $pass]);

    if($resultado == true){
        echo "<script>alert('Los datos se han actualizado correctamente.')</script>";
        echo "<script>alert('Se redireccionará al menu de bienvenida.')</script>";
        header('refresh:0; url="menu_bienvenida.php"');
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }
?>