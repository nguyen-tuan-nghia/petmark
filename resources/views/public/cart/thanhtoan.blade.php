@extends('layout.home')
@section('content')
<div  style="text-align: center;margin:100px;font-size:20px">
    <label>Các hình thức thanh toán</label>
    <div class="row">
    <div class="col-sm-6" style="padding-left:35%">
        <button class="btn btn-primary" id="pay_by_cash" style="border-radius: 20px;width: 170px;color:white" type="submit">Đặt hàng</button>
    </div>
    <div class="col-sm-6">
    <form action="{{url('/create-vnpay')}}" id="frmCreateOrder" method="post">
        @csrf
    <button style="border-radius: 20px;width: 170px;background: #FFD823FF;" class="btn btn-default check_out" id="vnpay_button" type="submit"><strong><span style="color:red">VN</span>
    <span style="color:blue;">PAY</span></strong></button>
</form>
    </div>
</div>
</div>
<script>
    $("#pay_by_cash").click(function() {
        $.ajax({
            url: "{{ url('/order/store') }}",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data == 1) {
                    Swal.fire({
                        title: "Đặt hàng thành công",
                        text: "Đơn hàng của bạn sẽ được cập nhật sau giây lát",
                        icon: "success",
                    });
                    window.location.href = "{{ url('/') }}";
                } else {
                    Swal.fire({
                        title: "",
                        text: "Bạn chưa có sản phẩm trong giỏ hàng",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "<a style='color:white' href='{{ url('/') }}'><i class='la la-headphones'></i>Mua ngay</a>",
                        showCancelButton: true,
                        // cancelButtonText: "<i class='la la-thumbs-down'></i> Mua tiếp",
                        customClass: {
                            confirmButton: "btn btn-success",
                            // cancelButton: "btn btn-default"
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
