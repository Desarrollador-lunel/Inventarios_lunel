<?php
	require 'funcs/funcs.php';

	$errors = array ();

	if (!empty($_POST)) {
		$email = $mysqli->real_escape_string($_POST['email']);
	

		if (!isEmail($email)) {
			$errors[] = "Debe ingresar un correo electronico valido";
		}

			if(emailExiste($email)){
				//valido el id y el nombre del correo ingresado
				$user_id = getValorid('id_usuario', 'correo', $email);
				$nombre = getValor('nombre', 'correo', $email);

				$token = generaTokenPass($user_id);

				$url = 'http://'.$_SERVER["SERVER_NAME"].'/inventario/vista/usuario/cambia_pass.php?user_id='.$user_id.'&token='.$token;
					
				$asunto = 'Recuperar Password - Sistema de Usuarios';
				$cuerpo = "
				<!doctype html>
<html ⚡4email>
 <head><meta charset='utf-8'><style amp4email-boilerplate>body{visibility:hidden}</style><script async src='https://cdn.ampproject.org/v0.js'></script> 
   
  <style amp-custom>
@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px; line-height:150% } h1 { font-size:20px; text-align:center; line-height:120% } h2 { font-size:16px; text-align:left; line-height:120% } h3 { font-size:20px; text-align:center; line-height:120% } h1 a { font-size:20px } h2 a { font-size:16px; text-align:left } h3 a { font-size:20px } .es-menu td a { font-size:14px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:10px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class='gmail-fix'] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:block } a.es-button { font-size:14px; display:block; border-left-width:0px; border-right-width:0px } .es-btn-fw { border-width:10px 0px; text-align:center } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } .es-m-p0 { padding:0px } .es-m-p0r { padding-right:0px } .es-m-p0l { padding-left:0px } .es-m-p0t { padding-top:0px } .es-m-p0b { padding-bottom:0 } .es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } .es-desk-hidden { display:table-row; width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } .es-desk-menu-hidden { display:table-cell } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } }
.es-p15 {
	padding:15px;
}
.es-p35t {
	padding-top:35px;
}
.es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {
	line-height:120%;
	font-size:12px;
	color:rgb(204, 204, 204);
}
.es-p15t {
	padding-top:15px;
}
.es-p35r {
	padding-right:35px;
}
.es-content-body a {
	color:rgb(11, 83, 148);
}
.es-header-body p, .es-header-body ul li, .es-header-body ol li {
	color:rgb(51, 51, 51);
	font-size:14px;
}
.es-p5 {
	padding:5px;
}
.es-footer-body {
	background-color:transparent;
}
.es-p35b {
	padding-bottom:35px;
}
.es-menu td a img {
	display:inline-block;
}
.es-header {
	background-color:transparent;
}
.es-p15r {
	padding-right:15px;
}
.es-footer {
	background-color:transparent;
}
.es-p35l {
	padding-left:35px;
}
.es-p15l {
	padding-left:15px;
}
.es-p20 {
	padding:20px;
}
.es-p10t {
	padding-top:10px;
}
.es-p30r {
	padding-right:30px;
}
.es-p10r {
	padding-right:10px;
}
.es-button-border {
	border-style:solid solid solid solid;
	border-color:rgb(61, 92, 163) rgb(61, 92, 163) rgb(61, 92, 163) rgb(61, 92, 163);
	background:rgb(255, 255, 255);
	border-width:2px 2px 2px 2px;
	display:inline-block;
	border-radius:10px;
	width:auto;
}
.es-p30l {
	padding-left:30px;
}
p, ul li, ol li {
	font-size:16px;
	font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;
	line-height:150%;
}
.es-p15b {
	padding-bottom:15px;
}
.es-p30t {
	padding-top:30px;
}
table tr {
	border-collapse:collapse;
}
.es-p30b {
	padding-bottom:30px;
}
.es-p10b {
	padding-bottom:10px;
}
h1, h2, h3, h4, h5 {
	Margin:0;
	line-height:120%;
	font-family:arial, 'helvetica neue', helvetica, sans-serif;
}
.es-footer-body a {
	color:rgb(51, 51, 51);
	font-size:14px;
}
.es-p10l {
	padding-left:10px;
}
.es-right {
	float:right;
}
h2 a {
	font-size:14px;
}
.es-p10 {
	padding:10px;
}
.es-header-body {
	background-color:rgb(255, 255, 255);
}
a.es-button {
	border-style:solid;
	border-color:rgb(255, 255, 255);
	border-width:15px 20px 15px 20px;
	display:inline-block;
	background:rgb(255, 255, 255);
	border-radius:10px;
	font-size:14px;
	font-family:arial, 'helvetica neue', helvetica, sans-serif;
	font-weight:bold;
	font-style:normal;
	line-height:120%;
	color:rgb(61, 92, 163);
	text-decoration:none;
	width:auto;
	text-align:center;
}
img {
	display:block;
	border:0;
	outline:none;
	text-decoration:none;
}
.es-content, .es-header, .es-footer {
	table-layout:fixed;
	width:100%;
}
.es-p35 {
	padding:35px;
}
.es-p25t {
	padding-top:25px;
}
.es-p25r {
	padding-right:25px;
}
h1 {
	font-size:20px;
	font-style:normal;
	font-weight:normal;
	color:rgb(51, 51, 51);
}
ul li, ol li {
	Margin-bottom:15px;
}
h2 {
	font-size:14px;
	font-style:normal;
	font-weight:normal;
	color:rgb(51, 51, 51);
}
h3 {
	font-size:20px;
	font-style:normal;
	font-weight:normal;
	color:rgb(51, 51, 51);
}
p, hr {
	Margin:0;
}
.es-infoblock a {
	font-size:12px;
	color:rgb(204, 204, 204);
}
.es-wrapper-color {
	background-color:rgb(250, 250, 250);
}
.es-p25b {
	padding-bottom:25px;
}
.es-p40 {
	padding:40px;
}
.es-p25l {
	padding-left:25px;
}
.es-wrapper {
	width:100%;
	height:100%;
}
html, body {
	width:100%;
	font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;
}
table {
	border-collapse:collapse;
	border-spacing:0px;
}
.es-content-body p, .es-content-body ul li, .es-content-body ol li {
	color:rgb(102, 102, 102);
}
.es-p25 {
	padding:25px;
}
table td, html, body, .es-wrapper {
	padding:0;
	Margin:0;
}
.es-p20t {
	padding-top:20px;
}
.es-p40r {
	padding-right:40px;
}
a {
	font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;
	font-size:16px;
	text-decoration:none;
}
a[x-apple-data-detectors] {
	color:inherit;
	text-decoration:none;
	font-size:inherit;
	font-family:inherit;
	font-weight:inherit;
	line-height:inherit;
}
.es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {
	color:rgb(51, 51, 51);
	font-size:14px;
}
.es-p20r {
	padding-right:20px;
}
.es-p40l {
	padding-left:40px;
}
.es-menu td {
	border:0;
}
.es-left {
	float:left;
}
.es-p5b {
	padding-bottom:5px;
}
.es-p40t {
	padding-top:40px;
}
.es-menu td a {
	text-decoration:none;
	display:block;
}
.es-button {
	text-decoration:none;
}
.es-p40b {
	padding-bottom:40px;
}
s {
	text-decoration:line-through;
}
.es-p20b {
	padding-bottom:20px;
}
.es-p5l {
	padding-left:5px;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
}
.es-p20l {
	padding-left:20px;
}
h1 a {
	font-size:20px;
}
.es-content-body {
	background-color:rgb(255, 255, 255);
}
.es-p5t {
	padding-top:5px;
}
h3 a {
	font-size:20px;
}
.es-p5r {
	padding-right:5px;
}
.es-p30 {
	padding:30px;
}
.es-header-body a {
	color:rgb(19, 118, 200);
	font-size:14px;
}
</style> 
 </head> 
 <body> 
  <div class='es-wrapper-color'> 
   <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0'> 
     <tr> 
      <td valign='top'> 
       <table cellpadding='0' cellspacing='0' class='es-content' align='center'> 
         <tr> 
          <td class='es-adaptive' align='center'> 
           <table class='es-content-body' style='background-color: transparent;' width='600' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'> 
             <tr> 
              <td class='es-p10' align='left'> 
               <table width='100%' cellspacing='0' cellpadding='0'> 
                 <tr> 
                  <td width='580' valign='top' align='center'> 
                   <table width='100%' cellspacing='0' cellpadding='0'> 
                     <tr> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class='es-content' cellspacing='0' cellpadding='0' align='center'> 
         <tr> 
          <td style='background-color: #FAFAFA;' bgcolor='#fafafa' align='center'> 
           <table class='es-content-body' style='background-color: #FFFFFF;' width='600' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'> 
             <tr> 
              <td class='es-p20t es-p20r es-p20l' align='left'> 
               <table cellpadding='0' cellspacing='0' width='100%'> 
                 <tr> 
                  <td width='560' align='center' valign='top'> 
                   <table cellpadding='0' cellspacing='0' width='100%'> 
                     <tr> 
                      <td align='center'><a target='_blank'><img class='adapt-img' src='cid:logo' alt style='display: block;' width='175' height='89' layout='responsive'></img></a></td> 
                     </tr>
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr> 
              <td class='es-p40t es-p20r es-p20l' style='background-color: transparent; background-position: left top;' bgcolor='transparent' align='left'> 
               <table width='100%' cellspacing='0' cellpadding='0'> 
                 <tr> 
                  <td width='560' valign='top' align='center'> 
                   <table style='background-position: left top;' width='100%' cellspacing='0' cellpadding='0'> 
                     <tr> 
                      <td class='es-p5t es-p5b' align='center'><a target='_blank'><img class='adapt-img' src='cid:logocandado' alt style='display: block;' width='175' height='208'></img></a></td> 
                     </tr>  
                     <tr> 
                      <td class='es-p40r es-p40l' align='center'><p>HOLA,&nbsp;$nombre</p></td> 
                     </tr> 
                     <tr> 
                      <td class='es-p35r es-p40l' align='center'><p>Se ha solicitado un reinicio de contrase&ntilde;a</p></td> 
                     </tr> 
                     <tr> 
                      <td class='es-p25t es-p40r es-p40l' align='center'><p>Para restaurar la contrase&ntilde;a, dar clic en el siguiente bot&oacute;n:</p></td> 
                     </tr> 
                     <tr> 
                      <td class='es-p40t es-p40b es-p10r es-p10l' align='center'><span class='es-button-border'><a href='$url' class='es-button' target='_blank'>Cambio de contrase&ntilde;a</a></span></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr> 
              <td class='es-p5t es-p20b es-p20r es-p20l' style='background-position: left top;' align='left'> 
               <table width='100%' cellspacing='0' cellpadding='0'> 
                 <tr> 
                  <td width='560' valign='top' align='center'> 
                   <table width='100%' cellspacing='0' cellpadding='0'> 
                     <tr> 
                      <td align='center'><p style='font-size: 14px;'>Contacto : <a target='_blank' style='font-size: 14px; color: #666666;' href='tel:123456789'>(+57) 937 0973</a>&nbsp;| <a target='_blank' href='mailto:your@mail.com' style='font-size: 14px; color: #666666;'>proyectos@lunel-ie.com</a></p></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table></td> 
     </tr> 
   </table> 
  </div>  
 </body>
</html>";	

				if (enviarEmail($email, $nombre, $asunto, $cuerpo)) { ?>

					<script language="javascript">
						alert("Hemos enviado un correo electrónico para restablecer tu password");
						window.location="../login/index.php";
					</script>
					<?php  
					//echo "hemos enviado un correo electronico a la direccion $email para restablecer tu password.<br />";
					//echo "<a href='index.php'>Iniciar Sesion</a>";
					exit;

				} else {
					$errors[] = "Error al enviar Email $email";
				}
			} else {
				$errors[] = "No existe el correo electronico";
			}  
	}

	

	
	
?>
<html>
	<head>
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap-theme.min.css" >
		<script src="../../librerias/bootstrap/js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >
					<div class="panel-heading">
						<div class="panel-title">Recuperar Password</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../login/index.php">Iniciar Sesi&oacute;n</a></div>
					</div>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email" required>                                        
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 control">
									
								</div>
							</div>    
						</form>
						<?php echo resultBlock($errors) ?>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							