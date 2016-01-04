@extends('Partials.donner-master')
@section('content')
    {{--donors are users with donner col value 1--}}
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Donors Who Helped You!</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Rating</th>
                        <th>View Rating</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($donors as $donor)
                            <?php $ratingUserName = \App\LocalUser::where('user_id', $donor->donorId)->select('username')->first(); ?>
                            <tr>
                                <td><a href='{{url("/donors", [$donor->donorId])}}'>{{$ratingUserName->username}}</a></td>

                                {{--donor phone number--}}
                                <td>{{$donor->phone}}</td>

                                {{--send give rating request--}}
                                <td><a href="http://localhost/cw_rating_api/public/rating/seller={{$ratingUserName->username}}&buyer={{Auth::user()->localUser->username}}&redirect=www.google.com"><span class="label label-danger">Give Rating</span></a></td>


                                {{--view rating request--}}
                                <td><a href="{{url('donors/rating/'.$donor->donorId)}}"><span class="label label-success">View Rating</span></a></td>
                                {{--show donor address--}}
                                <td>{{$donor->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer -->
    </div>
@endsection