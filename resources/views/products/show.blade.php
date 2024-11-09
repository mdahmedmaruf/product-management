@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mb-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 bg-gray-100 p-3 rounded-md">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Product Details</h1>
        </div>
    </div>
    <div class="max-w-xl mx-auto p-10 bg-gray-100 rounded-md shadow-sm">
        <div class="mb-4">
            <strong>Product ID:</strong> {{ $product->product_id }}
        </div>

        <div class="mb-4">
            <strong>Name:</strong> {{ $product->name }}
        </div>

        <div class="mb-4">
            <strong>Description:</strong> {{ $product->description }}
        </div>

        <div class="mb-4">
            <strong>Price:</strong> ${{ number_format($product->price, 2) }}
        </div>

        <div class="mb-4">
            <strong>Stock:</strong> {{ $product->stock }}
        </div>

        <div class="mb-4">
            <strong>Image:</strong>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                     class="w-32 h-32 object-cover mt-2 rounded-md">
            @else
                <span>No Image Available</span>
            @endif
        </div>
    </div>
@endsection
