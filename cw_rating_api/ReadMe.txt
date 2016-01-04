
					<!----------------------------------!>

1. You can access the Rating Form by followig url. I have made just a simple rating form. You should change it according to your own module and style.


URL  :
	 "rating/seller={seller}&buyer={buyer}" in a get request.
{buyer}: Name of user who is giving the review.
{seller}: Name of user against whom the review is given.


When "Submit" button is pressed 
On success:
A json object is returned in a following format 
	"return Response::json(array('status'=>'done'));"

On invalid syntax or other checks,
	 still a JSON object is return. You can check the JSON object by entering various inputs. 

					<!----------------------------------!>

2. You can access the Review Page where all the review against particular user is placed.

URL :
	"review/username={user}" in a get request.
{user} : Name of the user.

					<!----------------------------------!>

3. You can receive the rating of a particular user.

URL :
	/rating/{username} in a get request.
{username} : name of that user




On success:

A json object is returned in a following format 
	 Response::json(array('name' => $username, 'rating' => $average));

On invalid syntax or other checks,
	 still a JSON object is return. You can check the JSON object by entering various inputs. 
					<!----------------------------------!>

4.To change the RATING FORM

Web_project/app/views/Rating.blade

					<!----------------------------------!>
5.To change the Review FORM

Web_project/app/views/Review.blade

					<!----------------------------------!>
6.To see the Database Table . see migrations feild.

Web_project/app/database/migration
					<!----------------------------------!>

7.Change the Database name, username and password from the following feild

web_project/app/config/database.php => line 58-60 

