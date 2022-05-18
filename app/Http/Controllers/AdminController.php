<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Contactform;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\MyFirstNotification;


class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
       $doctor=new doctor;
       $image=$request->file;
       $imagename=time().'.'.$image->getClientoriginalExtension();
       $request->file->move('doctorimage',$imagename);
       
       $doctor->image=$imagename;
       $doctor->name=$request->name;
       $doctor->phone=$request->number;
       $doctor->speciality=$request->speciality;
       $doctor->room=$request->room;
       $doctor->save();
       return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function showappointment(){
        $data=appointment::all();
        return  view('admin.showappointment',compact('data'));
    }
    public function showmessage(){
        $data=contactform::all();
        return  view('admin.showmessage',compact('data'));
    }

    public function approved($id){
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id){
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
        
    }

    public function showdoctor(){
        $data=doctor::all();
        return view('admin.showdoctor',compact('data'));
    }
    

    public function deleteddoctor($id){
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deletemail($id){
        $data=contactform::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id){
        $data=doctor::find($id);

        return view('admin.update_doctor',compact('data'));
        
    }

    public function editdoctor(Request $request, $id){
        $doctor=doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }
        
        $doctor->save();
        return redirect()->back()->with('message','Doctor details updated Successfully');
    }

    public function emailview($id){
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
        
    }

    public function sendemail(Request $request,$id){
        $data=appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart,
        ];

        $data->notify(new MyFirstNotification ( $details));

        return redirect()->back()->with('message','email has been sent successfully');

    }
}
