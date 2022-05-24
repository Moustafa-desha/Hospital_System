<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoints = Appointment::where('admin_id',Auth::id())->orderBy('id','DESC')->get();
        return view('admin.appointment.index',compact('appoints'));
    }

    public function check(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'date' => 'required|max:30',
//        ]);

//        if ($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        $date = $request->date;

        $appoint = Appointment::where('date',$date)
            ->where('admin_id',Auth::id())->first();

           if ($appoint){

               $appointId = $appoint->id;
               $times = Time::where('appointment_id',$appointId)->get();

               return view('admin.appointment.index',compact('times','date','appointId'));

           }else{

               $notification = array(
                   'message' => ' No Appointments for this date '.$request->date,
                   'alert-type' => 'warning',
               );
               return  redirect('admin/appoint/index')->with($notification);
           }

    } /* End Method */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
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

            'time' =>  'required|max:30',
            'date' => ['required','max:30',Rule::unique('appointments','date')->where(function ($query) {
                return $query->where('admin_id', Auth::id());
            })],

        ]);


        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $appoint = Appointment::create([

                  'admin_id' => Auth::user()->id,
                  'date'    => $request->date,
        ]);

                foreach ($request->time as $time){
                    Time::create([
                        'appointment_id' => $appoint->id,
                        'time'           => $time,
                    ]);
                }

           $notification = array(
               'message' => 'Appointment added successfully for date '.$request->date,
               'alert-type' => 'success',
           );

                return redirect()->back()->with($notification);

    }/*End METHOD */

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
    public function update(Request $request)
    {
        $appointId = $request->appointment_id;

        Time::where('appointment_id',$appointId)->delete();

        foreach ($request->time as $time){
            Time::create([
                'appointment_id' => $appointId,
                'time'           => $time,
            ]);
        }

        $notification = array(
            'message' => 'Appointment Updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.appoint.index')->with($notification);

    } /* END METHOD */



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
