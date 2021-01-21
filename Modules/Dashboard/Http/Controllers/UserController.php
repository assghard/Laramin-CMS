<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Dashboard\Http\Requests\UpdateUserRequest;
use Modules\Dashboard\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filterData = array_filter($request->all());
        unset($filterData['page']);
        if(empty($filterData)){
            $entities = User::orderBy('id', 'DESC')->paginate(100);
        }else{
            $entities = User::where($filterData)->orderBy('id', 'DESC')->paginate(100);
        }

        return view('dashboard::users.index', compact('entities'));
    }

    public function create()
    {
        return view('dashboard::users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::createNewOne($request->email, $request->password);

        return redirect()->route('dashboard.users.edit', $user->id)->withSuccess('User has been created successfully. Now complete rest user data');
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);

        return view('dashboard::users.edit', compact('user'));
    }

    public function update($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        if($user->is_admin != $request->is_admin){
            $user->is_admin = $request->is_admin;
            $user->save();
        }

        if($request->activated_user == 1 && empty($user->email_verified_at)){ // user should be activated
            $user->email_verified_at = now();
            $user->save();
        }elseif($request->activated_user == 0 && !empty($user->email_verified_at)){ // user should be deactivated
            $user->email_verified_at = NULL;
            $user->save();
        }

        if(isset($request->button) && $request->button == 'index'){
            return redirect()->route('dashboard.users.index')->withSuccess('User has been updated');
        }

        return redirect()->back()->withSuccess('User has been updated');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Deleted'
        ]);
    }

}
