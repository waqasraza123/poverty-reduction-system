@extends('main')
@section('inner_content')
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-8">
                @foreach($schools as $school)
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
                            <div class="listing_footer">
                                <div class="progress">
                                    <?php $percentage = round(($school->amount_gathered*100)/$school->amount_required)?>
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$percentage}}"
                                  aria-valuemin="0" aria-valuemax="100" style="width:{{$percentage}}%">
                                    {{$percentage}}% Complete (success)
                                  </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <h2 class="center">Profile Info</h2>

                    <p><b>Name: </b>{{$localuser->firstname}}</p>
                    <p><b>Email: </b>{{$localuser->email}}</p>
                    <p><b>Phone: </b>{{$school->user->phone_number}}</p>
                    <p><b>Occupation: </b>{{$school->user->occupation}}</p>
                </div>
            </div>
                
        </div>

    </div>
@stop