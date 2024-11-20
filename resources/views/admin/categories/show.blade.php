@extends('admin.inc.app')
@section('title', 'Chi tiết danh mục')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Tên:
                        {{ $category->name }}
                    </h3>

                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 variant">
                        <!-- Tên danh mục -->

                        <!-- Danh mục cha -->
                        @if($category->parent)
                            <label class="block text-sm mb-4">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Danh mục cha:</span>
                                <p class="text-gray-800 dark:text-gray-300">{{ $category->parent->name }}</p>
                            </label>
                        @else
                            <label class="block text-sm mb-4">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Danh mục cha:</span>
                                <p class="text-gray-800 dark:text-gray-300">Không có danh mục cha</p>
                            </label>
                        @endif

                        <!-- Mô tả -->
                        <label class="block text-sm mb-4">
                            <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Mô tả:</span>
                            <p class="text-gray-800 dark:text-gray-300">{{ $category->description ?? 'Chưa có mô tả' }}
                            </p>
                        </label>

                        <!-- Ảnh danh mục -->
                        @if($category->thumbnail)
                            <label class="block text-sm mb-4">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Ảnh danh mục:</span>
                                <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Ảnh danh mục"
                                    class="rounded-md w-32 h-32 object-cover mt-2">
                            </label>
                        @else
                            <label class="block text-sm mb-4">
                                <span class="text-gray-700 dark:text-gray-400">Ảnh danh mục:</span>
                                <p class="text-gray-800 dark:text-gray-300">Không có ảnh</p>
                            </label>
                        @endif

                        <!-- Các hành động -->
                        <div class="mt-4 grid-cols-4 gap-4">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                                <div
                                    class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <i class="fa fa-edit"></i> Chỉnh sửa
                                </div>
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                class="inline-block "
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                @csrf
                                @method('DELETE')
                                <div
                                    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                                    <div
                                        class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <button type="submit" class="">Xoá danh mục</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection