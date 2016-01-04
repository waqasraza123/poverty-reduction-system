@extends('main')
@section('inner_content')
<div class="col-md-6 col-md-offset-3">
    <div class="row form white_overlay">
        <h2 class="center">List Your School </h2>
        <form action="{{url('listings/add')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type = "text" name= "name" class="form-control" placeholder="School Name"/>
            </div>
            <div class="row">
                <input type = "text" name= "address" class="form-control" placeholder="Address"/>
            </div>
            <div class="row">
                <input type = "number" name= "amount_required" class="form-control" placeholder="Amount Required"/>
            </div>
            <div class="row">
                <textarea name="description" placeholder="Description" class="form-control" rows="5"></textarea>
            </div>
            <div class="row">
                <input type = "file" name= "picture"/>
            </div>
            {!!Form::token()!!}
            <div class="row">
                <input type = "submit" name= "submit" class="btn btn-primary" value="Add"/>
            </div>
        </form>
    </div>            
</div> 
@stop