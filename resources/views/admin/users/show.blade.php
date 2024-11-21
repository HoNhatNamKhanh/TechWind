@extends('admin.inc.app')
@section('title', 'View User')

@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <!-- Show User Info -->
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <h3 class="text-2xl py-3 px-4 font-semibold text-gray-800 dark:text-gray-200">Thông tin người dùng
                    </h3>
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 variant">

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Email:</span>
                            </label>
                            <input type="email"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $user->email }}" disabled />
                        </div>

                        <!-- Name -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Tên người dùng:</span>
                            </label>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $user->name }}" disabled />
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Quyền:</span>
                            </label>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ ucfirst($user->userMeta->role) }}" disabled />
                        </div>

                        <!-- Address (User Meta) -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Địa chỉ:</span>
                            </label>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $user->userMeta->address ?? 'Chưa có địa chỉ' }}" disabled />
                        </div>

                        <!-- Phone (User Meta) -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Số điện thoại:</span>
                            </label>
                            <input type="text"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                value="{{ $user->userMeta->phone ?? 'Chưa có số điện thoại' }}" disabled />
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-4">
                            <label class="block text-sm mb-2">
                                <span class="text-xl py-3 text-gray-700 dark:text-gray-400">Ảnh:</span>
                            </label>
                            <div class="w-32 h-32 object-cover rounded-md">
                                @if($user->userMeta->image)
                                    <img src="{{ asset('storage/' . $user->userMeta->image) }}" alt="User Image"
                                        class="h-full object-cover rounded-md" />
                                @else
                                    <p class="text-sm dark:text-gray-400">Chưa có ảnh</p>
                                @endif
                            </div>
                        </div>

                        <!-- Delete Button -->
                        <div class="mt-4 grid-cols-4 gap-4">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600">
                                <div
                                    class="create-button px-2 py-4 text-center transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <i class="fa fa-edit"></i> Chỉnh sửa
                                </div>
                            </a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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