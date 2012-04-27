<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		require_once('instagram-curl.php');

		$test = new InstagramCurl('Curly', '15998.f59def8.3516b1fc823f41d89df8c0fa51b4ed08');

		echo '<pre>';
		print_r( json_decode( $test->media() ) );
		echo '</pre>';
	?>
</body>
</html>