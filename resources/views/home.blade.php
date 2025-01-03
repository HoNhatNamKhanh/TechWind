@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Start Home -->
<section class="relative py-10 px-6 mt-10 ">
    <div class="container-fluid relative px-6 ">
        <div class="relative py-48 table w-full shadow-md overflow-hidden rounded-xl">
            <!-- Phần ảnh nền banner -->
            <div class="absolute inset-0  ">
                <img src="https://business.ee.co.uk/content/dam/eeb-site/large-business-miscellaneous/product/apple-release-new-device-hero-banner-desktop-2880x1260.jpg"
                    alt="Banner" class="w-full h-full object-cover">
            </div>
            <!-- Overlay màu tối -->
            <div class=""></div>
            <div class="container relative">
                <div class="grid grid-cols-1">
                    <div class="md:text-start text-left">
                        <h1 class="font-bold text-black lg:leading-normal leading-normal text-4xl lg:text-5xl mb-4">
                            Chào Mừng bạn đến <br />
                            TeachWind
                        </h1>
                        <p class="text-black/70 text-xl max-w-xl">
                            Bắt đầu shopping nào ! nhiều ưu đãi đang chờ bạn
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('products.grid') }}"
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2">
                                <i class="mdi mdi-cart-outline"></i> Mua Ngay
                            </a>
                        </div>
                    </div>
                </div>
                <!--end grid-->
            </div>
            <!--end container-->
        </div>
    </div>
    <!--end Container-->
</section>
<!--end section-->
<!-- End Home -->
<!-- Start -->
<section class="relative  ">
        <div class="relative w-full max-w-4xl mx-auto mt-10">
            <!-- Slider Wrapper -->
            <!-- Slider Section -->
            <div class="body ">
                <!-- Banner Section -->
            <div class=" p-10 relative mt-10 mb-16 ">

                <div class="banners">
                    @if(isset($banners[0]))
                    <div class="banner banner-1">
                        <img src="{{ asset('storage/' . $banners[1]->thumbnail) }}" class="group-hover:scale-110 duration-500" alt="Beanies" />
                    </div>
                    @endif
                    @if(isset($banners[1]))
                    <div class="banner banner-2">
                        <img src="{{ asset('storage/' . $banners[2]->thumbnail) }}" class="group-hover:scale-110 duration-500" alt="Beanies" />
                    </div>
                    @endif
                </div>
            </div>
            </div>
            <div class="container relative mt-10">
                <div class="grid grid-cols-1 items-center">
                    <h3 class="text-2xl leading-normal font-semibold">Danh mục nổi bật</h3>
                </div>
                <!--end grid-->
                <div class="grid lg:grid-cols-6 md:grid-cols-3 grid-cols-2 mt-8 gap-[30px] bg-white rounded-xl">
                    @foreach($topCategories as $category)
                        <div
                            class="group relative overflow-hidden hover:shadow-lg hover:dark:shadow-gray-800 rounded-md duration-500 p-6 text-center">
                            <img src="{{ asset('storage/' . $category->thumbnail) }}"
                                class="rounded-full shadow-md dark:shadow-gray-800 size-20 block mx-auto mb-2"
                                alt="{{ $category->name }}" />
                            <a href="{{ route('shop.index', ['category_id' => $category->id]) }}"
                                class="font-semibold hover:text-indigo-600 text-lg">{{ $category->name }}</a>
                        </div>
                        <!--end content-->
                    @endforeach
                </div>
                <!--end grid-->
            </div>
            <div class=" p-10 relative mt-10 mb-16 ">
                <div class="grid grid-cols-1 items-center  ">
                    <h3 class="text-2xl leading-normal font-semibold ">Sản phẩm mới nhất</h3>
                </div>
                <!--end grid-->
                <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-8 gap-[30px]  rounded-xl  ">
                    @foreach($products as $product)
                        <div class="group transform lg:scale-105 border-2 border-blue-500 rounded-xl bg-white shadow-xl p-2 ">
                            <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500  ">
                                @if ($product->variants->isNotEmpty())
                                    <img src="{{  asset('storage/' . $product->variants[0]->image) }}" alt="{{ $product->name }}"
                                        class=" max-h-300px object-cover" />
                                @else
                                <img src="{{ asset('images/default-thumbnail.jpg') }}" alt="{{ $product->name }}"
                                    class=" max-h-300px object-cover" />
                                @endif

                                <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @if ($product->variants->isNotEmpty())
                                        <div class="mt-4">
                                            <select name="variant_id" id="variant"
                                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
                                                @foreach ($product->variants as $variant)
                                                <option value="{{ $variant->id }}" class="variant-option">
                                                    {{ $variant->color }} - ${{ number_format($variant->price, 2) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        @if(auth()->check())
                                        <button type="submit" data-product-id="{{ $product->id }}"
                                            class="add-to-cart mt-2 py-2 px-5 inline-block font-semibold tracking-wide border border-transparent duration-500 text-base text-center bg-slate-900 hover:bg-red-600 text-white w-full rounded-md shadow-md hover:shadow-lg transition">
                                            Thêm vào giỏ hàng
                                        </button>
                                        @endif
                                    </form>
                                </div>
                                <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500">
                                    <li>
                                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST"
                                            class="inline-flex items-center">
                                            @csrf
                                            <!-- Thêm input ẩn để gửi variant_id -->
                                            @if ($product->variants->isNotEmpty())
                                            <input type="hidden" name="variant_id" class="variant-id"
                                                value="{{ $product->variants[0]->id }}">
                                            @endif
                                            <button type="submit"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                                aria-label="Add to wishlist">
                                                <i class="mdi mdi-heart"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="mt-1">
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                            aria-label="View product details">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                                @if($product->is_new)
                                <ul class="list-none absolute top-[10px] start-4">
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">New</a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                            <div class="mt-4  bg-gray-300">
                                <a href="{{ route('product.show', $product->id) }}"
                                    class="hover:text-indigo-600 text-lg font-semibold">{{ $product->name }}</a>
                                <div class="flex justify-between items-center mt-1">
                                    @if ($product->variants->isNotEmpty())
                                    <p class="text-red-600 font-bold">{{ number_format($product->variants[0]->price, 2) }}đ</p>
                                    @else
                                    <p class="text-red-600">Price not available</p>
                                    @endif
                                    <div class="product-rating mt-2">
                                        <ul class="list-none inline-block text-orange-400">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="inline">
                                                <i
                                                    class="mdi mdi-star {{ $i <= $product->averageRating ? 'text-yellow-500' : 'text-slate-400' }}"></i>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="bg-gray-100 rounded-xl p-1">
                                    <div class=" text-xs">
                                        <!-- Cột bên trái -->
                                        <a href=""><span class="text-red-600 font-bold">Khuyến mãi: </span>{{ $product->des }} </a><br>
                                        <a><span class="text-green-600 font-bold">View:</span> {{ $product->view }} người xem</a><br>
                                    </div>
                                </div>
                                <ul class="border-2 rounded-xl text-center mt-2 ">
                                    <li>
                                        <a href="{{ route('product.show', $product->id) }}">Xem thêm</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--end grid-->
            </div>
            <!--end container-->
            <!--end container-->
            <div class=" p-10  mt-10 mb-16 ">
                <div class="grid grid-cols-1 items-center">
                    <h3 class="text-2xl leading-normal font-semibold">Sản phẩm được đánh giá cao</h3>
                </div>
                <!--end grid-->
                <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-8 gap-[30px] rounded-xl  ">
                    @foreach($ratingProducts as $product)
                        <div class="group transform lg:scale-105 border-2  border-blue-500 rounded-xl shadow-xl bg-white p-2">
                            <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                                @if ($product->variants->isNotEmpty())
                                    <img src="{{  asset('storage/' . $product->variants[0]->image) }}" alt="{{ $product->name }}"
                                        class=" max-h-300px object-cover" />
                                @else
                                <img src="{{ asset('D:\laragon\www\TechWind\public\assets\images\shop\product\iphone13hong.png') }}" alt="{{ $product->name }}"
                                    class=" max-h-300px object-cover" />
                                @endif
                                <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @if ($product->variants->isNotEmpty())
                                        <div class="mt-4">
                                            <select name="variant_id" id="variant"
                                                class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
                                                @foreach ($product->variants as $variant)
                                                <option value="{{ $variant->id }}" class="variant-option">
                                                    {{ $variant->color }} - ${{ number_format($variant->price, 2) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        @if(auth()->check())
                                        <button type="submit" data-product-id="{{ $product->id }}"
                                            class="add-to-cart mt-2 py-2 px-5 inline-block font-semibold tracking-wide border border-transparent duration-500 text-base text-center bg-slate-900 hover:bg-red-600 text-white w-full rounded-md shadow-md hover:shadow-lg transition">
                                            Thêm vào giỏ hàng
                                        </button>
                                        @endif
                                    </form>
                                </div>
                                <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500">
                                    <li>
                                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST"
                                            class="inline-flex items-center">
                                            @csrf
                                            <button type="submit"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                                aria-label="Add to wishlist">
                                                <i class="mdi mdi-heart"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="mt-1">
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                            aria-label="View product details">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                                @if($product->is_new)
                                <ul class="list-none absolute top-[10px] start-4">
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">New</a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('product.show', $product->id) }}"
                                    class="hover:text-indigo-600 text-lg font-semibold">{{ $product->name }}</a>
                                <div class="flex justify-between items-center mt-1">
                                    @if ($product->variants->isNotEmpty())
                                    <p class="text-red-600 font-bold">{{ number_format($product->variants[0]->price, 2) }}đ</p>
                                    @else
                                    <p class="text-red-600">Price not available</p>
                                    @endif
                                    <div class="product-rating mt-2">
                                        <ul class="list-none inline-block text-orange-400">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="inline">
                                                <i
                                                    class="mdi mdi-star {{ $i <= $product->averageRating ? 'text-yellow-500' : 'text-slate-400' }}"></i>
                                                </li>
                                                @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="bg-gray-100 rounded-xl p-1">
                                    <div class=" text-xs">
                                        <!-- Cột bên trái -->
                                        <a href=""><span class="text-red-600 font-bold">Khuyến mãi: </span>{{ $product->des }} </a><br>
                                        <a>view: {{ $product->view }} người xem</a><br>
                                    </div>
                                </div>
                                <ul class="border-2 rounded-xl text-center mt-2 ">
                                    <li>
                                        <a href="{{ route('product.show', $product->id) }}">Xem thêm</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--end grid-->
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
</section>
<!--end section-->
<!-- End -->
<!-- Start -->
<section class="relative py-10 px-6 mt-10 ">
    <div class="container-fluid relative px-6 ">
        <div class="relative py-48 table w-full shadow-md overflow-hidden rounded-xl">
            <!-- Phần ảnh nền banner -->
            <div class="absolute inset-0  ">
                <img src="https://cdn.shopify.com/s/files/1/0808/0067/files/category_banner_ip14pro_promax_desktop_1.jpg?v=1662594151"
                    alt="Banner" class="w-full h-full object-cover">
            </div>
            <!-- Overlay màu tối -->
            <div class=""></div>
            <div class="container relative">
                <div class="grid grid-cols-1">
                    <div class="md:text-start text-left">
                        <h1
                            class="font-bold text-black lg:leading-normal leading-normal text-4xl lg:text-5xl mb-4 text-center">
                            Trải nghiệm mua sắm tuyệt vời ngay từ  <br />
                            đơn hàng đầu tiên!
                        </h1>
                        <p class="text-black/70 text-xl text-center">
                            Bắt đầu shopping nào ! nhiều ưu đãi đang chờ bạn
                        </p>
                        <div class="mt-6 text-center">
                            <a href="{{ route('shop.index') }}"
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md me-2 mt-2">
                                <i class="mdi mdi-cart-outline"></i> Mua Ngay
                            </a>
                        </div>
                    </div>
                </div>
                <!--end grid-->
            </div>
            <!--end container-->
        </div> 
    </div>
    <!--end Container-->
</section>
<!--end section-->
<!-- End -->
<!-- Start -->
<div class=" relative mt-16 mb-16">
    <div class="grid grid-cols-1 items-center">
        <h3 class="text-2xl leading-normal font-semibold">Sản phẩm mới cập nhập</h3>
    </div>
    <!--end grid-->
    <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-8 gap-[30px]  rounded-xl p-10">
        @foreach($recentProducts as $product)
            <div class="group transform lg:scale-105 border-2 p-1 border-blue-500 rounded-xl bg-white shadow-xl">
                <div
                    class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                    @if ($product->variants->isNotEmpty())
                        <img src="{{  asset('storage/' . $product->variants[0]->image) }}" alt="{{ $product->name }}"
                            class=" max-h-300px object-cover" />
                    @else
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class=" max-h-300px object-cover" />
                    @endif
                    <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                            @csrf
                            @if ($product->variants->isNotEmpty())
                            <div class="mt-4">
                                <select name="variant_id" id="variant"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500">
                                    @foreach ($product->variants as $variant)
                                    <option value="{{ $variant->id }}" class="variant-option">
                                        {{ $variant->color }} - ${{ number_format($variant->price, 2) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if(auth()->check())
                            <button type="submit" data-product-id="{{ $product->id }}"
                                class="add-to-cart mt-2 py-2 px-5 inline-block font-semibold tracking-wide border border-transparent duration-500 text-base text-center bg-slate-900 hover:bg-red-600 text-white w-full rounded-md shadow-md hover:shadow-lg transition">
                                Thêm vào giỏ hàng
                            </button>
                            @endif
                        </form>
                    </div>
                    <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500">
                        <li>
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST"
                                class="inline-flex items-center">
                                @csrf
                                <button type="submit"
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                    aria-label="Add to wishlist">
                                    <i class="mdi mdi-heart"></i>
                                </button>
                            </form>
                        </li>
                        <li class="mt-1">
                            <a href="{{ route('product.show', $product->id) }}"
                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"
                                aria-label="View product details">
                                <i class="mdi mdi-eye-outline"></i>
                            </a>
                        </li>
                    </ul>
                    @if($product->is_new)
                    <ul class="list-none absolute top-[10px] start-4">
                        <li>
                            <a href="javascript:void(0)"
                                class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">New</a>
                        </li>
                    </ul>
                    @endif
                </div>
                <div class="mt-4">
                    <a href="{{ route('product.show', $product->id) }}"
                        class="hover:text-indigo-600 text-lg font-semibold">{{ $product->name }}</a>
                    <div class="flex justify-between items-center mt-1">
                        @if ($product->variants->isNotEmpty())
                        <p class="text-red-600 font-bold">{{ number_format($product->variants[0]->price, 2) }}đ</p>
                        @else
                        <p class="text-red-600">Price not available</p>
                        @endif
                        <div class="product-rating mt-2">
                            <ul class="list-none inline-block text-orange-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="inline">
                                    <i
                                        class="mdi mdi-star {{ $i <= $product->averageRating ? 'text-yellow-500' : 'text-slate-400' }}"></i>
                                    </li>
                                    @endfor
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-xl p-1">
                        <div class=" text-xs">
                            <!-- Cột bên trái -->
                            <a href=""><span class="text-red-600 font-bold">Khuyến mãi: </span>{{ $product->des }} </a><br>
                            <a>view: {{ $product->view }} người xem</a><br>
                        </div>
                    </div>
                    <ul class="border-2 rounded-xl text-center mt-2 ">
                        <li>
                            <a href="{{ route('product.show', $product->id) }}">Xem thêm</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <!--end grid-->
</div>
<!--end section-->
<!-- End -->
@endsection

