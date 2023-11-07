<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Course;
use Validator;

class StaffController extends Controller
{
    public function index(){
    	$staffs=Staff::orderBy('id','ASC')->get();
    	return view('staff.index',compact('staffs'));
    }
     public function createStaff(){
     	$courses= Course::where('status',1)->get();
    	return view('staff.create_staff',compact('courses'));
    }
    public function store(Request $req)
    {
        $validated = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'qualification'=>"required",
            'age'=>"required",
            'address'=>"required",
            'image'=>"required|image|max:8096",
        ]);
        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }
        $staffs = new Staff;
        $staffs->name = $req->name;
        $staffs->email = $req->email;
        $staffs->phone = $req->contact;
        $staffs->age = $req->age;
        $staffs->image = $req->image;
        $staffs->address = $req->address;
        $staffs->qualification = $req->qualification;
        $staffs->course = json_encode($req->courses);
        if($req->has('image')){
            $file_name  = $req->name.time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('staff_image'),$file_name);
            $staffs->image = $file_name;
        }
        $staffs->save();
        if($staffs)
        {
            return redirect('manage/staff')->with('success','Course Added Successfully');
        }else{
            return redirect()->back()->with('error','Course Not Addedd Successfully');
        }


    }
    public function edit($id)
    {
        try{
        $staff_id = \Crypt::decrypt($id);
        $select_data = Staff::findorFail($staff_id);
        $courses = Course::all();
        if($select_data)
        {
            return view('staff.edit_staff',compact('select_data','courses'));
        }else{
            return redirect('manage/staff')->with('error','Failed to Find data');
        }
        }catch(\Exception $e)
        {
            return redirect('manage/staff')->with('error','Something Went wrong Contact Admin'.$e->getMessage());
        }
    }

    public function Update(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'qualification'=>'required',
            'courses:*'=>'required',
            'age'=>'required',
            'address'=>'required',


        ]);
        if($validated->fails())
        {

            return redirect()->back()->withErrors($validated)->withInput();
        }
        // try{
        $id = \Crypt::decrypt($request->token);
        $staff =  Staff::where('id',$id)->first();

        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->qualification = $request->qualification;
        $staff->course = json_encode($request->courses);
        $staff->age = $request->age;
        $staff->address = $request->address;
        if($request->has('image'))
        {
            $file_name = time().'_'.mt_rand(0000,9999).$request->image->extension();
            $request->image->move(public_path('staff_images'),$file_name);
            $staff->image = $file_name;
        }
        $staff->save();
        if($staff){
            return redirect('manage/staff')->with('success','Staff Updated SuccessFully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
    // }catch(\Exception $e){
    //     return redirect()->back()->with('error','Something Went Wrong please Contact Admin');
    // }
    }
}
