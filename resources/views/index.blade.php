<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		{!! $mapHelper->render($map) !!}
		{!! $apiHelper->render([$map]) !!}
	</body>
</html>