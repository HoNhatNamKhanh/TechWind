<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
<!-- Mirrored from shreethemes.in/techwind/landing/index-shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Mar 2024 01:43:09 GMT -->

<head>
    <meta charset="UTF-8" />
    <title>
        Techwind - Tailwind CSS Multipurpose Landing & Admin Dashboard Template
    </title>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta
        name="description"
        content="Tailwind CSS Multipurpose Landing & Admin Dashboard Template" />
    <meta
        name="keywords"
        content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css" />
    <meta name="author" content="Shreethemes" />
    <meta name="website" content="https://shreethemes.in/" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="2.2.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Css -->
    <link href="{{ asset('assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- Main Css -->
    <link
        href="{{ asset('assets/libs/%40iconscout/unicons/css/line.css') }}"
        type="text/css"
        rel="stylesheet" />
    <link
        href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}"
        rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.min.css') }}" />
</head>

<body
    class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader End -->

    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky bg-white dark:bg-slate-900">
        <div class="container relative">
            <!-- Logo container-->
            <a class="logo" href="index.html">
                <img
                    src="assets/images/logo-dark.png"
                    class="inline-block dark:hidden"
                    alt="" />
                <img
                    src="assets/images/logo-light.png"
                    class="hidden dark:inline-block"
                    alt="" />
            </a>

            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="dropdown inline-block relative me-1">
                    <button
                        data-dropdown-toggle="dropdown"
                        class="dropdown-toggle text-[20px]"
                        type="button">
                        <i class="uil uil-search align-middle"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                        class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-4 z-10 w-52 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <form action="{{ route('products.grid') }}" method="GET">
                            <div class="relative">
                                <i class="uil uil-search text-lg absolute top-[3px] end-3"></i>
                                <input
                                    type="text"
                                    name="search"
                                    id="searchItem"
                                    class="form-input h-9 pe-10 sm:w-44 w-36 border-0 focus:ring-0"
                                    placeholder="Search..."
                                    value="{{ request()->input('search') }}" />
                            </div>
                        </form>
                    </div>
                </li>

                <li class="dropdown inline-block relative">
                    <button
                        data-dropdown-toggle="dropdown"
                        class="dropdown-toggle size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white"
                        type="button">
                        <i class="mdi mdi-cart"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                        class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-60 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <ul class="py-3 text-start" aria-labelledby="dropdownDefault">
                            @if(Auth::check() && Auth::user()->cart->count() > 0)
                            @foreach(Auth::user()->cart as $item)
                            <li>
                                <a href="" class="flex items-center justify-between py-1.5 px-4">
                                    <span class="flex items-center">
                                        <img src="{{ $item->product->image }}" class="rounded shadow dark:shadow-gray-800 w-9" alt="" />
                                        <span class="ms-3">
                                            <span class="block font-semibold">{{ $item->product->name }}</span>
                                            <span class="block text-sm text-slate-400">${{ $item->product->price }} X {{ $item->quantity }}</span>
                                        </span>
                                    </span>
                                    <span class="font-semibold">${{ $item->quantity * $item->product->price }}</span>
                                    <button class="remove-item text-red-500 ml-2" data-url="{{ route('cart.remove', $item->product->id) }}">
                                        <i data-feather="x" class="text-xl"></i> <!-- Feather icon X -->
                                    </button>
                                </a>
                            </li>
                            @endforeach
                            <li class="border-t border-gray-100 dark:border-gray-800 my-2"></li>
                            <li class="flex items-center justify-between py-1.5 px-4">
                                <h6 class="font-semibold mb-0">Total($):</h6>
                                <h6 class="font-semibold mb-0">${{ Auth::user()->cart->sum(fn($item) => $item->quantity * $item->product->price) }}</h6>
                            </li>
                            @else
                            <li class="py-1.5 px-4">
                                <span class="text-slate-400">Giỏ hàng trống</span>
                            </li>
                            @endif
                            <li class="py-1.5 px-4">
                                <a href="" class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center rounded-md bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white">View Cart</a>
                                <a href="" class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center rounded-md bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white">Checkout</a>
                                <p class="text-sm text-slate-400 mt-1">*T&C Apply</p>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="inline-block">
                    <a
                        href="javascript:void(0)"
                        class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white"
                        onclick="WishList.showModal()">
                        <i class="mdi mdi-heart"></i>
                    </a>
                </li>

                <li class="dropdown inline-block relative">
                    <button
                        data-dropdown-toggle="dropdown"
                        class="dropdown-toggle size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white"
                        type="button">
                        <i class="mdi mdi-account"></i>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                        class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-44 rounded-md bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 hidden"
                        onclick="event.stopPropagation();">
                        <ul class="py-2 text-start" aria-labelledby="dropdownDefault">
                            <li>
                                <a
                                    href="shop-account.html"
                                    class="block py-1.5 px-4 hover:text-indigo-600"><i class="uil uil-user align-middle me-1"></i> Account</a>
                            </li>
                            <li>
                                <a
                                    href="shop-cart.html"
                                    class="block py-1.5 px-4 hover:text-indigo-600"><i class="uil uil-clipboard-notes align-middle me-1"></i>
                                    Order History</a>
                            </li>
                            <li
                                class="border-t border-gray-100 dark:border-gray-800 my-2"></li>
                            <li>
                                @if (Auth::check())
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="block py-1.5 px-4 hover:text-indigo-600 bg-transparent border-0 cursor-pointer">
                                        <i class="uil uil-sign-out-alt align-middle me-1"></i>
                                        Logout
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="block py-1.5 px-4 hover:text-indigo-600">
                                    <i class="uil uil-sign-in-alt align-middle me-1"></i>
                                    Login
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li><a href="{{ route('home') }}" class="sub-menu-item">Home</a></li>

                    <li>
                        <a href="{{ route('about') }}" class="sub-menu-item">About Us</a>
                    </li>

                    <li>
                        <a href="{{ route('products.grid') }}" class="sub-menu-item">Shop</a>
                    </li>

                    <li>
                        <a href="{{ route('blog') }}" class="sub-menu-item">Blogs</a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}" class="sub-menu-item">Contact</a>
                    </li>
                </ul>
                <!--end navigation menu-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </nav>
    <!--end header-->
    <!-- End Navbar -->

    <!-- Start Modal -->
    <dialog id="WishList" class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white">
        <div class="relative h-auto md:w-[480px] w-300px">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="font-bold text-lg">Your Wishlist</h3>
                <form method="dialog">
                    <button class="size-6 flex justify-center items-center shadow dark:shadow-gray-800 rounded-md btn-ghost">
                        <i data-feather="x" class="size-4"></i>
                    </button>
                </form>
            </div>
            <div class="p-6 text-center">
                @if(isset($wishlistProducts) && $wishlistProducts->isNotEmpty())
                <ul class="space-y-4">
                    @foreach($wishlistProducts as $item)
                    <li class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-24 h-auto rounded shadow dark:shadow-gray-800">
                            <div>
                                <p class="font-semibold text-lg">{{ $item['product']->name }}</p>
                                <p class="text-sm text-slate-400">${{ number_format($item['product']->price, 2) }}</p>
                            </div>
                        </div>
                        <form action="{{ route('wishlist.remove', $item['product']->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                <i data-feather="trash-2" class="size-4"></i> Remove
                            </button>
                        </form>
                        <form action="{{ route('cart.add', $item['product']->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-600 hover:text-green-800 font-semibold">
                                <i data-feather="shopping-cart" class="size-4"></i> Add to Cart
                            </button>
                        </form>
                    </li>
                    <hr class="my-4">
                    @endforeach
                </ul>
                @else
                <div class="relative overflow-hidden text-transparent -m-3">
                    <i data-feather="hexagon" class="size-32 fill-red-600/5 mx-auto"></i>
                    <div class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-red-600 rounded-xl duration-500 text-4xl flex align-middle justify-center items-center">
                        <i class="uil uil-heart-break"></i>
                    </div>
                </div>
                <h4 class="text-xl font-semibold mt-6">Your wishlist is empty.</h4>
                <p class="text-slate-400 my-3">Create your first wishlist request...</p>
                <a href="#" class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center bg-transparent hover:bg-indigo-600 border border-indigo-600 text-indigo-600 hover:text-white rounded-md mt-2">Create a new wishlist</a>
                @endif
            </div>
        </div>
    </dialog>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Event for adding item to cart
        $(document).on('submit', '.add-to-cart-form', function(e) {
            e.preventDefault(); // Prevent page reload
            var form = $(this);

            $.ajax({
                type: 'POST',
                url: form.attr('action'), // Action URL from form
                data: form.serialize(), // Serialize form data
                success: function(response) {
                    if (response.success) {
                        // After adding to cart, reload the page to update the cart view
                        location.reload(); // Reload the page
                    } else {
                        alert(response.message); // Show error message if something goes wrong
                    }
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại!'); // Show error message
                }
            });
        });

        // Event for removing item from cart
        $(document).on('click', '.remove-item', function(e) {
            e.preventDefault(); // Ngừng hành động mặc định (tránh điều hướng đến #)

            var removeUrl = $(this).data('url'); // Lấy URL xóa sản phẩm từ thuộc tính data-url

            $.ajax({
                type: 'POST', // Sử dụng POST để gửi dữ liệu
                url: removeUrl, // URL xóa sản phẩm
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                    _method: 'DELETE' // Sử dụng _method để gửi yêu cầu DELETE thông qua POST
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // Tải lại trang để cập nhật giỏ hàng
                    } else {
                        alert(response.message); // Hiển thị thông báo nếu xóa thất bại
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", xhr.responseText); // Log lỗi
                    alert('Có lỗi xảy ra. Vui lòng thử lại!'); // Hiển thị thông báo lỗi
                }
            });
        });

        // CSRF Token setup for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- End Modal -->