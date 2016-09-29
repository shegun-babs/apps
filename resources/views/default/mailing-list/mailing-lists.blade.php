@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($data->count())
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">Mailing Lists</div>
                        <div class="panel-body">
                            @foreach($data->chunk(3) as $row)
                                <div class="row">
                                    @foreach( $row as $item )
                                        <div class="col-md-4 animated bounce">
                                            <div class="list clearfix mb-20 mt-10"
                                                 style="border-radius:5px;border:1px solid #f6f6f6;;padding: 10px;">
                                                <div class="header"
                                                     style="color:darkblue;font-size:18px;font-weight:bold;padding-bottom:5px;text-align:center">{{$item->name}}</div>
                                                <div style="text-align:center;color: #942a25;font-size:16px;font-weight:bold;">{{$item->recipients->count()}}
                                                    <small>recipients</small>
                                                </div>
                                                <div class="pull-left mt-10" style="font-size:10px;">{{$item->created_at}}</div>
                                                <div class="pull-right label label-info" style="font-size:10px;">view</div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{$data->links()}}
                            @endforeach
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