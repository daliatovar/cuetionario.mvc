<?php

class Usuario{

    public function cuestionario(){


?>

        <script type="text/javascript">
            $(function () {

                $('#idres').click(function()
                {
                    $('#idp').load('idc=' + this.options[this.selectedIndex].value )

                })


            })
        </script>

<?php
        echo"
          <form action='respuesta.jsp' method='POST' name = 'frmdo2' id = 'frmdo2' target = '_self'>
          <center><table border='0'><tr><td colspan='4'><h4><center><font color='#5f9ea0'>Cuestionario</h4></td></tr>
          ";

          $resul = mysql_query("SELECT MAX(idpregunta) AS id_maximo FROM  preguntas".mysql_error());
        if ($row = mysql_fetch_row($resul)) {
            $max = trim($row[0]);
        }
        $aleatorio = mt_rand(1, $max); //Genereamos aleatorio
        $usados[] = $aleatorio; //Guardamos el primero en un array ya que el primero no puede estar repetido

        for ($i = 1; $i <=10; $i++) {

            $aleatorio = mt_rand(1, $max); //Generamos aleatorio
            while(in_array($aleatorio,$usados)) { //buscamos que no este repetido
                $aleatorio = mt_rand(1, $max);
            }

            $usados[] = $aleatorio;    //No esta repetido, luego guardamos el aleatorio

            $sql="Select * from preguntas where idpregunta=$aleatorio" or die("Error en la consulta del cuestionario".mysql_error());
            $consulta = mysql_query($sql)or die("Error de consulta $sql");
            $id_pregunta=mysql_result($consulta,0,'idpregunta');
            $pregunta= mysql_result($consulta,0,'pregunta');
            $respuesta = mysql_result($consulta,0,'respuesta');

            echo"<tr>
            <td>$i-.<input type=hidden  name=id$i value=$id_pregunta></td>
            <td>$pregunta</td>
            <td><input type=hidden name=res2$i value=$respuesta></td>";

                      $sqql2="SELECT r.idrespuesta,r.respuesta FROM respuestas AS r,preguntas AS p
                       WHERE p.idpregunta=r.idpregunta
                       AND r.idpregunta=$id_pregunta";

                    $resultado=mysql_query($sqql2) or die("Error en consulta de respuestas combo".mysql_error());



                                  echo"<td>
                                  <select name=res$i  class='form-control' id='idres'>
                                  <option value='null'>--Seleccione una opción--</option>";



                         while($field=mysql_fetch_array($resultado))
                         {
                          $idres=$field['idrespuesta'];
                          $resp=$field['respuesta'];

                               echo"

                               <option value=$idres>$resp</option>";


                         }



                      echo"<input type='hidden' name='correcto$i' value='$idres'>";
                     echo"</select>";



        }

        echo" </tr><tr><td colspan=4 align=center><input type='submit' value='Envíar' class=\"btn btn-primary\" ></td></tr>
                                      </table> </form>";


}


}

?>