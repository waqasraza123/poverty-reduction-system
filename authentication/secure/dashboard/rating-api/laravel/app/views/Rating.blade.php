<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignmetn No 3</title>

</head>
<body >

 <h2 style="text-align:center;"> Rating Form </h2>

 <article>
	{{ Form::open(array('url' => 'login')) }}
     
     <pre> Please Enter the review </pre>
     {{ Form::text('review','',array('required' => 'required')) }}

     {{ Form::hidden('buyer', $buyer) }}
     {{ Form::hidden('seller', $seller) }}
     {{ Form::hidden('urls',$urls)}}
     <pre> Please leave the rating </pre>
	 {{Form::radio('rating', '1')}}<span>1 star</span>
     {{Form::radio('rating', '2')}}<span>2 star</span>
     {{Form::radio('rating', '3',array('checked' => 'checked'))}}<span>3 star</span>
     {{Form::radio('rating', '4')}}<span>4 star</span>
     {{Form::radio('rating', '5')}}<span>5 star</span>
     
     </br></br>
     {{ Form::submit('Submit') }}

{{ Form::close() }}
      
</article>

</body>
</html>

