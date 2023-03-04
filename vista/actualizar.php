
<h1>Actualizar el vehículo</h1>

<?php  require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/AdministradorPeticionesCarro.php'; ?>

<?php //echo ($mycarro->marca)?>


<form action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']."&accion=a";?>" method="post">
<input type="text"      name = "marca"      value="<?php print $mycarro->marca;      ?>">
<input type="text"      name = "modelo"     value="<?php echo $mycarro->modelo;     ?>">
<input type="text"      name = "color"      value="<?php echo $mycarro->color;      ?>">
<input type="text"      name = "fabricante" value="<?php echo $mycarro->fabricante; ?>">
<input type="submit"    name = "actualizar" value = "Actualizar">
</form>

<a href="../index.php">Volver</a>
