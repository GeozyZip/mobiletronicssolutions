@extends('layouts.adminlayout')

@section('title', 'Add New Review')

@section('content')

    <div class="mb-6">
        <a href="{{ route('reviews.index') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
            ← Back to Review List
        </a>
    </div>

    <div class="bg-white rounded shadow p-6 w-full max-w-xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Add New Review</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="reviewDesc" class="block font-medium mb-1">Review Description</label>
                <textarea id="reviewDesc" name="reviewDesc" 
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" required>{{ old('reviewDesc') }}</textarea>
            </div>

            <div>
                <label for="reviewImage" class="block font-medium mb-1">Review Image (optional)</label>
                <input type="file" id="reviewImage" name="reviewImage" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="imagePreview" class="hidden w-32 border rounded" />
                </div>
                <p class="text-sm text-gray-500 mt-1">Accepted formats: jpeg, png, jpg, gif. Max size: 2MB</p>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
                    💬 Save Review
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
