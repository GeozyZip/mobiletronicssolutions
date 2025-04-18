@extends('layouts.adminlayout')

@section('title', 'Edit Product')

@section('content')

<div class="mb-6">
    <a href="{{ route('products.index') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to Product List
    </a>
</div>

<div class="bg-white rounded shadow p-6 w-full max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Edit Product</h2>

    <form action="{{ route('products.update', $product->productId) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="productName" class="block font-medium mb-1">Product Name</label>
            <input type="text" id="productName" name="productName" 
                value="{{ old('productName', $product->productName) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="price" class="block font-medium mb-1">Price (RM)</label>
            <input type="text" id="price" name="price" 
                value="{{ old('price', $product->price) }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="productImage" class="block font-medium mb-1">Product Image</label>
            <input type="file" id="productImage" name="productImage" accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded">
            @if($product->productImage)
                <div class="mt-2">
                    <img 
                        src="{{ asset('product_images/' . $product->productImage) }}" 
                        alt="Product Image" 
                        class="w-32 rounded border cursor-pointer" 
                        onclick="openModal('{{ asset('product_images/' . $product->productImage) }}')"
                    >
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
                💾 Update Product
            </button>
        </div>
    </form>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white w-96 p-4 rounded shadow relative" onclick="event.stopPropagation()">
        <img id="modalImage" src="" alt="Full Image" class="w-full h-auto max-h-[400px] object-contain">
    </div>
</div>

<script>
    function openModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
    }

    document.getElementById('imageModal').addEventListener('click', function () {
        this.classList.remove('flex');
        this.classList.add('hidden');
    });
</script>

@endsection
