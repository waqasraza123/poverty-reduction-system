@extends('main')
@section('inner_content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="center" style="color:black;">Your Listings</h2>

                @foreach($schools as $school)
                        <div class="listing">
                            <a href="{{url('/listings/show/'.$school->school_id)}}">
                                <div class="image">
                                    
                                </div>
                            </a>
                            <a href="{{url('/listings/show/'.$school->school_id)}}">
                                <h2 class="center">{{ $school->name }}</h2>
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
                
        </div>
    </div>
@stop