@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.default.partials.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default animated bounce">
                    <div class="panel-heading">Un-subscribes List</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form method="get" action="{{route('unsub')}}">
                                <dl class="form-group">
                                    <dt>Mailing List</dt>
                                    <dd><select class="form-control" name="mailing_list_id" id="mailing_list">
                                            <option value="">Select</option>
                                            @foreach($mailing_list as $ml)
                                                <option value="{{$ml->id}}">{{ucwords($ml->name)}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <p>
                                    <button class="btn btn-primary">Fetch</button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
@endsection