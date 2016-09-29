@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($data->count())
                    <div class="panel panel-default animated bounce">
                        <div class="panel-heading">Sent Campaign Mailing Lists</div>
                        <div class="panel-body">
                            <select name="mailingList" class="form-control" id="mailingList">
                                <option value="">Choose One</option>
                                @foreach($data as $option)
                                    <option value="{{$option->id}}">{{ucwords($option->name)}}</option>
                                @endforeach
                            </select>
                            <br/>
                            <br/>
                            <br/>
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

@section('foot')
    <script>
        (function(){
            $('#mailingList').change(function(e){
                window.location = "{{config('app.url')}}" + '/campaigns/sent-view/' + $(this).val();
            });
        })();
    </script>
@endsection
