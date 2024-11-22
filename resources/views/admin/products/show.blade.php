@extends('admin.inc.app')
@section('title', 'Chi tiết sản phẩm')

@section('content')

<main class="h-full pb-16">
    <div class="container px-6 mx-auto grid">
        <div class="card-body px-0 pt-0 pb-2 overflow-auto">
            <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Chi tiết sản phẩm</h3>

            <div class="variant px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Tên sản phẩm -->
                <label class="block text-sm mb-4">
                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                    <input type="text" name="name" id="name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $product->name }}" disabled />
                </label>

                <!-- Mô tả -->
                <label class="block text-sm mb-4">
                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Mô tả</span>
                    <textarea name="description" id="description" rows="3"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                        disabled>{{ $product->description }}</textarea>
                </label>

                <!-- Danh mục -->
                <label class="block text-sm mb-4">
                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Danh mục</span>
                    <input type="text" name="category" id="category"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $product->category->name }}" disabled />
                </label>

                <!-- Biến thể sản phẩm -->
                <h5 class="text-xl py-3 font-semibold text-gray-800 dark:text-gray-200 mb-4">Biến thể sản phẩm</h5>
                <div>
                    <div class="w-full mb-8 overflow-auto rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="bg-white w-full min-w-max whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Ảnh</th>
                                        <th class="px-4 py-3">Màu sắc</th>
                                        <th class="px-4 py-3">Size</th>
                                        <th class="px-4 py-3">Giá</th>
                                        <th class="px-4 py-3">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variants as $variant)
                                        <tr class="border">
                                            <!-- Ảnh biến thể -->
                                            <td class="align-middle text-center border py-3 px-4">
                                                @if ($variant->image)
                                                    <img src="{{ asset('storage/' . $variant->image) }}" alt="Variant Image"
                                                        style="width: 75px; height: auto;">
                                                @else
                                                    <span>Chưa có ảnh</span>
                                                @endif
                                            </td>

                                            <!-- Màu sắc -->
                                            <td class="align-middle border py-3 px-4">
                                                {{ $variant->color }}
                                            </td>

                                            <!-- Size -->
                                            <td class="align-middle border py-3 px-4">
                                                {{ $variant->size }}
                                            </td>

                                            <!-- Giá -->
                                            <td class="align-middle text-center border py-3 px-4">
                                                {{ number_format($variant->price, 2) }} VNĐ
                                            </td>

                                            <!-- Số lượng -->
                                            <td class="align-middle text-center border py-3 px-4">
                                                {{ $variant->stock }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Nút quay lại -->
                <div
                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                    <div
                        class="create-button px-2  w-20 text-center py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a href="{{ route('admin.products.index') }}"
                            class="custom-border ">
                            Quay lại
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</main>

@endsection