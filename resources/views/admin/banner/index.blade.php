@extends('admin.inc.app')

@section('content')
<main class="h-full overflow-y-auto">
    <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Thay đổi banner</h3>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 variant">
        <div id="grid" class="grid-b">

           

            <!-- Banner 2 -->
            <div class="banner">
                <div class="group">
                    <label for="thumbnail-{{ $banners[1]->id }}">
                        <img src="{{ asset('storage/' . $banners[1]->thumbnail) }}"
                            alt="{{ $banners[1]->name }}" id="banner-image-{{ $banners[1]->id }}">
                    </label>
                    <form action="{{ route('admin.banner.update', $banners[1]->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_thumbnail" value="{{ $banners[1]->thumbnail }}">
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input my-4"
                            type="text" name="name" value="{{ $banners[2]->name }}"
                            id="banner-name-{{ $banners[1]->id }}" placeholder="Enter banner name">
                        <input type="file" name="thumbnail" id="thumbnail-{{ $banners[1]->id }}" class="file-input"
                            onchange="previewImage({{ $banners[1]->id }})">
                        <div
                            class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <button type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Banner 3 -->
            <div class="banner">
                <div class="group">
                    <label for="thumbnail-{{ $banners[2]->id }}">
                        <img src="{{ asset('storage/' . $banners[2]->thumbnail) }}"
                            alt="{{ $banners[2]->name }}" id="banner-image-{{ $banners[2]->id }}">
                    </label>
                    <form action="{{ route('admin.banner.update', $banners[2]->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_thumbnail" value="{{ $banners[2]->thumbnail }}">
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input my-4" type="text" name="name" value="{{ $banners[2]->name }}"
                            id="banner-name-{{ $banners[2]->id }}" placeholder="Enter banner name">
                        <input type="file" name="thumbnail" id="thumbnail-{{ $banners[2]->id }}" class="file-input"
                            onchange="previewImage({{ $banners[2]->id }})">
                        <div
                            class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <button type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    function previewImage(bannerId) {
            const fileInput = document.getElementById('thumbnail-' + bannerId);
            const imagePreview = document.getElementById('banner-image-' + bannerId);
            const maxHeight = 300;  // Giới hạn chiều cao tối đa (300px)

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = new Image();
                    img.onload = function () {
                        // Kiểm tra nếu chiều cao của ảnh lớn hơn maxHeight
                        if (img.height > maxHeight) {
                            // Điều chỉnh chiều cao ảnh
                            imagePreview.src = e.target.result;
                            imagePreview.style.height = maxHeight + 'px';  // Giới hạn chiều cao
                            imagePreview.style.objectFit = 'cover'; // Giữ tỉ lệ ảnh
                        } else {
                            imagePreview.src = e.target.result;  // Nếu chiều cao ảnh nhỏ hơn maxHeight, hiển thị bình thường
                            imagePreview.style.height = ''; // Bỏ giới hạn chiều cao nếu ảnh hợp lệ
                            imagePreview.style.objectFit = ''; // Bỏ tỉ lệ cover nếu không cần thiết
                        }
                    };
                    img.src = e.target.result;  // Đọc file ảnh và xử lý
                };
                reader.readAsDataURL(fileInput.files[0]);  // Đọc file ảnh
            }
        }

</script>

@endsection
