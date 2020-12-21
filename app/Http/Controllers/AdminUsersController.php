<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\PasswordValidationRules;

class AdminUsersController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20, ['*'], 'page');
        return view('admin/users', compact("users"));
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->delete();
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/usersEdit', compact('user'));
    }

    public function add()
    {
        return view('admin/usersAdd');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rank = $request->get('rank');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->route('users.index');
    }

}
