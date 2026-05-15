<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
</head>

<body style='background:#F4F7FA; font-family:Arial, Helvetica, sans-serif; line-height:1.5'>
    <div id='wrapper'
        style='background-color: white; font-size:14px; width:600px;margin:0px auto;min-height:500px;padding:20px;box-sizing:border-box;border-radius:20px;'>
        <h1 style="color: blue; padding:0; margin:0; font-weiht:bold">DGMART</h1>
        <p style="margin: 5px 0 5px 2px; font-size:12px">Chuyên Lapop - Linh kiện Laptop - Phụ kiện Laptop</p>
        <hr>
        <p style="margin: 5px 0 5px 2px; font-size:12px">Thư xác nhận đơn hàng:
            <strong>{{ $data['order_code'] }}</strong></p>
        <p style="margin: 5px 0 5px 2px; font-size:12px;">
            Xin chào <strong>{{ $data['name'] }}</strong>
            Cảm ơn bạn đã tin tưởng lựa chọn DGMART ! Đơn hàng của bạn đã được tiếp nhận và đang trong quá
            trình chuẩn bị để gửi đến bạn sớm nhất.
        </p>
        <strong style="font-size:12px">Chi tiết đơn hàng</strong>
        <table border='1'
            style='border-collapse: collapse; margin-top: 10px; border-spacing: 10px 10px; width:100%; border-radius:10px'>
            <tr>
                <th
                    style='padding: 8px; background-color: #f4f4f4; text-align: left; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                    Tên sản phẩm</th>
                <th
                    style='padding: 8px; background-color: #f4f4f4; text-align: left; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                    Cấu hình</th>
                <th
                    style='padding: 8px; background-color: #f4f4f4; text-align: center; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                    Số lượng</th>
                <th
                    style='padding: 8px; background-color: #f4f4f4; text-align: right; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                    Giá</th>
                <th
                    style='padding: 8px; background-color: #f4f4f4; text-align: right; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                    Thành tiền</th>
            </tr>
            @foreach ($data['cart'] as $items)
                <tr>
                    <td style='padding: 8px; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                        {{ $items->name }}
                    </td>
                    <td
                        style='padding: 8px; text-align: center; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                        @if ($items->options->variants)
                            <div class="flex flex-col gap-1 text-xs">
                                @foreach ($items->options->variants as $item)
                                    <div>
                                        <span class="font-semibold">{{ $item->slug }} :</span>
                                        <span class="">{{ $item->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="italic text-gray-400 text-center">...</div>
                        @endif
                    </td>
                    <td
                        style='padding: 8px; text-align: center; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                        {{ $items->qty }}
                    </td>
                    <td
                        style='padding: 8px; text-align: right; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                        {{ num_format($items->price) }}
                    </td>
                    <td
                        style='padding: 8px; text-align: right; font-family: Arial, sans-serif; font-size: 12px; color: #333;'>
                        {{ num_format($items->subtotal) }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan='5'
                    style='padding: 8px; font-family: Arial, sans-serif; font-size: 12px; color: #333; text-align: left; background-color: #f4f4f4;'>
                    <strong>Tổng cộng</strong> (Miễn phí vận chuyển): {{ num_format($data['total_price']) }}
                </td>
            </tr>
        </table>

        <strong style="font-size:12px; margin:15px 0 10px 0; display:inline-block">Thông tin giao hàng</strong>
        <div style="font-size:12px">Giao đến: {{ $data['address'] }}</div>
        <div style="font-size:12px">Số điện thoại: {{ $data['tel'] }}</div>

        <strong style="font-size:12px; margin:15px 0 10px 0; display:inline-block">Phương thức thanh toán</strong>
        <div style="font-size:12px">Tiền mặt</div>

        <strong style="font-size:12px; margin:15px 0 10px 0; display:inline-block">Thông tin liên hệ</strong>
        <div style="font-size:12px">Email: dgmart.support@gmail.com</div>
        <div style="font-size:12px">Số điện thoại: 0123 456 7890</div>
        <div style="font-size:12px">Website: <a href="">dgmart.test</a></div>

        <strong style="font-size:12px; margin:10px 0 10px 0; display:inline-block">
            Cảm ơn bạn đã chọn mua sắm tại DGMART !
        </strong>
    </div>
</body>

</html>
