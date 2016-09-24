@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Apps</div>

                <div class="panel-body">
                    <div class="col-md-6 app-start mb-30"><a href="#">Email Campaign</a></div>
                    <div class="col-md-6 app-start mb-30"><a href="#">SMS Campaign</a></div>
                    <div class="col-md-6 app-start mb-30"><a href="#">App 1</a></div>
                    <div class="col-md-6 app-start mb-30"><a href="#">App 1</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
