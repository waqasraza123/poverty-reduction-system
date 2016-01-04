@extends('main')

@section('inner_content')
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <?php if(isset($school)){ ?>
            <div class="col-md-8">
                        <div class="listing">
                            <a href="{{url('/listings/show/'.$school->school_id)}}">
                                <div class="image">
                                    <img src="{{asset($school->image->path)}}"/>
                                </div>
                            </a>
                            <a href="{{url('/listings/show/'.$school->school_id)}}">
                                <h2>{{ $school->name }}</h2>
                            </a>
                            <p>{{$school->description}}</p>
                            @if($school->user_id == Auth::user()->user_id)
                                <p><a href="{{url('listings/edit/'.$school->school_id)}}">Edit Listing</a></p>
                                <p><a href="{{url('listings/delete/'.$school->school_id)}}" onclick="return confirm('Are you sure?')">Delete Listing</a></p>
                            @endif
                            <div class="share">
                            <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1590973894484855";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                                <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button"></div>
                        </div>
                        </div>
                        
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <h2 class="center">User Information</h2>

                    <p><b>Name: </b>{{$localuser->firstname}}</p>
                    <p><b>Email: </b>{{$localuser->email}}</p>
                    <p><b>Phone: </b>{{$school->user->phone_number}}</p>
                    <p><b>Occupation: </b>{{$school->user->occupation}}</p>
                    
                    <p id="rating_div"></p>
                    @if($school->user_id != Auth::user()->user_id)
                        <a href="http://localhost/authentication/secure/dashboard/rating-api/rating/seller={{$localuser->username}}&buyer={{Auth::user()->localuser->username}}&redirect=www.google.com" ><p class="red rate">Rate User</p></a>
                     @endif
                </div>
                <div class="sidebar">
                    <h2 class="center">Donations</h2>
                    <p><b>Amount Required: </b>{{$school->amount_required}}</p>
                    <p><b>Amount Collected: </b>{{$school->amount_gathered}}</p>
                    <p><b>Remaining: </b>{{$school->amount_required - $school->amount_gathered}}</p>
                    <p><b>Percentage: </b>{{round(($school->amount_gathered * 100)/$school->amount_required)}}</p>
                    
                    <div class="progress">
                        <?php $percentage = round(($school->amount_gathered*100)/$school->amount_required)?>
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$percentage}}"
                      aria-valuemin="0" aria-valuemax="100" style="width:{{$percentage}}%">
                        {{$percentage}}% Complete (success)
                      </div>
                    </div>
                </div>
                @if($school->amount_gathered != $school->amount_required)
                <div class="sidebar">
                    <h2 class="center">Want to donate?</h2>
                    <form action="{{url('payment')}}" method="post">
                        <input type="number" name="amount" class="form-control amount"/>
                        <input type="hidden" name="school_id" class="form-control amount" value="{{$school->school_id}}"/>
                        <input type="submit" class="btn btn-primary amount" value="Donate"/>
                        {!!Form::token()!!}
                    </form>
                </div>
                @endif
            </div>
            
            <?php } ?>
        </div>
    </div>

<script type="text/javascript">
    $.getJSON( "http://localhost/believe/secure/dashboard/rating-api/rating/{{$localuser->username}}", function( data ) {
        if(!isNaN (data.rating)){
            $('#rating_div').html("<b>Rating: </b>" + data.rating + " out of 5");
        }else{
            $('#rating_div').html("")
        }
      });
</script>
@stop