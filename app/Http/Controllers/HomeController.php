<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
       if(Auth::id()){
           if(Auth::user()->usertype=='0'){
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));
           }
           else{
               return view('admin.home');
           }

       } else{
           return redirect()->back();
       }
    }
    public function home(){
        if(Auth::id()){
            return redirect('home');
        }else{
        $doctor=doctor::all();
        return view('user.home',compact('doctor'));
    }
    }

    public function doctors(){
        $doctor=doctor::paginate(3);
        return view('user.doctors',compact('doctor'));
    }
    public function news(){
        return view('user.news');
    }
    public function details(){
        return view('user.news_details');
    }
    public function contact(){
        return view('user.contact');
    }
    public function about(){
        $doctor=doctor::paginate(3);
        return view('user.about',compact('doctor'));
    }

    public function appointment(Request $request){
        $data=new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->number;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='in progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','Appointment Request Successfull.We will contact you soon');
    }

    public function myappointment(){
        if(Auth::id()){
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else{
            return redirect()->back();
        }
        
    }

    public function cancel_appoint($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }



}
