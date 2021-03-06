<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\WWW\shawn\public/../application/admin\view\login.html";i:1489288198;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>shawn后台管理系统 - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css" rel="stylesheet">
    <link href="__CSS__/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <h4>欢迎使用 <strong>shawn</strong></h4>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="index.html">
                    <p class="m-t-md" id="err_msg" >登录到shawn</p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="username" id="username" />
                    <input type="password" class="form-control pword m-b" placeholder="密码" name="password" id="password" />
                    <input type="text" class="form-control" name="code" id="code" style="color:black;width:120px;float:left;margin:0px 0px;margin-bottom:20px;" placeholder="验证码" />
                    <img src="<?php echo captcha_src(); ?>" onclick="javascript:this.src='<?php echo captcha_src(); ?>?tm'+Math.random();" alt="captcha" style="float:right;cursor:pointer;margin-top:2px;" />
                    <input class="btn btn-success btn-block" id="login_btn" value="登录" >
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2017 All Rights Reserved. shawn
            </div>
        </div>
    </div>
    <script src="__JS__/jquery.min.js?v=2.1.4"></script>
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
                $("#err_msg").hide();
                $("#login_btn").removeClass("btn-success").addClass("btn-danger").val("登录中...");
                var username = $('#username').val();
                var password = $('#password').val();
                var code = $("#code").val();
                $.post("<?php echo url('login/doLogin'); ?>", {
                    'username': username,
                    'password': password,
                    'code': code
                }, function (data) {
                    lock = false;
                    $("#login_btn").removeClass('btn-danger').addClass('btn-success').val('登 录');
                    if (1 != data.code) {
                        $("#code").next('img').click();
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