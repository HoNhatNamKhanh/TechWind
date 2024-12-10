@extends('layouts.app')

@section('title', 'Thanh toán thành công')

@section('content')
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="text-center">
                <h2 class="text-2xl font-semibold">Cảm ơn bạn đã đặt hàng!</h2>
                <p>Đơn hàng của bạn đã được đặt thành công. Chúng tôi sẽ xử lý sớm.</p>
                <a href="{{route('home')}}" class="mt-4 inline-block py-2 px-4 bg-indigo-600 text-white rounded-md">Quay lại trang chủ</a>
            </div>
        </div>
    </section>
@endsection
