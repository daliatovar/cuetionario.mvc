<?php


session_start();

if(isset($_SESSION['sesionUser'])){


    $usuario = new Usuario();


    $id = $_COOKIE['id'];

    $sql="SELECT * FROM usuario WHERE id = $id";

    $consulta = mysql_query($sql)or die("Error de consulta usuario".mysql_erro());

    echo"<div class=\"container theme-showcase\" role=\"main\">";

    $nombre = mysql_result($consulta, 0,'usuario');
    $puntuacion=mysql_result($consulta,0,'puntuacion');



    echo"<table border='3' class='table table-bordered'><tr><td rowspan='2'><center><img src='./images_mvc/balon.GIF'   width='120' height='120'></td>
<tr><td><h4><center><font color='#2f4f4f'>Hola:</font> <font color='green'>$nombre</font>
 <br><center><font color='#5f9ea0'><br>¡Pon a prueba tus conocimientos sobre fútbol!</font>
<center><br><font color='red'>Tu puntuación por el momento es : $puntuacion</font></center><td>
    <a href='index.php' ><br>Salir</a></center></h4></td></tr></table></h3></div>";
    echo"</div>";


    $variables= array('metodo'=>$usuario->cuestionario());

    /*nombre del archivo a llamar y manda las variables*/
    view('prueba',$variables);

}
else{
    echo"<script>alert('No hay seciones iniciadas.');
    location.href = 'Login.asp';
</script>";
}

?>