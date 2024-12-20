@extends('admin.inc.app')
@section('title', 'Trang Admin')

@section('content')

<main class="h-full pb-16">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Trang chủ
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card: Total Clients -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Người dùng</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $usersCount }}</p>
                </div>
            </div>

            <!-- Card: Account Balance -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Doanh thu</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        ${{ number_format($accountBalance, 2) }}</p>
                </div>
            </div>

            <!-- Card: New Sales -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Đơn hàng chờ</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $newSalesCount }}</p>
                </div>
            </div>

            <!-- Card: Completed Sales -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Đơn hàng hoàn thành</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $completedSalesCount }}</p>
                </div>
            </div>

           
        </div>
        
        <div class="w-full mb-8 overflow-auto rounded-lg shadow-xs grid md:grid-cols-2 sm:grid-cols-1">
            <div class="flex flex-col mr-6">
                <!-- Monthly Revenue Chart Section -->
                <div class="">
                    <div class="w-full pb-6 ">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Doanh thu theo tháng
                        </h2>
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Canvas for Chart -->
                                    <canvas id="earningsChart" class="chart-responsive"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Section -->

                </div>
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Đơn hàng mới
                </h2>
                <div class="w-full mb-8 overflow-auto rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full min-w-max whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Người dùng</th>
                                    <th class="px-4 py-3">Order</th>
                                    <th class="px-4 py-3">Giá</th>
                                    <th class="px-4 py-3">Trạng thái</th>
                                    <th class="px-4 py-3">Ngày mua hàng</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach($orders as $order)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" 
                                                    src="{{ asset('storage/' . ($order->user->userMeta ? $order->user->userMeta->image : 'default-image.jpg')) }}" 
                                                    alt="User Avatar" loading="lazy" />
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $order->user->name }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    {{ $order->user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $order->code }}</td>
                                    <td class="px-4 py-3 text-sm">${{ number_format($order->orderItems->sum(function ($item) {
                                        return $item->price * $item->quantity; 
                                    }), 2) }}</td>
                                    <td class="px-4 py-3 text-xs">
                                        <span class="px-2 py-1 font-semibold leading-tight 
                                            @if($order->status == 'pending') text-green-700 bg-green-100 
                                            @elseif($order->status == 'processing') text-yellow-700 bg-yellow-100
                                            @elseif($order->status == 'cancelled') text-red-700 bg-red-100
                                            @elseif($order->status == 'completed') text-blue-700 bg-blue-100
                                            @else text-gray-700 bg-gray-100 
                                            @endif rounded-full dark:bg-gray-700 dark:text-gray-100">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <!-- Edit Button -->
                                            <a href="#" 
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="#" method="POST" style="display:inline;" 
                                                onclick="return confirm('Are you sure you want to delete this order?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" 
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                                    <span class="flex items-center col-span-3">
                                        Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }}
                                    </span>
                                    <span class="col-span-2"></span>
                                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                        <nav aria-label="Table navigation">
                                            <ul class="inline-flex items-center">
                                                <!-- Previous Page Link -->
                                                <li>
                                                    <a href="{{ $orders->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" @if(!$orders->previousPageUrl()) disabled @endif>
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <!-- Page Links -->
                                                @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                                    <li>
                                                        <a href="{{ $url }}" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple @if($orders->currentPage() == $page) bg-purple-600 text-white @else text-gray-600 @endif">
                                                            {{ $page }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                                <!-- Next Page Link -->
                                                <li>
                                                    <a href="{{ $orders->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" @if(!$orders->nextPageUrl()) disabled @endif>
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </span>
                    </div>
                </div>
            </div>
            <div>
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Người dùng mới
                    </h2>
                    <div class="w-full mb-8 overflow-auto rounded-lg shadow-xs">
                                <div class="w-full overflow-x-auto">
                                    <table class="w-full min-w-max whitespace-no-wrap">
                                        <thead>
                                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">Người dùng</th>
                                                <th class="px-4 py-3">Email</th>
                                                <th class="px-4 py-3">Trạng thái</th>
                                                <th class="px-4 py-3">Ngày đăng ký</th>
                                                <th class="px-4 py-3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach($users as $user)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <!-- Avatar -->
                                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                                <img class="object-cover w-full h-full rounded-full" 
                                                                    src="{{ asset('storage/' . ($user->userMeta ? $user->userMeta->image : 'default-image.jpg')) }}" 
                                                                    alt="User Avatar" loading="lazy" />
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold">{{ $user->name }}</p>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                                    <td class="px-4 py-3 text-sm">
                                                            @if($user->email_verified_at)
                                                                Đã xác minh email
                                                            @else
                                                                Chưa xác minh email
                                                            @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">{{ $user->created_at->format('Y-m-d') }}</td>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center space-x-4 text-sm">
                                                            <!-- Edit Button -->
                                                            <a href="#" 
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                                </svg>
                                                            </a>

                                                            <!-- Delete Button -->
                                                            <form action="#" method="POST" style="display:inline;" 
                                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" 
                                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" 
                                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination for Users Table -->
                                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                                    <span class="flex items-center col-span-3">
                                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
                                    </span>
                                    <span class="col-span-2"></span>
                                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                        <nav aria-label="Table navigation">
                                            <ul class="inline-flex items-center">
                                                <!-- Previous Page Link -->
                                                <li>
                                                    <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" @if(!$users->previousPageUrl()) disabled @endif>
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>

                                                <!-- Page Links -->
                                                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                                    <li>
                                                        <a href="{{ $url }}" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple @if($users->currentPage() == $page) bg-purple-600 text-white @else text-gray-600 @endif">
                                                            {{ $page }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                                <!-- Next Page Link -->
                                                <li>
                                                    <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" @if(!$users->nextPageUrl()) disabled @endif>
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </span>
                                </div>
                    </div>

            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('earningsChart').getContext('2d');
    const earningsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months), // Tháng (2023-01, 2023-02, ...)
            datasets: [{
                label: 'Thu nhập ($)', // Nhãn cho biểu đồ
                data: @json($earningsData), // Dữ liệu doanh thu
                borderColor: 'rgba(75, 192, 192, 1)', // Màu đường viền
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Đảm bảo biểu đồ sẽ thay đổi kích thước với thẻ chứa
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Thu nhập ($)' // Tiêu đề trục Y
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tháng' // Tiêu đề trục X
                    }
                }
            }
        }
    });
</script>

@endsection