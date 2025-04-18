@extends('layouts.adminlayout')

@section('title', 'Add New Product')

@section('content')

    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
            ← Back to Product List
        </a>
    </div>

    <div class="bg-white rounded shadow p-6 w-full max-w-xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="productName" class="block font-medium mb-1">Product Name</label>
                <input type="text" id="productName" name="productName" 
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label for="price" class="block font-medium mb-1">Price (RM)</label>
                <input type="text" id="price" name="price" 
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label for="productImage" class="block font-medium mb-1">Product Image</label>
                <input type="file" id="productImage" name="productImage" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="imagePreview" class="hidden w-32 border rounded" />
                </div>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
                    ➕ Save Product
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>

@endsection
