@extends('layouts.app')
@section('head')
    <style type="text/css">

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($data->count())
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">{{ucfirst($data->name)}}</div>
                        <div class="panel-body">
                            <div class="p-title">
                                <h3>{{$data->name}}</h3>
                            </div>
                            <ul class="list">
                                <li><span>Created</span> {{$data->created_at}}</li>
                                <li><span>Recipients</span> {{$count}}</li>
                                <li><span>Sent Emails</span> {{$sent_emails}}</li>
                                <li><span>Un-subscribes</span> {{$unsubscribes}}</li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                @else
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">Mailing Lists</div>
                        <div class="panel-body">
                            <div class="alert alert-info">No Mailing Lists yet.</div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('foot')
@endsection