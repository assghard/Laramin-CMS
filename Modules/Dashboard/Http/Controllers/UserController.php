<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request->email)){
            $entities = User::orderBy('id', 'DESC')->paginate(100);
        }else{
            $entities = User::where('email', $request->email)->orderBy('id', 'DESC')->paginate(100);
        }

        return view('dashboard::users.index', compact('entities'));
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);

        return view('dashboard::users.edit', compact('user'));
    }

    public function update($id, Request $request) 
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        if($user->is_admin != $request->is_admin){
            $user->is_admin = $request->is_admin;
            $user->save();
        }

        if(isset($request->button) && $request->button == 'index'){
            return redirect()->route('dashboard.users.index')->withSuccess('User has been updated');
        }

        return redirect()->back()->withSuccess('User has been updated');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Deleted'
        ]);
    }

    // public function activateAccount($id) 
    // {
    //     $user = User::findOrFail($id);
    //     $user->email_verified_at = now();
    //     $user->save();

    //     try {
    //         // TODO: mail
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->withError('Send email error');
    //         // System Error entity
    //     }

    //     return redirect()->back()->withSuccess('User account has been activated successfully');
    // }

}
