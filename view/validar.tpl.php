<html>
<head></head>
<body>

<p><?=$titulo ?></p>

<?php
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];

if(isset($_POST['submit'])){
    switch($_POST['submit']){

        case "Registrar":

         $sqql="INSERT INTO usuario(usuario,contasena,puntuacion) VALUES('$username','$password','0')";
         $query=mysql_query($sqql)or die("Error al insertar registro".mysql_error());

            echo"
                         <div class=\"col-sm-4\">
                         </div>
                         <div class=\"col-sm-4\">
                             <div class=\"panel panel-default\">
                                 <div class=\"panel-body\">
                                     <div class=\"alert alert-success\" role=\"alert\">¡Felicidades $username  ya estas registrado!Puedes iniciar
                                      sesión para contestar tu encuesta
                                 </div>
                                      <center><img src='./images_mvc/balon.GIF' width='120' height='120' /></center>
                                     <br/>
                                 </div>
                                 <meta http-equiv=\"refresh\" content=\"4;url=Login.asp\" />
                              </div>
                          </div>";


            break;


        case "Entrar":

            $band = 1;

            if($username=="Usuario" or $password=="Password"){
                $band = 0;

                echo" <div class=\"col-sm-4\">
                         </div>
                         <div class=\"col-sm-4\">
                             <div class=\"panel panel-default\">
                                 <div class=\"panel-body\">
                                     <div class=\"alert alert-danger\" role=\"alert\">Los campos se encuentran vacios. Inserte un usuario y password
                                 </div>
                                      <center><img src='./images_mvc/balon.GIF' width='120' height='120' /></center>
                                     <br/>
                                 </div>
                                 <meta http-equiv=\"refresh\" content=\"4;url=Login.asp\"/>
                              </div>
                          </div>";
            }

            else{

         $sql="SELECT * FROM usuario WHERE usuario='$username' AND contasena='$password'";
         $consult=mysql_query($sql)or die("Error en consulta de usuario y pass".mysql_error());
         $cuan=mysql_num_rows($consult);


         if($cuan==0){


             echo" <div class=\"col-sm-4\">
                         </div>
                         <div class=\"col-sm-4\">
                             <div class=\"panel panel-default\">
                                 <div class=\"panel-body\">
                                     <div class=\"alert alert-danger\" role=\"alert\">¡El usuario o contraseña no existen!
                                 </div>
                                      <center><img src='./images_mvc/balon.GIF' width='120' height='120' /></center>
                                     <br/>
                                 </div>
                                 <meta http-equiv=\"refresh\" content=\"4;url=Login.asp\"/>
                              </div>
                          </div>";

         }
                else{

                    $band == 1;

                    $iduser = mysql_result($consult, 0, 'id');


                    setCookie('id', $iduser);
                    session_start();

                    $_SESSION["sesionUser"] = $_REQUEST['username'];

                    ?>

                    <script type='text/JavaScript'>
                        $(function () {
                            window.location="prueba.net";
                        })
                    </script>

<?php

                  }
}
    break;


}
}


?>

</body>
</html>



