@extends('layouts.aircraft.master')

@section('title')
    View All Lists
@stop

@section('foot')
    <script>
        $(document).ready(function () {
            $('#new-list').on("click", function () {
                $('#list-modal').modal('show');
            });

            $('#create').on('click', function (e) {
                e.preventDefault();
                $(this).prop('disabled', true);
                $('#list-form').submit();
            });

            $('a.del').on("click", function(e){
                return confirm("Are you sure you want to delete?");
            });
        });

    </script>
@endsection


@section('content')
    <div class="header">
        <h1 class="page-title">Lists</h1>
        <ul class="breadcrumb">
            <li><a href="#!">Home</a></li>
            <li class="active">Lists</li>
        </ul>
    </div>
    <div class="main-content">
        @include('aircraft.modals.new-list')
        @include('layouts.aircraft.partials.errors')
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="new-list"><i class="fa fa-plus"></i> New List</button>
            <button class="btn btn-info"><i class="fa fa-ban"></i> Hidden Lists</button>
        </div>
        @if ( $data->count() )
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>List Name</th>
                    <th>Description</th>
                    <th style="">actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 0; ?>
                @foreach($data as $row)
                    <?php $count++; ?>
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->description}}</td>
                        <td>
                            <a href="{{route('view_ml_path', ['id'=>$row->id])}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> View</a>
                            <a href="#!" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{route('del_ml_path', ['id'=>$row->id])}}" class="btn btn-xs btn-danger del"><i class="fa fa-trash-o"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data->links()  }}
        @endif
        <div>
@endsection