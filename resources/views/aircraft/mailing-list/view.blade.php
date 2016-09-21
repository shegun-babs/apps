@extends('layouts.aircraft.master')
@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@stop
@section('foot')

@stop

@section('content')

        @if (!is_null($list))
            @include('layouts.aircraft.partials.errors')
            <div class="row">
                <dl class="dl-horizontal mt-10">
                    <dt>List Name</dt>
                    <dd>{{$list->name}}</dd>
                    <dt>List Description</dt>
                    <dd>{{$list->description}}</dd>
                </dl>


                <div class="col-md-6">
                    <form action="{{route('upload_ml_path', ['id' => $list->id])}}" method="post"
                          style="border: 1px solid #e0e0e0;padding: 0 20px"
                          enctype="multipart/form-data" class="">
                        {{ csrf_field()  }}
                        <div class="form-group">
                            <label for="file">File input</label>
                            <input type="file" name="file" id="file">
                            <p class="help-block">Each email should be on a separate line.</p>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="upload" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{route('save_ml_path', ['id'=>$list->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="emails">Emails</label>
                            <textarea name="emails" id="emails" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>


            <h4>List Contacts</h4>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if($data->count())
                        <table class="table display clear" id="recipientsTable">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Valid</th>
                                <th>Hidden</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $contact)
                                <tr>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->valid === NULL ? 'Not Checked' : ($contact->valid ? 'Yes' : 'No')}}</td>
                                    <td>{{$contact->hidden ? 'Yes' : 'No'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$data->links()}}
                    @else
                        <div class="alert alert-info">
                            No Email Contacts Yet
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Invalid List
            </div>
        @endif
@stop