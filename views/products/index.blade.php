@extends('layouts.adminlayout')

@section('title', 'All Products')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="text-red-600 mb-4">{{ session('fail') }}</div>
    @endif

    <div class="mb-4">
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
            + Add New Product
        </a>
    </div>

    @if($products->count() > 0)
        <div class="overflow-auto bg-white rounded shadow">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Image</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Price</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $product->productId }}</td>
                        <td class="py-2 px-4">
                            @if($product->productImage)
                                <img src="{{ asset('product_images/' . $product->productImage) }}" alt="Product Image" class="w-24">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ $product->productName }}</td>
                        <td class="py-2 px-4">RM {{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4 whitespace-nowrap space-y-2">
                            <a href="{{ route('products.edit', $product->productId) }}" class="block bg-blue-600 text-white text-center px-3 py-1 rounded hover:bg-blue-700">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->productId) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">No products found.</p>
    @endif
@endsection
