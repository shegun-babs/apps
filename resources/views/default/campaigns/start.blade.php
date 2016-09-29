@extends('layouts.app')

@section('content')
    @include('default.modals.new-campaign')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('layouts.global.errors')
                <div class="panel panel-default animated bounce">
                    <div class="panel-heading">Campaigns</div>

                    <div class="panel-body">
                        <ul>
                            @foreach($data as $row)
                                <li>{{$row->name}} <a href="{{route('view_cp_path',['id'=>$row->id])}}">[View]</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="panel-footer">
                        <a href="#" class="btn btn-info" data-target="#myModal" data-toggle="modal">New Campaign</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
