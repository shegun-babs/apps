@extends('layouts.aircraft.master')
@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@stop
@section('foot')
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#recipientsTable').DataTable();
        });
    </script>
@stop

@section('content')

    <div class="header">
        <h1 class="page-title">Lists</h1>
        <ul class="breadcrumb">
            <li><a href="#!">Home</a></li>
            <li class="active">Lists</li>
        </ul>
    </div>

    <div class="main-content ml-">
        @if (!is_null($data))
            @include('layouts.aircraft.partials.errors')
            <dl class="dl-horizontal">
                <dt>List Name</dt>
                <dd>{{$data->name}}</dd>
                <dt>List Description</dt>
                <dd>{{$data->description}}</dd>
            </dl>

            <div class="mt-20 mb-20">
                <form action="{{route('upload_ml_path', ['id' => $data->id])}}" method="post"
                      style="border: 1px solid #fef;"
                      enctype="multipart/form-data">
                    {{ csrf_field()  }}
                    <input type="file" name="file" accept="file_extension" class="btn btn-info"
                           style="display:inline-block">
                    <input type="submit" value="upload" class="btn btn-primary">
                </form>
            </div>



            <h4>List Contacts</h4>
            <div class="col-md-10 col-md-offset-1">
            @if($data->recipients->count())
                <table class="table display" id="recipientsTable">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Valid</th>
                        <th>Hidden</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data->recipients as $contact)
                        <tr>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->valid === NULL ? 'Not Checked' : ($contact->valid ? 'Yes' : 'No')}}</td>
                            <td>{{$contact->hidden ? 'Yes' : 'No'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    No Email Contacts Yet
                </div>
            @endif
            </div>
        @else
            <div class="alert alert-info">
                Invalid List
            </div>
        @endif
    </div>

@stop