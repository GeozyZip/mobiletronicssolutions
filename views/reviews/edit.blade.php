@extends('layouts.adminlayout')

@section('title', 'Edit Review')

@section('content')

<div class="mb-6">
    <a href="{{ route('reviews.index') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to Review List
    </a>
</div>

<div class="bg-white rounded shadow p-6 w-full max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Edit Review</h2>

    <form action="{{ route('reviews.update', $review->reviewId) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="reviewDesc" class="block font-medium mb-1">Description</label>
            <textarea name="reviewDesc" id="reviewDesc" 
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required>{{ old('reviewDesc', $review->reviewDesc) }}</textarea>
        </div>

        <div>
            <label for="reviewImage" class="block font-medium mb-1">Review Image (Optional)</label>
            <input type="file" name="reviewImage" id="reviewImage" accept="image/*" 
                class="w-full px-4 py-2 border border-gray-300 rounded">
            @if($review->reviewImage)
                <div class="mt-2">
                    <img 
                        src="{{ asset('review_images/' . $review->reviewImage) }}" 
                        alt="Review Image" 
                        class="w-32 rounded border cursor-pointer" 
                        onclick="openModal('{{ asset('review_images/' . $review->reviewImage) }}')">
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 w-full">
                💾 Update Review
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

    // Close the modal when clicking outside of the modal content
    document.getElementById('imageModal').addEventListener('click', function() {
        document.getElementById('imageModal').classList.remove('flex');
        document.getElementById('imageModal').classList.add('hidden');
    });
</script>

@endsection
