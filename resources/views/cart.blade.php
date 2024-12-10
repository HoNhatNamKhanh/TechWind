@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid lg:grid-cols-1">
            <div class="relative overflow-x-auto shadow-lg dark:shadow-gray-800 rounded-md bg-white dark:bg-slate-900">
                <table class="w-full text-start border-collapse">
                    <thead class="text-sm uppercase bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300"> 
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
                                <tr class="bg-white dark:bg-slate-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
                                    <td class="p-4">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                <i class="mdi mdi-window-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-4">
                                        <span class="flex items-center">
                                            @if ($item->variant && $item->variant->image)
                                                <img src="{{  $item->variant->image }}"
                                                     class="rounded shadow dark:shadow-gray-800 w-12 h-12 object-cover"
                                                     alt="{{ $item->name }}" />
                                            @else
                                                <img src="{{ asset('path_to_default_image.jpg') }}"
                                                     class="rounded shadow dark:shadow-gray-800 w-12 h-12 object-cover"
                                                     alt="{{ $item->name }}" />
                                            @endif
                                            <span class="ms-3">
                                                <span class="block font-semibold text-gray-700 dark:text-gray-300">
                                                    {{ $item->product->name }}
                                                    - {{ $item->variant->color ?? 'No Color' }} 
                                                    - {{ $item->variant->size ?? 'No Size' }}
                                                </span>
                                                @if ($item->variant && $item->variant->stock == 0)
                                                    <span class="text-red-500 text-sm">
                                                        <br>Sản phẩm này đã hết hàng.
                                                    </span>
                                                @elseif ($item->variant && $item->variant->stock < $item->quantity)
                                                    <span class="text-red-500 text-sm">
                                                        <br>Sản phẩm chỉ còn {{ $item->variant->stock }} sản phẩm.
                                                    </span>
                                                @endif
                                            </span>
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->variant)
                                            {{ number_format($item->variant->price, 2) }}đ
                                        @else
                                            0.00 đ
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="qty-icons flex items-center justify-center">
                                            <button type="button"
                                                    class="decrease-qty text-xl text-indigo-600 hover:text-indigo-800 transition"
                                                    data-id="{{ $item->id }}" data-action="decrease">-</button>
                                            <input min="1" name="quantity" value="{{ $item->quantity }}" type="number"
                                                   class="quantity w-16 text-center mx-2 border border-gray-300 rounded"
                                                   max="{{ $item->variant->stock ?? 0 }}" id="quantity-{{ $item->id }}"
                                                   data-id="{{ $item->id }}" />
                                            <button type="button"
                                                    class="increase-qty text-xl text-indigo-600 hover:text-indigo-800 transition"
                                                    data-id="{{ $item->id }}" data-action="increase">+</button>
                                        </div>
                                    </td>
                                    <td class="p-4 text-end">
                                        <span class="item-price font-semibold text-gray-700 dark:text-gray-300"
                                              id="price-{{ $item->id }}">
                                            @if ($item->variant)
                                                {{ number_format($item->variant->price * $item->quantity, 2) }}đ
                                            @else
                                                0.00đ
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                    @if($cartItems->isEmpty())
                        <p class="text-center text-gray-500 py-4">Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào giỏ hàng.</p>
                    @else
                        <div class="bg-white dark:bg-slate-900 p-6 rounded-lg shadow-md dark:shadow-gray-800">
                            <h4 class="font-semibold text-lg mb-4">Tóm tắt đơn hàng</h4>
                            <ul class="list-none">
                                <li class="flex justify-between py-2 border-b">
                                    <span>Giá:</span>
                                    <span class="text-gray-700 dark:text-gray-300" id="subtotal">
                                        {{ number_format($subtotal, 2) }}đ
                                    </span>
                                </li>
                                <li class="flex justify-between py-2 border-b">
                                    <span>Phụ thu:</span>
                                    <span class="text-gray-700 dark:text-gray-300" id="taxes">
                                        {{ number_format($taxes, 2) }}đ
                                    </span>
                                </li>
                                <li class="flex justify-between font-semibold text-lg py-2">
                                    <span>Tổng cộng:</span>
                                    <span class="text-indigo-600 dark:text-indigo-400" id="total">
                                        {{ number_format($total, 2) }}đ
                                    </span>
                                </li>
                            </ul>
                            <a href="{{ route('checkout') }}"
                               class="block mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-center py-2 rounded-md">Thanh Toán</a>
                        </div>
                    @endif
                </div>
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