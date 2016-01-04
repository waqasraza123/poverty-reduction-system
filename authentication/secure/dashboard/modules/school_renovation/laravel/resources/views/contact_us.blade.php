@extends('main')
@section('inner_content')
    <div class="col-md-6 col-md-offset-3">
        <div class="white_overlay">
        <h2 class="center">Contact Us </h2>
        
        <form>
            <input type="text" name="Name" placeholder="Name" class="form-control">
            <input type="text" name="email" placeholder="Email" class="form-control">
            <textarea name="message" placeholder="Your Message" rows="20" class="form-control"></textarea>
            <input type="submit" class="btn btn-primary" value="Send Message" />
            </textarea>
        </form>
        </div>
    </div>
@stop