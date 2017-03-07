<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"C:\wamp\www\shawn\public/../application/admin\view\login.html";i:1488864469;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>后台管理系统 - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

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
                <input type="text" class="form-control" id="code" placeholder="验证码" required="" style="color:black;width:120px;float:left;margin:0px 0px;margin-top:5px;" >
                <img src="<?php echo captcha_src(); ?>" onclick="javascript:this.src='<?php echo captcha_src(); ?>?tm'+Math.random();" alt="captcha" style="float:right;cursor:pointer;width:170px;" />
            </div>
            <input class="btn btn-primary block full-width m-b" id="login_btn" value="登 录" style="margin-top:70px;" >

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
                    $("#err_msg").show().html("<span style='color:red'>" + data.msg + "</span>");
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
