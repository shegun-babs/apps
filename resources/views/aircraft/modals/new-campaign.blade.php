<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Campaign</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('post_new_path')}}" method="post" id="campaign-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Campaign Name</label>

                        <div class="col-sm-8">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Campaign Name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-4 control-label">Campaign Description</label>

                        <div class="col-sm-8">
                            <input name="description" id="description" type="text" class="form-control"
                                   placeholder="Campaign Description" value="{{old('description')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="startdate" class="col-sm-4 control-label">Start Date</label>
                        <div class="col-sm-8">
                            <input name="startdate" id="startdate" type="text" class="form-control" placeholder="Start Date" value="{{old('startdate')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enddate" class="col-sm-4 control-label">End Date</label>
                        <div class="col-sm-8">
                            <input name="enddate" id="enddate" type="text" class="form-control" placeholder="End Date" value="{{old('enddate')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="starthour" class="col-sm-4 control-label">Start Time (Hour)</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="starthour">
                                @for($i=0;$i<24;$i++)
                                    <option value="{{$i}}" {{old('starthour')==$i?'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stophour" class="col-sm-4 control-label">Stop Time (Hour)</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="endhour">
                                @for($i=0;$i<24;$i++)
                                    <option value="{{$i}}" {{old('endhour')==$i?'selected':''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="create">Create Campaign</button>
            </div>
        </div>
    </div>
</div>