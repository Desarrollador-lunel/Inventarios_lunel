 <?php  
  include '../librerias/Excel/PHPExcel/IOFactory.php'; 
  include dirname(__file__, 2) . '/modelo/asignacion.php';
  $asignacion = new Asignacion();
  $mensajeserial="";
  $mensaje="";
  $consecutivo="";
  $tipo  = isset($_POST['tipo'])? $_POST['tipo'] : "";
  //$tipo  =  isset($_GET['tipo'])?$_GET['tipo']:"";
  $id      = isset($_POST['pkID'])? $_POST['pkID'] : ""; 
  $fecha_asignacion  = isset($_POST['fecha_asignacion'])? $_POST['fecha_asignacion'] : "";
  $fkID_tipo_movimiento  = isset($_POST['fkID_tipo_movimiento'])? $_POST['fkID_tipo_movimiento'] : "";
  $fkID_persona_entrega  = isset($_POST['fkID_persona_entrega'])? $_POST['fkID_persona_entrega'] : "";
  $fkID_persona_recibe  = isset($_POST['fkID_persona_recibe'])? $_POST['fkID_persona_recibe'] : "";
  $fkID_proyecto  = isset($_POST['fkID_proyecto'])? $_POST['fkID_proyecto'] : "";
  $observacion  = isset($_POST['observacion'])? $_POST['observacion'] : "";

    if ($tipo == 'crearasignacionla') {
	    if (isset($_FILES['file']["name"])) {
             $nombre =$_FILES['file']["name"];
        }
        $arrayString = explode(".", $nombre); //array(archivo1, xls) para dividir nombre
		    $extension = end($arrayString); //xls, toma la extensión

		if($extension == "xls" || $extension == "xlsx" ){
      //echo "Es valido";
      if ($asignacion->insertaasignacionl($fecha_asignacion,1,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_proyecto,$observacion)){;
            $fkID_asignacion = validar_ultima_asignacion();
            $destino = "../server/php/Carga_temporal/" . $nombre;  
            if(move_uploaded_file($_FILES['file']["tmp_name"], $destino)) {        
                Leer_archivo($destino,$fkID_asignacion);              
            }
          } else {
            echo "no inserto";
          }
		}else{
			echo $extension;
		}
    //elimina el archivo cargado 
    unlink($destino);
    //array con la respuesta del procedimientp
    $m = array(
    "respuesta" => $mensaje,
    "seriales" => $mensajeserial,
    );
    echo json_encode($m);
    };


    function Leer_archivo($destino,$fkID_asignacion){
    	//Variable con el nombre del archivo
		$nombreArchivo = $destino;
		// Cargo la hoja de cálculo
		$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
		//Asigno la hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
		//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		for ($i = 2; $i <= $numRows; $i++) {	
			$serial = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
      validacion_serial($serial,$fkID_asignacion);	
		}
    }

    function validar_ultima_asignacion()
    {  
      $asignacion = new Asignacion();
      $resultado = $asignacion->validacionultimaasignacion();
      if ($resultado) {
          return $resultado[0]["id"];
      } else {
          return 'No se consulto';
      }
    }

    function validacion_serial($serial,$fkID_asignacion)
    { 
      GLOBAL $fkID_persona_entrega, $fecha_asignacion, $fkID_persona_recibe,$mensajeserial,$mensaje;
      $asignacion = new Asignacion();
      $resultado = $asignacion->validacionserial($serial);
      if ($resultado) {
          if ($resultado[0]["canti"]>0) {
            $resultado2 = $asignacion->validacionserialasignado($resultado[0]["id_equipo"]);
              if ($resultado2[0]["cantidad"]<1) {
                if ($asignacion->insertaEquipoasignacion($resultado[0]["id_equipo"],$fkID_asignacion)) {
                      if ($asignacion->insertaHistorico($resultado[0]["id_equipo"],$fkID_persona_entrega,$fkID_persona_recibe,$fkID_asignacion,$fecha_asignacion)) {
                          $mensaje= "listo";
                      }
                } else {
                    $mensaje= "fallo";
                }
              } else {
                $mensajeserial = $mensajeserial . $serial . ",  ";
              }
          } else {
            $mensajeserial = $mensajeserial . $serial . ",  ";
          }
      } else {
          $mensaje= "fallo";
      }
      $resultado3 = $asignacion->validacionasignacion($fkID_asignacion);
      if ($resultado3) {
        if ($resultado3[0]["contador"]<1) {
          if ($asignacion->eliminarasignacion($fkID_asignacion)){
            $mensaje = "eliminado";
          }
        }
      }
    }

?>