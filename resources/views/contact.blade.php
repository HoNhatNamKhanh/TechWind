@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
<section class="relative table w-full py-36 bg-[url('../../assets/images/company/aboutus.html')] bg-center bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="container relative">
        <div class="grid grid-colss-1 pb-8 text-center mt-10">
            <h3 class="md:text-4xl text-3xl md:leading-normal tracking-wide leading-normal font-medium text-white">Liên hệ chúng tôi</h3>
        </div><!--end grid-->
    </div><!--end container-->
    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="index.html">Techwind</a></li>
            <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Liên hệ</li>
        </ul>
    </div>
</section><!--end section-->
<div class="relative">
    <div class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
        <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->
<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
            <div class="text-center px-6 mt-6">
                <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                    <i class="uil uil-phone"></i>
                </div>
                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Số điện thoại</h5>
                    <p class="text-slate-400 mt-3">Trình tự bây giờ là để nhiều chiến dịch và lợi ích</p>
                    <div class="mt-5">
                        <a href="tel:(+84)52534-468-854" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">+152 534-468-854</a>
                    </div>
                </div>
            </div>
            <div class="text-center px-6 mt-6">
                <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                    <i class="uil uil-envelope"></i>
                </div>
                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Email</h5>
                    <p class="text-slate-400 mt-3">Có gì thắc mắc xin liên hệ chúng tôi ở email này</p>
                    <div class="mt-5">
                        <a href="khanhhoangkiet@gmail.com" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">contact@example.com</a>
                    </div>
                </div>
            </div>
            <div class="text-center px-6 mt-6">
                <div class="size-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                    <i class="uil uil-map-marker"></i>
                </div>
                <div class="content mt-7">
                    <h5 class="title h5 text-xl font-medium">Địa chỉ</h5>
                    <p class="text-slate-400 mt-3">Thành Phố Huế <br> Thừa Thiên Huế, Việt Nam</p>
                    <div class="mt-5">
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            data-type="iframe" class="video-play-icon read-more lightbox relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Xem trên Google map</a>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
    <div class="container relative md:mt-24 mt-16">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="lg:col-span-7 md:col-span-6">
                <img src="assets/images/contact.svg" alt="">
            </div>
            <div class="lg:col-span-5 md:col-span-6">
                <div class="lg:ms-5">
                    <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                        <h3 class="mb-6 text-2xl leading-normal font-medium">Hãy liên lạc với chúng tôi!</h3>
                        <form method="POST" action="{{ route('send.message') }}" name="myForm" id="myForm" onsubmit="return validateForm()">
                            @csrf <!-- CSRF protection token -->
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="grid lg:grid-cols-12 lg:gap-6">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="name" class="font-semibold">Ho tên:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                            <input name="name" id="name" type="text" class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Họ và tên :">
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">Email của bạn:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <input name="email" id="email" type="email" class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Email :">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="subject" class="font-semibold">Số điện thoại:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="book" class="size-4 absolute top-3 start-4"></i>
                                            <input name="subject" id="subject" class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Nhập ở đây :">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-start">
                                        <label for="comments" class="font-semibold">Câu hỏi của bạn:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="message-circle" class="size-4 absolute top-3 start-4"></i>
                                            <textarea name="comments" id="comments" class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="Đặt câu hỏi :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="send" class="py-2 px-5 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md justify-center flex items-center">Gửi câu hỏi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End Section-->
<div class="container-fluid relative">
    <div class="grid grid-cols-1">
        <div class="w-full leading-[0] border-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61451.554164503194!2d107.55211096301816!3d16.455567271405203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a1377a1b1bd1%3A0x79b6fd926f86f617!2zSG_DoCBIb8OgaSwgSHXhur8sIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1695481571824!5m2!1sen!2s"
                style="border:0"
                class="w-full h-[500px]"
                allowfullscreen>
            </iframe>
        </div>
    </div><!--end grid-->
</div><!--end container-->
@endsection
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif