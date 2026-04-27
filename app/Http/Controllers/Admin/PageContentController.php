<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 'home');
        $contents = PageContent::where('page', $page)->orderBy('section')->orderBy('order')->get();
        return view('admin.page-contents.index', compact('contents', 'page'));
    }

    public function create(Request $request)
    {
        $page = $request->get('page', 'home');
        return view('admin.page-contents.create', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string|max:100',
            'section' => 'nullable|string|max:100',
            'key' => 'required|string|max:255|unique:page_contents,key',
            'value' => 'nullable|string',
            'type' => 'required|string|max:50',
            'label' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        PageContent::create($request->all());

        return redirect()->route('admin.page-contents.index', ['page' => $request->page])
            ->with('success', 'Content created successfully.');
    }

    public function edit(PageContent $pageContent)
    {
        return view('admin.page-contents.edit', compact('pageContent'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $request->validate([
            'page' => 'required|string|max:100',
            'section' => 'nullable|string|max:100',
            'key' => 'required|string|max:255|unique:page_contents,key,' . $pageContent->id,
            'value' => 'nullable|string',
            'type' => 'required|string|max:50',
            'label' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $pageContent->update($request->all());

        return redirect()->route('admin.page-contents.index', ['page' => $request->page])
            ->with('success', 'Content updated successfully.');
    }

    public function destroy(PageContent $pageContent)
    {
        $page = $pageContent->page;
        $pageContent->delete();
        return redirect()->route('admin.page-contents.index', ['page' => $page])
            ->with('success', 'Content deleted successfully.');
    }

    public function updateMultiple(Request $request)
    {
        $request->validate([
            'contents' => 'required|array',
        ]);

        foreach ($request->contents as $id => $data) {
            PageContent::where('id', $id)->update(['value' => $data['value'] ?? '']);
        }

        return back()->with('success', 'Contents updated successfully.');
    }
}
