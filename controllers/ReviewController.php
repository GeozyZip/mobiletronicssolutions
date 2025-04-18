<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = ReviewModel::orderBy('reviewId', 'desc')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewDesc' => 'required|string|max:500',
            'reviewImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('reviewImage')) {
                $imageName = time().'.'.$request->reviewImage->extension();
                $request->reviewImage->move(public_path('review_images'), $imageName);
                $validated['reviewImage'] = $imageName;
            }

            ReviewModel::create($validated);
            return redirect()->route('reviews.index')->with('success', 'Review created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to create review: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $review = ReviewModel::findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = ReviewModel::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = ReviewModel::findOrFail($id);

        $validated = $request->validate([
            'reviewDesc' => 'required|string|max:500',
            'reviewImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('reviewImage')) {
                // Delete old image if exists
                if ($review->reviewImage && file_exists(public_path('review_images/'.$review->reviewImage))) {
                    unlink(public_path('review_images/'.$review->reviewImage));
                }

                $imageName = time().'.'.$request->reviewImage->extension();
                $request->reviewImage->move(public_path('review_images'), $imageName);
                $validated['reviewImage'] = $imageName;
            }

            $review->update($validated);
            return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to update review: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $review = ReviewModel::findOrFail($id);

        try {
            // Delete associated image
            if ($review->reviewImage && file_exists(public_path('review_images/'.$review->reviewImage))) {
                unlink(public_path('review_images/'.$review->reviewImage));
            }

            $review->delete();
            return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('reviews.index')->with('fail', 'Failed to delete review: '.$e->getMessage());
        }
    }

    
}