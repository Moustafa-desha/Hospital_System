<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $data = User::where('role_id','=' ,2)->get();
        $data = DB::table('users')
            ->join('roles','users.role_id' , '=','roles.id')
            ->where('roles.title' , '=','doctor')
            ->select('users.*')->paginate(5);
        return view('admin.doctor.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('title', '!=' ,'patient')->get();
        return view('admin.doctor.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
                    'name'              =>  'required|string|max:255',
                    'email'             =>  'required|unique:users|email|max:255',
                    'gender'            =>  'required|string|max:255',
                    'password'          =>  'required|min:6|max:25',
                    'phone'             =>  'required|string:max:255',
                    'department'        =>  'required|string|max:255',
                    'education'         =>  'required|string|max:255',
                    'address'           =>  'required|string|max:255',
                    'role_id'           =>  'required|max:255',
                    'image'             =>  'mimes:jpeg,jpg,png,gif|max:2048',
                    'description'       =>  'max:5000',
        ]);
            if ($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

                    $data['name']           = $request->name;
                    $data['email']          = $request->email;
                    $data['gender']         = $request->gender;
                    $data['password']       = Hash::make($request->password);
                    $data['phone']          = $request->phone;
                    $data['department']     = $request->department;
                    $data['education']      = $request->education;
                    $data['address']        = $request->address;
                    $data['role_id']        = $request->role_id;
                    $data['description']    = $request->description;
                    $image                  = $request->image;

                    if(isset($image)){
                        $filename = date('YmdHi').'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('admin/media'),$filename);
                        $data['image'] = $filename;
                    }

                    /* to Distinguish he send doctor or admin and show in notification */
                   $roleName = Role::whereId($request->role_id)->select('title')->first();

                    User::create($data);

             $notificat = array(
                 'message'    => $roleName->title .' created successful',
                 'alert-type' => 'success'
             );
                    return redirect()->back()->with($notificat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
