    @extends('layouts.app')

    @section('content')
    <section
        class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.html')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <a href="index.html"><img src="assets/images/logo-icon-64.png" class="mx-auto" alt="" /></a>
                    <h5 class="my-6 text-xl font-semibold text-center">{{ __('Xác minh địa chỉ email bạn') }}</h5>
                    <div class="text-start">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                            </div>
                        @endif
                        <p>
                            {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                            {{ __('Nếu bạn không nhận được email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="text-indigo-600 hover:underline">
                                    {{ __('nhấp vào đây để yêu cầu cái khác') }}
                                </button>.
                            </form>
                        </p>
                        <p class="text-slate-400 mt-4">
                            {{ __('Nếu bạn không thấy email, vui lòng kiểm tra thư mục thư rác hoặc thư không mong muốn.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
