@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default animated bounce">
                    <div class="panel-heading">Search</div>
                    <div class="panel-body">
                        <form class="form-inline" role="form" method="POST" action="#">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-3">
                                    <input id="start_date" type="text" class="form-control" name="start_date"
                                           value="{{ old('start_date') }}"
                                           required data-provide="datepicker">
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">End Date</label>

                                <div class="col-md-3">
                                    <input id="end_date" type="text" class="form-control" name="end_date"
                                           value="{{ old('end_date') }}"
                                           required data-provide="datepicker">
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>

                        @if(!empty($data))
                            <div class="label label-info"><span>Total</span>{{$data->total()}}</div>
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
        });
    </script>
@endsection