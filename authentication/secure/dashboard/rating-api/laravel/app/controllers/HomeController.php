<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	function PrepSQL($value)
	{
    // Stripslashes
    if(get_magic_quotes_gpc()) 
    {
        $value = stripslashes($value);
    }
 
    // Quote
    $value = "'" . mysql_real_escape_string($value) . "'";
 
    return($value);
}
	
	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showError($buyer){

		return Response::json(array('status'=>'invalid syntax')); 
	}
	public function showerrors(){

		return Response::json(array('status'=>'invalid syntax')); 
	}
	
	public function showRatingForm($seller,$buyer,$urls)
	{
		$user_seller = User::where('username','=' ,$seller)->get();
		$user_buyer = User::where('username','=' ,$buyer)->get();
		
		if($user_seller->isEmpty() ){
			return Response::json(array('status'=>$seller.' not valid')); 
		}
		if($user_buyer->isEmpty() ){
			return Response::json(array('status'=>$buyer.' not valid')); 
		}
		if(strcasecmp($user_seller, $user_buyer)==0){
			return Response::json(array('status'=>'both names are same')); 
		}

		$data=array('seller'=>$seller,'buyer'=>$buyer);
		return View::make('Rating')->with('seller',$seller)->with('buyer',$buyer)->with('urls',$urls);

	}



	public function showReview($user)
	{

		$username = User::where('username','=' ,$user)->get();
		if($username->isEmpty()){
			return Response::json(array('status'=>$user .' not valid')); 
		}
		
		$username2 = Rating::where('seller','=' ,$user)->get();
		if($username2->isEmpty()){
			return Response::json(array('name' => $user, 'rating' => "There is no Rating against ". $user));
		}
		$r = array();
		$p = array();
		$reviews  = Rating::where('seller','=',$user)->get();
		foreach ($reviews as $review) {
			$r['name'] = $review->buyer;
			$r['review'] = $review->review;	
			 array_push($p, $r);
		}
		return Response::json(array('reviews'=>$p));

		//return View::make('Review')->with('reviews',$reviews);
	}


	public function saveDatabase()
	{
		

		$buyer1 = Input::get('buyer');
		$seller = Input::get('seller');
		$review = Input::get('review');
		$urls = Input::get('urls');
		$rating_num = Input::get('rating');

		$rating = new Rating();

		//$rating->rating_id = 2;
		$rating->seller = $seller;
		$rating->buyer = $buyer1;
		$rating->review= $review;
		$rating->rating_number = $rating_num;
		
		$rating->save();

        $actual_link = "http://$_SERVER[HTTP_HOST]";
        return Redirect::away($actual_link."/authentication");
	}


	public function calculateRating($username){

		$username1 = User::where('username','=' ,$username)->get();
		if($username1->isEmpty()){
		return Response::json(array($username .' not valid'));
		}
		
		$username2 = Rating::where('seller','=' ,$username)->get();
		if($username2->isEmpty()){
			return Response::json(array('name' => $username, 'rating' => "There is no Rating against $username"));
		}


		$ratings  = Rating::where('seller','=',$username)->get();
		
		$sum = 0;
		$count =0;
		foreach ($ratings as $rating ) {
			$sum += $rating->rating_number;
			$count=$count + 1;
		}
		$average = $sum/$count;
		return Response::json(array('name' => $username, 'rating' => $average));
		}



	public function showCheck($user){
		$user1 = User::find(2);
		return $user1->username;
	}


}
