 <?php  
  require '../librerias/PHPExcel/IOFactory.php'; 
  include dirname(__file__, 2) . '/modelo/asignacion.php';
  $asignacion = new Asignacion();
  $mensajeserial="";
  $tipo  = isset($_POST['tipo'])? $_POST['tipo'] : "";
  $tipo  =  isset($_GET['tipo'])?$_GET['tipo']:"";
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

		if($extension != "xls" || $extension != "xlsx" ){
		  echo "No es valido";
		}else{
			if ($empleado->insertar_asignacionl($fecha_asignacion,$fkID_tipo_movimiento,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_proyecto,$observacion)){;
            $fkID_asignacion = validar_ultima_asignacion();
		        $destino = "../server/php/Carga_temporal/" . $nombre;  
            if(move_uploaded_file($_FILES['file']["tmp_name"], $destino)) {        
                Leer_archivo($destino,$fkID_asignacion);              
            }
          }
		}
            
    };

    function insertar_asignacionl($fecha_asignacion,$fkID_tipo_movimiento,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_proyecto,$observacion){
    	if ($asignacion->insertaasignacionl($fecha_asignacion,1,$fkID_tipo_movimiento,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_proyecto,$observacion)) {  
	    } else {
	        echo $r='0';
	    }
    }


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
      $resultado = $asignacion->validacionultimaasignacion();
      if ($resultado) {
          $fila= mysql_fetch_array ($resultado);
          return $fila["id"];
      } else {
          return 'No se consulto';
      }
    }

    function validacion_serial($serial,$fkID_asignacion)
    {
      $resultado = $asignacion->validacionserial($serial);
      if ($resultado) {
          $fila= mysql_fetch_array ($resultado);
          if ($fila["canti"]>0) {
             if ($equipo->insertaEquipo($_GET)) {
                if ($equipo->insertaInventario($_GET)) {
                    if ($equipo->insertaHistorico($_GET)) {
                        return 'Se guardo';
                    }
                }
            } else {
                return 'No se guardo';
            }
          } else {
            $mensajeserial = $mensajeserial . ", " . $serial;
          }
          
          echo json_encode($resultado); //imprime el json
      } else {
          return 'No se consulto';
      }
    }






?>