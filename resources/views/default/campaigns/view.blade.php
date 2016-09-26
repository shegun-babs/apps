@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(!empty($data))
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">{{$data->name}}</div>

                        <div class="panel-body">
                            <h4>Description</h4>

                            <p>{{$data->description}}</p>
                            <hr>
                            <h4>Mailing List</h4>
                            {{$data->MailingList->name}}
                            <hr>
                            <h4>Start Date</h4>
                            {{$data->startdate}}
                            <hr>
                            <h4>Running</h4>
                            {{ $data->running ? 'Yes':'No'  }}
                        </div>

                        <div class="panel-footer">
                            <a href="#" class="btn btn-default">Edit
                                Campaign</a>
                            @if($data->running)
                                <a href="#" class="btn btn-info">Stop Campaign</a>
                            @else
                                <a href="#" class="btn btn-success">Start Campaign</a>
                            @endif
                            <a href="#" class="btn btn-danger">Delete
                                Campaign</a>
                        </div>
                    </div>
                @endif;
            </div>
        </div>
    </div>
@endsection
