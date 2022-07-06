    <div class="checkout-right">
        <h4>Giỏ hàng của bạn có:
            <span>{{ Cart::count() }}</span>
        </h4>
        <div class="table-responsive">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tên sản phẩm</th>

                        <th>Giá</th>
                        <th style="width:90px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $total = 0;
                    ?>
                    @foreach (Cart::content() as $key => $val)
                        <?php
                        $i++;
                        $total += $val->qty * $val->price;
                        ?>
                        <tr class="rem{{ $i }}">
                            <td class="invert">{{ $i }}</td>
                            <td class="invert-image" style="width:200px">
                                <a>
                                    <img src="{{ asset('product/thumbnails/' . $val->options->image) }}" alt=" "
                                        class="img-responsive">
                                </a>
                            </td>
                            <td class="invert" style="padding: 20px">
                                <div class="quantity">
                                    <div class="roư">
                                        <div onclick="cart_minus_item({{ $val->id }})" class="col-sm-4">
                                           - &nbsp;</div>
                                        <div class="col-sm-4">
                                            <span>{{ $val->qty }}</span>
                                        </div>
                                        <div onclick="cart_push_item({{ $val->id }})"
                                            class="col-sm-4"> + &nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{ $val->name }}</td>
                            <td class="invert">{{ number_format($val->price, 0, ',', '.') }} VNĐ</td>
                            <td class="invert">
                                <input type="hidden" class="cart_rowId{{ $val->id }}" value="{{ $val->rowId }}">
                                <div class="rem">
                                    <div onclick="delete_cart_item({{ $val->id }})" class="close1"> X</div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <table class="table" style="border-style:none">
            <tr>
                <td>
                    Tổng tiền:
                </td>
                <td> {{ number_format($total, 0, ',', '.') }} VNĐ
                </td>
            </tr>
            <tr>
                <td>
                    Phí vận chuyển:
                </td>
                <td>
                        {{ number_format(Session::get('fee'), 0, ',', '.') }} VNĐ
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h3>Tổng tiền: </h3>
            </div>
            <div class="col-sm-6">
                <?php
                $total=$total+ Session::get('fee');
                ?>
                <h3>{{ number_format($total, 0, ',', '.') }} VNĐ</h3>
            </div>
        </div>
    </div>
