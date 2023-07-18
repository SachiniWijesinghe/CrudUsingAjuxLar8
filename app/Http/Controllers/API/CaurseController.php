<?php
                         //-------------------// api--------------------
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Caurse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



class CaurseController extends Controller
{


    public function store(Request $request){

    $validator = Validator::make( $request -> all(), [
        'name' => 'required|min:3|max:191',
        'no_of_modules' => 'required',
        'time_period' => 'required',
        'price' => 'required',
    ]);

    if($validator->fails())
    {
        return response()->json([
            'status'=>422,
            'message' => $validator->errors()
        ],422);
    }
    else{
        $caurse = new Caurse();

         $caurse -> name = $request->input('name');
         $caurse -> no_of_modules = $request->input('no_of_modules');
         $caurse -> time_period = $request->input('time_period');
         $caurse -> price = $request->input('price');
       $caurse->save();
       //return redirect()->back()->with('status','caurse added Successfully');

       return response()->json([
        'status'=>200,
        'message'=>'Caurse Added Successfully',
       ],200);

       }
    }


    public function index(){
        //$caurses = Caurse::all(); //to get all caurses using modal
        $caurses = Caurse::select('name','no_of_modules','price')->get();
        return response()->json(['status'=>200, 'caurses'=>$caurses]);
    }

    public function getOne($id){

        $caurse = Caurse::find($id);
        return response()->json(['status'=>200, 'caurse'=>$caurse]);
    }


    public function update(Request $request, $id){

        //$caurse_id = $request->input('_id'); //mekt damme modaleka athule id eka tyena input eke name property eka //but api ekedi url ekn kelinma api ekedi enw
        $caurse = Caurse::find($id);

        if($caurse){
        $caurse -> name = $request->input('name');
        $caurse -> no_of_modules = $request->input('no_of_modules');
        $caurse -> time_period = $request->input('time_period');
        $caurse -> price = $request->input('price');
        $caurse->update();
          //return redirect()->back()->with('status','caurse updated Successfully');
          return response()->json(['status'=>200,'caurse'=>'updated'], 200);
        }
        else{
            return response()->json(['status'=>404,'caurse'=>'id not found'], 404);
        }



    }


    public function delete(Request $request,$id){

        // $caurse_id = $request->input('delete_caurse_id'); //mekt damme modaleka athule id eka tyena input eke name property eka
        $caurse = Caurse::find($id);

      if($caurse){
      $caurse->delete();
      //return redirect()->back()->with('status','caurse deleted Successfully');
      return response()->json(['status'=>200,'caurse'=>'deleted'], 200);


      }else{

        return response()->json(['status'=>404,'caurse'=>'id not found'], 404);

      }
    }


}

