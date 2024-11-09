@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mb-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-100 p-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Add New Product</h1>
        </div>
    </div>
    <div class="max-w-2xl mx-auto p-10 bg-gray-100 rounded-md shadow-sm">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="product_id" class="block text-sm font-medium ">Product ID</label>
                <input type="text" name="product_id" id="product_id" value="product{{ old('product_id') }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
                @error('product_id') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium ">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
                @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium ">Description</label>
                <textarea name="description" id="description"
                          class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">{{ old('description') }}</textarea>
                @error('description') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium ">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
                @error('price') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium ">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
                @error('stock') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium ">Image</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 cursor-pointer"
                       onchange="previewImage(event)">
                <img id="image-preview" src="#" alt="Image Preview" class="hidden w-32 h-32 mt-4 object-cover rounded-md">
                @error('image') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="bg-slate-900 font-medium text-white text-base px-6 py-4 rounded-md">Add Product</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const output = document.getElementById('image-preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.classList.remove('hidden');
            output.onload = () => URL.revokeObjectURL(output.src);
        }

        document.getElementById('price').addEventListener('input', function () {
            if (this.value < 0) this.value = 0;
        });

        document.getElementById('stock').addEventListener('input', function () {
            if (this.value < 0) this.value = 0;
        });
    </script>
@endsection
