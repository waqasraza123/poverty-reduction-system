@extends('Partials.donner-master')
@section('content')
{{--$problems is coming from ViewComposers\ProblemsComposer--}}
    <div class="panel panel-primary">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="panel-heading"><h2>All Problems</h2></div>
        <div class="panel-body">
            @foreach($currentUserProblems as $problem)

                <div class="well well-lg">
                    <a href='{{url("/problems", [$problem->id])}}'>{{$problem->problem}}</a>
                </div>

            @endforeach
        </div>
    </div>
@endsection