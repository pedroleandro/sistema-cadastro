<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
</head>
<body>
<!-- Conteúdo -->

<div>
	<?php
	require 'vendor/autoload.php';
	use Nahid\JsonQ\Jsonq;
	$q = new Jsonq('forms/data.json');
	$res = $q->from('products')->where('cat', '=', 2)->get();
	echo "<pre>";
	print_r($res);
	?>
</div>

</body>
</html>

