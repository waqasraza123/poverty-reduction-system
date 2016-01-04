@extends('Partials.donner-master')

@section('content')
    <div class="well well-lg" id="rating_div"></div>
    <?php $ratingUserName = \App\LocalUser::where('user_id', $id)->select('username')->first(); ?>

    <script type="text/javascript">
        $.getJSON( "http://localhost/cw_rating_api/public/rating/<?php echo $ratingUserName->username; ?>", function( data ) {
            if(!isNaN (data.rating)){
                $('#rating_div').html("<b>Rating: </b>" + data.rating + " out of 5");
            }else{
                $('#rating_div').html("No Rating Yet")
            }
        });
    </script>
@endsection