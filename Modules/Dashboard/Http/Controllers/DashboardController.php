<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Page\Entities\Page;
use Modules\Core\Entities\SystemErrorEntity;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = cache()->remember('users-count', 60*60*12, function () {
            return User::count();
        });

        $pagesCount = cache()->remember('pages-count', 60*60*12, function () {
            return Page::count();
        });

        return view('dashboard::index', compact('usersCount', 'pagesCount'));
    }

    public function systemErrorsIndex() 
    {
        $entities = SystemErrorEntity::orderBy('id', 'DESC')->paginate(10);

        return view('dashboard::system-errors.index', compact('entities'));
    }

    public function systemErrorDelete($id) 
    {
        SystemErrorEntity::findOrFail($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Entity has been deleted'
        ]);
    }

    public function systemErrorsTruncate() 
    {
        SystemErrorEntity::truncate();

        return response()->json([
            'success' => true,
            'message' => 'Table has been truncated'
        ]);
    }
}
