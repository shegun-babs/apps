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
                        <div class="panel-heading">Mailing Lists</div>
                        <div class="panel-body">
                            <div class="row">
                                <ul class="mailing-list">
                                    @foreach($data as $row)
                                        <li class="col-lg-4 col-md-4 col col-sm-6 col-xs-12">
                                            <a href="#">
                                                {{$row->name}}
                                                <span>{{$row->created_at->format("d-m-Y")}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{$data->links()}}
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