@extends('main')
@section('inner_content')
<div class="col-md-6 col-md-offset-3">
    <div class="row form white_overlay">
        <h2 class="center">Edit Your Listing </h2>
        <form action="{{url('listings/edit')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type = "text" name= "name" class="form-control" placeholder="School Name" value="{{$school->name}}"/>
            </div>
            <div class="row">
                <input type = "text" name= "address" class="form-control" placeholder="Address" value="{{$school->address}}"/>
            </div>
            <div class="row">
                <input type = "number" name= "amount_required" class="form-control" placeholder="Amount Required" value="{{$school->amount_required}}"/>
            </div>
            <div class="row">
                <textarea name="description" placeholder="Description" class="form-control" rows="5">{{$school->description}}</textarea>
            </div>
            <div class="image">
                 <img src="{{asset($school->image->path)}}"/>
            </div>
            <div class="row">
                <input type = "file" name= "picture"/>
            </div>
            <input type="hidden" name="id" value="{{$school->school_id}}"/>
            {!!Form::token()!!}
            <div class="row">
                <input type = "submit" name= "submit" class="btn btn-primary" value="Update"/>
            </div>
        </form>
    </div>            
</div> 
@stop