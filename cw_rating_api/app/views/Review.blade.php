<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignmetn No 3</title>
</head>
<body >

    <h1 style="text-align:center"> All Reviews </h1>

    <div >
            @foreach($reviews as $review)
            	<?php
            	 $var = $review->review;
            	 $buyer = $review->buyer;
            	 ?>
                <div class="well well-lg">
                	<pre>Username: {{$buyer}}</pre>
                	<pre> Review:{{$var}}</pre>
                </div>
            @endforeach
           
</div>

</body>
</html>
