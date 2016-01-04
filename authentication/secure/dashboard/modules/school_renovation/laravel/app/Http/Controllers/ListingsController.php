<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\School;
use App\Image;
use Auth;
use DB;
use Redirect;
use App\LocalUser;
class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        if(!Auth::check()){
            Auth::logout();
            $actual_link = "http://$_SERVER[HTTP_HOST]";
            return Redirect::away($actual_link."/believe/secure/dashboard/logout.php");
        }
    }
    public function index()
    {
        $schools = School::with('image')->get();
        $localuser = LocalUser::where('user_id','=',Auth::user()->user_id)->first();
        return view('listings')->with(array('schools'=>$schools,'localuser'=>$localuser));
    }
    public function my()
    {
        $schools = School::with('image')->where('user_id','=',Auth::user()->user_id)->get();
        return view('myschools')->with('schools',$schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_listing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Input::get('name');
        $address = Input::get('address');
        $amount_required = Input::get('amount_required');
        $amount_gathered = 0;
        $description = Input::get('description');
        $path="";
        if (Input::file('picture') !==null && Input::file('picture')->isValid()) {
          $destinationPath = 'uploads';
          $extension = Input::file('picture')->getClientOriginalExtension();
          $fileName = rand(11111,99999).'.'.$extension; 
          Input::file('picture')->move($destinationPath, $fileName);
          $path = $destinationPath."/".$fileName;
        }
        
        $image = new Image();
        $image->path =$path;
        $image->save();

        $school = new School();
        $school->name = $name;
        $school->user_id = Auth::user()->user_id;
        $school->address = $address;
        $school->amount_required = $amount_required;
        $school->amount_gathered = 0;
        $school->description = $description;
        $school->image_id = $image->image_id;
        $school->save();
        
        return redirect('listings/add');
        
    }

    public function completed(){
        $schools = DB::table('schools')->where('amount_required', '=', DB::raw('amount_gathered'))
                 ->get();
        
        return view('completed')->with('schools',$schools);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::with('image')->with('user')->where('school_id','=',$id)->first();
        $localuser = LocalUser::where('user_id','=',$school->user->user_id)->first();
        return view('listing')->with(array('school'=>$school,'localuser'=>$localuser));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::with('image')->with('user')->where('school_id','=',$id)->first();
        return view('edit_listing')->with('school',$school);
    }
    
     public function delete($id)
    {
        $school = School::with('image')->with('user')->where('school_id','=',$id)->first();
         if($school->user_id == Auth::user()->user_id){
            $school->delete();
         }
        return Redirect::to('listings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function search(){
        $query = $_GET['query'];
        $schools = School::search($query)->get();
        return view('search')->with('schools',$schools);
    }
    public function update()
    {
        $id = Input::get('id');
        $school = School::findOrFail($id);
        
        
        $name = Input::get('name');
        $address = Input::get('address');
        $amount_required = Input::get('amount_required');
        $description = Input::get('description');
        if (Input::file('picture') !==null && Input::file('picture')->isValid()) {
          $destinationPath = 'uploads';
          $extension = Input::file('picture')->getClientOriginalExtension();
          $fileName = rand(11111,99999).'.'.$extension; 
          Input::file('picture')->move($destinationPath, $fileName);
          $path = $destinationPath."/".$fileName;
            $image = new Image();
            $image->path =$path;
            $image->save();
            $school->image_id = $image->image_id;
        }
        
        
        $school->name = $name;
        $school->user_id = Auth::user()->user_id;
        $school->address = $address;
        $school->amount_required = $amount_required;
        $school->amount_gathered = $school->amount_gathered ;
        $school->description = $description;
        $school->save();
        
        return redirect('listings');
    }
    public function pay(){
        $amount = Input::get('amount');
        $school_id = Input::get('school_id');
        $school = School::find($school_id);
        
        $new_amount = $school->amount_gathered + $amount;
        $required = $school->amount_required;
        if($required > $new_amount){
             $school->amount_gathered = $new_amount;   
        }else{
            $school->amount_gathered = $required;
        }
        $school->save();
        
        $actual_link = "http://$_SERVER[HTTP_HOST]";
        return Redirect::away($actual_link."/believe/secure/dashboard/payment-api?amount=".$amount);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
