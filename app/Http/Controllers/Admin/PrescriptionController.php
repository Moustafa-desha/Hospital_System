<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PrescriptionController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('doctor_id',Auth::id())
            ->orderBy('date', 'DESC')->paginate(10);
        return view('admin.prescription.index',compact('bookings'));
    }

    public function prescrStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'disease_name'     => 'required|max:255',
            'medicine'         => 'required|max:255',
            'symptoms'         => 'required|max:255',
            'how_use_medicine' => 'required|max:255',
            'feedback'         => 'required|max:255',
            'signature'        => 'required|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Prescription::create([
            'date'                  =>  $request->date,
            'doctor_id'             =>  $request->doctor_id,
            'user_id'               =>  $request->user_id,
            'disease_name'          =>  $request->disease_name,
            'medicine'              =>  $request->medicine,
            'symptoms'              =>  $request->symptoms,
            'how_use_medicine'      =>  $request->how_use_medicine,
            'feedback'              =>  $request->feedback,
            'signature'             =>  $request->signature,
        ]);
        $notification = array(
            'message' => 'Prescription added successfully ',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

    public function prescrView($id)
    {
        $prescription = Prescription::where('user_id',$id)->first();
        return view('admin.prescription.viewModal',compact('prescription'));
    }

    public function prescrEdit($id)
    {
        $prescription = Prescription::where('user_id',$id)->first();
        return view('admin.prescription.edit',compact('prescription'));
    }

    public function saveEdit(Request $request,$id)
    {
        $prescription = Prescription::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'disease_name'     => 'required|max:255',
            'medicine'         => 'required|max:255',
            'symptoms'         => 'required|max:255',
            'how_use_medicine' => 'required|max:255',
            'feedback'         => 'required|max:255',
            'signature'        => 'required|max:255',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


            $data['date' ]                 =  Carbon::now()->format('Y-m-d');
            $data['doctor_id']             =  $request->doctor_id;
            $data['user_id']               =  $request->user_id;
            $data['disease_name']          =  $request->disease_name;
            $data['medicine']              =  $request->medicine;
            $data['symptoms']              =  $request->symptoms;
            $data['how_use_medicine']      =  $request->how_use_medicine;
            $data['feedback']              =  $request->feedback;
            $data['signature']             =  $request->signature;

            $prescription->update($data);


        $notification = array(
            'message' => 'Prescription Updated successfully ',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.patient')->with($notification);
    }
}
