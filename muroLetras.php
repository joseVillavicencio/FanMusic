<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title>Abr&iacute;r di&aacute;logo con jQuery</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="css/jquery.dialog.css" rel="stylesheet" type="text/css"><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="js/jquery.dialog.js" type="text/javascript"></script><!--NECESARIA PARA EL DIALOG/IMAGEN-->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script src="js/funcionesClub.js" type="text/javascript"></script>
	<script type="text/javascript">
		function VerCondiciones(){

          $("#dialog2").dialog({ show: "blind",
			  hide: "blind",
			  width: 500
		  });

		}
	</script>
	</head>
<body>
<div id="dialog2" style="display: none;" title="T&iacute;tulo del popup">
		<div style="width: 460px; height: 190px;" id="int_dialog">
			<div style="text-align: justify; font-size: 13px; width: 450px;">
				<script type="text/javascript">
					verLetras("#dialog2");
				</script>
			</div>
		</div>
</div>

	<!--<div style="padding-top:10px; padding-left:210px;">
		<a onclick="VerCondiciones();" style="cursor: pointer; text-decoration: underline;">Abrir di&aacute;logo</a>
	</div>-->
</body>
</html>

