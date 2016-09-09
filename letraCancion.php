<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>jQuery UI Dialog - Uso básico</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
$(function () {
$("#dialog").dialog();
});
</script>
</head>

<body>
Diálogo:
<div id="dialog" title="Dialogo básico">
<p>Diálogo básico amodal. Puede ser movido, redimensionado y cerrado haciendo clic sobre el botón 'X'.</p>
</div>
</body>
</html>