<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Course;
use Log;
use Crypt;
class CourseController extends Controller
{
    public function index(){
    $courses = Course::orderBy('id','ASC')->paginate(10);
        return view('Course.index',compact('courses'));
    }
    public function createCourse(){
    	return view('course.create_course');
    }
    public function store(Request $req)
    {
        $validated = Validator::make($req->all(),[
            'course_name'=>'required',
            'duration'=>'required',
            'fee'=>'required',
            'file'=>"required|image|max:2048",
            'trainer'=>"required",
        ]);
        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }
        $courses = new Course;
        $courses->course_name = $req->course_name;
        $courses->duration = $req->duration;
        $courses->fee = $req->fee;
        $courses->trainer = $req->trainer;
        if($req->has('file')){
            $file_name  = $req->course_name.time().mt_rand(0000,9999).'.'.$req->file->extension();
            $req->file->move(public_path('course_image'),$file_name);
            $courses->image = $file_name;
        }
        $courses->save();
        if($courses)
        {
            return redirect('manage/course')->with('success','Course Added Successfully');
        }else{
            return redirect()->back()->with('error','Course Not Addedd Successfully');
        }


    }
    public function deleteCourse(Request $request){
    	try{
    		$id=Crypt :: decrypt($request->id);
    		$data=Course :: where('id',$id)->delete();
    		if($data){
    			echo "true";
    		}
    		else{
    			echo "false";
    		}
    	}
    	catch(\Exception $e){
    		Log :: info($e->getMessage());
            echo "false";

    	}
    }
}
