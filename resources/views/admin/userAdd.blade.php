@extends('layout.admin')
@section('u_name',$user['name'])
@section('u_headimg',$user['headimg'])
{{ $user['active'] = 'user_add' }}
{{ $user['nav_active'] = 'user' }}

@section('menu')
    <ul class="nav nav-pills nav-stacked custom-nav">
        @foreach($user['menu'] as $key=>$value)
            <li class="<?php if(!empty($value['list'])){echo 'menu-list';}if(isset($user['active']) && $user['active'] == $key){echo ' active';}if(isset($user['nav_active']) && $user['nav_active']==$key){echo ' nav-active';} ?>"><a href="{{ url($value['url']) }}"><i class="{{ $value['fa'] }}"></i> <span>{{ $value['name'] }}</span></a>
                @if(!empty($value['list']))
                    <ul class="sub-menu-list">
                        @foreach($value['list'] as $k=>$v)
                            <li <?php if(isset($user['active']) && $user['active'] == $k){echo 'class="active"';} ?>><a href="{{ url($v['url']) }}"> {{ $v['name'] }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@stop

@section('content')
    <style>
        .img{
            width: 200px;
            height:200px;
        }
    </style>
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        添加用户
                    </header>
                    <form role="form">
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>姓名</label>
                                    <input type="text" class="form-control" id="name" placeholder="姓名" style="width: 60%;">
                                </div>
                                <div class="form-group">
                                    <label>邮箱</label>
                                    <input type="text" class="form-control" id="email" placeholder="邮箱" style="width: 60%;">
                                </div>
                                <div class="form-group">
                                    <label>电话</label>
                                    <input type="text" class="form-control" id="phone" placeholder="电话" style="width: 60%;">
                                </div>
                                <div class="form-group">
                                    <label>个人签名</label>
                                    <textarea type="text" class="form-control" id="signature" placeholder="个人签名"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                头像
                                <div class="form-group">
                                    <img src="https://sys.loodp.com/public/upload/headimg/20170425142808.jpg" class="img" />
                                </div>
                                <button type="button" class="btn uploadimg" onclick="uploadimg()">上传图片</button>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-center ">
                                    {{ csrf_field() }}
                                    <a class="btn btn-info btn-lg" onclick="putContents()"> 提交 </a>
                                    <a class="btn btn-default btn-lg" target="_blank" href="https://www.baidu.com"> 取消 </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </section>
    <script src="{{ url('public/asset') }}/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        function uploadimg()
        {
            alert(1);
        }
        function putContents()
        {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var signature = $('#signature').val();
            var token = $("input[name='_token']").val();
            if(name == ''){
                alert('请输入姓名');
                return false;
            }
            if(email == ''){
                alert('请输入邮箱');
                return false;
            }
            if(!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(email)){
                alert('邮箱格式不合法');
                return false;
            }
            if(phone == ''){
                alert('请输入电话号');
                return false;
            }
            if(!(/^1[34578]\d{9}$/.test(phone))){
                alert('手机号不合法');
                return false;
            }
            $.ajax({
                type: "POST",
                url: "{{ url('api/user/add') }}",
                data: {'name':name,'email':email,'phone':phone,'signature':signature,'_token':token},
                dataType: "json",
                success: function(data){
                    var code = data.code;
                    if(code != 0){
                        alert(data.msg);
                        return false;
                    }
                    alert('用户添加成功');
                    window.location.href = '{{ url('admin/user/list') }}';
                },
                error: function(data)
                {
                    alert('创建失败，请检查输入信息！');
                }
            });
        }
    </script>
@stop

@section('link')
    <script src="{{ url('public/asset') }}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="{{ url('public/asset') }}/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ url('public/asset') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('public/asset') }}/js/modernizr.min.js"></script>
    <script src="{{ url('public/asset') }}/js/jquery.nicescroll.js"></script>

    <!--common scripts for all pages-->
    <script src="{{ url('public/asset') }}/js/scripts.js"></script>
@stop

