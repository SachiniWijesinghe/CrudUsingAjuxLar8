<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index(){

        $student =Student::all();
        //return view('student.index'.compact('student'));
        return view('student.index',['members'=>$student]);
    }

    public function store(request $request){

         $student = new Student;

         $student -> name = $request->input('name');
         $student -> caurse = $request->input('caurse');
         $student -> email = $request->input('email');
         $student -> phone = $request->input('phone');
       $student->save();
       return redirect()->back()->with('status','Student added Successfully');
                                        //  me status kyna eke nma tmy session ekt danne
    }

//get data according to id and pass it as json response to ajax in the view
    public function edit($id){

        $student =Student::find($id);
        //return view('student.index'.compact('student'));
        return response()->json([
            'status'=>200,
            'stu'=>$student,
        ]);
    }

    //update data
    public function update(Request $request){

        $student_id = $request->input('_id'); //mekt damme modaleka athule id eka tyena input eke name property eka
        $student = Student::find($student_id);

        $student -> name = $request->input('name');
        $student -> caurse = $request->input('caurse');
        $student -> email = $request->input('email');
        $student -> phone = $request->input('phone');
      $student->update();
      return redirect()->back()->with('status','Student updated Successfully');

    }

    //update data
    public function delete(Request $request){

        $student_id = $request->input('delete_stud_id'); //mekt damme modaleka athule id eka tyena input eke name property eka
        $student = Student::find($student_id);


      $student->delete();
      return redirect()->back()->with('status','Student deleted Successfully');

    }
}
