@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default animated bounce">
                    <div class="panel-heading">Search</div>
                    <div class="panel-body">
                        <form class="form-inline mb-20" role="form" method="get" action="{{route('u_search',['id'=>$id])}}" id="search-form">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="input-group input-daterange" id="event_period">
                                    <input name="start" id="start" type="text" class="form-control actual_range">
                                    <span class="input-group-addon">to</span>
                                    <input name="end" id="end" type="text" class="form-control actual_range">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>

                        @if(!empty($data))
                            <div class="label label-info"><span>Total: </span>{{$data->total()}}</div>
                            <table class="table table-striped table-bordered table-condensed">
                                <tr>
                                    <td>Email</td>
                                    <td>Opt-Out Date</td>
                                </tr>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$data->links()}}
                        @endif

                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(function () {
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $.fn.datepicker.defaults.autoclose = true;
//            $('.input-daterange input').each(function() {
//                $(this).datepicker("clearDates");
//            });
            $('#event_period').datepicker({
                inputs: $('.actual_range')
            });
            $('form#search-form').on('submit', function(e){
            });
        });
    </script>
@endsection