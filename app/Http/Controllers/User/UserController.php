<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentMail;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function welcome()
    {
        $doctors = Appointment::where('date',date('Y-m-d'))->get();

            if (\request('date')){
                $doctors = $this->DoctorByDate(\request('date'));
                return view('welcome',compact('doctors'));
            }
        return view('welcome',compact('doctors'));
    }

    public function DoctorByDate($date)
    {
        $doctors = Appointment::where('date',$date)->get();
        return $doctors;
    }

    public function reservation($id)
    {
        $appoint = Appointment::whereId($id)->first();

        $times = Time::where('appointment_id',$appoint->id)->where('status',0)->get();

        return view('front.appointment',compact('appoint','times'));
    }/* END METHOD */

    public function makeAppoint(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'time'       => 'required','max:30',
            'date'       => 'max:30',
            'doctor_id'  => 'max:30',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $booking = Booking::where('user_id',Auth::id())
                    ->where('date',$request->date)
                    ->where('doctor_id',$request->doctorId)
                    ->exists();

        if ($booking){
            return redirect()->back()->with('errorMessage', 'You Already Have Appointment  for date '.$request->date);
        }

        Booking::create([
            'user_id'    => Auth::id(),
            'doctor_id' => $request->doctorId,
            'time'      => $request->time,
            'date'      => $request->date,
            'status'    => 0,
        ]);
        Time::where('time',$request->time)->where('appointment_id',$request->appointmentId)
            ->update(['status' => 1]);

        /*** Send Email Notification for user ***/

        $doctorName = Admin::whereId($request->doctorId)->first();
        $emailData = [
            'userName' => Auth::user()->name,
            'time'      => $request->time,
            'date'      => $request->date,
            'doctorName' => $doctorName->name,
        ];

        Mail::to(Auth::user()->email)->send(new AppointmentMail($emailData));

        $notificate = array(
            'message'    => 'Appointment booked successfully for date '.$request->date,
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notificate);

    }/* END METHOD */

    public function myBooking()
    {
        $bookings = Booking::latest()->where('user_id',Auth::id())->paginate(10);

        return view('front.booking',compact('bookings'));
    }


}
