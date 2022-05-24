<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function prescrView($id)
    {
        $prescription = Prescription::where('user_id',Auth::id())->first();
        return view('front.view_prescription',compact('prescription'));
    }
}
