<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"C:\wamp\www\shawn\public/../application/admin\view\login.html";i:1488861387;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>素材火www.sucaihuo.com - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href="__CSS__/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="__CSS__/font-awesome.css?v=4.3.0" rel="stylesheet">

    <link href="__CSS__/animate.css" rel="stylesheet">
    <link href="__CSS__/style.css?v=2.2.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location
        };
    </script>

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">H+</h1>

        </div>
        <h3>欢迎使用 H+</h3>

        <form class="m-t" role="form" method="post" action="index.html">
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="用户名" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="密码" required="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="code" placeholder="验证码" required="">
            </div>
            <input class="btn btn-primary block full-width m-b" id="login_btn" value="登 录">

            <p class="text-muted text-center" id="err_msg"></p>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="__JS__/jquery-2.1.1.min.js"></script>
<script src="__JS__/bootstrap.min.js?v=3.4.0"></script>
<script>
    document.onkeydown = function (event) {
        var e = event || window.event || arguments.collee.coller.arguments[0];
        if (e && 13 == e.keyCode) { // enter 键
            $("#login_btn").click();
        }
    };
    var lock = false;
    $(function () {
        $("#login_btn").click(function () {
            if (lock) {
                return;
            }
            lock = true;
            $("#err.msg").hide();
            $("#login_btn").removeClass("btn-primary").addClass("btn-danger").val("登录中...");
            var username = $('#username').val();
            var password = $('#password').val();
            var code = $("#code").val();
            $.post("<?php echo url('login/doLogin'); ?>", {
                'username': username,
                'password': password,
                'code': code
            }, function (data) {
                lock = false;
                $("#login_btn").removeClass('btn-danger').addClass('btn-primary').val('登 录');
                if (1 != data.code) {
                    $("#err_msg").show().html("<span style='red'>" + data.msg + "</span>");
                    return;
                } else {
                    window.location.href = data.data;
                }
            });
        });

    });
</script>

</body>
</html>
