<!DOCTYPE html>
<html>
<head>
<title>Tablas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color:#B0E0E6">
<center>
    <?php

   $nombre=$_GET["nombre"];
   $correo=$_GET["correo"];
   echo'
   <h1 style="color: #000080">PRACTICAR TABLAS</h1>
   <h5 style="color: #00008B">Nombre: '.$nombre.'</h5>
   <h5 style="color: #00008B">Correo: '.$correo.'</h5>';
   
   $tabla= $_GET["tabla"];
   $tablaInicio=$_GET["inicio"];
   $tablaFinal=$_GET["final"];
   $multiplicacion=0;

   if ($tablaInicio>=$tablaFinal) 
   {
      $tablaInicio=$_GET["final"];
      $tablaFinal=$_GET["inicio"];
   }
   echo' <form action="Calificar.php" method="post"> 

   <input type="hidden" id="nombre" name="nombre" value="'.$nombre.'">
  <input type="hidden" id="correo" name="correo" value="'.$correo.'">
  <input type="hidden" id="tabla" name="tabla" value="'.$tabla.'">
  <input type="hidden" id="inicio" name="inicio" value="'.$tablaInicio.'">
  <input type="hidden" id="final" name="final" value="'.$tablaFinal.'">';
   
   for ($i = $tablaInicio; $i <= $tablaFinal; $i++) 
   { 
    
      $multiplicacion= $tabla * $i;
      echo '
      <label class="text-uppercase" style=" font-weight: bold;" for="fname"> '.$tabla.' x  '.$i.' = </label>
      <input type="text" id="cajatabla'.$i.'" name="cajatabla'.$i.'" required><br>
      <input type="hidden" id="numero'.$i.'" name="numero'.$i.'" value="'.$multiplicacion.'"><br>'; 
   }
   echo '<input type="submit" class="btn btn-primary btn-sm" value="CALIFICAR">
   
   </form>';  
        ?>
      </center>
</body>
</html>
