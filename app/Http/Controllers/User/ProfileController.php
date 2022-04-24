<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user()->first();
        return view('front.profile',compact('user'));
    }

    public function store(Request $request,$id)
    {
        $validator    = Validator::make($request->all(),[
            'name'    => 'required|string|max:30',
            'address' => 'required|string|max:30',
            'phone'   => 'required|max:30',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::whereId($id)->first();

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $notificat = array(
            'message'    => 'you profile information updated successfully',
            'alert-type' => 'success');

        return redirect()->back()->with($notificat);
    } /* end method */

    public function profilePic(Request $request,$id)
    {
        $request->validate(['image'=>'required|image|mimes:png,jpg,jpeg|max:2024']);

        $user = User::whereId($id)->first();
        $image = $request->image;

        if ($request->file('image') && $user->image){
            unlink(public_path('user/'.$user->image));
        }
        if ($request->file('image')){
            $fileName = date('YmdHi').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user'),$fileName);
            $imageName = $fileName;
        }
        $user->update(['image'=> $imageName]);

        $notificat = array(
            'message'    => 'you profile Photo updated successfully',
            'alert-type' => 'success');

        return redirect()->back()->with($notificat);
    }
}
