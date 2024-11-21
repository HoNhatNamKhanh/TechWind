@extends('admin.inc.app')
@section('title', 'Edit ' . $category->name)

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-body px-0 pt-0 pb-2 ">
                        <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Chỉnh sửa danh mục</h3>
                        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 variant">
                                <!-- Parent Category -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Danh mục cha (Không bắt buộc)</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="parent_id">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>

                                <!-- Category Name -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Tên danh mục</span>
                                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Nhập tên danh mục" name="name" value="{{ old('name', $category->name) }}" required />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </label>

                                <!-- Description -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Mô tả</span>
                                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea"
                                        rows="3" placeholder="Nhập mô tả cho danh mục" name="description">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </label>

                                <!-- Image Upload -->
                                <label class="block text-sm mb-4">
                                    <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Ảnh</span>
                                    <input type="file" name="thumbnail" accept="image/*" id="thumbnail"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                </label>

                                <!-- Image Preview -->
                                <div id="image-preview" class="mt-2">
                                    @if($category->thumbnail)
                                        <img id="preview-image" src="{{ asset('storage/' . $category->thumbnail) }}" alt="Image Preview"
                                            class="w-32 h-32 object-cover rounded-md" />
                                    @else
                                        <img id="preview-image" src="#" alt="Image Preview" class="hidden w-32 h-32 object-cover rounded-md" />
                                    @endif
                                </div>

                                <div class="mb-4 my-6 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                                    <div
                                        class="create-button px-2 py-4 text-center w-20 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <button type="submit" class="">Cập nhập</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>

<script>
    // JavaScript to preview the uploaded image
    document.getElementById('thumbnail').addEventListener('change', function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var preview = document.getElementById('preview-image');
            preview.src = reader.result;
            preview.classList.remove('hidden'); // Show the image preview
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>
@endsection
