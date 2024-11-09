@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white dark:bg-[#1E293B] shadow-sm rounded-lg mb-20">
        <div class="flex items-center justify-between py-5">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Product List</h1>
            <!-- Add New Product Button -->
            <div class="flex justify-between mb-4">
                <a href="{{ route('products.create') }}" class="bg-slate-900 font-medium text-white text-base px-6 py-4 rounded-md">Add New Product</a>
            </div>
        </div>

        <!-- Search and Sort Form -->
        <form method="GET" action="{{ route('products.index') }}" class="flex items-center mb-4 space-x-4">
            <!-- Search Field -->
            <div class="relative w-full">
                <input
                    type="text"
                    name="search"
                    placeholder="Search by product ID or description"
                    value="{{ request('search') }}"
                    class="border h-14 px-4 rounded-md w-full"
                >
                @if(request('search'))
                    <!-- Clear Search Button (X icon) -->
                    <button type="button" onclick="clearSearch()" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Sort Field Dropdown -->
            <select name="sort_by" class="border h-14 rounded-md">
                <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Sort by Name</option>
                <option value="price" {{ request('sort_by') === 'price' ? 'selected' : '' }}>Sort by Price</option>
            </select>

            <!-- Sort Direction Dropdown -->
            <select name="sort_direction" class="border h-14 rounded-md">
                <option value="asc" {{ request('sort_direction') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_direction') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="bg-slate-900 font-medium text-white text-base px-6 py-4 rounded-md">Filter</button>
        </form>

        @if($products->isEmpty())
            <div>
                No Result Found
            </div>
        @else
        <!-- Product Table -->
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-300">Product ID</th>
                <th class="p-4 border-b border-slate-300">Name</th>
                <th class="p-4 border-b border-slate-300">Description</th>
                <th class="p-4 border-b border-slate-300">Price</th>
                <th class="p-4 border-b border-slate-300">Stock</th>
                <th class="p-4 border-b border-slate-300">Image</th>
                <th class="p-4 border-b border-slate-300">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="p-4 border-b border-slate-300">{{ $product->product_id }}</td>
                    <td class="p-4 border-b border-slate-300">{{ $product->name }}</td>
                    <td class="p-4 border-b border-slate-300">{{ $product->description }}</td>
                    <td class="p-4 border-b border-slate-300">${{ $product->price }}</td>
                    <td class="p-4 border-b border-slate-300">{{ $product->stock }}</td>
                    <td class="p-4 border-b border-slate-300">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover rounded-md">
                        @endif
                    </td>
                    <td class="p-4 border-b border-slate-300">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('products.show', $product->id) }}" class="text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <button onclick="openDeleteModal({{ $product->id }})" class="text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $products->appends(request()->query())->links() }}
        </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
            <p>Are you sure you want to delete this product?</p>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="mt-4 flex justify-end">
                    <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(productId) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/products/' + productId;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function clearSearch() {
            // Clear the search query and reload the page
            const url = new URL(window.location.href);
            url.searchParams.delete('search');
            window.location.href = url;
        }
    </script>
@endsection
