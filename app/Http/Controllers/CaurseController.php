<?php

namespace App\Http\Controllers;

use App\Models\Caurse;
use Illuminate\Http\Request;
use App\Models\Student;


class CaurseController extends Controller
{
    public function index(){

        $caurse =Caurse::all();
        //return view('caurse.index'.compact('caurse'));
        return view('caurse.index',['members'=>$caurse]);
    }

    public function store(request $request){

         $caurse = new Caurse();

         $caurse -> name = $request->input('name');
         $caurse -> no_of_modules = $request->input('no_of_modules');
         $caurse -> time_period = $request->input('time_period');
         $caurse -> price = $request->input('price');
       $caurse->save();
       return redirect()->back()->with('status','caurse added Successfully');
                                        //  me status kyna eke nma tmy session ekt danne
    }

//get data according to id and pass it as json response to ajax in the view
    public function edit($id){

        $caurse =Caurse::find($id);
        //return view('student.index'.compact('student'));
        return response()->json([
            'status'=>200,
            'cau'=>$caurse,
        ]);
    }

    //update data
    public function update(Request $request){

        $caurse_id = $request->input('_id'); //mekt damme modaleka athule id eka tyena input eke name property eka
        $caurse = Caurse::find($caurse_id);

        $caurse -> name = $request->input('name');
        $caurse -> no_of_modules = $request->input('no_of_modules');
        $caurse -> time_period = $request->input('time_period');
        $caurse -> price = $request->input('price');
      $caurse->update();
      return redirect()->back()->with('status','caurse updated Successfully');

    }

    //deletedata
    public function delete(Request $request){

        $caurse_id = $request->input('delete_caurse_id'); //mekt damme modaleka athule id eka tyena input eke name property eka
        $caurse = Caurse::find($caurse_id);


      $caurse->delete();
      return redirect()->back()->with('status','caurse deleted Successfully');

    }
}

