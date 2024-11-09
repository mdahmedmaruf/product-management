@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mb-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-100 p-3 rounded-md">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Edit Product</h1>
        </div>
    </div>
    <div class="max-w-2xl mx-auto p-10 bg-gray-100 rounded-md shadow-sm">


        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product ID</label>
                <input type="text" name="product_id" id="product_id" value="{{ $product->product_id }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description"
                          class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}"
                       class="mt-1 block w-full p-3 text-base border-transparent rounded-md focus-visible:ring-transparent">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 cursor-pointer"
                       onchange="previewImage(event)">
                <img id="image-preview" src="{{ $product->image ? asset('storage/' . $product->image) : '#' }}"
                     alt="Image Preview" class="{{ $product->image ? 'w-32 h-32 mt-4 object-cover rounded-md' : 'hidden' }}">
            </div>

            <button type="submit" class="bg-slate-900 font-medium text-white text-base px-6 py-4 rounded-md">Update Product</button>
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
