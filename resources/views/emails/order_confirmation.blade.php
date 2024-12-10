<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn đơn hàng</title>

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #007bff;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            color: #6c757d;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #495057;
            border-bottom: 2px solid #007bff;
            display: inline-block;
        }

        .info, .order-details, .summary {
            margin-bottom: 20px;
        }
        .info ul, .order-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .info ul li, .order-details ul li {
            margin-bottom: 5px;
        }
        .order-item {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-item img {
            border-radius: 8px;
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
        .order-item-details p {
            margin: 0 0 5px;
        }
        .total {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            text-align: right;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>TechWind</h1>
            <p>Hóa đơn mua sắm của bạn</p>
        </div>
        <!-- Order Info -->
        <div class="info">
            <h2 class="section-title">Thông tin đơn hàng</h2>
            <ul>
                <li><strong>Mã đơn hàng:</strong> {{ $order->code }}</li>
                <li><strong>Họ tên:</strong> {{ $order->name }}</li>
                <li><strong>Email:</strong> {{ $order->email }}</li>
                <li><strong>Số điện thoại:</strong> {{ $order->phone }}</li>
                <li><strong>Địa chỉ:</strong> {{ $order->address }}</li>
            </ul>
        </div>
        <!-- Order Details -->
        <div class="order-details">
            <h2 class="section-title">Chi tiết đơn hàng</h2>
            <ul>
                @foreach ($order->orderItems as $item)
                <li class="order-item">
                    <!-- Image -->
                    <img src="{{  $item->variant->image }}" alt="{{ $item->variant->product->name }}">
                    <!-- Details -->
                    <div class="order-item-details">
                        <p><strong>Sản phẩm:</strong> {{ $item->variant->product->name }}</p>
                        <p><strong>Dung lượng:</strong> {{ $item->variant->size }}</p>
                        <p><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                        <p><strong>Màu:</strong> {{ $item->variant->color }}</p>
                        <p><strong>Giá:</strong> {{ number_format($item->price, 0, ',', '.') }} VND</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Total -->
        <div class="summary">
            <h2 class="section-title">Tổng cộng</h2>
            <p class="total"> {{ number_format($item->variant->price * $item->quantity, 2) }}VND</p>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>Cảm ơn bạn đã mua sắm tại TechWind!</p>
        </div>
    </div>
</body>

</html>
