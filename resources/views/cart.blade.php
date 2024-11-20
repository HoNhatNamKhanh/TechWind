@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid lg:grid-cols-1">
            <div class="relative overflow-x-auto shadow dark:shadow-gray-800 rounded-md">
                <table class="w-full text-start">
                    <thead class="text-sm uppercase bg-slate-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col" class="p-4 w-4"></th>
                            <th scope="col" class="text-start p-4 min-w-[220px]">Tên sản phẩm</th>
                            <th scope="col" class="p-4 w-24 min-w-[100px]">Giá</th>
                            <th scope="col" class="p-4 w-56 min-w-[220px]">Số lượng</th>
                            <th scope="col" class="p-4 w-24 min-w-120">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cartItems->isEmpty())
                            <tr class="bg-white dark:bg-slate-900">
                                <td colspan="5" class="p-4 text-center text-slate-400">Giỏ hàng trống.</td>
                            </tr>
                        @else
                            @foreach ($cartItems as $item)
                                <tr class="bg-white dark:bg-slate-900">
                                    <td class="p-4">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">
                                                <i class="mdi mdi-window-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-4">
                                        <span class="flex items-center">
                                            <img src="{{ asset('storage/' . $item->variant->image) }}"
                                                class="rounded shadow dark:shadow-gray-800 w-12" alt="{{ $item->name }}" />
                                            <span class="ms-3">
                                                <span class="block font-semibold">{{ $item->product->name }} -
                                                    {{ $item->variant->color }} - {{ $item->variant->size }}</span>

                                                @if ($item->variant->stock == 0)
                                                    <span class="text-red-500 text-sm">
                                                        <br>Sản phẩm này đã hết hàng.
                                                    </span>
                                                @elseif ($item->variant->stock < $item->quantity)
                                                    <span class="text-red-500 text-sm">
                                                        <br>Sản phẩm chỉ còn {{ $item->variant->stock }} sản phẩm.
                                                    </span>
                                                @endif

                                            </span>
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">${{ number_format($item->variant->price, 2) }}</td>
                                    <td class="p-4 text-center">
                                        <div class="qty-icons flex items-center justify-center">
                                            <!-- Nút Trừ -->
                                            <button type="button" class="decrease-qty text-xl text-indigo-600" data-id="{{ $item->id }}" data-action="decrease">-</button>

                                            <!-- Input Hiển thị số lượng -->
                                            <input min="1" name="quantity" value="{{ $item->quantity }}" type="number"
                                                class="quantity w-16 text-center mx-2" max="{{ $item->variant->stock ?? 0 }}" id="quantity-{{ $item->id }}"
                                                data-id="{{ $item->id }}" />

                                            <!-- Nút Cộng -->
                                            <button type="button" class="increase-qty text-xl text-indigo-600" data-id="{{ $item->id }}"
                                                data-action="increase">+</button>
                                        </div>
                                    </td>
                                    <td class="p-4 text-end">
                                        <span class="item-price" id="price-{{ $item->id }}">
                                            ${{ number_format($item->variant->price * $item->quantity, 2) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                @if($cartItems->isEmpty()) <!-- Kiểm tra nếu giỏ hàng trống -->
                    <p class="text-center text-gray-500 py-4">Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào
                        giỏ hàng.</p>
                @else
                    <div class="lg:col-span-9 md:order-1 order-3">
                        <a href="{{ route('checkout') }}"
                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2">Thanh
                            Toán</a>
                    </div>

                    <div class="lg:col-span-3 md:order-2 order-1">
                        <ul class="list-none shadow dark:shadow-gray-800 rounded-md">
                            <li class="flex justify-between p-4">
                                <span class="font-semibold text-lg">Giá :</span>
                                <span class="text-slate-400" id="subtotal">${{ number_format($subtotal, 2) }}</span>
                            </li>
                            <li class="flex justify-between p-4 border-t border-gray-100 dark:border-gray-800">
                                <span class="font-semibold text-lg">Phụ thu :</span>
                                <span class="text-slate-400" id="taxes">${{ number_format($taxes, 2) }}</span>
                            </li>
                            <li class="flex justify-between font-semibold p-4 border-t border-gray-200 dark:border-gray-600">
                                <span class="font-semibold text-lg">Tổng cộng :</span>
                                <span class="font-semibold" id="total">${{ number_format($total, 2) }}</span>
                            </li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.increase-qty, .decrease-qty', function () {
        var itemId = $(this).data('id');  // Lấy ID của sản phẩm
        var action = $(this).data('action');  // Lấy hành động 'increase' hoặc 'decrease'

        // Xác định URL tùy theo hành động
        var url = action === 'increase' ? '/cart/increase/' + itemId : '/cart/decrease/' + itemId;

        // Gửi yêu cầu AJAX
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'  // Đảm bảo có CSRF token
            },
            success: function (response) {
                if (!response.error) {
                    // Cập nhật số lượng sản phẩm trong input
                    $('#quantity-' + itemId).val(response.quantity);

                    // Cập nhật giá tiền của sản phẩm
                    $('#price-' + itemId).text('$' + response.itemPrice.toFixed(2));

                    // Cập nhật tổng giỏ hàng nếu cần thiết
                    $('#subtotal').text('$' + response.subtotal.toFixed(2));
                    $('#taxes').text('$' + response.taxes.toFixed(2));
                    $('#total').text('$' + response.total.toFixed(2));
                } else {
                    alert(response.message);  // Hiển thị thông báo lỗi
                }
            },
            error: function () {
                alert('Có lỗi xảy ra khi cập nhật giỏ hàng.');
            }
        });
    });

</script>
@endsection