<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('admin.index'); //render admin page
    }

    public function editHome()
    {
        $page = Page::firstOrCreate(['title' => 'home']); // Load or create "home" page content
        return view('admin.edit-page', compact('page'));
    }

    public function updateHome(Request $request)
    {
        // Save home page content (use database or file)
    }

    public function editServices()
    {
        $page = Page::firstOrCreate(['title' => 'services']); // Load or create "services" page content
        return view('admin.edit-page', compact('page'));
    }

    public function updateServices(Request $request)
    {
        // Save services page content
    }

    public function updatePage(Request $request, $title)
    {
        $page = Page::where('title', $title)->firstOrFail();

        $page->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $page->image = str_replace('public/', 'storage/', $imagePath);
        }

        $page->save();

        return back()->with('success', 'Page updated successfully!');
    }
}
