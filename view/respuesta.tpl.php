<html>
<head>

</head>
<body>

<?php

echo"<div class=\"container theme-showcase\" role=\"main\">";

for ($i = 1; $i <=10; $i++) {

    if($_REQUEST['res'.$i.'']=='null'){
        echo "
  <div class=\"panel-body\">
                                      <div class=\"alert alert-danger\" role=\"alert\"><center>¡Le sugerimos que para obtener una mejor calificacion constesta todas las preguntas!</div>
                                      <br/>
                                 </div>
                                 <meta http-equiv=\"refresh\" content=\"3;url=prueba.net\" />
                              </div>
                          </div>";
        exit;
    }
    else{

        $id_pregunta=$_REQUEST['id'.$i.''];

        if($_REQUEST['res2'.$i.'']==$_REQUEST['res'.$i.'']){
            $sql1="UPDATE preguntas SET resultado='1' WHERE idpregunta=$id_pregunta";
            $consulta1 = mysql_query($sql1)or die("Error de consulta $sql1");
        }
        else{
            $sql2="UPDATE preguntas SET resultado='0' WHERE idpregunta=$id_pregunta";
            $consulta2 = mysql_query($sql2)or die("Error de consulta2 $sql2".mysql_error());
        }
        $sql3="select SUM(resultado) AS suma from preguntas WHERE idpregunta=$id_pregunta and resultado='1';";
        $consulta3 = mysql_query($sql3)or die("Error de consulta $sql3");
        if ($row = mysql_fetch_row($consulta3)) {
            $suma = trim($row[0]);
        }
        $sql4="insert into calificacion (nombre,respuestas) values ('$nombre','$suma') ";
        $consulta4 = mysql_query($sql4)or die("Error de consulta $sql4");
    }


}
$sql5="select SUM(respuestas) AS calificacion from calificacion WHERE nombre='$nombre';";
$consulta5 = mysql_query($sql5)or die("Error de consulta $sql5");
echo"<div class=\"col-sm-4\">
                         </div>
                         <div class=\"col-sm-4\">
                             <div class=\"panel panel-warning\">
                                 <div class=\"panel-body\">
                                      <div class=\"alert alert-warning\" role=\"alert\">";
if ($row2 = mysql_fetch_row($consulta5)) {
    $calificacion = trim($row2[0]);
}
if($calificacion==10){
    echo"<h2>Felicidades $nombre !!</h2>";
    echo"<h2>Calificación: $calificacion </h2> <br>";
    echo "
                    <center><img src='./images_mvc/balon.GIF' width='130' height='130' /></center>
                    <meta http-equiv=\"refresh\" content=\"6;url=prueba.net\" />
                    </div>
                     <br/>
                         </div>
                      </div>
                  </div>";

    $sql6=" TRUNCATE TABLE calificacion; ";
    $consulta6 = mysql_query($sql6)or die("Error de consulta $sql6");
}
else
{
    echo"<h2>La puntuacion obtenida es: $calificacion </h2> <br>";
    echo "
<center><img src='./images_mvc/balon.GIF' width='130' height='130' /></center>
<meta http-equiv=\"refresh\" content=\"6;url=prueba.net\" />
</div>
                                      <br/>
                                 </div>
                              </div>
                          </div>";

    $sql6=" TRUNCATE TABLE calificacion; ";
    $consulta6 = mysql_query($sql6)or die("Error de consulta $sql6");
}

$sql8="UPDATE usuario SET puntuacion='5' WHERE usuario='$nombre'";
$consulta8 = mysql_query($sql8)or die("Error de consulta8 $sql8");


$sql7="SELECT max(puntuacion) FROM usuario WHERE usuario='$nombre' ";
$consulta7 = mysql_query($sql7)or die("Error de consulta $sql7");
if ($row3 = mysql_fetch_row($consulta7)) {
    $maxima = trim($row3[0]);
}
if($calificacion >= $maxima)
{
    $sql8="UPDATE usuario SET puntuacion='$calificacion' WHERE usuario='$nombre'";
    $consulta8 = mysql_query($sql8)or die("Error de consulta8 $sql8");
}
else{
    exit;
}
?>



</body>
</html>

