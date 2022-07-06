@extends('layout.admin')
@section('content')
<div class="container">
            <!-- Nested Row within Card Body -->
            <div class="row" >
                    <div class="" style="width:100%">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Sửa tài khoản!</h1>
                        </div>
                        <form class="user" id="Signup">
                            <div class="form-group">
                                <input type="name" class="form-control form-control-user" id="name"
                                    placeholder="Họ tên" value="{{$admin->name}}">
                                    <div class="text-danger" id="error_name"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email"
                                    placeholder="Email" disabled value="{{$admin->email}}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="password1" placeholder="Mật khẩu">
                                        <div class="text-danger" id="error_password"></div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="password2" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng ký">

                            <hr>
        </div>
    </div>

</div>
<script>
    $('#Signup').submit(function(e) {
    e.preventDefault();
    $('#error_name').html("");
    $('#error_password').html("");
    var email = $('#email').val();
    var name = $('#name').val();
    var password = $('#password1').val();
    $.ajax({
        url:"{{url('/dashboard/employee/update/'.$admin->id)}}",
        data: {
            email: email,
            name: name,
            password: password
        },
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(){
           window.location.href="{{ url('/dashboard/employee/index') }}";
       },
        error:function(e){
           console.log(e.responseJSON.errors);
           $('#error_name').html(e.responseJSON.errors.name);
           $('#error_password').html(e.responseJSON.errors.password);
        }
    });
});
</script>
<script>
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}

function validatePassword() {
var pass2 = document.getElementById("password2").value;
var pass1 = document.getElementById("password1").value;
if (pass1 != pass2)
   document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
   document.getElementById("password2").setCustomValidity('');
//empty string means no validation error
}
</script>
@endsection
