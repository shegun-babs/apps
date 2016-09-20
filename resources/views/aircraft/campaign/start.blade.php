@extends('layouts.aircraft.master')

@section('title')
    All Campaigns
@stop

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@stop
@section('foot')
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script>
$(function(){

    $('#new-campaign').click(function(e){
        e.preventDefault();
        $('#myModal').modal('show');
    });
    $('#startdate').datepicker({
        minDate: 0,
        maxDate: "+1M"
    });
    $('#enddate').datepicker({
        minDate: 0,
        maxDate: "+1M"
    });

    var $form = $('#campaign-form');

    $('button#create').click(function(e){
        e.preventDefault();
        $(this).prop('disabled', true);
        $form.submit();
    });

});
</script>
@stop

@section('content')

        @include('aircraft.modals.new-campaign')
        @include('layouts.aircraft.partials.errors')
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="new-campaign"><i class="fa fa-plus"></i> New Campaign</button>
            <button class="btn btn-info"><i class="fa fa-ban"></i> Stop All Campaign</button>
            <button class="btn btn-info"><i class="fa fa-eye"></i> View Campaign Status</button>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th style="width: 3.5em;"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Tompson</td>
                <td>the_mark7</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ashley</td>
                <td>Jacobs</td>
                <td>ash11927</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Audrey</td>
                <td>Ann</td>
                <td>audann84</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>John</td>
                <td>Robinson</td>
                <td>jr5527</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Aaron</td>
                <td>Butler</td>
                <td>aaron_butler</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Chris</td>
                <td>Albert</td>
                <td>cab79</td>
                <td>
                    <a href="user.html"><i class="fa fa-pencil"></i></a>
                    <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
@endsection