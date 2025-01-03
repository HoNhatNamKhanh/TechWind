@extends('admin.inc.app')
@section('title', 'Categories List')

@section('content')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">

        <h4 class="mb-4 text-lg font-semibold text-white dark:text-gray-300 border-gray-300 dark:border-gray-600 ">
            <div class="w-56  text-center  create-button px-2 py-2  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                <a class="custom-border" href="{{ route('categories.create') }}">Tạo danh mục mới</a>
            </div>
        </h4>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <a
                                    href="{{ route('categories.index', ['sort' => 'id', 'direction' => ($sortField === 'id' && $sortDirection === 'asc') ? 'desc' : 'asc']) }}">
                                    <span>ID</span>
                                </a>
                            </th>
                            <th class="px-4 py-3">
                                <a
                                    href="{{ route('categories.index', ['sort' => 'name', 'direction' => ($sortField === 'name' && $sortDirection === 'asc') ? 'desc' : 'asc']) }}">
                                    <span>Tên</span>
                                </a>
                            </th>
                            <th class="px-4 py-3">Mô tả</th>
                            <th class="px-4 py-3">
                                <a
                                    href="{{ route('categories.index', ['sort' => 'parent_id', 'direction' => ($sortField === 'parent_id' && $sortDirection === 'asc') ? 'desc' : 'asc']) }}">
                                    <span>Danh mục chính</span>
                                </a>
                            </th>
                            <th class="px-4 py-3">
                                <a
                                    href="{{ route('categories.index', ['sort' => 'created_at', 'direction' => ($sortField === 'created_at' && $sortDirection === 'asc') ? 'desc' : 'asc']) }}">
                                    <span>Ngày khởi tạo</span>
                                </a>
                            </th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($categories as $category)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <span class="font-semibold text-sm">{{ $category->id }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('categories.show', $category->id) }}">
                                        <span class="font-semibold text-sm">{{ $category->name }}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="text-xs text-gray-600 dark:text-gray-400 text-truncate"
                                        style="max-width: 250px;" title="{{ $category->description }}">
                                        {{ \Str::limit($category->description, 50) }}
                                    </p>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{ $category->parent ? $category->parent->name : '' }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <span
                                        class="text-xs font-semibold text-secondary">{{ $category->created_at->format('d/m/Y') }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            style="display:inline;" onclick="return confirm('Bạn muốn xoá sản phẩm này?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
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
        </div>

        <!-- Pagination -->
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing {{ $categories->firstItem() }}-{{ $categories->lastItem() }} of {{ $categories->total() }}
            </span>
            <span class="col-span-2"></span>

            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <!-- Previous Button -->
                        <li>
                            <a href="{{ $categories->previousPageUrl() }}"
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Previous" {{ $categories->onFirstPage() ? 'disabled' : '' }}>
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple {{ $page == $categories->currentPage() ? 'bg-purple-600 text-white' : '' }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach

                        <!-- Next Button -->
                        <li>
                            <a href="{{ $categories->nextPageUrl() }}"
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                aria-label="Next" {{ $categories->hasMorePages() ? '' : 'disabled' }}>
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </span>
        </div>
    </div>
</main>


@endsection