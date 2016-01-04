<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Problem;
use Auth;

use Illuminate\Http\Request;
use DB;

class ProblemController extends Controller {

        /**
         * specify the middleware
         */
        public function __construct()
        {
                $this->middleware('needy-auth');
        }


        /**
         * show the needy form on get request
         */

        public function needyForm(){
            return view('Pages.needy');
        }


        /**
         * set the needy cookie
         */
        public function setNeedyCookie(){
            if(isset($_POST['needy-button'])){
                return "needy clicked";
            }
        }


        /**
         * save needy form records into database
         * return redirect to same page
         */
        public function save(Request $request){
            /*DB::connection()->enableQueryLog();*/


            $problem = new Problem();
            $problem->name = ucwords($request->input('name'));
            $problem->phone = $request->input('phone');
            $problem->address = $request->input('address');
            $problem->problem = $request->input('problem');
            $problem->severity = $request->input('severity');
            $problem->cost = $request->input('cost');
            $problem->userId = Auth::user()->user_id;
            $problem->save();//else record wont be saved



            /*$query = DB::getQueryLog();
            print_r($query);*/

            return back()->with('status','Your Problem has been submitted. Please be patience while a Donner volunteer to help you. Thanks');
    }

        /**
         * problem is saved
         * @param problem id, Request object
         */
        public function solved($id){

            $problem = Problem::findOrFail($id);

            if(isset($_POST['solved'])){
                $problem->solved = 1;
                $problem->save();
                return redirect('problems')->with(["status" => "Problem status has been changed to Complete", 'currentProblem' => $problem]);
            }
        }

        //cancel problem
        public function cancel($id){

            $problem = Problem::findOrFail($id);
            $problem->delete();
            return redirect('problems')->with(["status" => "Problem has been Deleted", 'currentProblem' => $problem]);
        }
}
