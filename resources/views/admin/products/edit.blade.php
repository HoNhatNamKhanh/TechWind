@extends('admin.inc.app')
@section('title', 'Edit Product')

@section('content')

<main class="h-full pb-16">
    <div class="container px-6 mx-auto grid">
        <div class="card-body px-0 pt-0 pb-2 overflow-auto">
            <h3 class="text-lg py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Chỉnh sửa sản phẩm
            </h3>

            <form id="productForm" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="variant px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <!-- Tên sản phẩm -->
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Tên sản phẩm</span>
                        <input type="text" name="name" id="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            value="{{ old('name', $product->name) }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>

                    <!-- Mô tả -->
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Mô tả</span>
                        <textarea name="description" id="description" rows="3"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </label>

                    <!-- Danh mục -->
                    <label class="block text-sm mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Danh mục</span>
                        <select name="category_id" id="category_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Biến thể sản phẩm -->
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Biến thể sản
                        phẩm</h5>
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
                                    <tbody id="variantContainer">
                                        @foreach ($product->variants as $variant)
                                            <tr class="border">
                                                <input type="hidden" name="variant_id[]" value="{{ $variant->id }}">
                                                <!-- Ảnh biến thể -->
                                                <td class="align-middle text-center border py-3 px-4">
                                                    <!-- Hiển thị ảnh nếu có -->
                                                    @if ($variant->image)
                                                        <div class="image-container flex justify-center"
                                                            style="position: relative;">
                                                            <!-- Hiển thị ảnh hiện tại nếu có -->
                                                            <img id="variant-image-{{ $variant->id }}"
                                                                src="{{ asset('storage/' . $variant->image) }}"
                                                                class="flex justify-center" alt="Variant Image"
                                                                style="width: 75px; height: auto; cursor: pointer;"
                                                                onclick="triggerFileInput({{ $variant->id }})">

                                                            <!-- Hidden input file -->
                                                            <input type="file" name="variant_image[]" accept="image/*"
                                                                class="form-control mt-2 hidden"
                                                                id="file-input-{{ $variant->id }}"
                                                                onchange="previewImage(event, {{ $variant->id }})">
                                                        </div>
                                                    @else
                                                        <div class="image-container flex justify-center"
                                                            style="position: relative;">
                                                            <!-- Không có ảnh, chỉ hiển thị input file -->
                                                            <input type="file" name="variant_image[]" accept="image/*"
                                                                class="form-control mt-2" id="file-input-{{ $variant->id }}"
                                                                onchange="previewImage(event, {{ $variant->id }})">
                                                        </div>
                                                    @endif
                                                </td>

                                                <!-- Màu sắc -->
                                                <td class="align-middle border  py-3 px-4">
                                                    <input type="text" name="variant_color[]"
                                                        value="{{ old('variant_color.' . $loop->index, $variant->color) }}"
                                                        class="form-control" required>
                                                </td>

                                                <!-- Size -->
                                                <td class="align-middle border py-3 px-4">
                                                    <input type="text" name="variant_size[]"
                                                        value="{{ old('variant_size.' . $loop->index, $variant->size) }}"
                                                        class="form-control" required>
                                                </td>

                                                <!-- Giá -->
                                                <td class="align-middle text-center border py-3 px-4">
                                                    <input type="number" name="variant_price[]"
                                                        value="{{ old('variant_price.' . $loop->index, $variant->price) }}"
                                                        class="form-control" min="0" step="0.01" required>
                                                </td>

                                                <!-- Số lượng -->
                                                <td class="align-middle text-center border py-3 px-4">
                                                    <input type="number" name="variant_stock[]"
                                                        value="{{ old('variant_stock.' . $loop->index, $variant->stock) }}"
                                                        class="form-control" min="0" required>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Thêm biến thể mới -->
                    <div class="grid-cols-4 gap-4">
                        <div
                            class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                            <div
                                class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <button type="button" class=" custom-border" id="addVariant">Thêm
                                    biến
                                    thể</button>
                            </div>
                        </div>
                        <!-- Nút submit -->
                        <div
                            class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                            <div
                                class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <button type="submit" class=" custom-border">Cập nhật sản phẩm</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>

<script>
    // Kích hoạt input file khi nhấn vào ảnh
    // Hàm để kích hoạt input file
    function triggerFileInput(variantId) {
        // Kích hoạt input file ẩn
        document.getElementById('file-input-' + variantId).click();
    }

    // Hàm để hiển thị ảnh khi người dùng chọn ảnh
    function previewImage(event, variantId) {
        const file = event.target.files[0];
        const reader = new FileReader();

        // Khi file được đọc xong
        reader.onload = function (e) {
            // Lấy phần tử hình ảnh và cập nhật src mới
            const imagePreview = document.getElementById('variant-image-' + variantId);
            if (imagePreview) {
                imagePreview.src = e.target.result;  // Cập nhật ảnh mới
                imagePreview.style.objectFit = 'cover';  // Đảm bảo ảnh không bị méo
            }

            // Ẩn input file để chỉ hiển thị ảnh
            const fileInput = document.getElementById('file-input-' + variantId);
            if (fileInput) {
                fileInput.classList.add('hidden');
            }
        };

        // Nếu có file được chọn, đọc ảnh dưới dạng URL
        if (file) {
            reader.readAsDataURL(file); // Đọc file dưới dạng URL để hiển thị
        }
    }


    document.getElementById('addVariant').addEventListener('click', function () {
        const variantContainer = document.getElementById('variantContainer');
        const newVariantRow = document.createElement('tr');
        newVariantRow.classList.add('border');
        newVariantRow.innerHTML = `
        <td class="py-3 px-4 align-middle text-center border">
            <input style="max-width:85px" type="file" name="variant_image[]" accept="image/*" class="form-control">
        </td>
        <td class="py-3 px-4 align-middle border">
            <input type="text" name="variant_color[]" class="form-control" required>
        </td>
        <td class="py-3 px-4 align-middle border">
            <input type="text" name="variant_size[]" class="form-control" required>
        </td>
        <td class="py-3 px-4 align-middle text-center border">
            <input type="number" name="variant_price[]" class="form-control" min="0" step="0.01" required>
        </td>
        <td class="py-3 px-4 align-middle text-center border">
            <input type="number" name="variant_stock[]" class="form-control" min="0" required>
        </td>
        
    `;
        variantContainer.appendChild(newVariantRow);
    });

    // Xóa biến thể
    document.getElementById('variantContainer').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-variant')) {
            event.target.closest('tr').remove();
        }
    });

</script>

@endsection