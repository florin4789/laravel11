<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('title', 'home')->first();


        if (!$page) {
            return "No content found for Home.";
        }


        return view('home', compact('page'));
    }

    public function services()
    {

        $page = Page::where('title', 'services')->first();

        if (!$page) {
            return "No content found for Services.";
        }

        return view('services', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page->content = $request->input('content');

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($page->image) {
                Storage::delete($page->image); // Delete old image
            }
            $imagePath = $request->file('image')->store('uploads', 'public');
            $page->image = 'storage/' . $imagePath;
        }

        $page->save();

        return redirect()->route('pages.edit', $page)->with('success', 'Page updated successfully.');
    }
}
