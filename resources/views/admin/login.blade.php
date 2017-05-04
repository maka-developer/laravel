<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="{{ url('public/asset') }}/css/style.css" rel="stylesheet">
    <link href="{{ url('public/asset') }}/css/style-responsive.css" rel="stylesheet">

</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="">
        <div class="form-signin-heading text-center">
            <img src="{{ url('public/asset') }}/images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control user" placeholder="User ID" autofocus>
            <input type="password" class="form-control pass" placeholder="Password">
            {{ csrf_field() }}
            <button class="btn btn-lg btn-login btn-block" type="submit" onclick="return verify()">
                <i class="fa fa-check"></i>
            </button>
        </div>
    </form>

</div>

<script type="text/javascript">
    function verify()
    {
        var user = $('.user').val();
        var pass = $('.pass').val();
        var token = $("input[name='_token']").val();
        if(user == '' || pass==''){
            alert('请输入用户名或密码！');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "{{ url('api/login') }}",
            data: {'user':user,'pass':pass,'_token':token},
            dataType: "json",
            success: function(data){
                if(data.code == 10){
                    alert('用户名或密码不正确！');
                }else if(data.code == 200){
                    window.location.href = '{{ url('admin') }}';
                }
            },
            error: function(data)
            {
                alert('系统错误，请稍后再试！');
            }
        });

        return false;
    }
</script>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{ url('public/asset') }}/js/jquery-1.10.2.min.js"></script>
<script src="{{ url('public/asset') }}/js/bootstrap.min.js"></script>
<script src="{{ url('public/asset') }}/js/modernizr.min.js"></script>

</body>
</html>
