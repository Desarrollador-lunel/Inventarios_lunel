<?php
// Jalamos las librerias de dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
include dirname(__file__, 2) . '../../modelo/asignacion.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
setlocale(LC_ALL, 'es_ES');
include 'funciones.php';
$asignacion = $_GET['asignacion']; 
$id_asignacion = $_GET['id_asignacion'];
$tabla = Armar_tabla($id_asignacion);
//$id_asignacion = 5; 

if ($asignacion=='al') {
	$inicio = cadena_inicio();
	$cadena = cadena_cuerpo($id_asignacion,$tabla);
	crear_pdf($inicio,$cadena,$asignacion);
}
function cadena_inicio()
{
	//Se une la cadena con los estilos css de bootstrap
	$inicio = "<!DOCTYPE html>
	<html>
	<head>
		<title>Historico equipo</title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
	</head>
	<body>
	<!-- Modal -->
	<?php
	setlocale(LC_ALL, 'es_ES');
	?>";
	return $inicio;
}

function cadena_cuerpo($id_asignacion,$tabla) 
{
	$asignacion = new Asignacion();
	$resultado = $asignacion->getConsultapersonas_acta($id_asignacion);
	$cadena = "<div class='modal-body'>
        <div class='row'>
          <div id='contenidoActa' class='table-responsive'>
            <table class='table table-bordered' >
              <thead>
                <tr>
                  <th scope='col' colspan='4' class='text-center'>
                    <img src='../../imagenes/logo_lunel.png' class='img-fluid'>
                  </th>
                  <th scope='col' colspan='4' class='text-center'>
                    <h4>
                      <strong>
                        Software Inventory<br>
                        Acta de entrega
                      </strong>
                    </h4>
                  </th>
                  <th scope='col' colspan='4' class='text-center'>
                    <strong>
                      Fecha y hora impresion: ".date('Y-m-d H:i:s')."<br>
       
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope='col' colspan='12' class='text-center'>
                    ACTA DE ENTREGA No ".$resultado[0]["consecutivo_asignar"]." <label id='conse_asignac'></label>
                  </th>
                </tr>
              </thead>
            </table>
            <strong>Hoy ".$resultado[0]["dia"]." del mes ".$resultado[0]["MES"]." del ".$resultado[0]["anio"]." en la bodega de lunel-ie, se realiza la entrega formal de los equipos computacionales que se indican en el punto 2. EQUIPOS COMPUTACIONALES ASIGNADOS para el cumplimiento de las actividades del proyecto ".$resultado[0]["nombre_proyecto"]." , quienes declara recepción de los mismos en buen estado y se comprometen a cuidar de los recursos y hacer uso de ellos para los fines establecidos.<br><br></strong>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th scope='col' colspan='12'>1. PERSONA QUE ENTREGA</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope='col' colspan='6'>Nombre completo:</td>
                  <td scope='col' colspan='6' id='persona_entrega'>".$resultado[0]["nombre_entrega"]."</td>
                </tr>
                <tr>
                  <td scope='col' colspan='6'>Cargo:</td>
                  <td scope='col' colspan='6'><label id='cargo_entrega'>".$resultado[0]["cargo_entrega"]."</label></td>
                </tr>
              </tbody>
            </table>
            <table id='contenidoActaDevolucionFuncionario' class='table table-bordered'>
              <thead>
                <tr>
                  <th scope='col' colspan='12'>2. EQUIPOS COMPUTACIONALES ASIGNADOS</th>
                </tr>
                <tr>
                  <th scope='col' colspan='2'>Serial</th>
                  <th scope='col' colspan='2'>Tipo equipo</th>
                  <th scope='col' colspan='2'>Modelo</th>
                  <th scope='col' colspan='2'>Marca</th>
                  <th scope='col' colspan='2'>Sistema operativo</th>
                  <th scope='col' colspan='2'>RAM</th>
                </tr>
              </thead>
              <tbody>".$tabla."
              </tbody>
            </table>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th scope='col' colspan='12'>OBSERVACIONES</th>
                </tr>
              </thead>
              <tbody>  
                <tr>
                  <td scope='col' colspan='12' id='persona_recibe'>".$resultado[0]["observacion"]."</td>
                </tr>
              </tbody>
            </table><br>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th scope='col' colspan='12'>3. PERSONA QUE RECIBE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope='col' colspan='6'>Nombre completo:</td>
                  <td scope='col' colspan='6' id='persona_recibe'>".$resultado[0]["nombres_recibe"]."</td>
                </tr>
                <tr>
                  <td scope='col' colspan='6'>Cargo:</td>
                  <td scope='col' colspan='6'><label id='cargo_recibe'>".$resultado[0]["cargo_recibe"]."</label></td>
                </tr>
              </tbody>
            </table>

            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th scope='col' colspan='12'>4. FIRMAS</th>
                </tr>
                <tr>
                  <th scope='col' colspan='6'><div align='center'>Persona que entrega</div></th>
                  <th scope='col' colspan='6'><div align='center'>Persona que recibe</div></th>
                </tr>
                <tr>
                  <th scope='col' colspan='6'>Firma</th>
                  <th scope='col' colspan='6'>Firma</th>
                </tr>
                <tr>
                  <th scope='col' colspan='6'>No documento  ".$resultado[0]["documento_entrega"]."</th>
                  <th scope='col' colspan='6'>No documento  ".$resultado[0]["documento_recibe"]."</th>
                </tr>
              </thead>
            </table>
            <table class='table table-bordered' >
              <tbody>
                <tr>
                  <td scope='col' colspan='12' class='text-right'><p><small><em>Fecha y hora impresion : ".date('Y-m-d H:i:s')."</small></em></p></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>";
return $cadena;
}

function Armar_tabla($id_asignacion)
{
	$asignacion = new Asignacion();
	$resultado = $asignacion->getConsultaequipos_acta($id_asignacion);
	$tabla="";
	if (isset($resultado)) {
            for ($i = 0; $i < sizeof($resultado); $i++) {
            	$tabla = $tabla. "<tr>";
                $tabla = $tabla. "<td scope='col' colspan='2'>" . $resultado[$i]['serial_equipo'] . "</td>";
                $tabla = $tabla. "<td scope='col' colspan='2'>" . $resultado[$i]['nombre_tipo_equipo'] . "</td>";
                $tabla = $tabla. "<td scope='col' colspan='2'>" . $resultado[$i]['nombre_modelo'] . "</td>";
                $tabla = $tabla. "<td scope='col' colspan='2'>" . $resultado[$i]['nombre_marca'] . "</td>";
                $tabla = $tabla. "<td scope='col' colspan='2'>0</td>";
                $tabla = $tabla. "<td scope='col' colspan='2'>0</td>";
                $tabla = $tabla. "</tr>";
            }
        } else {
            $tabla = $tabla. "<tr>";
            $tabla = $tabla. "<td>No existen funcionarios</td>";
            $tabla = $tabla. "</tr>";
        }
    return $tabla;
}
//Reemplaza URL de la imagen
//$cadena = str_replace('<img src='../imagenes/logo_lunel.png' class='img-fluid'>', '<img src='../../imagenes/logo_lunel.png' >', $_GET['tabla']);

function crear_pdf($inicio,$cadena,$asignacion)
{
global $dompdf;
	//Unimos
$script='<script type="text/php">
$pdf->text(100, 100, "Pagina {$PAGE_NUM} de {$PAGE_COUNT}", $fontMetrics->getFont("Arial"), 10, array(0, 0, 0));
</script>';
$cadena_final = $inicio . $cadena.$script;
$dompdf->loadHtml($cadena_final);
// Colocamos als propiedades de la hoja
$dompdf->setPaper('A4', 'landscape');
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream('Acta-entrega-'.$asignacion);


}


