<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Entities\UserSubmission;

class UserSubmissionsController extends Controller
{
    public function index()
    {
        $entities = UserSubmission::paginate(10);

        return view('dashboard::user-submissions.index', compact('entities'));
    }

    public function destroy($id)
    {
        UserSubmission::findOrFail($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'UserSubmission has been deleted'
        ]);
    }
}
