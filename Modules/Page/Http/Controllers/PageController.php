<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;
use Modules\Page\Http\Requests\CreatePageRequest;
use Modules\Page\Http\Requests\UpdatePageRequest;
use Modules\Page\Services\PageService;

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

    public function store(CreatePageRequest $request, PageService $pageService)
    {
        $pageService->createPage($request->all());

        return redirect()->route('dashboard.pages.index')->withSuccess('Page has been created');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('page::edit', compact('page'));
    }

    public function update($id, UpdatePageRequest $request, PageService $pageService)
    {
        $pageService->updatePage($id, $request->all());

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
