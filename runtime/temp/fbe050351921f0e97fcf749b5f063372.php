<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\WWW\shawn\public/../application/admin\view\index\index.html";i:1489291007;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>snake后台</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
	<link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">

	<link href="__CSS__/animate.min.css" rel="stylesheet">
	<link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="middle-box text-center animated fadeInDown">
	<h1>Shawn</h1>
	<div class="error-desc">
		<h3> 当前时间 : <span id="time" ></span> </h3>
		<h3> homepage : http://www.xuchaobing.com </h3>
        <h3> email : 942409479@qq.com </h3>
	</div>
</div>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
</body>
<script type="text/javascript">
	setInterval(function() {
		var now = (new Date()).toLocaleString();
		$("#time").html(now)
	}, 1000);
</script>
</html>
