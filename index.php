<?php 



//comprobramos si tiene errores
error_reporting(E_ALL);
ini_set('display_errors', '1');
// conexión
//espera el host,usuario,pass,tabla
$mysqli = @new mysqli("localhost:3306","root","","objetivo");
//si se envia 


echo "meta1";
if (isset($_POST['enviar']))
{
	

  $filename=$_FILES["file"]["name"];
  //creamos un objeto de la clase splfileinfo
  $info = new SplFileInfo($filename);

  $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

   if($extension == 'csv')
   
   {
	$filename = $_FILES['file']['tmp_name'];
	$handle = fopen($filename, "r");
//prepara el arhivo, (conexion,numeroFilas,separador si es , o ;)
	while( ($data = fgetcsv($handle, 1000, ",") ) !== FALSE )
    
	{
	   $q = "INSERT INTO objetivo (contrato, titular) VALUES ('$data[0]','$data[1]')";

	$mysqli->query($q);
   }
   
   echo "meta3";
      fclose($handle);

   }
}
echo "meta4";
?>