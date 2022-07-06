@extends('layout.home')
@section('content')
	<div class="container" style="padding:8%;width:60%">
		<div class="">
			<!-- Modal content-->
			<div class="">
				<div class="">
					<div class="">
						<h3 class="agileinfo_sign">Đăng nhập </h3>
						<p>
                            Đăng nhập ngay bây giờ, Hãy bắt đầu Mua sắm hàng tạp hóa của bạn. Không có tài khoản?
							<a href="{{url('/dang-ky')}}">
                                Đăng ký ngay</a>
						</p>
						<form id="Signin" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" placeholder="E-mail" id="email" name="Name" required="">
                                <div class="text-danger" id="error_email"></div>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Mật khẩu" id="password" name="password" required="">
                                <div class="text-danger" id="error_password"></div>
							</div>
							<input type="submit" value="Đăng nhập">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
    <script>
        $(document).ready(function() {

            $('#Signin').submit(function(e) {
                e.preventDefault();
                $('#error_email').html("");
                $('#error_password').html("");
                var email = $('#email').val();
                var password = $('#password').val();
                $.ajax({
                    url:"{{url('/signin')}}",
                    data: {
                        email: email,
                        password: password
                    },
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(e){
                        if(e==2){
                            $('#error_email').html("Tài khoản không tồn tại");
                        }else if(e==1){
                            window.location.href="{{url('/')}}";
                        }else{
                            window.location.href="{{url('/dashboard')}}";
                        }
                   },
                    error:function(e){
                       console.log(e.responseJSON.errors);
                       $('#error_email').html(e.responseJSON.errors.email);
                       $('#error_password').html(e.responseJSON.errors.password);
                    }
                });
            })
        });
    </script>
@endsection
