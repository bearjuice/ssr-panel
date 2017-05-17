<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>系统登录</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="https://o3hyb3eh5.qnssl.com/ss/asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link href="https://o3hyb3eh5.qnssl.com/ss/asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="https://o3hyb3eh5.qnssl.com/ss/asset/css/blue.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>萌狼SSR</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录到后台</p>

        <div id="msg-success" class="alert alert-info alert-dismissable" hidden="true">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> 登录成功!</h4>
            <p id="msg-success-p"></p>
        </div>

        <div id="msg-error" class="alert alert-warning alert-dismissable" hidden="true">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
            <p id="msg-error-p"></p>
        </div>
        <form>
            <div class="form-group has-feedback">
                <input id="email" name="Email" type="text" class="form-control" placeholder="邮箱"/>
                <span  class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="passwd" name="Password" type="password" class="form-control" placeholder="密码"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div id="captcha-gee" class="form-group has-feedback">

            </div>
        </form>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input id="remember_me" value="week" type="checkbox"> 记住我
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button id="login" type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
            </div><!-- /.col -->
        </div>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="https://o3hyb3eh5.qnssl.com/ss/asset/js/jQuery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="https://o3hyb3eh5.qnssl.com/ss/asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="https://o3hyb3eh5.qnssl.com/ss/asset/js/icheck.min.js" type="text/javascript"></script>

<script src="https://static.geetest.com/static/tools/gt.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#login").click(function(){
            $.ajax({
                type:"POST",
                url:"action/_login.php",
                dataType:"json",
                data:{
                    email: $("#email").val(),
                    passwd: $("#passwd").val(),
                    remember_me: $("#remember_me").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide();
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='index.php'", 2000);
                    }else{
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("后台错误："+jqXHR.status);
                }
            });
        })
    });
</script>
</body>
</html>