@extends('layouts.aircraft.master')

@section('content')
    <div class="activity-item flash-success">
        <i class="fa fa-check"></i>

        <div class="activity"> There are <a href="#">6 new tasks</a> waiting for you. Don\'t forget!
            <span>About 3 hours ago</span>
        </div>
    </div>

    <br>
    <br>

    <div class="activity-item flash-info">
        <i class="fa fa-bell"></i>

        <div class="activity"> Mail server was updated. See <a href="#">changelog</a> <span>About 2 hours ago</span>
        </div>
    </div>

    <br>
    <br>

    <div class="activity-item flash-warning">
        <i class="fa fa-exclamation-circle"></i>

        <div class="activity"> Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a> <span>35 minutes ago</span>
        </div>
    </div>

    <br>
    <br>

    <div class="activity-item flash-error">
        <i class="fa fa-ban"></i>

        <div class="activity"><a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a> <span>14 minutes ago</span>
        </div>
    </div>

@stop