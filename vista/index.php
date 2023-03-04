<?php  
// Incluyo los archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/AdministradorPeticionesCarro.php';
// Instancio el controlador
$controlador = new ControladorCarro();
// Almaceno el arreglo traido de la base de datos
$_SERVER['listaCarros'] = $controlador->listar(); ?>



<h1>Insertar un vehículo nuevo</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input type="text"      name = "marca"      placeholder="Marca">
<input type="text"      name = "modelo"     placeholder="Modelo">
<input type="text"      name = "color"      placeholder="Color">
<input type="text"      name = "fabricante" placeholder="Fabricante" >
<input type="hidden"    name = "insertar"   value = "insertar">
<input type="submit"    value = "Agregar">
</form>



<h1>Ejemplo: Listado de coches</h1>
<table>
<tr>
<th>Marca</th>
<th>Modelo</th>
<th>Color</th>
<th>Fabricante</th>
<th>Acciones</th>
</tr>

<?php 
$row               = $_SERVER['listaCarros'];

for ($i = 0; $i <= (count($row[0]) -1 ) ; $i++) 
{
    echo "<tr id = 'registro'".$i.">";
    echo "<td>".$row[0][$i]['marca']."</td>" ;
    echo "<td>".$row[0][$i]['modelo']."</td>" ;
    echo "<td>".$row[0][$i]['color']."</td>" ;
    echo "<td>".$row[0][$i]['fabricante']."</td>" ;
    echo "<td>"." <a href='vista/actualizar.php?id=".$row[0][$i]['id']."&accion=a'>Actualizar " ;
    echo "<a href='vista/Eliminar.php?id=".$row[0][$i]['id']."&accion=e'>Eliminar</td>" ;
    echo "</tr>";
}  
?>

</table>

