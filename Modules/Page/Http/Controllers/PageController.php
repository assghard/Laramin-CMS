<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;

class PageController extends Controller
{
    public function index()
    {
        $entities = Page::paginate(100);

        return view('page::index', compact('entities'));
    }

    public function create()
    {
        return view('page::create');
    }

    public function store(Request $request)
    {
        try {
            // TODO: check if homepage is single in DB
            Page::create(array_merge($request->all(), ['slug' => Page::createSlug($request->title)]));
        } catch (\Throwable $th) {
            return redirect()->back()->withError($th->getMessage());
        }

        return redirect()->route('dashboard.pages.index')->withSuccess('Page has been created');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('page::edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        // TODO: check if homepage is single in DB
        $page = Page::findOrFail($id);
        $page->update($request->all());

        if (isset($request->button) && $request->button == 'index') {
            return redirect()->route('dashboard.pages.index')->withSuccess('Page has been updated');
        }

        return redirect()->back()->withSuccess('Page has been updated');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        if($page->is_homepage == 1){
            return response()->json([
                'success' => false,
                'message' => "Homepage can't be deleted"
            ]);
        }

        $page->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Page has been deleted'
        ]);
    }
}
