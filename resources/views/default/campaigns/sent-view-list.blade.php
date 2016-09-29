@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($data->count())
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">Sent Campaign Mailing Lists</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Sent</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->email}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->created_at)->toDayDateTimeString()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br/>
                            <br/>
                            <br/>
                            {{$data->links()}}
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                @else
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">Sent Campaign Mailing Lists</div>
                        <div class="panel-body">
                            <div class="alert alert-info">No Sent Email Campaigns yet.</div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection