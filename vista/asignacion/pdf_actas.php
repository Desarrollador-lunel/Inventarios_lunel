<?php
// Jalamos las librerias de dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
setlocale(LC_ALL, "es_ES");
include "funciones.php";
$asignacion = $_GET["asignacion"]; 

if ($asignacion=="al") {
	$inicio = cadena_inicio();
	$cadena = cadena_cuerpo();
	crear_pdf($inicio,$cadena,$asignacion);
}
function cadena_inicio()
{
	//Se une la cadena con los estilos css de bootstrap
	$inicio = '<!DOCTYPE html>
	<html>
	<head>
		<title>Historico equipo</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
	<!-- Modal -->
	<?php
	setlocale(LC_ALL, "es_ES");
	?>';
	return $inicio;
}

function cadena_cuerpo()
{
	$cadena = '<div class="modal-body">
        <div class="row">
          <div id="contenidoActa" class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col" colspan="4" class="text-center">
                    <img src="../../imagenes/logo_lunel.png" class="img-fluid">
                  </th>
                  <th scope="col" colspan="4" class="text-center">
                    <h4>
                      <strong>
                        Software Inventory<br>
                        Acta de entrega
                      </strong>
                    </h4>
                  </th>
                  <th scope="col" colspan="4" class="text-center">
                    <strong>
                      Fecha y hora impresion:<br>
       
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope="col" colspan="12" class="text-center">
                    ACTA DE ENTREGA No <label id="conse_devolucion"></label>
                  </th>
                </tr>
              </thead>
            </table>
            <strong>Hoy ___ del mes de _____________ del ______ en la bodega de lunel-ie, se realiza la entrega formal de los equipos computacionales que se indican en el punto 2. EQUIPOS COMPUTACIONALES ASIGNADOS para el cumplimiento de las actividades del proyecto ______________________ , quienes declara recepción de los mismos en buen estado y se comprometen a cuidar de los recursos y hacer uso de ellos para los fines establecidos.<br><br></strong>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">1. PERSONA QUE ENTREGA</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col" colspan="6">Nombre completo:</td>
                  <td scope="col" colspan="6" id="persona_entrega"></td>
                </tr>
                <tr>
                  <td scope="col" colspan="6">Cargo:</td>
                  <td scope="col" colspan="6"><label id="cargo_entrega"></label></td>
                </tr>
              </tbody>
            </table>
            <table id="contenidoActaDevolucionFuncionario" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">2. EQUIPOS COMPUTACIONALES ASIGNADOS</th>
                </tr>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Tipo equipo</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Sistema operativo</th>
                  <th scope="col">RAM</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">3. PERSONA QUE RECIBE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col" colspan="6">Nombre completo:</td>
                  <td scope="col" colspan="6" id="persona_recibe"></td>
                </tr>
                <tr>
                  <td scope="col" colspan="6">Cargo:</td>
                  <td scope="col" colspan="6"><label id="cargo_recibe"></label></td>
                </tr>
              </tbody>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">4. FIRMAS</th>
                </tr>
                <tr>
                  <th scope="col" colspan="6"><div align="center">Persona que entrega</div></th>
                  <th scope="col" colspan="6"><div align="center">Persona que recibe</div></th>
                </tr>
                <tr>
                  <th scope="col" colspan="6">Firma</th>
                  <th scope="col" colspan="6">Firma</th>
                </tr>
                <tr>
                  <th scope="col" colspan="6">No documento</th>
                  <th scope="col" colspan="6">No documento</th>
                </tr>
              </thead>
            </table>
            <table class="table table-bordered" >
              <tbody>
                <tr>
                  <td scope="col" colspan="12" class="text-right"><p><small><em>Fecha y hora impresion :</small></em></p></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>';
return $cadena;
}
//Reemplaza URL de la imagen
//$cadena = str_replace('<img src="../imagenes/logo_lunel.png" class="img-fluid">', '<img src="../../imagenes/logo_lunel.png" >', $_GET["tabla"]);

function crear_pdf($inicio,$cadena,$asignacion)
{
	global $dompdf;
	//Unimos
$cadena_final = $inicio . $cadena;
$dompdf->loadHtml($cadena_final);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("A4", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("Acta-entrega-".$asignacion);

}