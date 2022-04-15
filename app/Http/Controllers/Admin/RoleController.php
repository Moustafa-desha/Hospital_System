<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:2|max:30|string'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Role::create([
            'title' => $request->title,
        ]);

        $notificat = array(
            'message' => 'Role added successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notificat);
    } /* END METHOD */


    public function edit($id)
    {

    } /* END METHOD */



    public function delete(Request $request,$id)
    {
        $role = Role::findOrFail($id)->delete();

        $notificat = array(
            'message' => 'Role deleted successfully',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notificat);

    }
}
