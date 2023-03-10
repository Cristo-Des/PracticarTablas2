<!DOCTYPE html>
<html>
<head>
<title>Calificar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background-color:#B0E0E6">
<h1 align="center">CALIFICACION</h1>
<div class="container-sm">
<table class="table" align="center">
    <form >
        <th align="center" class="table-dark">MULTIPLICACION</th>
        <th align="center" class="table-dark">RESPUESTA</th>
        <th align="center" class="table-dark">RESPUESTA CORRECTA</th>
    <?php
   $nombre= $_POST["nombre"];
   $correo=$_POST["correo"];
   $servername="localhost";
   $database="tablasmultiplicar";
   $username="root";
   $password="";

echo'     
   <h5 style="color: #00008B">Nombre: '.$nombre.'</h5>
   <h5 style="color: #00008B">Correo: '.$correo.'</h5>';

   $numerotabla= $_POST["tabla"];
   $tablaInicio=$_POST["inicio"];
   $tablaFinal=$_POST["final"];

   $numerocorrecto=array();
   $numerorespuesta=array();
   $correctas=0;
   $veses=0;

for ($i=$tablaInicio; $i <= $tablaFinal; $i++) 
{ 
    $numerorespuesta[$i]=$_POST["cajatabla".$i];
    $numerocorrecto[$i]=$_POST["numero".$i];
}
   for ($i=$tablaInicio; $i <= $tablaFinal; $i++) 
   { 
       if ($numerocorrecto[$i]==$numerorespuesta[$i])
      {
        $correctas++;
        echo '
        <tr class="table-success" align="center"><td><label style= "color:green" for="correcto"> '.$numerotabla.' x  '.$i.' = </td>
        <td> <label style= "color:green" for="correcto">'. $numerocorrecto[$i].' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
          </svg></td>
        <td> <label style= "color:green" for="correcto">'.$numerocorrecto[$i] . '</tr></label>';  
       }
       else
       {
        echo '
        <tr class="table-danger" align="center"><td>
        <label style= "color:red" for="respuesta"> '. $numerotabla.' x  '.$i.' =  </td>
        <td> <label style= "color:red" for="correcto">'. $numerorespuesta[$i] . ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg></td>
        <td> <label style= "color:green" for="correcto">'. $numerocorrecto[$i] . '</td></tr></label>';    
    }  
$veses++;                       
   }
        ?>      
      </form>
</table>
      </div>
      <?php
      $RESPUESTA=$correctas*10/$veses*10;
      echo'<center>Tus Respuestas Son: '.$correctas.' de '.$veses.'<br> Calificacion: '.$RESPUESTA.'</center>';
      
      $con=mysqli_connect($servername,$username,$password, $database);
      if(!$con)
      {
       die("Coneccion Fallida");
      }
      echo'<div align="center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-database-check" viewBox="0 0 16 16">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
      <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
    </svg></div>';

      $sql="INSERT INTO usuario (nombre,correo,numerotabla,tablainicio,tablafinal,aciertos,calificacion)VALUES('".$nombre."','".$correo."',".$numerotabla.",".$tablaInicio.",".$tablaFinal.",".$correctas.",".$RESPUESTA.")";

      if(mysqli_query($con, $sql))
      {

      }
      else
      {
        echo"error: .$sql. <br>". mysqli_error($con);
      }
      mysqli_close($con);
      ?>
</body>
</html>