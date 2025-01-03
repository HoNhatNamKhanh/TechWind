@extends('admin.inc.app')
@section('title', 'Create Product')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Tạo sản phẩm mới
                    </h3>
                    <form id="productForm" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="variant mb-4">
                                <!-- Tên sản phẩm -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                                    <input type="text" name="name" id="name"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        required />
                                </label>

                                <!-- Mô tả sản phẩm -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Mô tả</span>
                                    <textarea name="description" id="description" rows="3"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"></textarea>
                                </label>

                                <!-- Danh mục sản phẩm -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Danh mục</span>
                                    <select name="category_id" id="category_id"
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        required>
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                            </div>

                            <!-- Các biến thể sản phẩm -->
                            <h5 class="text-xl py-3  font-semibold text-gray-800 dark:text-gray-200 mb-4">Biến thể sản
                                phẩm</h5>
                            <div id="variantContainer">
                                <!-- Các biến thể sẽ được thêm vào khi nhấn nút "Thêm biến thể" -->
                            </div>
                            <div class="flex justify-start gap-4">
                                <div
                                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-b border-gray-300 dark:border-gray-600">
                                    <div
                                        class="add-button px-2 py-3 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <button type="button" class=" custom-border" id="addVariant">Thêm
                                            biến
                                            thể</button>
                                    </div>
                                </div>
                                <div
                                    class="mb-4 text-lg font-semibold text-white dark:text-gray-300 border-b border-gray-300 dark:border-gray-600">
                                    <div
                                        class=" create-button px-2 py-3 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <button type="submit" class=" custom-border">Tạo sản phẩm</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Thông báo lỗi nếu không có biến thể -->
                            <div id="variantError" class="text-red-500 mb-4" style="display: none;">Vui lòng thêm ít
                                nhất một biến thể.</div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // JavaScript to add more variants dynamically
    document.getElementById('addVariant').addEventListener('click', function () {
        const variantContainer = document.getElementById('variantContainer');
        const newVariant = document.createElement('div');
        newVariant.classList.add('variant', 'mb-4');
        newVariant.innerHTML = `
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Ảnh</span>
            <input type="file" name="variant_image[]" accept="image/*" class="variant-image block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
        </label>
        <div class="mt-2">
            <img class="variant-preview-image hidden w-32 h-32 object-cover rounded-md" />
        </div>

        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Màu sắc</span>
            <input type="text" name="variant_color[]" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" required />
        </label>
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Size</span>
            <input type="text" name="variant_size[]" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" required />
        </label>
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Giá</span>
            <input type="number" name="variant_price[]" step="0.01" min="0" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" required />
        </label>
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Số lượng</span>
            <input type="number" name="variant_stock[]" min="0" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" required />
        </label>
        <div class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
            <div class="delete-button px-2 py-3 text-center w-20 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <button type="button" class=" delete-variant">Xoá biến thể</button>
            </div>
        </div>
    `;
        variantContainer.appendChild(newVariant);
    });

    // JavaScript to handle deletion of variant
    document.getElementById('variantContainer').addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-variant')) {
            event.target.closest('.variant').remove();
        }
    });

    // JavaScript to handle image preview for dynamically added image inputs
    document.getElementById('variantContainer').addEventListener('change', function (event) {
        if (event.target.classList.contains('variant-image')) {
            var reader = new FileReader();
            reader.onload = function () {
                var preview = event.target.closest('.variant').querySelector('.variant-preview-image');
                preview.src = reader.result;
                preview.classList.remove('hidden'); // Show the image preview
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    });

    // Validate form before submitting
    document.getElementById('productForm').addEventListener('submit', function (event) {
        const variantContainer = document.getElementById('variantContainer');
        const variants = variantContainer.querySelectorAll('.variant');

        // Kiểm tra nếu không có biến thể nào
        if (variants.length === 0) {
            event.preventDefault();  // Ngừng gửi form
            document.getElementById('variantError').style.display = 'block';  // Hiển thị thông báo lỗi
        } else {
            document.getElementById('variantError').style.display = 'none';  // Ẩn thông báo lỗi nếu có biến thể
        }
    });
</script>
@endsection